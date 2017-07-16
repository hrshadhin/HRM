<?php $__env->startSection('title', 'Expense List'); ?>
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
        <li class="active">Expenses</li>
        <li><a href="<?php echo e(URL::Route('expense.create')); ?>">New expense</a></li>
      </ol>
    </div><!--end .section-header -->
    <div class="section-body">
      <section>
        <div class="section-body">
          <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-head style-primary">
                  <header>Expense List</header>
                </div>
                <div class="card-body no-padding">
                  <div class="table-responsive no-margin">
                    <table class="table table-striped no-margin">
                      <thead>
                      <tr>
                        <th width="5%" class="text-center">#SL</th>
                        <th width="12%" class="text-center">Expense Date</th>
                        <th width="25%" class="text-center">Project</th>
                        <th width="15%" class="text-center">Amount</th>
                        <th width="10%" class="text-center">Notes</th>
                        <th width=13%" class="text-center">Entry At</th>
                        <th width="10%" class="text-center">Entry By</th>
                        <th width="10%" class="text-center">Action</th>
                      </tr>
                      </thead>
                      <tbody>
                      <?php $__currentLoopData = $expenses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $expense): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                        <tr>
                          <td class="text-center"><?php echo e($expense->expenseNo); ?></td>
                          <td class="text-center"><?php echo e($expense->entryDate->format('d/m/Y')); ?></td>
                          <td class="text-center"><?php echo e($expense->project->name); ?></td>
                          <td class="text-center"><?php echo e($expense->amount); ?></td>                      
                          <td class="text-center"><?php echo e($expense->note); ?></td>
                          <td class="text-center"><?php echo e($expense->created_at->format('d/m/y h:i A')); ?></td>
                          <td class="text-center"><?php echo e($expense->entry->name); ?></td>
                          <td>
                            <div class="btn-group pull-right">
                                <?php if (app('Illuminate\Contracts\Auth\Access\Gate')->check('expense.destroy')): ?>
                              <form class="myAction" method="POST" action="<?php echo e(URL::route('expense.destroy',$expense->id)); ?>">
                                <input name="_method" type="hidden" value="DELETE">
                                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                <button type="submit" class="btn ink-reaction btn-floating-action btn-danger btn-sm" title="Delete">
                                  <i class="fa fa-fw fa-trash"></i>
                                </button>
                              </form>
                                <?php endif; ?>
                              <a title="Details" data-url="<?php echo e(URL::route('expense.show',$expense->id)); ?>" href="#" class="btn ink-reaction btn-floating-action btn-primary btn-sm myAction detailsBtn"><i class="fa fa-list"></i></a>

                            </div>
                            <!--end .btn-group -->
                          </td>
                        </tr>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                      </tbody>
                    </table>
                  </div><!--end .table-responsive -->
                  <?php echo e($expenses->links()); ?>

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
    <div id="offcanvas-demo-size2" class="offcanvas-pane width-10">
      <div class="offcanvas-head">
        <header>More Info</header>
        <div class="offcanvas-tools">
          <a class="btn btn-icon-toggle btn-default-light pull-right" data-dismiss="offcanvas">
            <i class="md md-close"></i>
          </a>
        </div>
      </div>

      <div class="offcanvas-body">
        <div class="table-responsive no-margin">
          <table id="itemTable" class="table table-striped no-margin">
            <thead>
            <tr>
              <th width="50%" class="text-center">item</th>
              <th width="50%" class="text-center">Amount</th>
            </tr>
            </thead>
            <tbody>

            </tbody>
            <tfoot>

            </tfoot>

          </table>
        </div>
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
                      $('#itemTable tbody').empty();
                      $('#itemTable tfoot').empty();
                      $.each(response.item,function (index,item) {
                          var row = '<tr>'+
                              '<td class="text-center">'+
                              '<span class="text-info">'+item.name+'</span>'+
                              '</td>'+
                              '<td class="text-center">'+
                              '<span class="text-info">'+item.amount+'</span>'+
                              '</td>'+
                              '</tr>';
                          $('#itemTable tbody').append(row);
                      });
                      var row = '<tr>'+
                          '<td class="text-center">'+
                          '<span class="text-bold">Total</span>'+
                          '</td>'+
                          '<td class="text-center">'+
                          '<span class="text-bold">'+response.amount+'</span>'+
                          '</td>'+
                          '</tr>';
                      $('#itemTable tfoot').append(row);

                  }
              });
              $('#base').append('<div class="backdrop"></div>');
              $('#offcanvas-demo-size2').addClass('active');
              $('#offcanvas-demo-size2').attr('style','transform: translate(-400px, 0px);');
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