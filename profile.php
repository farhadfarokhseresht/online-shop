<?php
include_once 'header.php';
include 'app/profile.php';

?>
<link rel = "stylesheet" href = "assets/css/profile.css">


<div class = "container-fluid" style = "position: relative;margin-top: 20px;direction: rtl;text-align: right;">
	<div class = "row mb-3">
		<div class = "col-lg-4">
			<div class = "card mb-3">
				<div class = "card-body text-center shadow"><i class = "far fa-user" style = "font-size: 60px;"></i>
					<div class = "mb-3">
						<!-- Start: user name -->
						<h5 id = "profile_userfname">Heading</h5>
						<!-- End: user name -->
					</div>
					<a class = "card-link" href = "#" style = "position: relative;"><i class = "far fa-envelope" style = "font-size: 20px;"></i><small class = "mybadage_p">5</small></a>
				</div>
			</div>
			<div class = "card shadow mb-4" style = "max-width: 436px;max-height: 500px;overflow: auto;">
				<div class = "card-header py-3">
					<h6 class = "text-primary fw-bold m-0">پیشنهاد های شما&nbsp;</h6>
				</div>
				<div class = "card-body d-grid" style = "overflow: hidden;max-height: 500px;height: 315px;">
					<!-- Start: Simple Slider -->
					<div class = "d-xxl-flex justify-content-xxl-center align-items-xxl-start new-product-vslid" style = "height: 116px;">
						<!-- Start: Slide Wrapper -->
						<div class = "swiper-wrapper" style = "height: 90px;">
							<!-- Start: Slide -->
							<div class = "swiper-slide" style = "height: 97px;">
								<a href = "#" style = "margin-bottom: 8px;">
									<div class = "border rounded d-flex align-items-center m-auto" id = "profile_les_p_div">
										<span class = "profile_les_p_name">name</span><img class = "rounded order-first" src = "assets/img/product%20image/WhatsApp%20Image%202021-01-20%20at%207.12.54%20PM.png" style = "max-height: 70px;margin-right: 10px;"><span class = "profile_les_p_percent">20%</span><span style = "margin-right: 50px;margin-top: 20px;">100000</span><span style = "margin-top: 30px;">تومان</span>
									</div>
								</a></div>
							<!-- End: Slide -->

							<!-- Start: Slide -->
							<div class = "swiper-slide" style = "height: 97px;">
								<a href = "#" style = "margin-bottom: 8px;">
									<div class = "border rounded d-flex align-items-center m-auto" id = "profile_les_p_div">
										<span class = "profile_les_p_name">name</span><img class = "rounded order-first" src = "assets/img/product%20image/WhatsApp%20Image%202021-01-20%20at%207.12.54%20PM.png" style = "max-height: 70px;margin-right: 10px;"><span class = "profile_les_p_percent">20%</span><span style = "margin-right: 50px;margin-top: 20px;">100000</span><span style = "margin-top: 30px;">تومان</span>
									</div>
								</a></div>
							<!-- End: Slide -->

							<!-- Start: Slide -->
							<div class = "swiper-slide" style = "height: 97px;">
								<a href = "#" style = "margin-bottom: 8px;">
									<div class = "border rounded d-flex align-items-center m-auto" id = "profile_les_p_div">
										<span class = "profile_les_p_name">name</span><img class = "rounded order-first" src = "assets/img/product%20image/WhatsApp%20Image%202021-01-20%20at%207.12.54%20PM.png" style = "max-height: 70px;margin-right: 10px;"><span class = "profile_les_p_percent">20%</span><span style = "margin-right: 50px;margin-top: 20px;">100000</span><span style = "margin-top: 30px;">تومان</span>
									</div>
								</a></div>
							<!-- End: Slide -->

							<!-- Start: Slide -->
							<div class = "swiper-slide" style = "height: 97px;">
								<a href = "#" style = "margin-bottom: 8px;">
									<div class = "border rounded d-flex align-items-center m-auto" id = "profile_les_p_div">
										<span class = "profile_les_p_name">name</span><img class = "rounded order-first" src = "assets/img/product%20image/WhatsApp%20Image%202021-01-20%20at%207.12.54%20PM.png" style = "max-height: 70px;margin-right: 10px;"><span class = "profile_les_p_percent">20%</span><span style = "margin-right: 50px;margin-top: 20px;">100000</span><span style = "margin-top: 30px;">تومان</span>
									</div>
								</a></div>
							<!-- End: Slide -->

						</div>
						<!-- End: Slide Wrapper -->
						<!-- Start: Pagination -->
						<div class = "swiper-pagination"></div>
						<!-- End: Pagination -->
					</div>
					<!-- End: Simple Slider -->
				</div>
			</div>
		</div>
		<div class = "col-lg-8">
			<div class = "row">
				<div class = "col">
					<!-- Start: user info -->
					<div class = "card shadow mb-3">
						<div class = "card-header py-3">
							<p class = "text-primary m-0 fw-bold">اطلاعات کاربری</p>
						</div>
						<div class = "card-body" style = "position: relative">
							<form name = "info_form" id = "info_form">
								<div class = "row">
									<!-- Start: phone number -->
									<div class = "col">
										<div class = "mb-3"><label class = "form-label"><strong>شماره همراه</strong><br></label>
											<input required disabled class = "form-control" type = "text" id = "mobile" name = "mobile">
										</div>
									</div>
									<!-- End: phone number -->
									<!-- Start: email -->
									<div class = "col">
										<div class = "mb-3">
											<label class = "form-label"><strong>پست الکترونیکی ( email )</strong><br></label>
											<input required disabled class = "form-control" type = "email" id = "email" name = "email">
										</div>
									</div>
									<!-- End: email -->
								</div>
								<div class = "row">
									<!-- Start: name -->
									<div class = "col">
										<div class = "mb-3">
											<label class = "form-label"><strong>نام</strong></label>
											<input required disabled class = "form-control" type = "text" id = "first_name" name = "first_name">
										</div>
									</div>
									<!-- End: name -->
									<!-- Start: fname -->
									<div class = "col">
										<div class = "mb-3">
											<label class = "form-label"><strong>نام خانوادگی</strong></label>
											<input required disabled class = "form-control" type = "text" id = "last_name" name = "last_name">
										</div>
									</div>
									<!-- End: fname -->
								</div>
								<div class = "mb-3">
									<button id = "change_pinfo" value = "1" class = "btn btn-primary btn-sm change" type = "button">ثبت</button>
									<button id = "edite_pinfo" name = "edite_pinfo" value = "1" class = "btn btn-primary btn-sm" type = "button">تغییر اطلاعات</button>
									<button id = "cancel_change" value = "1" class = "btn btn-primary btn-sm cancelchange" type = "button">انصراف</button>
								</div>
							</form>
						</div>
					</div>
					<!-- End: user info -->

					<!-- Start: address -->
					<div class = "card shadow mb-3">
						<div onclick = "diplay_state('address-body')" class = "card-header d-flex align-items-lg-center py-3 drdnhader">
						<p class = "text-primary order-first m-0 fw-bold">&nbsp;آدرس ارسال کالا</p>
						<i class = "fa fa-caret-down order-last me-auto"></i>
					</div>
					<div class = "card-body" id = "address-body" style = "display:none;">
						<form name = "address_form" id = "address_form">
							<div class = "mb-3">
								<label class = "form-label"><strong>&nbsp;آدرس گیرنده</strong><br></label><input required disabled class = "form-control" type = "text" id = "address1">
							</div>
							<div class = "row">
								<div class = "col">
									<div class = "mb-3">
										<label class = "form-label"><strong>استان</strong></label><input required disabled class = "form-control" type = "text" id = "province">
									</div>
								</div>
								<div class = "col">
									<div class = "mb-3">
										<label class = "form-label"><strong>شهر</strong></label><input required disabled class = "form-control" type = "text" id = "city">
									</div>
								</div>
							</div>
							<div class = "row">
								<div class = "col-2">
									<div class = "mb-3">
										<label class = "form-label"><strong>پلاک</strong></label><input disabled class = "form-control" type = "text" id = "plack">
									</div>
								</div>
								<div class = "col-2">
									<div class = "mb-3">
										<label class = "form-label"><strong>واحد</strong></label><input disabled class = "form-control" type = "text" id = "vahed">
									</div>
								</div>
								<div class = "col">
									<div class = "mb-3">
										<label class = "form-label"><strong>کد پستی</strong></label><input required disabled class = "form-control" type = "text" id = "codposti">
									</div>
								</div>
							</div>
							<div class = "row">
								<div class = "col">
									<div class = "mb-3">
										<label class = "form-label"><strong>کد ملی</strong></label><input required disabled class = "form-control" type = "text" id = "codmli">
									</div>
								</div>
								<div class = "col">
									<div class = "mb-3">
										<label class = "form-label"><strong>شماره مبایل</strong></label><input required disabled class = "form-control" type = "text" id = "rphone">
									</div>
								</div>
							</div>
							<div class = "row">
								<div class = "col">
									<div class = "mb-3">
										<label class = "form-label"><strong>نام گیرنده</strong></label><input required disabled class = "form-control" type = "text" id = "rfname">
									</div>
								</div>
								<div class = "col">
									<div class = "mb-3">
										<label class = "form-label"><strong>نام خانوادگی گیرنده</strong></label><input required disabled class = "form-control" type = "text" id = "rlname">
									</div>
								</div>
							</div>
							<div class = "mb-3">
								<input type = "hidden" id = "addressid" value = "">
								<button id = "change_address" value = "1" class = "btn btn-primary btn-sm change" type = "button">ثبت</button>
								<button id = "cancel_change" value = "1" class = "btn btn-primary btn-sm cancelchange" type = "button">انصراف</button>
								<button id = "edite_address" value = "1" name = "edite_address" class = "btn btn-primary btn-sm" type = "button">تغییر اطلاعات</button>
							</div>
						</form>
					</div>
				</div>
				<!-- End: address -->

				<!-- Start: orders -->
				<div class = "card shadow mb-3">
					<div onclick = "diplay_state('order-body')" class = "card-header d-flex align-items-lg-center py-3 drdnhader">
						<p class = "text-primary order-first m-0 fw-bold">سفارش ها</p>
						<i class = "fa fa-caret-down order-last me-auto"></i>
					</div>
					<div class = "card-body" id = "order-body" style = "display: none;">
						<div class = "row">
							<div class = "col"><span>اخرین سفارش های شما&nbsp;</span>
								<form style = "margin-top: 10px;">
									<div class = "table-responsive">
										<table class = "table table-bordered">
											<thead>
											<tr style = "position: sticky;top: 0;background: var(--bs-light);">
												<th>#</th>
												<th>شماره سفارش</th>
												<th>تاریخ ثبت سفارش</th>
												<th>مبلغ قابل پرداخت</th>
												<th>وضعیت پرداخت</th>
												<th>وضعیت سفارش</th>
											</tr>
											</thead>
											<tbody>
											<tr>
												<td>1</td>
												<td class = "tiketsub">225452<a class = "d-inline-flex" style = "margin-right: 5px;"><i class = "fas fa-clipboard-list"></i><small>مشاهده فاکتور<br></small></a>
												</td>
												<td class = "tiketmassage">تاریخ</td>
												<td class = "tiketmassage">مبلغ</td>
												<td class = "tiketmassage"></td>
												<td class = "tiketmassage">وضعیت</td>
											</tr>
											</tbody>
										</table>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<!-- End: orders -->
			</div>
		</div>
	</div>
