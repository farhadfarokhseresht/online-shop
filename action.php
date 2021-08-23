<?php
#session_start();
$ip_add = getenv("REMOTE_ADDR");
include "db.php";

# use in header
function user_login_state()
{
    global $con;
    if (isset($_SESSION["uid"])) {
        $sql = "SELECT first_name FROM user_info WHERE user_id='$_SESSION[uid]'";
        $query = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($query);
        return $row["first_name"];
    } else {
        return 0;
    }
}

if (isset($_POST["category"])) {
    $category_query = "SELECT * FROM categories";

    $run_query = mysqli_query($con, $category_query) or die(mysqli_error($con));
    echo "
		
            
            <div class='aside'>
							<h3 class='aside-title'>Categories</h3>
							<div class='btn-group-vertical'>
	";
    if (mysqli_num_rows($run_query) > 0) {
        $i = 1;
        while ($row = mysqli_fetch_array($run_query)) {

            $cid = $row["cat_id"];
            $cat_name = $row["cat_title"];
            $sql = "SELECT COUNT(*) AS count_items FROM products WHERE product_cat=$i";
            $query = mysqli_query($con, $sql);
            $row = mysqli_fetch_array($query);
            $count = $row["count_items"];
            $i++;


            echo "
					
                    <div type='button' class='btn navbar-btn category' cid='$cid'>
									
									<a href='#'>
										<span  ></span>
										$cat_name
										<small class='qty'>($count)</small>
									</a>
								</div>
                    
			";

        }


        echo "</div>";
    }
}

function brandlist()
{
    global $con;
    $brandlist = array();
    $brand_query = "SELECT * FROM brands";
    $run_query = mysqli_query($con, $brand_query);
    if (mysqli_num_rows($run_query) > 0) {
        $i = 1;
        while ($row = mysqli_fetch_array($run_query)) {
            $bid = $row["brand_id"];
            $brand_name = $row["brand_title"];
            $sql = "SELECT COUNT(*) AS count_items FROM products WHERE product_brand=$i";
            $query = mysqli_query($con, $sql);
            $row = mysqli_fetch_array($query);
            $count = $row["count_items"];
            $i++;
            $brandlist[$bid] = array($bid, $brand_name, $count);
        }
    }
    return $brandlist;
}

if (isset($_POST["page"])) {
    $sql = "SELECT * FROM products";
    $run_query = mysqli_query($con, $sql);
    $count = mysqli_num_rows($run_query);
    $pageno = ceil($count / 9);
    for ($i = 1; $i <= $pageno; $i++) {
        echo "
			<li><a href='#product-row' page='$i' id='page' class='active'>$i</a></li>
            
            
		";
    }
}


// add Filters
if (isset($_POST['delfilter'])) {
    $_SESSION['filters'] = array();
}
if (isset($_POST["keyword"])) {
    $_SESSION['filters']['keyword'] = $_POST["keyword"];
    if ($_POST["keyword"]=="delfilter"){
        unset($_SESSION['filters']['keyword']);
    }
}
if (isset($_POST["brandid"])) {
    if ($_POST["brandid"]=="delfilter"){
        unset($_SESSION['filters']['brandid']);
    }else{
        $_SESSION['filters']['brandid'] = $_POST["brandid"];
    }
}
$kalayemojood = 0;
if (isset($_POST["kalamojood"]) ) {
    $kalayemojood=1;
    $_SESSION['filters']['kalamojood'] = $_POST["kalamojood"];
}
if (empty($_POST["kalamojood"]) ){
    unset($_SESSION['filters']['kalamojood']);
    $kalayemojood=0;
}



//Get product for filter page
function get_products()
{
    global $con;
    $sql = "SELECT * FROM products where product_id > 0  ";

    if ($_SESSION['filters']){

        if (!empty($_SESSION['filters']['keyword'])){
            $keyword = $_SESSION['filters']['keyword'];
            $sql = $sql." AND product_keywords LIKE '%$keyword%'";
        }
        if (!empty($_SESSION['filters']['brandid'])){
            $brandid = $_SESSION['filters']['brandid'];
            $sql = $sql." AND product_brand = '$brandid'";
        }

    }
    $filter_items = array();
    $n = 0;
    $run_query = mysqli_query($con, $sql);
    while ($row = mysqli_fetch_array($run_query)) {
        $n++;
        $pro_id = $row['product_id'];
        #$pro_cat = $row['product_cat'];
        #$pro_brand = $row['product_brand'];
        $pro_title = $row['product_title'];
        $pro_price = $row['product_price'];
        $pro_image = $row['product_image'];
        #$cat_name = $row["cat_title"];
        $filter_items[$n] = array($pro_id, $pro_title, $pro_price, $pro_image);
    }
    return $filter_items;
    exit();
}

//Count User cart item
function Count_User_cart_item()
{
    global $con;
    global $ip_add;
    //When user is logged in then we will count number of item in cart by using user session id
    if (isset($_SESSION["uid"])) {
        $sql = "SELECT COUNT(*) AS count_item FROM cart WHERE user_id = $_SESSION[uid]";
    } else {
        //When user is not logged in then we will count number of item in cart by using users unique ip address
        $sql = "SELECT COUNT(*) AS count_item FROM cart WHERE ip_add = '$ip_add' AND user_id < 0";
    }
    $query = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($query);
    return $row["count_item"];
    exit();
}

