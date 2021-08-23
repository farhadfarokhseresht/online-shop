<?php
include "header.php";
?>

<?php $totalprice = Get_cart_item()[1];$N = Get_cart_item()[2];?>
<?php $items = Get_cart_item()[0] ;?>


    <!-- Start: main_part -->
    <div class="container-fluid d-grid" id="main_part">
        <h3 class="text-end mb-1">&nbsp;سبد خرید شما&nbsp;</h3>
        <hr style="margin-top: 0px;">

        <!-- Start: full cart -->
        <div style="display: none!important;" id="fullcart" class="row justify-content-center justify-content-sm-start justify-content-md-center justify-content-lg-center">
            <!-- Start: paymentbox -->
            <div class="col-3 col-lg-4 col-xl-3 col-xxl-3 d-none d-sm-none d-md-none d-lg-inline d-xl-inline d-xxl-inline card_col_right" id="paymentboxcol">
                <div class="row">
                    <div class="col d-none d-sm-none d-md-none d-lg-inline d-xl-inline d-xxl-inline card_col_right" id="paymentboxcol_col">
                        <!-- Start: سطر1 قیمت -->
                        <div class="d-flex"><span class="me-auto">تومان</span><span class="me-auto me-auto" id="price">xxx</span><span class="ms-auto">قیمت کالاها (
                                <span id="N" >5</span>
                                )<br></span></div>
                        <!-- End: سطر1 قیمت -->
                        <!-- Start: سطر2 قیمت -->
                        <div class="d-flex"><span class="me-auto" style="color: var(--bs-red);">تومان</span><span class="me-auto" id="pprice" style="color: var(--bs-red);">xxx<br></span><span class="ms-auto">تخفیف کالاها<br></span></div>
                        <!-- End: سطر2 قیمت -->
                        <!-- Start: سطر3 قیمت -->
                        <div class="d-flex"><span class="me-auto" style="color: var(--bs-red);">(xxxx٪)&nbsp;<br></span></div>
                        <!-- End: سطر3 قیمت -->
                        <hr>
                        <!-- Start: سطر جمع قیمت -->
                        <div class="d-flex" style="margin-top: 10px;"><span class="me-auto" style="margin-right: 55px;color: var(--bs-dark);font-style: normal;font-weight: bold;">تومان</span><span class="me-auto" id="CartItemTotalPrice">xxxx</span><span class="ms-auto" style="color: var(--bs-dark);font-style: normal;font-weight: bold;">: جمع خرید&nbsp;<br></span></div>
                        <!-- End: سطر جمع قیمت -->

                        <p style="font-size: 10px;text-align: center;margin-top: 11px;">هزینه‌ی ارسال در ادامه بر اساس آدرس، زمان و نحوه‌ی ارسال انتخابی شما‌ محاسبه و به این مبلغ اضافه خواهد شد<br></p>
                        <button class="btn btn-primary border rounded shadow" id="buybutton" type="submit">تکمیل فرایند خرید</button>
                    </div>
                </div>
                <p style="margin: 10px;font-size: 10px;text-align: right;">کالاهای موجود در سبد شما ثبت و رزرو نشده‌اند، برای ثبت سفارش مراحل بعدی را تکمیل کنید.<br></p>

                <!-- Start: extra -->
                <div class="row">
                    <div class="col d-none d-sm-none d-md-none d-lg-inline d-xl-inline d-xxl-inline card_col_right" id="paymentboxcol_col">
                        <hr>
                    </div>
                </div>
                <!-- End: extra -->

            </div>
            <!-- End: paymentbox -->

            <!-- Start: cart items box -->
            <div class="col-auto col-md-10 col-lg-7 card_col_right" id="cart_item_box">
                <ul class="list-unstyled text-center">

                    <!-- Start: cart list item box -->
                    <li id="cart_list_item" class="cart_list_item" style="display: none!important;" >
                        <div style="display: block;width: 100%;margin-bottom: 20px;">
                            <div class="d-flex">
                                <!-- Start: card item data -->
                                <div class="d-block" id="cart_item_data">
                                    <div id="cart_item_name">
                                        <p id="CartItemName">name<br></p>
                                    </div>
                                    <div id="cart_item_info">
                                        <p class="d-md-flex justify-content-md-end">xxxxxxxxxx<i class="fa fa-chevron-circle-left"></i></p>
                                    </div>
                                </div>
                                <!-- End: card item data -->

                                <!-- Start: card_list_image -->
                                <div class="card_list_image"><img id="productimg" class="rounded" src="" ></div>
                                <!-- End: card_list_image -->
                            </div>
                            <div class="d-flex" style="margin: 0px;margin-bottom: 0px;padding-bottom: 0px;">
                                <!-- Start: card item price -->
                                <div id="cart_item_price">
                                    <p class="text-danger d-flex" style="margin: 0px;"><span>تومان</span><span style="margin-right: 10px;margin-left: 10px;">xxx</span><span>تخفیف</span></p>
                                    <p class="d-flex" style="margin: 0px;"><span>تومان</span><span id="P_price" style="margin-left: 10px;">xxxx</span></p>
                                </div>
                                <!-- End: card item price -->
                                <!-- Start: card item num -->
                                <div class="d-flex" style="width: 28%;min-width: 104px;">
                                    <div style="width: 100%;height: 44px;display: -webkit-box;margin-top: 4px;margin-left: -99px;">
                                        <form action="cart.php" method="post" >
                                        <button name="removeItemFromCart" id="removeItemFromCart" class="btn btn-primary d-flex justify-content-center align-items-center" type="submit" style="background: rgba(78,115,223,0);color: var(--bs-secondary);border-style: none;margin-top: 20px;">حذف<i class="fa fa-trash-o"></i></button>
                                        <input  type="hidden" value='' name="rid" id="rid">
                                        </form>
                                    </div>
                                    <form action="cart.php" method="post" style="display: contents" >
                                        <div style="width: 100%;height: 44px;display: -webkit-box;display: flex;border: 1px solid #eee;border-radius: 8px;color: #0fabc6;font-size: 15px;font-size: 1.071rem;line-height: 1.467;justify-content: space-between;align-items: center;margin-top: 4px;">
                                            <button name="button_qty_rm" id="button_qty_rm" class="btn btn-primary"  type="submit">-</button>
                                            <p class="d-flex d-sm-flex justify-content-center align-items-center justify-content-sm-center align-items-sm-center" id="qty_box">xx</p>
                                            <button name="button_qty_add" id="button_qty_add" class="btn btn-primary"  type="submit">+</button>
                                            <input  type="hidden" value='' name="qty" id="qty" >
                                            <input  type="hidden" value='' name="update_id" id="update_id" >
                                        </div>
                                    </form>
                                </div>
                                <!-- End: card item num -->
                            </div>
                        </div>
                        <hr>
                    </li>
                    <!-- End: cart list item box -->

                </ul>
            </div>
            <!-- End: cart items box -->
        </div>
        <!-- End: full cart -->

        <!-- Start: empty cart -->
        <div style="display: none!important;" id="emptycart" class="d-flex justify-content-center justify-content-sm-center justify-content-md-center justify-content-lg-center justify-content-xl-center justify-content-xxl-center">
            <div class="card">
                <div class="card-body text-center"><i class="fa fa-shopping-basket" style="font-size: 99px;"></i>
                    <p class="card-text" style="margin-top: 20px;color: var(--bs-danger);">&nbsp;! سبد خرید شما خالی است</p>
                </div>
            </div>
        </div>
        <!-- End: empty cart -->
        <hr>
        <!-- Start: product_less_price -->
        <div id="product_less_price">
            <h5 class="text-center text-sm-center text-md-center text-lg-center text-xl-center text-xxl-center text-dark mb-1">تخفیف برای شما&nbsp;&nbsp;<i class="fas fa-tag swing animated infinite"></i></h5>
            <div class="d-flex flex-column-reverse flex-sm-row flex-md-row justify-content-md-center align-items-md-center flex-lg-row flex-xl-row flex-xxl-row" id="body">
                <!-- Start: diccount_prodact -->
                <div id="diccount_prodact" class="diccount_prodact">
                    <div class="d-sm-flex justify-content-sm-center align-items-sm-center diccount_prodact_img" id="diccount_prodact_img" style="margin-top: 5px;"><img class="rounded shadow-sm" src="assets/img/dogs/image1.jpeg"></div>
                    <div style="text-align: center;background: rgba(249,249,249,0);">
                        <p style="margin-bottom: 0px;color: var(--bs-dark);">نام</p>
                        <p style="margin-bottom: 0px;color: var(--bs-dark);">قیمت</p>
                        <p id="takhfif">تخفیف %<span style="margin-left: 5px;">Text</span></p><button class="btn btn-primary btn-sm" id="add_to_card_bt" type="button"><i class="material-icons">add_shopping_cart</i></button>
                    </div>
                </div><!-- End: diccount_prodact -->
            </div>
        </div>
        <!-- End: product_less_price -->

        <!-- Start: pymet_mobile -->
        <div class="d-inline-flex d-print-none d-sm-inline-flex d-md-inline-flex d-lg-none d-xl-none d-xxl-none" id="pyment_mobile">
            <div>
                <p style="margin: 0px;">مبلغ قابل پرداخت</p>
                <p class="d-flex" style="margin: 0px;"><span class="me-auto">تومان</span><span id="CartItemTotalPrice" class="ms-auto">xxx</span></p>
            </div>
            <div><button class="btn btn-primary border rounded" id="buybutton" type="button" style="border-style: solid;">تکمیل فرایند خرید</button></div>
        </div>
        <!-- End: pymet_mobile -->
    </div>
    <!-- End: main_part -->

