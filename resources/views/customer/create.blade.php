@extends('layouts.master')

@section('title', 'Customer Create')
@section('extraStyle')
<link type="text/css" rel="stylesheet" href="{{url('/')}}/assets/css/libs/select2/select2.css" />
<link type="text/css" rel="stylesheet" href="{{url('/')}}/assets/css/libs/bootstrap-datepicker/datepicker3.css" />


@endsection
@section('content')
<section>
  <div class="section-header">
    <ol class="breadcrumb">
      <li><a href="{{URL::Route('customer.index')}}">Cutomers</a></li>
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
            action="{{URL::route('customer.store')}}"
            method="POST"
            enctype="multipart/form-data"
            >

            <div class="card">
              <div class="card-head style-primary">
                <header>Create a customer</header>
              </div>
              <div class="card-body">
                <div class="form-group">
                  {{ csrf_field() }}
                </div>
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <select class="form-control select2-list" name="title" required>
                        <option value="Mr.">Mr.</option>
                        <option value="Miss">Miss</option>
                        <option value="Mrs">Mrs</option>
                        <option value="Ms">Ms</option>
                      </select>
                      <label>Title</label>
                      <p class="help-block"></p>

                    </div>

                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <input type="text" class="form-control" readonly name="code" data-rule-minlength="2" value="{{$code}}" required>
                      <label for="code">Customer Code</label>
                      <p class="help-block"></p>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <input type="text" class="form-control"  name="name" data-rule-minlength="4" maxlength="100" required>
                      <label for="name">Name</label>
                      <p class="help-block">min: 4 / max: 100 letters</p>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <input type="text" class="form-control"  name="cellNo" data-rule-minlength="11" maxlength="11" required>
                      <label for="cellNo">Mobile No</label>
                      <p class="help-block"> min & max: 11 letters</p>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <input type="text" class="form-control"  name="phoneNo" data-rule-minlength="5" maxlength="15" required>
                      <label for="phoneNo">Phone No</label>
                      <p class="help-block"> min:5  max: 15 letters</p>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <input type="email" class="form-control"  name="email"  maxlength="100" required>
                      <label for="email">Email</label>
                      <p class="help-block">max: 100 letters</p>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <div class="input-group date" id="demo-date-format">
                        <div class="input-group-content">
                          <input type="text" name="dob" class="form-control">
                          <label>Ddate of Birth</label>
                        </div>
                        <span class="input-group-addon"></span>
                      </div>
                      <p class="help-block"> dd/mm/yyyy</p>

                    </div><!--end .form-group -->
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <input type="text" class="form-control"  name="contactPerson" maxlength="100" required>
                      <label for="contactPerson">Contact Person</label>
                      <p class="help-block"> max: 100 letters</p>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <input type="text" class="form-control"  name="contactPersonCellNo" data-rule-minlength="11" maxlength="11" required>
                      <label for="contactPersonCellNo">Contact Person Mobile No</label>
                      <p class="help-block"> min & max: 11 letters</p>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <input type="text" class="form-control"  name="referenceName" maxlength="100" required>
                      <label for="referenceName">Reference Name</label>
                      <p class="help-block"> max: 100 letters</p>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <input type="text" class="form-control"  name="referenceContactNo" data-rule-minlength="11" maxlength="11" required>
                      <label for="referenceContactNo">Reference Contact No</label>
                      <p class="help-block"> min & max: 11 letters</p>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <textarea class="form-control"  name="mailingAddress" data-rule-minlength="2" maxlength="255" required></textarea>
                      <label for="mailingAddress">Mailing Address</label>
                      <p class="help-block">min: 2 / max: 255 letters</p>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <div class="input-group">
                        <div class="input-group-content">
                          <select class="form-control select2-list" name="profession" required>
                            <option value="Teacher">Teacher</option>
                            <option value="Business">Business</option>
                            <option value="Engineer">Engineer</option>
                            <option value="Service Holder">Service Holder</option>
                          </select>
                          <label>Profession</label>
                          <p class="help-block"></p>
                        </div>
                        <span class="input-group-addon"><a href="#" class="btn btn-primary ink-reaction"><i class="md md-add"></i></a></span>
                      </div>
                    </div><!--end .form-group -->
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <select class="form-control" name="active" required>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                      </select>
                      <label>Active</label>
                      <p class="help-block"></p>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <div class="input-group">
                        <div class="input-group-content">
                          <select class="form-control select2-list" name="salesPerson" required>
                            <option value="Salman Khan">Salman Khan</option>
                            <option value="SRK">SRK</option>
                            <option value="Emran Khan">Emran Khan</option>
                          </select>
                          <label>Sales Person</label>
                          <p class="help-block"></p>
                        </div>
                        <span class="input-group-addon"><a href="#" class="btn btn-primary ink-reaction"><i class="md md-add"></i></a></span>
                      </div>
                    </div><!--end .form-group -->
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <div class="input-group">
                        <div class="input-group-content">
                          <select class="form-control select2-list" name="groupName" required>
                            <option value="Group 01">Group 01</option>
                            <option value="Group 02">Group 02</option>
                            <option value="Group 03">Group 03</option>
                          </select>
                          <label>Group Name</label>
                          <p class="help-block"></p>
                        </div>
                        <span class="input-group-addon"><a href="#" class="btn btn-primary ink-reaction"><i class="md md-add"></i></a></span>
                      </div>
                    </div><!--end .form-group -->
                  </div>
                </div>
                <div class="row">
                  <div class="form-group">
                    <div class="input-group">
                      <div class="input-group-content">
                      <input type="file" class="form-control" name="photo">

                      </div>
                      <span class="input-group-addon"><i class="fa fa-2x fa-file-image-o info"></i></a></span>
                    </div>
                    <label>Photo</label>
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
<script src="{{url('/')}}/assets/js/libs/bootstrap-datepicker/bootstrap-datepicker.js"></script>

<script type="text/javascript">
$( document ).ready(function() {
  $('select').select2();
  $('#demo-date-format').datepicker({autoclose: true, todayHighlight: true, format: "dd/mm/yyyy"});
});
</script>
@endsection
