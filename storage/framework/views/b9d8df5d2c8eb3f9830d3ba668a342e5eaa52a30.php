<?php $__env->startSection('title', 'Customer List'); ?>
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
        <li class="active">Customers</li>
        <li><a href="<?php echo e(URL::Route('customer.create')); ?>">Create</a></li>
      </ol>
    </div><!--end .section-header -->
    <div class="section-body">
      <section>
        <div class="section-body">
          <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-head style-primary">
                  <header>Customer List</header>
                </div>
                <div class="card-body no-padding">
                  <div class="row">
                    <div class="col-md-12">
                      <form class="filters" action="" method="GET" enctype="text/plain">

                        <fieldset>
                          <legend>Filters</legend>
                          <div class="col-md-5">
                            <div class="form-group">
                              <input type="text" class="form-control" placeholder="customer name" name="name" value="<?php echo e($name); ?>">
                              <input type="hidden" id="pageHidden" name="page" value="1">
                            </div>
                          </div>
                          <div class="col-md-5">
                            <div class="form-group">
                              <input type="text" class="form-control" placeholder="customer mobile no" name="mobileNo" value="<?php echo e($mobileNo); ?>">
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
                        <th class="text-center" >Type</th>
                        <th class="text-center" >Photo</th>
                        <th class="text-center" >Name</th>
                        <th class="text-center" >Mobile No</th>
                        <th class="text-center" >Entry Date</th>
                        <th class="text-center" >Permanent Address</th>
                        <th class="text-center" >Active</th>
                        <th class="text-center" >Action</th>
                      </tr>
                      </thead>
                      <tbody>
                      <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                        <tr>
                          <td>
                            <?php echo e($customer->customerType); ?>

                          </td>
                          <td>
                            <img src="<?php echo e(URL::asset('storage')); ?>/<?php if($customer->photo): ?><?php echo e($customer->photo); ?> <?php else: ?><?php echo e('customers/avatar.png'); ?><?php endif; ?>" alt="" class="" width="80px" height="70px">
                          </td>
                          <td><?php echo e($customer->name); ?></td>
                          <td><?php echo e($customer->cellNo); ?></td>
                          <td><?php echo e($customer->entryDate->format('F j, Y')); ?></td>
                          <td><?php echo e($customer->permanentAddress); ?></td>
                          <td><?php echo e($customer->active); ?></td>
                          <td>
                            <div class="btn-group pull-right">
                              <?php if (app('Illuminate\Contracts\Auth\Access\Gate')->check('customer.destroy')): ?>
                                <form class="myAction" method="POST" action="<?php echo e(URL::route('customer.destroy',$customer->id)); ?>">
                                  <input name="_method" type="hidden" value="DELETE">
                                  <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                  <button type="submit" class="btn ink-reaction btn-floating-action btn-danger btn-sm" title="Delete">
                                    <i class="fa fa-fw fa-trash"></i>
                                  </button>
                                </form>
                              <?php endif; ?>
                              <?php if (app('Illuminate\Contracts\Auth\Access\Gate')->check('customer.edit')): ?>
                                <a title="Edit" href="<?php echo e(URL::route('customer.edit',$customer->id)); ?>" class="btn ink-reaction btn-floating-action btn-info btn-sm myAction"><i class="fa fa-edit"></i></a>
                              <?php endif; ?>
                              <a title="Details" target="_blank" href="<?php echo e(URL::route('customer.show',$customer->id)); ?>"  class="btn ink-reaction btn-floating-action btn-primary btn-sm myAction"><i class="fa fa-list"></i>
                              </a>
                            </div>
                          </td>
                        </tr>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                      </tbody>
                    </table>
                  </div><!--end .table-responsive -->
                  <?php echo e($customers->links()); ?>

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
          $('#menubarToggler').trigger('click');
          $('.pagination li>a').click(function (e) {
             e.preventDefault();
              $('#pageHidden').val($(this).text());
              $('form.filters').submit();

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