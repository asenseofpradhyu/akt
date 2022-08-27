
// var global_link = 'http://akt.welovecoders.com/';
var global_link = 'http://localhost/akt_backend';
// var global_link = window.location.hostname;
$(document).ready(function () {

    var catTest;

    // Add to Wishlist AJAX
    $(".wishlist-cart").on('click', function (evt) {
        var product_id = $(this).attr('data-id');
        var $this = $(this);

        $.ajax({
            type: "POST",
            url: `${global_link}/app/ajaxmethod.php`,
            data: ({ product_id: product_id, method: 'addToWishlist' }),
            success: function (data) {

                var filterData = data
                filterData = filterData.substring(0, filterData.indexOf('<'))

                if (filterData == 0) {
                    window.location.href = `${global_link}/users/login`;
                    console.log("First " + filterData);
                } else if (filterData == 2) {
                    console.log("Inserted " + filterData);
                    $this.html(`<i class="icon anm anm-heart-l"></i>
                    <span class="tooltip-label">In Wishlist</span>
                    In Wishlist`);
                    wishlistCount();
                } else {
                    console.log("Deleted" + filterData);
                    $this.html(`<i class="icon anm anm-heart-l"></i>
                    <span class="tooltip-label">Add to Cart</span>
                    Add to Wishlist`);
                    wishlistCount();
                }

            },
            error: function (err) {
                console.log(err);
            }
        });
    });


    // Wishlist Count AJAX
    function wishlistCount() {
        $.ajax({
            type: "POST",
            url: `${global_link}/app/ajaxmethod.php`,
            data: ({ method: 'wishlistCount' }),
            success: function (data) {

                var filterData = data
                filterData = filterData.substring(0, filterData.indexOf('<'));
                $('#wishlistCount').text(JSON.parse(filterData));

            },
            error: function (err) {
                console.log(err);
            }
        });

    }

    // Cart Count AJAX
    function cartCount() {
        $.ajax({
            type: "POST",
            url: `${global_link}/app/ajaxmethod.php`,
            data: ({ method: 'cartCount' }),
            success: function (data) {

                var filterData = data
                filterData = filterData.substring(0, filterData.indexOf('<'));
                $('#cartCount').text(JSON.parse(filterData));
                // console.log(filterData);

            },
            error: function (err) {
                console.log(err);
            }
        });

    }



    // Add to Cart AJAX
    $(".addToCart").on('click', function (evt) {
        var product_id = $('.wishlist-cart').attr('data-id');
        var quantity = $('#Quantity').val();
        var size = $('input[name="productSize"]:checked').val();
        var color = $('input[name="productColor"]:checked').val();
        var $this = $(this);


        $.ajax({
            type: "POST",
            url: '../../app/ajaxmethod.php',
            data: ({ product_id: product_id, quantity: quantity, color: color, size: size, method: 'addToCart' }),
            success: function (data) {

                var filterData = data
                filterData = filterData.substring(0, filterData.indexOf('<'))
                // debugger;
                if (JSON.parse(filterData) == 0) {
                    window.location.href = `${global_link}/users/login`;
                    console.log("First " + filterData);
                } else if (JSON.parse(filterData) == 2 || JSON.parse(filterData) == 1) {
                    console.log("Inserted " + filterData);
                    // $this.html(`<i class="icon anm anm-heart-l"></i>
                    // <span class="tooltip-label">In Wishlist</span>
                    // In Wishlist`);
                    // wishlistCount();
                    cartCount();
                }

            },
            error: function (err) {
                console.log(err);
            }
        });
    });


    // Delete Cart AJAX
    $(".cart__remove").on('click', function (evt) {
        var cart_id = $(this).attr('data-cart_id');
        var $this = $(this);

        $.ajax({
            type: "POST",
            url: `${global_link}/app/ajaxmethod.php`,
            data: ({ cart_id: cart_id, method: 'deleteCart' }),
            success: function (data) {

                var filterData = data
                filterData = filterData.substring(0, filterData.indexOf('<'))
                console.log(filterData);
                if (filterData == 1) {
                    location.reload(true);
                }

            },
            error: function (err) {
                console.log(err);
            }
        });
    });

    // Delete Wishlist AJAX
    $(".wish__remove").on('click', function (evt) {
        var product_id = $(this).attr('data-id');
        var $this = $(this);

        $.ajax({
            type: "POST",
            url: `${global_link}/app/ajaxmethod.php`,
            data: ({ product_id: product_id, method: 'deleteWish' }),
            success: function (data) {

                var filterData = data
                filterData = filterData.substring(0, filterData.indexOf('<'));
                // console.log(filterData);
                if (filterData == 1) {
                    location.reload(true);
                }

            },
            error: function (err) {
                console.log(err);
            }
        });
    });


    // Color - Show product AJAX
    $("#blank").on('click', function (evt) {
        console.log("Test");
        var color_id = $('input[name="productColor"]:checked').val();
        var product_id = $('.wishlist-cart').attr('data-id');
        var $this = $(this);
        // console.log(color_id );
        $.ajax({
            type: "POST",
            url: `${global_link}/app/ajaxmethod.php`,
            data: ({ product_id: product_id, color_id: color_id, method: 'colorProductImg' }),
            success: function (data) {

                var filterData = data
                filterData = filterData.substring(0, filterData.indexOf('<'));
                // console.log(filterData);
                var jsonData = JSON.parse(filterData);
                $("#gallery").empty();
                $("#galaxylightbox").empty();

                for (var i = 0; i < jsonData.length; i++) {

                    var dropVal = jsonData[i].split(',');

                    $("#gallery").append(`
             <a data-image="${global_link}${dropVal[0]}" data-zoom-image="${global_link}${dropVal[0]}" class="slick-slide slick-cloned" data-slick-index="-4" aria-hidden="true" tabindex="-1">
                <img class="blur-up lazyload" data-src="${global_link}${dropVal[0]}" src="${global_link}${dropVal[0]}" alt="" />
             </a>
             `);

                    $("#galaxylightbox").append(`
             <a href="${global_link}${dropVal[0]}" data-size="1000x1280"></a>
             `);

                }
            },
            error: function (err) {
                console.log(err);
            }
        });
    });

    // FilterData 
    function filter_data() {
        var url = getstringPart();
        // $('.filter_data').html('<div id="loading" style="" ></div>');
        var suffix = window.location.pathname.match(/\d+/);
        var action = 'getFilterProductList' + (url != '') ? '?' + url : '';
        var minimum_price = $('#hidden_minimum_price').val();
        var maximum_price = $('#hidden_maximum_price').val();
        var color = get_filter('colorID');
        var fabric = get_filter('fabric');
        var sizeID = get_filter('sizeID');
        var subCatid = catTest;
        var sortBy = $('#SortBy').val();

        console.log("Max:- " + maximum_price + " Min:-" + minimum_price + " color:-" + color + " fabric:-" + fabric + " size" + sizeID);

        $.ajax({
            url: `${global_link}/Product/filterProducts`,
            method: "POST",
            data: {
                // method: action,
                subCatid: subCatid,
                minimum_price: minimum_price,
                maximum_price: maximum_price,
                color: color,
                fabric: fabric,
                sizeID: sizeID,
                sortBy: sortBy
            },
            success: function (data) {

                var filterData = data;
                // filterData = filterData.substring(0, filterData.indexOf('<'));
                // $('.filter_data').html(data);
                var jsonData = JSON.parse(filterData);
                console.log(jsonData);
                $("#productListData").empty();

                if (jsonData.length == 0) {
                    $("#productListData").append("No Product Found");
                }

                for (var i = 0; i < jsonData.length; i++) {

                    var dropVal = jsonData[i];

                    $("#productListData").append(`
                    <div class="col-6 col-sm-6 col-md-3 col-lg-3 item">
                        <div class="product-image">
                        <a href="${global_link}/product/productdetail/${dropVal.product_id}" class="product-img">
                        <img class="primary blur-up lazyload" data-src="${global_link}${dropVal.images}" src="${global_link}${dropVal.images} alt="${dropVal.product_name}" title="${dropVal.product_name}">
                        <!-- Hover image -->
                        <img class="hover blur-up lazyload" data-src="${global_link}${dropVal.images}" src="${global_link}${dropVal.images}" alt="${dropVal.product_name}" title="${dropVal.product_name}">
                        </a>

                        <!--Product Button-->
                        <div class="button-set style1">
                            <ul>
                                <li>
                                    <!--Cart Button-->
                                    <form class="add" action="cart-variant1.html" method="post">
                                        <button class="btn-icon btn btn-addto-cart wishlist-cart" type="button" tabindex="0" data-id="${dropVal.product_id}">
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
                            <a href="${global_link}/product/productdetail/${dropVal.product_id}">${dropVal.product_name}</a>
                        </div>
                        <!-- End product name -->
                        <!-- product price -->
                        <div class="product-price">
                            <span class="price">₹${dropVal.discount_price}</span>
                        </div>
                    </div>
                    <!-- End product details -->
                </div>
                 `);
                }
                $('.filters-toolbar__product-count').text('Showing ' + jsonData.length + ' results');


            }
        });
    }


    function get_filter(class_name) {
        var filter = [];
        $('.' + class_name + ':checked').each(function () {
            filter.push($(this).val());
        });
        return filter;
    }


    $('.common_selector').click(function () {
        filter_data();
    });

    $('#SortBy').change(function (e) { 
        e.preventDefault();
        filter_data();
    });

    function price_slider() {
        $("#slider-range").slider({
            range: true,
            min: 0,
            max: 5000,
            values: [0, 100],
            step: 100,
            slide: function (event, ui) {
                $("#amount").val("₹" + ui.values[0] + " - ₹" + ui.values[1]);
                // filter_data();
            },
            stop: function (event, ui) {

                // $('#price_show').html(ui.values[0] + ' - ' + ui.values[1]);
                $('#hidden_minimum_price').val(ui.values[0]);
                $('#hidden_maximum_price').val(ui.values[1]);
                filter_data();
            }
        });


        $("#amount").val("₹" + $("#slider-range").slider("values", 0) +
            " - ₹" + $("#slider-range").slider("values", 1));
    }


    const urlParams = new URLSearchParams(window.location.search);
    // const myParam = urlParams.get('productlist');
    const myParam = window.location.protocol + "//" + window.location.host + "/" + window.location.pathname + window.location.search;
    var test = myParam.split("/");
    for (var i = 0; i < test.length; i++) {
        if (test[i] == 'productlist') {
            catTest = test[i + 1];
            filter_data();
        }
    }



    //  Function call when Page Loads
    wishlistCount();
    cartCount();
    price_slider();
    // filter_data();
});

