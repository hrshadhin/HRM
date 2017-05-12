<?php $__env->startSection('title', 'Collection List'); ?>
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
        <li class="active">Collections</li>
        <li><a href="<?php echo e(URL::Route('collection.create')); ?>">New Collection</a></li>
      </ol>
    </div><!--end .section-header -->
    <div class="section-body">
      <section>
        <div class="section-body">
          <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-head style-primary">
                  <header>Collection List</header>
                </div>
                <div class="card-body no-padding">
                  <div class="table-responsive no-margin">
                    <table class="table table-striped no-margin">
                      <thead>
                      <tr>
                        <th width="5%" class="text-center">#SL</th>
                        <th width="10%" class="text-center">Date</th>
                        <th width="20%" class="text-center">Customer</th>
                        <th width="15%" class="text-center">Amount</th>
                        <th width="15%" class="text-center">Type</th>
                        <th width="15%" class="text-center">Notes</th>
                        <th width=10%" class="text-center">Entry At</th>
                        <th width="5%" class="text-center">By</th>
                        <th width="5%" class="text-center">Action</th>
                      </tr>
                      </thead>
                      <tbody>
                      <?php $__currentLoopData = $collections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $collection): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                        <tr>
                          <td class="text-center"><?php echo e($collection->collectionNo); ?></td>
                          <td class="text-center"><?php echo e($collection->collectionDate->format('d/m/y')); ?></td>
                          <td class="text-center"><?php echo e($collection->customer->name); ?> [<?php echo e($collection->customer->cellNo); ?>]</td>
                          <td class="text-center"><?php echo e($collection->amount); ?></td>
                          <td class="text-center">
                            <?php if($collection->collectionType == "Cheque"): ?>
                              <span class="text-info text-bold">Cheque, <?php echo e($collection->chequeNo); ?>, <?php echo e($collection->bankName); ?>, <?php echo e($collection->branchName); ?></span>
                            <?php elseif($collection->collectionType == "P.O"): ?>
                              <span class="text-warning text-bold">P.O, <?php echo e($collection->poNo); ?>, <?php echo e($collection->poName); ?>, <?php echo e($collection->poCode); ?></span>
                            <?php else: ?>
                              <?php if($collection->fromAdvance == 1): ?>
                                <span class="text-success text-bold">Cash [from advance]</span>
                              <?php else: ?>
                                <span class="text-success text-bold">Cash</span>
                              <?php endif; ?>
                            <?php endif; ?>
                          </td>
                          <td class="text-center"><?php echo e($collection->note); ?></td>
                          <td class="text-center"><?php echo e($collection->created_at->format('d/m/y h:i A')); ?></td>
                          <td class="text-center"><?php echo e($collection->entry->name); ?></td>
                          <td>
                            <div class="btn-group pull-right">
                              <?php if (app('Illuminate\Contracts\Auth\Access\Gate')->check('cullection.destroy')): ?>
                              <form class="myAction" method="POST" action="<?php echo e(URL::route('collection.destroy',$collection->id)); ?>">
                                <input name="_method" type="hidden" value="DELETE">
                                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                <button type="submit" class="btn ink-reaction btn-floating-action btn-danger btn-sm" title="Delete">
                                  <i class="fa fa-fw fa-trash"></i>
                                </button>
                              </form>
                                <?php endif; ?>
                            </div>
                            <!--end .btn-group -->
                          </td>
                        </tr>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                      </tbody>
                    </table>
                  </div><!--end .table-responsive -->
                  <?php echo e($collections->links()); ?>

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