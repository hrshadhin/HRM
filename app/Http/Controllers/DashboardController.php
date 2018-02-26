<?php

namespace App\Http\Controllers;

use App\RentCollection;
use Carbon\Carbon;
use DB;
use Faker\Provider\DateTime;
use Illuminate\Http\Request;
use App\Rent;
use App\MyNotify;

class DashboardController extends Controller
{
    public function index(){
//        $collections = RentCollection::whereMonth('collectionDate', '=', date('m'))->whereYear('collectionDate', '=', date('Y'))
//            ->where('deleted_at',null)
//            ->sum('amount');

        $collectionsHave = RentCollection::select('rents_id')->whereMonth('collectionDate', '=', date('m'))->whereYear('collectionDate', '=', date('Y'))
            ->pluck('rents_id');
        $notPaidRent = Rent::select(DB::raw('sum(rent) AS total_rent'),DB::raw('sum(serviceCharge) AS total_service'),DB::raw('sum(utilityCharge) AS total_utility'))
            ->where('status',1)
            ->whereNotIn('id',$collectionsHave)
            ->whereDate('deedStart','<=',date('Y-m').'-31')
            ->whereDate('deedEnd','>=',date('Y-m').'-31')
            ->first();
        $totalDue = $notPaidRent->total_rent + $notPaidRent->total_service + $notPaidRent->totalutility;

        $rents = Rent::select(DB::raw('sum(rent) AS total_rent'),DB::raw('sum(serviceCharge) AS total_service'),DB::raw('sum(utilityCharge) AS total_utility'))
            ->where('status',1)
            ->whereDate('deedStart','<=',date('Y-m').'-31')
            ->whereDate('deedEnd','>=',date('Y-m').'-31')
            ->first();
        $total = $rents->total_rent + $rents->total_service + $rents->totalutility;

        $collections = $total - $totalDue;


        $newRenters = Rent::orderBy('entryDate','desc')->with('customer')->take(5)->get();
        $collectionsAll =  RentCollection::select(
            DB::raw('sum(amount) as amounts'),
            DB::raw("DATE_FORMAT(collectionDate,'%Y-%m') as month")
        )->groupBy('month')->get();

//        return $collectionsAll;

        return view('dashboard',compact('collections','totalDue','total','newRenters','collectionsAll'));
    }
    public function mailCompose(){
        return view('composemail');
    }
    public function mailSend(){
        return view('composemail');
    }

    public function deleteNotification(Request $request){
        $notiType = $request->get('type');
        $notifications = MyNotify::where('notiType',trim($notiType))->orderBy('created_at','asc')->take(5)->get();
        foreach ($notifications as $noti){
            $noti->delete();
        }
        if($notiType=="collection"){
            session(['collectionNotifications' => []]);

        }
        if($notiType=="due"){
            session(['dueNotifications' => []]);
        }
        if($notiType=="tolet"){
            session(['toletNotifications' => []]);
        }

        return ['message'=>'5 notificaton clean'];
    }

    public function fetchAll(){
        //crate due notification
//        if(!\Session::has('collectionNotifications') || !count(session('collectionNotifications'))){
        $collectionNotifications = MyNotify::where('notiType','collection')->orderBy('created_at','desc')->take(5)->get();
//            session(['collectionNotifications' => $collectionNotifications]);

//        }else{
//            $collectionNotifications = session('collectionNotifications');
//        }

//        if(!\Session::has('dueNotifications') || !count(session('dueNotifications'))){
        $haveDueNotification = MyNotify::where('notiType','due')->count();
        if(!$haveDueNotification){
            $collectionsHave = RentCollection::select('rents_id')->whereMonth('collectionDate', '=', date('m'))->whereYear('collectionDate', '=', date('Y'))
                ->pluck('rents_id');
            $notPaidRentCustomers = Rent::with('customer')
                ->where('status',1)
                ->whereNotIn('id',$collectionsHave)
                ->get();
            foreach ($notPaidRentCustomers as $rent){
                //notification code
                $myNoti = new MyNotify();
                $myNoti->title = $rent->customer->name;
                $myNoti->value = $rent->rent+$rent->serviceCharge+$rent->utilityCharge;
                $myNoti->notiType = "due";
                $myNoti->save();
                //end mynoti
            }
        }
        $dueNotifications = MyNotify::where('notiType','due')->orderBy('created_at','desc')->take(5)->get();
//            session(['dueNotifications' => $dueNotifications]);
//
//        }else{
//            $dueNotifications = session('dueNotifications');
//        }
//        if(!\Session::has('toletNotifications') || !count(session('toletNotifications'))){
        $toletNotifications = MyNotify::where('notiType','tolet')->orderBy('created_at','desc')->take(5)->get();
//            session(['toletNotifications' => $toletNotifications]);
//
//        }else{
//            $toletNotifications = session('toletNotifications');
//        }

        if(count($collectionNotifications) || count($dueNotifications) || count($toletNotifications)){
            $hasAnyNotification = 1;
        }

        return [
            'collection' => $collectionNotifications,
            'due' => $dueNotifications,
            'tolet' => $toletNotifications,
            'hasNotify' => $hasAnyNotification
        ];
    }
}
