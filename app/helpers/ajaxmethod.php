<?php
?>

<?php
function DbConnect()
{

    $con = mysqli_connect('localhost', 'admin', 'password', 'akt');

    if (mysqli_connect_errno()) {
        echo 'Failed to Connect to Database ' . mysqli_connect_errno();
    }

    return $con;
}
?>
<?php


if (isset($_REQUEST['method']) && !empty($_REQUEST['method'])) {
    // echo $_REQUEST['method'];
    $action = $_REQUEST['method'];

    switch ($action) {

        case 'addToWishlist':
            addToWishlist();
            break;

        case 'wishlistCount':
            wishlistCount();
            break;

        case 'addToCart':
            addToCart();
            break;

        case 'deleteCart':
            deleteCart();
            break;

        case 'deleteWish':
            deleteWish();
            break;

        case 'cartCount':
            cartCount();
            break;

        case 'getFilterProductList':
            getFilterProductList();
            break;

        case 'colorProductImg':
            colorProductImg();
            break;

        case 'applyCouponCode':
            applyCouponCode();
            break;
    }
}


// Add to Wishlist
function addToWishlist()
{

    $con = DbConnect();

    if (isLoggedInCustomer()) {

        $product_id = $_POST['product_id'];
        $customer_id = $_SESSION['customer_id'];
        $dataRespond = 0;

        $count = "SELECT count(wishlist_id) as cnt FROM wishlist WHERE product_id = $product_id AND customer_id = $customer_id";
        $resultData = mysqli_query($con, $count);
        $countid = mysqli_fetch_assoc($resultData);

        if ($countid['cnt'] == 1) {
            $sql = "DELETE FROM wishlist WHERE product_id = $product_id AND customer_id = $customer_id";
            $resultData = mysqli_query($con, $sql);
            $dataRespond = 1;
        } else if ($countid['cnt'] == 0) {
            $sql = "INSERT INTO wishlist VALUES(NULL, $product_id, $customer_id)";
            $resultData = mysqli_query($con, $sql);
            // mysqli_error($con);
            $dataRespond = 2;
        }
    } else {

        $dataRespond = 0;
    }

    echo json_encode($dataRespond);
    mysqli_close($con);
}

// Gets WishlistCount
function wishlistCount()
{

    $con = DbConnect();

    if (isLoggedInCustomer()) {

        $customer_id = $_SESSION['customer_id'];

        $sql = "SELECT COUNT(product_id) as cnt FROM `wishlist` WHERE customer_id = $customer_id";
        $resultData = mysqli_query($con, $sql);
        $temp = array();
        foreach ($resultData as $data) {
            if (empty($temp)) {
                $temp = array($data['cnt']);
            } else {
                array_push($temp, $data['cnt']);
            }
        }

        echo json_encode($temp);

        mysqli_close($con);
    } else {
        echo json_encode(0);

        mysqli_close($con);
    }
}

// Add to Cart
function addToCart()
{

    $con = DbConnect();

    if (isLoggedInCustomer()) {

        $product_id = $_POST['product_id'];
        $customer_id = $_SESSION['customer_id'];
        $quantity = $_POST['quantity'];
        $color = $_POST['color'];
        $size = $_POST['size'];
        $dataRespond = 0;

        $count = "SELECT count(product_id) as cnt FROM cart WHERE product_id = $product_id AND customer_id = $customer_id";
        $resultData = mysqli_query($con, $count);
        $countid = mysqli_fetch_assoc($resultData);

        if ($countid['cnt'] == 1) {
            $sql = "UPDATE cart SET qnty = $quantity, color_id=$color, size_id=$size WHERE product_id = $product_id AND customer_id = $customer_id";
            $resultData = mysqli_query($con, $sql);
            $dataRespond = 1;
        } else if ($countid['cnt'] == 0) {
            $sql = "INSERT INTO cart VALUES(NULL, $product_id, $quantity, $color, $size, $customer_id)";
            $resultData = mysqli_query($con, $sql);
            // mysqli_error($con);
            $dataRespond = 2;
        }
    } else {

        $dataRespond = 0;
    }

    echo json_encode($dataRespond);
    mysqli_close($con);
}




