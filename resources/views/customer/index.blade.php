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
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table no-margin">
                    <thead>
                      <tr>
                        <th>Photo</th>
                        <th>Name</th>
                        <th>Code</th>
                        <th>Mobile No</th>
                        <th>Phone No</th>
                        <th>Email</th>
                        <th>DOB</th>
                        <th>Profession</th>
                        <th>Active</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($customers as $customer)
                      <tr>
                        <td>
                      <img src="{{URL::asset('assets/images')}}/{{$customer->photo}}" alt="" class="" width="80px" height="70px">
                        </td>
                        <td>{{$customer->title}} {{$customer->name}}</td>
                        <td>{{$customer->code}}</td>
                        <td>{{$customer->cellNo}}</td>
                        <td>{{$customer->phoneNo}}</td>
                        <td>{{$customer->email}}</td>
                        <td>{{$customer->dob->format('F j, Y')}}</td>
                        <td>{{$customer->profession}}</td>
                        <td>{{$customer->active}}</td>
                        <td>
                          <div class="btn-group">

                            <button type="button" class="btn ink-reaction btn-primary dropdown-toggle" data-toggle="dropdown">
                              Action <i class="fa fa-caret-down"></i>
                            </button>
                            <ul class="dropdown-menu animation-zoom" role="menu">
                              <li><a href="{{URL::route('customer.show',$customer->id)}}"><span class=""><i class="fa fa-fw fa-th text-info"></i> Details</span></a></li>
                              <li><a href="{{URL::route('customer.print',$customer->id)}}"><span class=""><i class="fa fa-fw fa-print text-info"></i> Print Info</span></a></li>
                              <li><a href="{{URL::route('customer.edit',$customer->id)}}"><span class=""><i class="fa fa-fw fa-edit text-info"></i> Edit</span></a></li>
                              <li class="divider"></li>
                              <li>
                                <form class="deleteForm" method="POST" action="{{URL::route('customer.destroy',$customer->id)}}">
                                  <input name="_method" type="hidden" value="DELETE">
                                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                  <button type="submit" class="btn btn-flat">
                                    <i class="fa fa-fw fa-trash text-danger"></i>
                                     Delete
                                   </button>
                                  </form>

                                </li>
                              </ul>
                            </div><!--end .btn-group -->
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
