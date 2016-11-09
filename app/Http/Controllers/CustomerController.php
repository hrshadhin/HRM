<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Customer;

class CustomerController extends Controller
{
  public function create()
    {
        $customerCount = Customer::count();
        $code="c-";
        $customerCount++;
        if($customerCount<10)
          $code = $code.'0'.$customerCount;
        else
          $code = $code.$customerCount;
        return view('customer.create',compact('code'));
    }
    public function store(Request $request)
    {
        //validate form
        $this->validate($request, [
          'title' => 'required|max:20',
          'code' => 'required|max:20|min:2',
          'name' => 'required|max:100|min:2',
          'cellNo' => 'required|max:15|min:11',
          'phoneNo' => 'required|max:15|min:5',
          'email' => 'required|email',
          'dob' => 'required',
          'contactPerson' => 'required|max:100',
          'contactPersonCellNo' => 'required|max:15|min:11',
          'referenceName' => 'required|max:100',
          'referenceContactNo' => 'required|max:15',
          'mailingAddress' => 'required|max:255',
          'profession' => 'required',
          'active' => 'required',
          'salesPerson' => 'required',
          'groupName' => 'required',
          'photo' => 'image'
        ]);
        $data = $request->all();
        if(request()->hasFile('photo'))
          $data['photo']=request()->file('photo')->store('customers');
        Customer::create($data);
        return redirect()->route('customer.index');
    }

    public function index()
    {
        $customers = Customer::orderBy('id','asc')->paginate(5);
        return view('customer.index',compact('customers'));
    }

    public function edit($id){
      return "This feature is being under development.";
    }
    public function show($id){
      return "This feature is being under development.";
    }

    public function destroy($id)
    {
        $customer = Customer::findOrFail($id);
        $customer->delete();
        return redirect()->route('customer.index');
    }

    public function print()
    {
      return "This feature is being under development.";
    }
}
