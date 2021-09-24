<?php
include 'admin-head.php'
?>
<!-- Start: dash product list -->
<div class = "container-fluid" style = "direction: rtl;text-align: right;">
	<div class = "d-sm-flex justify-content-between align-items-center mb-4" style = "margin-top: 20px;">
		<a class = "btn btn-primary btn-sm d-none d-sm-inline-block" role = "button" href = "#"><i class = "fas fa-download fa-sm text-white-50"></i> دریافت گزارش </a>
	</div>
	<div class = "row">
		<div class = "col">
			<div class = "card shadow">
				<div class = "card-header py-3">
					<p class = "text-primary m-0 fw-bold">لیست کالاها</p>
				</div>
				<div class = "card-body">
					<div class = "row">
						<div class = "col-md-6 text-nowrap">
							<div id = "dataTable_length" class = "dataTables_length" aria-controls = "dataTable">
								<label class = "form-label">نمایش : <select onclick = "productlist()" id="limit" class = "d-inline-block form-select form-select-sm">
										<option value = "10">10</option>
										<option value = "25">25</option>
										<option value = "50">50</option>
										<option value = "100">100</option>
									</select>  </label></div>
						</div>
						<div class = "col-md-6 text-nowrap">
							<div id = "dataTable_length" class = "dataTables_length" aria-controls = "dataTable">
								<label class = "form-label">دسته : <select class = "d-inline-block form-select form-select-sm">
										<option value = "10" selected>10</option>
										<option value = "25">25</option>
										<option value = "50">50</option>
										<option value = "100">100</option>
									</select> </label></div>
						</div>
					</div>
					<div class = "table-responsive" style = "text-align: center;max-height: 500px;">
						<table class = "table">
							<thead>
							<tr>
								<th>کالا<input type = "search" class = "form-control form-control-sm" aria-controls = "dataTable" placeholder = "جست و جو  . . . "/>
								</th>
								<th>دسته</th>
								<th>تخفیف</th>
								<th>قیمت(تومان)</th>
								<th>موجودی</th>
								<th>حذف/اصلاح</th>
							</tr>
							</thead>
							<tbody id="product_list">
							<!--<tr >
								<td class = "ad_pl_img"><img src = "product image/image2.jpeg"/>sssssssssssssss</td>
								<td>د</td>
								<td>ت</td>
								<td>ق</td>
								<td>م</td>
								<td class = "ad_pl_trash">
									<div class = "d-flex flex-row justify-content-evenly">
										<i class = "fas fa-trash-alt" style = "color: #ef394e;" onclick = "alert()"></i><i class = "far fa-edit" id = "edite-user" style = "color: var(--bs-primary);" onclick = "editeuser()"></i>
									</div>
								</td>
							</tr>-->
							</tbody>
						</table>
					</div>
					<div class = "row">
						<div class = "col d-flex flex-row justify-content-around ad_pl_page_nex_bu">
							<input type = "hidden" value = "1" name = "pagenum" id = "pagenum">
							<div onclick = "Nxpage()" class = "border rounded d-flex align-items-center">
								<i class = "fas fa-angle-double-right"></i><small>صفحه بعد</small></div>
							<div onclick = "Pepage()" class = "border rounded d-flex align-items-center">
								<small>صفحه قبل</small><i class = "fas fa-angle-double-left"></i></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div role = "dialog" tabindex = "-1" class = "modal fade" id = "edite-user-modal">
		<div class = "modal-dialog" role = "document">
			<div class = "modal-content">
				<header class = "edite-user-modal-header"><i class = "far fa-edit order-last me-auto" onclick></i>
					<h4 class = "modal-title">فرهادفرخ سرشت </h4>
				</header>
				<div class = "modal-body">
					<div class = "row mb-3">
						<div class = "col">
							<div class = "card shadow mb-3">
								<div class = "card-header py-3" style = "text-align: center;">
									<img class = "rounded" src = "dogs/image2.jpeg" width = "20%"/></div>
								<div class = "card-body">
									<form>
										<div class = "row d-grid d-sm-flex justify-content-center align-items-center">
											<div class = "col">
												<div class = "mb-3">
													<label class = "form-label"><strong>نام کالا</strong><br/></label><input type = "text" class = "form-control" required/>
												</div>
											</div>
											<div class = "col">
												<div class = "mb-3">
													<label class = "form-label"><strong>لیبل کالا</strong><br/></label><input type = "text" class = "form-control" id = "country" required/>
												</div>
											</div>
										</div>
										<div class = "row d-grid d-sm-flex justify-content-center align-items-center">
											<div class = "col">
												<div class = "mb-3">
													<label class = "form-label"><strong>کلمات کلیدی</strong><br/></label><input type = "text" class = "form-control" required/>
												</div>
											</div>
										</div>
										<div class = "mb-3">
											<label class = "form-label"><strong>تصویر کالا ( تصویر اصلی )</strong><br/></label><input type = "file" class = "border rounded-pill form-control form-control-sm" required accept = "image/*" style = "font-family: Vazir;"/>
										</div>
										<div class = "row d-grid d-sm-flex">
											<div class = "col">
												<div class = "mb-3">
													<label class = "form-label"><strong>موجودی ( تعداد )</strong><br/></label><input type = "text" class = "form-control" required minlength = "1"/>
												</div>
											</div>
											<div class = "col">
												<div class = "mb-3">
													<label class = "form-label"><strong>تخفیف ( درصد )</strong></label><input type = "text" class = "form-control"/>
												</div>
											</div>
											<div class = "col">
												<div class = "mb-3">
													<label class = "form-label"><strong>قیمت ( تومان ) </strong><br/></label><input type = "text" class = "form-control" required/>
												</div>
											</div>
										</div>
										<div class = "row d-grid d-sm-flex">
											<div class = "col">
												<div class = "d-grid mb-3" id = "categoripart">
													<label class = "form-label"><strong>دسته</strong></label><select class = "form-select" id = "catgory">
														<optgroup label = "This is a group">
															<option value = "12" selected>This is item 1</option>
															<option value = "13">This is item 2</option>
															<option value = "14" onclick = "alert()">This is item 3</option>
														</optgroup>
													</select></div>
											</div>
											<div class = "col">
												<div class = "d-grid mb-3" id = "brandpart"><label class = "form-label"><strong>برند</strong></label><select class = "form-select" id = "brand">
														<optgroup label = "This is a group">
															<option value = "12" selected>This is item 1</option>
															<option value = "13">This is item 2</option>
															<option value = "14" onclick = "alert()">This is item 3</option>
														</optgroup>
													</select></div>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class = "modal-footer">
					<button class = "btn btn-primary" id = "edite-user-save" type = "button">ذخیره</button>
					<button class = "btn btn-warning" type = "button" data-bs-dismiss = "modal" onclick = "closemodal()">انصراف</button>
				</div>
			</div>
		</div>
	</div>
</div><!-- End: dash product list -->
<?php
include 'admin-footer.php'
?>

<script>
    function productlist() {
        var limit = document.getElementById('limit').value;
        var pagenum = document.getElementById('pagenum').value;
        $.ajax({
            url: "admin-app.php",
            method: "POST",
            cache: false,
            data: {productlist: 1, limit: limit, pagenum: pagenum},
            success: function (data) {
                document.getElementById('product_list').innerHTML = data;
            }
        })
    }

    productlist()
</script>