function changeSearchUrl(id) {
    $('#rgsearch-category').attr('action', global_link + '/product/productlist/' + id);
}

function getstringPart() {
    query = window.location.href;
    query = query.split('?')[1];
    return query;
}

$('#apply_coupon').click(function (e) {
    e.preventDefault();
    coupon_code = $('#coupon_code').val();
    grandTotal  = $('#grand_total').val();
    $.ajax({
        type: "GET",
        url: `${global_link}/Coupon/checkApplyCoupon`,
        data: { method: 'applyCouponCode', coupon_code: coupon_code, grandTotal: grandTotal },
        dataType: 'JSON',
        success: function (response) {
            if(response.status == 1){
                $('#coupon_id').val(response.coupon_code.id);
                $('#grand_total_txt').text(response.total_amount.toFixed(2) + '( Discount: '+ response.discount + '%)');
                $('#grand_total').val(response.total_amount.toFixed(2));
                alert('coupon applied');
            }else{
                alert('coupons can not be used not exist');
            }
        }
    });
});

function removeCrap(data) { 
    var filterData = data
    filterData = filterData.substring(0, filterData.indexOf('<'));
    return filterData;
 }

function submitCartForm(){
    $('#cartForm').submit();
}

function displayUserOrders(){
    $.ajax({
        type: "get",
        url: `${global_link}/orders/getUserOrders`,
        data: {},
        dataType: "JSON",
        success: function (response) {
            html ='';
            if(response.orders.length > 0){
                $.each(response.orders, function (index, value) {
                    html += `<tr>
                    <td>${value.product_name}</td>
                    <td>${value.color}</td>
                    <td>${value.size}</td>
                    <td>${value.quantity}</td>
                    <td>${value.purchase_date}</td>
                    </tr>`;
                });
            }else{
                html += `<tr>
                <td colspan="5">No Order Found</td>
                </tr>`;
            }
            $('#userOrdersRows').html(html);
        }
    });
}

