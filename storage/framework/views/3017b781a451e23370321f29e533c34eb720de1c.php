<?php $__env->startSection('title', 'Dashboard'); ?>
<?php $__env->startSection('extraStyle'); ?>
<link type="text/css" rel="stylesheet" href="<?php echo e(url('/')); ?>/assets/css/libs/rickshaw/rickshaw.css" />
<link type="text/css" rel="stylesheet" href="<?php echo e(url('/')); ?>/assets/css/libs/morris/morris.core.css" />

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
			<!-- BEGIN Page SECTION -->
			<section>
				<div class="section-header">
					<ol class="breadcrumb">
						<li class="active"><a href="<?php echo e(URL::Route('user.dashboard')); ?>">Dashboard</a></li>
						<!--<li class="active">Blank page</li>-->
					</ol>
				</div><!--end .section-header -->
				<div class="section-body">

							<section>
								<div class="section-body">
									<div class="row">

										<!-- BEGIN ALERT - REVENUE -->
										<div class="col-md-4 col-sm-6">
											<div class="card">
												<div class="card-body no-padding">
													<div class="alert alert-callout alert-info no-margin">
														<strong class="text-xl"><i class="fa-taka">&#2547</i> 32,829</strong><br/>
														<span class="opacity-50">Collections</span>
														<div class="stick-bottom-left-right">
															<div class="height-2 sparkline-revenue" data-line-color="#bdc1c1"></div>
														</div>
													</div>
												</div><!--end .card-body -->
											</div><!--end .card -->
										</div><!--end .col -->
										<!-- END ALERT - REVENUE -->

										<!-- BEGIN ALERT - VISITS -->
										<div class="col-md-4 col-sm-6">
											<div class="card">
												<div class="card-body no-padding">
													<div class="alert alert-callout alert-warning no-margin">
														<strong class="text-xl"><i class="fa-taka">&#2547</i> 4,32,901</strong><br/>
														<span class="opacity-50">Due</span>
														<div class="stick-bottom-right">
															<div class="height-1 sparkline-visits" data-bar-color="#e5e6e6"></div>
														</div>
													</div>
												</div><!--end .card-body -->
											</div><!--end .card -->
										</div><!--end .col -->
										<!-- END ALERT - VISITS -->

										<!-- BEGIN ALERT - BOUNCE RATES -->
										<div class="col-md-4 col-sm-6">
											<div class="card">
												<div class="card-body no-padding">
													<div class="alert alert-callout alert-success no-margin">
														<strong class="text-xl"><i class="fa-taka">&#2547</i> 4,65,730</strong><br/>
														<span class="opacity-50">Total</span>
														<div class="stick-bottom-left-right">
															<div class="progress progress-hairline no-margin">
																<div class="progress-bar progress-bar-success" style="width:43%"></div>
															</div>
														</div>
													</div>
												</div><!--end .card-body -->
											</div><!--end .card -->
										</div><!--end .col -->
										<!-- END ALERT - BOUNCE RATES -->



									</div><!--end .row -->

									<div class="row">

										<!-- BEGIN REGISTRATION HISTORY -->
										<div class="col-md-9">
											<div class="card">
												<div class="card-head">
													<header>Rent Collection history</header>
												</div><!--end .card-head -->
												<div class="card-body no-padding height-9">

													<div class="stick-bottom-left-right force-padding">
														<div id="flot-registrations" class="flot height-5" data-title="Collection history" data-color="#0aa89e"></div>
													</div>
												</div><!--end .card-body -->
											</div><!--end .card -->
										</div><!--end .col -->
										<!-- END REGISTRATION HISTORY -->


										<!-- BEGIN NEW Flat -->
										<div class="col-md-3">
											<div class="card">
												<div class="card-head">
													<header>New Renters</header>

												</div><!--end .card-head -->
												<div class="card-body no-padding height-9 scroll">
													<ul class="list divider-full-bleed">
														<li class="tile">
															<div class="tile-content">
																<div class="tile-icon">
																	<img src="../../assets/img/user01.jpg" alt="" />
																</div>
																<div class="tile-text">Ann Laurens</div>
															</div>
															<a class="btn btn-flat ink-reaction">
																<i class="md md-arrow-forward text-default-light"></i>
															</a>
														</li>
														<li class="tile">
															<div class="tile-content">
																<div class="tile-icon">
																	<img src="../../assets/img/user01.jpg" alt="" />
																</div>
																<div class="tile-text">Alex Nelson</div>
															</div>
															<a class="btn btn-flat ink-reaction">
																<i class="md md-arrow-forward text-default-light"></i>
															</a>
														</li>
														<li class="tile">
															<div class="tile-content">
																<div class="tile-icon">
																	<img src="../../assets/img/user01.jpg" alt="" />
																</div>
																<div class="tile-text">Mary Peterson</div>
															</div>
															<a class="btn btn-flat ink-reaction">
																<i class="md md-arrow-forward text-default-light"></i>
															</a>
														</li>
														<li class="tile">
															<div class="tile-content">
																<div class="tile-icon">
																	<img src="../../assets/img/user01.jpg" alt="" />
																</div>
																<div class="tile-text">Philip Ericsson</div>
															</div>
															<a class="btn btn-flat ink-reaction">
																<i class="md md-arrow-forward text-default-light"></i>
															</a>
														</li>
														<li class="tile">
															<div class="tile-content">
																<div class="tile-icon">
																	<img src="../../assets/img/user01.jpg" alt="" />
																</div>
																<div class="tile-text">Jim Peters</div>
															</div>
															<a class="btn btn-flat ink-reaction">
																<i class="md md-arrow-forward text-default-light"></i>
															</a>
														</li>
														<li class="tile">
															<div class="tile-content">
															<a href="#">View all <span class="pull-right"><i class="fa fa-arrow-right"></i></span>
															</a>
														</div>
														</li>

													</ul>
												</div><!--end .card-body -->
											</div><!--end .card -->
										</div><!--end .col -->
										<!-- END NEW Flat -->

									</div><!--end .row -->
								</div><!--end .section-body -->
							</section>



				</div><!--end .section-body -->
			</section>
			<!-- BEGIN Page SECTION -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('extraScript'); ?>
