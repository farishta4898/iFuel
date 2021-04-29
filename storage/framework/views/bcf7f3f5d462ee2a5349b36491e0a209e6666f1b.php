<?php $__env->startSection('admin_content'); ?>


<div id="content" class="span10">
    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="index.html">Home</a>
            <i class="icon-angle-right"></i>
        </li>
        <li><a href="#">Manage Orders</a></li>
    </ul>


      <p class="alert-success">
                <?php
                $message=Session::get('message');

                if($message)
                {
                    echo $message;
                    Session::put('message', null);
                }
                ?>
            </p>



    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon user"></i><span class="break"></span>Manage Orders</h2>
            </div>



            <div class="box-content">
                <table class="table table-striped table-bordered bootstrap-datatable datatable">
                  <thead>
                      <tr>
                          <th>Order ID</th>
                          <th>Customer Name</th>
                          <th>Total</th>
                          <th>Status</th>
                          <th>Actions</th>
                      </tr>
                  </thead>


                  <?php $__currentLoopData = $all_order_info; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v_order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


                  <tbody>
                    <tr>
                        <td><?php echo e($v_order->order_id); ?></td>
                        <td class="center"><?php echo e($v_order->customer_name); ?></td>
                        <td class="center"><?php echo e($v_order->order_total); ?></td>
                        <td class="center"><?php echo e($v_order->order_status); ?></td>


                       <td>
                        <?php if($v_order->order_status == "pending"): ?>

                            <a class="btn btn-danger" href="<?php echo e(URL::to('/pending_order', $v_order->order_id)); ?>">
                                <i class="halflings-icon white thumbs-down"></i>
                            </a>

                            <?php else: ?>
                            <a class="btn btn-success" href="<?php echo e(URL::to('/completed_order', $v_order->order_id)); ?>">
                                <i class="halflings-icon white thumbs-up"></i>
                            </a>

                           <?php endif; ?>
                            <a class="btn btn-info" href="<?php echo e(URL::to('/view_order', $v_order->order_id)); ?>">
                                <i class="halflings-icon white edit"></i>
                            </a>
                            <a class="btn btn-danger" href="<?php echo e(URL::to('/delete_order', $v_order->order_id)); ?>" id="delete">
                                <i class="halflings-icon white trash"></i>
                            </a>
                        </td>
                    </tr>
                  </tbody>

                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

              </table>
            </div>
        </div><!--/span-->
    </div><!--/row-->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\elaravel\resources\views/admin/manage_order.blade.php ENDPATH**/ ?>