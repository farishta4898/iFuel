<?php $__env->startSection('content'); ?>

<section>
    <div class="container">
        <div class="row">
                <div class="left-sidebar">
                    <h2>Product Details</h2>
                    <div class="col-sm-9 padding-right">
                        <div class="product-details"><!--product-details-->
                            <div class="col-sm-5">
                                <div class="view-product">
                                    <img src="<?php echo e(URL::to($product_by_details->product_image)); ?>" alt="" />
                                </div>
                        </div>
                        <div class="col-sm-7">
                            <div class="product-information"><!--/product-information-->
                                <img src="<?php echo e(asset('frontend/images/product-details/new.jpg')); ?>" class="newarrival" alt="" />
                                <h3><?php echo e($product_by_details->product_name); ?></h3>
                                <p><?php echo e($product_by_details->product_long_description); ?></p>
                                <img src="<?php echo e(asset('frontend/images/product-details/rating.png')); ?>" alt="" />
                                <span>
                            <span><?php echo e($product_by_details->product_price); ?> BDT</span>
                                <form action="<?php echo e(URL::to('/add_to_cart')); ?>" method="POST">
                                    <?php echo e(csrf_field()); ?>

                                    <label>Quantity:</label>
                                    <input name="quantity" type="text" value="1">
                                    <input type="hidden" name="product_id" value=<?php echo e($product_by_details->product_id); ?>>
                                    <button type="submit" class="btn btn-fefault cart">
                                        <i class="fa fa-shopping-cart"></i>
                                        Add to cart
                                    </button>
                                </form>
                                </span>

                                <p><b>Availability:</b> In Stock</p>
                                <p><b>Category:</b> <?php echo e($product_by_details->category_name); ?></p>
                                <p><b>Brand:</b> <?php echo e($product_by_details->brand_name); ?> </p>
                                <a href=""><img src="<?php echo e(asset('images/product-details/share.png')); ?>" class="share img-responsive"  alt="" /></a>
                            </div>
                        </div>
                    </div>
                </div>
                        </div>
                    </section>

    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\elaravel\resources\views/pages/product_details.blade.php ENDPATH**/ ?>