<?php
//session_start();
include '../db.php';
include '../app/jdf.php';


// ----------  admin dash
if (isset($_GET['admin_dash_data'])) {
    $sql_users_count = "select count(DISTINCT (user_id)) as n from user_info";
    $sql_final_cost = "select sum(final_cost) as final_cost from orders";
    $sql_users_count = mysqli_query($con, $sql_users_count);
    $sql_final_cost = mysqli_query($con, $sql_final_cost);
    $sql_final_cost = mysqli_fetch_array($sql_final_cost)['final_cost'];
    $sql_users_count = mysqli_fetch_array($sql_users_count)['n'];
    $admin_dash_data = array($sql_users_count, $sql_final_cost);
    echo json_encode($admin_dash_data,);
}


if (isset($_GET['admin_dash_chart'])) {
    $sql = 'select * from orders';
    $run_query = mysqli_query($con, $sql);
    $chartdata = array();
    if (mysqli_num_rows($run_query) > 0) {
        while ($row = mysqli_fetch_array($run_query)) {
            $creat_at = $row['creat_at'];
            $final_cost = $row['final_cost'];
            $creat_at = strtotime($creat_at);
            $creat_date = date('Y-m-d', $creat_at);#'Y-m-d H:i:s'
            $creat_at_month = jdate('F', $creat_at);
            $creat_at_year = jdate('Y', $creat_at);#'Y-m-d H:i:s'
            $chartdata[] = array('year' => $creat_at_year, 'month' => $creat_at_month, 'val' => $final_cost);#'year'=>$creat_at_year,
        }
    }
    if (isset($_GET['year_chart'])) {
        $year_val_data = array();
        foreach ($chartdata as $key => $item) {
            $year_val_data[$item['year']][$key] = $item['val'];
        }
        foreach ($year_val_data as $ky => $val) {
            $year_val_data[$ky] = array_sum($val);
        }
        $year_val_data = json_encode($year_val_data, JSON_UNESCAPED_UNICODE);
        echo $year_val_data;
    }
    if (isset($_GET['month_chart'])) {
        $month_val_data = array();
        foreach ($chartdata as $key => $item) {
            $month_val_data[$item['month']][$key] = $item['val'];
        }
        foreach ($month_val_data as $ky => $val) {
            $month_val_data[$ky] = array_sum($val);
        }

        $month_val_data = json_encode($month_val_data, JSON_UNESCAPED_UNICODE);
        echo $month_val_data;
    }
}


// get brands and catgorys
$categories_list = array();
$brands_list = array();

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

// ----------  user list
if (isset($_POST['userlist'])) {
    $sql = 'select * from user_info;';
    $result = $con->query($sql);
    $rowcount = $result->num_rows;
    $limit = 10;
    if (isset($_POST['limit'])) {
        $limit = $_POST['limit'];
    }
    $pagenum = 1;
    $max_page_num = ceil($rowcount / $limit);
    $start = 0;
    if (isset($_POST["pagenum"])) {
        $pagenum = $_POST["pagenum"];
        $start = ($pagenum * $limit) - $limit;
    }
    $sql = 'select * from user_info LIMIT ' . $start . ',' . $limit;
    if (isset($_POST['keyword'])) {
        $keyword = "'%" . $_POST['keyword'] . "%'";
        $sql = 'select * from user_info where mobile LIKE ' . $keyword . ' LIMIT ' . $start . ',' . $limit;
    }
    $result = $con->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            $user_id = $row['user_id'];
            $firest_name = $row['first_name'];
            $last_name = $row['last_name'];
            $email = $row['email'];
            $password = $row['password'];
            $mobile = $row['mobile'];
            echo '<tr>
								<td>' . $user_id . '</td>
								<td>' . $firest_name . ' ' . $last_name . '</td>
								<td>' . $email . '</td>
								<td>' . $mobile . '</td>
								<td>' . $user_id . '</td>
								<td>' . $password . '</td>
								<td>
									<div class = "d-flex flex-row justify-content-evenly">
										<i name="del-user" id="del-user"  class = "fas fa-user-times" style = "color: #ef394e;" onclick = "deluser(' . $user_id . ')"></i>
										<i name="edite-user" id = "edite-user"  class = "fas fa-user-edit" style = "color: var(--bs-primary);" onclick = "editeuser(' . $user_id . ')"></i>
									</div>
								</td>
							</tr>';
        }
    } else {
        echo "موردی یافت نشد!";
    }
}

