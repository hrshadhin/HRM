@extends('layouts.master')

@section('title', 'Report-Collections')
@section('extraStyle')
  <link type="text/css" rel="stylesheet" href="{{url('/')}}/assets/css/libs/select2/select2.css" />
  <link type="text/css" rel="stylesheet" href="{{url('/')}}/assets/css/libs/bootstrap-datepicker/datepicker3.css" />
@endsection
@section('content')
  <section>
    <div class="section-header no-print">
      <ol class="breadcrumb">
        <li class="active">Collection Due Report</li>
      </ol>
    </div><!--end .section-header -->
    <div class="section-body">
      <section>
        <div class="section-body">
          <div class="row no-print">
            <div class="col-lg-12">
              <form class="form form-validate floating-label"
                    novalidate="novalidate"
                    action="{{URL::route('report.dues')}}"
                    method="GET"
                    enctype="multipart/form-data">

                <div class="card">
                  <div class="card-head style-primary">
                    <header>Filters</header>
                  </div>
                  <div class="card-body">
                    <div class="row">
                      {{--<div class="col-lg-3">--}}
                        {{--<div class="form-group">--}}
                          {{--{!! Form::select('project', $projects, $project, ['id' => 'projects_id', 'class' => 'form-control select2-list', 'required' => 'required']) !!}--}}
                          {{--<label for="">Project</label>--}}
                        {{--</div>--}}
                      {{--</div>--}}
                      {{--<div class="col-lg-3">--}}
                        {{--<div class="form-group">--}}
                          {{--{!! Form::select('customer', $customers, $customer, ['id' => 'customers_id', 'class' => 'form-control select2-list', 'required' => 'required']) !!}--}}
                          {{--<label for="">Customer</label>--}}
                        {{--</div>--}}
                      {{--</div>--}}
                      {{--<div class="col-lg-2">--}}
                        {{--<div class="form-group">--}}
                          {{--<input type="text" class="form-control datepicker" value="{{$fromDate}}" name="fromDate" required>--}}
                          {{--<label for="entryDate">From date</label>--}}
                        {{--</div>--}}
                      {{--</div>--}}
                      <div class="col-lg-4">
                        <div class="form-group">
                          <input type="text" class="form-control datepicker" value="{{$monthYear->format('m-Y')}}" name="monthYear" required>
                          <label for="montyYear">Month</label>
                        </div>
                      </div>
                      <div class="col-lg-2">
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
                    <div class="col-xs-7">
                      <img src="/assets/img/logo.png" height="80px" width="100px" alt="">
                      <span class="text-left" style="font-size:16px">Shamsul Alamin Real Estate Ltd.</span>
                   </div>
                    <div class="col-xs-3 text-right">
                      <h1 class="text-light text-default-light"><strong>Collection Due</strong></h1>
                    </div>
                    <div class="col-xs-2 text-right">
                      <div class="pull-right">Print:{{ date('d/m/Y') }} </div>
                    </div>
                  </div><!--end .row -->
                  <div class="row">
                    <div class="col-xs-6">
                      <div class="well">
                        <div class="clearfix">
                          <div class="text-center text-bold text-default-dark"> Reports due colelction of {{$monthYear->format('F,Y')}} </div>
                        </div>
                      </div>
                  </div>

                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <table class="table table-striped">
                        <thead>
                        <tr>
                          <th width="40%" class="text-center">Customer</th>
                          <th width="20%" class="text-center">Rent(&#2547;)</th>
                          <th width="20%" class="text-center">Service Charge</th>
                          <th width="20%" class="text-center">Utility Charge</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php ($grandTotalR = 0)
                        @php ($grandTotalS = 0)
                        @php ($grandTotalU = 0)
                        @foreach($notPaidRentCustomers as $rent)
                          <tr>
                            <td class="text-center">{{$rent->customer->name}} [{{$rent->customer->cellNo}}]</td>
                            <td class="text-center">{{$rent->rent}}
                            <td class="text-center">{{$rent->serviceCharge}}
                            <td class="text-center">{{$rent->utilityCharge}}
                              @php ($grandTotalR += $rent->rent)
                              @php ($grandTotalS += $rent->serviceCharge)
                              @php ($grandTotalU += $rent->utilityCharge)
                            </td>

                          </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                          <td class="text-center"><strong class="text-lg text-default-dark">Total</strong></td>
                          <td class="text-center"><strong class="text-lg text-default-dark">&#2547;{{$grandTotalR}}</strong></td>
                          <td class="text-center"><strong class="text-lg text-default-dark">&#2547;{{$grandTotalS}}</strong></td>
                          <td class="text-center"><strong class="text-lg text-default-dark">&#2547;{{$grandTotalU}}</strong></td>
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
  <script src="{{url('/')}}/assets/js/libs/bootstrap-datepicker/bootstrap-datepicker.js"></script>

  <script type="text/javascript">
      $( document ).ready(function() {
          $('.datepicker').datepicker({
              format: 'mm-yyyy',
              viewMode: "months",
              minViewMode: "months",
              autoclose: true,
              todayHighlight : true

          });
          $('#menubarToggler').trigger('click');
          $('select').select2();

      });
  </script>
@endsection
