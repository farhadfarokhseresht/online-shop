<?php
session_start();
$ip_add = getenv("REMOTE_ADDR");
include "db.php";

// use in header
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

function get_categories()
{
    global $con;
    $category_query = "SELECT * FROM categories";
    $run_query = mysqli_query($con, $category_query) or die(mysqli_error($con));
    while ($row = mysqli_fetch_array($run_query)) {
        $cid = $row["cat_id"];
        $cat_name = $row["cat_title"];
//        $sql = "SELECT COUNT(*) AS count_items FROM products WHERE product_cat=$cid";
//        $query = mysqli_query($con, $sql);
//        $row = mysqli_fetch_array($query);
//        $count = $row["count_items"];
        $categories_list[$cid] = $cat_name;
    }
    return $categories_list;
}

if (isset($_GET['brandlist'])) {
    global $con;
    $brandlist = array();
    $brand_query = "SELECT * FROM brands";
    if (isset($_SESSION['filters']['categori'])) {
        $catid = $_SESSION['filters']['categori'];
        $brand_query = "select distinct (product_brand) as brand_id from products where product_cat = " . $catid;
        $run_query = mysqli_query($con, $brand_query);
        if (mysqli_num_rows($run_query) > 0) {
            while ($row = mysqli_fetch_array($run_query)) {
                $bid = $row["brand_id"];
                $sql = "SELECT * FROM brands where brand_id = " . $bid;
                $run_query = mysqli_query($con, $sql);
                $brand_name = mysqli_fetch_array($run_query)["brand_title"];
                $brandlist[$bid] = array($bid, $brand_name);
            }
        }
    } else {
        $run_query = mysqli_query($con, $brand_query);
        if (mysqli_num_rows($run_query) > 0) {
            while ($row = mysqli_fetch_array($run_query)) {
                $bid = $row["brand_id"];
                $brand_name = $row["brand_title"];
                $brandlist[$bid] = array($bid, $brand_name);
            }
        }
    }
    foreach ($brandlist as $bitem) {
        echo '              <li>
                                <i class="fas fa-chevron-left" style="font-size: 10px;"></i>
                                <button name="brandid" id="brandid" style="direction: ltr" class="btn filter4bu"  type="button" value="' . $bitem[0] . '">
                                    <span>' . $bitem[1] . '</span>
                                </button>
                            </li>';
    }
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
if ("filters") {
    if (isset($_GET['delfilter'])) {
        $_SESSION['filters'] = array();
    }
    if (isset($_GET["keyword"])) {
        $_SESSION['filters']['keyword'] = $_GET["keyword"];
    }
    if (isset($_GET["categori"])) {
        $_SESSION['filters']['categori'] = $_GET["categori"];
    }
    if (isset($_POST["brandid"])) {
        $_SESSION['filters']['brandid'] = $_POST["brandid"];
    }
    if (isset($_POST["kalamojood"]) ) {
        $_SESSION['filters']['kalamojood'] = 'فقط کالای موجود';
    }
    if (isset($_POST['filtersbu'])) {
        $filter_name = $_POST['filter_name'];
        unset($_SESSION['filters'][$filter_name]);
    }
}

// update_filter_list
if (isset($_POST['update_filter_list'])) {
    if (isset($_SESSION['filters'])) {
        foreach ($_SESSION['filters'] as $ky => $val) {
            echo '<button value = "delfilter" name = "' . $ky . '" class = "btn border rounded-pill" id = "filtersbu" type = "button">' . $val . '<i class = "fas fa-times" style = "margin-right: 5px;"></i></button>';
        }
    }
}


//Get product for filter page
if (isset($_POST['get_products'])) {
    global $con;
    $sql = "SELECT *
FROM products
         LEFT JOIN order_products on products.product_id = order_products.product_id
 where products.product_id > 0  ";

    if (isset($_SESSION['filters'])) {
        if (!empty($_SESSION['filters']['keyword'])) {
            $keyword = $_SESSION['filters']['keyword'];
            $sql = $sql . " AND products.product_keywords LIKE '%$keyword%'";
        }
        if (isset($_GET['categori'])) {
            $catid = $_GET['categori'];
            $sql = $sql . "and  products.product_cat = " . $catid;
        }
        if (!empty($_SESSION['filters']['brandid'])) {
            $brandid = $_SESSION['filters']['brandid'];
            $sql = $sql . " AND products.product_brand = '$brandid'";
        }
        if (!empty($_SESSION['filters']['kalamojood'])) {
            $sql = $sql . " AND products.quantity > 0 ";
            echo $sql;
        }
        if (!empty($_SESSION['filters']['categori'])) {
            $categoriid = $_SESSION['filters']['categori'];
            $sql = $sql . " AND products.product_cat = '$categoriid'";
        }
    }

    if (isset($_POST["sortfil"])) {
        $sortfilter = $_POST["sortfil"];
        if ($sortfilter == 'most_bay') {
            $sql = $sql . " ORDER BY order_products.qty DESC";
        }
        if ($sortfilter == 'most_exp') {
            $sql = $sql . " ORDER BY products.product_price DESC";
        }
        if ($sortfilter == 'most_cheapest') {
            $sql = $sql . " ORDER BY products.product_price ASC";
        }
    } else {
        $sql = $sql . " ORDER BY order_products.qty DESC";
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
    foreach ($filter_items as $item) {
        echo '<li id="pruduct' . $item[0] . '" class="list-inline-item d-sm-flex justify-content-sm-end filter_list_item">
    <div class="d-flex d-md-grid" id="filter_items"><a class="d-flex d-md-grid" href="product.php?p=' . $item[0] . '">
            <div class="order-last order-md-first" id="imagediv"><img src="product_images/' . $item[3] . '" /></div>
            <div class="d-md-flex justify-content-md-center">
                <div id="price">
                    <div><span class="les_percent">15%</span><span class="les_price">Text</span></div>
                    <div class="d-md-flex d-grid"><span>' . $item[2] . '</span><span>تومان</span></div>
                </div>
            </div>
            <div class="d-md-flex justify-content-md-center order-md-first">
                <div id="name"><strong style="word-wrap: break-word;">' . $item[1] . '</strong></div>
            </div>
        </a>
        <button value="' . $item[0] . '" id="addtocartB" class="fas fa-cart-plus border rounded-pill d-none d-sm-flex justify-content-sm-center align-items-sm-center order-sm-first order-md-last f_add_cartB"></button>
        </div>
</li>';
    }
}


// max and min price
if (isset($_GET['minmaxprice'])) {
    global $con;
    $query = 'SELECT max(product_price) as max,min(product_price) as min from products';
    $run_query = mysqli_query($con, $query);
    $row = mysqli_fetch_array($run_query);
    echo json_encode(array($row['min'], $row['max']));
}

//Count User cart item

if (isset($_GET['count_item'])) {
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
    echo $row["count_item"];
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
        return (array($cart_items, $total_price, $n));
    } else {
        return 0;
    }
}

# drupdown menu
if (isset($_POST['Get_cart_item'])) {
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
        foreach ($cart_items as $itminfo) {
            echo '
                                            <a style="margin: 0px 5px 0px!important;display: flex!important;">
                                                <div id="bascet_dropdown_item_info">
                                                    <form>
                                                        <input type="hidden"  name="rid" id="rid">
                                                        <button value=' . $itminfo[0] . ' name="removeItemFromCart" id="removeItemFromCart"  class="btn btn-primary float-start" type="button"><i class="far fa-trash-alt" style="color: var(--bs-gray-dark);"></i></button>
                                                    </form>
                                                    
                                                    <span id="CartItemName" >' . $itminfo[1] . '</span>
                                                    <div class="d-flex justify-content-end">
                                                        <p style="margin-bottom: 0px;margin-right: 10px;">تومان</p>
                                                        <p id="CartItemPrice" style="margin-bottom: 0px;">' . $itminfo[2] . '</p>
                                                    </div>
                                                </div>
                                                <div class="me-3" style="margin: 0px 5px 0px!important;">
                                                    <div class="bg-primary icon-circle" id="druopdown_prod_img"><img src="product_images/' . $itminfo[3] . '" > </div>
                                                </div>
                                            </a>
                                            <hr/>
                                            ';
        }
    } else {
        echo '<i class="d-flex justify-content-center">سبد خرید شما خالی میباشد</i><i class="d-flex justify-content-center fa fa-shopping-basket"></i>';
    }

}


