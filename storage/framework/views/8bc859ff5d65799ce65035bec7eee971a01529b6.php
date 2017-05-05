<!DOCTYPE html>
<html lang="en">
<head>
	<title>HRM- Login</title>

	<!-- BEGIN META -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="keywords" content="rhm,rent,housing,manage">
	<meta name="description" content="Easy & hassle free Rent & Housing Management Web Application">
	<!-- END META -->

	<!-- BEGIN STYLESHEETS -->
	<link href='http://fonts.googleapis.com/css?family=Roboto:300italic,400italic,300,400,500,700,900' rel='stylesheet' type='text/css'/>
	<link type="text/css" rel="stylesheet" href="<?php echo e(url('/')); ?>/assets/css/bootstrap.css" />
	<link type="text/css" rel="stylesheet" href="<?php echo e(url('/')); ?>/assets/css/materialadmin.css" />
	<link type="text/css" rel="stylesheet" href="<?php echo e(url('/')); ?>/assets/css/font-awesome.min.css" />
	<style>
	@media (max-height: 700px) and (min-height: 500px){
		section.section-account .img-backdrop, section.section-account .spacer {
			height: 270px;
		}
	}
	</style>
	<!-- END STYLESHEETS -->

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script type="text/javascript" src="<?php echo e(url('/')); ?>/assets/js/libs/utils/html5shiv.js"></script>
	<script type="text/javascript" src="<?php echo e(url('/')); ?>/assets/js/libs/utils/respond.min.js"></script>
	<![endif]-->

</head>
<body class="menubar-hoverable header-fixed ">

	<!-- BEGIN LOGIN SECTION -->
	<section class="section-account">
		<div class="img-backdrop" style="background-image: url('../../assets/img/rhm.jpg')"></div>
		<div class="spacer"></div>
		<div class="card contain-sm style-transparent">
			<div class="card-body">
				<div class="row">
					<div class="col-sm-3"></div>
					<div class="col-sm-6">
						<br/>
						<span class="text-lg text-bold text-primary">House Rent Management</span>
						<br/><br/>
						<form class="form floating-label" action="<?php echo e(URL::Route('user.login')); ?>" accept-charset="utf-8" method="post">
							 <?php echo e(csrf_field()); ?>

							<div class="form-group">
								<input required="required" type="email" class="form-control" id="username" name="email">
								<label for="username">Email Address</label>
								<span class="text-danger"><?php echo e($errors->first('email')); ?></span>
							</div>
							<div class="form-group">
								<input required="required" type="password" class="form-control" id="password" name="password">
								<label for="password">Password</label>
								<span class="text-danger"><?php echo e($errors->first('password')); ?></span>
							</div>
							<div class="row">
								<?php if(Session::has('success')): ?>
								<div class="alert alert-success">
									<?php echo e(Session::get('success')); ?>

								</div>
								<?php endif; ?>
								<?php if(Session::has('error')): ?>
								<div class="alert alert-danger">
									<?php echo e(Session::get('error')); ?>

								</div>
								<?php endif; ?>
								<?php if(Session::has('warning')): ?>
								<div class="alert alert-warning">
									<?php echo e(Session::get('warning')); ?>

								</div>
								<?php endif; ?>
							</div>
							<div class="row">
								<div class="col-xs-6 text-left">
									<div class="checkbox checkbox-inline checkbox-styled">
										<label>
											<input type="checkbox" name"remember"> <span>Remember me</span>
										</label>
									</div>
								</div><!--end .col -->
								<div class="col-xs-6 text-right">
									<button class="btn btn-primary btn-raised" type="submit"><i class="fa fa-sign-in"></i> Login</button>
								</div><!--end .col -->
							</div><!--end .row -->
						</form>
					</div><!--end .col -->
					<div class="col-sm-3"></div>

				</div><!--end .card -->
			</section>
			<!-- END LOGIN SECTION -->
			<!-- BEGIN JAVASCRIPT -->
			<script src="<?php echo e(url('/')); ?>/assets/js/libs/jquery/jquery-1.11.2.min.js"></script>
			<script src="<?php echo e(url('/')); ?>/assets/js/libs/bootstrap/bootstrap.min.js"></script>
			<script src="<?php echo e(url('/')); ?>/assets/js/core/source/App.js"></script>
			<script src="<?php echo e(url('/')); ?>/assets/js/core/source/AppForm.js"></script>

			<!-- END JAVASCRIPT -->

		</body>
		</html>
