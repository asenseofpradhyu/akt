<?php require APPROOT . '/views/inc/header.php'; ?>
<div id="page-content">
    <!--Body Container-->
    <!--Breadcrumbs-->
    <div class="breadcrumbs-wrapper">
        <div class="container">
            <div class="breadcrumbs"><a href="<?php echo URLROOT; ?>" title="Back to the home page">Home</a>
                <span aria-hidden="true">|</span> <span><?php echo $data['detail']->product_name; ?></span></div>
            <input type="hidden" id="product_id" value="<?php echo $data['detail']->product_id; ?>">
        </div>
    </div>
    <div class="container">
        <div class="product-detail-container product-single-style3">
            <div class="product-single">
                <div class="row">

                    <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="product-sticky-style">
                            <!--  -->
                            <div class="product-details-img product-horizontal-style">
                                <div class="zoompro-wrap product-zoom-right pl-20">
                                    <div class="zoompro-span">
                                        <img id="zoompro" class="zoompro prlightbox" src="<?php echo URLROOT; ?><?php echo $data['singleimg']->images; ?>" data-zoom-image="<?php echo URLROOT; ?><?php echo $data['singleimg']->images; ?>" alt="" />
                                    </div>
                                    <div class="product-labels"><span class="lbl pr-label1">new</span></div>
                                    <div class="product-buttons">

                                        <a href="#" class="btn prlightbox" title="Zoom">
                                            <i class="icon anm anm-expand-l-arrows" aria-hidden="true"></i>
                                            <span class="tooltip-label">Zoom Image</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="product-thumb product-horizontal-thumb">
                                    <div id="gallery" class="product-thumb-style1">
                                        <?php foreach ($data['images'] as $nav) : ?>
                                            <a data-image="<?php echo URLROOT; ?><?php echo $nav->images; ?>" data-zoom-image="<?php echo URLROOT; ?><?php echo $nav->images; ?>" class="slick-slide slick-cloned" data-slick-index="-4" aria-hidden="true" tabindex="-1">
                                                <img class="blur-up lazyload" data-src="<?php echo URLROOT; ?><?php echo $nav->images; ?>" src="<?php echo URLROOT; ?><?php echo $nav->images; ?>" alt="" />
                                            </a>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                                <div id="galaxylightbox" class="lightboximages">
                                    <?php foreach ($data['images'] as $nav) : ?>
                                        <a href="<?php echo URLROOT; ?><?php echo $nav->images; ?>" data-size="1000x1280"></a>
                                    <?php endforeach; ?>
                                </div>
                                <div class="social-sharing">
                                    <span class="label">Share:</span>
                                    <a target="_blank" href="#" class="btn btn--small btn--secondary btn--share share-facebook" title="Share on Facebook">
                                        <i class="anm anm-facebook-f" aria-hidden="true"></i> <span class="share-title" aria-hidden="true">Share</span>
                                    </a>
                                    <a target="_blank" href="#" class="btn btn--small btn--secondary btn--share share-twitter" title="Tweet on Twitter">
                                        <i class="fa fa-twitter" aria-hidden="true"></i> <span class="share-title" aria-hidden="true">Tweet</span>
                                    </a>
                                    <a href="#" title="Share on google+" class="btn btn--small btn--secondary btn--share">
                                        <i class="fa fa-google-plus" aria-hidden="true"></i> <span class="share-title" aria-hidden="true">Google+</span>
                                    </a>
                                    <a target="_blank" href="#" class="btn btn--small btn--secondary btn--share share-pinterest" title="Pin on Pinterest">
                                        <i class="fa fa-pinterest" aria-hidden="true"></i> <span class="share-title" aria-hidden="true">Pin it</span>
                                    </a>
                                    <a href="#" class="btn btn--small btn--secondary btn--share share-pinterest" title="Share by Email" target="_blank">
                                        <i class="fa fa-envelope" aria-hidden="true"></i> <span class="share-title" aria-hidden="true">Email</span>
                                    </a>
                                </div>
                            </div>
                            <!--  -->
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="product-single__meta">
                            <h1 class="product-single__title"><?php echo $data['detail']->product_name; ?></h1>
                            <div class="prInfoRow">

                                <div class="product-sku">AKT: <span class="variant-sku"><?php echo $data['detail']->product_code; ?></span></div>
                                <div class="product-stock">
                                    <span class="instock ">
                                        <?php if ($data['detail']->stock > 5) {
                                            echo "In Stock";
                                        } else {
                                            echo "Hurry !! Only " . $data['detail']->stock . " Left";
                                        } ?>
                                    </span>
                                    <span class="outstock">
                                        <?php if ($data['detail']->stock == 0) {
                                            echo "Unavailable";
                                        } ?>
                                    </span>
                                </div>
                            </div>
                            <p class="product-single__price product-single__price-product-template">
                                <span class="visually-hidden">Regular price</span>
                                <s id="ComparePrice-product-template"><span class="money"><?php echo "₹" . $data['detail']->total_price; ?></span></s>
                                <span class="product-price__price product-price__price-product-template product-price__sale product-price__sale--single">
                                    <span id="ProductPrice-product-template"><span class="money"><?php echo "₹" . $data['detail']->discount_price; ?></span></span>
                                </span>
                            </p>
                        </div>

                        <div class="product-single__description rte">
                            <?php echo $data['detail']->product_desc; ?>
                        </div>
                        <form method="post" action="" class="product-form product-form-product-template hidedropdown">
                            <div class="swatch clearfix swatch-1 option2" data-option-index="1">
                                <div class="product-form__item">
                                    <label class="label">Size:<span class="required">*</span> <span class="slVariant">XS</span> </label>
                                    <div data-value="XS" class="swatch-element xs available">
                                        <input class="swatchInput productSize" id="swatch-1-xs" type="radio" name="productSize" value="1">
                                        <label class="swatchLbl medium" for="swatch-1-xs" title="XS">XS</label>
                                    </div>
                                    <div data-value="S" class="swatch-element s available">
                                        <input class="swatchInput productSize" id="swatch-1-s" type="radio" name="productSize" value="2">
                                        <label class="swatchLbl medium" for="swatch-1-s" title="S">S</label>
                                    </div>
                                    <div data-value="M" class="swatch-element m available">
                                        <input class="swatchInput productSize" id="swatch-1-m" type="radio" name="productSize" value="3">
                                        <label class="swatchLbl medium" for="swatch-1-m" title="M">M</label>
                                    </div>
                                    <div data-value="L" class="swatch-element l available">
                                        <input class="swatchInput productSize" id="swatch-1-l" type="radio" name="productSize" value="4">
                                        <label class="swatchLbl medium" for="swatch-1-l" title="L">L</label>
                                    </div>
                                    <div data-value="XL" class="swatch-element xl available">
                                        <input class="swatchInput productSize" id="swatch-1-xl" type="radio" name="productSize" value="5">
                                        <label class="swatchLbl medium" for="swatch-1-xl" title="XL">XL</label>
                                    </div>
                                </div>
                            </div>

                            <div class="swatch clearfix swatch-0 option1">
                                <div class="product-form__item">
                                    <label class="label">Color:<span class="required">*</span> <span class="slVariant"></span></label>
                                    <?php foreach ($data['color'] as $nav) : ?>
                                        <div class="swatch-element color">
                                            <input class="swatchInput productDetailColor" id="swatch-<?php echo $nav->color; ?>" data-id="" type="radio" name="productColor" value="<?php echo $nav->color_id; ?>">
                                            <label class="swatchLbl" for="swatch-<?php echo $nav->color; ?>" title="<?php echo $nav->color; ?>"><?php echo $nav->color; ?></label>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>

                            <p class="infolinks">
                                <!-- <a class="wishlist add-to-wishlist wishlist-cart" title="Add to Wishlist"><i class="icon anm anm-heart-l" aria-hidden="true"></i> <span>Add to Wishlist</span></a> -->
                                <button class="btn-icon btn btn-addto-cart wishlist-cart" type="button" tabindex="0" data-id="<?php echo $data['detail']->product_id; ?>">
                                    <i class="icon anm anm-heart-l"></i>
                                    <span class="tooltip-label">Add to Wishlist</span>
                                    Add to Wishlist
                                </button>
                                <a href="#ShippingInfo" class="mfp btn shippingInfo"><i class="anm anm-paper-l-plane"></i> Delivery &amp; Returns</a>
                            </p>
                            <!-- Product Action -->
                            <div class="product-action clearfix">
                                <div class="product-form__item--quantity">
                                    <div class="wrapQtyBtn">
                                        <div class="qtyField">
                                            <a class="qtyBtn minus" href="javascript:void(0);"><i class="fa anm anm-minus-r" aria-hidden="true"></i></a>
                                            <input type="text" id="Quantity" name="quantity" value="1" class="product-form__input qty" max="10" min="1">
                                            <a class="qtyBtn plus" href="javascript:void(0);"><i class="fa anm anm-plus-r" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-form__item--submit">
                                    <button type="button" name="add" class="btn product-form__cart-submit addToCart">
                                        <span>Add to cart</span>
                                    </button>
                                </div>
                            </div>
                            <!-- End Product Action -->
                        </form>

                        <div class="d-flex storeFeatures">
                            <p><i class="anm anm-truck-l"></i> Free Shipping &amp; Return</p>
                            <p><i class="anm anm-sync-ar"></i> Money back guarantee</p>
                            <p><i class="anm anm-thumbs-up-l"></i> Fast &amp; reliable support</p>
                        </div>
                        <!--Product Accordian-->
                        <div class="tabs-listing tab-accordian-style">
                            <div class="tab-container">
                                <h3 class="acor-ttl active" rel="tab1">Product Features</h3>
                                <div id="tab1" class="tab-content">
                                    <div class="product-description rte">
                                        <div class="row">
                                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 mb-4">
                                                <h3>FEATURES</h3>
                                                <ul>
                                                    <li>Color: <?php echo $data['detail']->color; ?></li>
                                                    <li>Fabric: <?php echo $data['detail']->fabric; ?></li>
                                                    <li>Garment Type: <?php echo $data['detail']->garment; ?></li>
                                                    <li>Neck: <?php echo $data['detail']->neck; ?></li>
                                                    <li>Length: <?php echo $data['detail']->length; ?></li>
                                                    <li> Occasion: <?php echo $data['detail']->occasion; ?></li>
                                                    <li> Design Type: <?php echo $data['detail']->design_type; ?></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h3 class="acor-ttl" rel="tab2">DETAILS</h3>
                                <div id="tab2" class="tab-content">
                                    <div class="row">
                                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 mb-4">

                                            <div class="spr-reviews">
                                                <div class="review-inner">
                                                    <div class="spr-review">

                                                        <div class="spr-review-content">
                                                            <p class="spr-review-content-body">The Product Price is inclusive of: <?php echo $data['detail']->d_inclusive; ?></p>
                                                        </div>
                                                    </div>
                                                    <div class="spr-review">

                                                        <div class="spr-review-content">
                                                            <p class="spr-review-content-body">The Product Price is not Inclusive of: <?php echo $data['detail']->d_not_inclusive; ?></p>
                                                        </div>
                                                    </div>
                                                    <div class="spr-review">

                                                        <div class="spr-review-content">
                                                            <p class="spr-review-content-body">Style Tip: <?php echo $data['detail']->style_tip; ?></p>
                                                        </div>
                                                    </div>
                                                    <div class="spr-review">

                                                        <div class="spr-review-content">
                                                            <p class="spr-review-content-body">Care: <?php echo $data['detail']->care; ?></p>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h3 class="acor-ttl" rel="tab3">Size Chart</h3>
                                <div id="tab3" class="tab-content">
                                    <h3>Women's Body Sizing Chart</h3>
                                    <table>
                                        <tbody>
                                            <tr>
                                                <th>Size</th>
                                                <th>XS</th>
                                                <th>S</th>
                                                <th>M</th>
                                                <th>L</th>
                                                <th>XL</th>
                                            </tr>
                                            <tr>
                                                <td>Chest</td>
                                                <td>31" - 33"</td>
                                                <td>33" - 35"</td>
                                                <td>35" - 37"</td>
                                                <td>37" - 39"</td>
                                                <td>39" - 42"</td>
                                            </tr>
                                            <tr>
                                                <td>Waist</td>
                                                <td>24" - 26"</td>
                                                <td>26" - 28"</td>
                                                <td>28" - 30"</td>
                                                <td>30" - 32"</td>
                                                <td>32" - 35"</td>
                                            </tr>
                                            <tr>
                                                <td>Hip</td>
                                                <td>34" - 36"</td>
                                                <td>36" - 38"</td>
                                                <td>38" - 40"</td>
                                                <td>40" - 42"</td>
                                                <td>42" - 44"</td>
                                            </tr>
                                            <tr>
                                                <td>Regular inseam</td>
                                                <td>30"</td>
                                                <td>30½"</td>
                                                <td>31"</td>
                                                <td>31½"</td>
                                                <td>32"</td>
                                            </tr>
                                            <tr>
                                                <td>Long (Tall) Inseam</td>
                                                <td>31½"</td>
                                                <td>32"</td>
                                                <td>32½"</td>
                                                <td>33"</td>
                                                <td>33½"</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <h3 class="acor-ttl" rel="tab4">DESCRIPTION</h3>
                                <div id="tab4" class="tab-content">

                                    <p><?php echo $data['detail']->product_desc; ?></p>

                                </div>
                            </div>
                        </div>
                        <!--End Product Accordian-->
                    </div>
                </div>
                <!--Recently Product Slider-->
                <div class="related-product grid-products">
                    <div class="section-header">
                        <h2 class="section-header__title text-center h2"><span>SIMILAR PRODUCTS</span></h2>
                    </div>
                    <div class="productPageSlider">
                        <?php foreach ($data['similar_product'] as $key => $sp_array) : ?>
                            <div class="col-12 item">
                                <!-- start product image -->
                                <div class="product-image">
                                    <!-- start product image -->
                                    <a href="<?php echo URLROOT; ?>/product/productdetail/<?php echo $sp_array->product_id; ?>" class="product-img">
                                        <!-- image -->
                                        <?php $images = json_decode($sp_array->images, true); ?>
                                        <img class="primary blur-up lazyload" data-src="<?php echo URLROOT . $images[0]['image']; ?>" src="<?php echo URLROOT . $images[0]['image']; ?>" alt="image" title="product">
                                        <!-- End image -->
                                        <!-- Hover image -->
                                        <img class="hover blur-up lazyload" data-src="<?php echo URLROOT . $images[1]['image']; ?>" src="<?php echo URLROOT . $images[1]['image']; ?>" alt="image" title="product">
                                        <!-- End hover image -->
                                    </a>
                                    <!-- end product image -->
                                </div>
                                <!-- end product image -->
                                <!--start product details -->
                                <div class="product-details text-center">
                                    <!-- product name -->
                                    <div class="product-name">
                                        <a href="product-layout1.html"><?php echo $sp_array->product_name; ?></a>
                                    </div>
                                    <!-- End product name -->
                                    <!-- product price -->
                                    <div class="product-price">
                                        <span class="price"><?php echo $sp_array->total_price; ?></span>
                                    </div>
                                    <!-- End product price -->
                                </div>
                                <!-- End product details -->
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <!--End Recently Product Slider-->

            </div>
            <!--End Body Container-->

        </div>
    </div>

</div>
<!--End Body Container-->

</div>
<!--End Page Wrapper-->

<?php require APPROOT . '/views/inc/footer.php'; ?>