if (isset($_POST['deluser'])) {
    $sql = 'delete from user_info where user_id = ' . $_POST['deluser'];
    $query = mysqli_query($con, $sql);
}

if (isset($_POST['editeuser'])) {
    $info = array();
    $sql_user_info = 'select * from user_info where user_id = ' . $_POST['editeuser'];
    $run_query1 = mysqli_query($con, $sql_user_info);
    if (mysqli_num_rows($run_query1) > 0) {
        while ($row = mysqli_fetch_array($run_query1)) {
            $user_id = $row['user_id'];
            $info[0] = $row['user_id'];
            $firest_name = $row['first_name'];
            $info[1] = $row['first_name'];
            $last_name = $row['last_name'];
            $info[2] = $row['last_name'];
            $email = $row['email'];
            $info[3] = $row['email'];
            $password = $row['password'];
            $info[4] = $row['password'];
            $mobile = $row['mobile'];
            $info[5] = $row['mobile'];
        }
    }
    $sql_address = 'select * from address where user_id = ' . $_POST['editeuser'] . ' LIMIT 1';
    $run_query2 = mysqli_query($con, $sql_address);
    if (mysqli_num_rows($run_query2) > 0) {
        while ($row2 = mysqli_fetch_array($run_query2)) {
            $province = $row2['province'];
            $info[6] = $row2['province'];
            $city = $row2['city'];
            $info[7] = $row2['city'];
            $plack = $row2['plack'];
            $info[8] = $row2['plack'];
            $vahed = $row2['vahed'];
            $info[9] = $row2['vahed'];
            $codposti = $row2['codposti'];
            $info[10] = $row2['codposti'];
            $codmli = $row2['codmli'];
            $info[11] = $row2['codmli'];
            $address = $row2['address1'];
            $info[12] = $row2['address1'];
        }
    }

    echo json_encode($info);
}