function getColorsAndStock(element) {
    let size_id = $(element).data('id');
    let product_id = $('#product_id').val();
    $.ajax({
        type: "POST",
        url: `${global_link}/product/getColorsAndStock`,
        data: { product_id: product_id, size_id: size_id },
        dataType: "JSON",
        success: function (response) {
            html = '';
            if (response.colors.length > 0) {
                $.each(response.colors, function (index, value) {
                    html += `<div class="swatch-element color"  onclick="updateStockInfo(this)" data-stock="${value.stock}">
                        <input class="swatchInput productDetailColor" id="swatch-${value.color}" data-id="" type="radio" name="productColor" value="${value.color_id}">
                        <label class="swatchLbl" for="swatch-${value.color}" title="${value.color}">${value.color}</label>
                    </div>`;
                });
            } else {
                html += `<div class="swatch-element color">
                <input class="swatchInput productDetailColor" id="swatch-no-data" data-id="" type="radio" name="productColor" value="">
                <label class="swatchLbl" for="swatch-no-data" title="no-data">No colors Found</label>
            </div>`;
            }
            $('#color_div').html(html);
            html = '';
        }
    });
}

function updateStockInfo(element) {
    $('.instock').text('');
    $('.outstock').text('');
    let stock = $(element).data('stock');
    if (stock > 0) {
        if(stock > 5){
            $('.instock').text('In Stock');
        }else{
            $('.instock').text('Hurry!! Only '+stock+' left in stock');
        }
    } else {
        $('.outstock').text('Out of Stock');
    }
}