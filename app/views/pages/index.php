<?php require APPROOT . '/views/inc/header.php'; ?>

<div id="page-content">
	<!--Home slider-->
	<div class="slideshow slideshow-wrapper">
		<div class="home-slideshow">


			<?php foreach ($data['mainsliderlist'] as $nav) : ?>


				<div class="slide">
					<a href="product/productlist/<?php echo $nav->sub_menu_id; ?>">
						<div class="blur-up lazyload"> <img class="blur-up lazyload" src="<?php echo $nav->img; ?>" alt=" " title=" Start Selling" /> </div>
					</a>
				</div>

			<?php endforeach; ?>

		</div>
	</div>
	<!--End Home slider-->
	<!--Store Feture-->
	<div class="store-info bgtop style2 store-info-section small-pd d-none d-sm-none d-md-block d-lg-block">
		<div class="container">
			<div class="row">
				<div class="col-12 col-sm-12 col-md-12 col-lg-12">
					<ul class="display-table store-info style2">
						<li class="display-table-cell"> <a href="#"><i class="anm anm-phone-call-l" aria-hidden="true"></i>
								<h5>Call Us Anytime</h5>
								<span class="sub-text"> <span>+1 (250) 444-5555</span></span>
							</a> </li>
						<li class="display-table-cell"> <i class="anm anm-truck-line" aria-hidden="true"></i>
							<h5>Free Shipping</h5>
							<span class="sub-text"><span>When you spend $100+</span></span>
						</li>
						<li class="display-table-cell"> <i class="anm anm-undo-r" aria-hidden="true"></i>
							<h5>Free Returns</h5>
							<span class="sub-text"> <span>30-days free return policy.</span> </span>
						</li>
						<li class="display-table-cell"> <i class="anm anm-lock-al" aria-hidden="true"></i>
							<h5>Secured Payments</h5>
							<span class="sub-text"> <span>We accept all major credit cards.</span> </span>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<!--End Store Feture-->

	<!-- Grid Image Container-->
	<div class="top_section">
		<!--Image Banner-->

		<div class="section padtopno imgBanners style2 no-pb-section">
			<div class="page-title custome_title">
				<h1>--- AKT wear Collection ---</h1>
			</div>
			<div class="collection-banners1">
				<div class="row">

					<?php foreach ($data['gridimagelist'] as $nav) : ?>

						<div class="col-12 col-sm-12 col-md-6 col-lg-6 img-banner-item">
							<div class="imgBanner-grid-item">
								<div class="inner btmleft"> <a href="product/productlist/<?php echo $nav->sub_menu_id; ?>"> <span class="img"> <img class="blur-up lazyload" data-src="<?php echo $nav->grid_img; ?>" src="<?php echo $nav->grid_img; ?>" alt="" title=" " /> </span> <span class="ttl"><span class="tt-small"><?php echo $nav->img_title; ?></span></span> </a> </div>
							</div>
						</div>
						<div class="col-12 col-sm-12 col-md-6 col-lg-6 img-banner-item">
							<div class="row">
								<div class="col-12 col-sm-6 col-md-6 col-lg-6 img-banner-item">
									<div class="imgBanner-grid-item">
										<div class="inner btmleft"> <a href="#"> <span class="img"> <img class="blur-up lazyload" data-src="<?php echo URLROOT; ?>/images/demo9.jpg" src="assets/images/demo9.jpg" alt="" title=" " /> </span> <span class="ttl"><span class="tt-small">Men's Wear</span></span> </a> </div>
									</div>
								</div>
								<div class="col-12 col-sm-6 col-md-6 col-lg-6 img-banner-item last">
									<div class="imgBanner-grid-item">
										<div class="inner btmleft"> <a href="#"> <span class="img"> <img class="blur-up lazyload" data-src="<?php echo URLROOT; ?>/images/demo11.jpg" src="assets/images/demo11.jpg" alt="" title=" " /> </span> <span class="ttl"><span class="tt-small">Accessories</span></span> </a> </div>
									</div>
									<div class="imgBanner-grid-item">
										<div class="inner btmleft"> <a href="#"> <span class="img"> <img class="blur-up lazyload" data-src="<?php echo URLROOT; ?>/images/demo12.jpg" src="assets/images/demo12.jpg" alt="" title=" " /> </span> <span class="ttl"><span class="tt-small">Mojadi</span></span> </a> </div>
									</div>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
		<!--End Image Banner-->

	</div>
	<!--End Grid Image Container-->

	<!--Women Collection-->
	<div class="section product-slider tab-slider-product">
		<div class="container">
			<div class="section-header">
				<h2>Latest Collection</h2>
			</div>
			<div class="tabs-listing">
				<ul class="tabs clearfix">
					<li class="active" rel="tab1">New Arrivals</li>
					<li rel="tab2">Wedding</li>
					<li rel="tab3" class="tab_last">Rajvadi</li>
				</ul>
				<div class="tab_container">
					<h3 class="tab_drawer_heading d_active" rel="tab1">New Arrivals <i class="anm anm-angle-down-r" aria-hidden="true"></i></h3>
					<div id="tab1" class="tab_content grid-products">
						<div class="productSlider">
							<div class="col-12 item">
								<!-- start product image -->
								<div class="product-image">
									<!-- start product image -->
									<a href="product-detail.html" class="product-img">
										<!-- image -->
										<img class="primary blur-up lazyload" data-src="assets/images/product/P1.jpg" src="assets/images/product/P1.jpg" alt="" title="">
										<!-- End image -->
										<!-- Hover image -->
										<img class="hover blur-up lazyload" data-src="assets/images/product/P2.jpg" src="assets/images/product/P2.jpg" alt="" title="">
										<!-- End hover image -->
									</a>
									<!-- end product image -->

									<!--Product Button-->
									<div class="button-set style2">
										<ul>
											<li>
												<!--Cart Button-->
												<form class="add" action="cart-variant1.html" method="post">
													<button class="btn-icon btn btn-addto-cart" type="button" tabindex="0"> <i class="icon anm anm-cart-l"></i> <span class="tooltip-label">Add to Cart</span> </button>
												</form>
												<!--end Cart Button-->
											</li>
											<li>

											</li>
											<li>
												<!--Wishlist Button-->
												<div class="wishlist-btn"> <a class="btn-icon wishlist add-to-wishlist" href="wishlist.html"> <i class="icon anm anm-heart-l"></i> <span class="tooltip-label">Add To Wishlist</span> </a> </div>
												<!--End Wishlist Button-->
											</li>
											<li>

											</li>
										</ul>
									</div>
									<!--End Product Button-->
								</div>
								<!-- end product image -->
								<!--start product details -->
								<div class="product-details text-left">
									<!-- product name -->
									<div class="product-name"> <a href="product-detail.html"> Shervani Knit Top</a> </div>
									<!-- End product name -->
									<!-- product price -->
									<div class="product-price"> <span class="price">$399.01</span> </div>
									<!-- End product price -->
									<!-- End Variant -->
								</div>
								<!-- End product details -->
							</div>
							<div class="col-12 item">
								<!-- start product image -->
								<div class="product-image">
									<!-- start product image -->
									<a href="product-detail.html" class="product-img">
										<!-- image -->
										<img class="primary blur-up lazyload" data-src="assets/images/product/P3.jpg" src="assets/images/product/P3.jpg" alt="" title="">
										<!-- End image -->
										<!-- Hover image -->
										<img class="hover blur-up lazyload" data-src="assets/images/product/P4.jpg" src="assets/images/product/P4.jpg" alt="" title="">
										<!-- End hover image -->
									</a>
									<!-- end product image -->

									<!--Product Button-->
									<div class="button-set style2">
										<ul>
											<li>
												<!--Cart Button-->
												<form class="add" action="cart-variant1.html" method="post">
													<button class="btn-icon btn btn-addto-cart" type="button" tabindex="0"> <i class="icon anm anm-cart-l"></i> <span class="tooltip-label">Add to Cart</span> </button>
												</form>
												<!--end Cart Button-->
											</li>
											<li>

											</li>
											<li>
												<!--Wishlist Button-->
												<div class="wishlist-btn"> <a class="btn-icon wishlist add-to-wishlist" href="wishlist.html"> <i class="icon anm anm-heart-l"></i> <span class="tooltip-label">Add To Wishlist</span> </a> </div>
												<!--End Wishlist Button-->
											</li>
											<li>

											</li>
										</ul>
									</div>
									<!--End Product Button-->
								</div>
								<!-- end product image -->
								<!--start product details -->
								<div class="product-details text-left">
									<!-- product name -->
									<div class="product-name"> <a href="product-detail.html"> Shervani Knit Top</a> </div>
									<!-- End product name -->
									<!-- product price -->
									<div class="product-price"> <span class="price">$399.01</span> </div>
									<!-- End product price -->
									<!-- End Variant -->
								</div>
								<!-- End product details -->
							</div>
							<div class="col-12 item">
								<!-- start product image -->
								<div class="product-image">
									<!-- start product image -->
									<a href="product-detail.html" class="product-img">
										<!-- image -->
										<img class="primary blur-up lazyload" data-src="assets/images/product/P1.jpg" src="assets/images/product/P1.jpg" alt="" title="">
										<!-- End image -->
										<!-- Hover image -->
										<img class="hover blur-up lazyload" data-src="assets/images/product/P2.jpg" src="assets/images/product/P2.jpg" alt="" title="">
										<!-- End hover image -->
									</a>
									<!-- end product image -->

									<!--Product Button-->
									<div class="button-set style2">
										<ul>
											<li>
												<!--Cart Button-->
												<form class="add" action="cart-variant1.html" method="post">
													<button class="btn-icon btn btn-addto-cart" type="button" tabindex="0"> <i class="icon anm anm-cart-l"></i> <span class="tooltip-label">Add to Cart</span> </button>
												</form>
												<!--end Cart Button-->
											</li>
											<li>

											</li>
											<li>
												<!--Wishlist Button-->
												<div class="wishlist-btn"> <a class="btn-icon wishlist add-to-wishlist" href="wishlist.html"> <i class="icon anm anm-heart-l"></i> <span class="tooltip-label">Add To Wishlist</span> </a> </div>
												<!--End Wishlist Button-->
											</li>
											<li>

											</li>
										</ul>
									</div>
									<!--End Product Button-->
								</div>
								<!-- end product image -->
								<!--start product details -->
								<div class="product-details text-left">
									<!-- product name -->
									<div class="product-name"> <a href="product-detail.html"> Shervani Knit Top</a> </div>
									<!-- End product name -->
									<!-- product price -->
									<div class="product-price"> <span class="price">$399.01</span> </div>
									<!-- End product price -->
									<!-- End Variant -->
								</div>
								<!-- End product details -->
							</div>
							<div class="col-12 item">
								<!-- start product image -->
								<div class="product-image">
									<!-- start product image -->
									<a href="product-detail.html" class="product-img">
										<!-- image -->
										<img class="primary blur-up lazyload" data-src="assets/images/product/P3.jpg" src="assets/images/product/P3.jpg" alt="" title="">
										<!-- End image -->
										<!-- Hover image -->
										<img class="hover blur-up lazyload" data-src="assets/images/product/P4.jpg" src="assets/images/product/P4.jpg" alt="" title="">
										<!-- End hover image -->
									</a>
									<!-- end product image -->

									<!--Product Button-->
									<div class="button-set style2">
										<ul>
											<li>
												<!--Cart Button-->
												<form class="add" action="cart-variant1.html" method="post">
													<button class="btn-icon btn btn-addto-cart" type="button" tabindex="0"> <i class="icon anm anm-cart-l"></i> <span class="tooltip-label">Add to Cart</span> </button>
												</form>
												<!--end Cart Button-->
											</li>
											<li>

											</li>
											<li>
												<!--Wishlist Button-->
												<div class="wishlist-btn"> <a class="btn-icon wishlist add-to-wishlist" href="wishlist.html"> <i class="icon anm anm-heart-l"></i> <span class="tooltip-label">Add To Wishlist</span> </a> </div>
												<!--End Wishlist Button-->
											</li>
											<li>

											</li>
										</ul>
									</div>
									<!--End Product Button-->
								</div>
								<!-- end product image -->
								<!--start product details -->
								<div class="product-details text-left">
									<!-- product name -->
									<div class="product-name"> <a href="product-detail.html"> Shervani Knit Top</a> </div>
									<!-- End product name -->
									<!-- product price -->
									<div class="product-price"> <span class="price">$399.01</span> </div>
									<!-- End product price -->
									<!-- End Variant -->
								</div>
								<!-- End product details -->
							</div>
							<div class="col-12 item">
								<!-- start product image -->
								<div class="product-image">
									<!-- start product image -->
									<a href="product-detail.html" class="product-img">
										<!-- image -->
										<img class="primary blur-up lazyload" data-src="assets/images/product/P1.jpg" src="assets/images/product/P1.jpg" alt="" title="">
										<!-- End image -->
										<!-- Hover image -->
										<img class="hover blur-up lazyload" data-src="assets/images/product/P2.jpg" src="assets/images/product/P2.jpg" alt="" title="">
										<!-- End hover image -->
									</a>
									<!-- end product image -->

									<!--Product Button-->
									<div class="button-set style2">
										<ul>
											<li>
												<!--Cart Button-->
												<form class="add" action="cart-variant1.html" method="post">
													<button class="btn-icon btn btn-addto-cart" type="button" tabindex="0"> <i class="icon anm anm-cart-l"></i> <span class="tooltip-label">Add to Cart</span> </button>
												</form>
												<!--end Cart Button-->
											</li>
											<li>

											</li>
											<li>
												<!--Wishlist Button-->
												<div class="wishlist-btn"> <a class="btn-icon wishlist add-to-wishlist" href="wishlist.html"> <i class="icon anm anm-heart-l"></i> <span class="tooltip-label">Add To Wishlist</span> </a> </div>
												<!--End Wishlist Button-->
											</li>
											<li>

											</li>
										</ul>
									</div>
									<!--End Product Button-->
								</div>
								<!-- end product image -->
								<!--start product details -->
								<div class="product-details text-left">
									<!-- product name -->
									<div class="product-name"> <a href="product-detail.html"> Shervani Knit Top</a> </div>
									<!-- End product name -->
									<!-- product price -->
									<div class="product-price"> <span class="price">$399.01</span> </div>
									<!-- End product price -->
									<!-- End Variant -->
								</div>
								<!-- End product details -->
							</div>
							<div class="col-12 item">
								<!-- start product image -->
								<div class="product-image">
									<!-- start product image -->
									<a href="product-detail.html" class="product-img">
										<!-- image -->
										<img class="primary blur-up lazyload" data-src="assets/images/product/P3.jpg" src="assets/images/product/P3.jpg" alt="" title="">
										<!-- End image -->
										<!-- Hover image -->
										<img class="hover blur-up lazyload" data-src="assets/images/product/P4.jpg" src="assets/images/product/P4.jpg" alt="" title="">
										<!-- End hover image -->
									</a>
									<!-- end product image -->

									<!--Product Button-->
									<div class="button-set style2">
										<ul>
											<li>
												<!--Cart Button-->
												<form class="add" action="cart-variant1.html" method="post">
													<button class="btn-icon btn btn-addto-cart" type="button" tabindex="0"> <i class="icon anm anm-cart-l"></i> <span class="tooltip-label">Add to Cart</span> </button>
												</form>
												<!--end Cart Button-->
											</li>
											<li>

											</li>
											<li>
												<!--Wishlist Button-->
												<div class="wishlist-btn"> <a class="btn-icon wishlist add-to-wishlist" href="wishlist.html"> <i class="icon anm anm-heart-l"></i> <span class="tooltip-label">Add To Wishlist</span> </a> </div>
												<!--End Wishlist Button-->
											</li>
											<li>

											</li>
										</ul>
									</div>
									<!--End Product Button-->
								</div>
								<!-- end product image -->
								<!--start product details -->
								<div class="product-details text-left">
									<!-- product name -->
									<div class="product-name"> <a href="product-detail.html"> Shervani Knit Top</a> </div>
									<!-- End product name -->
									<!-- product price -->
									<div class="product-price"> <span class="price">$399.01</span> </div>
									<!-- End product price -->
									<!-- End Variant -->
								</div>
								<!-- End product details -->
							</div>
						</div>
					</div>
					<h3 class="tab_drawer_heading" rel="tab2">Best Seller <i class="anm anm-angle-down-r" aria-hidden="true"></i></h3>
					<div id="tab2" class="grid-products tab_content">
						<div class="productSlider">
							<div class="col-12 item">
								<!-- start product image -->
								<div class="product-image">
									<!-- start product image -->
									<a href="product-detail.html" class="product-img">
										<!-- image -->
										<img class="primary blur-up lazyload" data-src="assets/images/product/P1.jpg" src="assets/images/product/P1.jpg" alt="" title="">
										<!-- End image -->
										<!-- Hover image -->
										<img class="hover blur-up lazyload" data-src="assets/images/product/P2.jpg" src="assets/images/product/P2.jpg" alt="" title="">
										<!-- End hover image -->
									</a>
									<!-- end product image -->

									<!--Product Button-->
									<div class="button-set style2">
										<ul>
											<li>
												<!--Cart Button-->
												<form class="add" action="cart-variant1.html" method="post">
													<button class="btn-icon btn btn-addto-cart" type="button" tabindex="0"> <i class="icon anm anm-cart-l"></i> <span class="tooltip-label">Add to Cart</span> </button>
												</form>
												<!--end Cart Button-->
											</li>
											<li>

											</li>
											<li>
												<!--Wishlist Button-->
												<div class="wishlist-btn"> <a class="btn-icon wishlist add-to-wishlist" href="wishlist.html"> <i class="icon anm anm-heart-l"></i> <span class="tooltip-label">Add To Wishlist</span> </a> </div>
												<!--End Wishlist Button-->
											</li>
											<li>

											</li>
										</ul>
									</div>
									<!--End Product Button-->
								</div>
								<!-- end product image -->
								<!--start product details -->
								<div class="product-details text-left">
									<!-- product name -->
									<div class="product-name"> <a href="product-detail.html"> Shervani Knit Top</a> </div>
									<!-- End product name -->
									<!-- product price -->
									<div class="product-price"> <span class="price">$399.01</span> </div>
									<!-- End product price -->
									<!-- End Variant -->
								</div>
								<!-- End product details -->
							</div>
							<div class="col-12 item">
								<!-- start product image -->
								<div class="product-image">
									<!-- start product image -->
									<a href="product-detail.html" class="product-img">
										<!-- image -->
										<img class="primary blur-up lazyload" data-src="assets/images/product/P3.jpg" src="assets/images/product/P3.jpg" alt="" title="">
										<!-- End image -->
										<!-- Hover image -->
										<img class="hover blur-up lazyload" data-src="assets/images/product/P4.jpg" src="assets/images/product/P4.jpg" alt="" title="">
										<!-- End hover image -->
									</a>
									<!-- end product image -->

									<!--Product Button-->
									<div class="button-set style2">
										<ul>
											<li>
												<!--Cart Button-->
												<form class="add" action="cart-variant1.html" method="post">
													<button class="btn-icon btn btn-addto-cart" type="button" tabindex="0"> <i class="icon anm anm-cart-l"></i> <span class="tooltip-label">Add to Cart</span> </button>
												</form>
												<!--end Cart Button-->
											</li>
											<li>

											</li>
											<li>
												<!--Wishlist Button-->
												<div class="wishlist-btn"> <a class="btn-icon wishlist add-to-wishlist" href="wishlist.html"> <i class="icon anm anm-heart-l"></i> <span class="tooltip-label">Add To Wishlist</span> </a> </div>
												<!--End Wishlist Button-->
											</li>
											<li>

											</li>
										</ul>
									</div>
									<!--End Product Button-->
								</div>
								<!-- end product image -->
								<!--start product details -->
								<div class="product-details text-left">
									<!-- product name -->
									<div class="product-name"> <a href="product-detail.html"> Shervani Knit Top</a> </div>
									<!-- End product name -->
									<!-- product price -->
									<div class="product-price"> <span class="price">$399.01</span> </div>
									<!-- End product price -->
									<!-- End Variant -->
								</div>
								<!-- End product details -->
							</div>
							<div class="col-12 item">
								<!-- start product image -->
								<div class="product-image">
									<!-- start product image -->
									<a href="product-detail.html" class="product-img">
										<!-- image -->
										<img class="primary blur-up lazyload" data-src="assets/images/product/P1.jpg" src="assets/images/product/P1.jpg" alt="" title="">
										<!-- End image -->
										<!-- Hover image -->
										<img class="hover blur-up lazyload" data-src="assets/images/product/P2.jpg" src="assets/images/product/P2.jpg" alt="" title="">
										<!-- End hover image -->
									</a>
									<!-- end product image -->

									<!--Product Button-->
									<div class="button-set style2">
										<ul>
											<li>
												<!--Cart Button-->
												<form class="add" action="cart-variant1.html" method="post">
													<button class="btn-icon btn btn-addto-cart" type="button" tabindex="0"> <i class="icon anm anm-cart-l"></i> <span class="tooltip-label">Add to Cart</span> </button>
												</form>
												<!--end Cart Button-->
											</li>
											<li>

											</li>
											<li>
												<!--Wishlist Button-->
												<div class="wishlist-btn"> <a class="btn-icon wishlist add-to-wishlist" href="wishlist.html"> <i class="icon anm anm-heart-l"></i> <span class="tooltip-label">Add To Wishlist</span> </a> </div>
												<!--End Wishlist Button-->
											</li>
											<li>

											</li>
										</ul>
									</div>
									<!--End Product Button-->
								</div>
								<!-- end product image -->
								<!--start product details -->
								<div class="product-details text-left">
									<!-- product name -->
									<div class="product-name"> <a href="product-detail.html"> Shervani Knit Top</a> </div>
									<!-- End product name -->
									<!-- product price -->
									<div class="product-price"> <span class="price">$399.01</span> </div>
									<!-- End product price -->
									<!-- End Variant -->
								</div>
								<!-- End product details -->
							</div>
							<div class="col-12 item">
								<!-- start product image -->
								<div class="product-image">
									<!-- start product image -->
									<a href="product-detail.html" class="product-img">
										<!-- image -->
										<img class="primary blur-up lazyload" data-src="assets/images/product/P3.jpg" src="assets/images/product/P3.jpg" alt="" title="">
										<!-- End image -->
										<!-- Hover image -->
										<img class="hover blur-up lazyload" data-src="assets/images/product/P4.jpg" src="assets/images/product/P4.jpg" alt="" title="">
										<!-- End hover image -->
									</a>
									<!-- end product image -->

									<!--Product Button-->
									<div class="button-set style2">
										<ul>
											<li>
												<!--Cart Button-->
												<form class="add" action="cart-variant1.html" method="post">
													<button class="btn-icon btn btn-addto-cart" type="button" tabindex="0"> <i class="icon anm anm-cart-l"></i> <span class="tooltip-label">Add to Cart</span> </button>
												</form>
												<!--end Cart Button-->
											</li>
											<li>

											</li>
											<li>
												<!--Wishlist Button-->
												<div class="wishlist-btn"> <a class="btn-icon wishlist add-to-wishlist" href="wishlist.html"> <i class="icon anm anm-heart-l"></i> <span class="tooltip-label">Add To Wishlist</span> </a> </div>
												<!--End Wishlist Button-->
											</li>
											<li>

											</li>
										</ul>
									</div>
									<!--End Product Button-->
								</div>
								<!-- end product image -->
								<!--start product details -->
								<div class="product-details text-left">
									<!-- product name -->
									<div class="product-name"> <a href="product-detail.html"> Shervani Knit Top</a> </div>
									<!-- End product name -->
									<!-- product price -->
									<div class="product-price"> <span class="price">$399.01</span> </div>
									<!-- End product price -->
									<!-- End Variant -->
								</div>
								<!-- End product details -->
							</div>
							<div class="col-12 item">
								<!-- start product image -->
								<div class="product-image">
									<!-- start product image -->
									<a href="product-detail.html" class="product-img">
										<!-- image -->
										<img class="primary blur-up lazyload" data-src="assets/images/product/P1.jpg" src="assets/images/product/P1.jpg" alt="" title="">
										<!-- End image -->
										<!-- Hover image -->
										<img class="hover blur-up lazyload" data-src="assets/images/product/P2.jpg" src="assets/images/product/P2.jpg" alt="" title="">
										<!-- End hover image -->
									</a>
									<!-- end product image -->

									<!--Product Button-->
									<div class="button-set style2">
										<ul>
											<li>
												<!--Cart Button-->
												<form class="add" action="cart-variant1.html" method="post">
													<button class="btn-icon btn btn-addto-cart" type="button" tabindex="0"> <i class="icon anm anm-cart-l"></i> <span class="tooltip-label">Add to Cart</span> </button>
												</form>
												<!--end Cart Button-->
											</li>
											<li>

											</li>
											<li>
												<!--Wishlist Button-->
												<div class="wishlist-btn"> <a class="btn-icon wishlist add-to-wishlist" href="wishlist.html"> <i class="icon anm anm-heart-l"></i> <span class="tooltip-label">Add To Wishlist</span> </a> </div>
												<!--End Wishlist Button-->
											</li>
											<li>

											</li>
										</ul>
									</div>
									<!--End Product Button-->
								</div>
								<!-- end product image -->
								<!--start product details -->
								<div class="product-details text-left">
									<!-- product name -->
									<div class="product-name"> <a href="product-detail.html"> Shervani Knit Top</a> </div>
									<!-- End product name -->
									<!-- product price -->
									<div class="product-price"> <span class="price">$399.01</span> </div>
									<!-- End product price -->
									<!-- End Variant -->
								</div>
								<!-- End product details -->
							</div>
							<div class="col-12 item">
								<!-- start product image -->
								<div class="product-image">
									<!-- start product image -->
									<a href="product-detail.html" class="product-img">
										<!-- image -->
										<img class="primary blur-up lazyload" data-src="assets/images/product/P3.jpg" src="assets/images/product/P3.jpg" alt="" title="">
										<!-- End image -->
										<!-- Hover image -->
										<img class="hover blur-up lazyload" data-src="assets/images/product/P4.jpg" src="assets/images/product/P4.jpg" alt="" title="">
										<!-- End hover image -->
									</a>
									<!-- end product image -->

									<!--Product Button-->
									<div class="button-set style2">
										<ul>
											<li>
												<!--Cart Button-->
												<form class="add" action="cart-variant1.html" method="post">
													<button class="btn-icon btn btn-addto-cart" type="button" tabindex="0"> <i class="icon anm anm-cart-l"></i> <span class="tooltip-label">Add to Cart</span> </button>
												</form>
												<!--end Cart Button-->
											</li>
											<li>

											</li>
											<li>
												<!--Wishlist Button-->
												<div class="wishlist-btn"> <a class="btn-icon wishlist add-to-wishlist" href="wishlist.html"> <i class="icon anm anm-heart-l"></i> <span class="tooltip-label">Add To Wishlist</span> </a> </div>
												<!--End Wishlist Button-->
											</li>
											<li>

											</li>
										</ul>
									</div>
									<!--End Product Button-->
								</div>
								<!-- end product image -->
								<!--start product details -->
								<div class="product-details text-left">
									<!-- product name -->
									<div class="product-name"> <a href="product-detail.html"> Shervani Knit Top</a> </div>
									<!-- End product name -->
									<!-- product price -->
									<div class="product-price"> <span class="price">$399.01</span> </div>
									<!-- End product price -->
									<!-- End Variant -->
								</div>
								<!-- End product details -->
							</div>
						</div>
					</div>
					<h3 class="tab_drawer_heading" rel="tab3">Top Rated <i class="anm anm-angle-down-r" aria-hidden="true"></i></h3>
					<div id="tab3" class="grid-products tab_content">
						<div class="productSlider">
							<div class="col-12 item">
								<!-- start product image -->
								<div class="product-image">
									<!-- start product image -->
									<a href="product-detail.html" class="product-img">
										<!-- image -->
										<img class="primary blur-up lazyload" data-src="assets/images/product/P1.jpg" src="assets/images/product/P1.jpg" alt="" title="">
										<!-- End image -->
										<!-- Hover image -->
										<img class="hover blur-up lazyload" data-src="assets/images/product/P2.jpg" src="assets/images/product/P2.jpg" alt="" title="">
										<!-- End hover image -->
									</a>
									<!-- end product image -->

									<!--Product Button-->
									<div class="button-set style2">
										<ul>
											<li>
												<!--Cart Button-->
												<form class="add" action="cart-variant1.html" method="post">
													<button class="btn-icon btn btn-addto-cart" type="button" tabindex="0"> <i class="icon anm anm-cart-l"></i> <span class="tooltip-label">Add to Cart</span> </button>
												</form>
												<!--end Cart Button-->
											</li>
											<li>

											</li>
											<li>
												<!--Wishlist Button-->
												<div class="wishlist-btn"> <a class="btn-icon wishlist add-to-wishlist" href="wishlist.html"> <i class="icon anm anm-heart-l"></i> <span class="tooltip-label">Add To Wishlist</span> </a> </div>
												<!--End Wishlist Button-->
											</li>
											<li>

											</li>
										</ul>
									</div>
									<!--End Product Button-->
								</div>
								<!-- end product image -->
								<!--start product details -->
								<div class="product-details text-left">
									<!-- product name -->
									<div class="product-name"> <a href="product-detail.html"> Shervani Knit Top</a> </div>
									<!-- End product name -->
									<!-- product price -->
									<div class="product-price"> <span class="price">$399.01</span> </div>
									<!-- End product price -->
									<!-- End Variant -->
								</div>
								<!-- End product details -->
							</div>
							<div class="col-12 item">
								<!-- start product image -->
								<div class="product-image">
									<!-- start product image -->
									<a href="product-detail.html" class="product-img">
										<!-- image -->
										<img class="primary blur-up lazyload" data-src="assets/images/product/P3.jpg" src="assets/images/product/P3.jpg" alt="" title="">
										<!-- End image -->
										<!-- Hover image -->
										<img class="hover blur-up lazyload" data-src="assets/images/product/P4.jpg" src="assets/images/product/P4.jpg" alt="" title="">
										<!-- End hover image -->
									</a>
									<!-- end product image -->

									<!--Product Button-->
									<div class="button-set style2">
										<ul>
											<li>
												<!--Cart Button-->
												<form class="add" action="cart-variant1.html" method="post">
													<button class="btn-icon btn btn-addto-cart" type="button" tabindex="0"> <i class="icon anm anm-cart-l"></i> <span class="tooltip-label">Add to Cart</span> </button>
												</form>
												<!--end Cart Button-->
											</li>
											<li>

											</li>
											<li>
												<!--Wishlist Button-->
												<div class="wishlist-btn"> <a class="btn-icon wishlist add-to-wishlist" href="wishlist.html"> <i class="icon anm anm-heart-l"></i> <span class="tooltip-label">Add To Wishlist</span> </a> </div>
												<!--End Wishlist Button-->
											</li>
											<li>

											</li>
										</ul>
									</div>
									<!--End Product Button-->
								</div>
								<!-- end product image -->
								<!--start product details -->
								<div class="product-details text-left">
									<!-- product name -->
									<div class="product-name"> <a href="product-detail.html"> Shervani Knit Top</a> </div>
									<!-- End product name -->
									<!-- product price -->
									<div class="product-price"> <span class="price">$399.01</span> </div>
									<!-- End product price -->
									<!-- End Variant -->
								</div>
								<!-- End product details -->
							</div>
							<div class="col-12 item">
								<!-- start product image -->
								<div class="product-image">
									<!-- start product image -->
									<a href="product-detail.html" class="product-img">
										<!-- image -->
										<img class="primary blur-up lazyload" data-src="assets/images/product/P1.jpg" src="assets/images/product/P1.jpg" alt="" title="">
										<!-- End image -->
										<!-- Hover image -->
										<img class="hover blur-up lazyload" data-src="assets/images/product/P2.jpg" src="assets/images/product/P2.jpg" alt="" title="">
										<!-- End hover image -->
									</a>
									<!-- end product image -->

									<!--Product Button-->
									<div class="button-set style2">
										<ul>
											<li>
												<!--Cart Button-->
												<form class="add" action="cart-variant1.html" method="post">
													<button class="btn-icon btn btn-addto-cart" type="button" tabindex="0"> <i class="icon anm anm-cart-l"></i> <span class="tooltip-label">Add to Cart</span> </button>
												</form>
												<!--end Cart Button-->
											</li>
											<li>

											</li>
											<li>
												<!--Wishlist Button-->
												<div class="wishlist-btn"> <a class="btn-icon wishlist add-to-wishlist" href="wishlist.html"> <i class="icon anm anm-heart-l"></i> <span class="tooltip-label">Add To Wishlist</span> </a> </div>
												<!--End Wishlist Button-->
											</li>
											<li>

											</li>
										</ul>
									</div>
									<!--End Product Button-->
								</div>
								<!-- end product image -->
								<!--start product details -->
								<div class="product-details text-left">
									<!-- product name -->
									<div class="product-name"> <a href="product-detail.html"> Shervani Knit Top</a> </div>
									<!-- End product name -->
									<!-- product price -->
									<div class="product-price"> <span class="price">$399.01</span> </div>
									<!-- End product price -->
									<!-- End Variant -->
								</div>
								<!-- End product details -->
							</div>
							<div class="col-12 item">
								<!-- start product image -->
								<div class="product-image">
									<!-- start product image -->
									<a href="product-detail.html" class="product-img">
										<!-- image -->
										<img class="primary blur-up lazyload" data-src="assets/images/product/P3.jpg" src="assets/images/product/P3.jpg" alt="" title="">
										<!-- End image -->
										<!-- Hover image -->
										<img class="hover blur-up lazyload" data-src="assets/images/product/P4.jpg" src="assets/images/product/P4.jpg" alt="" title="">
										<!-- End hover image -->
									</a>
									<!-- end product image -->

									<!--Product Button-->
									<div class="button-set style2">
										<ul>
											<li>
												<!--Cart Button-->
												<form class="add" action="cart-variant1.html" method="post">
													<button class="btn-icon btn btn-addto-cart" type="button" tabindex="0"> <i class="icon anm anm-cart-l"></i> <span class="tooltip-label">Add to Cart</span> </button>
												</form>
												<!--end Cart Button-->
											</li>
											<li>

											</li>
											<li>
												<!--Wishlist Button-->
												<div class="wishlist-btn"> <a class="btn-icon wishlist add-to-wishlist" href="wishlist.html"> <i class="icon anm anm-heart-l"></i> <span class="tooltip-label">Add To Wishlist</span> </a> </div>
												<!--End Wishlist Button-->
											</li>
											<li>

											</li>
										</ul>
									</div>
									<!--End Product Button-->
								</div>
								<!-- end product image -->
								<!--start product details -->
								<div class="product-details text-left">
									<!-- product name -->
									<div class="product-name"> <a href="product-detail.html"> Shervani Knit Top</a> </div>
									<!-- End product name -->
									<!-- product price -->
									<div class="product-price"> <span class="price">$399.01</span> </div>
									<!-- End product price -->
									<!-- End Variant -->
								</div>
								<!-- End product details -->
							</div>
							<div class="col-12 item">
								<!-- start product image -->
								<div class="product-image">
									<!-- start product image -->
									<a href="product-detail.html" class="product-img">
										<!-- image -->
										<img class="primary blur-up lazyload" data-src="assets/images/product/P1.jpg" src="assets/images/product/P1.jpg" alt="" title="">
										<!-- End image -->
										<!-- Hover image -->
										<img class="hover blur-up lazyload" data-src="assets/images/product/P2.jpg" src="assets/images/product/P2.jpg" alt="" title="">
										<!-- End hover image -->
									</a>
									<!-- end product image -->

									<!--Product Button-->
									<div class="button-set style2">
										<ul>
											<li>
												<!--Cart Button-->
												<form class="add" action="cart-variant1.html" method="post">
													<button class="btn-icon btn btn-addto-cart" type="button" tabindex="0"> <i class="icon anm anm-cart-l"></i> <span class="tooltip-label">Add to Cart</span> </button>
												</form>
												<!--end Cart Button-->
											</li>
											<li>

											</li>
											<li>
												<!--Wishlist Button-->
												<div class="wishlist-btn"> <a class="btn-icon wishlist add-to-wishlist" href="wishlist.html"> <i class="icon anm anm-heart-l"></i> <span class="tooltip-label">Add To Wishlist</span> </a> </div>
												<!--End Wishlist Button-->
											</li>
											<li>

											</li>
										</ul>
									</div>
									<!--End Product Button-->
								</div>
								<!-- end product image -->
								<!--start product details -->
								<div class="product-details text-left">
									<!-- product name -->
									<div class="product-name"> <a href="product-detail.html"> Shervani Knit Top</a> </div>
									<!-- End product name -->
									<!-- product price -->
									<div class="product-price"> <span class="price">$399.01</span> </div>
									<!-- End product price -->
									<!-- End Variant -->
								</div>
								<!-- End product details -->
							</div>
							<div class="col-12 item">
								<!-- start product image -->
								<div class="product-image">
									<!-- start product image -->
									<a href="product-detail.html" class="product-img">
										<!-- image -->
										<img class="primary blur-up lazyload" data-src="assets/images/product/P3.jpg" src="assets/images/product/P3.jpg" alt="" title="">
										<!-- End image -->
										<!-- Hover image -->
										<img class="hover blur-up lazyload" data-src="assets/images/product/P4.jpg" src="assets/images/product/P4.jpg" alt="" title="">
										<!-- End hover image -->
									</a>
									<!-- end product image -->

									<!--Product Button-->
									<div class="button-set style2">
										<ul>
											<li>
												<!--Cart Button-->
												<form class="add" action="cart-variant1.html" method="post">
													<button class="btn-icon btn btn-addto-cart" type="button" tabindex="0"> <i class="icon anm anm-cart-l"></i> <span class="tooltip-label">Add to Cart</span> </button>
												</form>
												<!--end Cart Button-->
											</li>
											<li>

											</li>
											<li>
												<!--Wishlist Button-->
												<div class="wishlist-btn"> <a class="btn-icon wishlist add-to-wishlist" href="wishlist.html"> <i class="icon anm anm-heart-l"></i> <span class="tooltip-label">Add To Wishlist</span> </a> </div>
												<!--End Wishlist Button-->
											</li>
											<li>

											</li>
										</ul>
									</div>
									<!--End Product Button-->
								</div>
								<!-- end product image -->
								<!--start product details -->
								<div class="product-details text-left">
									<!-- product name -->
									<div class="product-name"> <a href="product-detail.html"> Shervani Knit Top</a> </div>
									<!-- End product name -->
									<!-- product price -->
									<div class="product-price"> <span class="price">$399.01</span> </div>
									<!-- End product price -->
									<!-- End Variant -->
								</div>
								<!-- End product details -->
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--End Women Collection-->

	<!--Hot Sale Collection Slider-->
	<div class="collection-box section">
		<div class="container">
			<div class="section-header">
				<h2>Hot Sale Collection</h2>
				<p>Final Reduction Up to 70% Off</p>
			</div>
			<div class="collection-grid-slider">
				<?php foreach ($data['salesCollection'] as $nav) : ?>
					<div class="collection-item">
						<a href="<?php echo join('/', [URLROOT, 'product/productlist', $nav->sub_menu_id]); ?>" class="collection-grid-link">
							<div class="img">
								<img data-src="<?php echo $nav->sc_img; ?>" src="<?php echo $nav->sc_img; ?>" alt="<?php echo $nav->sc_name; ?>" class="blur-up lazyload" />
							</div>
							<div class="details">
								<h3 class="collection-item-title"><?php echo $nav->sc_name; ?></h3>
							</div>
						</a>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
	<!--End Hot Sale Collection Slider-->
	<!--Image Banners-->
	<div class="section imgBanners style3 no-pb-section">
		<div class="row">
			<div class="col-12 col-sm-12 col-md-6 col-lg-4 img-banner-item">
				<div class="imgBanner-grid-item">
					<div class="inner"> <a href="#"> <span class="img"> <img class="blur-up lazyload" data-src="assets/images/demo3.jpg" src="assets/images/demo3.jpg" alt="Trend Alert" title="Trend Alert" /> </span> </a>
						<div class="details w-50 right">
							<p class="tt-small">Best Clothes Online</p>
							<h3 class="title">New Style</h3>
						</div>
					</div>
				</div>
			</div>

			<div class="col-12 col-sm-12 col-md-6 col-lg-4 img-banner-item">
				<div class="imgBanner-grid-item">
					<div class="inner"> <a href="#"> <span class="img"> <img class="blur-up lazyload" data-src="assets/images/demo6.jpg" src="assets/images/demo6.jpg" alt="Hot Occasion" title="Hot Occasion" /> </span> </a>
						<div class="details w-50 left-top">
							<p class="tt-small">Pre-Fall Collection</p>
							<h3 class="title">Accessories</h3>
						</div>
					</div>
				</div>
			</div>
			<div class="col-12 col-sm-12 col-md-12 col-lg-4 img-banner-item">
				<div class="imgBanner-grid-item">
					<div class="inner"> <a href="#"> <span class="img"> <img class="blur-up lazyload" data-src="assets/images/demo7.jpg" src="assets/images/demo7.jpg" alt="Hot Occasion" title="Hot Occasion" /> </span> </a>
						<div class="details w-50 left">
							<p class="tt-small">Best Brands</p>
							<h3 class="title">Elegant Shoes</h3>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--End Image Banners-->

	<!--New Arrivals-->
	<div class="section product-slider">
		<div class="section-header">
			<h2>New Arrivals</h2>
			<p>Shop our new arrivals from established brands</p>
		</div>
		<div class="container">
			<div class="productSlider grid-products">
				<?php foreach ($data['new_arrival'] as $key => $sp_array) : ?>
					<div class="col-12 item">
						<!-- start product image -->
						<div class="product-image">
							<!-- start product image -->
							<a href="<?php echo URLROOT; ?>/product/productdetail/<?php echo $sp_array->product_id; ?>" class="product-img">
								<!-- image -->
								<?php $images = json_decode($sp_array->images,true); ?>
								<img class="primary blur-up lazyload" data-src="<?php echo URLROOT . $images[0]['image']; ?>" src="<?php echo URLROOT . $images[0]['image']; ?>" alt="" title="">
								<!-- End image -->
								<!-- Hover image -->
								<?php if(isset($images[1]['image'])): ?>
								<img class="hover blur-up lazyload" data-src="<?php echo URLROOT . $images[1]['image']; ?>" src="<?php echo URLROOT . $images[1]['image']; ?>" alt="" title="">
								<?php endif; ?>
								<!-- End hover image -->

							</a>
							<!-- end product image -->

							<!--Product Button-->
							<div class="button-set style1">
								<ul>
									<li>
										<!--Cart Button-->
										<form class="add" action="cart-variant1.html" method="post">
											<button class="btn-icon btn btn-addto-cart" type="button" tabindex="0"> <i class="icon anm anm-cart-l"></i> <span class="tooltip-label">Add to Cart</span> </button>
										</form>
										<!--end Cart Button-->
									</li>
									<li>
									</li>
									<li>
										<!--Wishlist Button-->
										<div class="wishlist-btn"> <a class="btn-icon wishlist wishlist-cart add-to-wishlist" data-id="<?php echo $sp_array->product_id; ?>" href="#"> <i class="icon anm anm-heart-l"></i> <span class="tooltip-label">Add To Wishlist</span> </a> </div>
										<!--End Wishlist Button-->
									</li>
									<li>
									</li>
								</ul>
							</div>
							<!--End Product Button-->
						</div>
						<!-- end product image -->
						<!--start product details -->
						<div class="product-details text-center">
							<!-- product name -->
							<div class="product-name"> <a href="product-detail.html"><?php echo $sp_array->product_name; ?></a> </div>
							<!-- End product name -->
							<!-- product price -->
							<div class="product-price"> <span class="price"><?php echo $sp_array->total_price; ?></span> </div>
							<!-- End product price -->
							<!-- End Variant -->
						</div>
						<!-- End product details -->
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
	<!--End New Arrivals-->


