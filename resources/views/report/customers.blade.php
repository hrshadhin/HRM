@extends('layouts.master')

@section('title', 'Report-customers')
@section('extraStyle')
  <link type="text/css" rel="stylesheet" href="{{url('/')}}/assets/css/libs/select2/select2.css" />

@endsection
@section('content')
  <section>
    <div class="section-header no-print">
      <ol class="breadcrumb">
        <li class="active">Customer Report</li>
      </ol>
    </div><!--end .section-header -->
    <div class="section-body">
      <section>
        <div class="section-body">
          <div class="row no-print">
            <div class="col-lg-12">
              <form class="form form-validate floating-label"
                    novalidate="novalidate"
                    action="{{URL::route('report.customers')}}"
                    method="GET"
                    enctype="multipart/form-data">

                <div class="card">
                  <div class="card-head style-primary">
                    <header>Filters</header>
                  </div>
                  <div class="card-body">
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="form-group">
                          {!! Form::select('status', ['All' => 'All', 'No' => 'Inactive','Yes' =>'Active'], $status, ['class' => 'form-control select2-list', 'required' => 'required']) !!}
                          <label for="">Status</label>
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary ink-reaction"><i class="md md-filter-list"></i> get</button>
                        </div>
                      </div>
                    </div>

                  </div><!--end .card-body -->
                </div><!--end .card -->
              </form>

            </div>
          </div>
          <div class="row">
            <div class="col-lg-12">
              <div class="card card-printable style-default-light">
                <div class="card-head no-print">
                  <div class="tools">
                    <div class="btn-group">
                      <a class="btn btn-floating-action btn-primary" href="javascript:void(0);" onclick="javascript:window.print();"><i class="md md-print"></i></a>
                    </div>
                  </div>
                </div><!--end .card-head -->
                <div class="card-body style-default-bright top-zero">
                  <div class="row">
                    <div class="col-xs-5">
                      <img src="/assets/img/logo.png" height="80px" width="100px" alt="">
                      <span class="text-left" style="font-size:16px">Shamsul Alamin Real Estate Ltd.</span>
                    </div>
                    <div class="col-xs-5 text-left">
                      <h3 class="text-light text-default-light"><strong>Customers @if($status != "All")[ @if($status == "No") Inactive @else Active @endif] @endif</strong></h3>
                    </div>
                    <div class="col-xs-2 text-right">
                      <div class="pull-right">Print:{{ date('d/m/Y') }} </div>
                    </div>
                  </div><!--end .row -->

                  <div class="row">
                    <div class="col-md-12">
                      <table class="table table-striped">
                        <thead>
                        <tr>
                          <th style="width:15%" class="text-center">Name</th>
                          <th style="width:10%" class="text-center">Mobile</th>
                          <th style="width:10%" class="text-center">Phone</th>
                          <th style="width:20%" class="text-center">Permanent Address</th>
                          <th style="width:20%" class="text-center">Mailing Address</th>
                          <th style="width:10%" class="text-center">Contact Person</th>
                          <th style="width:10%" class="text-center">C.P Mobile</th>
                          @if($status == "All")
                          <th style="width:5%" class="text-center">Status</th>
                          @endif
                          <th style="width:10%" class="text-center">Entry</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($customers as $customer)
                          <tr>
                            <td class="text-center">{{$customer->name}}</td>
                            <td class="text-center">{{$customer->cellNo}}</td>
                            <td class="text-center">{{$customer->phone}}</td>
                            <td class="text-center">{{$customer->permanentAddress}}</td>
                            <td class="text-center">{{$customer->mailingAddress}}</td>
                            <td class="text-center">{{$customer->contactPerson}}</td>
                            <td class="text-center">{{$customer->contactPersonCellNo}}</td>
                            @if($status == "All")
                            <td class="text-center">
                              @if($customer->active == "No")
                                <span class="text-warning text-bold">Inactive</span>
                              @else
                                <span class="text-success text-bold">Active</span>

                              @endif
                            </td>
                            @endif

                            <td class="text-center">{{$customer->entryDate->format('d/m/Y')}}</td>
                          </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                          <td colspan="8" class="text-right"><strong class="text-lg text-default-dark">Total</strong></td>
                          <td class="text-right"><strong class="text-lg text-default-dark">{{count($customers)}}</strong></td>
                        </tr>
                        </tfoot>
                      </table>
                    </div><!--end .col -->
                  </div><!--end .row -->

                </div><!--end .card-body -->
              </div><!--end .card -->
            </div><!--end .col -->
          </div><!--end .row -->
        </div>
      </section>
    </div>

  </section>
@endsection

@section('extraScript')
  <script src="{{url('/')}}/assets/js/libs/select2/select2.min.js"></script>

  <script type="text/javascript">
      $( document ).ready(function() {
          $('#menubarToggler').trigger('click');
          $('select').select2();

      });
  </script>
@endsection
