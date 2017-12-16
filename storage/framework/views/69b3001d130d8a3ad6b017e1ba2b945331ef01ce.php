<?php $__env->startSection('title', 'Report-flats'); ?>
<?php $__env->startSection('extraStyle'); ?>
  <link type="text/css" rel="stylesheet" href="<?php echo e(url('/')); ?>/assets/css/libs/select2/select2.css" />

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
  <section>
    <div class="section-header no-print">
      <ol class="breadcrumb">
        <li class="active">Flats Report</li>
      </ol>
    </div><!--end .section-header -->
    <div class="section-body">
      <section>
        <div class="section-body">
          <div class="row no-print">
            <div class="col-lg-12">
              <form class="form form-validate floating-label"
                    novalidate="novalidate"
                    action="<?php echo e(URL::route('report.flats')); ?>"
                    method="GET"
                    enctype="multipart/form-data">

                <div class="card">
                  <div class="card-head style-primary">
                    <header>Filters</header>
                  </div>
                  <div class="card-body">
                    <div class="row">
                      <div class="col-lg-4">
                        <div class="form-group">
                          <?php echo Form::select('project', $projects, $project, ['class' => 'form-control select2-list', 'required' => 'required']); ?>

                          <label for="">Project</label>
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <?php echo Form::select('status', ['All' => 'All', '0' => 'Vacant','1' =>'Rented'], $status, ['class' => 'form-control select2-list', 'required' => 'required']); ?>

                          <label for="">Status</label>
                        </div>
                      </div>
                      <div class="col-lg-4">
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
                    <div class="col-xs-5">
                      <img src="/assets/img/logo.png" height="80px" width="100px" alt="">
                      <span class="text-left" style="font-size:16px">Shamsul Alamin Group</span>
                    </div>
                    <div class="col-xs-5 text-left">
                      <h3 class="text-light text-default-light"><strong><?php if($project !="All" and count($flats)): ?><?php echo e($flats[0]->project->name); ?> <?php endif; ?> Flats
                          <?php if($status !="All" ): ?> [ <?php if($status==1): ?> Rented <?php else: ?> Vacant <?php endif; ?>] <?php endif; ?>
                        </strong></h3>
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
                          <?php if($project =="All"): ?>
                          <th class="text-center">Project</th>
                          <?php endif; ?>
                          <th class="text-center">Floor</th>
                          <th class="text-center">Type</th>
                          <th class="text-center">Size(sft.)</th>
                          <th class="text-center">Parking</th>
                          <?php if($status =="All" ): ?>
                          <th class="text-center">Staus</th>
                          <?php endif; ?>
                          <th class="text-center">Entry</th>
                        </tr>
                        </thead>
                        <tbody>
                          <?php $__currentLoopData = $flats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $flat): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                            <tr>
                              <?php if($project =="All"): ?>
                              <td class="text-center"><?php echo e($flat->project->name); ?></td>
                              <?php endif; ?>
                              <td class="text-center"><?php echo e(floorLevel($flat->floor)); ?></td>
                              <td  class="text-center"><?php echo e(flatType($flat->type)); ?></td>
                              <td  class="text-center"><?php echo e($flat->size); ?></td>
                              <td  class="text-center">
                                <?php if($flat->parking == "Yes"): ?>
                                  <?php echo e($flat->parkingNo); ?>

                                <?php else: ?>
                                  --
                                <?php endif; ?>
                              </td>
                              <?php if($status =="All" ): ?>
                              <td class="text-center">
                                <?php if($flat->status == 1): ?>
                                  <span class="text-warning text-bold">Rented</span>
                                <?php else: ?>
                                  <span class="text-success text-bold">Vacant</span>

                                <?php endif; ?>
                              </td>
                              <?php endif; ?>

                              <td class="text-center"><?php echo e($flat->entryDate->format('d/m/Y')); ?></td>
                            </tr>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                        </tbody>
                        <tfoot>
                        <tr>
                          <td colspan="<?php if($project =="All" and $status =="All"): ?>6 <?php endif; ?> <?php if($project == "All" or $status =="All"): ?>5 <?php else: ?> 4 <?php endif; ?>" class="text-right"><strong class="text-lg text-default-dark">Total</strong></td>
                          <td class="text-right"><strong class="text-lg text-default-dark"><?php echo e(count($flats)); ?></strong></td>
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