if (isset($_POST['editeusersave'])) {
    $uid = $_POST['editeusersave'];
    $province = $_POST['province'];
    $city = $_POST['city'];
    $plack = $_POST['plack'];
    $vahed = $_POST['vahed'];
    $address = $_POST['address'];
    $codposti = $_POST['codposti'];
    $codmli = $_POST['codmli'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $phone = $_POST['phonenum'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $address = $_POST['address'];
    $upday = date("Y-m-d");
    $sql = "UPDATE `user_info` SET `first_name`='$first_name',`last_name`='$last_name',`email`='$email',`password`='$password',`mobile`='$phone',`update_at`='$upday' WHERE `user_id`='$uid' ";
    $query = mysqli_query($con, $sql);
    $sql = "UPDATE `address` SET `province`='$province',`city`='$city',`address1`='$address',`plack`='$plack',`vahed`='$vahed',`codposti`='$codposti',`codmli`='$codmli' WHERE `user_id`='$uid'";
    $query = mysqli_query($con, $sql);
    echo '<script>alert("تغییرات ثبت شد!")</script>';
}

//if (isset($_POST['deluser'])) {
//    $sql = 'delete from user_info where user_id = ' . $_POST['deluser'];
//    $query = mysqli_query($con, $sql);
//}
//
//if (isset($_POST['editeuser'])) {
//    $info = array();
//    $sql_user_info = 'select * from user_info where user_id = ' . $_POST['editeuser'];
//    $run_query1 = mysqli_query($con, $sql_user_info);
//    if (mysqli_num_rows($run_query1) > 0) {
//        while ($row = mysqli_fetch_array($run_query1)) {
//            $user_id = $row['user_id'];
//            $info[0] = $row['user_id'];
//            $firest_name = $row['first_name'];
//            $info[1] = $row['first_name'];
//            $last_name = $row['last_name'];
//            $info[2] = $row['last_name'];
//            $email = $row['email'];
//            $info[3] = $row['email'];
//            $password = $row['password'];
//            $info[4] = $row['password'];
//            $mobile = $row['mobile'];
//            $info[5] = $row['mobile'];
//        }
//    }
//    $sql_address = 'select * from address where user_id = ' . $_POST['editeuser'] . ' LIMIT 1';
//    $run_query2 = mysqli_query($con, $sql_address);
//    if (mysqli_num_rows($run_query2) > 0) {
//        while ($row2 = mysqli_fetch_array($run_query2)) {
//            $province = $row2['province'];
//            $info[6] = $row2['province'];
//            $city = $row2['city'];
//            $info[7] = $row2['city'];
//            $plack = $row2['plack'];
//            $info[8] = $row2['plack'];
//            $vahed = $row2['vahed'];
//            $info[9] = $row2['vahed'];
//            $codposti = $row2['codposti'];
//            $info[10] = $row2['codposti'];
//            $codmli = $row2['codmli'];
//            $info[11] = $row2['codmli'];
//            $address = $row2['address1'];
//            $info[12] = $row2['address1'];
//        }
//    }
//    echo json_encode($info);
//}
//
//if (isset($_POST['editeusersave'])) {
//    $uid = $_POST['editeusersave'];
//    $province = $_POST['province'];
//    $city = $_POST['city'];
//    $plack = $_POST['plack'];
//    $vahed = $_POST['vahed'];
//    $address = $_POST['address'];
//    $codposti = $_POST['codposti'];
//    $codmli = $_POST['codmli'];
//    $first_name = $_POST['first_name'];
//    $last_name = $_POST['last_name'];
//    $phone = $_POST['phonenum'];
//    $email = $_POST['email'];
//    $password = $_POST['password'];
//    $address = $_POST['address'];
//    $upday = date("Y-m-d");
//    $sql = "UPDATE `user_info` SET `first_name`='$first_name',`last_name`='$last_name',`email`='$email',`password`='$password',`mobile`='$phone',`update_at`='$upday' WHERE `user_id`='$uid' ";
//    $query = mysqli_query($con, $sql);
//    $sql = "UPDATE `address` SET `province`='$province',`city`='$city',`address1`='$address',`plack`='$plack',`vahed`='$vahed',`codposti`='$codposti',`codmli`='$codmli' WHERE `user_id`='$uid'";
//    $query = mysqli_query($con, $sql);
//    echo '<script>alert("تغییرات ثبت شد!")</script>';
//}

// ----------  product list

if (isset($_POST['productlist'])) {
    $sql = 'select * from products where product_id > 0 ';
    $result = $con->query($sql);
    $rowcount = $result->num_rows;
    $limit = 10;
    if (isset($_POST['limit'])) {
        $limit = $_POST['limit'];
    }
    $pagenum = 1;
    $max_page_num = ceil($rowcount / $limit);
    $start = 0;
    if (isset($_POST["pagenum"])) {
        $pagenum = $_POST["pagenum"];
        $start = ($pagenum * $limit) - $limit;
    }
    if (isset($_POST['keyword'])) {
        $keyword = "'%" . $_POST['keyword'] . "%'";
        $sql = $sql . ' and product_title LIKE ' . $keyword;
    }
    if (isset($_POST['sh_catgory']) and $_POST['sh_catgory'] > 0 and !empty($_POST['sh_catgory'])) {
        $sh_catgory = $_POST['sh_catgory'];
        $sql = $sql . ' and product_cat = ' . $sh_catgory;
    }
    $sql = $sql . '  LIMIT ' . $start . ',' . $limit;
    $result = $con->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            $product_id = $row['product_id'];
            $product_title = $row['product_title'];
            $product_keywords = $row['product_keywords'];
            $product_desc = $row['product_desc'];
            $product_image = $row['product_image'];
            $quantity = $row['quantity'];
            $discount = $row['discount'];
            $product_price = $row['product_price'];
            $product_cat = $row['product_cat'];
            $product_brand = $row['product_brand'];
            echo "<tr>
								<td class = \"ad_pl_img\"><img src = \"../product_images/$product_image\"/>$product_title</td>
								<td>$categories_list[$product_cat]</td>
								<td>$discount</td>
								<td>$product_price</td>
								<td>$quantity</td>
								<td class = \"ad_pl_trash\">
									<div class = \"d-flex flex-row justify-content-evenly\">
										<i class = \"fas fa-trash-alt\" style = \"color: #ef394e;\" onclick = \"delproduct($product_id)\"></i>
										<i class = \"far fa-edit\" id = \"edite-product\" style = \"color: var(--bs-primary);\" onclick = \"editeproduct($product_id)\"></i>
									</div>
								</td>
							</tr>";
        }
    } else {
        echo "موردی یافت نشد!";
    }
}
if (isset($_POST['editeproduct'])) {
    $editeproductinfo = array();
    $editeproductinfo[0] = $_POST['editeproduct'];
    $sql_user_info = 'select * from products where product_id = ' . $_POST['editeproduct'];
    $run_query1 = mysqli_query($con, $sql_user_info);
    if (mysqli_num_rows($run_query1) > 0) {
        $row = mysqli_fetch_array($run_query1);
        $editeproductinfo[1] = $row['product_title'];
        $editeproductinfo[2] = $row['product_keywords'];
        $editeproductinfo[3] = $row['product_desc'];
        $editeproductinfo[4] = $row['product_image'];
        $editeproductinfo[5] = $row['quantity'];
        $editeproductinfo[6] = $row['discount'];
        $editeproductinfo[7] = $row['product_price'];
        $editeproductinfo[8] = $row['product_cat'];
        $editeproductinfo[9] = $row['product_brand'];
    }
    echo json_encode($editeproductinfo);
}
//$par = array($_POST['productname'], $_POST['producttitle'], $_POST['productkeyword'], $_POST['productimg'], $_POST['productqyt'], $_POST['productdic'], $_POST['productprice'], $_POST['productcat'], $_POST['productbrand']);

