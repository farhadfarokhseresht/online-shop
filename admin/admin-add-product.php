<?php
include 'admin-head.php';
?>
<!-- Start: dash add product -->
<div class = "container-fluid" style = "direction: rtl;text-align: right;">
	<div class = "mb-4" style = "margin-top: 20px;"><strong>افزودن کالای جدید</strong></div>
	<form id = "product_details_form" method = "post" enctype="multipart/form-data">
		<div class = "row d-grid d-xl-flex">
			<div class = "col">
				<div class = "card shadow mb-4">
					<div class = "card-header py-3">
						<h6 class = "text-primary m-0 fw-bold">اطلاعات کلی</h6>
					</div>
					<div class = "card-body">
						<div class = "row d-grid d-sm-flex justify-content-center align-items-center">
							<div class = "col">
								<div class = "mb-3">
									<label class = "form-label"><strong>نام کالا</strong><br/></label><input type = "text" class = "form-control" name = "productname" id = "productname"/>
								</div>
							</div>
							<div class = "col">
								<div class = "mb-3">
									<label class = "form-label"><strong>لیبل کالا</strong><br/></label><input type = "text" class = "form-control" name = "producttitle" id = "producttitle"/>
								</div>
							</div>
						</div>
						<div class = "row d-grid d-sm-flex justify-content-center align-items-center">
							<div class = "col">
								<div class = "mb-3">
									<label class = "form-label"><strong>کلمات کلیدی</strong><br/></label><input type = "text" class = "form-control" name = "productkeyword" id = "productkeyword"/>
								</div>
							</div>
						</div>
						<div class = "mb-3"><label class = "form-label"><strong>تصویر کالا ( تصویر اصلی )</strong><br/></label><input type = "file" class = " form-control " accept = "image/*" name = "productimg" id = "productimg"/>
						</div>
						<div class = "row d-grid d-sm-flex">
							<div class = "col">
								<div class = "mb-3">
									<label class = "form-label"><strong>موجودی ( تعداد )</strong><br/></label><input type = "text" class = "form-control" name = "productqyt" id = "productqyt"/>
								</div>
							</div>
							<div class = "col">
								<div class = "mb-3">
									<label class = "form-label"><strong>تخفیف ( درصد )</strong></label><input value = "0" type = "text" class = "form-control" name = "productdic" id = 'productdic'/>
								</div>
							</div>
							<div class = "col">
								<div class = "mb-3">
									<label class = "form-label"><strong>قیمت ( تومان ) </strong><br/></label><input type = "text" class = "form-control" name = "productprice" id = "productprice"/>
								</div>
							</div>
						</div>
						<div class = "row d-grid d-sm-flex">
							<div class = "col">
								<div class = "d-grid mb-3" id = "categoripart">
									<label class = "form-label"><strong>دسته</strong></label><select class = "form-select" id = "productcat" name = "productcat">
										<option selected>دسته مورد نظر را انتخاب کنید</option>
										<?php foreach ($categories_list as $ky => $val){echo '
											<option value = '.$ky.'>'.$val.'</option>
											';}  ?>
									</select>
									<a class = "admin_add_npart_bu" href = "#catgory-and-brand-content"><small class = "form-text">افزودن دسته جدید </small><i class = "far fa-plus-square"></i></a>
								</div>
							</div>
							<div class = "col">
								<div class = "d-grid mb-3" id = "brandpart">
									<label class = "form-label"><strong>برند</strong></label><select class = "form-select" id = "productbrand" name = "productbrand">
										<option selected>برند مورد نظر را انتخاب کنید</option>
										<?php foreach ($brands_list as $ky => $val){echo '
											<option value = '.$ky.'>'.$val.'</option>
											';}  ?>
									</select>
									<a class = "admin_add_npart_bu" href = "#catgory-and-brand-content"><small class = "form-text">افزودن برند جدید </small><i class = "far fa-plus-square"></i></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class = "col">
				<div class = "card shadow mb-4">
					<div class = "card-header py-3">
						<h6 class = "text-primary m-0 fw-bold">ویژگی ها ، تصاویر و نقد و برسی کالا</h6>
					</div>
					<div class = "card-body">
						<div class = "row d-grid d-sm-flex justify-content-center align-items-center">
							<div class = "col">
								<div class = "mb-3" style = "position: relative;">
									<label class = "form-label"><strong>افزودن تصاویر کالا</strong><br/></label>
									<div id = "new_chq_img" class = "newimage"></div>
									<div class = "d-grid">
										<input type = "hidden" id = "total_chq_img" value = "0"/>
										<div id = "addimg" class = "admin_add_npart_bu">
											<small class = "form-text">افزودن تصویر بیشتر <br/></small><i class = "far fa-plus-square"></i>
										</div>
										<div id = "removeimg" class = "admin_add_npart_bu">
											<small class = "form-text">حذف </small><i class = "fas fa-trash-alt"></i>
										</div>
									</div>
									<div></div>
								</div>
							</div>
						</div>
						<hr/>
						<div class = "row d-grid d-sm-flex justify-content-center align-items-center">
							<div class = "col">
								<div class = "mb-3" style = "position: relative;">
									<i class = "fas fa-tint" style = "position: absolute;left: 0;top: 2px;"></i><label class = "form-label"><strong>رنگ</strong><br/></label>
									<div class = "d-flex flex-wrap" id = "new_chq_color"></div>
									<div class = "d-grid">
										<input type = "hidden" class = "form-control" id = "total_chq_color" value = "1"/>
										<div id = "addcolor" class = "admin_add_npart_bu">
											<small class = "form-text">افزودن رنگ بیشتر <br/></small><i class = "far fa-plus-square"></i>
										</div>
										<div id = "removecolor" class = "admin_add_npart_bu">
											<small class = "form-text">حذف </small><i class = "fas fa-trash-alt"></i>
										</div>
									</div>
									<div></div>
								</div>
							</div>
						</div>
						<hr/>
						<div class = "row d-grid d-sm-flex justify-content-center align-items-center">
							<div class = "col">
								<div class = "mb-3" style = "position: relative;">
									<i class = "far fa-list-alt" style = "position: absolute;left: 0;top: 2px;"></i><label class = "form-label"><strong>ویژگی ها</strong><br/></label>
									<div id = "new_chq_Feature">
										<!--											<div class = "d-flex align-items-center align-items-sm-center" id = "newfeature">-->
										<!--												<input class = "form-control" type = "text"  placeholder = "ویژگی"/><i class = "fas fa-paperclip"></i><input class = "form-control" type = "text"  placeholder = "مشخصه"/>-->
										<!--											</div>-->
									</div>
									<div class = "d-grid">
										<input class = "form-control" type = "hidden" id = "total_chq_Feature" value = "0"/>
										<div id = "addFeature" class = "admin_add_npart_bu">
											<small class = "form-text">افزودن ویژگی جدید<br/></small><i class = "far fa-plus-square"></i>
										</div>
										<div id = "removeFeature" class = "admin_add_npart_bu">
											<small class = "form-text">حذف </small><i class = "fas fa-trash-alt"></i>
										</div>
										<div></div>
									</div>
								</div>
							</div>
						</div>
						<hr/>
						<div class = "row d-grid d-sm-flex justify-content-center align-items-center">
							<div class = "col">
								<div class = "mb-3" style = "position: relative;">
									<i class = "fas fa-file-alt" style = "position: absolute;left: 0;top: 2px;"></i><label class = "form-label"><strong>نقد و برسی کالا</strong><br/></label>
									<textarea class = "form-control" placeholder = "متن خود را تایپ یا در اینجا کپی کنید" name = "producttext"></textarea>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div>
			<button id = "addproduct" name="addproduct" class = "btn btn-primary admin_do_bu" type = "submit">ثبت</button>
			<div id = "messages"></div>
		</div>
	</form>
	<div class = "row d-grid d-xl-flex">
		<div class = "col">
			<div class = "shadow card">
				<a class = "btn btn-link text-center card-header fw-bold" data-bs-toggle = "collapse" aria-expanded = "true" aria-controls = "catgorybrand-content" href = "#catgorybrand-content" role = "button" id = "catgory-and-brand-content">تنظیمات دسته ها و برند ها</a>
				<div class = "collapse show" id = "catgorybrand-content">
					<div class = "card-body">
						<div class = "row d-grid d-sm-flex">
							<div class = "col">
								<div class = "d-grid mb-3">
									<form method = "post">
										<label class = "form-label"><strong>+ دسته</strong></label><input required minlength = "3" type = "text" class = "form-control" id = "newcatgory" placeholder = "نام دسته جدید" name = "newcatgory"/>
										<button name = "addnewcatgory" type = "submit" class = "btn d-flex justify-content-center align-items-center admin_add_npart_bu">
											<small class = "form-text">افزودن </small><i class = "far fa-plus-square"></i>
										</button>
									</form>
								</div>
							</div>
							<div class = "col">
								<div class = "d-grid mb-3">
									<form method = "post">
										<label class = "form-label"><strong>+ برند</strong></label><input required minlength = "3" type = "text" class = "form-control" placeholder = "نام برند جدید" name = "newbrand" id = "newbrand"/>
										<button  name = "addnewbrand" type = "submit"  class = "btn d-flex justify-content-center align-items-center admin_add_npart_bu">
											<small class = "form-text">افزودن </small><i class = "far fa-plus-square"></i>
										</button>
									</form>
								</div>
							</div>
						</div>
						<div class = "row d-grid d-sm-flex">
							<div class = "col">
								<div class = "d-grid mb-3">
									<form method = "post">
										<label class = "form-label"><strong>- دسته</strong></label><select class = "form-select" id = "rm_catgory" name="" = "rm_catgory" required>
											<option selected>دسته مورد نظر را انتخاب کنید</option>
											<?php foreach ($categories_list as $ky => $val){echo '
											<option value = '.$ky.'>'.$val.'</option>
											';}  ?>
										</select>
										<button name = "rmcatgory" type = "submit"  class = " btn d-flex justify-content-center align-items-center admin_add_npart_bu">
											<small class = "form-text">حذف </small><i class = "fas fa-trash-alt"></i>
										</button>
									</form>
								</div>
							</div>
							<div class = "col">
								<div class = "d-grid mb-3">
									<form method = "post">
										<label class = "form-label"><strong>- برند</strong></label><select class = "form-select" id = "rm_brand"  name= "rm_brand" required>
											<option selected>برند مورد نظر را انتخاب کنید</option>
                                            <?php foreach ($brands_list as $ky => $val){echo '
											<option value = '.$ky.'>'.$val.'</option>
											';}  ?>
										</select>
										<button name = "rmbrand" type = "submit"  class = "btn d-flex justify-content-center align-items-center admin_add_npart_bu" >
											<small class = "form-text">حذف </small><i class = "fas fa-trash-alt"></i>
										</button>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div><!-- End: dash add product -->
<?php
include 'admin-footer.php';
?>
<script src = "https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src = "https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>

<style>
	label.error {
		width: 100%;
		display: flex;
		color: rgba(232, 2, 2, 0.5);
		direction: ltr;
		text-align: left;
		font-size: 1rem;
		margin-top: 5px;
	}

	textarea.error {
		width: 100%;
		font-size: unset;
		background-color: #ffe6eb;
		border: 1px dashed rgba(232, 2, 2, 0.5) !important;
		color: rgba(232, 2, 2, 0.5);;
	}

	input.error {
		width: 100%;
		font-size: unset;
		background-color: #ffe6eb;
		border: 1px dashed rgba(232, 2, 2, 0.5) !important;
		color: rgba(232, 2, 2, 0.5);;
	}
</style>