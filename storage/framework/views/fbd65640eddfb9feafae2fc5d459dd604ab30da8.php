<?php $__env->startSection('title', 'Rent List'); ?>
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
        <li class="active">Rent</li>
        <li><a href="<?php echo e(URL::Route('rent.create')); ?>">New rent</a></li>
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
                        <th width="5%" class="text-center">SL</th>
                        <th width="15%" class="text-center">Project</th>
                        <th width="15%" class="text-center">Flat</th>
                        <th width="15%" class="text-center">Customer</th>
                        <th width="8%" class="text-center">Rent</th>
                        <th width="5%" class="text-center">Utility</th>
                        <th width="5%" class="text-center">Service</th>
                        <th width="5%" class="text-center">Status</th>
                        <th width="8%" class="text-center">Entry Date</th>
                        <th width="5%" class="text-center">By</th>
                        <th width="15%" class="text-center">Action</th>
                      </tr>
                      </thead>
                      <tbody>
                      <?php $__currentLoopData = $rents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rent): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                        <tr>
                          <td><?php echo e($rent->rentNo); ?></td>
                          <td><?php echo e($rent->project->name); ?></td>
                          <td><?php echo e($rent->flat->description); ?></td>
                          <td><?php echo e($rent->customer->name); ?> [<?php echo e($rent->customer->cellNo); ?>]</td>
                          <td><?php echo e($rent->rent); ?></td>
                          <td><?php echo e($rent->utilityCharge); ?></td>
                          <td><?php echo e($rent->serviceCharge); ?></td>
                          <td>
                            <?php if($rent->status == 1): ?>
                              <span class="text-success text-bold">Active</span>
                            <?php else: ?>
                              <span class="text-warning text-bold">Inactive</span>

                            <?php endif; ?>
                          </td>
                          <td><?php echo e($rent->entryDate->format('F j,y')); ?></td>
                          <td><?php echo e($rent->entry->name); ?></td>

                          <td>
                            <div class="btn-group pull-right">
                              <form class="myAction" method="POST" action="<?php echo e(URL::route('rent.destroy',$rent->id)); ?>">
                                <input name="_method" type="hidden" value="DELETE">
                                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                <button type="submit" class="btn ink-reaction btn-floating-action btn-danger btn-sm" title="Delete">
                                  <i class="fa fa-fw fa-trash"></i>
                                </button>
                              </form>
                              <a title="Edit" href="<?php echo e(URL::route('rent.edit',$rent->id)); ?>" class="btn ink-reaction btn-floating-action btn-info btn-sm myAction"><i class="fa fa-edit"></i></a>
                              <a title="Details" data-url="<?php echo e(URL::route('rent.show',$rent->id)); ?>" href="#" class="btn ink-reaction btn-floating-action btn-primary btn-sm myAction detailsBtn"><i class="fa fa-list"></i></a>


                            </div>
                            <!--end .btn-group -->
                          </td>
                        </tr>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                      </tbody>
                    </table>
                  </div><!--end .table-responsive -->
                  <?php echo e($rents->links()); ?>

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
          <li><strong>Per Sft. Rent</strong><br/><span class="opacity-90" id="perSftRent"></span></li>
          <li><strong>Security Money</strong><br/><span class="opacity-90" id="securityMoney"></span></li>
          <li><strong>Advance Money</strong><br/><span class="opacity-90" id="advanceMoney"></span></li>
          <li><strong>Delay Charge</strong><br/><span class="opacity-90" id="delayCharge"></span></li>
          <li><strong>Note</strong><br/><span class="opacity-90" id="note"></span></li>
          <li><strong>Deed Paper</strong><br/><a target="_blank" href="#" class="text-link" id="deedpaper">Click To View</a></li>
          <li><strong>Others Paper</strong><br/><a target="_blank" href="#" class="text-link" id="othersPaper">Click to View</a></li>
        </ul>
      </div>

    </div>
    <!-- END OFFCANVAS DEMO RIGHT -->
  </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('extraScript'); ?>
  <script>
      $( document ).ready(function() {
          $('#menubarToggler').trigger('click');

          window.mystorageURL = "<?php echo e(URL::asset('storage')); ?>";
          $('.detailsBtn').click(function (e) {
              e.preventDefault();
              var infoUrl = $(this).attr('data-url');
              $.getJSON(infoUrl,function(response){
                  if(response){
                      $('#perSftRent').text(response.perSftRent);
                      $('#securityMoney').text(response.securityMoney);
                      $('#advanceMoney').text(response.advanceMoney);
                      $('#delayCharge').text(response.delayCharge);
                      $('#note').text(response.note ? response.note : '');
                      $('#deedpaper').attr('href',window.mystorageURL+"/"+response.deepPaper);
                      $('#othersPaper').attr('href',window.mystorageURL+"/"+response.othersPaper);
                  }
              });
              $('#base').append('<div class="backdrop"></div>');
              $('#offcanvas-demo-size2').addClass('active');
              $('#offcanvas-demo-size2').attr('style','transform: translate(-280px, 0px);');
              $('body').addClass(' offcanvas-expanded');
              $('body').attr('style','padding-right:15px;');
          });

      });
  </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>