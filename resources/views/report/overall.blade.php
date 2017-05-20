@extends('layouts.master')

@section('title', 'Report-Rental Status')
@section('extraStyle')
  <link type="text/css" rel="stylesheet" href="{{url('/')}}/assets/css/libs/select2/select2.css" />
  <link type="text/css" rel="stylesheet" href="{{url('/')}}/assets/css/libs/bootstrap-datepicker/datepicker3.css" />
@endsection
@section('content')
  <section>
    <div class="section-header no-print">
      <ol class="breadcrumb">
        <li class="active">Rental Status</li>
      </ol>
    </div><!--end .section-header -->
    <div class="section-body">
      <section>
        <div class="section-body">
          <div class="row no-print">
            <div class="col-lg-12">
              <form class="form form-validate floating-label"
                    novalidate="novalidate"
                    action="{{URL::route('report.rentalStatus')}}"
                    method="GET"
                    enctype="multipart/form-data">

                <div class="card">
                  <div class="card-head style-primary">
                    <header>Filters</header>
                  </div>
                  <div class="card-body">
                    <div class="row">
                      <div class="col-lg-3">
                        <div class="form-group">
                          {!! Form::select('project', $projects, $project, ['id' => 'projects_id', 'class' => 'form-control select2-list', 'required' => 'required']) !!}
                          <label for="">Project</label>
                        </div>
                      </div>
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
                      {{--<div class="col-lg-2">--}}
                        {{--<div class="form-group">--}}
                          {{--<input type="text" class="form-control datepicker" value="{{$toDate}}" name="toDate" required>--}}
                          {{--<label for="entryDate">To date</label>--}}
                        {{--</div>--}}
                      {{--</div>--}}
                      <input type="hidden" name="isSubmit" value="1">
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
                    <div class="col-xs-5">
                      <img src="/assets/img/logo.png" height="80px" width="100px" alt="">
                      <span class="text-left" style="font-size:16px">Shamsul Alamin Real Estate Ltd.</span>
                   </div>
                    <div class="col-xs-5 text-right">
                      <h1 class="text-light text-default-light"><strong>Rental Status</strong></h1>
                    </div>
                    <div class="col-xs-2 text-right">
                      <div class="pull-right">Print:{{ date('d/m/Y') }} </div>
                    </div>
                  </div><!--end .row -->
                  <div class="row">
                    <div class="col-xs-6">
                      <div class="well">
                        <div class="clearfix">
                          <div class="text-center text-bold text-default-dark"> Reports Of {{ $projectName }}  </div>
                        </div>
                      </div>
                  </div>
                    <div class="col-xs-6">
                      <div class="well">
                        <div class="clearfix">
                          <div class="text-center text-bold text-default-dark"> <strong>{{$monthYear->format('F, Y')}}</strong> </div>
                        </div>
                      </div>
                  </div>
                  </div>
                  <br>
                  <div class="row">
                    <div class="col-md-12">
                      <table class="table table-bordered">
                        <thead>
                        <tr rowspan="2">
                          <th   class="text-center">#SL</th>
                          <th class="text-center">Location</th>
                          <th class="text-center">Name Of Tanant</th>
                          <th class="text-center">Period</th>
                          <th class="text-center">Monthly Rent(&#2547;)</th>
                          <th class="text-center">Advance(&#2547;)</th>
                          <th colspan="2" class="text-center">Deduction</th>
                          <th  class="text-center">Service Charge</th>
                          <th  class="text-center">Net Payment(&#2547;)</th>
                          <th  class="text-center">Remarks</th>
                        </tr>
                        <tr>
                          <th></th>
                          <th></th>
                          <th></th>
                          <th></th>
                          <th></th>
                          <th></th>
                          <th>Advance(&#2547;)</th>
                          <th>Tax(&#2547;)</th>
                          <th></th>
                          <th></th>
                          <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @php ($rentTotal = 0)
                        @php ($serviceTotal = 0)
                        @php ($paymentTotal = 0)
                        @foreach($reportData as $data)
                          <tr>
                            <td class="text-center">{{$loop->index+1}}</td>
                            <td class="text-center">{{$data['location']}}</td>
                            <td class="text-center">{{$data['customer']}}</td>
                            <td class="text-center">{{$data['period']}}</td>
                            <td class="text-center">{{$data['rent']}}
                              @php($rentTotal += $data['rent'])
                            </td>
                            <td class="text-center">{{$data['advanceMoney']}}</td>
                            <td class="text-center">{{$data['monthlyDeduction']}}</td>
                            <td class="text-center">{{$data['monthlyDeductionTax']}}</td>
                            <td class="text-center">{{$data['serviceCharge']}}
                              @php($serviceTotal += $data['serviceCharge'])
                            </td>
                            <td class="text-center">{{$data['netPayment']}}
                              @php($paymentTotal += $data['netPayment'])

                            </td>
                            <td class="text-center">{{$data['remarks']}}</td>

                          </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        @if(count($reportData))
                        <tr>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td class="text-center"><strong class="text-lg text-default-dark">{{$rentTotal}}</strong></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td class="text-center"><strong class="text-lg text-default-dark">{{$serviceTotal}}</strong></td>
                          <td class="text-center"><strong class="text-lg text-default-dark">{{$paymentTotal}}</strong></td>
                          <td></td>
                        </tr>
                          @endif
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
          $('#projects_id').change(function () {
              if($(this).val() != 'None'){
                  $('#customers_id').val('None');
                  $('select').select2();              }
          });

          $('#customers_id').change(function () {
              if($(this).val() != 'None'){
                  $('#projects_id').val('None');
                  $('select').select2();
              }
          });

      });
  </script>
@endsection