<?php
include "footer.php";
?>


<script>
    // document.getElementById('cart_list_item').onclick = duplicate;
    // var i = 0;
    //
    // function duplicate() {
    //     var original = document.getElementById('duplicater' + i);
    //     var clone = original.cloneNode(true); // "deep" clone
    //     clone.id = "duplicetor" + ++i; // there can only be one element with an ID
    //     clone.onclick = duplicate; // event handlers are not cloned
    //     original.parentNode.appendChild(clone);
    // }
</script>

<script>
    var N = '<?php echo $N ;?>';
    var totalprice = '<?php echo $totalprice ;?>';
    var items = '<?php echo json_encode($items) ;?>';
    items = JSON.parse(items);
    for (i in items ){
        var original = document.getElementById('cart_list_item');
        var clone = original.cloneNode(true);
        clone.id = "cart_list_item" + i;
        original.parentNode.appendChild(clone);
        var newid = "#cart_list_item" + i;
        $('#cart_item_box').find(newid).css('display','inline');
        $('#cart_item_box').find(newid).find('#CartItemName').text(items[i][1]);
        $('#cart_item_box').find(newid).find('#P_price').text(items[i][2]);
        $('#cart_item_box').find(newid).find('#qty_box').text(items[i][5]);
        $('#cart_item_box').find(newid).find('#rid').attr('value',items[i][0]);
        $('#cart_item_box').find(newid).find('#qty').attr('value',items[i][5]);
        $('#cart_item_box').find(newid).find('#update_id').attr('value',items[i][0]);
        $('#cart_item_box').find(newid).find('#productimg').attr("src","product_images/"+items[i][3]);

    }
    if (N == 0){
        //$('#fullcart').css('display','none');
        $('#emptycart').css('display','flex');
    }else{
        //$('#fullcart').css('display','none');
        $('#fullcart').css('display','flex');
        $('#N').text(N)
        $('#paymentboxcol_col #price').text(totalprice)
        $('#paymentboxcol_col #CartItemTotalPrice').text(totalprice)
        $('#pyment_mobile #CartItemTotalPrice').text(totalprice)
    };
</script>