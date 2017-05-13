<?php $__env->startSection('title', 'Report-Projects'); ?>
<?php $__env->startSection('extraStyle'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
  <section>
    <div class="section-header no-print">
      <ol class="breadcrumb">
        <li class="active">Projects Report</li>
      </ol>
    </div><!--end .section-header -->
    <div class="section-body">
      <section>
        <div class="section-body">
          <div class="row no-print">
            <div class="col-lg-12">
              <form class="form form-validate floating-label"
                    novalidate="novalidate"
                    action="<?php echo e(URL::route('report.projects')); ?>"
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
                          <?php echo Form::select('ptype', ['All' => 'All', 'Commerical' => 'Commerical','Residential' =>'Residential'], $projectType, ['id' => 'projectType' ,'class' => 'form-control select2-list', 'required' => 'required']); ?>

                          <label for="projectType">Project Type</label>
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
                      <h1 class="text-light text-default-light"><strong>Projects</strong></h1>
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
                          <th style="width:5%" class="text-center">Type</th>
                          <th style="width:20%" class="text-center">Name</th>
                          <th style="width:5%" class="text-center">Area</th>
                          <th style="width:20%" class="text-center">Address</th>
                          <th style="width:20%" class="text-center">Storied</th>
                          <th style="width:5%" class="text-center">Units</th>
                          <th style="width:5%" class="text-center">Floors</th>
                          <th style="width:5%" class="text-center">Parking</th>
                          <th style="width:5%" class="text-center">Lift</th>
                          <th style="width:5%" class="text-center">Generator</th>
                          <th style="width:5%" class="text-center">Entry</th>
                        </tr>
                        </thead>
                        <tbody>
                          <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                            <tr>
                              <td class="text-center"><?php echo e($project->projectType); ?></td>
                              <td class="text-center"><?php echo e($project->name); ?></td>
                              <td  class="text-center"><?php echo e($project->area->name); ?></td>
                              <td  class="text-center"><?php echo e($project->address); ?></td>
                              <td  class="text-center"><?php echo e($project->storied); ?></td>
                              <td class="text-center"><?php echo e($project->noOfUnits); ?></td>
                              <td class="text-center"><?php echo e($project->noOfFloor); ?></td>
                              <td class="text-center"><?php echo e($project->noOfCarParking); ?></td>
                              <td class="text-center"><?php echo e($project->lift); ?></td>
                              <td class="text-center"><?php echo e($project->generator); ?></td>
                              <td class="text-center"><?php echo e($project->entryDate->format('d/m/Y')); ?></td>
                            </tr>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                        </tbody>
                        <tfoot>
                        <tr>
                          <td colspan="10" class="text-right"><strong class="text-lg text-default-dark">Total</strong></td>
                          <td class="text-right"><strong class="text-lg text-default-dark"><?php echo e(count($projects)); ?></strong></td>
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
  <script type="text/javascript">
      $( document ).ready(function() {
          $('#menubarToggler').trigger('click');
      });
  </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>