//Remove Item From cart
if (isset($_POST["removeItemFromCart"])) {
    $remove_id = $_POST["rid"];
    if (isset($_SESSION["uid"])) {
        $uid = $_SESSION["uid"];
        $sql = "DELETE FROM cart WHERE p_id = '$remove_id' AND user_id = '$uid'";
    } else {
        $sql = "DELETE FROM cart WHERE p_id = '$remove_id' AND ip_add = '$ip_add'";
    }
    if (mysqli_query($con, $sql)) {
        echo 1;
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
        #
        #echo '<script> alert(\' شد\')</script>';
    }
}

// add to cart
if (isset($_POST["addToCart"])) {
    $success = 1;
    $warning = 0;
    $p_id = $_POST["proId"];
    $add_qty = 1;
    if (isset($_POST['qty'])) {
        $add_qty = $_POST['qty'];
    }
    if (isset($_SESSION["uid"])) {
        $user_id = $_SESSION["uid"];
        $sql = "SELECT * FROM cart WHERE p_id = '$p_id' AND user_id = '$user_id'";
        $run_query = mysqli_query($con, $sql);
        $count = mysqli_num_rows($run_query);
        if ($count > 0) {
            echo $warning;
        } else {
            $sql = "INSERT INTO `cart`(`p_id`, `ip_add`, `user_id`, `qty`) VALUES ('$p_id','$ip_add','$user_id','$add_qty')";
            if (mysqli_query($con, $sql)) {
                echo $success;
            }
        }
    } else {
        $sql = "SELECT id FROM cart WHERE ip_add = '$ip_add' AND p_id = '$p_id' AND user_id = -1";
        $query = mysqli_query($con, $sql);
        if (mysqli_num_rows($query) > 0) {
            echo $warning;

        } else {
            $sql = "INSERT INTO `cart`(`p_id`, `ip_add`, `user_id`, `qty`) VALUES ('$p_id','$ip_add','-1','$add_qty')";
            if (mysqli_query($con, $sql)) {
                echo $success;

            }

        }
    }
}

//INSERT INTO `product_review` (`id`, `productId`, `userId`, `posetive`, `negative`, `comment`, `createdAt`, `tolerate`, `bayrating`) VALUES (NULL, '1', '1', 'xxx', 'xxx', 'xxxxxxxxxxxxxxxxxx', CURRENT_TIMESTAMP, '1', '1');
?>


