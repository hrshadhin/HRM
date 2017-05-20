<?php $__env->startSection('title', 'Area List'); ?>
<?php $__env->startSection('extraStyle'); ?>
  <style>
    th{
      font-weight: blod !important;
      color:#000 !important;
    }
  </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
  <section>
    <div class="section-header">
      <ol class="breadcrumb">
        <li class="active">Area</li>
      </ol>
    </div><!--end .section-header -->
    <div class="section-body">
      <section>
        <div class="section-body">
          <div class="row">
            <div class="col-lg-12">
              <form class="form form-validate floating-label"
                    novalidate="novalidate"
                    action="<?php echo e(URL::route('area.store')); ?>"
                    method="POST"
                    enctype="multipart/form-data"
              >

                <div class="card">
                  <div class="card-head style-primary">
                    <header>Create A Area</header>
                  </div>
                  <div class="card-body">
                    <div class="form-group">
                      <?php echo e(csrf_field()); ?>

                    </div>
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="form-group">
                          <input type="text" id="areaName" class="form-control"  name="name" data-rule-minlength="2" maxlength="255" required>
                          <label for="projectId">Area Name</label>
                          <p class="help-block">min: 2 / max: 255 letters</p>
                        </div>
                      </div>
                    </div>
                    </div>

                    <div class="card-actionbar">
                      <div class="card-actionbar-row">
                        <button type="submit" class="btn btn-primary ink-reaction"><i class="md md-add-circle-outline"></i> Create</button>
                      </div>
                    </div>
                  </div><!--end .card -->
              </form>
            </div><!--end .col -->
          </div><!--end .row -->
          <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-head style-primary">
                  <header>Area List</header>
                </div>
                <div class="card-body no-padding">
                  <div class="table-responsive no-margin">
                    <table class="table table-striped no-margin">
                      <thead>
                      <tr>
                        <th width="50%" >Name</th>
                        <th width="50%" >Action</th>
                      </tr>
                      </thead>
                      <tbody>
                      <?php $__currentLoopData = $areas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $area): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                        <tr>
                          <td class="text-center"><?php echo e($area->name); ?></td>
                          <td class="text-center">
                            <div class="btn-group">
                              <?php if (app('Illuminate\Contracts\Auth\Access\Gate')->check('area.destroy')): ?>
                              <form class="myAction" method="POST" action="<?php echo e(URL::route('area.destroy',$area->id)); ?>">
                                <input name="_method" type="hidden" value="DELETE">
                                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                <button type="submit" class="btn ink-reaction btn-floating-action btn-danger btn-sm" title="Delete">
                                  <i class="fa fa-fw fa-trash"></i>
                                </button>
                              </form>
                              <?php endif; ?>
                            </div>
                            <!--end .btn-group -->
                          </td>
                        </tr>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                      </tbody>
                    </table>
                  </div><!--end .table-responsive -->
                  <?php echo e($areas->links()); ?>

                </div><!--end .card-body -->
              </div><!--end .card -->
            </div><!--end .col -->
          </div><!--end row -->

        </div>
      </section>
    </div>

  </section>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('extraScript'); ?>
  <script src="<?php echo e(url('/')); ?>/assets/js/libs/jquery-validation/jquery.validate.min.js"></script>
  <script src="<?php echo e(url('/')); ?>/assets/js/libs/jquery-validation/additional-methods.min.js"></script>

  <script>
      $( document ).ready(function() {
          $('form.myAction').click(function (e) {
              e.preventDefault();
              var that = this;
              swal({
                  title: 'Are you sure?',
                  text: "If you delete this, related data will be deleted also!",
                  type: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Yes, delete it!'
              }).then(function () {
                 that.submit();
              })
          });

      });
  </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>