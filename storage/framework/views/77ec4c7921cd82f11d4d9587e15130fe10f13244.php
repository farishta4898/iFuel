<?php $__env->startSection('admin_content'); ?>


<div id="content" class="span10">
    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="index.html">Home</a>
            <i class="icon-angle-right"></i>
        </li>
        <li><a href="#">All Products</a></li>
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
                <h2><i class="halflings-icon user"></i><span class="break"></span>All Products</h2>
            </div>



            <div class="box-content">
                <table class="table table-striped table-bordered bootstrap-datatable datatable">
                  <thead>
                      <tr>
                          <th>Product ID</th>
                          <th>Product Name</th>
                          <th>Product Image</th>
                          <th>Category Name</th>
                          <th>Brand Name</th>
                          <th>Product Description</th>
                          <th>Quantity</th>
                          <th>Price per Unit</th>
                          <th>Status</th>
                          <th>Actions</th>
                      </tr>
                  </thead>


                  <?php $__currentLoopData = $all_product_info; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v_product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


                  <tbody>
                    <tr>
                        <td><?php echo e($v_product->product_id); ?></td>
                        <td class="center"><?php echo e($v_product->product_name); ?></td>
                        <td><img src="<?php echo e(URL::to($v_product->product_image)); ?>" style="height: 50px; width 50px;"></td>
                        <td class="center"><?php echo e($v_product->category_name); ?></td>
                        <td class="center"><?php echo e($v_product->brand_name); ?></td>
                        <td class="center"><?php echo e($v_product->product_long_description); ?></td>
                        <td class="center"><?php echo e($v_product->product_quantity); ?></td>
                        <td class="center"><?php echo e($v_product->product_price); ?> BDT</td>

                        <td class="center">
                        <?php if($v_product->publication_status==1): ?>
                            <span class="label label-success">Published</span>
                        </td>

                        <?php else: ?>
                        <span class="label label-danger">Unpublished</span>
                        </td>

                        <?php endif; ?>
                        <td class="center">


                        <?php if($v_product->publication_status==1): ?>

                            <a class="btn btn-danger" href="<?php echo e(URL::to('/unpublished_product', $v_product->product_id)); ?>">
                                <i class="halflings-icon white thumbs-down"></i>
                            </a>

                            <?php else: ?>
                            <a class="btn btn-success" href="<?php echo e(URL::to('/published_product', $v_product->product_id)); ?>">
                                <i class="halflings-icon white thumbs-up"></i>
                            </a>

                          <?php endif; ?>
                            <a class="btn btn-info" href="<?php echo e(URL::to('/edit_product', $v_product->product_id)); ?>">
                                <i class="halflings-icon white edit"></i>
                            </a>
                            <a class="btn btn-danger" href="<?php echo e(URL::to('/delete_product', $v_product->product_id)); ?>" id="delete">
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

<?php echo $__env->make('admin_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\elaravel\resources\views/admin/all_product.blade.php ENDPATH**/ ?>