<?php
session_start();
include 'process\action.php';

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
    <script src="assets/js/jquery.min.js"></script>
</head>

<body  id="page-top" >
    <div id="wrapper" style="height: 100%;width: 100%;">
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <!-- Start: hade bar -->
                <div class="text-center">
                    <ul class="list-inline border rounded d-flex justify-content-center align-items-center barlist">
                        <li class="list-inline-item d-flex justify-content-center align-items-center barlist_item"><span>اتمام و ارسال&nbsp;</span><i class="fas fa-shipping-fast" style="margin-left: 10px;"></i></li>
                        <li class="list-inline-item d-flex justify-content-center align-items-center barlist_item"><span>پرداخت</span><i class="fas fa-money-check" style="margin-left: 10px;"></i></li>
                        <li class="list-inline-item d-flex justify-content-center align-items-center barlist_activ"><span>آدرس ارسال</span><i class="fas fa-map-marker-alt" style="margin-left: 10px;"></i></li>
                    </ul>
                </div>
                <!-- End: hade bar -->

                <!-- Start: buy part -->
                <div class="container-fluid"  style="margin-bottom: 100px;">
                    <div class="row d-flex justify-content-center align-items-center" style="margin-top: 50px;">
                        <!-- Start: buy info part -->
                        <div class="col-auto d-flex" style="margin-bottom: 10px;">
                            <div id="paymentpart" class="text-end border rounded d-grid" style="background: #ffffff;width: 300px;">
                                <!-- Start: pric part -->
                                <div style="padding: 10px;display: flex;">
                                    <!-- Start: p price -->
                                    <span class="me-auto"><span id="payment_tprice" style="margin-left: 5px;">Text</span>تومان</span>
                                    <!-- End: p price -->
                                    <!-- Start: p numbers -->
                                    <span id="payment_numbers" style="margin-right: 10px;">( 5 )</span>
                                    <!-- End: p numbers -->
                                    <span>قیمت کالا ها&nbsp;</span>
                                </div>
                                <!-- End: pric part -->
                                <hr>
                                <!-- Start: les price part -->
                                <div style="padding: 10px;display: flex;color: var(--bs-red);"><span class="me-auto"><span id="payment_lprice"  style="margin-left: 5px;">0</span>تومان</span><span>تخفیف</span></div>
                                <!-- End: les price part -->
                                <hr>
                                <!-- Start: sum price -->
                                <div style="padding: 10px;display: flex;color: var(--bs-dark);font-weight: bold;"><span class="me-auto"><span id="payment_fprice"  style="margin-left: 5px;">Text</span>تومان</span><span>جمع کل</span></div>
                                <!-- End: sum price -->
                                <button class="btn btn-primary" type="button" style="margin: 10px;">ادامه فرایند خرید</button>
                                <a href="cart.php" class="backtocart"><i class="fa fa-arrow-left"></i>بازگشت به سبد خرید </a>
                            </div>
                        </div>
                        <!-- End: buy info part -->
                        <!-- Start: addres info part -->
                        <div class="col">
                            <div class="border rounded shadow" style="width: 100%;height: 100%;background: #ffffff;">
                                <div style="text-align: right;margin: 5px;"><span style="color: var(--bs-dark);font-size: 14px;">آدرس ارسال</span>
                                    <!-- Start: addres 1 -->
                                    <p style="margin-top: 9px;">آدرس....</p>
                                    <!-- End: addres 1 -->
                                    <hr>
                                    <!-- Start: name -->
                                    <div class="d-md-flex justify-content-md-end align-items-md-center" style="margin-right: 10px;"><span>&nbsp;..... آقای/خانم&nbsp;</span><i class="fa fa-user" style="margin-left: 5px;"></i></div>
                                    <!-- End: name -->
                                    <!-- Start: post cod -->
                                    <div class="d-md-flex justify-content-md-end align-items-md-center" style="margin-right: 10px;"><span>کد پسیتی</span><i class="fa fa-barcode" style="margin-left: 5px;"></i></div>
                                    <!-- End: post cod -->
                                    <!-- Start: phone number -->
                                    <div class="d-md-flex justify-content-md-end align-items-md-center" style="margin-right: 10px;"><span>09380084250</span><i class="fa fa-phone-square" style="margin-left: 5px;"></i></div>
                                    <!-- End: phone number -->
                                    <!-- Start: addres 2 -->
                                    <div class="d-flex justify-content-sm-end align-items-sm-center" style="margin-right: 10px;">
                                        <p style="margin-bottom: 0px;">Paragraph</p><i class="fa fa-map-marker" style="margin-left: 5px;"></i>
                                    </div>
                                    <!-- End: addres 2 -->
                                    <hr>
                                    <button class="btn btn-primary d-flex d-sm-flex d-md-flex justify-content-start align-items-start justify-content-sm-start align-items-sm-start justify-content-md-start align-items-md-start addres_del_butn" type="button"><i class="fa fa-edit"></i></button>

                                </div>
                            </div>
                        </div>
                        <!-- End: addres info part -->
                    </div>
                </div>
                <!-- End: buy part -->

                <!-- Start: add addres -->
                <section  class="contact-clean">
                    <form class="border rounded addressform" method="post">
                        <h2 class="text-end">جزییات آدرس<br></h2>
                        <div class="d-grid d-sm-flex">
                            <div class="text-end" id="addres_div1"><label class="form-label" id="addres_div1_lab">شهر</label><select class="form-select" id="addres_div1_select" name="city"></select></div>
                            <div class="text-end" id="addres_div1"><label class="form-label" id="addres_div1_lab">استان</label><select class="form-select" id="addres_div1_select" name="ostan"></select></div>
                        </div>
                        <hr>
                        <div class="d-grid d-sm-flex">
                            <div class="text-end" id="addres_div1"><label class="form-label" id="addres_div1_lab">نشانی پستی</label><input class="border rounded form-control" type="text" placeholder=" . . . آدرس خود را وارد کنید" style="text-align: center;"></div>
                        </div>
                        <hr>
                        <div class="d-grid d-sm-flex">
                            <div class="text-end" id="addres_div1"><label class="form-label" id="addres_div1_lab">کدپستی</label><input class="border rounded form-control form-control-sm" type="text" name="codposti" style="min-width: 200px;"></div>
                            <div class="text-end" id="addres_div1"><label class="form-label" id="addres_div1_lab">واحد</label><input class="border rounded form-control" type="text" name="رشاثی"></div>
                            <div class="text-end" id="addres_div1"><label class="form-label" id="addres_div1_lab">پلاک</label><input class="border rounded form-control" type="text" name="plack"></div>
                        </div>
                        <hr>
                        <div class="d-grid d-sm-flex">
                            <div class="text-end" id="addres_div1"><label class="form-label">کد ملی</label><input class="border rounded form-control inputtextstyle" type="text" name="codmli"></div>
                        </div>
                        <div class="d-grid d-sm-flex">
                            <div class="text-end" id="addres_div1"><label class="form-label text-nowrap" id="addres_div1_lab" style="margin-left: -160.5px;">نام خانوادگی گیرنده</label><input class="border rounded form-control" type="text" name="rfname"></div>
                            <div class="text-end" id="addres_div1"><label class="form-label" id="addres_div1_lab">&nbsp;نام گیرنده</label><input class="border rounded form-control" type="text" name="rname"></div>
                        </div>
                        <div class="d-grid d-sm-flex">
                            <div class="text-end" id="addres_div1"><label class="form-label">شماره مبایل گیرنده</label><input class="border rounded-pill form-control inputtextstyle" type="text" name="rphonenum"></div>
                        </div>
                        <div class="mb-3"><button class="btn btn-primary" id="addadressbu">تایید و ثبت آدرس</button></div>
                        <a href="cart.php" class="backtocart"><i class="fa fa-arrow-left"></i>بازگشت به سبد خرید </a>
                    </form>
                </section>
                <!-- End: add addres -->

            <?php include_once 'footer.php' ?>
                <script>
                    var cart_badge_item_num = '<?php echo Count_User_cart_item();?>';
                    var totalprice = '<?php echo Get_cart_item()[1];?>';
                    $('#payment_numbers').text("("+cart_badge_item_num +")");
                    $('#payment_price').text(totalprice);
                    $('#payment_tprice').text(totalprice);
                    $('#payment_fprice').text(totalprice);
                    var address_state = '<?php echo "" ;?>';
                    if (address_state == 0) {
                        $('#').css('display', 'inline');
                    } else {
                        $('#').css('display', 'inline');

                    }
                </script>
