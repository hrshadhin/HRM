<?php $__env->startSection('title', 'Profile'); ?>
<?php $__env->startSection('extraStyle'); ?>
<style>
.white{
	color: #fff;
}
</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<!-- BEGIN PROFILE HEADER -->
<section class="full-bleed">
	<div class="section-body style-default-dark force-padding text-shadow">
		<div class="img-backdrop" style="background-image: url('../../assets/img/rhm.jpg')"></div>
		<div class="overlay overlay-shade-top stick-top-left height-3"></div>
		<div class="row">
			<div class="col-md-3 col-xs-5">
				<img class="img-circle border-white border-xl img-responsive auto-width" src="../../assets/img/user01.jpg" alt="" />
				<h3><?php echo e(session('name')); ?><br/><small class="white">Web Developer at ShanixLab</small></h3>
			</div><!--end .col -->

		</div><!--end .row -->
		<div class="overlay overlay-shade-bottom stick-bottom-left force-padding text-right">
			<a class="btn btn-icon-toggle" data-toggle="tooltip" data-placement="top" data-original-title="Contact me"><i class="fa fa-envelope"></i></a>
			<a class="btn btn-icon-toggle" data-toggle="tooltip" data-placement="top" data-original-title="Follow me"><i class="fa fa-twitter"></i></a>
			<a class="btn btn-icon-toggle" data-toggle="tooltip" data-placement="top" data-original-title="Personal info"><i class="fa fa-facebook"></i></a>
		</div>
	</div><!--end .section-body -->
</section>
<!-- END PROFILE HEADER  -->

<section>
	<div class="section-body no-margin">
		<div class="row">
			<div class="col-md-8">
				<h2>User Settings</h2>

				<!-- BEGIN USER SETTINGS -->




			</div><!--end .col -->
			<!-- END USER SETTINGS -->

			<!-- BEGIN PROFILE MENUBAR -->
			<div class="col-lg-offset-1 col-lg-3 col-md-4">

				<div class="card card-underline style-default-dark">
					<div class="card-head">
						<header class="opacity-75"><small>Personal info</small></header>

					</div><!--end .card-head -->
					<div class="card-body no-padding">
						<ul class="list">
							<li class="tile">
								<a class="tile-content ink-reaction">
									<div class="tile-icon">
										<i class="md md-location-on"></i>
									</div>
									<div class="tile-text">
										Shukrabad,
										Dhanmondi-32
										<small>Street</small>
									</div>
								</a>
							</li>
							<li class="tile">
								<a class="tile-content ink-reaction">
									<div class="tile-icon"></div>
									<div class="tile-text">
										Dhaka, ZIP: 1207
										<small>City</small>
									</div>
								</a>
							</li>
							<li class="divider-inset"></li>
							<li class="tile">
								<a class="tile-content ink-reaction">
									<div class="tile-icon">
										<i class="fa fa-phone"></i>
									</div>
									<div class="tile-text">
										(880) 1554 322 707
										<small>Mobile</small>
									</div>
								</a>
							</li>
							<li class="tile">
								<a class="tile-content ink-reaction">
									<div class="tile-icon"></div>
									<div class="tile-text">
										(880) 1554 322 707
										<small>Work</small>
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

<?php $__env->stopSection(); ?>

<?php $__env->startSection('extraScript'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>