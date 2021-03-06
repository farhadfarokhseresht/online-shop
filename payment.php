<?php
session_start();
include 'app\payment.php';
include 'app\action.php';
include 'app\getCities.php';

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
                        <li class="list-inline-item d-flex justify-content-center align-items-center barlist_item"><span>?????????? ?? ??????????&nbsp;</span><i class="fas fa-shipping-fast" style="margin-left: 10px;"></i></li>
                        <li class="list-inline-item d-flex justify-content-center align-items-center barlist_item"><span>????????????</span><i class="fas fa-money-check" style="margin-left: 10px;"></i></li>
                        <li class="list-inline-item d-flex justify-content-center align-items-center barlist_activ"><span>???????? ??????????</span><i class="fas fa-map-marker-alt" style="margin-left: 10px;"></i></li>
                    </ul>
                </div>
                <!-- End: hade bar -->

                <!-- Start: buy part -->
                <div id="buypart" style="display: none" class="container-fluid"  style="margin-bottom: 100px;">
                    <div class="row d-flex justify-content-center align-items-center" style="margin-top: 50px;">
                        <!-- Start: buy info part -->
                        <div class="col-auto d-flex" style="margin-bottom: 10px;">
                            <div id="paymentpart" class="text-end border rounded d-grid" style="background: #ffffff;width: 300px;">
                                <!-- Start: pric part -->
                                <div style="padding: 10px;display: flex;">
                                    <!-- Start: p price -->
                                    <span class="me-auto"><span id="payment_tprice" style="margin-left: 5px;">Text</span>??????????</span>
                                    <!-- End: p price -->
                                    <!-- Start: p numbers -->
                                    <span id="payment_numbers" style="margin-right: 10px;">( 5 )</span>
                                    <!-- End: p numbers -->
                                    <span>???????? ???????? ????&nbsp;</span>
                                </div>
                                <!-- End: pric part -->
                                <hr>
                                <!-- Start: les price part -->
                                <div style="padding: 10px;display: flex;color: var(--bs-red);"><span class="me-auto"><span id="payment_lprice"  style="margin-left: 5px;">0</span>??????????</span><span>??????????</span></div>
                                <!-- End: les price part -->
                                <hr>
                                <!-- Start: sum price -->
                                <div style="padding: 10px;display: flex;color: var(--bs-dark);font-weight: bold;"><span class="me-auto"><span id="payment_fprice"  style="margin-left: 5px;">Text</span>??????????</span><span>?????? ????</span></div>
                                <!-- End: sum price -->
                                <button class="btn btn-primary" type="button" style="margin: 10px;">?????????? ???????????? ????????</button>
                                <a href="cart.php" class="backtocart"><i class="fa fa-arrow-left"></i>???????????? ???? ?????? ???????? </a>
                            </div>
                        </div>
                        <!-- End: buy info part -->
                        <!-- Start: addres info part -->
                        <div class="col-sm-7">
                            <div class="border rounded shadow" style="width: 100%;height: 100%;background: #ffffff;">
                                <div style="text-align: right;margin: 5px;"><span style="color: var(--bs-dark);font-size: 14px;">???????? ??????????</span>
                                    <!-- Start: addres 1 -->
                                    <p id="address1" style="margin-top: 9px;"><?php echo $address_list[3];?></p>
                                    <!-- End: addres 1 -->
                                    <hr>
                                    <!-- Start: name -->
                                    <div class="d-md-flex justify-content-md-end align-items-md-center" style="margin-right: 10px;">
                                        <span id="rfname"><?php echo $address_list[9]." ".$address_list[10];?></span><i class="fa fa-user" style="margin-left: 5px;"></i></div>
                                    <!-- End: name -->
                                    <!-- Start: post cod -->
                                    <div class="d-md-flex justify-content-md-end align-items-md-center" style="margin-right: 10px;">
                                        <span id="codposti"><?php echo $address_list[7];?></span><i class="fa fa-barcode" style="margin-left: 5px;"></i></div>
                                    <!-- End: post cod -->
                                    <!-- Start: phone number -->
                                    <div class="d-md-flex justify-content-md-end align-items-md-center" style="margin-right: 10px;">
                                        <span id="rphone"><?php echo $address_list[11];?></span><i class="fa fa-phone-square" style="margin-left: 5px;"></i></div>
                                    <!-- End: phone number -->
                                    <!-- Start: addres 2 -->
                                    <div class="d-flex justify-content-sm-end align-items-sm-center" style="margin-right: 10px;">
                                        <p id="address2" style="margin-bottom: 0px;"><?php echo $address_list[4];?></p><i class="fa fa-map-marker" style="margin-left: 5px;"></i>
                                    </div>
                                    <!-- End: addres 2 -->
                                    <hr>
                                        <a href="" style="margin-right: 50%"><i class="fa fa-edit" style="color: #8b2c23"></i></a>
                                </div>
                            </div>
                        </div>
                        <!-- End: addres info part -->
                    </div>
                </div>
                <!-- End: buy part -->

                <!-- Start: add addres -->
                <section style="display: " id="addadrespart"  class="contact-clean">
                    <form class="border rounded addressform" method="post" action="">
                        <h2 class="text-end">???????????? ????????<br></h2>
                        <div class="d-grid d-sm-flex">
                            <div class="text-end" id="addres_div1"><label class="form-label" id="addres_div1_lab">??????</label>
                                <select onchange="citychange()" class="form-select" id="city" name="city">
                                    <?php foreach ($cities as $id => $name){ echo '<option value='.$id.'>'.$name.'</option>';} ?>
                                </select>
                            </div>
                            <div class="text-end" id="addres_div1"><label class="form-label" id="addres_div1_lab">??????????</label>
                                <select onchange="this.form.submit()"  class="form-select "  name="province_id" id="province_id" >
                                    <option value="0">?????????? ???? ???????????? ????????</option>
                                    <option value="1">?????????????????? ????????</option>
                                    <option value="2">?????????????????? ????????</option>
                                    <option value="3">????????????</option>
                                    <option value="4">????????????</option>
                                    <option value="5">??????????</option>
                                    <option value="6">??????????</option>
                                    <option value="7">??????????</option>
                                    <option value="8">??????????</option>
                                    <option value="9">???????????????? ??????????????</option>
                                    <option value="10">???????????? ??????????</option>
                                    <option value="11">???????????? ????????</option>
                                    <option value="12">???????????? ??????????</option>
                                    <option value="13">??????????????</option>
                                    <option value="14">??????????</option>
                                    <option value="15">??????????</option>
                                    <option value="16">???????????? ?? ????????????????</option>
                                    <option value="17">????????</option>
                                    <option value="18">??????????</option>
                                    <option value="19">????</option>
                                    <option value="20">??????????????</option>
                                    <option value="21">??????????</option>
                                    <option value="22">????????????????</option>
                                    <option value="23">???????????????? ?? ????????????????</option>
                                    <option value="24">????????????</option>
                                    <option value="25">??????????</option>
                                    <option value="26">????????????</option>
                                    <option value="27">????????????????</option>
                                    <option value="28">??????????</option>
                                    <option value="29">??????????????</option>
                                    <option value="30">??????????</option>
                                    <option value="31">??????</option>
                                </select>
                            </div>

                        </div>
                        <hr>
                        <div class="d-grid d-sm-flex">
                            <div class="text-end" id="addres_div1"><label class="form-label" id="addres_div1_lab">?????????? ????????</label><input minlength="10" name="address1" class="border rounded form-control" type="text" placeholder=" . . . ???????? ?????? ???? ???????? ????????" style="text-align: center;"></div>
                        </div>
                        <hr>
                        <div class="d-grid d-sm-flex">
                            <div class="text-end" id="addres_div1"><label class="form-label" id="addres_div1_lab">????????????</label><input minlength="5" class="border rounded form-control form-control-sm" type="text" name="codposti" style="min-width: 200px;"></div>
                            <div class="text-end" id="addres_div1"><label class="form-label" id="addres_div1_lab">????????</label><input  class="border rounded form-control" type="text" name="vahed"></div>
                            <div class="text-end" id="addres_div1"><label class="form-label" id="addres_div1_lab">????????</label><input  class="border rounded form-control" type="text" name="plack"></div>
                        </div>
                        <hr>
                        <div class="d-grid d-sm-flex">
                            <div class="text-end" id="addres_div1"><label class="form-label">???? ??????</label><input minlength="9" class="border rounded form-control inputtextstyle" type="text" name="codmli"></div>
                        </div>
                        <div class="d-grid d-sm-flex">
                            <div class="text-end" id="addres_div1"><label class="form-label text-nowrap" id="addres_div1_lab" style="margin-left: -160.5px;">?????? ???????????????? ????????????</label><input minlength= "3" class="border rounded form-control" type="text" name="rlname"></div>
                            <div class="text-end" id="addres_div1"><label class="form-label" id="addres_div1_lab">&nbsp;?????? ????????????</label><input minlength= "4"   class="border rounded form-control" type="text" name="rfname"></div>
                        </div>
                        <div class="d-grid d-sm-flex">
                            <div class="text-end" id="addres_div1"><label class="form-label">?????????? ?????????? ????????????</label><input pattern="[0]+[0-9]{10}"  class="border rounded-pill form-control inputtextstyle" type="text" name="rphone" id="rphone" ></div>
                        </div>
                        <div class="mb-3"><button class="btn btn-primary" id="addadressbu" name="addadressbu" type="submit">?????????? ?? ?????? ????????</button></div>
                        <a href="cart.php" class="backtocart"><i class="fa fa-arrow-left"></i>???????????? ???? ?????? ???????? </a>
                    </form>
                </section>
                <!-- End: add addres -->

            <?php include_once 'footer.php' ?>
                <script>
                    //var cart_badge_item_num = '<?php //echo Count_User_cart_item();?>//';
                    //var totalprice = '<?php //echo Get_cart_item()[1];?>//';
                    $('#payment_numbers').text("("+cart_badge_item_num +")");
                    $('#payment_price').text(totalprice);
                    $('#payment_tprice').text(totalprice);
                    $('#payment_fprice').text(totalprice);
                    // address
                    var address_state = '<?php echo $address_state ;?>';
                    if (address_state == 0) {
                        $('#addadrespart').css('display', 'inline');
                        $('#buypart').css('display', 'none');
                    } else {
                        $('#addadrespart').css('display', 'none');
                        $('#buypart').css('display', 'inline');
                    }

                    //
                    var province_id = '<?php echo $province_id;?>';
                    if(province_id != ""){
                        var item = $('#province_id option[value='+province_id+']')
                        item.attr('selected', 'selected')
                    }
                </script>