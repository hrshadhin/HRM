<?php $__env->startSection('title', 'Report-customers'); ?>
<?php $__env->startSection('extraStyle'); ?>
  <link type="text/css" rel="stylesheet" href="<?php echo e(url('/')); ?>/assets/css/libs/select2/select2.css" />

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
  <section>
    <div class="section-header no-print">
      <ol class="breadcrumb">
        <li class="active">Customer Report</li>
      </ol>
    </div><!--end .section-header -->
    <div class="section-body">
      <section>
        <div class="section-body">
          <div class="row no-print">
            <div class="col-lg-12">
              <form class="form form-validate floating-label"
                    novalidate="novalidate"
                    action="<?php echo e(URL::route('report.customers')); ?>"
                    method="GET"
                    enctype="multipart/form-data">

                <div class="card">
                  <div class="card-head style-primary">
                    <header>Filters</header>
                  </div>
                  <div class="card-body">
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="form-group">
                          <?php echo Form::select('status', ['All' => 'All', 'No' => 'Inactive','Yes' =>'Active'], $status, ['class' => 'form-control select2-list', 'required' => 'required']); ?>

                          <label for="">Status</label>
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary ink-reaction"><i class="md md-filter-list"></i> get</button>
                        </div>
                      </div>
                    </div>

                  </div><!--end .card-body -->
                </div><!--end .card -->
              </form>

            </div>
          </div>
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
                      <h1 class="text-light text-default-light"><strong>Customers</strong></h1>
                    </div>
                    <div class="col-xs-2 text-right">
                      <div class="pull-right">Print:<?php echo e(date('d/m/Y')); ?> </div>
                    </div>
                  </div><!--end .row -->

                  <div class="row">
                    <div class="col-md-12">
                      <table class="table table-striped">
                        <thead>
                        <tr>
                          <th style="width:15%" class="text-center">Name</th>
                          <th style="width:10%" class="text-center">Mobile</th>
                          <th style="width:10%" class="text-center">Phone</th>
                          <th style="width:20%" class="text-center">Permanent Address</th>
                          <th style="width:20%" class="text-center">Mailing Address</th>
                          <th style="width:10%" class="text-center">Contact Person</th>
                          <th style="width:10%" class="text-center">C.P Mobile</th>
                          <th style="width:5%" class="text-center">Status</th>
                          <th style="width:10%" class="text-center">Entry</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                          <tr>
                            <td class="text-center"><?php echo e($customer->name); ?></td>
                            <td class="text-center"><?php echo e($customer->cellNo); ?></td>
                            <td class="text-center"><?php echo e($customer->phone); ?></td>
                            <td class="text-center"><?php echo e($customer->permanentAddress); ?></td>
                            <td class="text-center"><?php echo e($customer->mailingAddress); ?></td>
                            <td class="text-center"><?php echo e($customer->contactPerson); ?></td>
                            <td class="text-center"><?php echo e($customer->contactPersonCellNo); ?></td>
                            <td class="text-center">
                              <?php if($customer->active == "No"): ?>
                                <span class="text-warning text-bold">Inactive</span>
                              <?php else: ?>
                                <span class="text-success text-bold">Active</span>

                              <?php endif; ?>
                            </td>

                            <td class="text-center"><?php echo e($customer->entryDate->format('d/m/Y')); ?></td>
                          </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                        </tbody>
                        <tfoot>
                        <tr>
                          <td colspan="8" class="text-right"><strong class="text-lg text-default-dark">Total</strong></td>
                          <td class="text-right"><strong class="text-lg text-default-dark"><?php echo e(count($customers)); ?></strong></td>
                        </tr>
                        </tfoot>
                      </table>
                    </div><!--end .col -->
                  </div><!--end .row -->

                </div><!--end .card-body -->
              </div><!--end .card -->
            </div><!--end .col -->
          </div><!--end .row -->
        </div>
      </section>
    </div>

  </section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('extraScript'); ?>
  <script src="<?php echo e(url('/')); ?>/assets/js/libs/select2/select2.min.js"></script>

  <script type="text/javascript">
      $( document ).ready(function() {
          $('#menubarToggler').trigger('click');
          $('select').select2();

      });
  </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>