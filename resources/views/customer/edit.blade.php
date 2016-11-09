@extends('layouts.master')

@section('title', 'Project Edit')
@section('extraStyle')
<link type="text/css" rel="stylesheet" href="{{url('/')}}/assets/css/libs/select2/select2.css" />

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
                <div class="form-group">
                   {!!Form::select('area', $areas, $project->area,
                   ['class'=>'form-control select2-list', 'id' => 'area', 'required'=>'required'])!!}
                  <label>Project area</label>
                  <p class="help-block"></p>

                </div>
                <div class="form-group">
                  <input type="text" class="form-control" id="number2" name="plotNo" data-rule-number="true" required value="{{$project->plotNo}}">
                  <label for="number2">Plot No</label>
                  <p class="help-block">Numbers only</p>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control"  name="roadNo" data-rule-minlength="2" maxlength="50" required value="{{$project->roadNo}}">
                  <label for="roadNo">Road No</label>
                  <p class="help-block">min: 2 / max: 50 letters</p>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control"  name="sectorNo" data-rule-minlength="2" maxlength="50" required value="{{$project->sectorNo}}">
                  <label for="sectorNo">Block / Sector No</label>
                  <p class="help-block">min: 2 / max: 50 letters</p>
                </div>
                <div class="form-group">
                  <textarea class="form-control"  name="address" data-rule-minlength="2" maxlength="255" required>{{$project->address}}</textarea>
                  <label for="address">Address</label>
                  <p class="help-block">min: 2 / max: 255 letters</p>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control"  name="serialNo" data-rule-minlength="2" maxlength="50" required value="{{$project->serialNo}}">
                  <label for="serialNo">Project Serial No</label>
                  <p class="help-block">min: 2 / max: 50 letters</p>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control"  name="name" data-rule-minlength="2" maxlength="100" required value="{{$project->name}}">
                  <label for="name">Project Name</label>
                  <p class="help-block">min: 2 / max: 100 letters</p>
                </div>
                <div class="form-group">
                  <textarea class="form-control"  name="description" data-rule-minlength="2" maxlength="65535" required>{{$project->description}}</textarea>
                  <label for="description">Description</label>
                  <p class="help-block">min: 2 / max: 65535 letters</p>
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
<script src="{{url('/')}}/assets/js/libs/select2/select2.min.js"></script>
<script src="{{url('/')}}/assets/js/libs/jquery-validation/jquery.validate.min.js"></script>
<script src="{{url('/')}}/assets/js/libs/jquery-validation/additional-methods.min.js"></script>

<script type="text/javascript">
$( document ).ready(function() {
  $('select').select2();
});
</script>
@endsection
