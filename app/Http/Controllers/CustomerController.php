<?php

namespace App\Http\Controllers;

use App\Flat;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\MessageBag;
use App\Customer;
use Storage;


class CustomerController extends Controller
{
  public function create()
    {
        $today = Carbon::now();
        return view('customer.create',compact('today'));
    }
    public function store(Request $request)
    {
        //validate form
        $this->validate($request, [
            'name' => 'required|max:100|min:4',
            'customerType' => 'required',
            'cellNo' => 'required|max:11|min:11|unique:customers',
            'phoneNo' => 'max:15',
            'email' => 'max:100',
            'contactPerson' => 'max:100',
            'contactPersonCellNo' => 'max:11',
            'fatherName'=> 'max:100',
            'motherName'=> 'max:100',
            'spouseName'=> 'max:100',
            'nidNo' => 'required|max:50',
            'passportNo' => 'max:50',
            'mailingAddress' => 'required|max:500',
            'presentAddress' => 'max:500',
            'permanentAddress' => 'required|max:500',
            'passport' => 'mimes:jpeg,bmp,png,gif,svg,pdf',
            'photo' => 'mimes:jpeg,bmp,png,gif,svg',
            'companyName' => 'max:100',
            'designation' => 'max:100',
            'cContactPerson' => 'max:100',
            'cContactPersonCellNo' => 'max:11',
            'cCellNo' => 'max:11',
            'cPhoneNo' => 'max:15',
            'cFaxNo' => 'max:15',
            'cEmail' => 'max:100',
            'cAddress' => 'max:500',
            'cNote' => 'max:1000',
            'entryDate' => 'required',

        ]);
        $data = $request->all();
        if(request()->hasFile('photo'))
          $data['photo']=request()->file('photo')->store('customers');

        if(request()->hasFile('birthCertificate'))
          $data['birthCertificate']=request()->file('birthCertificate')->store('customers');

        if(request()->hasFile('passport'))
          $data['passport']=request()->file('passport')->store('customers');
        $data['users_id'] = auth()->user()->id;
        Customer::create($data);
        $notification= array('title' => 'Data Update', 'body' => 'Customer created Successfully');
        return redirect()->route('customer.index')->with('success',$notification);
    }

    public function index()
    {
        $customers = Customer::orderBy('id','asc')->paginate(10);
        return view('customer.index',compact('customers'));
    }

    public function edit($id)
    {
        $customer = Customer::findOrFail($id);
        return view('customer.edit',compact('customer'));

    }
    public function update(Request $request,$id)
    {
        //validate form
        $this->validate($request, [
            'name' => 'required|max:100|min:4',
            'phoneNo' => 'max:15',
            'email' => 'max:100',
            'contactPerson' => 'max:100',
            'contactPersonCellNo' => 'max:11',
            'fatherName'=> 'max:100',
            'motherName'=> 'max:100',
            'spouseName'=> 'max:100',
            'nidNo' => 'max:50',
            'passportNo' => 'max:50',
            'mailingAddress' => 'max:500',
            'presentAddress' => 'max:500',
            'permanentAddress' => 'required|max:500',
            'birthCertificate' => 'mimes:jpeg,bmp,png,gif,svg,pdf',
            'passport' => 'mimes:jpeg,bmp,png,gif,svg,pdf',
            'photo' => 'mimes:jpeg,bmp,png,gif,svg',
            'companyName' => 'max:100',
            'designation' => 'max:100',
            'cContactPerson' => 'max:100',
            'cContactPersonCellNo' => 'max:11',
            'cCellNo' => 'max:11',
            'cPhoneNo' => 'max:15',
            'cFaxNo' => 'max:15',
            'cEmail' => 'max:100',
            'cAddress' => 'max:500',
            'cNote' => 'max:1000',
        ]);

        $customer = Customer::findOrFail($id);
        if($customer->cellNo != $request->get('cellNo')){
            $existsNumber = Customer::where('cellNo',$request->get('cellNo'))->get();
            if(count($existsNumber)){
                $errors = new MessageBag();
                $errors->add('cellNo', 'this mobile number belongs to another customer!');
                return Redirect::back()->withErrors($errors->all());
            }
        }
        $data = $request->all();
        if(request()->hasFile('photo')) {
            Storage::Delete($customer->photo);
            $data['photo'] = request()->file('photo')->store('customers');
        }

        if(request()->hasFile('birthCertificate')) {
            Storage::Delete($customer->birthCertificate);
            $data['birthCertificate'] = request()->file('birthCertificate')->store('customers');
        }

        if(request()->hasFile('passport')) {
            Storage::Delete($customer->passport);
            $data['passport'] = request()->file('passport')->store('customers');
        }

        if($data['active']=="No"){
            $rents = $customer->rents()->get();
            foreach ($rents as $rent){
                $flat = Flat::where('id',$rent->id)->first();
                $flat->status=0;
                $rent->status=0;
                $rent->save();
                $flat->save();

            }
        }
        $customer->fill($data)->update();
        $notification= array('title' => 'Data Update', 'body' => 'Customer updated Successfully');
        return redirect()->route('customer.index')->with('success',$notification);
    }
    public function show($id){
      $customer = Customer::with('entry')->findOrFail($id);
      return view('customer.show',compact('customer'));
    }

    public function destroy($id)
    {
        $customer = Customer::findOrFail($id);
        $customer->delete();
        $notification= array('title' => 'Data Remove', 'body' => 'Customer deleted Successfully');
        return redirect()->route('customer.index')->with('success',$notification);
    }

    public function customerAjax ($customerId){
        return Customer::findOrFail($customerId);
    }
}
