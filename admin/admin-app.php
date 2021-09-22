<?php
//session_start();
include '../db.php';


// ----------  user
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
    $province = $_POST['province'];
    $city = $_POST['city'];
    $plack = $_POST['plack'];
    $vahed = $_POST['vahed'];
    $address1 = $_POST['address1'] . " پلاک " . $plack . " واحد " . $vahed;
    $codposti = $_POST['codposti'];
    $codmli = $_POST['codmli'];
    $rfname = $_POST['rfname'];
    $rlname = $_POST['rlname'];
    $rphone = $_POST['rphone'];
    $phone = $_POST['phonenum'];
    $email = $_POST['email'];
    $password = $_POST['password'];
}


// ---------- add product
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


