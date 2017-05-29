<?php $__env->startSection('title', 'Project List'); ?>
<?php $__env->startSection('extraStyle'); ?>
    <link type="text/css" rel="stylesheet" href="<?php echo e(url('/')); ?>/assets/css/libs/select2/select2.css" />
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
                    <div class="row">
                        <div class="col-md-12">
                            <form class="filters" action="" method="GET" enctype="text/plain">
                                <fieldset>
                                    <legend>Filters</legend>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="project name" name="name" value="<?php echo e($name); ?>">
                                            <input type="hidden" id="pageHidden" name="page" value="1">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <?php echo Form::select('projectType', ['All' => 'All', 'Commerical' => 'Commerical','Residential' =>'Residential', 'Residential & Commerical' => 'Residential & Commerical'], $projectType, ['id' => 'projectType' ,'class' => 'form-control select2-list', 'required' => 'required']); ?>

                                        </div>
                                    </div>

                                      <div class="col-md-3">
                                        <div class="form-group">
                                            <?php echo Form::select('areas_id', $areas, $area, ['class' => 'form-control select2-list', 'required' => 'required']); ?>

                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <button class="btn btn-primary ink-reaction"><i class="md md-search"></i>Refresh</button>
                                        </div>
                                    </div>
                                </fieldset>
                            </form>

                        </div>

                    </div>
                  <div class="table-responsive no-margin">
                    <table class="table table-striped no-margin">
                      <thead>
                      <tr>
                        <th width="10%" >ID</th>
                        <th width="10%" >Type</th>
                        <th width="15%" >Name</th>
                        <th width="10%" >Entry Date</th>
                        <th width="10%" >Area</th>
                        <th width="15%" >Address</th>
                        <th width="15%" >Storied</th>
                        <th width="15%" >Action</th>
                      </tr>
                      </thead>
                      <tbody>
                      <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                        <tr>
                          <td class="text-center"><?php echo e($project->projectId); ?></td>
                          <td class="text-center"><?php echo e($project->projectType); ?></td>
                          <td class="text-center"><?php echo e($project->name); ?></td>
                          <td class="text-center"><?php echo e($project->entryDate->format('F j,Y')); ?></td>
                          <td class="text-center"><?php echo e($project->area->name); ?></td>
                          <td class="text-center"><?php echo e($project->address); ?></td>
                          <td class="text-center"><?php echo e($project->storied); ?></td>
                          <td class="text-center">
                            <div class="btn-group pull-right">
                              <?php if (app('Illuminate\Contracts\Auth\Access\Gate')->check('project.destroy')): ?>
                              <form class="myAction" method="POST" action="<?php echo e(URL::route('project.destroy',$project->id)); ?>">
                                <input name="_method" type="hidden" value="DELETE">
                                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                <button type="submit" class="btn ink-reaction btn-floating-action btn-danger btn-sm" title="Delete">
                                  <i class="fa fa-fw fa-trash"></i>
                                </button>
                              </form>
                              <?php endif; ?>
                                <?php if (app('Illuminate\Contracts\Auth\Access\Gate')->check('project.edit')): ?>
                              <a title="Edit" href="<?php echo e(URL::route('project.edit',$project->id)); ?>" class="btn ink-reaction btn-floating-action btn-info btn-sm myAction"><i class="fa fa-edit"></i></a>
                             <?php endif; ?>
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
    <script src="<?php echo e(url('/')); ?>/assets/js/libs/select2/select2.min.js"></script>

    <script>
        $('select').select2();

        $( document ).ready(function() {
          $('#menubarToggler').trigger('click');
          $('.pagination li>a').click(function (e) {
              e.preventDefault();
              $('#pageHidden').val($(this).text());
              $('form.filters').submit();

          });
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