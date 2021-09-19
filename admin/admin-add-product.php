<?php
include 'admin-head.php'
?>
<!-- Start: dash add product -->
<div class = "container-fluid" style = "direction: rtl;text-align: right;">
	<div class = "mb-4" style = "margin-top: 20px;"><strong>افزودن کالای جدید</strong></div>
	<form id="product_details_form" method="post">
		<div class = "row d-grid d-xl-flex">
			<!--<div class = "col">
				<div class = "card shadow mb-4">
					<div class = "card-header py-3">
						<h6 class = "text-primary m-0 fw-bold">اطلاعات کلی</h6>
					</div>
					<div class = "card-body">
							<div class = "row d-grid d-sm-flex justify-content-center align-items-center">
								<div class = "col">
									<div class = "mb-3">
										<label class = "form-label"><strong>نام کالا</strong><br/></label><input type = "text" class = "form-control" name = "productname" id="productname"/>
									</div>
								</div>
								<div class = "col">
									<div class = "mb-3">
										<label class = "form-label"><strong>لیبل کالا</strong><br/></label><input type = "text" class = "form-control" name = "producttitle" id="producttitle"/>
									</div>
								</div>
							</div>
							<div class = "row d-grid d-sm-flex justify-content-center align-items-center">
								<div class = "col">
									<div class = "mb-3">
										<label class = "form-label"><strong>کلمات کلیدی</strong><br/></label><input  type = "text" class = "form-control" name = "productkeyword" id="productkeyword"/>
									</div>
								</div>
							</div>
							<div class = "mb-3"><label class = "form-label"><strong>تصویر کالا ( تصویر اصلی )</strong><br/></label><input type = "file" class = " form-control " accept = "image/*"  name = "productimg" id="productimg"/>
							</div>
							<div class = "row d-grid d-sm-flex">
								<div class = "col">
									<div class = "mb-3">
										<label class = "form-label"><strong>موجودی ( تعداد )</strong><br/></label><input type = "text" class = "form-control" name = "productqyt" id="productqyt"/>
									</div>
								</div>
								<div class = "col">
									<div class = "mb-3">
										<label class = "form-label"><strong>تخفیف ( درصد )</strong></label><input value = "0" type = "text" class = "form-control" name = "productdic" id = 'productdic'/>
									</div>
								</div>
								<div class = "col">
									<div class = "mb-3">
										<label class = "form-label"><strong>قیمت ( تومان ) </strong><br/></label><input type = "text" class = "form-control" name = "productprice" id="productprice"/>
									</div>
								</div>
							</div>
							<div class = "row d-grid d-sm-flex">
								<div class = "col">
									<div class = "d-grid mb-3" id = "categoripart">
										<label class = "form-label"><strong>دسته</strong></label><select class = "form-select" id = "productcat" name= "productcat">
											<optgroup label = "This is a group">
												<option value = "12" selected>This is item 1</option>
												<option value = "13">This is item 2</option>
												<option value = "14" onclick = "alert()">This is item 3</option>
											</optgroup>
										</select>
										<a class="admin_add_npart_bu" href="#catgory-and-brand-content"><small class="form-text">افزودن دسته جدید </small><i class="far fa-plus-square"></i></a>
									</div>
								</div>
								<div class = "col">
									<div class = "d-grid mb-3" id = "brandpart">
										<label class = "form-label"><strong>برند</strong></label><select class = "form-select" id = "productbrand" name="productbrand">
											<optgroup label = "This is a group" onclick = "alert()">
												<option value = "12" selected>This is item 1</option>
												<option value = "13">This is item 2</option>
												<option value = "14">This is item 3</option>
											</optgroup>
										</select>
										<a class="admin_add_npart_bu" href="#catgory-and-brand-content"><small class="form-text">افزودن برند جدید </small><i class="far fa-plus-square"></i></a>
									</div>
								</div>
							</div>
					</div>
				</div>
			</div>-->
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
											<input type = "hidden"  id = "total_chq_img" value = "0"/>
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
										<div id = "new_chq_Feature" >
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
			<button id = "addproduct" class = "btn btn-primary admin_do_bu" type = "submit">ثبت</button>
			<div id = "messages"></div>
		</div>
	</form>
	<!--<div class="row d-grid d-xl-flex">
		<div class="col">
			<div class="shadow card"><a class="btn btn-link text-center card-header fw-bold" data-bs-toggle="collapse" aria-expanded="true" aria-controls="catgorybrand-content" href="#catgorybrand-content" role="button" id="catgory-and-brand-content">تنظیمات دسته ها و برند ها</a>
				<div class="collapse" id="catgorybrand-content">
					<div class="card-body">
						<form>
							<div class="row d-grid d-sm-flex">
								<div class="col">
									<div class="d-grid mb-3" id="categoripart-1"><label class="form-label"><strong>+ دسته</strong></label><input type="text" class="form-control" id="newcatgory" placeholder="نام دسته جدید" name="newcatgory" />
										<div class="d-flex justify-content-center align-items-center admin_add_npart_bu" onclick="addnewcat()"><small class="form-text">افزودن </small><i class="far fa-plus-square"></i></div>
									</div>
								</div>
								<div class="col">
									<div class="d-grid mb-3" id="brandpart-1"><label class="form-label"><strong>+ برند</strong></label><input type="text" class="form-control" placeholder="نام برند جدید" name="newbrand" />
										<div></div>
										<div class="d-flex justify-content-center align-items-center admin_add_npart_bu" onclick="addnewcat()"><small class="form-text">افزودن </small><i class="far fa-plus-square"></i></div>
									</div>
								</div>
							</div>
							<div class="row d-grid d-sm-flex">
								<div class="col">
									<div class="d-grid mb-3" id="brandpart-1"><label class="form-label"><strong>- دسته</strong></label><select class="form-select" id="catgory-1" required>
											<option value selected>دسته مورد نظر را انتخاب کنید</option>
											<option value="13">This is item 2</option>
											<option value="14">This is item 3</option>
										</select>
										<div></div>
										<div class="d-flex justify-content-center align-items-center admin_add_npart_bu" onclick="addnewcat()"><small class="form-text">حذف </small><i class="fas fa-trash-alt"></i></div>
									</div>
								</div>
								<div class="col">
									<div class="d-grid mb-3" id="brandpart-2"><label class="form-label"><strong>- برند</strong></label><select class="form-select" id="catgory-2" required>
											<option value selected>برند مورد نظر را انتخاب کنید</option>
											<option value="13">This is item 2</option>
											<option value="14">This is item 3</option>
										</select>
										<div></div>
										<div class="d-flex justify-content-center align-items-center admin_add_npart_bu" onclick="addnewcat()"><small class="form-text">حذف </small><i class="fas fa-trash-alt"></i></div>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>-->
</div><!-- End: dash add product -->
<?php
include 'admin-footer.php';
include 'admin-app.php';
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
<script>


	// $('#addproduct').on('click',function () {
    //     var allInputs = $( ":input" );
    //     var formChildren = $( "form > *" );
    //     $( "#messages" ).text( "Found " + allInputs.length + " inputs and the form has " +
    //         formChildren.length + " children." );
    //     $( "form" ).submit(function( event ) {
    //         event.preventDefault();
    //     });
    // })


</script>

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
	textarea.error{
		width: 100%;
		font-size: unset;
		background-color: #ffe6eb;
		border: 1px dashed rgba(232, 2, 2, 0.5)!important;
		color: rgba(232, 2, 2, 0.5);;
	}
	input.error {
		width: 100%;
		font-size: unset;
		background-color: #ffe6eb;
		border: 1px dashed rgba(232, 2, 2, 0.5)!important;
		color: rgba(232, 2, 2, 0.5);;
	}
</style>