</div>
<!--End Page Wrapper-->


<!--Blog Post-->
<div class="section no-pt-section collection-banners style2">
	<div class="section-header">
		<h2>ACCESSORIES</h2>
		<p>COMPLETE YOUR LOOK</p>
	</div>

	<div class="row">
		<?php foreach ($data['Accessories'] as $nav) : ?>
			<div class="col-12 col-sm-4 col-md-4 col-lg-4 collection-page-item">

				<div class="collection-grid-item">
					<div class="img">
						<a href="<?php echo $nav->sub_menu_id; ?>" class="collection-grid-item__link">
							<img class="blur-up lazyloaded" data-src="<?php echo $nav->acc_img; ?>" src="<?php echo $nav->acc_img; ?>" alt="<?php echo $nav->acc_name; ?>" title=" ">
							<span class="details">
								<span class="inner">
									<span class="collection-grid-item__title"><?php echo $nav->acc_name; ?></span>
								</span>
							</span>
						</a>
					</div>
				</div>

			</div>
		<?php endforeach; ?>

	</div>
</div>
<!--End Blog Post-->

<!--Store Feature-->
<div class="store-features">
	<div class="container">
		<div class="row store-info">
			<div class="col-12 col-sm-12 col-md-12 col-lg-12 wt text-center">
				<h2>Modern & Classic Outlet Menswear</h2>
				<p class="sub-text">Clean & Elegant design with a modern style. All you need for a fashion & accessories store</p>
			</div>
		</div>
	</div>
