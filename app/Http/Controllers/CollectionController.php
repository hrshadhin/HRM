<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\RentCollection;
use Carbon\Carbon;
use App\Rent;

class CollectionController extends Controller
{
    public function create()
    {
        $today = Carbon::today();
//        $customers = Customer::select(DB::raw("concat(name,'-',cellNo) as text"),"id")->where('active','Yes')->pluck('text','id');
//        $customers->prepend('','');
        $collectionTotal = RentCollection::count()+1;
        $collectionNo = "C";
        if($collectionTotal<10){
            $collectionNo .= "00".(string)$collectionTotal;
        }
        elseif($collectionTotal<100){
            $collectionNo .= "0".(string)$collectionTotal;
        }
        else{
            $collectionNo .= (string)$collectionTotal;
        }

        return view('collection.create',compact('today','collectionNo'));
    }

    public function store(Request $request)
    {
        $rules =  [
            'customers_id' => 'required|numeric',
            'rents_id' => 'required|numeric',
            'amount' => 'required|numeric',
            'collectionType' => 'required'
        ];
        if($request->get('collectionType')=="Cheque"){
            $rules['chequeNo'] = 'required';
            $rules['bankName'] = 'required';
            $rules['branchName'] = 'required';
        }
        if($request->get('collectionType')=="P.O"){
            $rules['poNo'] = 'required';
            $rules['poName'] = 'required';
            $rules['poCode'] = 'required';
        }
        //validate form
        $this->validate($request,$rules);
        $data = $request->all();
        $data['users_id'] = auth()->user()->id;
        //advance money d
        if($data['collectionType']=="Cash"){
            $rent = Rent::where('id',$data['rents_id'])->first();
            $paidAmount = floatval($data['amount']);

            RentCollection::create($data);
            if($rent->advanceMoney >= $paidAmount){
                $rent->advanceMoney -= $paidAmount;
                $data['fromAdvance'] = 1;
                $rent->save();
            }

        }
        else{
            RentCollection::create($data);
        }
        $notification= array('title' => 'Data Store', 'body' => 'Rent collected Successfully');
        return redirect()->route('collection.create')->with('success',$notification);
    }

    public function index()
    {
        $collections = RentCollection::orderBy('collectionDate','desc')->with('customer')->with('entry')->paginate(10);
        return view('collection.index',compact('collections'));
    }

    public function destroy($id)
    {
        $collection = RentCollection::findOrFail($id);
        if($collection->fromAdvance == 1){
            $rent = Rent::findOrFail($collection->rents_id);
            $rent->advanceMoney += $collection->amount;
            $rent->save();
        }

        $collection->delete();
        $notification= array('title' => 'Data Remove', 'body' => 'Collection deleted Successfully');
        return redirect()->route('collection.index')->with('success',$notification);
    }


}
