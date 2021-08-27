<?php
session_start();
include 'action.php';
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>online shop</title>
    <link href="assets/img/13e7bddc-3c00-45ff-b8a4-84901b6e9b80.png"  rel="icon">
    <link href="assets/img/13e7bddc-3c00-45ff-b8a4-84901b6e9b80.png"  rel="apple-touch-icon">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="assets/css/Vazir.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="assets/css/addres.css">
    <link rel="stylesheet" href="assets/css/Contact-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/filter.css">
    <link rel="stylesheet" href="assets/css/home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.4.8/swiper-bundle.min.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <link rel="stylesheet" href="assets/css/Simple-Slider.css">
    <link rel="stylesheet" href="assets/css/untitled.css">
    <link rel="stylesheet" href="extracss.css">
</head>

<body id="page-top" >

<div id="wrapper" style="height: 100%;width: 100%;">
    <div class="d-flex flex-column" id="content-wrapper" >
        <div id="content">
            <!-- Start: nav1 header -->
            <nav  class="navbar navbar-light navbar-expand bg-white d-flex justify-content-center align-items-center mb-4 topbar static-top">
                <div class="container-fluid">
                    <ul class="navbar-nav">
                        <!-- Start: bascet cart -->
                        <li class="nav-item d-flex dropdown no-arrow mx-1"><a class="nav-link" href="#"><span class="badge bg-warning badge-counter" id="cart_badge_item_num">+</span><i class="fas fa-shopping-cart fa-fw"></i></a>
                            <!-- Start: dropdown_bascet -->
                            <div class="nav-item dropdown no-arrow" id="cart_dropdown" ><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href=""></a>
                                <div class="dropdown-menu dropdown-list animated--grow-in" id="cart_dropdown_menu">
                                    <h6 class="dropdown-header" id="cart_dropdown_header">11 کالا</h6>
                                    <ul class="list-unstyled d-block" id="cart_dropdown_list">
                                        <!-- Start: items -->
                                        <?php if (Get_cart_item()) {foreach (Get_cart_item()[0] as $itminfo) {echo '
                                            <a style="margin: 0px 5px 0px!important;display: flex!important;">
                                                <div id="bascet_dropdown_item_info">
                                                    <form method="post" action="">
                                                        <input type="hidden" value='.$itminfo[0].' name="rid" id="rid">
                                                        <button name="removeItemFromCart" id="removeItemFromCart"  class="btn btn-primary float-start" type="submit"><i class="far fa-trash-alt" style="color: var(--bs-gray-dark);"></i></button>
                                                    </form>
                                                    
                                                    <span id="CartItemName" >'.$itminfo[1].'</span>
                                                    <div class="d-flex justify-content-end">
                                                        <p style="margin-bottom: 0px;margin-right: 10px;">تومان</p>
                                                        <p id="CartItemPrice" style="margin-bottom: 0px;">'.$itminfo[2].'</p>
                                                    </div>
                                                </div>
                                                <div class="me-3" style="margin: 0px 5px 0px!important;">
                                                    <div class="bg-primary icon-circle" id="druopdown_prod_img"><img src="product_images/'. $itminfo[3].'" > </div>
                                                </div>
                                            </a>
                                            <hr/>
                                            ' ; }} ?>
                                        <!-- End: items -->
                                    </ul>
                                    <a href="cart.php" class="dropdown-item text-center small text-gray-500">مشاهده سبد خرید</a>
                                </div>
                            </div>
                            <!-- End: dropdown_bascet -->
                        </li>
                        <!-- End: bascet cart -->
                        <div class="d-none d-sm-block topbar-divider"></div>
                        <!-- Start: user nave -->
                        <li class="nav-item d-flex d-sm-flex d-md-flex d-lg-flex d-xl-flex d-xxl-flex justify-content-center align-items-center justify-content-md-center align-items-md-center dropdown no-arrow">
                            <!-- Start: not login -->
                            <div id="notloginpart" style="display: none!important;" class="text-nowrap d-flex d-sm-flex d-md-flex justify-content-center align-items-center justify-content-sm-center align-items-sm-center justify-content-md-center align-items-md-center"><a class="d-inline-flex justify-content-md-center align-items-md-center justify-content-lg-center align-items-lg-center" href="login_form.php"><span class="d-none d-print-inline d-sm-inline d-md-inline d-lg-inline d-xl-inline d-xxl-inline">ثبت نام /&nbsp;<br></span><span>ورود</span><i class="far fa-edit d-flex align-items-center" style="margin-left: 10px;"></i></a></div>
                            <!-- End: not login -->
                            <!-- Start: log in -->
                            <div id="loginpart" style="display: none!important" class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#"><span class="d-none d-lg-inline me-2 text-gray-600 small" id="header_username">name</span><i class="fa fa-user-o" style="color: var(--bs-gray-dark);font-size: 22px;"></i></a>
                                <div class="dropdown-menu shadow dropdown-menu-end animated--grow-in" style="text-align: right;direction: rtl;"><a class="dropdown-item" href="#"><i class="fas fa-user" id="profile_menu_ddn"></i>&nbsp;پروفایل کاربری</a><a class="dropdown-item" id="profile_menu_ddn" href="#"><i class="fas fa-cogs" id="profile_menu_ddn"></i>&nbsp;ویرایش اطلاعات</a><a class="dropdown-item" href="#"><i class="fas fa-donate" id="profile_menu_ddn"></i>تخفیف های من</a>
                                    <div class="dropdown-divider"></div><a class="dropdown-item" href="logout.php"><i class="fas fa-sign-out-alt" id="profile_menu_ddn"></i>&nbsp;خروج از حساب</a>
                                </div>
                            </div>
                            <!-- End: log in -->
                        </li>
                        <!-- End: user nave -->
                        <!-- Start: drup down shearching -->
                        <li class="nav-item dropdown d-md-none d-lg-none d-xl-none d-xxl-none no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#"><i class="fas fa-search" style="color: var(--bs-yellow);"></i></a>
                            <div class="dropdown-menu dropdown-menu-end p-3 animated--grow-in" aria-labelledby="searchDropdown" style="min-width: 260px;">
                                <form method="post" action="filters.php" class="me-auto navbar-search w-100">
                                    <div class="input-group"><input name="keyword" class="bg-light form-control border-0 small" type="text" placeholder=". . . جست وجو در کالاها" style="box-shadow: none;">
                                        <div class="input-group-append"><button class="btn btn-primary py-0" id="homeshbu" type="submit"><i class="fas fa-search"></i></button></div>
                                    </div>
                                </form>
                            </div>
                        </li>
                        <!-- End: drup down shearching -->
                    </ul>
                    <!-- Start: shearch_form -->
                    <form method="post" action="filters.php" class="d-none d-sm-none d-md-inline ms-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input name="keyword" class="bg-light form-control border-0 small" type="text" placeholder=". . . جست وجو در کالاها" style="box-shadow: none;">
                            <button class="btn btn-primary py-0" id="homeshbu" type="submit"><i class="fas fa-search"></i></button>
                        </div>
                    </form>
                    <!-- End: shearch_form -->

                    <!-- Start: logo -->
                    <div><img id="shop_logo" src="assets/img/13e7bddc-3c00-45ff-b8a4-84901b6e9b80.png"></div>
                    <!-- End: logo -->

                    <!-- Start: catgory mobile mood -->
                    <header class="text-end d-md-flex d-lg-none d-xl-none d-xxl-none justify-content-md-end" style="position: relative;z-index: 200;">
                        <button onclick = 'mobile_menu_button()' class="btn btn-primary" id="mobile_menu_button" type="button"><i class="fa fa-navicon" style="padding: 10px;color: #f4ae00;"></i></button>
                        <button  onclick = 'mobile_menu_button2()' class="btn btn-primary" id="mobile_menu_button2" type="button" style="overflow: auto;position: fixed;background: rgba(0,0,0,0.24);top: 0;width: 100%;height: 100%;bottom: 0;z-index: 200;left: 0;display: none;box-shadow: none;border: none;"></button>
                        <div id="mobile_mod_catgori_menu">
                            <div class="shadow-lg" id="mmcmenu">
                                <!-- Start: logo -->
                                <div class="d-md-flex justify-content-md-center"><img id="shop_logo" src="assets/img/13e7bddc-3c00-45ff-b8a4-84901b6e9b80.png"></div><!-- End: logo -->
                                <hr><!-- Start: mobile mod catgory list 1 -->
                                <ul class="list-unstyled text-end">
                                    <!-- Start: dasteha -->
                                    <li class="dastehali">
                                        <div class="d-flex justify-content-md-end align-items-md-center" id="dasteha"><i class="fas fa-angle-down me-auto" style="margin-left: 10px;"></i>
                                            <p style="margin: 0px;">دسته ها</p><i class="fas fa-sitemap" style="margin-left: 10px;color: var(--bs-dark);"></i>
                                        </div>
                                        <div id="dastehalist">
                                            <ul class="list-unstyled">
                                                <li>
                                                    <div style="padding: 5px;"><span>Text</span><i class="fa fa-caret-left" style="margin-left: 5px;"></i></div>
                                                </li>
                                                <li>
                                                    <div style="padding: 5px;"><span>Text</span><i class="fa fa-caret-left" style="margin-left: 5px;"></i></div>
                                                </li>
                                                <li>
                                                    <div style="padding: 5px;"><span>Text</span><i class="fa fa-caret-left" style="margin-left: 5px;"></i></div>
                                                </li>
                                            </ul>
                                        </div><script>
                                            document.getElementById("dasteha").addEventListener("click", displaychange);
                                            function displaychange() {
                                                var x = document.getElementById('dastehalist');
                                                if (x.style.display === 'none') {
                                                    x.style.display = 'block';
                                                } else {
                                                    x.style.display = 'none';
                                                }
                                            }
                                        </script>
                                    </li><!-- End: dasteha -->
                                    <!-- Start: list items -->
                                    <li class="d-flex justify-content-end" style="margin-right: 10px;margin-top: 16px;margin-bottom: 16px;cursor: pointer;">
                                        <div class="d-flex justify-content-md-end align-items-md-center">
                                            <p style="margin: 0px;">لیست کالای ذخیره</p><i class="fa fa-bookmark-o" style="margin-left: 10px;color: var(--bs-green);"></i>
                                        </div>
                                    </li><!-- End: list items -->
                                    <!-- Start: list items -->
                                    <li class="d-flex justify-content-end" style="margin-right: 10px;margin-top: 16px;margin-bottom: 16px;cursor: pointer;">
                                        <div class="d-flex justify-content-md-end align-items-md-center">
                                            <p style="margin: 0px;">تخفیفات</p><i class="fa fa-percent" style="margin-left: 10px;color: var(--bs-red);"></i>
                                        </div>
                                    </li><!-- End: list items -->
                                    <!-- Start: list items -->
                                    <li class="d-flex justify-content-end" style="margin-right: 10px;margin-top: 16px;margin-bottom: 16px;cursor: pointer;">
                                        <div class="d-flex justify-content-md-end align-items-md-center">
                                            <p style="margin: 0px;">پیشنهادات من</p><i class="fa fa-archive" style="margin-left: 10px;color: #633a11;"></i>
                                        </div>
                                    </li><!-- End: list items -->
                                    <!-- Start: list items -->
                                    <li class="d-flex justify-content-end" style="margin-right: 10px;margin-top: 16px;margin-bottom: 16px;cursor: pointer;">
                                        <div class="d-flex justify-content-md-end align-items-md-center"><a href="product.html">صفحه محصول</a><i class="fa fa-desktop" style="margin-left: 10px;color: #111111;"></i></div>
                                    </li><!-- End: list items -->
                                    <!-- Start: list items -->
                                    <li class="d-flex justify-content-end" style="margin-right: 10px;margin-top: 16px;margin-bottom: 16px;cursor: pointer;">
                                        <div class="d-flex justify-content-md-end align-items-md-center"><a href="cart.html">صفحه سبدکالا</a><i class="fa fa-desktop" style="margin-left: 10px;color: #111111;"></i></div>
                                    </li><!-- End: list items -->
                                    <!-- Start: list items -->
                                    <li class="d-flex justify-content-end" style="margin-right: 10px;margin-top: 16px;margin-bottom: 16px;cursor: pointer;">
                                        <div class="d-flex justify-content-md-end align-items-md-center"><a href="filters.html">صفحه جستو جوی کالا</a><i class="fa fa-desktop" style="margin-left: 10px;color: #111111;"></i></div>
                                    </li><!-- End: list items -->
                                    <!-- Start: list items -->
                                    <li class="d-flex justify-content-end" style="margin-right: 10px;margin-top: 16px;margin-bottom: 16px;cursor: pointer;">
                                        <div class="d-flex justify-content-md-end align-items-md-center"><a href="profile.html">صفحه پروفایل کاربری</a><i class="fa fa-desktop" style="margin-left: 10px;color: #111111;"></i></div>
                                    </li><!-- End: list items -->
                                </ul><!-- End: mobile mod catgory list 1 -->
                                <hr>
                            </div>
                        </div>
                    </header>
                    <!-- End: catgory mobile mood -->
                </div>
            </nav>
            <!-- End: nav1 header -->

            <!-- Start: catgory pc mood -->
            <header  class="d-none d-lg-inline d-xl-inline d-xxl-inline" id="pc_catgory_nave">
                <ul class="list-inline text-end d-lg-flex justify-content-lg-end" style="background: var(--bs-white);">
                    <!-- Start: other items -->
                    <li class="list-inline-item d-lg-flex align-items-lg-center" style="margin-right: 10px;margin-left: 10px;"><a href="product.html">صفحه محصول</a><i class="fa fa-desktop" style="margin-left: 5px;"></i></li><!-- End: other items -->
                    <!-- Start: other items -->
                    <li class="list-inline-item d-lg-flex align-items-lg-center" style="margin-right: 10px;margin-left: 10px;"><a href="filters.html">صفحه جست و جوی&nbsp; کالا</a><i class="fa fa-desktop" style="margin-left: 5px;"></i></li><!-- End: other items -->
                    <!-- Start: other items -->
                    <li class="list-inline-item d-lg-flex align-items-lg-center" style="margin-right: 10px;margin-left: 10px;"><a href="register.html">ورود و ریجستر</a><i class="fa fa-desktop" style="margin-left: 5px;"></i></li><!-- End: other items -->
                    <!-- Start: other items -->
                    <li class="list-inline-item d-lg-flex align-items-lg-center" style="margin-right: 10px;margin-left: 10px;"><a id="a" href="cart.html">صفحه سبد خرید</a><i class="fa fa-desktop" style="margin-left: 5px;color: var(--bs-blue)!هئحخقفشد;"></i></li><!-- End: other items -->
                    <!-- Start: other items -->
                    <li class="list-inline-item d-lg-flex align-items-lg-center" style="margin-right: 10px;margin-left: 10px;">تخفیف ها<i class="fas fa-percent" style="margin-left: 5px;color: rgb(133, 135, 150);"></i>
                        <div class="d-none d-sm-block topbar-divider" style="width: 0;border-right: 1px solid #e3e6f0;height: calc(4.375rem - 2rem);margin: auto 1rem;"></div>
                    </li><!-- End: other items -->
                    <!-- Start: main catgory item -->
                    <li class="list-inline-item d-lg-flex align-items-lg-center" id="allCatgory">دسته بندی ها<i class="fas fa-align-justify" style="margin-left: 5px;"></i>
                        <div id="catgorylist">
                            <ul class="list-unstyled border rounded-0 shadow">
                                <!-- Start: catgory list item -->
                                <li id="dasteh">
                                    <div class="d-flex justify-content-lg-center align-items-lg-center"><i class="fas fa-chevron-left me-auto" style="font-size: 10px;"></i>
                                        <p class="ms-auto" style="margin: 0px;">دسته ها</p><i class="fa fa-sitemap ms-auto"></i>
                                    </div>
                                    <div class="border rounded-0" id="dastehlist">
                                        <ul class="list-unstyled text-end" style="width: 257px;">
                                            <!-- Start: item -->
                                            <?php foreach (get_categories() as $id => $name){echo '
                                            <a href="filters.php?categori='.$id.'">
                                            <li style="margin: 10px;width: 100px;">'.$name.'</li></a>
                                            ';} ?>
                                            <!-- End: item -->
                                        </ul>
                                    </div>
                                </li><!-- End: catgory list item -->
                            </ul>
                        </div>
                    </li>
                    <!-- End: main catgory item -->
                </ul>
            </header>
            <!-- End: catgory pc mood -->

            <script>
                var cart_badge_item_num = '<?php echo Count_User_cart_item();?>';
                $("#cart_badge_item_num").text(cart_badge_item_num + "+");
                $("#cart_dropdown_header").text(cart_badge_item_num + " کالا ");
                var user_login_state = '<?php echo user_login_state() ;?>';
                if (user_login_state == 0) {
                    $('#notloginpart').css('display', 'inline');
                    //$('#loginpart').css('display','none');
                } else {
                    //$('#notloginpart').css('display','none');
                    $('#loginpart').css('display', 'inline');
                    $('#header_username').text(user_login_state + ' خوش آمدید ')
                }
                ;
            </script>
            <script>
                function mobile_menu_button() {
                    document.getElementById("mobile_mod_catgori_menu").style.display = 'block' ;
                    document.getElementById("mobile_menu_button2").style.display = 'block' ;
                }
                function mobile_menu_button2() {
                    document.getElementById("mobile_mod_catgori_menu").style.display = 'none' ;
                    document.getElementById("mobile_menu_button2").style.display = 'none' ;
                }
            </script>