</div>

<!-- Start: tiket -->
<div class = "card shadow mb-5">
	<div onclick = "diplay_state('tiket-body')" class = "card-header d-flex align-items-lg-center py-3 drdnhader">
		<p class = "text-primary order-first m-0 fw-bold">تیکت ها</p>
		<i class = "fa fa-caret-down order-last me-auto"></i>
	</div>
	<div class = "card-body" id = "tiket-body" style = "display: none;">
		<div class = "row">
			<!-- Start: sen tiket -->
			<div class = "col-auto"><span>ارسال تیکت&nbsp;</span>
				<form style = "margin-top: 10px;">
					<div class = "mb-3">
						<label class = "form-label" for = "signature"><strong>موضوع</strong><br></label><input required class = "form-control" type = "text">
					</div>
					<div class = "mb-3">
						<label class = "form-label" for = "signature"><strong>متن پیام</strong><br></label><textarea class = "form-control" id = "signature" rows = "4" name = "signature"></textarea>
					</div>
					<div class = "mb-3">
						<div class = "form-check form-switch">
							<input required class = "form-check-input" type = "checkbox" id = "formCheck-1"><label class = "form-check-label" for = "formCheck-1"><strong>به من پیام بده وقتی تیکتم پاسخ داده شد !</strong><br></label>
						</div>
					</div>
					<div class = "mb-3">
						<button class = "btn btn-primary btn-sm" type = "submit">ارسال</button>
					</div>
				</form>
			</div><!-- End: sen tiket -->
			<!-- Start: get tiket -->
			<div class = "col-xl-8"><span>تیکت های پاسخ داده شده</span>
				<form style = "margin-top: 10px;">
					<div class = "table-responsive" style = "max-height: 500px;">
						<table class = "table table-bordered">
							<thead>
							<tr style = "position: sticky;top: 0;background: var(--bs-light);">
								<th>شماره</th>
								<th>موضوع</th>
								<th>پاسخ</th>
							</tr>
							</thead>
							<tbody>
							<tr>
								<td>654546</td>
								<td class = "tiketsub">موضوع</td>
								<td class = "tiketmassage" style = "max-width: 600px!important;">پاسخ</td>
							</tr>
							</tbody>
						</table>
					</div>
				</form>
			</div><!-- End: get tiket -->
		</div>
	</div>
</div>	<!-- End: tiket -->

</div>


<?php include 'footer.php'; ?>

<script>
    get_profile_info()
    edite("#info_form", "#edite_pinfo", "#change_pinfo");
    edite("#address_form", "#edite_address", "#change_address");
    insertdata()
</script>
