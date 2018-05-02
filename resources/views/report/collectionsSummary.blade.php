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
        <li class="active">Collection Summary Report</li>
      </ol>
    </div><!--end .section-header -->
    <div class="section-body">
      <section>
        <div class="section-body">
          <div class="row no-print">
            <div class="col-lg-12">
              <form class="form form-validate floating-label"
                    novalidate="novalidate"
                    action="{{URL::route('report.collectionSummary')}}"
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
                          <input type="text" class="form-control datepicker" value="{{$monthYearFrom}}" name="monthYearFrom" required>
                          <label for="montyYear">Month From</label>
                        </div>
                      </div>
                      <div class="col-lg-2">
                        <div class="form-group">
                          <input type="text" class="form-control datepicker" value="{{$monthYearTo}}" name="monthYearTo" required>
                          <label for="montyYear">Month To</label>
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
                      <span class="text-left" style="font-size:16px">ShanixLab</span>
                    </div>
                    <div class="col-xs-5 text-left">
                      <h3 class="text-light text-default-light"><strong>Collection Summary @if($reportTitle) Of<br>{{ $reportTitle }} @endif</strong></h3>
                    </div>
                    <div class="col-xs-2 text-right">
                      <div class="pull-right">Print:{{ date('d/m/Y') }} </div>
                    </div>
                  </div><!--end .row -->
                  <div class="row">
                    <div class="col-xs-12">
                      <div class="well">
                        <div class="clearfix">
                          <div class="text-center text-bold text-default-dark"> Reports from  <i>{{date('F, Y',strtotime('01-'.$monthYearFrom))}}</i>  to  <i>{{date('F, Y',strtotime('01-'.$monthYearTo))}}</i> </div>
                        </div>
                      </div>
                    </div>

                  </div>
                  <br>
                  <div class="row">
                    <div class="col-md-12">
                      @php ($grandTotalR = 0)
                        @php ($grandTotalC = 0)
                          @php ($grandTotalD = 0)
                            @foreach($data as $date=>$datum)
                              <h4 class="text-bold">{{date('F, Y',strtotime($date))}}</h4>
                              <hr>
                              <table class="table table-striped">
                                <thead>
                                <tr>
                                  <th width="40%" class="text-left">Customer</th>
                                  <th width="20%" class="text-center">Total Rent(&#2547;)</th>
                                  <th width="20%" class="text-center">Total Collection(&#2547;)</th>
                                  <th width="20%" class="text-center">Total Due(&#2547;)</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php ($mTotalR = 0)
                                  @php ($mTotalC = 0)
                                    @php ($mTotalD = 0)
                                      @foreach($datum as $rent)
                                        <tr>
                                          <td class="text-left">{{ $rent->customer->name }} # {{$rent->customer->cellNo}}</td>
                                          <td class="text-center">
                                            @php($tRent = ($rent->rent+$rent->serviceCharge+$rent->utilityCharge))
                                              {{number_format($tRent,2,'.','')}}
                                          </td>
                                          <td class="text-center">
                                            @php($collection = 0)
                                              @if(isset($rent->collectionSum->first()->total))
                                                @php($collection = $rent->collectionSum->first()->total)
                                                  @endif
                                                  {{number_format($collection,2,'.','')}}
                                          </td>
                                          <td class="text-center">
                                            @php($due = ($tRent-$collection))
                                              {{number_format($due,2,'.','')}}
                                          </td>
                                          @php ($mTotalR += $tRent)
                                            @php ($mTotalC += $collection)
                                              @php ($mTotalD += $due)

                                        </tr>
                                      @endforeach
                                      <tr>
                                        <td class="text-center"><strong class="text-lg text-default-dark">Total</strong></td>
                                        <td class="text-center"><strong class="text-lg text-default-dark bdMoney">{{number_format($mTotalR,2,'.',',')}}</strong>&#2547;</td>
                                        <td class="text-center"><strong class="text-lg text-default-dark bdMoney">{{number_format($mTotalC,2,'.',',')}}</strong>&#2547;</td>
                                        <td class="text-center"><strong class="text-lg text-default-dark bdMoney">{{number_format($mTotalD,2,'.',',')}}</strong>&#2547;</td>
                                      </tr>
                                </tbody>

                              </table>
                              @php ($grandTotalR += $mTotalR)
                                @php ($grandTotalC += $mTotalC)
                                  @php ($grandTotalD += $mTotalD)
                            @endforeach

                    </div><!--end .col -->
                  </div><!--end .row -->
                  @if(count($data)>1)
                    <br>
                    <div class="row">
                      <div class="col-sm-12">
                        <table width="100%">
                          <tr>
                            <td width="33.33%" class="text-center">
                              <div class="well" style="margin: 10px;">
                                <strong class="text-lg text-default-dark">Grand Total Rent<br>{{number_format($grandTotalR,2,'.',',')}}</strong>&#2547;
                              </div>
                            </td>
                            <td width="33.33%" class="text-center">
                              <div class="well" style="margin: 10px;">
                                <strong class="text-lg text-default-dark">Grand Total Collection<br>{{number_format($grandTotalC,2,'.',',')}}</strong>&#2547;
                              </div>
                            </td>
                            <td width="33.33%" class="text-center">
                              <div class="well" style="margin: 10px;">
                                <strong class="text-lg text-default-dark">Grand Total Due<br>{{number_format($grandTotalD,2,'.',',')}}</strong>&#2547;

                              </div>
                            </td>
                          </tr>
                        </table>
                      </div>
                    </div>

                    @endif

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
