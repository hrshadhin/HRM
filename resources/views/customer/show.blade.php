@extends('layouts.master')

@section('title', 'Customer-Information')
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
				<img  class="img-circle border-white border-xl img-responsive" src="{{URL::asset('storage')}}/@if($customer->photo){{$customer->photo}} @else{{'customers/avatar.png'}}@endif" alt="Photo"  width="120px" height="120px" />
				<h3>{{$customer->name}}<br/><small class="white">{{$customer->designation}} @if($customer->companyName) at {{$customer->companyName}} @endif</small></h3>
			</div><!--end .col -->

		</div><!--end .row -->
		<div class="overlay overlay-shade-bottom stick-bottom-left force-padding text-right">
			<a class="btn btn-icon-toggle" data-toggle="tooltip" data-placement="top" data-original-title="{{$customer->active}}"><i class="fa fa-2x @if($customer->active=="Yes")fa-check-circle @else fa-close @endif"></i></a>
			<a class="btn btn-icon-toggle" data-toggle="tooltip" data-placement="top" data-original-title="{{$customer->entryDate->format('F,j Y')}}"><i class="fa fa-2x fa-calendar"></i></a>
		</div>
	</div><!--end .section-body -->
</section>
<!-- END PROFILE HEADER  -->

<section>
	<div class="section-body no-margin">
		<div class="row">
			<!-- BEGIN PROFILE MENUBAR -->
			<div class="col-lg-6 col-md-6">
				<div class="card card-underline style-default-light">
					<div class="card-head text-primary">
						<header class="text-primary"><small class="text-primary" style="opacity: 1 !important;">Personal information</small></header>
					</div><!--end .card-head -->
					<div class="card-body no-padding">
						<ul class="list">
							<li class="tile">
								<a class="tile-content ink-reaction">
									<div class="tile-icon">
										<i class="ma md-info"></i>
									</div>
									<div class="tile-text">
										{{$customer->customerType}}
										<small>Customer Type</small>
									</div>
								</a>
							</li>
							<li class="tile">
								<a class="tile-content ink-reaction">
									<div class="tile-icon">
										<i class="ma md-info"></i>
									</div>
									<div class="tile-text">
										@if($customer->dob){{$customer->dob}}@endif
										<small>Date of Birth</small>
									</div>
								</a>
							</li>
							<li class="tile">
								<a class="tile-content ink-reaction">
									<div class="tile-icon">
										<i class="ma md-stay-current-portrait"></i>
									</div>
									<div class="tile-text">
										{{$customer->cellNo}}
										<small>Mobile No</small>
									</div>
								</a>
							</li>
							<li class="divider-inset"></li>
							<li class="tile">
								<a class="tile-content ink-reaction">
									<div class="tile-icon">
										<i class="md md-phone"></i>
									</div>
									<div class="tile-text">
										{{$customer->phoneNo}}
										<small>Phone No</small>
									</div>
								</a>
							</li>
							<li class="divider-inset"></li>
							<li class="tile">
								<a class="tile-content ink-reaction">
									<div class="tile-icon">
										<i class="md md-email"></i>
									</div>
									<div class="tile-text">
										{{$customer->email}}
										<small>Email</small>
									</div>
								</a>
							</li>
							<li class="divider-inset"></li>
							<li class="tile">
								<a class="tile-content ink-reaction">
									<div class="tile-icon">
										<i class="md md-person"></i>
									</div>
									<div class="tile-text">
										{{$customer->contactPerson}}
										<small>Contact Person</small>
									</div>
								</a>
							</li>
							<li class="divider-inset"></li>

							<li class="tile">
								<a class="tile-content ink-reaction">
									<div class="tile-icon">
										<i class="md md-stay-current-portrait"></i>
									</div>
									<div class="tile-text">
										{{$customer->contactPersonCellNo}}
										<small>Contact Person Mobile No</small>
									</div>
								</a>
							</li>
							<li class="divider-inset"></li>
							<li class="tile">
								<a class="tile-content ink-reaction">
									<div class="tile-icon">
										<i class="md md-person"></i>
									</div>
									<div class="tile-text">
										{{$customer->fatherName}}
										<small>Father's name</small>
									</div>
								</a>
							</li>
							<li class="divider-inset"></li>
							<li class="tile">
								<a class="tile-content ink-reaction">
									<div class="tile-icon">
										<i class="md md-person"></i>
									</div>
									<div class="tile-text">
										{{$customer->motherName}}
										<small>Mother's name</small>
									</div>
								</a>
							</li>
							<li class="divider-inset"></li>
							<li class="tile">
								<a class="tile-content ink-reaction">
									<div class="tile-icon">
										<i class="md md-person"></i>
									</div>
									<div class="tile-text">
										{{$customer->spouseName}}
										<small>Spouse name</small>
									</div>
								</a>
							</li>

							<li class="divider-inset"></li>
							<li class="tile">
								<a class="tile-content ink-reaction">
									<div class="tile-icon">
										<i class="md md-credit-card"></i>
									</div>
									<div class="tile-text">
										{{$customer->nidNo}}
										<small>National ID no</small>
									</div>
								</a>
							</li>
							<li class="divider-inset"></li>
							<li class="tile">
								<a class="tile-content ink-reaction">
									<div class="tile-icon">
										<i class="md md-credit-card"></i>
									</div>
									<div class="tile-text">
										{{$customer->passportNo}}
										<small>Passport no</small>
									</div>
								</a>
							</li>
							<li class="divider-inset"></li>
							<li class="tile">
								<a class="tile-content ink-reaction">
									<div class="tile-icon">
										<i class="md md-location-on"></i>
									</div>
									<div class="tile-text">
										{{$customer->mailingAddress}}
										<small>Mailing address</small>
									</div>
								</a>
							</li>
							<li class="divider-inset"></li>
							<li class="tile">
								<a class="tile-content ink-reaction">
									<div class="tile-icon">
										<i class="md md-location-on"></i>
									</div>
									<div class="tile-text">
										{{$customer->presentAddress}}
										<small>Present address</small>
									</div>
								</a>
							</li>
							<li class="divider-inset"></li>
							<li class="tile">
								<a class="tile-content ink-reaction">
									<div class="tile-icon">
										<i class="md md-location-on"></i>
									</div>
									<div class="tile-text">
										{{$customer->permanentAddress}}
										<small>Permanent address</small>
									</div>
								</a>
							</li>
						</ul>
					</div><!--end .card-body -->
				</div>
				<!--end .card -->
			</div><!--end .col -->
			<div class="col-lg-6 col-md-6">
				<div class="card card-underline style-default-light">
					<div class="card-head text-primary">
						<header class="text-primary"><small class="text-primary" style="opacity: 1 !important;">Business information</small></header>
					</div><!--end .card-head -->
					<div class="card-body no-padding">
						<ul class="list">
							<li class="tile">
								<a class="tile-content ink-reaction">
									<div class="tile-icon">
										<i class="md md-business"></i>
									</div>
									<div class="tile-text">
										{{$customer->companyName}}
										<small>Company name</small>
									</div>
								</a>
							</li>
							<li class="divider-inset"></li>
							<li class="tile">
								<a class="tile-content ink-reaction">
									<div class="tile-icon">
										<i class="md md-info"></i>
									</div>
									<div class="tile-text">
										{{$customer->designation}}
										<small>Designation</small>
									</div>
								</a>
							</li>
							<li class="divider-inset"></li>
							<li class="tile">
								<a class="tile-content ink-reaction">
									<div class="tile-icon">
										<i class="md md-person"></i>
									</div>
									<div class="tile-text">
										{{$customer->cContactPerson}}
										<small>Company contact person</small>
									</div>
								</a>
							</li>
							<li class="divider-inset"></li>
							<li class="tile">
								<a class="tile-content ink-reaction">
									<div class="tile-icon">
										<i class="md md-stay-current-portrait"></i>
									</div>
									<div class="tile-text">
										{{$customer->cContactPersonCellNo}}
										<small>Company contact person mobile no</small>
									</div>
								</a>
							</li>
							<li class="divider-inset"></li>
							<li class="tile">
								<a class="tile-content ink-reaction">
									<div class="tile-icon">
										<i class="md md-stay-current-portrait"></i>
									</div>
									<div class="tile-text">
										{{$customer->cCellNo}}
										<small>Company mobile no</small>
									</div>
								</a>
							</li>
							<li class="divider-inset"></li>
							<li class="tile">
								<a class="tile-content ink-reaction">
									<div class="tile-icon">
										<i class="md md-phone"></i>
									</div>
									<div class="tile-text">
										{{$customer->cPhoneNo}}
										<small>Company phone no</small>
									</div>
								</a>
							</li>
							<li class="divider-inset"></li>
							<li class="tile">
								<a class="tile-content ink-reaction">
									<div class="tile-icon">
										<i class="md md-perm-phone-msg"></i>
									</div>
									<div class="tile-text">
										{{$customer->cFaxNo}}
										<small>Company fax no</small>
									</div>
								</a>
							</li>
							<li class="divider-inset"></li>
							<li class="tile">
								<a class="tile-content ink-reaction">
									<div class="tile-icon">
										<i class="md md-email"></i>
									</div>
									<div class="tile-text">
										{{$customer->cEmail}}
										<small>Company Email</small>
									</div>
								</a>
							</li>
							<li class="divider-inset"></li>
							<li class="tile">
								<a class="tile-content ink-reaction">
									<div class="tile-icon">
										<i class="md md-location-on"></i>
									</div>
									<div class="tile-text">
										{{$customer->cAddress}}
										<small>Company address</small>
									</div>
								</a>
							</li>
							<li class="divider-inset"></li>
							<li class="tile">
								<a class="tile-content ink-reaction">
									<div class="tile-icon">
										<i class="md md-speaker-notes"></i>
									</div>
									<div class="tile-text">
										{{$customer->cNote}}
										<small>Notes</small>
									</div>
								</a>
							</li>
							<li class="divider-inset"></li>
							<li class="tile">
								<span class="tile-content ink-reaction">
									<h4 class="text-info text-center">Downloadable files</h4>
								</span>
							</li>
							<li class="divider-inset"></li>

							<li class="tile">
								<a class="tile-content ink-reaction" href="@if($customer->photo){{URL::asset('storage')}}/{{$customer->photo}}@endif">
									<div class="tile-icon">
										<i class="md md-attachment"></i>
									</div>
									<div class="tile-text">
										<small>Photograph</small>
									</div>
								</a>
							</li>
							<li class="tile">
								<a class="tile-content ink-reaction" href="@if($customer->passport){{URL::asset('storage')}}/{{$customer->passport}}@endif">
									<div class="tile-icon">
										<i class="md md-attachment"></i>
									</div>
									<div class="tile-text">
										<small>Passport digital copy</small>
									</div>
								</a>
							</li>

						</ul>
					</div><!--end .card-body -->
				</div>
				<!--end .card -->
			</div><!--end .col -->
			<!-- END PROFILE MENUBAR -->

		</div><!--end .row -->
	</div><!--end .section-body -->
</section>

@endsection

@section('extraScript')

@endsection