//Get Cart Item
function Get_cart_item()
{
    global $con;
    global $ip_add;
    if (isset($_SESSION["uid"])) {
        //When user is logged in this query will execute
        $sql = "SELECT a.product_id,a.product_title,a.product_price,a.product_desc,a.product_image,b.id,b.qty FROM products a,cart b WHERE a.product_id=b.p_id AND b.user_id='$_SESSION[uid]'";
    } else {
        //When user is not logged in this query will execute
        $sql = "SELECT a.product_id,a.product_title,a.product_desc,a.product_price,a.product_image,b.id,b.qty FROM products a,cart b WHERE a.product_id=b.p_id AND b.ip_add='$ip_add' AND b.user_id < 0";
    }
    $query = mysqli_query($con, $sql);
    if (mysqli_num_rows($query) > 0) {
        $n = 0;
        $total_price = 0;
        $cart_items = array();
        while ($row = mysqli_fetch_array($query)) {
            $n++;
            $product_id = $row["product_id"];
            $product_title = $row["product_title"];
            $product_price = $row["product_price"];
            $product_image = $row["product_image"];
            $cart_item_id = $row["id"];
            $qty = $row["qty"];
            $total_price = $total_price + $product_price * $qty;
            $cart_items[$n] = array($product_id, $product_title, $product_price, $product_image, $cart_item_id, $qty);
        }
        return array($cart_items, $total_price, $n);
    } else {
        return 0;
    }
}

//Remove Item From cart
if (isset($_POST["removeItemFromCart"])) {
    $remove_id = $_POST["rid"];
    if (isset($_SESSION["uid"])) {
        $sql = "DELETE FROM cart WHERE p_id = '$remove_id' AND user_id = '$_SESSION[uid]'";
    } else {
        $sql = "DELETE FROM cart WHERE p_id = '$remove_id' AND ip_add = '$ip_add'";
    }
    if (mysqli_query($con, $sql)) {
        $BackToMyPage = $_SERVER['HTTP_REFERER'];
        header('Location: ' . $BackToMyPage);
        #exit();
    }
}

//Update gty Item From cart
if (isset($_POST["button_qty_rm"]) | isset($_POST["button_qty_add"])) {
    $update_id = $_POST["update_id"];
    $qty = $_POST["qty"];
    if ($qty == 1 and isset($_POST["button_qty_rm"])) {
        $qty = $qty;
    } elseif (isset($_POST["button_qty_rm"])) {
        $qty = $qty - 1;
    } elseif (isset($_POST["button_qty_add"])) {
        $qty = $qty + 1;
    }
    if (isset($_SESSION["uid"])) {
        $uid = $_SESSION["uid"];
        $sql = "UPDATE cart SET qty='$qty' WHERE p_id = '$update_id' AND user_id = '$uid'";
    } else {
        $sql = "UPDATE cart SET qty='$qty' WHERE p_id = '$update_id' AND ip_add = '$ip_add'";
    }
    if (mysqli_query($con, $sql)) {
        #header('location:cart.php');
        #exit();
        #echo '<script> alert(\' شد\')</script>';
    }
}

// add to cart

if (isset($_POST["addToCart"])) {

    $p_id = $_POST["proId"];
    $add_qty = 1;
    if (isset($_POST['qty'])){
        $add_qty = $_POST['qty'];
    }
    if (isset($_SESSION["uid"])) {

        $user_id = $_SESSION["uid"];

        $sql = "SELECT * FROM cart WHERE p_id = '$p_id' AND user_id = '$user_id'";
        $run_query = mysqli_query($con, $sql);
        $count = mysqli_num_rows($run_query);
        if ($count > 0) {
            echo "<div class='alert alert-warning' style='text-align: center' id='alert' ><b>محصول در سبد خرید شما قبلا قرار گرفته</b></div>";
        } else {
            $sql = "INSERT INTO `cart`(`p_id`, `ip_add`, `user_id`, `qty`) VALUES ('$p_id','$ip_add','$user_id','$add_qty')";
            if (mysqli_query($con, $sql)) {
                echo "<div class='alert alert-success' style='text-align: center' id='alert' ><b>محصول به سبد شما اضاف شد</b></div>";
            }
        }
    } else {
        $sql = "SELECT id FROM cart WHERE ip_add = '$ip_add' AND p_id = '$p_id' AND user_id = -1";
        $query = mysqli_query($con, $sql);
        if (mysqli_num_rows($query) > 0) {
            echo "<div class='alert alert-warning'  style='text-align: center' id='alert'><b>محصول در سبد خرید شما قبلا قرار گرفته</b></div>";
            exit();
        }
        $sql = "INSERT INTO `cart`(`p_id`, `ip_add`, `user_id`, `qty`) VALUES ('$p_id','$ip_add','-1','$add_qty')";
        if (mysqli_query($con, $sql)) {
            echo "<div class='alert alert-success' style='text-align: center' id='alert'><b>محصول به سبد شما اضاف شد</b></div>";
            exit();
        }

    }
}

?>






