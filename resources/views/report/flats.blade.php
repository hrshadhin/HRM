@extends('layouts.master')

@section('title', 'Report-flats')
@section('extraStyle')
  <link type="text/css" rel="stylesheet" href="{{url('/')}}/assets/css/libs/select2/select2.css" />

@endsection
@section('content')
  <section>
    <div class="section-header no-print">
      <ol class="breadcrumb">
        <li class="active">Flats Report</li>
      </ol>
    </div><!--end .section-header -->
    <div class="section-body">
      <section>
        <div class="section-body">
          <div class="row no-print">
            <div class="col-lg-12">
              <form class="form form-validate floating-label"
                    novalidate="novalidate"
                    action="{{URL::route('report.flats')}}"
                    method="GET"
                    enctype="multipart/form-data">

                <div class="card">
                  <div class="card-head style-primary">
                    <header>Filters</header>
                  </div>
                  <div class="card-body">
                    <div class="row">
                      <div class="col-lg-4">
                        <div class="form-group">
                          {!! Form::select('project', $projects, $project, ['class' => 'form-control select2-list', 'required' => 'required']) !!}
                          <label for="">Project</label>
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          {!! Form::select('status', ['All' => 'All', '0' => 'Vacant','1' =>'Rented'], $status, ['class' => 'form-control select2-list', 'required' => 'required']) !!}
                          <label for="">Status</label>
                        </div>
                      </div>
                      <div class="col-lg-4">
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
                      <h3 class="text-light text-default-light"><strong>@if($project !="All" and count($flats)){{$flats[0]->project->name}} @endif Flats
                          @if($status !="All" ) [ @if($status==1) Rented @else Vacant @endif] @endif
                        </strong></h3>
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
                          @if($project =="All")
                          <th class="text-center">Project</th>
                          @endif
                          <th class="text-center">Floor</th>
                          <th class="text-center">Type</th>
                          <th class="text-center">Size(sft.)</th>
                          <th class="text-center">Parking</th>
                          @if($status =="All" )
                          <th class="text-center">Staus</th>
                          @endif
                          <th class="text-center">Entry</th>
                        </tr>
                        </thead>
                        <tbody>
                          @foreach($flats as $flat)
                            <tr>
                              @if($project =="All")
                              <td class="text-center">{{$flat->project->name}}</td>
                              @endif
                              <td class="text-center">{{floorLevel($flat->floor)}}</td>
                              <td  class="text-center">{{flatType($flat->type)}}</td>
                              <td  class="text-center">{{$flat->size}}</td>
                              <td  class="text-center">
                                @if($flat->parking == "Yes")
                                  {{$flat->parkingNo}}
                                @else
                                  --
                                @endif
                              </td>
                              @if($status =="All" )
                              <td class="text-center">
                                @if($flat->status == 1)
                                  <span class="text-warning text-bold">Rented</span>
                                @else
                                  <span class="text-success text-bold">Vacant</span>

                                @endif
                              </td>
                              @endif

                              <td class="text-center">{{$flat->entryDate->format('d/m/Y')}}</td>
                            </tr>
                          @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                          <td colspan="@if($project =="All" and $status =="All")6 @endif @if($project == "All" or $status =="All")5 @else 4 @endif" class="text-right"><strong class="text-lg text-default-dark">Total</strong></td>
                          <td class="text-right"><strong class="text-lg text-default-dark">{{count($flats)}}</strong></td>
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
