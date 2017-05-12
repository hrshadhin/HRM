@extends('layouts.master')

@section('title', 'Profile')
@section('extraStyle')
<style>
.white{
	color: #fff;
}
</style>
@endsection
@section('content')
<!-- BEGIN PROFILE HEADER -->
<section class="full-bleed">
	<div class="section-body style-default-dark force-padding text-shadow">
		<div class="img-backdrop" style="background-image: url('../../assets/img/rhm.jpg')"></div>
		<div class="overlay overlay-shade-top stick-top-left height-3"></div>
		<div class="row">
			<div class="col-md-3 col-xs-5">
				<img class="img-circle border-white border-xl img-responsive auto-width" src="{{URL::asset('assets')}}/img/avatar.png" alt="" />
				<h3>{{session('name')}}<br/><small class="white">{{getUserRole(auth()->user())}}</small></h3>
			</div><!--end .col -->

		</div><!--end .row -->
		<div class="overlay overlay-shade-bottom stick-bottom-left force-padding text-right">
			{{--<a class="btn btn-icon-toggle" data-toggle="tooltip" data-placement="top" data-original-title="Contact me"><i class="fa fa-envelope"></i></a>--}}
			{{--<a class="btn btn-icon-toggle" data-toggle="tooltip" data-placement="top" data-original-title="Follow me"><i class="fa fa-twitter"></i></a>--}}
			{{--<a class="btn btn-icon-toggle" data-toggle="tooltip" data-placement="top" data-original-title="Personal info"><i class="fa fa-facebook"></i></a>--}}
		</div>
	</div><!--end .section-body -->
</section>
<!-- END PROFILE HEADER  -->

<section>
	<div class="section-body no-margin">
		<div class="row">
			<div class="col-md-8">
				<div class="row">
					<div class="col-lg-12">
						<form class="form form-validate floating-label"
							  novalidate="novalidate"
							  action="{{URL::route('user.update',auth()->user()->id)}}"
							  method="POST"
							  enctype="multipart/form-data">

							<div class="card">
								<div class="card-head style-primary">
									<header>Change password</header>
								</div>
								<div class="card-body">
									{{ csrf_field() }}
									{{ method_field('patch') }}
									<input type="hidden" name="isOnlyPasword" value="1">
									<div class="row">
										{{--<div class="col-lg-4">--}}
											{{--<div class="form-group">--}}
												{{--<input type="password" class="form-control" minlength="6"  name="oldpassword" required>--}}
												{{--<label for="entryDate">Old Password</label>--}}
											{{--</div>--}}
										{{--</div>--}}
										<div class="col-lg-4">
											<div class="form-group">
												<input type="password" class="form-control" minlength="6"   name="password" required>
												<label for="entryDate">New Password</label>
											</div>
										</div>
										<div class="col-lg-4">
											<div class="form-group">
												<input type="password" class="form-control" minlength="6" name="password_confirmation" required>
												<label for="entryDate">Confirm new Password</label>
											</div>
										</div>
										<div class="col-lg-4">
											<div class="form-group">
												<button type="submit" class="btn btn-primary ink-reaction"><i class="md md-check"></i> Change</button>

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
								{{--<div class="card-actionbar">--}}
									{{--<div class="card-actionbar-row">--}}
									{{--</div>--}}
								{{--</div>--}}
							</div><!--end .card -->
						</form>
					</div><!--end .col -->
				</div><!--end .row -->

			</div><!--end .col -->
			<!-- END USER SETTINGS -->

			<!-- BEGIN PROFILE MENUBAR -->
			<div class="col-lg-offset-1 col-lg-3 col-md-4">

				<div class="card card-underline style-default-dark">
					<div class="card-head">
						<header class="opacity-75"><small>User info</small></header>

					</div><!--end .card-head -->
					<div class="card-body no-padding">
						<ul class="list">
							<li class="tile">
								<a class="tile-content ink-reaction">
									<div class="tile-icon">
										<i class="md md-info"></i>
									</div>
									<div class="tile-text">
										{{auth()->user()->name}}
									</div>
								</a>
							</li>
							<li class="tile">
								<a class="tile-content ink-reaction">
									<div class="tile-icon">
										<i class="md md-email"></i>
									</div>
									<div class="tile-text">
										{{auth()->user()->email}}
									</div>
								</a>
							</li>

						</ul>
					</div><!--end .card-body -->
				</div><!--end .card -->
			</div><!--end .col -->
			<!-- END PROFILE MENUBAR -->

		</div><!--end .row -->
	</div><!--end .section-body -->
</section>

@endsection

@section('extraScript')
	<script src="{{url('/')}}/assets/js/libs/jquery-validation/jquery.validate.min.js"></script>
	<script src="{{url('/')}}/assets/js/libs/jquery-validation/additional-methods.min.js"></script>

@endsection
