<?php
include "header.php";
?>
<?php

if (isset($_GET['p']) or $_SESSION['ppg_product_id'] ) {
	if(isset($_GET['p'])){
        $_SESSION['ppg_product_id'] = $_GET['p'];
	}
    $product_id = $_SESSION['ppg_product_id'];
    $sql = " SELECT * FROM products WHERE product_id = $product_id";
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $product_info = array($row['product_id'],
                $row['product_cat'], $row['product_brand'],
                $row['product_price'], $row['product_desc'],
                $row['product_image'], $row['product_keywords'], $row['product_title']);
        }
    }
}

?>
<form  action = "" method = "post">
	<div class = "container-fluid" id = "container">
		<!-- Start: location -->
		<nav class = "navbar navbar-light navbar-expand-md">
			<div class = "container-fluid">
				<ul class = "list-inline d-sm-flex ms-auto justify-content-sm-center align-items-sm-center" style = "margin-bottom: 0px;">
					<li class = "list-inline-item d-flex d-sm-flex align-items-center justify-content-sm-center align-items-sm-center" id = "page_loc_list_item">
						<a href = "#"><i class = "icon ion-ios-arrow-back" style = "margin-right: 3px;"></i><span>Text</span></a>
					</li>
				</ul>
			</div>
		</nav>
		<!-- End: location -->

		<!-- Start: for pc mod -->
		<div class = "row d-none d-print-flex d-sm-none d-md-none d-lg-flex d-xl-flex d-xxl-flex prd_pc_mod_row">
			<!-- Start: sel -->
			<div class = "col" id = "pc_mod_row_sel_col">
				<!-- Start: sel part -->
				<div style = "margin-top: 10px;border-radius: 0px;">
					<div class = "border rounded d-grid" style = "background: rgba(212,212,212,0.21);border-radius: 20px;padding: 10px;">
						<p class = "d-lg-flex justify-content-lg-end align-items-lg-center" id = "pc_mod_row_sel_part_p">ضمانت اصل بودن کالا<i class = "fas fa-barcode" style = "margin-left: 10px;"></i>
						</p>
						<hr>
						<p class = "d-lg-flex justify-content-lg-end align-items-lg-center" id = "pc_mod_row_sel_part_p">پرداخت به صورت انلاین<i class = "fas fa-money-check-alt" style = "margin-left: 10px;"></i>
						</p>
						<hr>
						<p class = "d-xl-flex justify-content-xl-end align-items-xl-center" style = "text-align: right;">نفر این پیشنهاد را خریده‌اند<br><span class = "text-dark" style = "margin-right: 5px;margin-left: 5px;">140</span><i class = "fas fa-cart-arrow-down" style = "color: var(--bs-green);"></i>
						</p>
						<!-- Start: less price -->
						<div class = "d-lg-flex justify-content-lg-start align-items-lg-center">
							<span style = "font-size: 16px;font-weight: bold;color: var(--bs-light);background: #ef394e;border-radius: 12px;padding-top: 3px;padding-right: 10px;padding-bottom: 1px;padding-left: 10px;margin: 10px;">25%</span><span style = "text-decoration: line-through;font-size: 15px;">15000</span>
						</div>
						<!-- End: less price -->
						<span style = "text-align: right;font-weight: bold;"> :&nbsp; قیمت کالا</span>
						<!-- Start: price -->
						<div class = "d-flex" id = "pc_mod_row_price">
							<span style = "margin-right: 10px;">تومان</span><span id = "pprice"></span></div>
						<!-- End: price -->
						<!-- Start: qyt -->
						<div class = "d-flex align-items-xl-center" style = "margin-top: 15px;">
							<input onchange="setqyt('#pqytnum')" id="qytnum" class = "border rounded sel_qyt_num" type = "text" value = "1"><span class = "d-xl-flex ms-auto justify-content-xl-end" style = "font-weight: bold;">تعداد</span>
						</div>
						<!-- End: qyt -->
						<button value =<?php echo $product_info[0] ?>  id="addtocartB" class = "btn btn-primary shadow p_add_cartB" type = "button" style = "margin-top: 30px;">افزودن به سبد خرید</button>
					</div>
				</div>
				<!-- End: sel part -->

			</div>
			<!-- End: sel -->
			<!-- Start: info -->
			<div class = "col" style = "background: var(--bs-white);text-align: right;">
				<div>
					<!-- Start: productname -->
					<span id = "pname" class = "d-xl-flex d-xxl-flex justify-content-xl-end justify-content-xxl-end" style = "color: var(--bs-dark);font-size: 1.143rem;">نام کالا</span>
					<p id = "pkyword"></p>
					<!-- End: productname -->
				</div>
				<hr>
				<div>
					<div class = "d-lg-flex align-items-lg-start justify-content-xl-end" style = "margin-bottom: 8px;">
						<p class = "d-xl-flex align-items-xl-center" style = "font-size: .857rem;margin: 0px;direction: rtl;">۷۹٪ (۲۰ نفر) از خریداران، این کالا را پیشنهاد کرده‌اند<br>
						</p><i class = "far fa-thumbs-up order-last marginicon" style = "color: var(--bs-green);"></i>
					</div>
					<div class = "d-lg-flex justify-content-lg-end align-items-lg-center">
						<div class = "d-lg-flex justify-content-lg-end align-items-lg-start">
							<p class = "text-end d-flex align-items-xl-center" style = "font-size: .857rem;margin-right: 5px;margin-left: 5px;margin-bottom: 0px;">4.2</p>
							<i class = "far fa-comments marginicon" style = "color: var(--bs-primary);"></i>
						</div>
						<div class = "d-lg-flex justify-content-lg-end align-items-lg-start">
							<p class = "text-end d-flex align-items-xl-center" style = "font-size: .857rem;margin-right: 5px;margin-left: 5px;margin-bottom: 0px;">4.2</p>
							<i class = "far fa-star marginicon" style = "color: var(--bs-yellow);"></i>
						</div>
					</div>
					<section id = "product_details_pcmod">
						<div class = "dropdown">
							<button class = "btn btn-light btn-sm d-flex justify-content-center align-items-center" aria-expanded = "false" data-bs-toggle = "dropdown" type = "button" style = "font-weight: bold;">ابی کاربنی<i class = "fa fa-circle" style = "margin-right: 10px;margin-left: 10px;color: var(--bs-blue);"></i>
							</button>
							<div class = "dropdown-menu text-end border rounded">
								<a class = "dropdown-item" href = "#">ابی کاربنی<i class = "fa fa-circle" style = "margin-right: 10px;margin-left: 10px;color: var(--bs-blue);"></i></a><a class = "dropdown-item" href = "#">قرمز<i class = "fa fa-circle" style = "margin-right: 10px;margin-left: 10px;color: var(--bs-red);"></i></a><a class = "dropdown-item" href = "#">مشکی<i class = "fa fa-circle" style = "margin-right: 10px;margin-left: 10px;color: #111111;"></i></a>
							</div>
						</div>
						<span class = "d-flex justify-content-center align-items-center" style = "font-size: 1rem;">&nbsp;:&nbsp; رنگ&nbsp;</span>
					</section>
					<!-- Start: p information -->
					<div>
						<span class = "text-dark d-lg-flex d-xl-flex justify-content-lg-end justify-content-xl-end">&nbsp;: ویژگی ها&nbsp;</span>
						<ul style = "font-size: .857rem;direction: rtl;">
							<!-- Start: info item -->
							<li>Item 4</li>
							<!-- End: info item -->
						</ul>
					</div>
					<!-- End: p information -->
				</div>
				<div class = "row">
					<div class = "col" id = "w_col" style = "font-size: 12px;padding: 0px;">
						<div class = "d-flex">
							<img src = "https://mobile.digikala.com/static/files/01e2124c.png" style = "max-width: 100%;max-height: 100%;width: 100px;">
							<div class = "d-grid ms-auto" style = "margin-right: 10px;">
								<span class = "text-end d-flex d-sm-flex justify-content-end align-items-center justify-content-sm-end" style = "color: var(--bs-dark);font-weight: bold;font-size: .857rem;">ارسال رایگان سفارش<br><i class = "fas fa-shipping-fast" style = "margin-left: 10px;color: var(--bs-red);transform: rotateY(-171deg);"></i></span><span class = "text-end d-sm-flex align-items-sm-center" style = "margin-right: 24px;">اولین سفارش کاربران جدید<br></span>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- End: info -->
			<div class = "col d-block prd_col_img">
				<div class = "d-flex prd_img_div1">
					<!-- Start: image -->
					<div id = "imagezoom" class = "zoom prd_img_div2">
						<img class = "prd_img_img" src = "">
					</div>
					<!-- End: image -->

					<ul class = "list-unstyled text-center ms-auto prd_img_list">
						<li><i class = "fa fa-heart-o"></i></li>
						<li><i class = "fa fa-bar-chart-o"></i></li>
						<li><i class = "fa fa-bookmark-o"></i></li>
					</ul>
				</div>
				<!-- Start: Simple Slider -->
				<div class = "border rounded minisilider">
					<i class = "icon ion-ios-arrow-back minislider-next"></i>
					<!-- Start: Slide Wrapper -->
					<div class = "swiper-wrapper">
						<!-- Start: Slide -->
						<div class = "swiper-slide">
							<div class = "miniImage ">
								<div class = "d-lg-flex d-xl-flex align-items-lg-center justify-content-xl-center align-items-xl-center miniImage2">
									<img src = "assets/img/product%20image/image3.jpeg"></div>
							</div>
						</div>
						<!-- End: Slide -->
						<!-- Start: Slide -->
						<div class = "swiper-slide">
							<div class = "miniImage">
								<div class = "d-lg-flex d-xl-flex align-items-lg-center justify-content-xl-center align-items-xl-center miniImage2">
									<img id="prd_img_img" src = ""></div>
							</div>
						</div>
						<!-- End: Slide -->
						<!-- Start: Slide -->
						<div class = "swiper-slide">
							<div class = "miniImage">
								<div class = "d-lg-flex d-xl-flex align-items-lg-center justify-content-xl-center align-items-xl-center miniImage2">
									<img src = "assets/img/product%20image/image3.jpeg"></div>
							</div>
						</div>
						<!-- End: Slide -->
					</div>
					<!-- End: Slide Wrapper -->
				</div>
				<!-- End: Simple Slider -->
			</div>
		</div>
		<!-- End: for pc mod -->

		<!-- Start: phone_position -->
		<div class = "row d-inline d-print-none d-lg-none d-xl-none d-xxl-none">
			<!-- Start: product info col -->
			<div class = "col text-end" id = "w_col">
				<!-- Start: p name -->
				<div class = "prd_ph_pname">
					<span id = "ppname">نام کالا</span>
				</div><!-- End: p name -->
				<!-- Start: p name -->
				<div id="ppkyword" class = "prd_ph_pname">
					<p>lable</p>
				</div><!-- End: p name -->
				<!-- Start: p like -->
				<div class = "d-flex">
					<div style = "font-size: 10px;">
						<i class = "fa fa-star" style = "margin-right: 5px;color: var(--bs-warning);"></i><span>1.4(1400)</span>
					</div>
					<div class = "d-sm-flex ms-auto">
						<ul class = "list-inline" style = "font-size: 10px;">
							<li class = "list-inline-item">
								<button class = "btn btn-primary d-sm-flex justify-content-sm-center align-items-sm-center" type = "button" style = "background: none;border: none;padding: 0px;">
									<i class = "fas fa-share-alt" style = "color: var(--bs-gray-dark);font-size: 10px;"></i>
								</button>
							</li>
							<li class = "list-inline-item">
								<button class = "btn btn-primary d-sm-flex justify-content-sm-center align-items-sm-center" type = "button" style = "background: none;border: none;padding: 0px;">
									<i class = "far fa-bookmark" style = "color: var(--bs-gray-dark);font-size: 10px;"></i>
								</button>
							</li>
							<li class = "list-inline-item">
								<button class = "btn btn-primary d-sm-flex justify-content-sm-center align-items-sm-center" type = "button" style = "background: none;border: none;padding: 0px;">
									<i class = "far fa-heart" style = "color: var(--bs-gray-dark);font-size: 10px;"></i>
								</button>
							</li>
						</ul>
					</div>
				</div>
				<!-- End: p like -->

				<!-- Start: Slideshow -->
				<div class = "swiper-container" style = "margin-bottom: 10px;">
					<!-- Start: Slide Wrapper -->
					<div class = "swiper-wrapper">
						<!-- Start: Slide -->
						<div class = "d-flex d-md-flex d-lg-flex justify-content-center align-items-center justify-content-md-center align-items-md-center justify-content-lg-center align-items-lg-center swiper-slide" id = "product_slider">
							<img id="prd_ph_img1" src = "assets/img/product%20image/image2.jpeg"></div>
						<!-- End: Slide -->

						<!-- Start: Slide -->
						<div class = "d-flex d-md-flex d-lg-flex justify-content-center align-items-center justify-content-md-center align-items-md-center justify-content-lg-center align-items-lg-center swiper-slide" id = "product_slider">
							<img id="prd_ph_img2" src = "assets/img/product%20image/image2.jpeg"></div>
						<!-- End: Slide -->
					</div>
					<!-- End: Slide Wrapper -->
					<!-- Start: Pagination -->
					<div class = "swiper-pagination" style = "width: 20%;background: rgba(0,0,0,0.08);border-radius: 10px;"></div>
					<!-- End: Pagination -->
				</div>
				<!-- End: Slideshow -->
				<hr>
				<div class = "justify-content-sm-end align-items-sm-center" id = "p_brand_info">
					<div class = "d-flex justify-content-end">
						<ul class = "list-inline d-flex align-items-center">
							<li class = "list-inline-item d-flex align-items-center">
								<span class = "text-primary" style = "margin-left: 10px;margin-right: 3px;">برند</span><i class = "fa fa-info-circle d-sm-flex align-items-sm-center"></i>
							</li>
							<li class = "list-inline-item d-flex align-items-center">
								<span class = "text-primary" style = "margin-left: 10px;margin-right: 3px;">دسته</span><i class = "fa fa-info-circle d-sm-flex align-items-sm-center"></i>
							</li>
						</ul>
					</div><!-- Start: info -->
					<div class = "prd_info">
						<a class = "d-sm-flex justify-content-sm-start prd_info_seeall" href = "#">مشاهده کامل</a><small>&nbsp;: مشخصات&nbsp;</small>
						<ul style = "direction: rtl;">
							<!-- Start: info item -->
							<li>Item 4</li><!-- End: info item -->
						</ul>
					</div><!-- End: info -->
					      <!-- Start: price -->
					<div class = "d-flex justify-content-sm-start">
						<span class = "prd_price_items">تومان</span><span class = "prd_price_items">10000</span><span class = "prd_price_items">قیمت</span>
					</div><!-- End: price -->
					<hr><!-- Start: p about -->
					<div style = "text-align: right;"><small style = "color: var(--bs-gray-dark);">نقد و برسی</small>
						<p>Paragraph</p>
					</div><!-- End: p about -->
				</div>
			</div>
			<!-- End: product info col -->

			<div class = "col" style = "margin-top: 20px;">
				<section id="product_details">
					<input onchange="setqyt('#qytnum')" id="pqytnum" type="text" class="border rounded sel_qyt_num" value="1" />

					<span> : تعداد </span>
				</section>
				<section id = "product_details">
					<div class = "dropdown">
						<button class = "btn btn-primary d-flex justify-content-center align-items-center" aria-expanded = "false" data-bs-toggle = "dropdown" type = "button" style = "background: rgb(255,255,255);color: var(--bs-dark);font-weight: bold;">ابی کاربنی<i class = "fa fa-circle" style = "margin-right: 10px;margin-left: 10px;color: var(--bs-blue);"></i>
						</button>
						<div class = "dropdown-menu text-end">
							<a class = "dropdown-item" href = "#">ابی کاربنی<i class = "fa fa-circle" style = "margin-right: 10px;margin-left: 10px;color: var(--bs-blue);"></i></a><a class = "dropdown-item" href = "#">قرمز<i class = "fa fa-circle" style = "margin-right: 10px;margin-left: 10px;color: var(--bs-red);"></i></a><a class = "dropdown-item" href = "#">مشکی<i class = "fa fa-circle" style = "margin-right: 10px;margin-left: 10px;color: #111111;"></i></a>
						</div>
					</div>
					<span class = "d-flex justify-content-center align-items-center">&nbsp;:&nbsp; رنگ&nbsp;</span>
				</section>
			</div>
			<div class = "col" id = "w_col">
				<div class = "d-flex">
					<img src = "https://mobile.digikala.com/static/files/01e2124c.png" style = "width: 111px;">
					<div class = "d-grid ms-auto">
						<span class = "text-end d-flex d-sm-flex justify-content-end align-items-center justify-content-sm-end" style = "color: var(--bs-dark);font-weight: bold;">ارسال رایگان سفارش<br><i class = "fas fa-shipping-fast" style = "margin-left: 10px;color: var(--bs-red);"></i></span><span class = "text-end d-sm-flex align-items-sm-center">اولین سفارش کاربران جدید<br></span>
					</div>
				</div>
			</div>
			<div class = "col">
				<!-- Start: comments -->
				<div class = "row justify-content-center" style = "margin-bottom: 5px;margin-top: 20px;">
					<div class = "col">
						<div class = "card" style = "text-align: right;">
							<div class = "card-body">
								<div class = "d-flex">
									<a style = "color: var(--bs-primary);font-size: 12px;border-radius: 3px;border: 1px solid var(--bs-primary) ;">افزودن نظر +</a><span class = "text-dark ms-auto" style = "font-size: 14px;">نظرات کاربران<br></span>
								</div>
								<hr><!-- Start: c list -->
								<ul class = "list-unstyled">
									<!-- Start: item -->
									<li>
										<div>
											<!-- Start: c name --><span style = "font-size: 12px;">فرهاد فرخ سرشت</span><!-- End: c name -->
											<!-- Start: date --><span class = "text-info d-flex flex-row-reverse" style = "font-size: 10px;">2020.02.12</span><!-- End: date -->
											<!-- Start: text -->
											<p style = "font-size: 14px;">بلا بلا بلا</p><!-- End: text -->
											<hr>
										</div>
									</li><!-- End: item -->
								</ul><!-- End: c list --><a class = "card-link d-flex justify-content-start" href = "#" style = "font-size: 8px;">مشاهده تمام نظرها</a>
							</div>
						</div>
					</div>
					<div class = "col-auto" style = "margin-top: 10px;">
						<!-- Start: send cmd -->
						<div class = "card" style = "text-align: right;">
							<div class = "card-body">
								<form class = "d-grid">
									<div class = "d-lg-flex justify-content-lg-center align-items-lg-center Score" style = "margin: 5px;">
										<i class = "fa fa-star star1"></i><i class = "fa fa-star star2"></i><i class = "fa fa-star star3"></i><i class = "fa fa-star star4"></i><i class = "fa fa-star star5"></i><small style = "margin-left: 21px;">امتیاز دهید</small>
									</div>
									<textarea class = "form-control" placeholder = "نظر خود را تایپ کنید "></textarea>
									<button class = "btn btn-warning btn-sm sendcomment" type = "button">ارسال&nbsp;</button>
								</form>
							</div>
						</div><!-- End: send cmd -->
					</div>
				</div><!-- End: comments -->
			</div>
		</div>
		<!-- End: phone_position -->
		<!-- Start: comments -->
		<div class="row" style="margin-bottom: 5px;margin-top: 10px;">
			<div class="col">
				<div style="direction: rtl;text-align: right;">
					<ul class="nav nav-tabs" role="tablist">
						<li class="nav-item" role="presentation"><a class="nav-link active" role="tab" data-bs-toggle="tab" href="#tab-2">مشخصات ، نقد و برسی</a></li>
						<li class="nav-item" role="presentation"><a class="nav-link" role="tab" data-bs-toggle="tab" href="#tab-1">نظرات کاربران</a></li>
						<li class="nav-item" role="presentation"><a class="nav-link" role="tab" data-bs-toggle="tab" href="#tab-3">امتیاز و نظردهی</a></li>
					</ul>
					<div class="tab-content">
						<!-- Start: read com tab -->
						<div class="tab-pane" role="tabpanel" id="tab-1">
							<div class="p_tap_div">
								<!-- Start: comment list -->
								<ul class="list-unstyled" style="max-height: 500px;overflow: auto;">
									<!-- Start: items -->
									<li>
										<div class="d-grid">
											<!-- Start: name --><span style="font-size: 12px;">فرهاد فرخ سرشت</span><!-- End: name -->
											<!-- Start: date --><span class="text-info" style="font-size: 10px;">2020.02.12</span><!-- End: date --><strong style="color: var(--bs-teal);">جنس خوب و محکم&nbsp;</strong><strong style="color: #ef394e;">نداشتن گارانتی&nbsp;</strong><!-- Start: text -->
											<p style="min-width: 230px;word-wrap: break-word;font-size: 14px;">xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx</p><!-- End: text -->
											<hr>
										</div>
									</li><!-- End: items -->
								</ul><!-- End: comment list -->
								<!-- Start: see all co --><a class="d-flex justify-content-start" href="#" style="font-size: 10px;">مشاهده بیشتر +</a><!-- End: see all co -->
							</div>
						</div><!-- End: read com tab -->
						<!-- Start: rev -->
						<div class="tab-pane active" role="tabpanel" id="tab-2">
							<div class="p_tap_div">
								<div class="d-grid"><strong style="color: var(--bs-yellow);">نقد و بررسی اجمالی<br></strong><span>نام کالا</span></div>
								<hr><!-- Start: info -->
								<div class="prd_info"><span style="font-weight: bold;">ویژگی ها :</span><!-- Start: vizhgi pc -->
									<div class="d-none d-sm-block">
										<ul class="list-unstyled" id="ky" style="direction: rtl;">
											<!-- Start: info item -->
											<li class="d-flex p_baresi_vizhgi_li">
												<div class="p_baresi_vizhgi_li_ky"><span class="p_baresi_vizhgi_li_ky_span">dsssssssssssssssssssss</span></div>
												<div class="p_baresi_vizhgi_li_val"><span class="p_baresi_vizhgi_li_val_span">Textssssssssssssssssssssssssssssssssssssssssssssssssssssssss</span></div>
											</li><!-- End: info item -->
											<!-- Start: info item -->
											<li class="d-flex p_baresi_vizhgi_li">
												<div class="p_baresi_vizhgi_li_ky"><span class="p_baresi_vizhgi_li_ky_span">dssssssssss</span></div>
												<div class="p_baresi_vizhgi_li_val"><span class="p_baresi_vizhgi_li_val_span">Textssssssssssssssssssssssssssssssssssssssssssssssssssssssss</span></div>
											</li><!-- End: info item -->
										</ul>
									</div><!-- End: vizhgi pc -->
								                                                                        <!-- Start: vizhgi ph -->
									<div class="p_naghd_vizhgiha_phmod">
										<ul class="d-sm-none">
											<!-- Start: info item -->
											<li class="d-grid p_baresi_vizhgi_li">
												<div class="p_baresi_vizhgi_li_ky"><span class="p_baresi_vizhgi_li_ky_span">dsssssssssssssssssssss</span></div>
												<div class="p_baresi_vizhgi_li_val"><span class="p_baresi_vizhgi_li_val_span">Textssssssssssssssssssssssssssssssssssssssssssssssssssssssss</span></div>
											</li><!-- End: info item -->
										</ul>
									</div><!-- End: vizhgi ph -->
									<hr>
								</div><!-- End: info -->
								    <!-- Start: Collapsible Card -->
								<div class="shadow card"><a class="btn btn-link text-center card-header fw-bold" data-bs-toggle="collapse" aria-expanded="true" aria-controls="collapse-4" href="#collapse-4" role="button">توضیحات و برسی کالا</a>
									<div class="collapse show" id="collapse-4">
										<div class="card-body">
											<p class="m-0">This is a collapsable card example using Bootstrap's built in collapse functionality.&nbsp;<strong>Click on the card header</strong>&nbsp;to see the card body collapse and expand!</p>
										</div>
									</div>
								</div><!-- End: Collapsible Card -->
							</div>
						</div><!-- End: rev -->
						<!-- Start: send com tab -->
						<div class="tab-pane" role="tabpanel" id="tab-3">
							<div class="d-lg-flex p_tap_div">
								<form class="comment_form" style="min-width: 260px;">
									<div><label class="form-label">نظر کلی شما :<br></label>
										<ul class="list-inline rating">
											<li class="list-inline-item">
												<div>
													<div class="form-check"><input class="form-check-input" type="radio" id="formCheck-1"><label class="form-check-label" for="formCheck-1" style="color: var(--bs-green);"><i class="far fa-thumbs-up" style="color: var(--bs-green);"></i></label></div>
												</div>
											</li>
											<li class="list-inline-item">
												<div>
													<div class="form-check"><input class="form-check-input" type="radio" id="formCheck-1"><label class="form-check-label" for="formCheck-1" style="color: #ef394e;"><i class="far fa-thumbs-down"></i></label></div>
												</div>
											</li>
										</ul>
									</div>
									<div><label class="form-label">ارزش خرید به نسبت قیمت<br></label>
										<ul class="list-inline rating">
											<li class="list-inline-item">
												<div>
													<div class="form-check"><input class="form-check-input" type="radio" id="formCheck-3"><label class="form-check-label" for="formCheck-1">خوب</label></div>
												</div>
											</li>
											<li class="list-inline-item">
												<div>
													<div class="form-check"><input class="form-check-input" type="radio" id="formCheck-2"><label class="form-check-label" for="formCheck-1">متوسط</label></div>
												</div>
											</li>
											<li class="list-inline-item">
												<div>
													<div class="form-check"><input class="form-check-input" type="radio" id="formCheck-4"><label class="form-check-label" for="formCheck-1">بد</label></div>
												</div>
											</li>
										</ul>
									</div>
									<div><input class="border-primary form-control" type="text" placeholder="نقاط قوت"><input class="border-danger form-control" type="text" placeholder="نقاط ضعف"><textarea class="form-control" placeholder="متن نظر شما" required=""></textarea></div><button class="btn btn-warning btn-sm sendcomment" type="button">ارسال&nbsp;</button>
								</form>
								<div class="d-none d-sm-inline-block" style="padding: 20px;"><strong style="color: var(--bs-dark);">دیگران را با نوشتن نظرات خود، برای انتخاب این محصول راهنمایی کنید.<br></strong>
									<p style="color: var(--bs-warning);padding-top: 15px;"><strong>لطفا پیش از ارسال نظر، خلاصه قوانین زیر را مطالعه کنید:</strong><br></p>
									<ul>
										<li>لازم است محتوای ارسالی منطبق برعرف و شئونات جامعه و با بیانی رسمی و عاری از لحن تند، تمسخرو توهین باشد.<br></li>
										<li>از ارسال لینک‌های سایت‌های دیگر و ارایه‌ی اطلاعات شخصی خودتان مثل شماره تماس، ایمیل و آی‌دی شبکه‌های اجتماعی پرهیز کنید.<br></li>
										<li><strong>در نظر داشته باشید هدف نهایی از ارائه‌ی نظر درباره‌ی کالا ارائه‌ی اطلاعات مشخص و دقیق برای راهنمایی سایر کاربران در فرآیند خرید یک محصول توسط ایشان است.</strong><br></li>
									</ul>
								</div>
							</div>
						</div><!-- End: send com tab -->
					</div>
				</div>
			</div>
		</div>
		<!-- End: comments -->
		<div class = "row d-print-none d-lg-none d-xl-none d-xxl-none">
			<div class = "col" id = "w_col">
				<div class = "d-grid d-sm-flex d-md-flex d-lg-flex d-xl-flex d-xxl-flex copyright" id = "deliver_info">
					<span class = "d-flex justify-content-center align-items-center align-content-center align-self-center">امکان تحویل اکسپرس<br><img src = "https://www.digikala.com/static/files/8f570b58.svg" width = "25%"></span><span class = "d-flex justify-content-center align-items-center align-content-center align-self-center">امکان پرداخت در محل<br><img src = "https://www.digikala.com/static/files/22414818.svg" width = "25%"></span><span class = "d-flex justify-content-center align-items-center align-content-center align-self-center">۷ روز هفته، ۲۴ ساعته<br><img src = "	https://www.digikala.com/static/files/a9286d2f.svg" width = "25%"></span><span class = "d-flex justify-content-center align-items-center align-content-center align-self-center">۷ روز ضمانت بازگشت کالا<br><img src = "https://www.digikala.com/static/files/514926b1.svg" width = "25%"></span><span class = "d-flex justify-content-center align-items-center align-content-center align-self-center">ضمانت اصل بودن کالا<br><img src = "	https://www.digikala.com/static/files/fdb293e6.svg" width = "25%"></span>
				</div>
			</div>
		</div>
		<!-- Start: add to cart but -->
		<div class = "d-flex d-print-none d-sm-flex d-md-flex d-lg-none d-xl-none d-xxl-none" id = "add_to_cart_div">
			<button value =<?php echo $product_info[0] ?> id="addtocartB" class = "btn btn-primary p_add_cartB" type = "button">افزودن به سبد خرید</button>
		</div>
		<!-- End: add to cart but -->
	</div>
