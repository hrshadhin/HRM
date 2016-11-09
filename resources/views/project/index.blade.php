@extends('layouts.master')

@section('title', 'Project List')
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
      <li class="active">Projects</li>
      <li><a href="{{URL::Route('project.create')}}">Create</a></li>
    </ol>
  </div><!--end .section-header -->
  <div class="section-body">
    <section>
      <div class="section-body">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-head style-primary">
                <header>Projects List</header>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table no-margin">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Area</th>
                        <th>Plot No</th>
                        <th>Road No</th>
                        <th>Block/ Sector No</th>
                        <th>Address</th>
                        <th>Serial No</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($projects as $project)
                      <tr>
                        <td>{{$project->id}}</td>
                        <td>{{$project->area}}</td>
                        <td>{{$project->plotNo}}</td>
                        <td>{{$project->roadNo}}</td>
                        <td>{{$project->sectorNo}}</td>
                        <td>{{$project->address}}</td>
                        <td>{{$project->serialNo}}</td>
                        <td>{{$project->name}}</td>
                        <td>{{$project->description}}</td>
                        <td>
                          <div class="btn-group">

                            <button type="button" class="btn ink-reaction btn-primary dropdown-toggle" data-toggle="dropdown">
                              Action <i class="fa fa-caret-down"></i>
                            </button>
                            <ul class="dropdown-menu animation-zoom" role="menu">
                              <li><a href="{{URL::route('project.edit',$project->id)}}"><span class="btn btn-flat"><i class="fa fa-fw fa-edit text-info"></i> Edit</span></a></li>
                              <li class="divider"></li>
                              <li>
                                <form class="deleteForm" method="POST" action="{{URL::route('project.destroy',$project->id)}}">
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
                  {{ $projects->links() }}
                </div><!--end .card-body -->
              </div><!--end .card -->
            </div><!--end .col -->
          </div><!--end row -->

        </div>
      </section>
    </div>

  </section>

  @endsection
