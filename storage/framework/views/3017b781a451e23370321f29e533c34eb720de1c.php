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
														<strong class="text-xl"><i class="fa-taka">&#2547</i> <?php echo e(number_format($collections, 2, '.', ',')); ?></strong><br/>
														<span class="opacity-100">Collections</span>
														<div class="stick-bottom-left-right">
															<div class="progress progress-hairline no-margin">
																<div class="progress-bar progress-bar-info" style="width:100%"></div>
															</div>
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
														<strong class="text-xl"><i class="fa-taka">&#2547</i> <?php echo e(number_format($totalDue, 2, '.', ',')); ?></strong><br/>
														<span class="opacity-100">Due</span>
														<div class="stick-bottom-left-right">
															<div class="progress progress-hairline no-margin">
																<div class="progress-bar progress-bar-warning" style="width:100%"></div>
															</div>
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
														<strong class="text-xl"><i class="fa-taka">&#2547</i> <?php echo e(number_format($total, 2, '.', ',')); ?></strong><br/>
														<span class="opacity-100">Total</span>
														<div class="stick-bottom-left-right">
															<div class="progress progress-hairline no-margin">
																<div class="progress-bar progress-bar-success" style="width:100%"></div>
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
														<?php $__currentLoopData = $newRenters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $renter): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
														<li class="tile">
															<div class="tile-content">
																<div class="tile-icon">
																	<img src="<?php echo e(URL::asset('storage')); ?>/<?php if($renter->customer->photo): ?><?php echo e($renter->customer->photo); ?> <?php else: ?><?php echo e('customers/avatar.png'); ?><?php endif; ?>" alt="" />
																</div>
																<div class="tile-text"><?php echo e($renter->customer->name); ?></div>
															</div>
															<a class="btn btn-flat ink-reaction" href="<?php echo e(URL::route('customer.show',$renter->customer->id)); ?>">
																<i class="md md-arrow-forward text-default-light"></i>
															</a>
														</li>
														<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
													</ul>
													<a href="<?php echo e(URL::route('rent.index')); ?>" class="pull-right text-info">View all <i class="md md-arrow-forward text-default-light"></i></a>

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

	<script>
		(function (namespace, $) {
		"use strict";

		var DemoDashboard = function () {
		// Create reference to this instance
		var o = this;
		// Initialize app when document is ready
		$(document).ready(function () {
		o.initialize();
		});

		};
		var p = DemoDashboard.prototype;

		// =========================================================================
		// MEMBERS
		// =========================================================================

		p.rickshawSeries = [[], []];
		p.rickshawGraph = null;
		p.rickshawRandomData = null;
		p.rickshawTimer = null;

		// =========================================================================
		// INIT
		// =========================================================================

		p.initialize = function () {
		this._initFlotRegistration();
		};


		// =========================================================================
		// FLOT
		// =========================================================================

		p._initFlotRegistration = function () {
		var o = this;
		var chart = $("#flot-registrations");

		// Elements check
		if (!$.isFunction($.fn.plot) || chart.length === 0) {
		return;
		}

		// Chart data
		var data = [
		{
		label: 'Collections',
		data: [
		    <?php $__currentLoopData = $collectionsAll; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $collection): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
		[moment(new Date('<?php echo e($collection->date); ?>')).valueOf(), <?php echo e($collection->amounts); ?>],
			<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
		],
		last: true
		}
		];

		// Chart options
		var labelColor = chart.css('color');
		var options = {
		colors: chart.data('color').split(','),
		series: {
		shadowSize: 0,
		lines: {
		show: true,
		lineWidth: 2
		},
		points: {
		show: true,
		radius: 3,
		lineWidth: 2
		}
		},
		legend: {
		show: false
		},
		xaxis: {
		mode: "time",
		timeformat: "%b %y",
		color: 'rgba(0, 0, 0, 0)',
		font: {color: labelColor}
		},
		yaxis: {
		font: {color: labelColor}
		},
		grid: {
		borderWidth: 0,
		color: labelColor,
		hoverable: true
		}
		};
		chart.width('100%');

		// Create chart
		var plot = $.plot(chart, data, options);

		// Hover function
		var tip, previousPoint = null;
		chart.bind("plothover", function (event, pos, item) {
		if (item) {
		if (previousPoint !== item.dataIndex) {
		previousPoint = item.dataIndex;

		var x = item.datapoint[0];
		var y = item.datapoint[1];
		var tipLabel = '<strong>' + $(this).data('title') + '</strong>';
		var tipContent = y + " " + item.series.label.toLowerCase() + " on " + moment(x).format('DD/MM/YYYY');

		if (tip !== undefined) {
		$(tip).popover('destroy');
		}
		tip = $('<div></div>').appendTo('body').css({left: item.pageX, top: item.pageY - 5, position: 'absolute'});
		tip.popover({html: true, title: tipLabel, content: tipContent, placement: 'top'}).popover('show');
		}
		}
		else {
		if (tip !== undefined) {
		$(tip).popover('destroy');
		}
		previousPoint = null;
		}
		});
		};

		// =========================================================================
		namespace.DemoDashboard = new DemoDashboard;
		}(this.materialadmin, jQuery)); // pass in (namespace, jQuery):

	</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>