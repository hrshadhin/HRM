<?php $__env->startSection('title', 'Project List'); ?>
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
        <li class="active">Projects</li>
        <li><a href="<?php echo e(URL::Route('project.create')); ?>">Create</a></li>
      </ol>
    </div><!--end .section-header -->
    <div class="section-body">
      <section>
        <div class="section-body">
          <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-head style-primary">
                  <header>Projects List</header>
                </div>
                <div class="card-body no-padding">
                  <div class="table-responsive no-margin">
                    <table class="table table-striped no-margin">
                      <thead>
                      <tr>
                        <th width="10%" class="text-center">ID</th>
                        <th width="10%" class="text-center">Type</th>
                        <th width="15%" class="text-center">Name</th>
                        <th width="10%" class="text-center">Entry Date</th>
                        <th width="10%" class="text-center">Area</th>
                        <th width="15%" class="text-center">Address</th>
                        <th width="15%" class="text-center">Storied</th>
                        <th width="15%" class="text-center">Action</th>
                      </tr>
                      </thead>
                      <tbody>
                      <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                        <tr>
                          <td><?php echo e($project->projectId); ?></td>
                          <td><?php echo e($project->projectType); ?></td>
                          <td><?php echo e($project->name); ?></td>
                          <td><?php echo e($project->entryDate->format('F j,Y')); ?></td>
                          <td><?php echo e($project->area->name); ?></td>
                          <td><?php echo e($project->address); ?></td>
                          <td><?php echo e($project->storied); ?></td>
                          <td>
                            <div class="btn-group pull-right">
                              <form class="myAction" method="POST" action="<?php echo e(URL::route('project.destroy',$project->id)); ?>">
                                <input name="_method" type="hidden" value="DELETE">
                                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                <button type="submit" class="btn ink-reaction btn-floating-action btn-danger btn-sm" title="Delete">
                                  <i class="fa fa-fw fa-trash"></i>
                                </button>
                              </form>
                              <a title="Edit" href="<?php echo e(URL::route('project.edit',$project->id)); ?>" class="btn ink-reaction btn-floating-action btn-info btn-sm myAction"><i class="fa fa-edit"></i></a>
                              <a title="Details" data-url="<?php echo e(URL::route('project.show',$project->id)); ?>" href="#" class="btn ink-reaction btn-floating-action btn-primary btn-sm myAction detailsBtn"><i class="fa fa-list"></i>

                              </a>

                            </div>
                            <!--end .btn-group -->
                          </td>
                        </tr>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                      </tbody>
                    </table>
                  </div><!--end .table-responsive -->
                  <?php echo e($projects->links()); ?>

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
          <li><strong>Entry By</strong><br/><span class="opacity-90" id="entryBy"></span></li>
          <li><strong>Description</strong><br/><span class="opacity-90" id="description"></span></li>
          <li><strong>No of units</strong><br/><span class="opacity-90" id="noOfUnits"></span></li>
          <li><strong>No of floor</strong><br/><span class="opacity-90" id="noOfFloor"></span></li>
          <li><strong>No of car parking</strong><br/><span class="opacity-90" id="noOfCarParking"></span></li>
          <li><strong>Unit size</strong><br/><span class="opacity-90" id="unitSize"></span></li>
          <li><strong>Lift</strong><br/><span class="opacity-90" id="lift"></span></li>
          <li><strong>Generator</strong><br/><span class="opacity-90" id="generator"></span></li>
        </ul>
      </div>

    </div>
    <!-- END OFFCANVAS DEMO RIGHT -->
  </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('extraScript'); ?>
  <script>
      $( document ).ready(function() {
          $('.detailsBtn').click(function (e) {
              e.preventDefault();
              var infoUrl = $(this).attr('data-url');
              $.getJSON(infoUrl,function(response){
                  if(response){
                      $('#entryBy').text(response.entry.name);
                      $('#description').text(response.description);
                      $('#noOfUnits').text(response.noOfUnits);
                      $('#noOfFloor').text(response.noOfFloor);
                      $('#noOfCarParking').text(response.noOfCarParking);
                      $('#unitSize').text(response.unitSize+" Sft.");
                      $('#lift').text(response.lift);
                      $('#generator').text(response.generator);
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