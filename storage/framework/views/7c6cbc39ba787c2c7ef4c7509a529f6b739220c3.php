<?php $__env->startSection('title', 'Customer Create'); ?>
<?php $__env->startSection('extraStyle'); ?>
  <link type="text/css" rel="stylesheet" href="<?php echo e(url('/')); ?>/assets/css/libs/select2/select2.css" />
  <link type="text/css" rel="stylesheet" href="<?php echo e(url('/')); ?>/assets/css/libs/bootstrap-datepicker/datepicker3.css" />


<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
  <section>
    <div class="section-header">
      <ol class="breadcrumb">
        <li><a href="<?php echo e(URL::Route('customer.index')); ?>">Cutomers</a></li>
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
                    action="<?php echo e(URL::route('customer.store')); ?>"
                    method="POST"
                    enctype="multipart/form-data"
              >
                <div class="card card-underline">
                  <div class="card-head style-primary">
                    <ul class="nav nav-tabs tabs-text-contrast tabs-warning pull-right" data-toggle="tabs">
                      <li class="active"><a href="#first2">Personal Information</a></li>
                      <li class=""><a href="#second2">Business Information</a></li>
                    </ul>
                    <header>Create a customer</header>
                  </div>
                  <div class="card-body tab-content">
                    <div class="tab-pane active" id="first2">
                        <?php echo e(csrf_field()); ?>

                      <div class="row">
                        <div class="col-lg-6">
                          <div class="form-group">
                            <input type="text" class="form-control" value="<?php echo e(old('name')); ?>"  name="name" data-rule-minlength="4" maxlength="100" required>
                            <label for="name">Name</label>
                            <p class="help-block">min: 4 / max: 100 letters</p>
                          </div>
                        </div>
                        <div class="col-lg-3">
                          <div class="form-group">
                            <input type="text" class="form-control" value="<?php echo e(old('cellNo')); ?>" name="cellNo" data-rule-minlength="11" maxlength="11" required>
                            <label for="cellNo">Mobile No</label>
                            <p class="help-block"> min & max: 11 letters</p>
                          </div>
                        </div>
                        <div class="col-lg-3">
                          <div class="form-group">
                            <input type="text" class="form-control" value="<?php echo e(old('phoneNo')); ?>" name="phoneNo" maxlength="15">
                            <label for="phoneNo">Phone No</label>
                            <p class="help-block">max: 15 letters</p>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-6">
                          <div class="form-group">
                            <input type="email" class="form-control" value="<?php echo e(old('email')); ?>"  name="email"  maxlength="100">
                            <label for="email">Email</label>
                            <p class="help-block">max: 100 letters</p>
                          </div>
                        </div>
                        <div class="col-lg-3">
                          <div class="form-group">
                            <div class="input-group date">
                              <div class="input-group-content">
                                <input type="text" name="dob" value="<?php echo e(old('dob')); ?>" class="form-control pick-date">
                                <label>Date of Birth</label>
                              </div>
                              <span class="input-group-addon"></span>
                            </div>
                            <p class="help-block"> dd/mm/yyyy</p>
                          </div><!--end .form-group -->
                        </div>
                        <div class="col-lg-3">
                          <div class="form-group">
                            <div class="input-group date">
                              <div class="input-group-content">
                                <input type="text" name="entryDate" value="<?php if(old('entryDate')): ?> <?php echo e(old('entryDate')); ?> <?php else: ?> <?php echo e($today->format('d/m/Y')); ?> <?php endif; ?>" class="form-control  pick-date" required>
                                <label>Entry Date</label>
                              </div>
                              <span class="input-group-addon"></span>
                            </div>
                            <p class="help-block"> dd/mm/yyyy</p>
                          </div><!--end .form-group -->
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-6">
                          <div class="form-group">
                            <input type="text" class="form-control" value="<?php echo e(old('contactPerson')); ?>" name="contactPerson" maxlength="100">
                            <label for="contactPerson">Contact Person</label>
                            <p class="help-block"> max: 100 letters</p>
                          </div>
                        </div>
                        <div class="col-lg-6">
                          <div class="form-group">
                            <input type="text" class="form-control" value="<?php echo e(old('contactPersonCellNo')); ?>"  name="contactPersonCellNo" data-rule-minlength="11" maxlength="11">
                            <label for="contactPersonCellNo">Contact Person Mobile No</label>
                            <p class="help-block"> min & max: 11 letters</p>
                          </div>
                        </div>

                      </div>
                      <div class="row">
                        <div class="col-lg-4">
                          <div class="form-group">
                            <input type="text" class="form-control" value="<?php echo e(old('fatherName')); ?>" name="fatherName" maxlength="100">
                            <label for="fatherName">Father Name</label>
                            <p class="help-block"> max: 100 letters</p>
                          </div>
                        </div>
                        <div class="col-lg-4">
                          <div class="form-group">
                            <input type="text" class="form-control" value="<?php echo e(old('motherName')); ?>" name="motherName" maxlength="100">
                            <label for="motherName">Mother Name</label>
                            <p class="help-block"> max: 100 letters</p>
                          </div>
                        </div>
                        <div class="col-lg-4">
                          <div class="form-group">
                            <input type="text" class="form-control" value="<?php echo e(old('spouseName')); ?>" name="spouseName" maxlength="100">
                            <label for="spouseName">Spouse Name</label>
                            <p class="help-block"> max: 100 letters</p>
                          </div>
                        </div>

                      </div>
                      <div class="row">
                        <div class="col-lg-6">
                          <div class="form-group">
                            <input type="text" class="form-control" value="<?php echo e(old('nidNo')); ?>"  name="nidNo" maxlength="50">
                            <label for="nidNo">National ID No</label>
                            <p class="help-block"> max: 50 letters</p>
                          </div>
                        </div>
                        <div class="col-lg-6">
                          <div class="form-group">
                            <input type="text" class="form-control" value="<?php echo e(old('passportNo')); ?>" name="passportNo" maxlength="50">
                            <label for="passportNo">Passport No</label>
                            <p class="help-block">max: 50 letters</p>
                          </div>
                        </div>

                      </div>
                      <div class="row">
                        <div class="col-lg-4">
                          <div class="form-group">
                            <textarea class="form-control"  name="mailingAddress" maxlength="500"><?php echo e(old('mailingAddress')); ?></textarea>
                            <label for="mailingAddress">Mailing Address</label>
                            <p class="help-block">max: 500 letters</p>
                          </div>
                        </div>
                        <div class="col-lg-4">
                          <div class="form-group">
                            <textarea class="form-control"  name="presentAddress" maxlength="500"><?php echo e(old('presentAddress')); ?></textarea>
                            <label for="presentAddress">Present Address</label>
                            <p class="help-block">max: 500 letters</p>
                          </div>
                        </div>
                        <div class="col-lg-4">
                          <div class="form-group">
                            <textarea class="form-control"  name="permanentAddress"  maxlength="500" required><?php echo e(old('permanentAddress')); ?></textarea>
                            <label for="permanentAddress">Permanent Address</label>
                            <p class="help-block">max: 500 letters</p>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-4">
                          <div class="form-group">
                            <div class="input-group">
                              <div class="input-group-content">
                                <input type="file" class="form-control" name="photo">
                              </div>
                              <span class="input-group-addon"><i class="fa fa-2x fa-file-image-o info"></i></span>
                            </div>
                            <label>Photo</label>
                          </div>
                        </div>
                        <div class="col-lg-4">
                          <div class="form-group">
                            <div class="input-group">
                              <div class="input-group-content">
                                <input type="file" class="form-control" name="passport">
                              </div>
                              <span class="input-group-addon"><i class="fa fa-2x fa-file info"></i></span>
                            </div>
                            <label>Passport(pdf,image)</label>
                          </div>
                        </div>
                        <div class="col-lg-4">
                          <div class="form-group">
                            <div class="input-group">
                              <div class="input-group-content">
                                <input type="file" class="form-control" name="birthCertificate">
                              </div>
                              <span class="input-group-addon"><i class="fa fa-2x fa-file info"></i></span>
                            </div>
                            <label>Birth Certificate(pdf,image)</label>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="tab-pane" id="second2">
                      <div class="row">
                        <div class="col-lg-6">
                          <div class="form-group">
                            <input type="text" class="form-control"  name="companyName" value="<?php echo e(old('companyName')); ?>" maxlength="255">
                            <label for="companyName">Campany Name</label>
                            <p class="help-block">max: 100 letters</p>
                          </div>
                        </div>
                        <div class="col-lg-6">
                          <div class="form-group">
                            <input type="text" class="form-control"  name="designation" value="<?php echo e(old('designation')); ?>" maxlength="100">
                            <label for="designation">Designation</label>
                            <p class="help-block"> max: 100 letters</p>
                          </div>
                        </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-6">
                            <div class="form-group">
                              <input type="text" class="form-control"  name="cContactPerson" value="<?php echo e(old('cContactPerson')); ?>" maxlength="100">
                              <label for="cContactPerson">Contact person</label>
                              <p class="help-block"> max: 100 letters</p>
                            </div>
                          </div>
                        <div class="col-lg-6">
                          <div class="form-group">
                            <input type="text" class="form-control"  name="cContactPersonCellNo" value="<?php echo e(old('cContactPersonCellNo')); ?>" maxlength="11">
                            <label for="cContactPersonCellNo">Contact Person Mobile No</label>
                            <p class="help-block">max: 11 letters</p>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-4">
                          <div class="form-group">
                            <input type="text" class="form-control" value="<?php echo e(old('cCellNo')); ?>"  name="cCellNo" maxlength="11">
                            <label for="cCellNo">Mobile No</label>
                            <p class="help-block">max: 11 letters</p>
                          </div>
                        </div>
                        <div class="col-lg-4">
                          <div class="form-group">
                            <input type="text" class="form-control"  name="cPhoneNo" value="<?php echo e(old('cPhoneNo')); ?>"  maxlength="15">
                            <label for="cPhoneNo">Phone No</label>
                            <p class="help-block">max: 15 letters</p>
                          </div>
                        </div>
                        <div class="col-lg-4">
                          <div class="form-group">
                            <input type="text" class="form-control"  name="cFaxNo" value="<?php echo e(old('cFaxNo')); ?>" maxlength="15">
                            <label for="cFaxNo">Fax No</label>
                            <p class="help-block">max: 15 letters</p>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-4">
                          <div class="form-group">
                            <input type="email" class="form-control"  name="cEmail" value="<?php echo e(old('cEmail')); ?>" maxlength="100">
                            <label for="cEmail">Email</label>
                            <p class="help-block">max: 100 letters</p>
                          </div>
                        </div>
                        <div class="col-lg-4">
                          <div class="form-group">
                            <textarea class="form-control"  name="cAddress" maxlength="500"><?php echo e(old('cAddress')); ?></textarea>
                            <label for="cAddress">Address</label>
                            <p class="help-block">max: 500 letters</p>
                          </div>
                        </div>
                        <div class="col-lg-4">
                          <div class="form-group">
                            <textarea class="form-control"  name="cNote" maxlength="1000"><?php echo e(old('cNote')); ?></textarea>
                            <label for="cNote">Note</label>
                            <p class="help-block">max: 1000 letters</p>
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
                    <div class="card-actionbar">
                      <div class="card-actionbar-row">
                        <button type="submit" class="btn btn-primary ink-reaction"><i class="md md-add-circle-outline"></i> Create</button>
                      </div>
                    </div>
                  </div>

                </div>

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
  <script src="<?php echo e(url('/')); ?>/assets/js/libs/bootstrap-datepicker/bootstrap-datepicker.js"></script>

  <script type="text/javascript">
      $( document ).ready(function() {
          $('select').select2();
          $('.pick-date').datepicker({autoclose: true, todayHighlight: true, format: "dd/mm/yyyy"});
      });
  </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>