// Delete Cart
function deleteCart()
{

    $con = DbConnect();
    $dataRespond = 0;

    if (isLoggedInCustomer()) {

        $product_id = $_POST['product_id'];

        $sql = "DELETE FROM cart WHERE product_id = $product_id";

        if (mysqli_query($con, $sql)) {
            $dataRespond = 1;
            echo json_encode($dataRespond);
            mysqli_close($con);
        } else {
            $dataRespond = 2;
            echo json_encode($dataRespond);
            mysqli_close($con);
        }
    } else {
        $dataRespond = 0;
        echo json_encode($dataRespond);

        mysqli_close($con);
    }
}

// Delete Wish
function deleteWish()
{

    $con = DbConnect();
    $dataRespond = 0;

    if (isLoggedInCustomer()) {

        $product_id = $_POST['product_id'];

        $sql = "DELETE FROM wishlist WHERE product_id = $product_id";

        if (mysqli_query($con, $sql)) {
            $dataRespond = 1;
            echo json_encode($dataRespond);
            mysqli_close($con);
        } else {
            $dataRespond = 2;
            echo json_encode($dataRespond);
            mysqli_close($con);
        }
    } else {
        $dataRespond = 0;
        echo json_encode($dataRespond);

        mysqli_close($con);
    }
}

// Gets CartCount
function cartCount()
{

    $con = DbConnect();

    if (isLoggedInCustomer()) {

        $customer_id = $_SESSION['customer_id'];

        $sql = "SELECT COUNT(product_id) as cnt FROM `cart` WHERE customer_id = $customer_id";
        $resultData = mysqli_query($con, $sql);
        $temp = array();
        foreach ($resultData as $data) {
            if (empty($temp)) {
                $temp = array($data['cnt']);
            } else {
                array_push($temp, $data['cnt']);
            }
        }

        echo json_encode($temp);

        mysqli_close($con);
    } else {
        echo json_encode(0);

        mysqli_close($con);
    }
}

function getFilterProductList()
{

    $con = DbConnect();
    // .$_POST["subCatid"]
    $query = "SELECT image_data.images, image_data.color_id, product_detail.product_id, product_detail.product_name, product_detail.discount_price FROM product_detail INNER JOIN image_data ON image_data.product_id = product_detail.product_id WHERE product_detail.status = 1 AND product_detail.sub_menu_id = " . $_POST["subCatid"];

    if (!empty($_POST["minimum_price"]) || !empty($_POST["maximum_price"])) {
        $query .= " AND product_detail.discount_price BETWEEN " . $_POST["minimum_price"] . " AND " . $_POST["maximum_price"] . "";
    }
    if (isset($_POST["color"])) {

        $color_filter = implode(",", $_POST["color"]);
        $query .= " AND image_data.color_id IN(" . $color_filter . ")";
    }
    if (isset($_POST["size"])) {

        $size_filter = implode(",", $_POST["size"]);
        $query .= " AND product_detail.size IN(" . $size_filter . ")";
    }
    if (isset($_POST["fabric"])) {

        $fabric_filter = implode(",", $_POST["fabric"]);
        $query .= " AND product_detail.fabric IN('" . $fabric_filter . "')";
    }

    if (empty($_POST["color"])) {
        $query .= " GROUP BY image_data.product_id";
    } else {
        $query .= " GROUP BY image_data.color_id, image_data.product_id";
    }


    $resultData = mysqli_query($con, $query);
    //  print_r($resultData);
    $temp = [];
    foreach ($resultData as $data) {
        // mysqli_error($con);
        if (empty($temp)) {
            $temp = array($data['images'] . "," . $data['product_id'] . "," . $data['product_name'] . "," . $data['discount_price'] . "," . $data['color_id']);
        } else {
            array_push($temp, $data['images'] . "," . $data['product_id'] . "," . $data['product_name'] . "," . $data['discount_price'] . "," . $data['color_id']);
        }
    }
    //  print_r($query);
    //  echo "Min ".$_POST["minimum_price"]." MAx ".$_POST["maximum_price"];
    echo json_encode($temp);
}

function colorProductImg()
{
    $con = DbConnect();
    $color_id = $_POST['color_id'];
    $product_id = $_POST['product_id'];

    $sql = "SELECT images FROM image_data WHERE color_id = $color_id AND product_id = $product_id";
    $resultData = mysqli_query($con, $sql);
    $temp = array();
    foreach ($resultData as $data) {
        if (empty($temp)) {
            $temp = array($data['images']);
        } else {
            array_push($temp, $data['images']);
        }
    }

    echo json_encode($temp);

    mysqli_close($con);
}

