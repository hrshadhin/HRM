@extends('layouts.master')

@section('title', 'New user')
@section('extraStyle')
    <link type="text/css" rel="stylesheet" href="{{url('/')}}/assets/css/libs/select2/select2.css" />
    <link type="text/css" rel="stylesheet" href="{{url('/')}}/assets/css/libs/bootstrap-datepicker/datepicker3.css" />

@endsection
@section('content')
    <section>
        <div class="section-header">
            <ol class="breadcrumb">
                <li><a href="{{URL::Route('user.index')}}">Users</a></li>
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
                                  action="{{URL::route('user.store')}}"
                                  method="POST"
                                  enctype="multipart/form-data">

                                <div class="card">
                                    <div class="card-head style-primary">
                                        <header>Add new user</header>
                                    </div>
                                    <div class="card-body">
                                        {{ csrf_field() }}
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    {!! Form::select('role', $roles, null, ['id' => 'projectType' ,'class' => 'form-control select2-list', 'required' => 'required']) !!}
                                                    <label for="role">User Role</label>
                                                    <p class="help-block">select user role</p>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <input type="text"  class="form-control" value="" name="name" maxlength="255" required>
                                                    <label for="name">Full name</label>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <input type="email" class="form-control" value="" name="email" required>
                                                    <label for="entryDate">Email address</label>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <input type="password" class="form-control" value="" minlength="6" name="password" required>
                                                    <label for="entryDate">Password</label>
                                                </div>
                                            </div>
                                            <input type="hidden" name="description" value="">
                                        </div>
                                        <hr>
                                        <h3 class="text-info"><i class="fa fa-lock text-info"></i> User permissions</h3>

                                        <div class="row">
                                            <div class="alert alert-warning">
                                                <p class="text-danger"><i class="fa fa-info-circle text-info"></i><strong> N.B </strong> If you don't need to give extra permission to the user then don't check any permissions. Because "User Role" has its own pre-set permissions </p>
                                                <p><i class="fa fa-hand-o-right text-info"></i> <strong>Admin </strong>can do all things in this system</p>
                                                <p><i class="fa fa-hand-o-right text-info"></i> <strong>Supervisor </strong>can do all things except "manage user" and delete any data in this system</p>
                                                <p><i class="fa fa-hand-o-right text-info"></i> <strong>Operation </strong>can create and view only. this user can't view reports</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <h4>Permissions:</h4>

                                                <div class="form-group">
                                                        @foreach($permission as $value)
                                                            <p>
                                                            <label class="checkbox-styled checkbox-primary">
                                                           {{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                                                                <span>{{ $value->name }}</span>
                                                            </label>
                                                            </p>
                                                        @endforeach

                                                </div>
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
                                        <button type="submit" class="btn btn-primary ink-reaction"><i class="md md-add-circle-outline"></i> Save</button>
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
//
//              $('form').submit(function (e) {
//                e.preventDefault();
//                //validation form
//                var isValid = ValidateCollectionForm();
//                if(isValid){
//                    this.submit();
//                }
//
//            });
        });
    </script>
@endsection
