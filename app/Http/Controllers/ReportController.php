<?php

namespace App\Http\Controllers;

use App\Expense;
use App\Flat;
use Illuminate\Http\Request;
//use PDF;
use App\Area;
use App\Project;
use App\Customer;
use App\Rent;
use App\RentCollection;
use Carbon\Carbon;
use DB;

class ReportController extends Controller
{
    public function projects(Request $request)
    {
        $areas = Area::pluck('name','id');
        $areas->prepend('All','All');
        $name = $request->has('name') ? $request->input('name') : "";
        $projectType = $request->has('projectType') ? $request->input('projectType') : null;
        $area = $request->has('areas_id') ? $request->input('areas_id') : null;

        $query = Project::query();
        if(strlen($name)){
            $query = $query->where('name','like','%'.$name.'%');
        }
        if($projectType && $projectType != "All"){
            $query = $query->where('projectType',$projectType);
        }

        if($area && $area != "All"){
            $query = $query->where('areas_id',$area);
        }

        $projects = $query->with('area')->orderBy('entryDate', 'desc')->get();

//       $pdf = PDF::loadView('report.projects',compact('projects'));
//		$fileName='Projects.pdf';
//		return $pdf->stream($fileName);
        return view('report.projects',compact('projects','projectType','area','name','areas'));
    }
    public function flats(Request $request)
    {
        $projects = Project::select('id','name')->pluck('name','id');
        $projects->prepend('All','All');
        $project = $request->has('project') ? $request->get('project') : 'All';
        $status = $request->has('status') ? $request->get('status') : 'All';
        if($project=="All" && $status == "All") {
            $flats = Flat::with('project')->orderBy('entryDate', 'desc')->get();
        }
        else if($project=="All" && $status != "All"){
            $flats = Flat::where('status',$status)->with('project')->orderBy('entryDate', 'desc')->get();
        }
        else if($project !="All" && $status == "All"){
            $flats = Flat::where('projects_id',$project)->with('project')->orderBy('entryDate', 'desc')->get();
        }
        else{
            $flats = Flat::where('projects_id',$project)->where('status',$status)->with('project')->orderBy('entryDate', 'desc')->get();
        }
        return view('report.flats',compact('flats','project','status','projects'));
    }
    public function customers(Request $request)
    {
        $status = $request->has('status') ? $request->get('status') : 'All';
        $name = $request->has('name') ? $request->get('name') : "";
        $mobileNo = $request->has('mobileNo') ? $request->get('mobileNo') : "";
        $query = Customer::query();
        if(strlen($name)){
            $query = $query->where('name','like','%'.$name.'%');
        }
        if(strlen($mobileNo)){
            $query = $query->Where('cellNo',$mobileNo);
        }
        if($status != "All") {
            $query = $query->Where('active',$status);
        }
        $query = $query->orderBy('entryDate','desc')->with('entry');
        $customers = $query->get();
        return view('report.customers',compact('customers','status','name','mobileNo'));
    }

    public function rents(Request $request)
    {
        $projects = Project::select('id','name')->pluck('name','id');
        $projects->prepend('All','All');

        $project = $request->has('project') ? $request->get('project') : 'All';
        $status = $request->has('status') ? $request->get('status') : 'All';

        if($project=="All" && $status == "All") {
            $rents = Rent::with('project')
                ->orderBy('entryDate','desc')->with('project')->with('flat')->with('customer')->get();        }
        else if($project=="All" && $status != "All"){
            $rents = Rent::where('status',$status)->with('project')
                ->orderBy('entryDate','desc')->with('project')->with('flat')->with('customer')->get();
        }
        else if($project !="All" && $status == "All"){
            $rents = Rent::where('projects_id',$project)->with('project')
                ->orderBy('entryDate','desc')->with('project')->with('flat')->with('customer')->get();
        }
        else{
            $rents = Rent::where('projects_id',$project)->where('status',$status)
                ->orderBy('entryDate','desc')->with('project')->with('flat')->with('customer')->get();
        }
        return view('report.rents',compact('rents','project','status','projects'));
    }

