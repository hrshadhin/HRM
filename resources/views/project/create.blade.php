@extends('layouts.master')

@section('title', 'Project Create')
@section('extraStyle')
<link type="text/css" rel="stylesheet" href="{{url('/')}}/assets/css/libs/select2/select2.css" />

@endsection
@section('content')
<section>
  <div class="section-header">
    <ol class="breadcrumb">
      <li><a href="{{URL::Route('project.index')}}">Projects</a></li>
      <li class="active">Create</li>
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
            action="{{URL::route('project.store')}}"
            method="POST"
            enctype="multipart/form-data"
            >

            <div class="card">
              <div class="card-head style-primary">
                <header>Create a project</header>
              </div>
              <div class="card-body">
                <div class="form-group">
                  {{ csrf_field() }}
                </div>
                <div class="form-group">
                  <select id="area" class="form-control select2-list" name="area" required>
                      <option value="Dhanmondi">Dhanmondi</option>
                      <option value="Gulshan">Gulshan</option>
                      <option value="Jatrabari">Jatrabari</option>
                      <option value="Khilkhet">Khilkhet</option>
                      <option value="Mohammadpur">Mohammadpur</option>
                      <option value="Savar">Savar</option>
                      <option value="Uttara">Uttara</option>

                  </select>
                  <label>Project area</label>
                  <p class="help-block"></p>

                </div>
                <div class="form-group">
                  <input type="text" class="form-control" id="number2" name="plotNo" data-rule-number="true" required>
                  <label for="number2">Plot No</label>
                  <p class="help-block">Numbers only</p>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control"  name="roadNo" data-rule-minlength="2" maxlength="50" required>
                  <label for="roadNo">Road No</label>
                  <p class="help-block">min: 2 / max: 50 letters</p>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control"  name="sectorNo" data-rule-minlength="2" maxlength="50" required>
                  <label for="sectorNo">Block / Sector No</label>
                  <p class="help-block">min: 2 / max: 50 letters</p>
                </div>
                <div class="form-group">
                  <textarea class="form-control"  name="address" data-rule-minlength="2" maxlength="255" required></textarea>
                  <label for="address">Address</label>
                  <p class="help-block">min: 2 / max: 255 letters</p>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control"  name="serialNo" data-rule-minlength="2" maxlength="50" required>
                  <label for="serialNo">Project Serial No</label>
                  <p class="help-block">min: 2 / max: 50 letters</p>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control"  name="name" data-rule-minlength="2" maxlength="100" required>
                  <label for="name">Project Name</label>
                  <p class="help-block">min: 2 / max: 100 letters</p>
                </div>
                <div class="form-group">
                  <textarea class="form-control"  name="description" data-rule-minlength="2" maxlength="65535" required></textarea>
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
                  <button type="submit" class="btn btn-primary ink-reaction"><i class="md md-add-circle-outline"></i> Create</button>
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