if (isset($_POST['delproduct'])) {
    $sql = 'delete from products where product_id = ' . $_POST['delproduct'];
    $query = mysqli_query($con, $sql);
}


// ---------- add product
//picture coding
//$picture_name = $_FILES['picture']['name'];
//$picture_type = $_FILES['picture']['type'];
//$picture_tmp_name = $_FILES['picture']['tmp_name'];
//$picture_size = $_FILES['picture']['size'];

//if ($picture_type == "image/jpeg" || $picture_type == "image/jpg" || $picture_type == "image/png" || $picture_type == "image/gif") {
//    if ($picture_size <= 50000000)
//        $pic_name = time() . "_" . $picture_name;
//    move_uploaded_file($picture_tmp_name, "../product_images/" . $pic_name);
//}

if (isset($_POST['addproduct'])) {
    $stmt = $con->prepare('INSERT INTO `products`(`product_title`,`product_desc`,`product_keywords`,`product_image`,`quantity`,`discount`,`product_price`,`product_cat`,`product_brand`) VALUES (?,?,?,?,?,?,?,?,?)');
    $par = array($_POST['productname'], $_POST['producttitle'], $_POST['productkeyword'], $_POST['productimg'], $_POST['productqyt'], $_POST['productdic'], $_POST['productprice'], $_POST['productcat'], $_POST['productbrand']);
    $stmt->bind_param("ssssdddss", $par[0], $par[1], $par[2], $par[3], $par[4], $par[5], $par[6], $par[7], $par[8]);
    $res = $stmt->execute();
    if ($res === TRUE) {
        $last_id = $con->insert_id;
    }
    $sql = $con->prepare('INSERT INTO `product_meta`(`productId`, `feature`, `key`, `val`) values (?,?,?,?)');
    $sql->bind_param("dsss", $last_id, $featurename, $featureky, $featureval);

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

    if (isset($feature)) {
        foreach ($feature as $ky => $val) {
            $featurename = 'features';
            $featureky = $ky;
            $featureval = $val;
            $sql->execute();
        }
    }

    if (isset($imgs)) {
        foreach ($imgs as $ky => $val) {
            $featurename = 'image';
            $featureky = $ky;
            $featureval = $val;
            $sql->execute();
        }
    }

    if (isset($colors)) {
        foreach ($colors as $ky => $val) {
            $featurename = 'colors';
            $featureky = $ky;
            $featureval = $val;
            $sql->execute();
        }
    }

    if (isset($_POST['producttext']) and !empty($_POST['producttext'])) {
        $featurename = 'review';
        $featureky = 'discript';
        $featureval = $_POST['producttext'];
        $sql->execute();
    }
}

// + - catgory
if (isset($_POST['addnewcatgory']) and isset($_POST['newcatgory']) and !empty($_POST['newcatgory'])) {
    $sql = "insert into categories (cat_title) values ('" . $_POST['newcatgory'] . "');";
    $query = mysqli_query($con, $sql);
    echo '<script>alert("با موفقیت اضاف شد")</script>';
}
if (isset($_POST['rmcatgory']) and isset($_POST['rm_catgory']) and !empty($_POST['rm_catgory'])) {
    $sql = "delete from `categories` where `cat_id` = " . $_POST['rm_catgory'];
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
    $sql = "DELETE FROM `brands` WHERE  brand_id = " . $_POST['rm_brand'];
    $query = mysqli_query($con, $sql);
    echo '<script>alert("با موفقیت حذف شد")</script>';
}



