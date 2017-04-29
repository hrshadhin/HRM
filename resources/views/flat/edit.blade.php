@extends('layouts.master')

@section('title', 'Project Edit')
@section('extraStyle')
<link type="text/css" rel="stylesheet" href="{{url('/')}}/assets/css/libs/select2/select2.css" />
<link type="text/css" rel="stylesheet" href="{{url('/')}}/assets/css/libs/bootstrap-datepicker/datepicker3.css" />

@endsection
@section('content')
<section>
  <div class="section-header">
    <ol class="breadcrumb">
      <li><a href="{{URL::Route('project.index')}}">Projects</a></li>
      <li class="active">Update</li>
    </ol>
  </div><!--end .section-header -->
  <div class="section-body">
    <section>
      <div class="section-body">
        <!-- BEGIN HORIZONTAL FORM -->
        <div class="row">
          <div class="col-lg-12">
            <form class="form form-validate floating-label"
                  novalidate="novalidate"
                  action="{{URL::route('project.update',$project->id)}}"
                  method="POST"
                  enctype="multipart/form-data"
            >

              <div class="card">
                <div class="card-head style-primary">
                  <header>Update project</header>
                </div>
                <div class="card-body">
                  <div class="form-group">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <input type="text" class="form-control"  name="projectId" value="{{$project->projectId}}" data-rule-minlength="2" maxlength="255" required>
                        <label for="projectId">Project Id</label>
                        <p class="help-block">min: 2 / max: 255 letters</p>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <select id="projectType" class="form-control select2-list" name="projectType" required>
                          @if($project->projectType=="Commerical")
                          <option value="Commerical">Commerical</option>
                          <option value="Residential">Residential</option>
                          @else
                            <option value="Residential">Residential</option>
                            <option value="Commerical">Commerical</option>
                          @endif
                        </select>
                        <label for="projectType">Project Type</label>
                        <p class="help-block"></p>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <input type="text" class="form-control" value="{{$project->name}}" name="name" data-rule-minlength="2" maxlength="255" required>
                        <label for="name">Project Name</label>
                        <p class="help-block">min: 2 / max: 255 letters</p>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <input type="text" class="form-control datepicker" value="{{$project->entryDate->format('d/m/Y')}}"  name="entryDate" required>
                        <label for="dateOfEntry">Date of entry</label>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        {!! Form::select('areas_id', $areas, $project->areas_id, ['class' => 'form-control select2-list', 'required' => 'required']) !!}
                        <label for="name">Area</label>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <textarea class="form-control"  name="address" rows="1" data-rule-minlength="2" maxlength="500" required>{{$project->address}}</textarea>
                        <label for="address">Address</label>
                        <p class="help-block">min: 2 / max: 500 letters</p>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <textarea class="form-control"  name="description" rows="1"  maxlength="1000">{{$project->description}}</textarea>
                        <label for="description">Description</label>
                        <p class="help-block">min: 2 / max: 1000 letters</p>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <input type="text" class="form-control"  name="storied" value="{{$project->storied}}" data-rule-minlength="2" maxlength="255" required>
                        <label for="storied">Building Storied</label>
                        <p class="help-block">min: 2 / max: 255 letters</p>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <input type="text" class="form-control" value="{{$project->noOfUnits}}" name="noOfUnits" data-rule-number="true" required>
                        <label for="noOfUnits">No of units</label>
                        <p class="help-block">Numbers only</p>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <input type="text" class="form-control" value="{{$project->noOfFloor}}" name="noOfFloor" data-rule-number="true" required>
                        <label for="noOfFloor">No of floor</label>
                        <p class="help-block">Numbers only</p>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <input type="text" class="form-control" value="{{$project->noOfCarParking}}" name="noOfCarParking" data-rule-number="true" required>
                        <label for="noOfCarParking">No of car parking</label>
                        <p class="help-block">Numbers only</p>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <input type="text" class="form-control" value="{{$project->unitSize}}" name="unitSize" data-rule-number="true" required>
                        <label for="unitSize">Units Size(Sft.)</label>
                        <p class="help-block">Numbers only</p>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">

                          <span class="radio-inline radio-styled radio-info">
                            <input type="radio" name="lift" @if($project->lift=="Yes") checked @endif value="Yes"><span>Yes</span>
                          </span>
                        <span class="radio-inline radio-styled radio-info">
                            <input type="radio" name="lift" value="No" @if($project->lift=="No") checked @endif><span>No</span>
                          </span>
                        <label for="lift">Lift</label>

                      </div>

                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">

                          <span class="radio-inline radio-styled radio-info">
                            <input type="radio" name="generator" @if($project->generator=="Yes") checked @endif value="Yes"><span>Yes</span>
                          </span>
                        <span class="radio-inline radio-styled radio-info">
                            <input type="radio" name="generator" value="No" @if($project->generator=="No") checked @endif><span>No</span>
                          </span>

                        <label for="generator">Generator</label>
                      </div>
                    </div>

                    <div class="form-group">
                      @if (count($errors) > 0)
                        <div class="alert alert-danger">
                          <strong>Whoops!</strong> There were some problems with your input.<br><br>
                          <ul>
                            @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                            @endforeach
                          </ul>
                        </div>
                      @endif
                    </div>
                  </div><!--end .card-body -->
                  <div class="card-actionbar">
                    <div class="card-actionbar-row">
                      <button type="submit" class="btn btn-primary ink-reaction"><i class="md md-refresh"></i> Update</button>
                    </div>
                  </div>
                </div><!--end .card -->
            </form>
          </div><!--end .col -->
        </div><!--end .row -->
        <!-- END HORIZONTAL FORM -->
    </div>
  </section>
</div>

</section>

@endsection

@section('extraScript')
  <script src="{{url('/')}}/assets/js/libs/bootstrap-datepicker/bootstrap-datepicker.js"></script>
  <script src="{{url('/')}}/assets/js/libs/select2/select2.min.js"></script>
<script src="{{url('/')}}/assets/js/libs/jquery-validation/jquery.validate.min.js"></script>
<script src="{{url('/')}}/assets/js/libs/jquery-validation/additional-methods.min.js"></script>

<script type="text/javascript">
$( document ).ready(function() {
  $('select').select2();
    $('.datepicker').datepicker({
        format: 'dd/mm/yyyy',
        autoclose: true,
        todayHighlight : true

    });
    $('.radio-styled').click(function () {
        $(this).children('input').attr('checked', true);
    });
});
</script>
@endsection
