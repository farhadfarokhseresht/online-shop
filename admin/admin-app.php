<?php
//session_start();
include '../db.php';


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
    /*echo '
                <header class = "edite-user-modal-header"><i class = "fas fa-user-edit order-last me-auto" onclick></i>
					<h4 class = "modal-title">کاربر : </h4>
					<h4 class = "modal-title">' . $firest_name . ' ' . $last_name . '</h4>
				</header>
				<form method = "post">
					<div class = "modal-body">
						<div class = "row mb-3">
							<div class = "col">
								<div class = "card shadow mb-3">
									<div class = "card-header py-3">
										<p class = "text-primary m-0 fw-bold">اطلاعات کاربری</p>
									</div>
									<div class = "card-body">
										<div class = "row d-flex d-sm-flex align-items-end">
											<div class = "col">
												<div class = "mb-3">
													<label class = "form-label"><strong>شماره همراه</strong><br/></label><input value = ' . $mobile . ' type = "text" class = "form-control" id = "phonenum" name = "phonenum"/>
												</div>
											</div>
											<div class = "col">
												<div class = "mb-3">
													<label class = "form-label"><strong>پست الکترونیکی </strong><br/></label><input value = ' . $email . ' type = "email" class = "form-control" id = "email" name = "email"/>
												</div>
											</div>
											<div class = "col">
												<div class = "mb-3">
													<label class = "form-label"><strong>رمز عبور</strong><br/></label><input value = ' . $password . ' type = "text" class = "form-control" id = "password" name = "password"/>
												</div>
											</div>
										</div>
										<div class = "row">
											<div class = "col">
												<div class = "mb-3">
													<label class = "form-label"><strong>نام</strong></label><input value = ' . $firest_name . ' type = "text" class = "form-control" id = "first_name"/>
												</div>
											</div>
											<div class = "col">
												<div class = "mb-3">
													<label class = "form-label"><strong>نام خانوادگی</strong></label><input value = ' . $last_name . ' type = "text" class = "form-control" id = "last_name"/>
												</div>
											</div>
										</div>
										<div class = "mb-3">
											<label class = "form-label"><strong> آدرس </strong><br/></label><input value = ' . $address . ' type = "text" class = "form-control" id = "address"/>
										</div>
										<div class = "row">
											<div class = "col">
												<div class = "mb-3">
													<label class = "form-label"><strong>استان</strong></label><input value = ' . $province . ' type = "text" class = "form-control" id = "province" name = "province"/>
												</div>
											</div>
											<div class = "col">
												<div class = "mb-3">
													<label class = "form-label"><strong>شهر</strong></label><input value = ' . $city . ' type = "text" class = "form-control" id = "city" name = "city"/>
												</div>
											</div>
										</div>
										<div class = "row">
											<div class = "col-2">
												<div class = "mb-3">
													<label class = "form-label"><strong>پلاک</strong></label><input value = ' . $plack . ' type = "text" class = "form-control" id = "plack" name = "plack"/>
												</div>
											</div>
											<div class = "col-2">
												<div class = "mb-3">
													<label class = "form-label"><strong>واحد</strong></label><input value = ' . $vahed . ' type = "text" class = "form-control" id = "vahed" name = "vahed"/>
												</div>
											</div>
											<div class = "col">
												<div class = "mb-3">
													<label class = "form-label"><strong>کد پستی</strong></label><input value = ' . $codposti . ' type = "text" class = "form-control bignumstyle" id = "codposti" name = "codposti"/>
												</div>
											</div>
										</div>
										<div class = "row">
											<div class = "col">
												<div class = "mb-3">
													<label class = "form-label"><strong>کد ملی</strong></label><input value = ' . $codmli . ' type = "text" class = "form-control" id = "codmli" name = "codmli"/>
												</div>
											</div>
										</div>
										<!--</form>-->
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class = "modal-footer">
						<button class = "btn btn-light" type = "button" data-bs-dismiss = "modal" onclick = "closemodal()">انصراف</button>
						<button class = "btn btn-primary" id = "edite-user-save" type = "submit">ذخیره</button>
					</div>
				</form>
    ';*/
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
        $sql = $sql.' and product_title LIKE ' . $keyword;
    }
    if (isset($_POST['sh_catgory'])) {
        $sh_catgory = "'%" . $_POST['sh_catgory'] . "%'";
        $sql = 'and product_cat = ' . $sh_catgory;
    }
    $sql = $sql . ' LIMIT ' . $start . ',' . $limit;
    $result = $con->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
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
								<td class = \"ad_pl_img\"><img src = \"product image/$product_image\"/>$product_title</td>
								<td>$product_cat</td>
								<td>$discount</td>
								<td>$product_price</td>
								<td>$quantity</td>
								<td class = \"ad_pl_trash\">
									<div class = \"d-flex flex-row justify-content-evenly\">
										<i class = \"fas fa-trash-alt\" style = \"color: #ef394e;\" onclick = \"alert()\"></i><i class = \"far fa-edit\" id = \"edite-user\" style = \"color: var(--bs-primary);\" onclick = \"editeuser()\"></i>
									</div>
								</td>
							</tr>";
        }
    } else {
        echo "موردی یافت نشد!";
    }
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


