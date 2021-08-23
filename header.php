<?php
session_start();
include 'action.php';
?>
<?php



?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Blank Page - Brand</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="assets/css/Vazir.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/material-icons.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.4.8/swiper-bundle.min.css">
    <link rel="stylesheet" href="assets/css/Simple-Slider.css">
    <link rel="stylesheet" href="assets/css/untitled.css">
    <link rel="stylesheet" href="assets/css/filter.css">
    <script src="assets/js/jquery.min.js"></script>

</head>

<body id="page-top">
<div id="wrapper">
    <div class="d-flex flex-column" id="content-wrapper">
        <div id="content">
            <!-- Start: nav1 header -->
            <nav class="navbar navbar-light navbar-expand bg-white d-flex mb-4 topbar static-top">
                <div class="container-fluid">
                    <ul class="navbar-nav">

                        <!-- Start: bascet cart -->
                        <li class="nav-item d-flex dropdown no-arrow mx-1"><a class="nav-link" href="#"><span class="badge bg-warning badge-counter" id="cart_badge_item_num">+</span><i class="fas fa-shopping-cart fa-fw"></i></a>
                            <!-- Start: dropdown_bascet -->
                            <div class="nav-item dropdown no-arrow" id="cart_dropdown"><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#"></a>
                                <div class="dropdown-menu dropdown-list animated--grow-in" id="cart_dropdown_menu">
                                    <h6 class="dropdown-header" id="cart_dropdown_header"></h6>

                                    <ul class="list-unstyled d-block" id="cart_dropdown_list">
                                        <li id="cart_dropdown_list_item">
                                            <!-- Start: drup down item -->
                                            <?php if (Get_cart_item()) {foreach (Get_cart_item()[0] as $itminfo) {echo '
                                            <a style="margin: 0px 5px 0px!important;display: flex!important;">
                                                <div id="bascet_dropdown_item_info">
                                                    <form method="post" action="">
                                                        <input type="hidden" value='.$itminfo[0].' name="rid" id="rid">
                                                        <button name="removeItemFromCart" id="removeItemFromCart"  class="btn btn-primary float-start" type="submit"><i class="far fa-trash-alt" style="color: var(--bs-gray-dark);"></i></button>
                                                    </form>
                                                    
                                                    <span id="CartItemName-1" class="small text-gray-500">'.$itminfo[1].'</span>
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
                                            <!-- End: drup down item -->
                                        </li>
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
                            <div style="display: none!important;" id="notloginpart" class="d-flex d-sm-flex d-md-flex justify-content-center align-items-center justify-content-sm-center align-items-sm-center justify-content-md-center align-items-md-center"><a class="d-flex justify-content-md-center align-items-md-center justify-content-lg-center align-items-lg-center" style="text-decoration-line: none;margin-right: 5px;" href="login_form.php"><span class="d-none d-md-none d-lg-inline d-xl-inline d-xxl-inline" style="margin-right: 5px;color: var(--bs-dark);">&nbsp;به حساب کاربری / ثبت نام<br></span><span style="color: var(--bs-dark);">ورود</span><i class="far fa-edit" style="margin-left: 10px;color: var(--bs-gray-dark);"></i></a></div>
                            <!-- End: not login -->

                            <!-- Start: log in -->
                            <div style="display: none!important;" id="loginpart" class="nav-item dropdown no-arrow">
                            <a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#">
                            <span class="d-none d-lg-inline me-2 text-gray-600 small" id="header_username">username</span><i class="fa fa-user-o" style="color: var(--bs-gray-dark);font-size: 22px;"></i></a>
                                <div class="dropdown-menu shadow dropdown-menu-end animated--grow-in">
                                    <a class="dropdown-item" href="#"><i class="fas fa-user fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;پروفایل کاربری</a>
                                    <a class="dropdown-item" href="#"><i class="fas fa-cogs fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;ویرایش اطلاعات</a>
                                    <a class="dropdown-item" href="#"><i class="fas fa-donate fa-sm fa-fw me-2 text-gray-400"></i>تخفیف های من</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="logout.php"><i class="fas fa-sign-out-alt fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;خروج از حساب</a>
                                </div>
                            </div>
                            <!-- End: log in -->

                        </li>
                        <!-- End: user nave -->

                        <!-- Start: drup down shearching -->
                        <li class="nav-item dropdown d-sm-none no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#"><i class="fas fa-search"></i></a>
                            <div class="dropdown-menu dropdown-menu-end p-3 animated--grow-in" aria-labelledby="searchDropdown">
                                <form  method="post" action="filters.php" class="me-auto navbar-search w-100">
                                    <div class="input-group"><input name="keyword" class="bg-light form-control border-0 small" type="text" placeholder="Search for ...">
                                        <div class="input-group-append"><button class="btn btn-primary py-0" type="submit" style="height: 32px;background: rgba(246,194,62,0.58);border-top-left-radius: 0px;border-bottom-left-radius: 0px;border-style: none;"><i class="fas fa-search"></i></button></div>
                                    </div>
                                </form>
                            </div>
                        </li>
                        <!-- End: drup down shearching -->

                    </ul>

                    <!-- Start: shearch_form -->
                    <form method="post" action="filters.php" class="d-none d-sm-inline ms-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group"><input name="keyword" class="bg-light form-control border-0 small" type="text" placeholder=". . . جست وجو در کالاها"><button class="btn btn-primary py-0" type="submit" style="background: rgba(246,194,62,0.58);border-style: none;border-color: var(--bs-gray-dark);"><i class="fas fa-search"></i></button></div>
                    </form>
                    <!-- End: shearch_form -->

                    <!-- Start: logo -->
                    <a href="index.php">
                        <div style="margin-left: 15px;"><img src="https://www.digikala.com/static/files/2a4774d7.svg"></div>
                    </a>
                    <!-- End: logo -->

                </div>
            </nav>
            <!-- End: nav1 header -->

            <script>
                var cart_badge_item_num =  '<?php echo Count_User_cart_item() ;?>';
                $("#cart_badge_item_num").text(cart_badge_item_num+"+");
                $("#cart_dropdown_header").text( cart_badge_item_num + " کالا ");

                var user_login_state = '<?php echo user_login_state() ;?>';
                if (user_login_state == 0){
                  $('#notloginpart').css('display','inline');
                  //$('#loginpart').css('display','none');
                }else{
                    //$('#notloginpart').css('display','none');
                    $('#loginpart').css('display','inline');
                    $('#header_username').text(user_login_state+' خوش آمدید ')
                };
            </script>