function applyCouponCode(){
    $coupon = [];
    $con = DbConnect();
    $coupon_code = $_POST['coupon_code'];
    $query = 'SELECT * FROM coupons WHERE no_of_attempts<= no_of_used AND coupon_code = ?';
    $stmt = $con->prepare($query);
    $stmt->bind_param('s', $coupon_code);
    $result = $stmt->get_result();
    if($result->num_rows == 1){
        $coupon = $result->fetch_array();
    }
    return json_encode(['status' => 1, 'coupon_code' => $coupon]);
    // return $coupon->checkApplyCoupon($coupon_code);
}



class ProductImage
{

    public function colorProductImg($productid, $colorid)
    {
        $con = DbConnect();

        $sql = "SELECT images,image_id FROM image_data WHERE color_id = $colorid AND product_id = $productid";
        $data = mysqli_query($con, $sql);
        while ($row = mysqli_fetch_array($data)) {
            $result[] = $row;
        }
        mysqli_close($con);
        return $result;
    }

    public function colorNameByProductId($colorid)
    {
        $con = DbConnect();

        $sql = "SELECT color FROM `color` INNER JOIN image_data ON color.color_id = image_data.color_id WHERE image_data.product_id = $colorid GROUP BY image_data.color_id";
        $data = mysqli_query($con, $sql);
        while ($row = mysqli_fetch_array($data)) {
            $result[] = $row;
        }
        mysqli_close($con);
        return $result;
    }
}

class megamenu
{
    public function getMainLink($id)
    {
        $html = '';
        $con = DbConnect();
        $cat = mysqli_query($con, 'SELECT * FROM sub_menu WHERE sub_menu_links = 0 AND main_menu_id=' . $id);
        while ($row = mysqli_fetch_array($cat)) {
            $html .= '<li class="grid__item lvl-1 col-md-3 col-lg-3"><a href="#" class="site-nav lvl-1 menu-title">' . $row['sub_menu_name'] . '</a>';
            $sub_menu = mysqli_query($con, 'SELECT * FROM sub_menu WHERE parent_id = ' . $row['sub_menu_id'] . ' AND sub_menu_links= 1');
            $html .= '<ul class="subLinks">';
            while ($sub_row = mysqli_fetch_array($sub_menu)) {
                $html .= '<li class="lvl-2"><a href="' . URLROOT . '/product/productlist/' . $sub_row['sub_menu_id'] . '" class="site-nav lvl-2">' . $sub_row['sub_menu_name'] . '</a></li>';
            }
            $html .= '</ul></li>';
        }
        return $html;
    }

    public function getMobileLink($id)
    {
        $html = '';
        $con = DbConnect();
        $cat = mysqli_query($con, 'SELECT * FROM sub_menu WHERE sub_menu_links=0 AND main_menu_id=' . $id);
        while ($row = mysqli_fetch_array($cat)) {
            $html .= '<li class="lvl1 parent megamenu"><a href="#">' . $row['sub_menu_name'] . '<i class="anm anm-plus-l"></i></a>';
            $sub_menu = mysqli_query($con, 'SELECT * FROM sub_menu WHERE sub_menu_links=' . $row['sub_menu_id']);
            $html .= '<ul>';
            while ($sub_row = mysqli_fetch_array($sub_menu)) {
                $html .= '<li class="lvl-2"><a href="' . URLROOT . '/product/productlist/' . $sub_row['sub_menu_id'] . '" class="site-nav lvl-2">' . $sub_row['sub_menu_name'] . '</a></li>';
            }
            $html .= '</ul></li>';
        }
        return $html;
    }

    /* public function displayMenu($id = 0, $html='')
    {
        $cat = mysqli_query($this->db, 'SELECT * FROM categories WHERE parent_category_id=' . $id);
        // convert to array of array
        while ($row = mysqli_fetch_array($cat)) {
            $data[] = $row;
        }
        if (count($data) > 0) :
            foreach ($data as $key => $url) {
                if(count($child) > 0){
                    $html = '<li class="dropdown">
                    <a class="dropdown-toggle" href="' . $url["url"] . '" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">' . $url["name"] . '</a>';
                    $html .= '<ul class="dropdown-menu" aria-labelledby="navbarDropdown">';
                    $html .=  $this->displayMenu($url['id']);
                    $html .= '</ul></li>';
                }else{
                    $html .= '<li><a href="'.$url['url'].'">'.$url['name'].'</a></li>';
                }
            }
        else:
        endif;
        return $html;
    } */
}

?>