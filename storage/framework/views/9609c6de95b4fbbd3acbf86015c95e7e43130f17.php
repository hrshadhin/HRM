<?php $__env->startSection('title', 'user List'); ?>
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
        <li class="active">Users</li>
        <li><a href="<?php echo e(URL::Route('user.create')); ?>">New user</a></li>
      </ol>
    </div><!--end .section-header -->
    <div class="section-body">
      <section>
        <div class="section-body">
          <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-head style-primary">
                  <header>User List</header>
                </div>
                <div class="card-body no-padding">
                  <div class="table-responsive no-margin">
                    <table class="table table-striped no-margin">
                      <thead>
                      <tr>
                        <th width="10%" class="text-center">Role</th>
                        <th width="20%" class="text-center">Name</th>
                        <th width="20%" class="text-center">email</th>
                        <th width=20%" class="text-center">Entry At</th>
                        <th width="10%" class="text-center">By</th>
                        <th width="10%" class="text-center">Status</th>
                        <th width="10%" class="text-center">Action</th>
                      </tr>
                      </thead>
                      <tbody>

                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                        <tr>
                          <td class="text-center">
                              <?php if($user->hasRole('admin')): ?> Admin <?php endif; ?>
                              <?php if($user->hasRole('supervisor')): ?> Supervisor <?php endif; ?>
                              <?php if($user->hasRole('operator')): ?> Operator <?php endif; ?>
                          </td>
                          <td class="text-center"><?php echo e($user->name); ?></td>
                          <td class="text-center"><?php echo e($user->email); ?></td>
                          <td class="text-center"><?php echo e($user->created_at->format('d/m/y h:i A')); ?></td>
                          <td class="text-center"><?php if($user->entry): ?> <?php echo e($user->entry->name); ?> <?php endif; ?></td>
                          <td class="text-center">
                              <?php if($user->deleted_at): ?>
                                  <span class="text-bold text-default">Inactive</span>

                              <?php else: ?>
                                  <span class="text-bold text-success">Active</span>

                              <?php endif; ?>
                          </td>
                          <td>
                            <div class="btn-group pull-right">
                              <form class="myAction" method="POST" action="<?php echo e(URL::route('user.destroy',$user->id)); ?>">
                                <input name="_method" type="hidden" value="DELETE">
                                <input name="whatToDo" type="hidden" value="<?php if($user->deleted_at): ?> Active <?php else: ?> Inactive <?php endif; ?>">
                                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                <button type="submit" class="btn ink-reaction btn-floating-action <?php if($user->deleted_at): ?> btn-info <?php else: ?> btn-default <?php endif; ?> btn-sm" title="<?php if($user->deleted_at): ?> Active <?php else: ?> Inactive <?php endif; ?>">
                                  <i class="fa fa-fw <?php if($user->deleted_at): ?> fa-check <?php else: ?> fa-remove <?php endif; ?>"></i>
                                </button>
                              </form>
                              <a title="edit" href="<?php echo e(URL::route('user.edit',$user->id)); ?>"  class="btn ink-reaction btn-floating-action btn-primary btn-sm myAction"><i class="fa fa-pencil"></i></a>
                            </div>
                            <!--end .btn-group -->
                          </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                      </tbody>
                    </table>
                  </div><!--end .table-responsive -->

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
  <script>
      $( document ).ready(function() {
      });
  </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>