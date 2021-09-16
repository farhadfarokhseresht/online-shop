<?php
include 'admin-head.php'
?>
<!-- Start: dash add user -->
<div class = "container-fluid adminContainer">
	<div class = "row mb-3">
		<div class = "col">
			<!-- Start: user info -->
			<div class = "card shadow mb-3">
				<div class = "card-header py-3">
					<p class = "text-primary m-0 fw-bold">اطلاعات کاربری</p>
				</div>
				<div class = "card-body">
					<form>
						<div class = "row">
							<!-- Start: phone number -->
							<div class = "col">
								<div class = "mb-3">
									<label class = "form-label" for = "username"><strong>شماره همراه</strong><br></label><input class = "form-control" type = "text" id = "phonenum">
								</div>
							</div><!-- End: phone number -->
							<!-- Start: email -->
							<div class = "col">
								<div class = "mb-3">
									<label class = "form-label" for = "email"><strong>پست الکترونیکی ( email )</strong><br></label><input class = "form-control" type = "email" id = "email">
								</div>
							</div><!-- End: email -->
							<!-- Start: email -->
							<div class = "col">
								<div class = "mb-3">
									<label class = "form-label" for = "email"><strong>رمز عبور</strong><br></label><input class = "form-control" type = "password">
								</div>
							</div><!-- End: email -->
						</div>
						<div class = "row">
							<!-- Start: name -->
							<div class = "col">
								<div class = "mb-3"><label class = "form-label" for = "first_name"><strong>نام</strong></label><input class = "form-control" type = "text" id = "first_name">
								</div>
							</div><!-- End: name -->
							<!-- Start: fname -->
							<div class = "col">
								<div class = "mb-3">
									<label class = "form-label" for = "last_name"><strong>نام خانوادگی</strong></label><input class = "form-control" type = "text" id = "last_name">
								</div>
							</div><!-- End: fname -->
						</div>
					</form>
				</div>
			</div><!-- End: user info -->
			<!-- Start: Collapsible Card -->
			<div class = "shadow card">
				<a class = "btn btn-link text-center card-header fw-bold" data-bs-toggle = "collapse" aria-expanded = "false" aria-controls = "collapse-4" href = "#collapse-4" role = "button">اطلاعات آدرس</a>
				<div class = "collapse" id = "collapse-4">
					<div class = "card-body">
						<form>
							<!-- Start: address -->
							<div class = "mb-3">
								<label class = "form-label" for = "address"><strong>&nbsp;آدرس&nbsp;</strong><br></label><input class = "form-control" type = "text" id = "address-1">
							</div><!-- End: address -->
							<!-- Start: provice and city -->
							<div class = "row">
								<div class = "col">
									<div class = "mb-3"><label class = "form-label" for = "city"><strong>استان</strong></label><input class = "form-control" type = "text" id = "city-2">
									</div>
								</div>
								<div class = "col">
									<div class = "mb-3"><label class = "form-label" for = "country"><strong>شهر</strong></label><input class = "form-control" type = "text" id = "country-3">
									</div>
								</div>
							</div><!-- End: provice and city -->
							<!-- Start: plak vahed -->
							<div class = "row">
								<div class = "col-2">
									<div class = "mb-3">
										<label class = "form-label" for = "city"><strong>پلاک</strong></label><input class = "form-control" type = "text" id = "city-3">
									</div>
								</div>
								<div class = "col-2">
									<div class = "mb-3">
										<label class = "form-label" for = "country"><strong>واحد</strong></label><input class = "form-control" type = "text" id = "country-7">
									</div>
								</div>
								<div class = "col">
									<div class = "mb-3">
										<label class = "form-label" for = "country"><strong>کد پستی</strong></label><input class = "form-control bignumstyle" type = "text">
									</div>
								</div>
							</div><!-- End: plak vahed -->
							<div class = "row">
								<div class = "col">
									<div class = "mb-3">
										<label class = "form-label" for = "country"><strong>کد ملی</strong></label><input class = "form-control" type = "text" id = "country-8">
									</div>
								</div>
								<div class = "col">
									<div class = "mb-3">
										<label class = "form-label" for = "country"><strong>شماره مبایل</strong></label><input class = "form-control" type = "text" id = "country-9">
									</div>
								</div>
							</div>
							<div class = "row">
								<div class = "col">
									<div class = "mb-3">
										<label class = "form-label" for = "country"><strong>نام گیرنده</strong></label><input class = "form-control" type = "text" id = "country-10">
									</div>
								</div>
								<div class = "col">
									<div class = "mb-3">
										<label class = "form-label" for = "country"><strong>نام خانوادگی گیرنده</strong></label><input class = "form-control" type = "text">
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div><!-- End: Collapsible Card -->
		</div>
	</div><!-- Start: admin_do_bu -->
	<div>
		<button class = "btn btn-primary admin_do_bu" type = "button">ثبت</button>
	</div><!-- End: admin_do_bu -->
</div>
<!-- End: dash add user -->
<?php
include 'admin-footer.php'
?>