</div>
<!--End Store Feature-->

<!--Testimonial Slider-->
<div class="section testimonial-slider">
	<div class="container">
		<div class="row">
			<div class="col-sm-8">
				<div class="">
					<div class="quote-wraper">
						<!--Testimonial Slider Title-->
						<div class="section-header text-center">
							<h2 class="h2">Testimonial</h2>
						</div>
						<!--End Testimonial Slider Title-->
						<!--Testimonial Slider Items-->
						<div class="quotes-slider">

							<?php foreach ($data['testi_list'] as $nav) : ?>
								<div class="quotes-slide">
									<blockquote class="quotes-slider__text ">
										<div class="rte-setting"> <img src="<?php echo $nav->testi_img; ?>" class="pull-right col-sm-6">
											<p class="pull-left col-sm-6"><?php echo $nav->testi_desc ?><br>
												<span class="authour"><?php echo $nav->testi_name; ?></span> </p>
										</div>
									</blockquote>
								</div>
							<?php endforeach; ?>

						</div>
						<!--Testimonial Slider Items-->
					</div>
				</div>
			</div>
			<div class="col-sm-4 img-banner-item">
				<div class="text-center">
					<div class="section-header">
						<h2>custom stitching</h2>
						<p>Follow the latest trends, sales and styles.</p>
					</div>
					<div class="details left"> <img src="assets/images/stich.jpg" class="img-banner-item">
						<p></p>
						<h3 class="title">Discover better basic and modern, made of steel for your black.</h3>
						<a href="#" class="btn">Contact Now</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!--End Testimonial Slider-->

<div class="section newsletter-section">
	<div class="container">
		<div class="section-header">
			<h2>Join the A-List and save 15%</h2>
			<p>Follow the latest trends, sales and styles.</p>
		</div>
		<div class="display-table">
			<div class="display-table-cell newsletter-form">
				<form method="post" action="<?php echo URLROOT . '/homepage/addEmailSubs'; ?>">
					<div class="input-group">
						<input type="email" class="input-group__field newsletter-input" name="email" value="" placeholder="Enter Email address" required>
						<span class="input-group__btn">

							<button type="submit" class="btn newsletter__submit" name="subs" id="Subscribe"><span class="newsletter__submit-text--large">Subscribe</span></button>
						</span>
					</div>
				</form>
			</div>
		</div>


	</div>
</div>


<?php require APPROOT . '/views/inc/footer.php'; ?>