</form>
<?php
include "footer.php";
?>

<script src = "assets/js/jquery.zoom.js"></script>
<script src = "assets/js/mini%20p%20image%20slider.js"></script>
<script src = "assets/js/product_phone_image_slider.js"></script>
<script src = "assets/js/productslider.js"></script>
<script src = 'http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js'></script>
<script src = 'assets/js/jquery.zoom.js'></script>
<script>
    var product_info = '<?php echo json_encode($product_info);?>';
    product_info = JSON.parse(product_info);
    $('#pprice').text(product_info[3]);
    $('#pprice').text(product_info[3]);
    $('#ppname').text(product_info[7]);
    $('#pname').text(product_info[7]);
    $('#ppkyword').text(product_info[6]);
    $('#pkyword').text(product_info[6]);
    $('.prd_img_img').attr("src", "product_images/"+product_info[5]);
    $('#prd_img_img').attr("src", "product_images/"+product_info[5]);
    $('#prd_ph_img1').attr("src", "product_images/"+product_info[5]);
    // document.getElementById("addtocartB").value = product_info[0];
</script>
<script>
    $(document).ready(function () {
        $('#imagezoom').zoom({magnify: 2,});
    });
</script>

<script>
	$("body").delegate('.swiper-slide', "click", function (event) {//
        $('.swiper-wrapper').find('.miniImagefocus').removeClass('miniImagefocus');
	    const imgsrc = $(this).find('img').attr('src');
		$(this).find('.miniImage').addClass('miniImagefocus');
		$('.prd_img_img').attr("src", imgsrc);
        $('#imagezoom').trigger('zoom.destroy');
        $('#imagezoom').zoom({magnify: 2,});
        });

</script>
<script>
    function setqyt(eid) {
        $(eid).remove();
    }
</script>