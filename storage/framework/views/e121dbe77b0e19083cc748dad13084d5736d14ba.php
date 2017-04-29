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
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table no-margin">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Area</th>
                        <th>Plot No</th>
                        <th>Road No</th>
                        <th>Block/ Sector No</th>
                        <th>Address</th>
                        <th>Serial No</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                      <tr>
                        <td><?php echo e($project->id); ?></td>
                        <td><?php echo e($project->area); ?></td>
                        <td><?php echo e($project->plotNo); ?></td>
                        <td><?php echo e($project->roadNo); ?></td>
                        <td><?php echo e($project->sectorNo); ?></td>
                        <td><?php echo e($project->address); ?></td>
                        <td><?php echo e($project->serialNo); ?></td>
                        <td><?php echo e($project->name); ?></td>
                        <td><?php echo e($project->description); ?></td>
                        <td>
                          <div class="btn-group">

                            <button type="button" class="btn ink-reaction btn-primary dropdown-toggle" data-toggle="dropdown">
                              Action <i class="fa fa-caret-down"></i>
                            </button>
                            <ul class="dropdown-menu animation-zoom" role="menu">
                              <li><a href="<?php echo e(URL::route('project.edit',$project->id)); ?>"><span class="btn btn-flat"><i class="fa fa-fw fa-edit text-info"></i> Edit</span></a></li>
                              <li class="divider"></li>
                              <li>
                                <form class="deleteForm" method="POST" action="<?php echo e(URL::route('project.destroy',$project->id)); ?>">
                                  <input name="_method" type="hidden" value="DELETE">
                                  <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                  <button type="submit" class="btn btn-flat">
                                    <i class="fa fa-fw fa-trash text-danger"></i>
                                     Delete
                                   </button>
                                  </form>

                                </li>
                              </ul>
                            </div><!--end .btn-group -->
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

  <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>