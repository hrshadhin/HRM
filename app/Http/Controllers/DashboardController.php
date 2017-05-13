<?php

namespace App\Http\Controllers;

use App\RentCollection;
use Carbon\Carbon;
use DB;
use Faker\Provider\DateTime;
use Illuminate\Http\Request;
use App\Rent;

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


       //return $collectionsAll;
        return view('dashboard',compact('collections','totalDue','total','newRenters','collectionsAll'));
    }
    public function mailCompose(){
        return view('composemail');
    }
    public function mailSend(){
        return view('composemail');
    }
}
