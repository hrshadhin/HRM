@extends('layouts.master')

@section('title', 'flat List')
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
        <li class="active">Flat</li>
        <li><a href="{{URL::Route('flat.create')}}">Allocate</a></li>
      </ol>
    </div><!--end .section-header -->
    <div class="section-body">
      <section>
        <div class="section-body">
          <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-head style-primary">
                  <header>Flat List</header>
                </div>
                <div class="card-body no-padding">
                  <div class="table-responsive no-margin">
                    <table class="table table-striped no-margin">
                      <thead>
                      <tr>
                        <th width="10%" class="text-center">Project</th>
                        <th width="10%" class="text-center">Floor</th>
                        <th width="5%" class="text-center">Type</th>
                        <th width="10%" class="text-center">Size</th>
                        <th width="10%" class="text-center">Parking</th>
                        <th width="20%" class="text-center">Description</th>
                        <th width="5%" class="text-center">status</th>
                        <th width="10%" class="text-center">Entry Date</th>
                        <th width="10%" class="text-center">Entry By</th>
                        <th width="10%" class="text-center">Action</th>
                      </tr>
                      </thead>
                      <tbody>
                      @foreach($flats as $flat)
                        <tr>
                          <td>{{$flat->project->name}}</td>
                          <td>{{floorLevel($flat->floor)}}</td>
                          <td>{{flatType($flat->type)}}</td>
                          <td>{{$flat->size}}</td>
                          <td>
                            @if($flat->parking == "Yes")
                              {{$flat->parkingNo}}
                              @else
                              --
                              @endif
                          </td>
                          <td>{{$flat->description}}</td>
                          <td>
                            @if($flat->status == 1)
                              <span class="text-warning text-bold">Rented</span>
                            @else
                              <span class="text-success text-bold">Vacant</span>

                            @endif
                          </td>
                          <td>{{$flat->entryDate->format('F j,Y')}}</td>
                          <td>{{$flat->entry->name}}</td>

                          <td>
                            <div class="btn-group pull-right">
                                @can('flat.destroy')
                              <form class="myAction" method="POST" action="{{URL::route('flat.destroy',$flat->id)}}">
                                <input name="_method" type="hidden" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <button type="submit" class="btn ink-reaction btn-floating-action btn-danger btn-sm" title="Delete">
                                  <i class="fa fa-fw fa-trash"></i>
                                </button>
                              </form>
                                @endcan
                                @can('flat.edit')
                              <a title="Edit" href="{{URL::route('flat.edit',$flat->id)}}" class="btn ink-reaction btn-floating-action btn-info btn-sm myAction"><i class="fa fa-edit"></i></a>
                              </a>
                               @endcan

                            </div>
                            <!--end .btn-group -->
                          </td>
                        </tr>
                      @endforeach
                      </tbody>
                    </table>
                  </div><!--end .table-responsive -->
                  {{ $flats->links() }}
                </div><!--end .card-body -->
              </div><!--end .card -->
            </div><!--end .col -->
          </div><!--end row -->

        </div>
      </section>
    </div>

  </section>
  <div class="offcanvas">

    <!-- BEGIN OFFCANVAS DEMO RIGHT -->
    <div id="offcanvas-demo-size2" class="offcanvas-pane width-7">
      <div class="offcanvas-head">
        <header>More Info</header>
        <div class="offcanvas-tools">
          <a class="btn btn-icon-toggle btn-default-light pull-right" data-dismiss="offcanvas">
            <i class="md md-close"></i>
          </a>
        </div>
      </div>

      <div class="offcanvas-body">
        <ul class="list-divided">
          <li><strong>Entry By</strong><br/><span class="opacity-90" id="entryBy"></span></li>
          <li><strong>Description</strong><br/><span class="opacity-90" id="description"></span></li>
          <li><strong>No of units</strong><br/><span class="opacity-90" id="noOfUnits"></span></li>
          <li><strong>No of floor</strong><br/><span class="opacity-90" id="noOfFloor"></span></li>
          <li><strong>No of car parking</strong><br/><span class="opacity-90" id="noOfCarParking"></span></li>
          <li><strong>Unit size</strong><br/><span class="opacity-90" id="unitSize"></span></li>
          <li><strong>Lift</strong><br/><span class="opacity-90" id="lift"></span></li>
          <li><strong>Generator</strong><br/><span class="opacity-90" id="generator"></span></li>
        </ul>
      </div>

    </div>
    <!-- END OFFCANVAS DEMO RIGHT -->
  </div>

@endsection

@section('extraScript')
  <script>
      $( document ).ready(function() {
          $('.detailsBtn').click(function (e) {
              e.preventDefault();
              var infoUrl = $(this).attr('data-url');
              $.getJSON(infoUrl,function(response){
                  if(response){
                      $('#entryBy').text(response.entry.name);
                      $('#description').text(response.description);
                      $('#noOfUnits').text(response.noOfUnits);
                      $('#noOfFloor').text(response.noOfFloor);
                      $('#noOfCarParking').text(response.noOfCarParking);
                      $('#unitSize').text(response.unitSize+" Sft.");
                      $('#lift').text(response.lift);
                      $('#generator').text(response.generator);
                  }
              });
              $('#base').append('<div class="backdrop"></div>');
              $('#offcanvas-demo-size2').addClass('active');
              $('#offcanvas-demo-size2').attr('style','transform: translate(-280px, 0px);');
              $('body').addClass(' offcanvas-expanded');
              $('body').attr('style','padding-right:15px;');
          });

          $('form.myAction').click(function (e) {
              e.preventDefault();
              var that = this;
              swal({
                  title: 'Are you sure?',
                  text: "If you delete this, related data will be deleted also!",
                  type: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Yes, delete it!'
              }).then(function () {
                  that.submit();
              })
          });



      });
  </script>
@endsection