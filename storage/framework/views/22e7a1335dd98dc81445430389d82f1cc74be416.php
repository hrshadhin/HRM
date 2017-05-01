<?php $__env->startSection('title', 'flat Edit'); ?>
<?php $__env->startSection('extraStyle'); ?>
<link type="text/css" rel="stylesheet" href="<?php echo e(url('/')); ?>/assets/css/libs/select2/select2.css" />
<link type="text/css" rel="stylesheet" href="<?php echo e(url('/')); ?>/assets/css/libs/bootstrap-datepicker/datepicker3.css" />

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<section>
  <div class="section-header">
    <ol class="breadcrumb">
      <li><a href="<?php echo e(URL::Route('flat.index')); ?>">flats</a></li>
      <li class="active">Update</li>
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
                  action="<?php echo e(URL::route('flat.update',$flat->id)); ?>"
                  method="POST"
                  enctype="multipart/form-data"
            >

              <div class="card">
                <div class="card-head style-primary">
                  <header>Update flat</header>
                </div>
                <div class="card-body">
                  <div class="form-group">
                    <?php echo e(csrf_field()); ?>

                    <?php echo e(method_field('PATCH')); ?>

                  </div>
                  <div class="row">
                    <div class="col-lg-4">
                      <div class="form-group">
                        <select name="status" id="" class="form-control select2-list" required>
                          <?php if($flat->status==0): ?>
                          <option value="0" selected>Empty</option>
                          <option value="1">Booked</option>
                          <?php else: ?>
                            <option value="0" >Empty</option>
                            <option value="1" selected>Booked</option>
                          <?php endif; ?>
                        </select>
                        <label for="status">Status</label>
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                          <span class="radio-inline radio-styled radio-info">
                            <input type="radio"  name="parking" <?php if($flat->parking=='No'): ?> checked <?php endif; ?> value="No"><span>No</span>
                          </span>
                        <span class="radio-inline radio-styled radio-info">
                            <input type="radio"  name="parking" value="Yes" <?php if($flat->parking=='Yes'): ?> checked <?php endif; ?>><span>Yes</span>
                          </span>
                        <label for="parking">Parking</label>

                      </div>
                    </div>
                    <div class="col-lg-4" id="haveParking" style="display: <?php if($flat->parking=='No'): ?> None <?php else: ?> block <?php endif; ?> ;">
                      <div class="form-group">
                        <input type="text" class="form-control" value="<?php echo e($flat->parkingNo); ?>"  name="parkingNo" data-rule-number="true" required>
                        <label for="parkingNo">Parking no</label>
                        <p class="help-block">Numbers only</p>
                      </div>
                    </div>
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
                  <!--end .card-body -->
                  <div class="card-actionbar">
                    <div class="card-actionbar-row">
                      <button type="submit" class="btn btn-primary ink-reaction"><i class="md md-refresh"></i> Update</button>
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
  <script src="<?php echo e(url('/')); ?>/assets/js/libs/select2/select2.min.js"></script>
  <script src="<?php echo e(url('/')); ?>/assets/js/libs/jquery-validation/jquery.validate.min.js"></script>
<script src="<?php echo e(url('/')); ?>/assets/js/libs/jquery-validation/additional-methods.min.js"></script>

<script type="text/javascript">
$( document ).ready(function() {
    $('select').select2();

    $('.radio-styled').click(function () {
        $(this).children('input').attr('checked', true);
        if($(this).children('input').val() == "Yes"){
            $('#haveParking').show();
        }
        else{
            $('#haveParking').hide();
        }
    });

});
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>