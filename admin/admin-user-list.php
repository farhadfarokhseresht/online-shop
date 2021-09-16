<?php
include 'admin-head.php'
?>
<!-- Start: dash users list -->
<div class = "container-fluid" style = "direction: rtl;text-align: right;">
	<div class = "d-sm-flex justify-content-between align-items-center mb-4" style = "margin-top: 20px;">
		<a class = "btn btn-primary btn-sm d-none d-sm-inline-block" role = "button" href = "#"><i class = "fas fa-download fa-sm text-white-50"></i>&nbsp;دریافت گزارش&nbsp;</a>
	</div>
	<div class = "row">
		<div class = "col">
			<div class = "card shadow">
				<div class = "card-header py-3">
					<p class = "text-primary m-0 fw-bold">کاربران</p>
				</div>
				<div class = "card-body">
					<div class = "row">
						<div class = "col-md-6 text-nowrap">
							<div id = "dataTable_length" class = "dataTables_length" aria-controls = "dataTable">
								<label class = "form-label">نمایش<select class = "d-inline-block form-select form-select-sm">
										<option value = "10" selected = "">10</option>
										<option value = "25">25</option>
										<option value = "50">50</option>
										<option value = "100">100</option>
									</select>&nbsp;</label></div>
						</div>
						<div class = "col-md-6">
							<div class = "text-md-end dataTables_filter" id = "dataTable_filter">
								<label class = "form-label"><input type = "search" class = "form-control form-control-sm" aria-controls = "dataTable" placeholder = "جست و جو  . . . "></label>
							</div>
						</div>
					</div>
					<div class = "table-responsive" style = "text-align: center;border-radius: 10px;">
						<table class = "table table-striped">
							<thead>
							<tr>
								<th>#</th>
								<th>نام و نام خانوادگی</th>
								<th>نام کاربری</th>
								<th><strong>شماره تماس</strong><br></th>
								<th>کد ملی</th>
								<th>رمز عبور</th>
								<th>حذف/تغییر</th>
							</tr>
							</thead>
							<tbody>
							<tr>
								<td>1</td>
								<td>فرهاد فرخ سرشت</td>
								<td>Cell 2</td>
								<td>Cell 2</td>
								<td>11</td>
								<td>11</td>
								<td>
									<i class = "fas fa-user-times" style = "/*margin-left: 10px;*/color: #ef394e;" onclick = "alert()"></i><i class = "fas fa-user-edit" style = "color: var(--bs-primary);"></i>
								</td>
							</tr>
							</tbody>
						</table>
					</div>
					<div class = "row">
						<div class = "col d-flex flex-row justify-content-around ad_pl_page_nex_bu">
							<div class = "border rounded d-flex align-items-center">
								<i class = "fas fa-angle-double-right"></i><small>صفحه بعد</small></div>
							<div class = "border rounded d-flex align-items-center">
								<small>صفحه قبل</small><i class = "fas fa-angle-double-left"></i></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- End: dash users list -->
<?php
include 'admin-footer.php'
?>