    public function collections(Request $request)
    {
        $projects = Project::select('id','name')->pluck('name','id');
        $projects->prepend('All','All');
        $projects->prepend('None','None');

        $customers = Customer::select('id','name')->pluck('name','id');
        $customers->prepend('All','All');
        $customers->prepend('None','None');

        $project = $request->has('project') ? $request->get('project') : 'All';
        $customer = $request->has('customer') ? $request->get('customer') : 'All';

        $fromDate = $request->has('fromDate') ? Carbon::createFromFormat('d/m/Y', $request->get('fromDate') )->format('Y-m-d') : Carbon::today()->subDays(10)->format('Y-m-d');
        $toDate = $request->has('toDate') ? Carbon::createFromFormat('d/m/Y', $request->get('toDate'))->format('Y-m-d') : Carbon::today()->format('Y-m-d');

        $reportTitle = "all projects and customers";
        if($project !="None" && $project != "All") {
            $projectInfo = Project::where('id',$project)->first();
            $reportTitle = $projectInfo->name;
            $rent_ids = Rent::select('id')->where('projects_id',$project)->pluck('id');
            $collections = RentCollection::whereIn('rents_id',$rent_ids)
                ->where('collectionDate','>=',$fromDate)->where('collectionDate','<=',$toDate)
                ->orderBy('collectionDate','desc')->with('customer')->with('entry')->get();
        }
        else if($customer != "None" &&  $customer !="All"){
            $customerInfo = Customer::where('id',$customer)->first();
            $reportTitle = $customerInfo->name;
            $collections = RentCollection::where('customers_id',$customer)
                ->where('collectionDate','>=',$fromDate)->where('collectionDate','<=',$toDate)
                ->orderBy('collectionDate','desc')->with('customer')->with('entry')->get();
        }
        else{
            $project = 'All';
            $customer = 'All';
            $collections = RentCollection::where('collectionDate','>=',$fromDate)->where('collectionDate','<=',$toDate)
                ->orderBy('collectionDate','desc')->with('customer')->get();
        }
        $fromDate = Carbon::createFromFormat('Y-m-d', $fromDate)->format('d/m/Y');
        $toDate = Carbon::createFromFormat('Y-m-d', $toDate)->format('d/m/Y');
        return view('report.collections',compact('collections','project','customer','projects','customers','fromDate','toDate','reportTitle'));
    }

    public function rentaStatus(Request $request)
    {
        $projects = Project::select('id','name')->pluck('name','id');
//        $projects->prepend('All','All');
//        $projects->prepend('None','None');

//        $customers = Customer::select('id','name')->pluck('name','id');
//        $customers->prepend('All','All');
//        $customers->prepend('None','None');

//        $project = $request->has('project') ? $request->get('project') : 'All';
        $isSubmit = $request->has('isSubmit') ? 1 : 0;
        $project = $request->has('project') ? $request->get('project') : 0;
        $monthYear = $request->has('monthYear') ?  $request->get('monthYear') : date('m-Y');
        $myPart = mb_split('-',$monthYear);
//        $customer = $request->has('customer') ? $request->get('customer') : 'All';

//        $fromDate = $request->has('fromDate') ? Carbon::createFromFormat('d/m/Y', $request->get('fromDate') )->format('Y-m-d') : Carbon::today()->subDays(10)->format('Y-m-d');
//        $toDate = $request->has('toDate') ? Carbon::createFromFormat('d/m/Y', $request->get('toDate'))->format('Y-m-d') : Carbon::today()->format('Y-m-d');
        $reportData = [];
        $projectName = '';
        if($isSubmit and $project){
            $projectInfo = Project::where('id',$project)->first();
            $projectName = $projectInfo->name;
            $flats = Flat::where('projects_id',$project)->get();
            foreach ($flats as $flat){
                if($flat->status==1){
                    $rent = Rent::where('flats_id',$flat->id)->where('status',1)->with('customer')->first();
                    if(count($rent)){
                        $collection = RentCollection::select('amount','note')
                            ->where('rents_id',$rent->id)
                            ->whereMonth('collectionDate', '=', $myPart[0])
                            ->whereYear('collectionDate', '=', $myPart[1])
                            ->first();
                        if(count($collection)){

                            $rdata = [
                                'location' => $flat->description,
                                'customer' => $rent->customer->name,
                                'period' => $rent->deedStart->format('F,Y').' to '.$rent->deedEnd->format('F,Y'),
                                'rent' => $rent->rent,
                                'advanceMoney' => $rent->advanceMoney,
                                'monthlyDeduction' => $rent->monthlyDeduction,
                                'monthlyDeductionTax' => $rent->monthlyDeductionTax,
                                'serviceCharge' => $rent->serviceCharge,
                                'netPayment' => $collection->amount,
                                'remarks' => $collection->note,
                            ];
                        }
                        else{
                            $rdata = [
                                'location' => $flat->description,
                                'customer' => $rent->customer->name,
                                'period' => $rent->deedStart->format('F,Y').' to '.$rent->deedEnd->format('F,Y'),
                                'rent' => $rent->rent,
                                'advanceMoney' => $rent->advanceMoney,
                                'monthlyDeduction' => $rent->monthlyDeduction,
                                'monthlyDeductionTax' => $rent->monthlyDeductionTax,
                                'serviceCharge' => $rent->serviceCharge,
                                'netPayment' => 0.00,
                                'remarks' => $rent->note,
                            ];
                        }

                    }
                    else{
                        $rdata = [
                            'location' => $flat->description,
                            'customer' => 'Vacant',
                            'period' => '-',
                            'rent' => 0.00,
                            'advanceMoney' => '-',
                            'monthlyDeduction' => '-',
                            'monthlyDeductionTax' => '-',
                            'serviceCharge' => 0.00,
                            'netPayment' => 0.00,
                            'remarks' => '-'
                        ];
                    }

                }
                else{
                    $rdata = [
                        'location' => $flat->description,
                        'customer' => 'Vacant',
                        'period' => '-',
                        'rent' => 0.00,
                        'advanceMoney' => '-',
                        'monthlyDeduction' => '-',
                        'monthlyDeductionTax' => '-',
                        'serviceCharge' => 0.00,
                        'netPayment' => 0.00,
                        'remarks' => '-'
                    ];
                }

                array_push($reportData,$rdata);
            }
        }
//        $fromDate = Carbon::createFromFormat('Y-m-d', $fromDate)->format('d/m/Y');
//        $toDate = Carbon::createFromFormat('Y-m-d', $toDate)->format('d/m/Y');
        $monthYear = Carbon::createFromFormat('m-Y', $monthYear);
        return view('report.overall',compact('reportData','project','projects','monthYear','projectName'));
    }

