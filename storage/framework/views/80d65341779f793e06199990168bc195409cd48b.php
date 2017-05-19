<?php $__env->startSection('title', 'Customer-Information'); ?>
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
				<img  class="img-circle border-white border-xl img-responsive" src="<?php echo e(URL::asset('storage')); ?>/<?php if($customer->photo): ?><?php echo e($customer->photo); ?> <?php else: ?><?php echo e('customers/avatar.png'); ?><?php endif; ?>" alt="Photo"  width="120px" height="120px" />
				<h3><?php echo e($customer->name); ?><br/><small class="white"><?php echo e($customer->designation); ?> <?php if($customer->companyName): ?> at <?php echo e($customer->companyName); ?> <?php endif; ?></small></h3>
			</div><!--end .col -->

		</div><!--end .row -->
		<div class="overlay overlay-shade-bottom stick-bottom-left force-padding text-right">
			<a class="btn btn-icon-toggle" data-toggle="tooltip" data-placement="top" data-original-title="<?php echo e($customer->active); ?>"><i class="fa fa-2x <?php if($customer->active=="Yes"): ?>fa-check-circle <?php else: ?> fa-close <?php endif; ?>"></i></a>
			<a class="btn btn-icon-toggle" data-toggle="tooltip" data-placement="top" data-original-title="<?php echo e($customer->entryDate->format('F,j Y')); ?>"><i class="fa fa-2x fa-calendar"></i></a>
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
										<i class="ma md-stay-current-portrait"></i>
									</div>
									<div class="tile-text">
										<?php echo e($customer->cellNo); ?>

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
										<?php echo e($customer->phoneNo); ?>

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
										<?php echo e($customer->email); ?>

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
										<?php echo e($customer->contactPerson); ?>

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
										<?php echo e($customer->contactPersonCellNo); ?>

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
										<?php echo e($customer->fatherName); ?>

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
										<?php echo e($customer->motherName); ?>

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
										<?php echo e($customer->spouseName); ?>

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
										<?php echo e($customer->nidNo); ?>

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
										<?php echo e($customer->passportNo); ?>

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
										<?php echo e($customer->mailingAddress); ?>

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
										<?php echo e($customer->presentAddress); ?>

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
										<?php echo e($customer->permanentAddress); ?>

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
										<?php echo e($customer->companyName); ?>

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
										<?php echo e($customer->designation); ?>

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
										<?php echo e($customer->cContactPerson); ?>

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
										<?php echo e($customer->cContactPersonCellNo); ?>

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
										<?php echo e($customer->cCellNo); ?>

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
										<?php echo e($customer->cPhoneNo); ?>

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
										<?php echo e($customer->cFaxNo); ?>

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
										<?php echo e($customer->cEmail); ?>

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
										<?php echo e($customer->cAddress); ?>

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
										<?php echo e($customer->cNote); ?>

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
								<a class="tile-content ink-reaction" href="<?php if($customer->photo): ?><?php echo e(URL::asset('storage')); ?>/<?php echo e($customer->photo); ?><?php endif; ?>">
									<div class="tile-icon">
										<i class="md md-attachment"></i>
									</div>
									<div class="tile-text">
										<small>Photograph</small>
									</div>
								</a>
							</li>
							<li class="tile">
								<a class="tile-content ink-reaction" href="<?php if($customer->passport): ?><?php echo e(URL::asset('storage')); ?>/<?php echo e($customer->passport); ?><?php endif; ?>">
									<div class="tile-icon">
										<i class="md md-attachment"></i>
									</div>
									<div class="tile-text">
										<small>Passport digital copy</small>
									</div>
								</a>
							</li>
							<li class="divider-inset"></li>
							<li class="tile">
								<a class="tile-content ink-reaction" href="<?php if($customer->birthCertificate): ?><?php echo e(URL::asset('storage')); ?>/<?php echo e($customer->birthCertificate); ?><?php endif; ?>">
									<div class="tile-icon">
										<i class="md md-attachment"></i>
									</div>
									<div class="tile-text">
										<small>Birth certificate digital copy</small>
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

<?php $__env->stopSection(); ?>

<?php $__env->startSection('extraScript'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>