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
        $collections = RentCollection::whereMonth('collectionDate', '=', date('m'))->whereYear('collectionDate', '=', date('Y'))
            ->where('deleted_at',null)
            ->sum('amount');

        $collectionsHave = RentCollection::select('rents_id')->whereMonth('collectionDate', '=', date('m'))->whereYear('collectionDate', '=', date('Y'))
            ->pluck('rents_id');
         $notPaidRent = Rent::select(DB::raw('sum(rent) AS total_rent'),DB::raw('sum(serviceCharge) AS total_service'),DB::raw('sum(utilityCharge) AS total_utility'))
        ->whereNotIn('id',$collectionsHave)
            ->first();
         $totalDue = $notPaidRent->total_rent + $notPaidRent->total_service + $notPaidRent->totalutility;

         $total = $collections + $totalDue;

        $newRenters = Rent::orderBy('entryDate','desc')->with('customer')->take(5)->get();
        $collectionsAll =  RentCollection::select(
            DB::raw('sum(amount) as amounts'),
            DB::raw("DATE_FORMAT(collectionDate,'%m-%d-%Y') as date")
        )->groupBy('collectionDate')->get();

        //crate due notification
        $haveDueNotification = MyNotify::where('notiType','due')->count();
        if(!$haveDueNotification){
            $notPaidRentCustomers = Rent::with('customer')
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
        //

        $collectionNotifications = MyNotify::where('notiType','collection')->orderBy('created_at','asc')->take(5)->get();
        $dueNotifications = MyNotify::where('notiType','due')->orderBy('created_at','asc')->take(5)->get();
        $toletNotifications = MyNotify::where('notiType','tolet')->orderBy('created_at','asc')->take(5)->get();
        session(['collectionNotifications' => $collectionNotifications]);
        session(['dueNotifications' => $dueNotifications]);
        session(['toletNotifications' => $toletNotifications]);
        //'collectionNotifications','dueNotifications','toletNotifications'
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
}
