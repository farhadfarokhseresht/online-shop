<?php
//session_start();
include '../db.php';




// add product
foreach ($_POST as $key => $value) {
    if (strpos($key, 'new_color') !== false) {
        $colors[$key] = $value;
    }
    if (strpos($key, 'new_img_') !== false) {
        $imgs[$key] = $value;
    }
    if (strpos($key, 'new_feature_ky') !== false) {
        $kyval = str_replace("ky", "val", $key);
        $feature[$value] = $_POST[$kyval];
    }
}

$sql = 'INSERT INTO `products`(`product_title`,`product_desc`,`product_keywords`,`product_image`,`quantity`,`discount`,`product_price`,`product_cat`,`product_brand`) VALUES (?,?,?,?,?,?,?,?,?,?);';
//$par = array($_POST['productname'], $_POST['producttitle'], $_POST['productkeyword'], $_POST['productimg'], $_POST['productqyt'], $_POST['productdic'], $_POST['productprice'], $_POST['productcat'], $_POST['productbrand']);

if (isset($feature)) {
    foreach ($feature as $ky => $val) {
        $sql = 'INSERT INTO `product_meta`(`productId`, `feature`, `key`, `val`) values (`' . '`,`features`,`' . $ky . '`,`' . $val . '`);';
    }
}

if (isset($imgs)) {
    foreach ($imgs as $ky => $val) {
        $sql = 'INSERT INTO `product_meta`(`productId`, `feature`, `val`) values (`' . '`,`image`,`' . $val . '`);';
    }
}

if (isset($colors)) {
    foreach ($colors as $ky => $val) {
        $sql = 'INSERT INTO `product_meta`(`productId`, `feature`, `val`) values (`' . '`,`color`,`' . $val . '`);';
    }
}


// + - catgory
if (isset($_POST['addnewcatgory']) and isset($_POST['newcatgory']) and !empty($_POST['newcatgory'])) {
    $sql = "insert into categories (cat_title) values ('" . $_POST['newcatgory'] . "');";
    $query = mysqli_query($con, $sql);
    echo '<script>alert("با موفقیت اضاف شد")</script>';
}
if (isset($_POST['rmcatgory']) and isset($_POST['rm_catgory']) and !empty($_POST['rm_catgory'])) {
    $sql = "delete from `categories` where `cat_id` = ".$_POST['rm_catgory'] ;
    $query = mysqli_query($con, $sql);
    echo '<script>alert("با موفقیت حذف شد")</script>';
}

// + - brand
if (isset($_POST['addnewbrand']) and isset($_POST['newbrand']) and !empty($_POST['newbrand'])) {
    $sql = "insert into brands (brand_title) values ('" . $_POST['newbrand'] . "');";
    $query = mysqli_query($con, $sql);
    echo '<script>alert("با موفقیت اضاف شد")</script>';
}
if (isset($_POST['rmbrand']) and isset($_POST['rm_brand']) and !empty($_POST['rm_brand'])) {
    $sql = "DELETE FROM `brands` WHERE  brand_id = ".$_POST['rm_brand'] ;
    $query = mysqli_query($con, $sql);
    echo '<script>alert("با موفقیت حذف شد")</script>';
}

// get brands and catgorys
$brand_query = "SELECT * FROM brands";
$run_query = mysqli_query($con, $brand_query);
if (mysqli_num_rows($run_query) > 0) {
    while ($row = mysqli_fetch_array($run_query)) {
        $bid = $row["brand_id"];
        $brand_name = $row["brand_title"];
        $brands_list[$bid] = $brand_name;
    }
}
$category_query = "SELECT * FROM categories";
$run_query = mysqli_query($con, $category_query) or die(mysqli_error($con));
while ($row = mysqli_fetch_array($run_query)) {
    $cid = $row["cat_id"];
    $cat_name = $row["cat_title"];
    $categories_list[$cid] = $cat_name;
}