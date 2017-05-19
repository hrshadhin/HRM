<?php $__env->startSection('title', 'Report-Balance'); ?>

<?php $__env->startSection('content'); ?>
  <section>
    <div class="section-header no-print">
      <ol class="breadcrumb">
        <li class="active">Balance Report</li>
      </ol>
    </div><!--end .section-header -->
    <div class="section-body">
      <section>
        <div class="section-body">
          <div class="row">
            <div class="col-lg-12">
              <div class="card card-printable style-default-light">
                <div class="card-head no-print">
                  <div class="tools">
                    <div class="btn-group">
                      <a class="btn btn-floating-action btn-primary" href="javascript:void(0);" onclick="javascript:window.print();"><i class="md md-print"></i></a>
                    </div>
                  </div>
                </div><!--end .card-head -->
                <div class="card-body style-default-bright top-zero">
                  <div class="row">
                    <div class="col-xs-7">
                      <img src="/assets/img/logo.png" height="80px" width="100px" alt="">
                      <span class="text-left" style="font-size:16px">Shamsul Alamin Real Estate Ltd.</span>
                   </div>
                    <div class="col-xs-3 text-right">
                      <h1 class="text-light text-default-light"><strong>Balance</strong></h1>
                    </div>
                    <div class="col-xs-2 text-right">
                      <div class="pull-right">Print:<?php echo e(date('d/m/Y')); ?> </div>
                    </div>
                  </div><!--end .row -->
                  <div class="row text-center">
                    <div class="col-xs-4">

                      <h1 class="text-light text-default-light">Total Collection</h1> <h2>&#2547;<?php echo e($collections); ?> </h2>

                  </div>
                    <div class="col-xs-4">

                      <h1 class="text-light text-default-light">Total Expense</h1> <h2>&#2547;<?php echo e($expenses); ?></h2>

                  </div> <div class="col-xs-4">

                      <h1 class="text-light text-default-light">Balance</h1> <h2>&#2547;<?php echo e($collections - $expenses); ?></h2>

                  </div>
                  </div>


                </div><!--end .card-body -->
              </div><!--end .card -->
            </div><!--end .col -->
          </div><!--end .row -->
        </div>
      </section>
    </div>

  </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>