<script src="<?php echo e(url('/')); ?>/assets/js/libs/spin.js/spin.min.js"></script>
<script src="<?php echo e(url('/')); ?>/assets/js/libs/autosize/jquery.autosize.min.js"></script>
<script src="<?php echo e(url('/')); ?>/assets/js/libs/moment/moment.min.js"></script>
<script src="<?php echo e(url('/')); ?>/assets/js/libs/flot/jquery.flot.min.js"></script>
<script src="<?php echo e(url('/')); ?>/assets/js/libs/flot/jquery.flot.time.min.js"></script>
<script src="<?php echo e(url('/')); ?>/assets/js/libs/flot/jquery.flot.resize.min.js"></script>
<script src="<?php echo e(url('/')); ?>/assets/js/libs/flot/jquery.flot.orderBars.js"></script>
<script src="<?php echo e(url('/')); ?>/assets/js/libs/flot/jquery.flot.pie.js"></script>
<script src="<?php echo e(url('/')); ?>/assets/js/libs/flot/curvedLines.js"></script>
<script src="<?php echo e(url('/')); ?>/assets/js/libs/jquery-knob/jquery.knob.min.js"></script>
<script src="<?php echo e(url('/')); ?>/assets/js/libs/sparkline/jquery.sparkline.min.js"></script>
<script src="<?php echo e(url('/')); ?>/assets/js/libs/d3/d3.min.js"></script>
<script src="<?php echo e(url('/')); ?>/assets/js/libs/d3/d3.v3.js"></script>
<script src="<?php echo e(url('/')); ?>/assets/js/libs/rickshaw/rickshaw.min.js"></script>
<script src="<?php echo e(url('/')); ?>/assets/js/core/demo/Demo.js"></script>
<script src="<?php echo e(url('/')); ?>/assets/js/core/demo/DemoDashboard.js"></script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>