<?php $__env->startSection('title', 'New Collection'); ?>
<?php $__env->startSection('extraStyle'); ?>
    <link type="text/css" rel="stylesheet" href="<?php echo e(url('/')); ?>/assets/css/libs/select2/select2.css" />
    <link type="text/css" rel="stylesheet" href="<?php echo e(url('/')); ?>/assets/css/libs/bootstrap-datepicker/datepicker3.css" />

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <section>
        <div class="section-header">
            <ol class="breadcrumb">
                <li><a href="<?php echo e(URL::Route('collection.index')); ?>">Collections</a></li>
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
                                  action="<?php echo e(URL::route('collection.store')); ?>"
                                  method="POST"
                                  enctype="multipart/form-data">

                                <div class="card">
                                    <div class="card-head style-primary">
                                        <header>Add New Collection</header>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <?php echo e(csrf_field()); ?>

                                        </div>
                                        <div class="row">
                                            <div class="col-lg-8">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <?php echo Form::select('projectType', ['' => '', 'Commerical' => 'Commerical','Residential' =>'Residential', 'Residential & Commerical' => 'Residential & Commerical'], null, ['id' => 'projectType' ,'class' => 'form-control select2-list', 'required' => 'required']); ?>

                                                            <label for="projectType">Project Type</label>
                                                            <p class="help-block">select project type</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <select id="projects_id" class="form-control select2-list" name="projects_id" required>
                                                                <option value=""></option>
                                                            </select>
                                                            <label for="projects_id">Project</label>
                                                            <p  id="projects_id-error" class="help-block">select a project</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">

                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <input type="text" readonly class="form-control" id="collectionNo" value="<?php echo e($collectionNo); ?>" name="collectionNo" required>
                                                            <label for="collectionNo">Collection No</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control datepicker" value="<?php echo e($today->format('d/m/Y')); ?>" name="collectionDate" required>
                                                            <label for="collectionDate">Collection date</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <select id="customers_id" class="form-control select2-list" name="customers_id" required>
                                                                <option value=""></option>
                                                            </select>
                                                            <label for="customers_id">Customer</label>
                                                            <p  id="customers_id-error" class="help-block">select a customer</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <select id="flats_id" class="form-control select2-list" name="rents_id" required>
                                                                <option value=""></option>
                                                            </select>
                                                            <label for="flats_id">Flat</label>
                                                            <p  id="flats_id-error" class="help-block">select a flat</p>
                                                        </div>
                                                    </div>
                                                    </div>

                                                    <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <input type="number" id="collectionAmount" class="form-control" min="0" name="amount" data-rule-number="true" required>
                                                            <label for="amount">Collection amount</label>
                                                            <p class="help-block">Numbers only</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <?php echo Form::select('collectionType', ['' => '', 'Cash' => 'Cash','Cheque' =>'Cheque', 'P.O' => 'P.O'], null, ['id' => 'collectionType' ,'class' => 'form-control select2-list', 'required' => 'required']); ?>

                                                            <label for="collectionType">Collection Type</label>
                                                            <p class="help-block">select a type</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row" id="chequeInfo">
                                                    <div class="col-lg-4">
                                                        <div class="form-group">
                                                            <input type="text" id="chequeNo" class="form-control"  name="chequeNo" maxlength="255" required>
                                                            <label for="chequeNo">Check No</label>
                                                            <p class="help-block">Max:255 letters</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="form-group">
                                                            <input type="text" id="bankName" class="form-control"  name="bankName" maxlength="255" required>
                                                            <label for="bankName">Bank Name</label>
                                                            <p class="help-block">Max:255 letters</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="form-group">
                                                            <input type="text" id="branchName" class="form-control"  name="branchName" maxlength="255" required>
                                                            <label for="branchName">Branch Name</label>
                                                            <p class="help-block">Max:255 letters</p>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="row" id="postOrderInfo">
                                                    <div class="col-lg-4">
                                                        <div class="form-group">
                                                            <input type="text" id="poNo" class="form-control"  name="poNo" maxlength="255" required>
                                                            <label for="poNo">Post order No</label>
                                                            <p class="help-block">Max:255 letters</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="form-group">
                                                            <input type="text" id="poName" class="form-control"  name="poName" maxlength="255" required>
                                                            <label for="poName">Post office name Name</label>
                                                            <p class="help-block">Max:255 letters</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="form-group">
                                                            <input type="text" id="poCode" class="form-control"  name="poCode" maxlength="255" required>
                                                            <label for="poCode">Post Code</label>
                                                            <p class="help-block">Max:255 letters</p>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="form-group">
                                                            <p style="padding-top: 30px;">
                                                                <label class="checkbox-styled checkbox-primary">
                                                                    <input type="checkbox" name="isDeduction" class="name" >
                                                                    <span class="text-bold text-black"> Is Deduction</span>
                                                                </label>
                                                            </p>

                                                        </div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="form-group">
                                                            <textarea name="note" id="" class="form-control" rows="2"></textarea>
                                                            <label for="note">Remarks</label>
                                                            <p class="help-block">Max:1000 letters</p>
                                                        </div>
                                                    </div>


                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="card" id="flatInfo">
                                                    <div class="card-head style-info">
                                                        <header>Rent Information</header>
                                                    </div>
                                                    <div class="card-body">
                                                        <ul class="list-divided">
                                                            <li>Rent : <strong><span class="opacity-90" id="rentAmount"></span></strong></li>
                                                            <li>Service Charge : <strong><span class="opacity-90" id="serviceCharge"></span></strong></li>
                                                            <li>Security Money : <strong><span class="opacity-90" id="securityMoney"></span></strong></li>
                                                            <li>Advance Money : <strong><span class="opacity-90" id="advanceMoney"></span></strong></li>
                                                            <li>Deduction Advance TK: <strong><span class="opacity-90" id="monthlyDeduction"></span></strong></li>
                                                            <li>Deduction Tax TK : <strong><span class="opacity-90" id="monthlyDeductionTax"></span></strong></li>
                                                            <li>Utility Charge : <strong><span class="opacity-90" id="utilityCharge"></span></strong></li>
                                                            <li>Delay Charge : <strong><span class="opacity-90" id="delayCharge"></span></strong></li>
                                                            <li>Remarks :<br/><span class="opacity-90" id="note"></span></li>
                                                      </ul>
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
                                    </div><!--end .card-body -->
                                    <div class="card-actionbar">
                                        <div class="card-actionbar-row">
                                            <button type="submit" class="btn btn-primary ink-reaction"><i class="md md-add-circle-outline"></i> Save</button>
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
        var ValidateCollectionForm = function () {
            var isValid = true;
            //validation
            if(!$('#projectType').val()){
                isValid = false;
                $('#projectType').parent().addClass('has-error');
                $('#projectType').focus;
            }
            else{
                isValid=true;
                $('#projectType').parent().removeClass('has-error');
            }
            if(!$('#projects_id').val()){
                isValid = false;
                $('#projects_id').parent().addClass('has-error');
                $('#projects_id').focus;
            }
            else{
                isValid=true;
                $('#projects_id').parent().removeClass('has-error');
            }
            if(!$('#customers_id').val()){
                isValid = false;
                $('#customers_id').parent().addClass('has-error');
                $('#customers_id').focus;
            }
            else{
                isValid=true;
                $('#customers_id').parent().removeClass('has-error');
            }
            if(!$('#flats_id').val()){
                isValid = false;
                $('#flats_id').parent().addClass('has-error');
                $('#flats_id').focus;
            }
            else{
                isValid=true;
                $('#flats_id').parent().removeClass('has-error');
            }
            if(!$('#collectionAmount').val()){
                isValid = false;
                $('#collectionAmount').parent().addClass('has-error');
                $('#collectionAmount').focus;
            }
            else{
                isValid=true;
                $('#collectionAmount').parent().removeClass('has-error');
            }
            if(!$('#collectionType').val()){
                isValid = false;
                $('#collectionType').parent().addClass('has-error');
                $('#collectionType').focus;
            }
            else{
                if($('#collectionType').val() == "Cheque"){
                    if(!$('#chequeNo').val()){
                        isValid = false;
                        $('#chequeNo').parent().addClass('has-error');
                        $('#chequeNo').focus;
                    }
                    else{
                        isValid=true;
                        $('#chequeNo').parent().removeClass('has-error');
                    }
                    if(!$('#bankName').val()){
                        isValid = false;
                        $('#bankName').parent().addClass('has-error');
                        $('#bankName').focus;
                    }
                    else{
                        isValid=true;
                        $('#bankName').parent().removeClass('has-error');
                    }
                    if(!$('#branchName').val()){
                        isValid = false;
                        $('#branchName').parent().addClass('has-error');
                        $('#branchName').focus;
                    }
                    else{
                        isValid=true;
                        $('#branchName').parent().removeClass('has-error');
                    }
                }
                else if($('#collectionType').val() == "P.O"){
                    if(!$('#poNo').val()){
                        isValid = false;
                        $('#poNo').parent().addClass('has-error');
                        $('#poNo').focus;
                    }
                    else{
                        isValid=true;
                        $('#poNo').parent().removeClass('has-error');
                    }
                    if(!$('#poName').val()){
                        isValid = false;
                        $('#poName').parent().addClass('has-error');
                        $('#poName').focus;
                    }
                    else{
                        isValid=true;
                        $('#poName').parent().removeClass('has-error');
                    }
                    if(!$('#poCode').val()){
                        isValid = false;
                        $('#poCode').parent().addClass('has-error');
                        $('#poCode').focus;
                    }
                    else{
                        isValid=true;
                        $('#poCode').parent().removeClass('has-error');
                    }
                }
                else{
                    isValid=true;
                    $('#collectionType').parent().removeClass('has-error');
                }
            }
            return isValid;
        };
        $( document ).ready(function() {
            $('#menubarToggler').trigger('click');
            $('select').select2();
            $('#chequeInfo').hide();
            $('#postOrderInfo').hide();
            $('#projectType').change(function () {
                $("#flats_id").empty();
                $('#flats_id').select2();
                $("#customers_id").empty();
                $('#customers_id').select2();
                $.getJSON("/project-by-type/"+$(this).val(),function (response) {
                    if(response.length){
                        $("#projects_id").empty();
                        var option = '<option value=""></option>';
                        $("#projects_id").append(option);
                        $.each(response,function (index,project) {
                            var option = '<option value="'+project.id+'">'+project.value+'</option>';
                            $("#projects_id").append(option);
                        });

                    }
                    else {
                        $("#projects_id").empty();
                        var option = '<option value=""></option>';
                        $("#projects_id").append(option);
                    }
                    $('#projects_id').select2();
                });
            });
            $('.datepicker').datepicker({
                format: 'dd/mm/yyyy',
                autoclose: true,
                todayHighlight : true

            });

            $('#projects_id').change(function () {
                $("#flats_id").empty();
                $('#flats_id').select2();
                $.getJSON("/rent/customers/"+$(this).val(),function (response) {

                    if(response.length){
                        $("#customers_id").empty();
                        var option = '<option value=""></option>';
                        $("#customers_id").append(option);
                        $.each(response,function (index,customer) {
                            var option = '<option value="'+customer.value+'">'+customer.text+'</option>';
                            $("#customers_id").append(option);
                        });
                    }
                    else {
                        $("#customers_id").empty();
                        var option = '<option value=""></option>';
                        $("#customers_id").append(option);
                    }
                    $('#customers_id').select2();
                });
            });

            $('#customers_id').change(function () {
                $.getJSON("/rent/flats/"+$(this).val()+'/'+$('#projects_id').val(),function (response) {
                    if(response.length){
                        $("#flats_id").empty();
                        var option = '<option value=""></option>';
                        $("#flats_id").append(option);
                        $.each(response,function (index,flat) {
                            var option = '<option value="'+flat.value+'">'+flat.text+'</option>';
                            $("#flats_id").append(option);
                        });
                    }
                    else {
                        $("#flats_id").empty();
                        var option = '<option value=""></option>';
                        $("#flats_id").append(option);
                    }
                    $('#flats_id').select2();
                });
            });
            $('#flats_id').change(function () {
                $.getJSON("/rent/"+$(this).val(),function (response) {
                    if(response){
                        $('#rentAmount').text(response.rent);
                        $('#securityMoney').text(response.securityMoney);
                        $('#advanceMoney').text(response.advanceMoney);
                        $('#utilityCharge').text(response.utilityCharge);
                        $('#serviceCharge').text(response.serviceCharge);
                        $('#delayCharge').text(response.delayCharge);
                        $('#monthlyDeduction').text(response.monthlyDeduction);
                        $('#monthlyDeductionTax').text(response.monthlyDeductionTax);
                        $('#note').text(response.note ? response.note : '');

                    }
                });
            });
            $('#collectionType').change(function () {
                if($(this).val()=="Cheque"){
                    $('#chequeInfo').show();
                    $('#postOrderInfo').hide();
                }
                else if($(this).val()=="P.O"){
                    $('#chequeInfo').hide();
                    $('#postOrderInfo').show();
                }
                else{
                    $('#chequeInfo').hide();
                    $('#postOrderInfo').hide();
                }
            });


            $('form').submit(function (e) {
                e.preventDefault();
                //validation form
                var isValid = ValidateCollectionForm();
                if(isValid){
                    this.submit();
                }

            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>