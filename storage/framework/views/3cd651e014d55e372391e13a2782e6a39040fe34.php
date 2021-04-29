<?php $__env->startSection('content'); ?>

<section id="cart_items">
    <div class="container col-sm-12">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
              <li><a href="<?php echo e(URL::to('welcome')); ?>">Home</a></li>
              <li class="active">Shopping Cart</li>
            </ol>
        </div>
        <div class="table-responsive cart_info">

            <?php
            $contents=Cart::getContent();
            ?>
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td class="image">Image</td>
                        <td class="description">Name</td>
                        <td class="price">Price (per unit)</td>
                        <td class="quantity">Quantity</td>
                        <td class="total">Total</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>

                    <?php foreach($contents as $v_contents){
                       //echo"<pre>";
                           //print($contents);
                       //echo"</pre>";
                       //exit()
                        ?>


                    <tr>
                        <td class="cart_product">
                            <a href=""><img src="<?php echo e(URL::to($v_contents->attributes->image)); ?>" style="height:100px; width:100px" alt=""></a>
                        </td>
                        <td class="cart_description">
                            <h4><a href=""><?php echo e($v_contents->name); ?></a></h4>
                            <p>Product ID: <?php echo e($v_contents->id); ?></p>
                        </td>
                        <td class="cart_price">
                            <p><?php echo e($v_contents->price); ?> BDT</p>
                        </td>
                        <td class="cart_quantity">
                            <div class="cart_quantity_button">
                            <form action="<?php echo e(URL::to('/update_cart')); ?>" method="post">
                                <?php echo e(csrf_field()); ?>

                                <input class="cart_quantity_input" type="text" name="quantity" value="<?php echo e($v_contents->quantity); ?>" autocomplete="off" size="2">
                                <input type="hidden" name="id" value="<?php echo e($v_contents->id); ?>">
                                <input type="submit" name="submit" class="btn btn-sm" style="background-color: rgb(209, 75, 97); color: white" value="update">
                            </form>
                            </div>
                        </td>
                        <td class="cart_total">
                            <p class="cart_total_price"><?php echo e($v_contents->getPriceSum()); ?></p>
                        </td>
                        <td class="cart_delete">
                            <a class="cart_quantity_delete" href="<?php echo e(URL::to('/delete_to_cart/'.$v_contents->id)); ?>"><i class="fa fa-times"></i></a>
                        </td>
                    </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
    </div>
</section> <!--/#cart_items-->


            <div class="col-sm-12">
                <div class="total_area">
                    <ul>
                        <li>Cart Sub Total <span><?php echo e(Cart::getSubTotal()); ?> BDT</span></li>
                        <li>VAT <span> 0.00 </span></li>
                        <li>Shipping Cost <span>Free</span></li>
                        <li>Total <span><?php echo e(Cart::getSubTotal()); ?> BDT</span></li>
                    </ul>
                    <?php $customer_id=Session::get('customer_id'); ?>
                    <?php if($customer_id != null){ ?>
                        <a class="btn btn-default check_out" href="<?php echo e(URL::to('/checkout')); ?>">Check Out</a>
                    <?php } else { ?>
                        <a class="btn btn-default check_out" href="<?php echo e(URL::to('/login_check')); ?>">Check Out</a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section><!--/#do_action-->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\elaravel\resources\views/pages/add_to_cart.blade.php ENDPATH**/ ?>