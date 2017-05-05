<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Rent;
use App\Flat;
use DB;
use Storage;


class RentController extends Controller
{
    public function create()
    {

        $today = Carbon::today();
        $customers = Customer::select(DB::raw("concat(name,'-',cellNo) as text"),"id")->where('active','Yes')->pluck('text','id');
        $customers->prepend('','');
        $rentTotal = Rent::count()+1;
        $rentNo = "R";
        if($rentTotal<10){
            $rentNo .= "00".(string)$rentTotal;
        }
        elseif($rentTotal<100){
            $rentNo .= "0".(string)$rentTotal;
        }
        else{
            $rentNo .= (string)$rentTotal;
        }

        return view('rent.create',compact('today','customers','rentNo'));
    }

    public function store(Request $request)
    {
        //validate form
        $this->validate($request, [
            'projects_id' => 'required',
            'flats_id' => 'required',
            'customers_id' => 'required',
            'entryDate' => 'required',
            'rentNo' => 'required',
            'rent' => 'required|numeric',
            'perSftRent' => 'required|numeric',
            'securityMoney' => 'required|numeric',
            'advanceMoney' => 'required|numeric',
            'utilityCharge' => 'required|numeric',
            'serviceCharge' => 'required|numeric',
            'delayCharge' => 'required|numeric',
            'note' => 'max:1000',
            'deedPaper' => 'mimes:jpeg,bmp,png,gif,svg,pdf',
            'othersPaper' => 'mimes:jpeg,bmp,png,gif,svg,pdf',
        ]);
        $data = $request->all();
        $data['users_id'] = auth()->user()->id;
        if(request()->hasFile('deedPaper')) {
            $data['deepPaper'] = request()->file('deedPaper')->store('rents');
        }
        if(request()->hasFile('othersPaper')) {
            $data['othersPaper'] = request()->file('othersPaper')->store('rents');
        }
        Rent::create($data);
        $flat = Flat::where('id',$data['flats_id'])->first();
        $flat->status = 1;
        $flat->save();
        $notification= array('title' => 'Data Store', 'body' => 'Flat rented Successfully');
        return redirect()->route('rent.index')->with('success',$notification);
    }

    public function index()
    {
        $rents = Rent::orderBy('id','asc')->with('project')->with('flat')->with('entry')->paginate(10);
        return view('rent.index',compact('rents'));
    }

    public function destroy($id)
    {
        $rent = Rent::findOrFail($id);
        $flat = Flat::where('id',$rent->flats_id)->first();
        $flat->status = 0;
        $rent->delete();
        $flat->save();

        $notification= array('title' => 'Data Remove', 'body' => 'Rent deleted Successfully');
        return redirect()->route('rent.index')->with('success',$notification);
    }
}
