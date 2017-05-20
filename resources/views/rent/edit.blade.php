@extends('layouts.master')

@section('title', 'Rent Update')
@section('extraStyle')
    <link type="text/css" rel="stylesheet" href="{{url('/')}}/assets/css/libs/select2/select2.css" />
    <link type="text/css" rel="stylesheet" href="{{url('/')}}/assets/css/libs/bootstrap-datepicker/datepicker3.css" />


@endsection
@section('content')
    <section>
        <div class="section-header">
            <ol class="breadcrumb">
                <li><a href="{{URL::Route('rent.index')}}">Rented List</a></li>
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
                                  action="{{URL::route('rent.update',$rent->id)}}"
                                  method="POST"
                                  enctype="multipart/form-data">

                                <div class="card">
                                    <div class="card-head style-primary">
                                        <header>Update rent</header>
                                    </div>
                                    <div class="card-body">


                                        <div class="row">

                                            {{ csrf_field() }}
                                            {{ method_field('PATCH') }}
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <input type="text" class="form-control datepicker" name="deedEnd" value="{{$rent->deedEnd->format('d/m/Y')}}" required>
                                                    <label for="deedEnd">Period end date</label>
                                                </div>
                                            </div>

                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <input type="number" id="rentAmount" value="{{$rent->rent}}" class="form-control" min="0" name="rent" data-rule-number="true" required>
                                                    <label for="rentAmount">Rent amount</label>
                                                    <p class="help-block">Numbers only</p>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <input type="number" id="rentAmountPerSft" value="{{$rent->perSftRent}}" class="form-control" min="0" name="perSftRent" data-rule-number="true" required>
                                                    <p class="help-block">Rent per Sft.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <input type="number" id="securityMoney" value="{{$rent->securityMoney}}" class="form-control" min="0" name="securityMoney" data-rule-number="true" required>
                                                    <label for="securityMoney">Security money</label>
                                                    <p class="help-block">Numbers only</p>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <input type="number" id="serviceCharge" value="{{$rent->serviceCharge}}" class="form-control" min="0" name="serviceCharge" data-rule-number="true" required>
                                                    <label for="serviceCharge">Service Charge</label>
                                                    <p class="help-block">Numbers only</p>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <input type="number" id="advanceMoney" value="{{$rent->advanceMoney}}" class="form-control" min="0" name="advanceMoney" data-rule-number="true" required>
                                                    <label for="advanceMoney">Advance money</label>
                                                    <p class="help-block">Numbers only</p>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <input type="number" id="monthlyDeduction" class="form-control" min="0" value="{{$rent->monthlyDeduction}}" name="monthlyDeduction" data-rule-number="true" required>
                                                    <label for="monthlyDeduction">Deduction Advance TK</label>
                                                    <p class="help-block">Numbers only</p>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <input type="number" id="monthlyDeductionTax" class="form-control" value="{{$rent->monthlyDeductionTax}}" min="0" name="monthlyDeductionTax" data-rule-number="true" required>
                                                    <label for="monthlyDeductionTax">Deduction Tax TK</label>
                                                    <p class="help-block">Numbers only</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <input type="number" id="utilityCharge" value="{{$rent->utilityCharge}}" class="form-control" min="0" name="utilityCharge" data-rule-number="true" required>
                                                    <label for="utilityCharge">Utility Charge</label>
                                                    <p class="help-block">Numbers only</p>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <input type="number" id="delayCharge" value="{{$rent->delayCharge}}" class="form-control" min="0" name="delayCharge" data-rule-number="true" required>
                                                    <label for="delayCharge">Delay Charge</label>
                                                    <p class="help-block">Numbers only</p>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <div class="input-group-content">
                                                            <input type="file" class="form-control" name="deedPaper">
                                                        </div>
                                                        <span class="input-group-addon"><i class="fa fa-2x fa-file-image-o info"></i></span>
                                                    </div>
                                                    <label>Deed paper(pdf,image)</label>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <div class="input-group-content">
                                                            <input type="file" class="form-control" name="othersPaper">
                                                        </div>
                                                        <span class="input-group-addon"><i class="fa fa-2x fa-file info"></i></span>
                                                    </div>
                                                    <label>Others paper(pdf,image)</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <select name="status" id="" class="form-control select2-list" required>
                                                        @if($rent->status==0)
                                                            <option value="0" selected>Inactive</option>
                                                            <option value="1">Active</option>
                                                        @else
                                                            <option value="0" >Inactive</option>
                                                            <option value="1" selected>Active</option>
                                                        @endif
                                                    </select>
                                                    <label for="status">Status</label>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <textarea class="form-control" id="description" name="note" rows="1"  maxlength="1000">{{$rent->note}}</textarea>
                                                    <p class="help-block">Description</p>
                                                    <label for="note">Remarks</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            @if (count($errors) > 0)
                                                <div class="alert alert-danger">
                                                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                                    <ul>
                                                        @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
                                        </div>
                                    </div><!--end .card-body -->
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

@endsection

@section('extraScript')
    <script src="{{url('/')}}/assets/js/libs/bootstrap-datepicker/bootstrap-datepicker.js"></script>

    <script src="{{url('/')}}/assets/js/libs/select2/select2.min.js"></script>
    <script src="{{url('/')}}/assets/js/libs/jquery-validation/jquery.validate.min.js"></script>
    <script src="{{url('/')}}/assets/js/libs/jquery-validation/additional-methods.min.js"></script>

    <script type="text/javascript">

        $( document ).ready(function() {
            $('.datepicker').datepicker({
                format: 'dd/mm/yyyy',
                autoclose: true,
                todayHighlight : true

            });
            $('select').select2();
            window.flatSize = "{{$rent->flat->size}}";
            $('#rentAmount').on('input propertyChange paste focus blur',function(){
                var amount = parseFloat($(this).val());
                $('#rentAmountPerSft').val((amount/window.flatSize).toFixed(2));
            });
            $('form').submit(function (e) {
                e.preventDefault();
                var isValid = true;
                if(!$('#rentAmountPerSft').val()){
                    isValid = false;
                    $('#rentAmountPerSft').parent().addClass('has-error');
                    $('#rentAmountPerSft').focus;
                }
                else{
                    $('#rentAmountPerSft').parent().removeClass('has-error');
                }
                //validation end
                if(isValid){
                    this.submit();
                }

            });
        });
    </script>
@endsection
