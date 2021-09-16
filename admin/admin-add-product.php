<?php
include 'admin-head.php'
?>
<!-- Start: dash add product -->
<div class = "container-fluid" style = "direction: rtl;text-align: right;">
	<div class = "d-sm-flex justify-content-between align-items-center mb-4" style = "margin-top: 20px;">
		<strong>افزودن کالای جدید</strong><i class = "fas fa-boxes"></i></div>
	<div class = "row d-grid d-xl-flex">
		<div class = "col">
			<!-- Start: Basic Card -->
			<div class = "card shadow mb-4">
				<div class = "card-header py-3">
					<h6 class = "text-primary m-0 fw-bold">اطلاعات کلی</h6>
				</div>
				<div class = "card-body">
					<form>
						<div class = "row d-grid d-sm-flex justify-content-center align-items-center">
							<div class = "col">
								<div class = "mb-3">
									<label class = "form-label" for = "city"><strong>نام کالا</strong><br></label><input class = "form-control" type = "text" required = "">
								</div>
							</div>
							<div class = "col">
								<div class = "mb-3">
									<label class = "form-label" for = "country"><strong>لیبل کالا</strong><br></label><input class = "form-control" type = "text" id = "country" required = "">
								</div>
							</div>
						</div>
						<div class = "row d-grid d-sm-flex justify-content-center align-items-center">
							<div class = "col">
								<div class = "mb-3">
									<label class = "form-label" for = "city"><strong>کلمات کلیدی</strong><br></label><input class = "form-control" type = "text" required = "">
								</div>
							</div>
						</div>
						<div class = "mb-3">
							<label class = "form-label" for = "address"><strong>تصویر کالا ( تصویر اصلی )</strong><br></label><input class = "border rounded-pill form-control form-control-sm" type = "file" required = "" accept = "image/*" style = "font-family: Vazir;"><small class = "form-text" style = "color: var(--bs-yellow);font-size: 12px;">تصویر باید مطابق شرایط زیر بارگذاری شود !</small>
						</div>
						<div class = "row d-grid d-sm-flex">
							<div class = "col">
								<div class = "mb-3">
									<label class = "form-label" for = "city"><strong>موجودی ( تعداد )</strong><br></label><input class = "form-control" type = "text" required = "" minlength = "1">
								</div>
							</div>
							<div class = "col">
								<div class = "mb-3">
									<label class = "form-label" for = "country"><strong>تخفیف ( درصد )</strong></label><input class = "form-control" type = "text">
								</div>
							</div>
							<div class = "col">
								<div class = "mb-3">
									<label class = "form-label" for = "country"><strong>قیمت ( تومان )&nbsp;</strong><br></label><input class = "form-control" type = "text" required = "">
								</div>
							</div>
						</div>
						<div class = "row d-grid d-sm-flex">
							<div class = "col">
								<div class = "d-grid mb-3" id = "categoripart">
									<label class = "form-label" for = "country"><strong>دسته</strong></label><select class = "form-select" id = "catgory">
										<optgroup label = "This is a group">
											<option value = "12" selected = "">This is item 1</option>
											<option value = "13">This is item 2</option>
											<option value = "14" onclick = "alert()">This is item 3</option>
										</optgroup>
									</select>
									<div class = "d-inline-flex align-items-sm-center admin_add_npart_bu" id = "admin_add_cat_bu" onclick = "addnewcat()">
										<small class = "form-text">افزودن دسته جدید&nbsp;</small><i class = "far fa-plus-square"></i>
									</div>
									<script>
                                        function addnewcat() {
                                            $('#catgory').remove();
                                            $('#admin_add_cat_bu').remove();
                                            $('#categoripart').append('<input type="text" class="form-control" placeholder="نام دسته جدید" />')
                                        }
									</script>
								</div>
							</div>
							<div class = "col">
								<div class = "d-grid mb-3" id = "brandpart"><label class = "form-label" for = "country"><strong>برند</strong></label><select class = "form-select" id = "brand">
										<optgroup label = "This is a group">
											<option value = "12" selected = "">This is item 1</option>
											<option value = "13">This is item 2</option>
											<option value = "14" onclick = "alert()">This is item 3</option>
										</optgroup>
									</select>
									<div class = "d-inline-flex align-items-sm-center admin_add_npart_bu" id = "admin_add_brand_bu" onclick = "addnewbrand()">
										<small class = "form-text">افزودن برند جدید&nbsp;</small><i class = "far fa-plus-square"></i>
									</div>
									<script>
                                        function addnewbrand() {
                                            $('#brand').remove();
                                            $('#admin_add_brand_bu').remove();
                                            $('#brandpart').append('<input type="text" class="form-control" placeholder="نام برند جدید" />')
                                        }
									</script>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div><!-- End: Basic Card -->
		</div>
		<div class = "col">
			<!-- Start: Basic Card -->
			<div class = "card shadow mb-4">
				<div class = "card-header py-3">
					<h6 class = "text-primary m-0 fw-bold">ویژگی ها ، تصاویر و نقد و برسی کالا</h6>
				</div>
				<div class = "card-body">
					<form>
						<div class = "row d-grid d-sm-flex justify-content-center align-items-center">
							<div class = "col">
								<div class = "mb-3" style = "position: relative;">
									<i class = "far fa-images" style = "position: absolute;left: 0;top: 2px;"></i><label class = "form-label" for = "city"><strong>افزودن تصاویر کالا</strong><br></label>
									<div id = "new_chq" class = "newimage"></div>
									<div class = "d-grid">
										<input class = "form-control" type = "hidden" id = "total_chq" value = "1">
										<div class = "d-inline-flex align-items-sm-center admin_add_npart_bu" id = "addimg">
											<small class = "form-text">افزودن تصویر بیشتر&nbsp;<br></small><i class = "far fa-plus-square"></i>
										</div>
										<div class = "d-inline-flex align-items-sm-center admin_add_npart_bu" id = "removeimg">
											<small class = "form-text">حذف&nbsp;</small><i class = "fas fa-trash-alt"></i>
										</div>
									</div>
									<script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

									<script>
                                        $('#addimg').on('click', add);
                                        $('#removeimg').on('click', remove);

                                        function add() {
                                            var new_chq_no = parseInt($('#total_chq').val()) + 1;
                                            var new_input = "<input required accept='image/*'  type='file' class='form-control form-control-sm' id='new_" + new_chq_no + "'>";
                                            $('#new_chq').append(new_input);

                                            $('#total_chq').val(new_chq_no);
                                        }

                                        function remove() {
                                            var last_chq_no = $('#total_chq').val();

                                            if (last_chq_no > 0) {
                                                $('#new_' + last_chq_no).remove();
                                                $('#total_chq').val(last_chq_no - 1);
                                            }
                                        }
									</script>
								</div>
							</div>
						</div>
						<hr>
						<div class = "row d-grid d-sm-flex justify-content-center align-items-center">
							<div class = "col">
								<div class = "mb-3" style = "position: relative;">
									<i class = "fas fa-tint" style = "position: absolute;left: 0;top: 2px;"></i><label class = "form-label" for = "city"><strong>رنگ</strong><br></label>
									<div class = "d-flex flex-row" id = "new_chq_color"></div>
									<div class = "d-grid">
										<input class = "form-control" type = "hidden" id = "total_chq_color" value = "1">
										<div class = "d-inline-flex align-items-sm-center admin_add_npart_bu" id = "addcolor">
											<small class = "form-text">افزودن رنگ بیشتر&nbsp;<br></small><i class = "far fa-plus-square"></i>
										</div>
										<div class = "d-inline-flex align-items-sm-center admin_add_npart_bu" id = "removecolor">
											<small class = "form-text">حذف&nbsp;</small><i class = "fas fa-trash-alt"></i>
										</div>
									</div>
									<script>
                                        $('#addcolor').on('click', addcolor);
                                        $('#removecolor').on('click', removecolor);

                                        function addcolor() {
                                            var new_chq_no = parseInt($('#total_chq_color').val()) + 1;
                                            var new_input = "<input type='color' class='form-control form-control-color' id='new_color" + new_chq_no + "'>";
                                            $('#new_chq_color').append(new_input);

                                            $('#total_chq_color').val(new_chq_no);
                                        }

                                        function removecolor() {
                                            var last_chq_no = $('#total_chq_color').val();

                                            if (last_chq_no > 0) {
                                                $('#new_color' + last_chq_no).remove();
                                                $('#total_chq_color').val(last_chq_no - 1);
                                            }
                                        }
									</script>
								</div>
							</div>
						</div>
						<hr>
						<div class = "row d-grid d-sm-flex justify-content-center align-items-center">
							<div class = "col">
								<div class = "mb-3" style = "position: relative;">
									<i class = "far fa-list-alt" style = "position: absolute;left: 0;top: 2px;"></i><label class = "form-label" for = "city"><strong>ویژگی ها</strong><br></label>
									<div id = "new_chq_Feature" class = "newimage">
										<div class = "d-flex align-items-sm-center" id = "newfeature">
											<input class = "form-control" type = "text" required = "" placeholder = "ویژگی"><i class = "fas fa-paperclip"></i><input class = "form-control" type = "text" required = "" placeholder = "مشخصه">
										</div>
									</div>
									<div class = "d-grid">
										<input class = "form-control" type = "hidden" id = "total_chq_Feature" value = "1">
										<div class = "d-inline-flex align-items-sm-center admin_add_npart_bu" id = "addFeature">
											<small class = "form-text">افزودن ویژگی جدید<br></small><i class = "far fa-plus-square"></i>
										</div>
										<div class = "d-inline-flex align-items-sm-center admin_add_npart_bu" id = "removeFeature">
											<small class = "form-text">حذف&nbsp;</small><i class = "fas fa-trash-alt"></i>
										</div>
										<script>
                                            $('#addFeature').on('click', addFeature);
                                            $('#removeFeature').on('click', removeFeature);

                                            function addFeature() {
                                                var new_chq_no = parseInt($('#total_chq_Feature').val()) + 1;
                                                // var new_input = "<input required accept='image/*'  type='file' class='form-control form-control-sm' id='new_Feature" + new_chq_no + "'>";
                                                // $('#new_chq_Feature').append(new_input);
                                                var itm = document.getElementById("newfeature");
                                                var cln = itm.cloneNode(true);
                                                cln.setAttribute("id", "newfeature" + new_chq_no)
                                                document.getElementById("new_chq_Feature").appendChild(cln);
                                                $('#total_chq_Feature').val(new_chq_no);
                                            }

                                            function removeFeature() {
                                                var last_chq_no = $('#total_chq_Feature').val();

                                                if (last_chq_no > 1) {
                                                    $('#newfeature' + last_chq_no).remove();
                                                    $('#total_chq_Feature').val(last_chq_no - 1);
                                                }
                                            }
										</script>
									</div>
								</div>
							</div>
						</div>
						<hr>
						<div class = "row d-grid d-sm-flex justify-content-center align-items-center">
							<div class = "col">
								<div class = "mb-3" style = "position: relative;">
									<i class = "fas fa-file-alt" style = "position: absolute;left: 0;top: 2px;"></i><label class = "form-label" for = "city"><strong>نقد و برسی کالا</strong><br></label><textarea class = "form-control" placeholder = "متن خود را تایپ یا در اینجا کپی کنید"></textarea>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div><!-- End: Basic Card -->
		</div>
	</div><!-- Start: admin_do_bu -->
	<div>
		<button class = "btn btn-primary admin_do_bu" type = "button">ثبت</button>
	</div><!-- End: admin_do_bu -->
</div>
<!-- End: dash add product -->
<?php
include 'admin-footer.php'
?>