    <!--Header-->
    <header class="header animated d-flex align-items-center header-1">
      <div class="container">
        <div class="row">
          <!--Mobile Icons-->
          <div class="col-4 col-sm-4 col-md-4 d-block d-lg-none mobile-icons">
            <!--Mobile Toggle-->
            <button type="button" class="btn--link site-header__menu js-mobile-nav-toggle mobile-nav--open"> <i class="icon anm anm-times-l"></i> <i class="anm anm-bars-r"></i> </button>
            <!--End Mobile Toggle-->
            <!--Search-->
            <div class="site-search iconset"> <i class="icon anm anm-search-l"></i> </div>
            <!--End Search-->
          </div>
          <!--Mobile Icons-->
          <!--Desktop Logo-->
          <div class="logo col-4 col-sm-4 col-md-4 col-lg-2 align-self-center"> <a href="<?php echo URLROOT; ?>"> <img src="<?php echo URLROOT; ?>/images/avon-logo.svg" alt="" title="" /> </a> </div>
          <!--End Desktop Logo-->
          <div class="col-1 col-sm-1 col-md-1 col-lg-8 align-self-center d-menu-col">
            <!--Desktop Menu-->
            <nav class="grid__item" id="AccessibleNav">
              <ul id="siteNav" class="site-nav medium center hidearrow">
                <?php $menu = new megamenu(); ?>
                <?php foreach ($data['main_menu']['results'] as $post) : ?>
                  <li class="lvl1 parent megamenu"><a href="#"><?php echo $post->main_menu_name; ?> <i class="anm anm-angle-down-l"></i></a>
                    <div class="megamenu style4">
                      <div class="row">
                        <ul class="grid grid--uniform mmWrapper col-md-9">
                          <?php echo $menu->getMainLink($post->main_menu_id); ?>
                        </ul>
                        <div class="col-md-3">
                          <a href="#;"><img src="<?php echo URLROOT; ?>"> <img src="<?php echo URLROOT; ?>/assets/images/shop_manu2.jpg" data-src="<?php echo URLROOT; ?>"> <img src="<?php echo URLROOT; ?>/assets/images/shop_manu2.jpg" alt=""></a>
                        </div>
                      </div>
                    </div>
                  </li>
                <?php endforeach; ?>
              </ul>
            </nav>
            <!--End Desktop Menu-->
          </div>
          <div class="col-4 col-sm-4 col-md-4 col-lg-2 align-self-center icons-col text-right">
            <!--Search-->
            <div class="site-search iconset"> <i class="icon anm anm-search-l"></i> </div>
            <div class="search-drawer">
              <div class="container"> <span class="closeSearch anm anm-times-l"></span>
                <h3 class="title">What are you looking for?</h3>
                <div class="block block-search">
                  <div class="block block-content">
                    <form class="form minisearch" id="header-search" action="<?php echo URLROOT; ?>/product/productlist/0" method="get">
                      <label for="search" class="label"><span>Search</span></label>
                      <div class="control">
                        <div class="searchField">
                          <div class="search-category">
                            <select id="rgsearch-category" name="product_category_id" onchange="changeSearchUrl(this.value);">
                              <option value="0">All Categories</option>
                              <!-- <option value="4">Shop</option>
                              <option value="6">- All</option>
                              <option value="8">- Men</option>
                              <option value="10">- Women</option>
                              <option value="12">- Shoes</option>
                              <option value="14">- Blouses</option>
                              <option value="16">- Pullovers</option>
                              <option value="18">- Bags</option>
                              <option value="20">- Accessories</option> -->
                              <?php foreach ($data['main_menu']['search_categories'] as $key => $category) : ?>
                                <option value="<?php echo $category->sub_menu_id; ?>"><?php echo $category->sub_menu_name; ?></option>
                              <?php endforeach; ?>
                            </select>
                          </div>
                          <div class="input-box">
                            <input id="search" type="text" name="search_query" value="" placeholder="Search for products, brands..." class="input-text">
                            <button type="submit" title="Search" class="action search"><i class="icon anm anm-search-l"></i></button>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <!--End Search-->
            <!--Setting Dropdown-->
            <div class="setting-link iconset"> <i class="icon icon-settings"></i> </div>
            <div id="settingsBox">
              <div class="customer-links">
                <?php
                if (!isset($_SESSION['customer_name'])) {

                  echo "<p><a href='" . URLROOT . "/users/login' class='btn'>Login</a></p>";
                  echo "<p class='text-center'>New User <a href='" . URLROOT . "/users/register' class='register'>Create an Account</a></p>";
                } else {
                  echo "<p class='text-center'><a href='" . URLROOT . "/users/myprofile' style='margin:10px 0;'>Welcome " . $_SESSION['customer_name'] . "</a></p>";
                  echo "<p><a href='" . URLROOT . "/users/logout' class='btn'>Logout</a></p>";
                }
                ?>
              </div>
            </div>
            <!--End Setting Dropdown-->
            <!--Wishlist-->
            <div class="wishlist-link iconset">
              <?php
              if (!isset($_SESSION['customer_name'])) {

                echo "<a href='" . URLROOT . "/users/login' style='color:#FEE5C6;'><i class='icon anm anm-heart-l'></i><span class='wishlist-count'>0</span></a>";
              } else {

                echo "<a href='" . URLROOT . "/users/myprofile' style='color:#FEE5C6;'><i class='icon anm anm-heart-l'></i><span id='wishlistCount' class='wishlist-count'>2</span></a>";
              }
              ?>

            </div>
            <!--End Wishlist-->
            <!--Minicart Dropdown-->
            <div class="header-cart iconset">
              <?php
              if (!isset($_SESSION['customer_name'])) {

                echo "<a href='" . URLROOT . "/users/login' style='color:#FEE5C6;'><i class='icon anm anm-bag-l'></i><span class='wishlist-count'>0</span></a>";
              } else {
                echo "<a href=" . URLROOT . "/product/cart/" . $_SESSION['customer_id'] . " class='site-header__cart'><i class='icon anm anm-bag-l'></i><span id='cartCount' class='site-cart-count'>2</span></a>";
              }

              ?>


            </div>
            <!--End Minicart Dropdown-->
          </div>
        </div>
      </div>
    </header>
    <!--End Header-->
    <!--Mobile Menu-->
    <div class="mobile-nav-wrapper" role="navigation">
      <div class="closemobileMenu"><i class="icon anm anm-times-l pull-right"></i> Close Menu</div>
      <ul id="MobileNav" class="mobile-nav">
        <li class="lvl1"><a href="<?php echo URLROOT; ?>">Home </a>
        </li>
        <?php $menu = new megamenu(); ?>
        <?php foreach ($data['main_menu']['results'] as $post) : ?>
          <li class="lvl1"><a href="#"><?php echo $post->main_menu_name; ?> <i class="anm anm-plus-l"></i></a>
            <ul>
              <?php echo $menu->getMobileLink($post->main_menu_id); ?>
            </ul>
          </li>
        <?php endforeach; ?>
      </ul>
    </div>
    <!--End Mobile Menu-->