@extends('layouts.master')

@section('title', 'Customer List')
@section('extraStyle')
<style>
th{
  font-weight: blod !important;
  color:#000 !important;
}
</style>
@endsection
@section('content')
<section>
  <div class="section-header">
    <ol class="breadcrumb">
      <li class="active">Customers</li>
      <li><a href="{{URL::Route('customer.create')}}">Create</a></li>
    </ol>
  </div><!--end .section-header -->
  <div class="section-body">
    <section>
      <div class="section-body">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-head style-primary">
                <header>Customer List</header>
              </div>
              <div class="card-body no-padding">
                <div class="table-responsive no-margin">
                  <table class="table table-striped no-margin">
                    <thead>
                      <tr>
                        <th class="text-center" >Type</th>
                        <th class="text-center" >Photo</th>
                        <th class="text-center" >Name</th>
                        <th class="text-center" >Mobile No</th>
                        <th class="text-center" >Entry Date</th>
                        <th class="text-center" >Permanent Address</th>
                        <th class="text-center" >Active</th>
                        <th class="text-center" >Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($customers as $customer)
                      <tr>
                        <td>
                          {{$customer->customerType}}
                        </td>
                        <td>
                      <img src="{{URL::asset('storage')}}/@if($customer->photo){{$customer->photo}} @else{{'customers/avatar.png'}}@endif" alt="" class="" width="80px" height="70px">
                        </td>
                        <td>{{$customer->name}}</td>
                        <td>{{$customer->cellNo}}</td>
                        <td>{{$customer->entryDate->format('F j, Y')}}</td>
                        <td>{{$customer->permanentAddress}}</td>
                        <td>{{$customer->active}}</td>
                        <td>
                          <div class="btn-group pull-right">
                            @can('customer.destroy')
                            <form class="myAction" method="POST" action="{{URL::route('customer.destroy',$customer->id)}}">
                              <input name="_method" type="hidden" value="DELETE">
                              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                              <button type="submit" class="btn ink-reaction btn-floating-action btn-danger btn-sm" title="Delete">
                                <i class="fa fa-fw fa-trash"></i>
                              </button>
                            </form>
                            @endcan
                              @can('customer.edit')
                            <a title="Edit" href="{{URL::route('customer.edit',$customer->id)}}" class="btn ink-reaction btn-floating-action btn-info btn-sm myAction"><i class="fa fa-edit"></i></a>
                           @endcan
                            <a title="Details" target="_blank" href="{{URL::route('customer.show',$customer->id)}}"  class="btn ink-reaction btn-floating-action btn-primary btn-sm myAction"><i class="fa fa-list"></i>
                            </a>
                          </div>
                        </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div><!--end .table-responsive -->
                  {{ $customers->links() }}
                </div><!--end .card-body -->
              </div><!--end .card -->
            </div><!--end .col -->
          </div><!--end row -->

        </div>
      </section>
    </div>

  </section>

  @endsection
