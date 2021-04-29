@extends('layout')

@section('content')
                    <h2 class="text-center title">Product by Brand</h2>
                    <?php foreach($product_by_brand as $v_product_by_brand){ ?>
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="text-center productinfo">
											<img src="{{URL::to($v_product_by_brand->product_image)}}" style="width:150px; height: auto" alt="iFuel Image" />
											<h2>{{ $v_product_by_brand->product_price }} BDT</h2><p>(per unit)</p>
											<h3>{{ $v_product_by_brand->product_name }}</h3>
                                            <p>{{ $v_product_by_brand->brand_name }}</p>
											<a href="{{URL::to('/view_product/'.$v_product_by_brand->product_id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
										</div>
										<div class="product-overlay">
											<div class="overlay-content">
												<h2>{{ $v_product_by_brand->product_price }} BDT</h2><p>(per unit)</h2>
												<p>{{ $v_product_by_brand->product_name }}</p>
												<a href="{{URL::to('/view_product/'.$v_product_by_brand->product_id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
											</div>
										</div>
								</div>
								<div class="choose">
									<ul class="nav nav-pills nav-justified">
										<li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
										<li><a href="{{URL::to('/view_product/'.$v_product_by_brand->product_id)}}"><i class="fa fa-plus-square"></i>View Product</a></li>
									</ul>
								</div>
							</div>
						</div>
                        <?php } ?>
					</div>

@endsection
