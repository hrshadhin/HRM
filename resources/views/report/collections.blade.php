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
        <li class="active">Collections Report</li>
      </ol>
    </div><!--end .section-header -->
    <div class="section-body">
      <section>
        <div class="section-body">
          <div class="row no-print">
            <div class="col-lg-12">
              <form class="form form-validate floating-label"
                    novalidate="novalidate"
                    action="{{URL::route('report.collections')}}"
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
                      <div class="col-lg-3">
                        <div class="form-group">
                          {!! Form::select('customer', $customers, $customer, ['id' => 'customers_id', 'class' => 'form-control select2-list', 'required' => 'required']) !!}
                          <label for="">Customer</label>
                        </div>
                      </div>
                      <div class="col-lg-2">
                        <div class="form-group">
                          <input type="text" class="form-control datepicker" value="{{$fromDate}}" name="fromDate" required>
                          <label for="entryDate">From date</label>
                        </div>
                      </div>
                      <div class="col-lg-2">
                        <div class="form-group">
                          <input type="text" class="form-control datepicker" value="{{$toDate}}" name="toDate" required>
                          <label for="entryDate">To date</label>
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
                      <span class="text-left" style="font-size:16px">ShanixLab</span>
                   </div>
                    <div class="col-xs-3 text-right">
                      <h1 class="text-light text-default-light"><strong>Collections</strong></h1>
                    </div>
                    <div class="col-xs-2 text-right">
                      <div class="pull-right">Print:{{ date('d/m/Y') }} </div>
                    </div>
                  </div><!--end .row -->
                  <div class="row">
                    <div class="col-xs-6">
                      <div class="well">
                        <div class="clearfix">
                          <div class="text-center text-bold text-default-dark"> Reports Of {{ $reportTitle }} </div>
                        </div>
                      </div>
                  </div>
                    <div class="col-xs-6">
                      <div class="well">
                        <div class="clearfix">
                          <div class="text-center text-bold text-default-dark"> <strong>From</strong> {{ $fromDate }} <strong>To</strong> {{ $toDate }} </div>
                        </div>
                      </div>
                  </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <table class="table table-striped">
                        <thead>
                        <tr>
                          <th width="5%" class="text-center">#SL</th>
                          <th width="5%" class="text-center">Date</th>
                          <th width="25%" class="text-center">Customer</th>
                          <th width="20%" class="text-center">Amount(&#2547;)</th>
                          <th width="25%" class="text-center">Type</th>
                          <th width=15%" class="text-center">Entry At</th>
                          <th width="5%" class="text-center">By</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php ($grandTotal = 0)
                        @foreach($collections as $collection)
                          <tr>
                            <td class="text-center">{{$collection->collectionNo}}</td>
                            <td class="text-center">{{$collection->collectionDate->format('d/m/y')}}</td>
                            <td class="text-center">{{$collection->customer->name}} [{{$collection->customer->cellNo}}]</td>
                            <td class="text-center">{{$collection->amount}}
                              @php ($grandTotal += $collection->amount)
                            </td>
                            <td class="text-center">
                              @if($collection->collectionType == "Cheque")
                                <span class="text-info text-bold">Cheque, {{$collection->chequeNo}}, {{$collection->bankName}}, {{$collection->branchName}}</span>
                              @elseif($collection->collectionType == "P.O")
                                <span class="text-warning text-bold">P.O, {{$collection->poNo}}, {{$collection->poName}}, {{$collection->poCode}}</span>
                              @else
                                @if($collection->fromAdvance == 1)
                                  <span class="text-success text-bold">Cash [from advance]</span>
                                @else
                                  <span class="text-success text-bold">Cash</span>
                                @endif
                              @endif
                            </td>
                            <td class="text-center">{{$collection->created_at->format('d/m/y h:i A')}}</td>
                            <td class="text-center">{{$collection->entry->name}}</td>

                          </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                          <td class="text-center"><strong class="text-lg text-default-dark">{{count($collections)}}</strong></td>
                          <td colspan="2" class="text-center"><strong class="text-lg text-default-dark">Total</strong></td>
                          <td class="text-center"><strong class="text-lg text-default-dark">&#2547;{{$grandTotal}}</strong></td>
                          <td colspan="4"></td>
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
              format: 'dd/mm/yyyy',
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
