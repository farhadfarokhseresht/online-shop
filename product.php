<?php
include "header.php";
?>
<?php
$product_id = $_GET['p'];
$sql = " SELECT * FROM products WHERE product_id = $product_id";
$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        $product_info = array($row['product_id'],
            $row['product_cat'],$row['product_brand'],
            $row['product_price'],$row['product_desc'],
            $row['product_image'],$row['product_keywords'],$row['product_title']);
    }
}
?>
<form action="" method="post">
    <input name="proId" type="hidden" value="" id="proId" >
    <div class="container-fluid" id="container">
    <nav class="navbar navbar-light navbar-expand-md" style="height: 0px;">
        <div class="container-fluid">
            <ul class="list-inline d-sm-flex ms-auto justify-content-sm-center align-items-sm-center" style="margin-bottom: 0px;">
                <li class="list-inline-item d-sm-flex justify-content-sm-center align-items-sm-center" id="page_loc_list_item">
                    <div class="d-sm-flex justify-content-sm-center align-items-sm-center"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" style="margin-left: 5px;">
                            <path d="M16.2426 6.34317L14.8284 4.92896L7.75739 12L14.8285 19.0711L16.2427 17.6569L10.5858 12L16.2426 6.34317Z" fill="currentColor"></path></svg>
                        <span>Text</span>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Start: for pc mod -->
    <div class="row d-none d-print-flex d-sm-none d-md-none d-lg-flex d-xl-flex d-xxl-flex" id="pc_mod_row">
        <!-- Start: sel -->
        <div class="col" id="pc_mod_row_sel_col">
            <!-- Start: sel part -->
            <div style="margin-top: 10px;border-radius: 0px;">
                <div class="d-grid" style="background: rgba(212,212,212,0.21);border-radius: 20px;box-shadow: 0px 0px 1px 0px rgb(47,48,58);padding: 10px;">
                    <p class="d-xl-flex justify-content-xl-end align-items-xl-center" id="pc_mod_row_sel_part_p">ضمانت اصل بودن کالا<i class="fas fa-barcode" style="margin-left: 10px;"></i></p>
                    <hr>
                    <p class="d-xl-flex justify-content-xl-end align-items-xl-center" id="pc_mod_row_sel_part_p">پرداخت به صورت انلاین<i class="fas fa-money-check-alt" style="margin-left: 10px;"></i></p>
                    <hr>
                    <p class="d-xl-flex justify-content-xl-end align-items-xl-center" style="text-align: right;">نفر این پیشنهاد را خریده‌اند<br><span class="text-dark" style="margin-right: 5px;margin-left: 5px;">140</span><i class="fas fa-cart-arrow-down" style="color: var(--bs-green);"></i></p>
                    <!-- Start: less price -->
                    <div class="d-flex align-items-xl-center" style="margin-top: 10px;"><span style="font-size: 16px;font-weight: bold;color: var(--bs-light);background: #ef394e;border-radius: 12px;padding-top: 3px;padding-right: 10px;padding-bottom: 1px;padding-left: 10px;margin: 10px;">xx%</span><span style="text-decoration: line-through;font-size: 15px;">xxxx</span></div>
                    <!-- End: less price -->
                    <span style="text-align: right;font-weight: bold;">&nbsp;:&nbsp; قیمت کالا</span>
                    <!-- Start: price -->
                    <div class="d-flex" id="pc_mod_row_price"><span style="margin-right: 10px;">تومان</span><span id = 'pprice'>xxxx</span></div>
                    <!-- End: price -->
                    <!-- Start: qyt -->
                    <div class="d-flex align-items-xl-center" style="margin-top: 15px;">
                        <input name="qty" class="border rounded-pill border-primary form-control-sm" type="number" id="sel_qyt_num" step="1" min="1" placeholder="تعداد کالای مورد نظر" value="1">
                        <span class="d-xl-flex ms-auto justify-content-xl-end" style="font-weight: bold;">تعداد</span></div>
                    <!-- End: qyt -->
                    <button name="addToCart" class="btn btn-primary shadow" id="add_to_cart_button" type="submit" style="margin-top: 30px;">افزودن به سبد خرید</button>
                </div>
            </div>
            <!-- End: sel part -->

            <!-- Start: comments -->
            <div class="row" style="margin-bottom: 5px;margin-top: 10px;">
                <div class="col" id="w_col-3">
                    <div class="card" style="text-align: right;">
                        <div class="card-body">
                            <div class="d-flex">
                                <!-- Start: addcomment --><a id="addcomment">افزودن نظر +</a><!-- End: addcomment --><span class="text-dark ms-auto" style="font-size: 14px;">نظرات کاربران<br></span>
                            </div>
                            <hr><!-- Start: comment list -->
                            <ul class="list-unstyled">
                                <!-- Start: items -->
                                <li>
                                    <div>
                                        <!-- Start: name --><span style="font-size: 12px;">فرهاد فرخ سرشت</span><!-- End: name -->
                                        <!-- Start: date --><span class="text-info d-flex flex-row-reverse" style="font-size: 10px;">2020.02.12</span><!-- End: date -->
                                        <!-- Start: text -->
                                        <p style="font-size: 14px;">بلا بلا بلا</p><!-- End: text -->
                                        <hr>
                                    </div>
                                </li><!-- End: items -->
                            </ul><!-- End: comment list -->
                            <!-- Start: see all co --><a class="card-link d-flex justify-content-start" href="#" style="font-size: 10px;">مشاهده تمام نظرها</a><!-- End: see all co -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- End: comments -->

        </div>
        <!-- End: sel -->

        <!-- Start: info -->
        <div class="col" style="background: var(--bs-white);">
            <div>
                <!-- Start: product locations -->
                <nav class="navbar navbar-light navbar-expand-md" style="font-size: 12px;color: var(--bs-blue);">
                    <div class="container-fluid">
                        <ul class="list-inline d-sm-flex ms-auto justify-content-sm-center align-items-sm-center" style="margin-bottom: 0px;">
                            <li class="list-inline-item d-sm-flex justify-content-sm-center align-items-sm-center" id="page_loc_list_item">
                                <div class="d-sm-flex justify-content-sm-center align-items-sm-center"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" style="margin-left: 5px;color: var(--bs-dark);">
                                        <path d="M16.2426 6.34317L14.8284 4.92896L7.75739 12L14.8285 19.0711L16.2427 17.6569L10.5858 12L16.2426 6.34317Z" fill="currentColor"></path>
                                    </svg><!-- Start: text --><span>Text</span><!-- End: text -->
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
                <!-- End: product locations -->
                <!-- Start: productname -->
                <span class="d-xl-flex d-xxl-flex justify-content-xl-end justify-content-xxl-end" id="pname" style="color: var(--bs-dark);font-size: 1.143rem;">نام کالا</span>
                <!-- End: productname -->
            </div>
            <hr>
            <div>
                <div style="margin-bottom: 8px;">
                    <p class="d-xl-flex align-items-xl-center" style="font-size: .857rem;margin: 0px;direction: rtl;">۷۹٪ (۲۰ نفر) از خریداران، این کالا را پیشنهاد کرده‌اند<br><i class="far fa-thumbs-up order-first" style="margin-right: 6px;margin-left: 5px;color: var(--bs-green);"></i></p>
                </div>
                <div class="d-flex justify-content-xl-end">
                    <p class="text-end d-flex align-items-xl-center" style="font-size: .857rem;margin-right: 5px;margin-left: 5px;margin-bottom: 0px;">4.2<i class="far fa-star" style="margin-right: 6px;margin-left: 5px;color: var(--bs-yellow);text-align: center;"></i></p>
                    <p class="text-end d-flex align-items-xl-center" style="font-size: .857rem;margin-bottom: 0px;">53<i class="far fa-comments" style="margin-right: 6px;margin-left: 5px;color: #0fabc6;"></i></p>
                </div>
                <section id="product_details_pcmod">
                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle d-flex justify-content-center align-items-center" aria-expanded="false" data-bs-toggle="dropdown" type="button" style="background: rgba(0,0,0,0.08);color: var(--bs-dark);font-weight: bold;">ابی کاربنی<i class="fa fa-circle" style="margin-right: 10px;margin-left: 10px;color: var(--bs-blue);"></i></button>
                        <div class="dropdown-menu text-end">
                            <a class="dropdown-item" href="#">ابی کاربنی<i class="fa fa-circle" style="margin-right: 10px;margin-left: 10px;color: var(--bs-blue);"></i></a>
                            <a class="dropdown-item" href="#">قرمز<i class="fa fa-circle" style="margin-right: 10px;margin-left: 10px;color: var(--bs-red);"></i></a>
                            <a class="dropdown-item" href="#">مشکی<i class="fa fa-circle" style="margin-right: 10px;margin-left: 10px;color: #111111;"></i></a>
                        </div>
                    </div>
                    <span class="d-flex justify-content-center align-items-center" style="font-size: 1rem;">&nbsp;:&nbsp; رنگ&nbsp;</span>
                </section>
                <!-- Start: p information -->
                <div>
                    <span class="text-dark d-lg-flex d-xl-flex justify-content-lg-end justify-content-xl-end">&nbsp;: ویژگی ها&nbsp;</span>
                    <ul style="font-size: .857rem;direction: rtl;">
                        <!-- Start: info item -->
                        <li>Item 4</li>
                        <!-- End: info item -->
                    </ul>
                </div>
                <!-- End: p information -->
            </div>
            <div class="row" style="padding: 10px;">
                <div class="col" id="w_col" style="font-size: 12px;padding: 0px;">
                    <div class="d-flex"><img src="https://mobile.digikala.com/static/files/01e2124c.png" style="max-width: 100%;max-height: 100%;width: 100px;">
                        <div class="d-grid ms-auto" style="margin-right: 10px;"><span class="text-end d-flex d-sm-flex justify-content-end align-items-center justify-content-sm-end" style="color: var(--bs-dark);font-weight: bold;font-size: .857rem;">ارسال رایگان سفارش<br><i class="fas fa-shipping-fast" style="margin-left: 10px;color: var(--bs-red);transform: rotateY(-171deg);"></i></span><span class="text-end d-sm-flex align-items-sm-center" style="margin-right: 24px;">اولین سفارش کاربران جدید<br></span></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End: info -->

        <!-- Start: image -->
        <div class="col d-block" style="background: var(--bs-white);width: 380px;">
            <!-- Start: product image -->
            <div class="d-flex" id="ee">
                <div id="myresult" class="img-zoom-result"></div>

                <!-- Start: image part -->
                <div class="d-xxl-flex me-auto" style="overflow: hidden;position: relative;">
                    <!-- Start: myimage -->
                    <img id="myimage" class="myimage" src="product_images/<?php echo $product_info[5]; ?>" >
                    <img style="display: none" id="" class="myimage" src="product_images/<?php echo $product_info[5]; ?>" >
                    <img style="display: none" id="" class="myimage" src="https://www.w3schools.com/w3css/img_snow_wide.jpg" >
                    <!-- End: myimage -->
                </div>
                <!-- End: image part -->

                <ul class="list-unstyled text-center ms-auto" style="list-style: none;padding: 0;-ms-flex-direction: column;flex-direction: column;z-index: 2;-ms-flex: 0 0 24px;flex: 0 0 24px;margin: 0px;margin-top: 10px;">
                    <li style="margin-top: 10px;"><i class="fa fa-heart-o"></i></li>
                    <li style="margin-top: 10px;"><i class="fa fa-bar-chart-o"></i></li>
                    <li style="margin-top: 10px;"><i class="fa fa-bookmark-o"></i></li>
                </ul>

            </div>
            <!-- End: product image -->
            <!-- Start: list image -->
            <ul class="list-inline d-flex flex-nowrap" style="overflow: scroll;">
                <li  onclick="currentDiv(1)" class="list-inline-item d-flex">
                    <div class="miniImage  opacity-off">
                        <div class="d-lg-flex d-xl-flex align-items-lg-center justify-content-xl-center align-items-xl-center miniImage2"><img src="product_images/<?php echo $product_info[5]; ?>" ></div>
                    </div>
                </li>
                <li  onclick="currentDiv(2)" class="list-inline-item d-flex">
                    <div class="miniImage">
                        <div class="d-lg-flex d-xl-flex align-items-lg-center justify-content-xl-center align-items-xl-center miniImage2"><img src="product_images/<?php echo $product_info[5]; ?>" ></div>
                    </div>
                </li>
                <li  onclick="currentDiv(3)" class="list-inline-item d-flex">
                    <div class="miniImage">
                        <div class="d-lg-flex d-xl-flex align-items-lg-center justify-content-xl-center align-items-xl-center miniImage2"><img src="product_images/<?php echo $product_info[5]; ?>" ></div>
                    </div>
                </li>
            </ul>
            <!-- End: list image -->
            <style>
                .opacity-off{
                    opacity: 1;
                    border-color: red;
                }
            </style>
            <script>
                function currentDiv(n) {
                    showDivs(slideIndex = n);
                }
                function showDivs(n) {
                    var i;
                    var x = document.getElementsByClassName("myimage");
                    var dots = document.getElementsByClassName("miniImage");
                    if (n > x.length) {slideIndex = 1}
                    if (n < 1) {slideIndex = x.length}
                    for (i = 0; i < x.length; i++) {
                        x[i].style.display = "none";
                        x[i].id = "";
                    }
                    for (i = 0; i < dots.length; i++) {
                        dots[i].className = dots[i].className.replace(" opacity-off", "");
                    }
                    x[slideIndex-1].style.display = "block";
                    x[slideIndex-1].id = "myimage";
                    dots[slideIndex-1].className += " opacity-off";
                }
            </script>
            <script>
                function imageZoom(imgID, resultID) {
                    var img, lens, result, cx, cy;
                    img = document.getElementById(imgID);
                    result = document.getElementById(resultID);
                    /*create lens:*/
                    lens = document.createElement("DIV");
                    lens.setAttribute("class", "img-zoom-lens");
                    /*insert lens:*/
                    img.parentElement.insertBefore(lens, img);
                    /*calculate the ratio between result DIV and lens:*/
                    cx = result.offsetWidth / lens.offsetWidth;
                    cy = result.offsetHeight / lens.offsetHeight;
                    /*set background properties for the result DIV:*/
                    result.style.backgroundImage = "url('" + img.src + "')";
                    result.style.backgroundSize = (img.width * cx) + "px " + (img.height * cy) + "px";
                    /*execute a function when someone moves the cursor over the image, or the lens:*/
                    lens.addEventListener("mousemove", moveLens);
                    img.addEventListener("mousemove", moveLens);
                    /*and also for touch screens:*/
                    lens.addEventListener("touchmove", moveLens);
                    img.addEventListener("touchmove", moveLens);

                    /*initialise and hide lens result*/
                    result.style.display = "none";
                    /*Reveal and hide on mouseover or out*/
                    lens.onmouseover = function(){result.style.display = "block";};
                    lens.onmouseout = function(){result.style.display = "none";};

                    function moveLens(e) {
                        var pos, x, y;
                        /*prevent any other actions that may occur when moving over the image:*/
                        e.preventDefault();
                        /*get the cursor's x and y positions:*/
                        pos = getCursorPos(e);
                        /*calculate the position of the lens:*/
                        x = pos.x - (lens.offsetWidth / 2);
                        y = pos.y - (lens.offsetHeight / 2);
                        /*prevent the lens from being positioned outside the image:*/
                        if (x > img.width - lens.offsetWidth) {x = img.width - lens.offsetWidth;}
                        if (x < 0) {x = 0;}
                        if (y > img.height - lens.offsetHeight) {y = img.height - lens.offsetHeight;}
                        if (y < 0) {y = 0;}
                        /*set the position of the lens:*/
                        lens.style.left = x + "px";
                        lens.style.top = y + "px";
                        /*display what the lens "sees":*/
                        result.style.backgroundPosition = "-" + (x * cx) + "px -" + (y * cy) + "px";
                    }
                    function getCursorPos(e) {
                        var a, x = 0, y = 0;
                        e = e || window.event;
                        /*get the x and y positions of the image:*/
                        a = img.getBoundingClientRect();
                        /*calculate the cursor's x and y coordinates, relative to the image:*/
                        x = e.pageX - a.left;
                        y = e.pageY - a.top;
                        /*consider any page scrolling:*/
                        x = x - window.pageXOffset;
                        y = y - window.pageYOffset;
                        return {x : x, y : y};
                    }
                };
                imageZoom("myimage", "myresult");
            </script>
        </div>
        <!-- End: image -->

    </div>
    <!-- End: for pc mod -->

    <!-- Start: phone_position -->
    <div class="row d-inline d-print-none d-lg-none d-xl-none d-xxl-none">
        <!-- Start: product info col -->
        <div class="col text-end" id="w_col">

            <!-- Start: p name -->
            <div id="pname" style="text-align: right;margin-bottom: 5px;"><span id="productName" style="color: var(--bs-dark);font-size: .857rem;">نام کالا</span></div>
            <!-- End: p name -->

            <!-- Start: p name -->
            <div style="text-align: right;margin-bottom: 5px;">
                <p>lable</p>
            </div>
            <!-- End: p name -->

            <!-- Start: p like -->
            <div class="d-flex">
                <div style="font-size: 10px;"><i class="fa fa-star" style="margin-right: 5px;color: var(--bs-warning);"></i><span>1.4(1400)</span></div>
                <div class="d-sm-flex ms-auto">
                    <ul class="list-inline" style="font-size: 10px;">
                        <li class="list-inline-item"><button class="btn btn-primary d-sm-flex justify-content-sm-center align-items-sm-center" type="button" style="background: none;border: none;padding: 0px;"><i class="fas fa-share-alt" style="color: var(--bs-gray-dark);font-size: 10px;"></i></button></li>
                        <li class="list-inline-item"><button class="btn btn-primary d-sm-flex justify-content-sm-center align-items-sm-center" type="button" style="background: none;border: none;padding: 0px;"><i class="far fa-bookmark" style="color: var(--bs-gray-dark);font-size: 10px;"></i></button></li>
                        <li class="list-inline-item"><button class="btn btn-primary d-sm-flex justify-content-sm-center align-items-sm-center" type="button" style="background: none;border: none;padding: 0px;"><i class="far fa-heart" style="color: var(--bs-gray-dark);font-size: 10px;"></i></button></li>
                    </ul>
                </div>
            </div>
            <!-- End: p like -->

            <!-- Start: Slideshow -->
            <div class="swiper-container" style="margin-bottom: 10px;">
                <!-- Start: Slide Wrapper -->
                <div class="swiper-wrapper">
                    <!-- Start: Slide -->
                    <div class="d-flex d-md-flex d-lg-flex justify-content-center align-items-center justify-content-md-center align-items-md-center justify-content-lg-center align-items-lg-center swiper-slide" id="product_slider">
                        <img id="phone_image"  src="product_images/<?php echo $product_info[5]; ?>">
                    </div>
                    <div class="d-flex d-md-flex d-lg-flex justify-content-center align-items-center justify-content-md-center align-items-md-center justify-content-lg-center align-items-lg-center swiper-slide" id="product_slider">
                        <img id="phone_image"  src="product_images/<?php echo $product_info[5]; ?>">
                    </div>
                    <div class="d-flex d-md-flex d-lg-flex justify-content-center align-items-center justify-content-md-center align-items-md-center justify-content-lg-center align-items-lg-center swiper-slide" id="product_slider">
                        <img id="phone_image"  src="product_images/<?php echo $product_info[5]; ?>">
                    </div>
                    <!-- End: Slide -->
                </div>
                <!-- End: Slide Wrapper -->
                <!-- Start: Pagination -->
                <div class="swiper-pagination" style="width: 20%;background: rgba(0,0,0,0.08);border-radius: 10px;"></div>
                <!-- End: Pagination -->
            </div>
            <!-- End: Slideshow -->

            <hr>
            <!-- Start: info -->
            <div class="justify-content-sm-end align-items-sm-center" id="p_brand_info">
                <div class="d-flex justify-content-sm-end">
                    <!-- Start: category -->
                    <span style="margin-left: 10px;margin-right: 10px;">Text</span>
                    <!-- End: category -->
                    <span class="text-primary" style="margin-left: 10px;margin-right: 3px;">دسته</span><i class="fa fa-info-circle d-sm-flex align-items-sm-center"></i>
                    <!-- Start: category -->
                    <span style="margin-left: 10px;margin-right: 10px;">Text</span>
                    <!-- End: category -->
                    <span class="text-primary" style="margin-left: 10px;margin-right: 3px;">برند</span><i class="fa fa-info-circle d-sm-flex align-items-sm-center"></i>
                </div>

                <!-- Start: info -->
                <div style="margin-top: 10px;"><a class="d-sm-flex justify-content-sm-start" href="#" style="font-size: 8px;position: absolute;">مشاهده کامل</a><small>&nbsp;: مشخصات&nbsp;</small>
                    <ul style="direction: rtl;">
                        <!-- Start: info item -->
                        <li>Item 4</li>
                        <!-- End: info item -->
                    </ul>
                </div>
                <!-- End: info -->
                <div class="d-flex justify-content-sm-start">
                    <span style="margin-left: 10px;margin-right: 5px;font-weight: bold;color: var(--bs-red);">تومان</span>
                    <span id="price">10000</span>
                    <span style="margin-left: 10px;margin-right: 3px;font-weight: bold;color: var(--bs-gray-dark);">قیمت</span>
                </div>
                <hr>
                <div style="text-align: right;">
                    <small style="color: var(--bs-gray-dark);">نقد و برسی</small>
                    <!-- Start: p about -->
                    <p>Paragraph</p>
                    <!-- End: p about -->
                </div>
            </div>
            <!-- End: info -->

        </div>
        <!-- End: product info col -->
        <div class="col" style="margin-top: 20px;">
            <section id="product_details">
                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle d-flex justify-content-center align-items-center" aria-expanded="false" data-bs-toggle="dropdown" type="button" style="background: rgba(0,0,0,0.08);color: var(--bs-dark);font-weight: bold;">ابی کاربنی<i class="fa fa-circle" style="margin-right: 10px;margin-left: 10px;color: var(--bs-blue);"></i></button>
                    <div class="dropdown-menu text-end">
                        <a class="dropdown-item" href="#">ابی کاربنی<i class="fa fa-circle" style="margin-right: 10px;margin-left: 10px;color: var(--bs-blue);"></i></a>
                        <a class="dropdown-item" href="#">قرمز<i class="fa fa-circle" style="margin-right: 10px;margin-left: 10px;color: var(--bs-red);"></i></a>
                        <a class="dropdown-item" href="#">مشکی<i class="fa fa-circle" style="margin-right: 10px;margin-left: 10px;color: #111111;"></i></a>
                    </div>
                </div>
                <span class="d-flex justify-content-center align-items-center">&nbsp;:&nbsp; رنگ&nbsp;</span>
            </section>
        </div>
        <div class="col" style="padding: 0px;padding-top: 0px;">
            <div class="row" style="margin-bottom: 5px;margin-top: 5px;">
                <div class="col" id="w_col">
                    <div class="d-flex"><img src="https://mobile.digikala.com/static/files/01e2124c.png">
                        <div class="d-grid ms-auto"><span class="text-end d-flex d-sm-flex justify-content-end align-items-center justify-content-sm-end" style="color: var(--bs-dark);font-weight: bold;">ارسال رایگان سفارش<br><i class="fas fa-shipping-fast" style="margin-left: 10px;color: var(--bs-red);"></i></span><span class="text-end d-sm-flex align-items-sm-center">اولین سفارش کاربران جدید<br></span></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <!-- Start: comments -->
            <div class="row" style="margin-bottom: 5px;margin-top: 20px;">
                <div class="col" id="w_col-1">
                    <div class="card" style="text-align: right;">
                        <div class="card-body">
                            <div class="d-flex"><a style="color: var(--bs-primary);font-size: 12px;border-radius: 3px;border: 1px solid var(--bs-primary) ;">افزودن نظر +</a><span class="text-dark ms-auto" style="font-size: 14px;">نظرات کاربران<br></span></div>
                            <hr>
                            <!-- Start: c list -->
                            <ul class="list-unstyled">
                                <!-- Start: item -->
                                <li>
                                    <div>
                                        <!-- Start: c name -->
                                        <span style="font-size: 12px;">فرهاد فرخ سرشت</span>
                                        <!-- End: c name -->
                                        <!-- Start: date -->
                                        <span class="text-info d-flex flex-row-reverse" style="font-size: 10px;">2020.02.12</span>
                                        <!-- End: date -->
                                        <!-- Start: text -->
                                        <p style="font-size: 14px;">بلا بلا بلا</p>
                                        <!-- End: text -->
                                        <hr>
                                    </div>
                                </li>
                                <!-- End: item -->
                            </ul>
                            <!-- End: c list -->
                            <a class="card-link d-flex justify-content-start" href="#" style="font-size: 8px;">مشاهده تمام نظرها</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End: comments -->
        </div>

    </div>
    <!-- End: phone_position -->

    <div class="row d-print-none d-lg-none d-xl-none d-xxl-none">
        <div class="col" id="w_col">
            <div class="d-grid d-sm-flex d-md-flex d-lg-flex d-xl-flex d-xxl-flex copyright" id="deliver_info"><span class="d-flex justify-content-center align-items-center align-content-center align-self-center">امکان تحویل اکسپرس<br><img src="https://www.digikala.com/static/files/8f570b58.svg" width="25%"></span><span class="d-flex justify-content-center align-items-center align-content-center align-self-center">امکان پرداخت در محل<br><img src="https://www.digikala.com/static/files/22414818.svg" width="25%"></span><span class="d-flex justify-content-center align-items-center align-content-center align-self-center">۷ روز هفته، ۲۴ ساعته<br><img src="	https://www.digikala.com/static/files/a9286d2f.svg" width="25%"></span><span class="d-flex justify-content-center align-items-center align-content-center align-self-center">۷ روز ضمانت بازگشت کالا<br><img src="https://www.digikala.com/static/files/514926b1.svg" width="25%"></span><span class="d-flex justify-content-center align-items-center align-content-center align-self-center">ضمانت اصل بودن کالا<br><img src="	https://www.digikala.com/static/files/fdb293e6.svg" width="25%"></span></div>
        </div>
    </div>

    <!-- Start: extra product -->
    <div class="row" style="margin-bottom: 5px;margin-top: 15px;">
        <div class="col" id="w_col-2"><i class="fas fa-box-open" style="position: absolute;margin-top: 3px;color: var(--bs-warning);font-size: 12px;"></i>
            <p style="/*position: absolute;*/margin: 0px;text-align: right;font-size: 12px;">محصولات پیشنهادی</p>
            <div class="d-flex d-lg-flex d-xl-flex justify-content-lg-center align-items-lg-center justify-content-xl-center align-items-xl-center" id="owerflow" style="width: 100%;overflow: auto;">
                <div class="text-center d-block d-lg-flex" id="productbox">
                    <div class="d-flex align-items-lg-center" style="margin: 10px;">
                        <!-- Start: image -->
                        <div><img src="assets/img/dogs/image3.jpeg" style="width: 90px;"></div><!-- End: image -->
                        <!-- Start: info -->
                        <div style="margin-left: 20px;">
                            <div>
                                <!-- Start: name --><small class="form-text d-sm-flex justify-content-sm-end" style="font-weight: bold;">توله سگ مدل 2000</small><!-- End: name -->
                            </div>
                            <div class="d-grid" style="margin-top: 10px;">
                                <!-- Start: info --><small>Text</small><!-- End: info -->
                                <!-- Start: lesp --><small style="text-align: center;color: var(--bs-red);">44%</small><!-- End: lesp -->
                                <!-- Start: price -->
                                <div class="d-flex align-items-center justify-content-lg-start"><span class="order-last" style="color: var(--bs-dark);font-weight: bold;">1400</span><span class="d-lg-flex align-items-lg-center" style="font-size: 10px;color: var(--bs-dark);font-weight: bold;">تومان</span></div><!-- End: price -->
                            </div>
                        </div><!-- End: info -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End: extra product -->

    <!-- Start: add to cart but -->
    <div class="d-flex d-print-none d-sm-flex d-md-flex d-lg-none d-xl-none d-xxl-none" id="add_to_cart_div"><button name="addToCart" class="btn btn-primary" id="add_to_cart_button" type="submit" style="width: 100%;border-radius: 10px;background: var(--bs-warning);border: none;">افزودن به سبد خرید</button></div>
    <!-- End: add to cart but -->
</div>
</form>
<?php
include "footer.php";
?>

<script>
    var product_info = '<?php echo json_encode($product_info) ;?>';
    product_info = JSON.parse(product_info);
    $('#pprice').text(product_info[3]);
    $('#price').text(product_info[3]);
    $('#pname').text(product_info[7]);
    $('#productName').text(product_info[7]);
    document.getElementById("proId").value = product_info[0];
</script>