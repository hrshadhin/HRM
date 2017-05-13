<?php $__env->startSection('title', 'Project Create'); ?>
<?php $__env->startSection('extraStyle'); ?>
  <link type="text/css" rel="stylesheet" href="<?php echo e(url('/')); ?>/assets/css/libs/select2/select2.css" />
  <link type="text/css" rel="stylesheet" href="<?php echo e(url('/')); ?>/assets/css/libs/bootstrap-datepicker/datepicker3.css" />

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
  <section>
    <div class="section-header">
      <ol class="breadcrumb">
        <li><a href="<?php echo e(URL::Route('project.index')); ?>">Projects</a></li>
        <li class="active">Create</li>
      </ol>
    </div><!--end .section-header -->
    <div class="section-body">
      <section>
        <div class="section-body">
          <!-- BEGIN HORIZONTAL FORM -->
          <div class="row">
            <div class="col-lg-12">
              <form class="form form-validate floating-label"
                    novalidate="novalidate"
                    action="<?php echo e(URL::route('project.store')); ?>"
                    method="POST"
                    enctype="multipart/form-data"
              >

                <div class="card">
                  <div class="card-head style-primary">
                    <header>Create A Project</header>
                  </div>
                  <div class="card-body">
                    <div class="form-group">
                      <?php echo e(csrf_field()); ?>

                    </div>
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="form-group">
                          <input type="text" class="form-control"  name="projectId" data-rule-minlength="2" maxlength="255" required>
                          <label for="projectId">Project Id</label>
                          <p class="help-block">min: 2 / max: 255 letters</p>
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <select id="projectType" class="form-control select2-list" name="projectType" required>
                            <option value="Commerical">Commerical</option>
                            <option value="Residential">Residential</option>
                          </select>
                          <label for="projectType">Project Type</label>
                          <p class="help-block"></p>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="form-group">
                          <input type="text" class="form-control"  name="name" data-rule-minlength="2" maxlength="255" required>
                          <label for="name">Project Name</label>
                          <p class="help-block">min: 2 / max: 255 letters</p>
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <input type="text" class="form-control datepicker" value="<?php echo e($today->format('d/m/Y')); ?>" name="entryDate" required>
                          <label for="dateOfEntry">Date of entry</label>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="form-group">
                          <?php echo Form::select('areas_id', $areas, null, ['class' => 'form-control select2-list', 'required' => 'required']); ?>

                          <label for="name">Area</label>
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <textarea class="form-control"  name="address" rows="1" data-rule-minlength="2" maxlength="500" required></textarea>
                          <label for="address">Address</label>
                          <p class="help-block">min: 2 / max: 500 letters</p>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="form-group">
                          <textarea class="form-control"  name="description" rows="1"  maxlength="1000"></textarea>
                          <label for="description">Description</label>
                          <p class="help-block">min: 2 / max: 1000 letters</p>
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <input type="text" class="form-control"  name="storied"  data-rule-minlength="2" maxlength="255" required>
                          <label for="storied">Building Storied</label>
                          <p class="help-block">min: 2 / max: 255 letters</p>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="form-group">
                          <input type="text" class="form-control"  name="noOfUnits" data-rule-number="true" required>
                          <label for="noOfUnits">No of units</label>
                          <p class="help-block">Numbers only</p>
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <input type="text" class="form-control"  name="noOfFloor" data-rule-number="true" required>
                          <label for="noOfFloor">No of floor</label>
                          <p class="help-block">Numbers only</p>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="form-group">
                          <input type="text" class="form-control"  name="noOfCarParking" data-rule-number="true" required>
                          <label for="noOfCarParking">No of car parking</label>
                          <p class="help-block">Numbers only</p>
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <input type="text" class="form-control"  name="unitSize" data-rule-number="true" required>
                          <label for="unitSize">Units Size(Sft.)</label>
                          <p class="help-block">Numbers only</p>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="form-group">

                          <span class="radio-inline radio-styled radio-info">
                            <input type="radio" name="lift" checked="true" value="Yes"><span>Yes</span>
                          </span>
                          <span class="radio-inline radio-styled radio-info">
                            <input type="radio" name="lift" value="No"><span>No</span>
                          </span>
                          <label for="lift">Lift</label>

                        </div>

                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">

                          <span class="radio-inline radio-styled radio-info">
                            <input type="radio" name="generator" checked="true" value="Yes"><span>Yes</span>
                          </span>
                        <span class="radio-inline radio-styled radio-info">
                            <input type="radio" name="generator" value="No"><span>No</span>
                          </span>

                        <label for="generator">Generator</label>
                      </div>
                    </div>

                    <div class="form-group">
                      <?php if(count($errors) > 0): ?>
                        <div class="alert alert-danger">
                          <strong>Whoops!</strong> There were some problems with your input.<br><br>
                          <ul>
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                              <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                          </ul>
                        </div>
                      <?php endif; ?>
                    </div>
                  </div><!--end .card-body -->
                  <div class="card-actionbar">
                    <div class="card-actionbar-row">
                      <button type="submit" class="btn btn-primary ink-reaction"><i class="md md-add-circle-outline"></i> Create</button>
                    </div>
                  </div>
                </div><!--end .card -->
              </form>
            </div><!--end .col -->
          </div><!--end .row -->
          <!-- END HORIZONTAL FORM -->
        </div>
      </section>
    </div>

  </section>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('extraScript'); ?>
  <script src="<?php echo e(url('/')); ?>/assets/js/libs/bootstrap-datepicker/bootstrap-datepicker.js"></script>
  <script src="<?php echo e(url('/')); ?>/assets/js/libs/select2/select2.min.js"></script>
  <script src="<?php echo e(url('/')); ?>/assets/js/libs/jquery-validation/jquery.validate.min.js"></script>
  <script src="<?php echo e(url('/')); ?>/assets/js/libs/jquery-validation/additional-methods.min.js"></script>

  <script type="text/javascript">
      $( document ).ready(function() {
          $('select').select2();
          $('.datepicker').datepicker({
              format: 'dd/mm/yyyy',
              autoclose: true,
              todayHighlight : true

          });
          $('.radio-styled').click(function () {
             $(this).children('input').attr('checked', true);
          });
      });
  </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>