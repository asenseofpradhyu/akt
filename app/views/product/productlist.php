<?php require APPROOT . '/views/inc/header.php'; ?>

<div id="page-content">
	<!--Body Container-->
	<div class="section-header m-20">
		<h2>Hot asseseries Collection</h2>
		<p>Final Reduction Up to 70% Off</p>
	</div>

	<!--Breadcrumbs-->
	<div class="breadcrumbs-wrapper">
		<div class="container">
			<div class="breadcrumbs"><a href="<?php echo URLROOT; ?>" title="Back to the home page">Home</a> <span aria-hidden="true">|</span> <span>Category Slideshow</span></div>
		</div>
	</div>
	<!--End Breadcrumbs-->
	<div class="container">
		<div class="row">
			<!--Sidebar-->
			<div class="col-12 col-sm-12 col-md-3 col-lg-3 sidebar filterbar">
				<div class="closeFilter d-block d-md-none d-lg-none"><i class="icon icon anm anm-times-l"></i></div>
				<div class="sidebar_tags">
					<!--Categories-->
					<div class="sidebar_widget categories filter-widget">
						<div class="widget-title">
							<h2>Categories</h2>
						</div>
						<div class="widget-content">
							<ul class="sidebar_categories">
							<?php echo $data['filter_categories']; ?>
							</ul>
						</div>
					</div>
					<!--Categories-->
					<!--Price Filter-->
					<div class="sidebar_widget filterBox filter-widget">
						<div class="widget-title">
							<h2>Price</h2>
						</div>
						<form action="#" method="post" class="price-filter">
							<input type="hidden" id="hidden_minimum_price" value="0" />
							<input type="hidden" id="hidden_maximum_price" value="0" />
							<div id="slider-range" class="ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all">
								<div class="ui-slider-range ui-widget-header ui-corner-all"></div>
								<span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0" style="left: 0%;"></span>
								<span id="handle" class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span>
								<div class="ui-slider-range ui-widget-header ui-corner-all" style="left: 0%; "></div>
							</div>
							<div class="row">
								<div class="col-6">
									<p class="no-margin"><input id="amount" type="text"></p>
								</div>
								<div class="col-6 text-right margin-25px-top">
									<button class="btn btn-secondary btn--small">filter</button>
								</div>
							</div>
						</form>
					</div>
					<!--End Price Filter-->
					<!--Size Swatches-->
					<div class="sidebar_widget filterBox filter-widget brand-filter">
						<div class="widget-title">
							<h2>Color</h2>
						</div>
						<ul>
							<?php foreach ($data['colors'] as $key => $color): ?>
							<li>
								<input type="checkbox" value="<?php echo $color->color_id; ?>" class="common_selector colorID" id="check1" name="filterColor[]">
								<label for="check1"><span><span></span></span><?php echo $color->color; ?></label>
							</li>
							<?php endforeach; ?>
						</ul>
					</div>
					<!--End Size Swatches-->
					<!--Color Swatches-->
					<div class="sidebar_widget filterBox filter-widget brand-filter">
						<div class="widget-title">
							<h2>Size</h2>
						</div>
						<ul>
							<?php foreach ($data['sizes'] as $key => $size): ?>
							<li>
								<input type="checkbox" value="<?php echo $size->id; ?>" id="check1" class="common_selector sizeID" name="filterSize[]">
								<label for="check1"><span><span></span></span><?php echo $size->title; ?></label>
							</li>
							<?php endforeach; ?>
						</ul>
					</div>
					<!--End Color Swatches-->
					<!--Fabric commented-->
					<!-- <div class="sidebar_widget filterBox filter-widget brand-filter">
						<div class="widget-title">
							<h2>Fabric</h2>
						</div>
						<ul>
							<li>
								<input type="checkbox" value="allen-vela" id="check1" class="common_selector fabric">
								<label for="check1"><span><span></span></span>Allen Vela</label>
							</li>
							<li>
								<input type="checkbox" value="oxymat" id="check3" class="common_selector fabric">
								<label for="check3"><span><span></span></span>Oxymat</label>
							</li>
							<li>
								<input type="checkbox" value="vanelas" id="check4" class="common_selector fabric">
								<label for="check4"><span><span></span></span>Vanelas</label>
							</li>
							<li>
								<input type="checkbox" value="testing" id="check5" class="common_selector fabric">
								<label for="check5"><span><span></span></span>Pagini</label>
							</li>
							<li>
								<input type="checkbox" value="test" id="check6" class="common_selector fabric">
								<label for="check6"><span><span></span></span>Monark</label>
							</li>
						</ul>
					</div> -->
					<!--End Fabric commented-->
					<!--Popular Products-->


					<!--End Popular Products-->
					<!--Banner-->
					<div class="sidebar_widget static-banner">
						<a href="#"><img src="assets/images/collection-side-banner.png" alt=""></a>
					</div>
					<!--Banner-->


				</div>
			</div>
			<!--End Sidebar-->
			<!--Main Content-->
			<div class="col-12 col-sm-12 col-md-9 col-lg-9 main-col">
				<!--Toolbar-->
				<button type="button" class="btn btn-filter d-block d-md-none d-lg-none"> Product Filters</button>
				<div class="toolbar">
					<div class="filters-toolbar-wrapper">
						<div class="row">

							<div class="col-6 col-md-6 col-lg-6 text-left filters-toolbar__item filters-toolbar__item--count d-flex  align-items-center">
								<span class="filters-toolbar__product-count">Showing: <?php echo $data['totalCount']; ?> Results</span>
							</div>
							<div class="col-6 col-md-6 col-lg-6 text-right">
								<div class="filters-toolbar__item">
									<label for="SortBy" class="hidden">Sort</label>
									<select name="SortBy" id="SortBy" class="filters-toolbar__input filters-toolbar__input--sort">
										<option value="" selected="selected">Sort</option>
										<!-- <option>Best Selling</option> -->
										<option value="name_a_z">Alphabetically, A-Z</option>
										<option value="name_z_a">Alphabetically, Z-A</option>
										<option value="price_low_high">Price, low to high</option>
										<option value="price_high_low">Price, high to low</option>
										<!-- <option>Date, new to old</option> -->
										<!-- <option>Date, old to new</option> -->
									</select>
									<input class="collection-header__default-sort" type="hidden" value="manual">
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--End Toolbar-->
				<!--Product Grid-->
				<div class="">
					<div class="grid-products grid--view-items">
						<div id="productListData" class="row">
							<?php foreach ($data['list'] as $key => $product) : ?>
								<div class="col-6 col-sm-6 col-md-3 col-lg-3 item">
									<div class="product-image">
										<a href="<?php echo URLROOT; ?>/product/productdetail/<?php echo $product->product_id; ?>" class="product-img">
											<img class="primary blur-up lazyload" data-src="<?php echo URLROOT . $product->images; ?>" src="<?php echo URLROOT . $product->images; ?>" alt="<?php echo $product->product_name; ?>" title="<?php echo $product->product_name; ?>">
											<!-- Hover image -->
											<img class="hover blur-up lazyload" data-src="<?php echo URLROOT . $product->images; ?>" src="<?php echo URLROOT . $product->images; ?>" alt="<?php echo $product->product_name; ?>" title="<?php echo $product->product_name; ?>">
										</a>

										<!--Product Button-->
										<div class="button-set style1">
											<ul>
												<li>
													<!--Cart Button-->
													<form class="add" action="cart-variant1.html" method="post">
														<button class="btn-icon btn btn-addto-cart wishlist-cart" type="button" tabindex="0" data-id="<?php echo $product->product_id; ?>">
															<i class="icon anm anm-heart-l"></i>
															<span class="tooltip-label">Add to Wishlist</span>
															Test
														</button>
													</form>
													<!--end Cart Button-->
												</li>

											</ul>
										</div>
										<!--End Product Button-->
									</div>
									<!-- end product image -->
									<!--start product details -->
									<div class="product-details text-center">
										<!-- product name -->
										<div class="product-name">
											<a href="<?php echo URLROOT; ?>/product/productdetail/<?php echo $product->product_id; ?>"><?php echo $product->product_name; ?></a>
										</div>
										<!-- End product name -->
										<!-- product price -->
										<div class="product-price">
											<span class="price">₹<?php echo $product->discount_price; ?></span>
										</div>
									</div>
									<!-- End product details -->
								</div>
							<?php endforeach; ?>


						</div>
						<!--End Product Grid-->

					</div>
				</div>
				<!--End Main Content-->
			</div>

		</div>
		<!--End Body Container-->

	</div>
	<!--End Page Wrapper-->




	<?php require APPROOT . '/views/inc/footer.php'; ?>