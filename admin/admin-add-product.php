<?php
include 'admin-head.php'
?>
<!-- Start: dash add product -->
	<div class="container-fluid" style="direction: rtl;text-align: right;">
		<div class="mb-4" style="margin-top: 20px;"><strong>افزودن کالای جدید</strong></div>
		<div class="row d-grid d-xl-flex">
			<div class="col">
				<div class="card shadow mb-4">
					<div class="card-header py-3">
						<h6 class="text-primary m-0 fw-bold">اطلاعات کلی</h6>
					</div>
					<div class="card-body">
						<form>
							<div class="row d-grid d-sm-flex justify-content-center align-items-center">
								<div class="col">
									<div class="mb-3"><label class="form-label" for="city"><strong>نام کالا</strong><br /></label><input class="form-control" type="text" required /></div>
								</div>
								<div class="col">
									<div class="mb-3"><label class="form-label" for="country"><strong>لیبل کالا</strong><br /></label><input class="form-control" type="text" id="country" required /></div>
								</div>
							</div>
							<div class="row d-grid d-sm-flex justify-content-center align-items-center">
								<div class="col">
									<div class="mb-3"><label class="form-label" for="city"><strong>کلمات کلیدی</strong><br /></label><input class="form-control" type="text" required /></div>
								</div>
							</div>
							<div class="mb-3"><label class="form-label" for="address"><strong>تصویر کالا ( تصویر اصلی )</strong><br /></label><input type="file" class="border rounded-pill form-control form-control-sm" required accept="image/*" style="font-family: Vazir;" /></div>
							<div class="row d-grid d-sm-flex">
								<div class="col">
									<div class="mb-3"><label class="form-label" for="city"><strong>موجودی ( تعداد )</strong><br /></label><input class="form-control" type="text" required minlength="1" /></div>
								</div>
								<div class="col">
									<div class="mb-3"><label class="form-label" for="country"><strong>تخفیف ( درصد )</strong></label><input class="form-control" type="text" /></div>
								</div>
								<div class="col">
									<div class="mb-3"><label class="form-label" for="country"><strong>قیمت ( تومان ) </strong><br /></label><input class="form-control" type="text" required /></div>
								</div>
							</div>
							<div class="row d-grid d-sm-flex">
								<div class="col">
									<div class="d-grid mb-3" id="categoripart"><label class="form-label" for="country"><strong>دسته</strong></label><select class="form-select" id="catgory">
											<optgroup label="This is a group">
												<option value="12" selected>This is item 1</option>
												<option value="13">This is item 2</option>
												<option value="14" onclick="alert()">This is item 3</option>
											</optgroup>
										</select>
										<div id="admin_add_cat_bu" class="admin_add_npart_bu" onclick="addnewcat()"><small class="form-text">افزودن دسته جدید </small><i class="far fa-plus-square"></i></div>
										<div></div>
									</div>
								</div>
								<div class="col">
									<div class="d-grid mb-3" id="brandpart"><label class="form-label" for="country"><strong>برند</strong></label><select class="form-select" id="brand">
											<optgroup label="This is a group">
												<option value="12" selected>This is item 1</option>
												<option value="13">This is item 2</option>
												<option value="14" onclick="alert()">This is item 3</option>
											</optgroup>
										</select>
										<div id="admin_add_brand_bu" class="admin_add_npart_bu" onclick="addnewbrand()"><small class="form-text">افزودن برند جدید </small><i class="far fa-plus-square"></i></div>
										<div></div>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
			<div class="col">
				<div class="card shadow mb-4">
					<div class="card-header py-3">
						<h6 class="text-primary m-0 fw-bold">ویژگی ها ، تصاویر و نقد و برسی کالا</h6>
					</div>
					<div class="card-body">
						<form>
							<div class="row d-grid d-sm-flex justify-content-center align-items-center">
								<div class="col">
									<div class="mb-3" style="position: relative;"><label class="form-label" for="city"><strong>افزودن تصاویر کالا</strong><br /></label>
										<div id="new_chq" class="newimage"></div>
										<div class="d-grid"><input type="hidden" class="form-control" id="total_chq" value="1" />
											<div id="addimg" class="admin_add_npart_bu"><small class="form-text">افزودن تصویر بیشتر <br /></small><i class="far fa-plus-square"></i></div>
											<div id="removeimg" class="admin_add_npart_bu"><small class="form-text">حذف </small><i class="fas fa-trash-alt"></i></div>
										</div>
										<div></div>
									</div>
								</div>
							</div>
							<hr />
							<div class="row d-grid d-sm-flex justify-content-center align-items-center">
								<div class="col">
									<div class="mb-3" style="position: relative;"><i class="fas fa-tint" style="position: absolute;left: 0;top: 2px;"></i><label class="form-label" for="city"><strong>رنگ</strong><br /></label>
										<div class="d-flex flex-row" id="new_chq_color"></div>
										<div class="d-grid"><input class="form-control" type="hidden" id="total_chq_color" value="1" />
											<div id="addcolor" class="admin_add_npart_bu"><small class="form-text">افزودن رنگ بیشتر <br /></small><i class="far fa-plus-square"></i></div>
											<div id="removecolor" class="admin_add_npart_bu"><small class="form-text">حذف </small><i class="fas fa-trash-alt"></i></div>
										</div>
										<div></div>
									</div>
								</div>
							</div>
							<hr />
							<div class="row d-grid d-sm-flex justify-content-center align-items-center">
								<div class="col">
									<div class="mb-3" style="position: relative;"><i class="far fa-list-alt" style="position: absolute;left: 0;top: 2px;"></i><label class="form-label" for="city"><strong>ویژگی ها</strong><br /></label>
										<div id="new_chq_Feature" class="newimage">
											<div class="d-flex align-items-center align-items-sm-center" id="newfeature"><input type="text" class="form-control" required placeholder="ویژگی" /><i class="fas fa-paperclip"></i><input type="text" class="form-control" required placeholder="مشخصه" /></div>
										</div>
										<div class="d-grid"><input class="form-control" type="hidden" id="total_chq_Feature" value="1" />
											<div id="addFeature" class="admin_add_npart_bu"><small class="form-text">افزودن ویژگی جدید<br /></small><i class="far fa-plus-square"></i></div>
											<div id="removeFeature" class="admin_add_npart_bu"><small class="form-text">حذف </small><i class="fas fa-trash-alt"></i></div>
											<div></div>
										</div>
									</div>
								</div>
							</div>
							<hr />
							<div class="row d-grid d-sm-flex justify-content-center align-items-center">
								<div class="col">
									<div class="mb-3" style="position: relative;"><i class="fas fa-file-alt" style="position: absolute;left: 0;top: 2px;"></i><label class="form-label" for="city"><strong>نقد و برسی کالا</strong><br /></label><textarea class="form-control" placeholder="متن خود را تایپ یا در اینجا کپی کنید"></textarea></div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<div><button class="btn btn-primary admin_do_bu" type="button">ثبت</button></div>
	</div>
<!-- End: dash add product -->
<?php
include 'admin-footer.php'
?>