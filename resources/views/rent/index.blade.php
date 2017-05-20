@extends('layouts.master')

@section('title', 'Rent List')
@section('extraStyle')
    <style>
        th{
            font-weight: blod !important;
            color:#000 !important;
        }
    </style>
@endsection
@section('content')
    <section>
        <div class="section-header">
            <ol class="breadcrumb">
                <li class="active">Rent</li>
                <li><a href="{{URL::Route('rent.create')}}">New rent</a></li>
            </ol>
        </div><!--end .section-header -->
        <div class="section-body">
            <section>
                <div class="section-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-head style-primary">
                                    <header>Rent List</header>
                                </div>
                                <div class="card-body no-padding">
                                    <div class="table-responsive no-margin">
                                        <table class="table table-striped no-margin">
                                            <thead>
                                            <tr>
                                                <th class="text-center">SL</th>
                                                <th  class="text-center">Project</th>
                                                <th  class="text-center">Flat</th>
                                                <th  class="text-center">Customer</th>
                                                <th class="text-center">Rent</th>
                                                <th class="text-center">Service</th>
                                                <th  class="text-center">Rend Date</th>
                                                <th  class="text-center">Period</th>
                                                {{--<th class="text-center">Entry By</th>--}}
                                                <th class="text-center">Status</th>
                                                <th  class="text-center">Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($rents as $rent)
                                                <tr>
                                                    <td>{{$rent->rentNo}}</td>
                                                    <td>{{$rent->project->name}}</td>
                                                    <td>{{$rent->flat->description}}</td>
                                                    <td>{{$rent->customer->name}} [{{$rent->customer->cellNo}}]</td>
                                                    <td>{{$rent->rent}}</td>
                                                    <td>{{$rent->serviceCharge}}</td>
                                                    <td>{{$rent->entryDate->format('d/m/Y')}}</td>
                                                    <td>
                                                        {{$rent->deedStart->format('d/m/Y')}} to {{$rent->deedEnd->format('d/m/Y')}}
                                                    </td>
                                                    {{--<td>{{$rent->entry->name}}</td>--}}
                                                    <td>
                                                        @if($rent->status == 1)
                                                            <span class="text-success text-bold">Active</span>
                                                        @else
                                                            <span class="text-warning text-bold">Inactive</span>

                                                        @endif
                                                    </td>
                                                    <td>
                                                        <div class="btn-group pull-right">
                                                            @can('rent.destroy')
                                                                <form class="myAction" method="POST" action="{{URL::route('rent.destroy',$rent->id)}}">
                                                                    <input name="_method" type="hidden" value="DELETE">
                                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                                    <button type="submit" class="btn ink-reaction btn-floating-action btn-danger btn-sm" title="Delete">
                                                                        <i class="fa fa-fw fa-trash"></i>
                                                                    </button>
                                                                </form>
                                                            @endcan
                                                            @can('rent.edit')
                                                                <a title="Edit" href="{{URL::route('rent.edit',$rent->id)}}" class="btn ink-reaction btn-floating-action btn-info btn-sm myAction"><i class="fa fa-edit"></i></a>
                                                            @endcan
                                                            <a title="Details" data-url="{{URL::route('rent.show',$rent->id)}}" href="#" class="btn ink-reaction btn-floating-action btn-primary btn-sm myAction detailsBtn"><i class="fa fa-list"></i></a>


                                                        </div>
                                                        <!--end .btn-group -->
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div><!--end .table-responsive -->
                                    {{ $rents->links() }}
                                </div><!--end .card-body -->
                            </div><!--end .card -->
                        </div><!--end .col -->
                    </div><!--end row -->

                </div>
            </section>
        </div>

    </section>
    <div class="offcanvas">
        <!-- BEGIN OFFCANVAS DEMO RIGHT -->
        <div id="offcanvas-demo-size2" class="offcanvas-pane width-7">
            <div class="offcanvas-head">
                <header>More Info</header>
                <div class="offcanvas-tools">
                    <a class="btn btn-icon-toggle btn-default-light pull-right" data-dismiss="offcanvas">
                        <i class="md md-close"></i>
                    </a>
                </div>
            </div>

            <div class="offcanvas-body">
                <ul class="list-divided">
                    <li><strong>Entry Date</strong><br/><span class="opacity-90" id="entryDate"></span></li>
                    <li><strong>Entry By</strong><br/><span class="opacity-90" id="entryBy"></span></li>
                    <li><strong>Per Sft. Rent</strong><br/><span class="opacity-90" id="perSftRent"></span></li>
                    <li><strong>Security Money</strong><br/><span class="opacity-90" id="securityMoney"></span></li>
                    <li><strong>Advance TK</strong><br/><span class="opacity-90" id="advanceMoney"></span></li>
                    <li><strong>Deduction Advance TK</strong><br/><span class="opacity-90" id="monthlyDeduction"></span></li>
                    <li><strong>Deduction Tax TK</strong><br/><span class="opacity-90" id="monthlyDeductionTax"></span></li>
                    <li><strong>Utility Charge</strong><br/><span class="opacity-90" id="utilityCharge"></span></li>
                    <li><strong>Delay Charge</strong><br/><span class="opacity-90" id="delayCharge"></span></li>
                    <li><strong>Remarks</strong><br/><span class="opacity-90" id="note"></span></li>
                    <li><strong>Deed Paper</strong><br/><a target="_blank" href="#" class="text-link" id="deedpaper">Click To View</a></li>
                    <li><strong>Others Paper</strong><br/><a target="_blank" href="#" class="text-link" id="othersPaper">Click to View</a></li>
                </ul>
            </div>

        </div>
        <!-- END OFFCANVAS DEMO RIGHT -->
    </div>

@endsection

@section('extraScript')
    <script>
        $( document ).ready(function() {
            $('#menubarToggler').trigger('click');

            window.mystorageURL = "{{URL::asset('storage')}}";
            $('.detailsBtn').click(function (e) {
                e.preventDefault();
                var infoUrl = $(this).attr('data-url');
                $.getJSON(infoUrl,function(response){
                    if(response){
                        var dbDateTimeRaw = response.entryDate.split(' ');
                        var dbDateRaw = dbDateTimeRaw[0].split('-');
                        var entryDate = dbDateRaw[2]+'/'+dbDateRaw[1]+'/'+dbDateRaw[0];
                        $('#entryDate').text(entryDate);
                        $('#entryBy').text(response.entry.name);
                        $('#perSftRent').text(response.perSftRent);
                        $('#securityMoney').text(response.securityMoney);
                        $('#advanceMoney').text(response.advanceMoney);
                        $('#monthlyDeduction').text(response.monthlyDeduction);
                        $('#monthlyDeductionTax').text(response.monthlyDeductionTax);
                        $('#utilityCharge').text(response.utilityCharge);
                        $('#delayCharge').text(response.delayCharge);
                        $('#note').text(response.note ? response.note : '');
                        if(response.deepPaper) {
                            $('#deedpaper').attr('href', window.mystorageURL + "/" + response.deepPaper);
                        }
                        else{
                            $('#deedpaper').addClass('hide');

                        }
                        if(response.othersPaper) {
                            $('#othersPaper').attr('href', window.mystorageURL + "/" + response.othersPaper);
                        }
                        else{
                            $('#othersPaper').addClass('hide');

                        }
                    }
                });
                $('#base').append('<div class="backdrop"></div>');
                $('#offcanvas-demo-size2').addClass('active');
                $('#offcanvas-demo-size2').attr('style','transform: translate(-280px, 0px);');
                $('body').addClass(' offcanvas-expanded');
                $('body').attr('style','padding-right:15px;');
            });
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
@endsection