    public function expenses(Request $request)
    {
        $projects = Project::select('id','name')->pluck('name','id');
        $projects->prepend('All','All');
        $project = $request->has('project') ? $request->get('project') : 'All';
        $fromDate = $request->has('fromDate') ? Carbon::createFromFormat('d/m/Y', $request->get('fromDate') )->format('Y-m-d') : Carbon::today()->subDays(10)->format('Y-m-d');
        $toDate = $request->has('toDate') ? Carbon::createFromFormat('d/m/Y', $request->get('toDate'))->format('Y-m-d') : Carbon::today()->format('Y-m-d');

        $reportTitle = "all projects";

        if($project != "All") {
            $projectInfo = Project::where('id',$project)->first();
            $reportTitle = $projectInfo->name;
            $expenses = Expense::where('projects_id',$projectInfo->id)
                ->where('entryDate','>=',$fromDate)->where('entryDate','<=',$toDate)
                ->orderBy('entryDate','desc')->with('project')->with('entry')->get();
        }
        else{
            $expenses = Expense::where('entryDate','>=',$fromDate)->where('entryDate','<=',$toDate)
                ->orderBy('entryDate','desc')->with('project')->with('entry')->get();
        }
        $fromDate = Carbon::createFromFormat('Y-m-d', $fromDate)->format('d/m/Y');
        $toDate = Carbon::createFromFormat('Y-m-d', $toDate)->format('d/m/Y');
        return view('report.expenses',compact('expenses','project','projects','fromDate','toDate','reportTitle'));
    }

    public function balance(Request $request)
    {


        $expenses = DB::table('expenses')->where('deleted_at',null)->sum('amount');
        $collections = DB::table('collections')->where('deleted_at',null)->sum('amount');
        return view('report.balance',compact('expenses','collections'));
    }

    public function dues(Request $request)
    {

        $monthYear = $request->has('monthYear') ?  $request->get('monthYear') : date('m-Y');
        $myPart = mb_split('-',$monthYear);

        $collectionsHave = RentCollection::select('rents_id')->whereMonth('collectionDate', '=', $myPart[0])->whereYear('collectionDate', '=', $myPart[1])
            ->pluck('rents_id');
        $notPaidRentCustomers = Rent::with('customer')
            ->where('status',1)
            ->whereNotIn('id',$collectionsHave)
            ->get();
        $monthYear = Carbon::createFromFormat('m-Y', $monthYear);
        return view('report.dues',compact('dues','monthYear','notPaidRentCustomers'));
    }
}
