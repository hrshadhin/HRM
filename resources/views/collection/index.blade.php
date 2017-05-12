@extends('layouts.master')

@section('title', 'Collection List')
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
        <li class="active">Collections</li>
        <li><a href="{{URL::Route('collection.create')}}">New Collection</a></li>
      </ol>
    </div><!--end .section-header -->
    <div class="section-body">
      <section>
        <div class="section-body">
          <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-head style-primary">
                  <header>Collection List</header>
                </div>
                <div class="card-body no-padding">
                  <div class="table-responsive no-margin">
                    <table class="table table-striped no-margin">
                      <thead>
                      <tr>
                        <th width="5%" class="text-center">#SL</th>
                        <th width="10%" class="text-center">Date</th>
                        <th width="20%" class="text-center">Customer</th>
                        <th width="15%" class="text-center">Amount</th>
                        <th width="15%" class="text-center">Type</th>
                        <th width="15%" class="text-center">Notes</th>
                        <th width=10%" class="text-center">Entry At</th>
                        <th width="5%" class="text-center">By</th>
                        <th width="5%" class="text-center">Action</th>
                      </tr>
                      </thead>
                      <tbody>
                      @foreach($collections as $collection)
                        <tr>
                          <td class="text-center">{{$collection->collectionNo}}</td>
                          <td class="text-center">{{$collection->collectionDate->format('d/m/y')}}</td>
                          <td class="text-center">{{$collection->customer->name}} [{{$collection->customer->cellNo}}]</td>
                          <td class="text-center">{{$collection->amount}}</td>
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
                          <td class="text-center">{{$collection->note}}</td>
                          <td class="text-center">{{$collection->created_at->format('d/m/y h:i A')}}</td>
                          <td class="text-center">{{$collection->entry->name}}</td>
                          <td>
                            <div class="btn-group pull-right">
                              @can('cullection.destroy')
                              <form class="myAction" method="POST" action="{{URL::route('collection.destroy',$collection->id)}}">
                                <input name="_method" type="hidden" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <button type="submit" class="btn ink-reaction btn-floating-action btn-danger btn-sm" title="Delete">
                                  <i class="fa fa-fw fa-trash"></i>
                                </button>
                              </form>
                                @endcan
                            </div>
                            <!--end .btn-group -->
                          </td>
                        </tr>
                      @endforeach
                      </tbody>
                    </table>
                  </div><!--end .table-responsive -->
                  {{ $collections->links() }}
                </div><!--end .card-body -->
              </div><!--end .card -->
            </div><!--end .col -->
          </div><!--end row -->

        </div>
      </section>
    </div>

  </section>

@endsection

@section('extraScript')
  <script>
      $( document ).ready(function() {


      });
  </script>
@endsection