<?php
include 'admin-head.php'
?>
<!-- Start: dash org -->
	<div class="container-fluid" style="direction: rtl;text-align: right;">
		<div class="d-sm-flex justify-content-between align-items-center mb-4" style="margin-top: 20px;">
			<h3 class="text-dark mb-0">گزارش کل</h3><a class="btn btn-primary btn-sm d-none d-sm-inline-block" role="button" href="#"><i class="fas fa-download fa-sm text-white-50"></i> دریافت گزارش </a>
		</div>
		<div class="row">
			<div class="col-md-6 col-xl-3 mb-4">
				<div class="card shadow border-start-primary py-2">
					<div class="card-body">
						<div class="row align-items-center no-gutters">
							<div class="col me-2">
								<div class="text-uppercase text-primary fw-bold text-xs mb-1"><span>تعداد کاربران</span></div>
								<div class="text-dark fw-bold h5 mb-0"><span>122</span></div>
							</div>
							<div class="col-auto"><i class="fas fa-users fa-2x text-gray-300"></i></div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6 col-xl-3 mb-4">
				<div class="card shadow border-start-success py-2">
					<div class="card-body">
						<div class="row align-items-center no-gutters">
							<div class="col me-2">
								<div class="text-uppercase text-success fw-bold text-xs mb-1"><span>فروش کل</span></div>
								<div class="text-dark fw-bold h5 mb-0"><span>$215,000</span></div>
							</div>
							<div class="col-auto"><i class="fas fa-dollar-sign fa-2x text-gray-300"></i></div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6 col-xl-3 mb-4">
				<div class="card shadow border-start-info py-2">
					<div class="card-body">
						<div class="row align-items-center no-gutters">
							<div class="col me-2">
								<div class="text-uppercase text-info fw-bold text-xs mb-1"><span>سفارشات تحویل داده شده</span></div>
								<div class="row g-0 align-items-center">
									<div class="col-auto">
										<div class="text-dark fw-bold h5 mb-0 me-3"><span>50%</span></div>
									</div>
									<div class="col">
										<div class="progress progress-sm">
											<div class="progress-bar bg-warning" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%;"><span class="visually-hidden">50%</span></div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-auto"><i class="fas fa-clipboard-list fa-2x text-gray-300"></i></div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6 col-xl-3 mb-4">
				<div class="card shadow border-start-warning py-2">
					<div class="card-body">
						<div class="row align-items-center no-gutters">
							<div class="col me-2">
								<div class="text-uppercase text-warning fw-bold text-xs mb-1"><span>تیک های جدید</span></div>
								<div class="text-dark fw-bold h5 mb-0"><span>18</span></div>
							</div>
							<div class="col-auto"><i class="fas fa-envelope fa-2x text-gray-300"></i></div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-7 col-xl-8">
				<div class="card shadow mb-4">
					<div class="card-header d-flex align-items-center">
						<h6 class="text-primary fw-bold m-0">گزارش فروش سالانه</h6>
					</div>
					<div class="card-body" style="max-height: 500px;overflow: auto;">
						<div class="chart-area"><canvas height="320" width="575" style="display: block; width: 575px; height: 320px;"></canvas></div>
					</div>
				</div>
			</div>
			<div class="col-lg-5 col-xl-4">
				<div class="card shadow mb-4">
					<div class="card-header d-flex justify-content-between align-items-center">
						<h6 class="text-primary fw-bold m-0"><strong>گزارش فروش ماهانه</strong><br /></h6>
					</div>
					<div class="card-body">
						<div class="chart-area"><canvas height="320" style="display: block; width: 258px; height: 320px;" width="258"></canvas></div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-6 mb-4">
				<div class="card shadow mb-4">
					<div class="card-header d-flex align-items-center">
						<h6 class="text-primary fw-bold m-0">گزارش موردی</h6>
						<div class="dropdown no-arrow" style="margin-right: 40%;"><button class="btn btn-sm" aria-expanded="false" data-bs-toggle="dropdown" type="button"><i class="fas fa-ellipsis-v text-gray-400" style="margin-left: 6px;"></i>فیلتر ها</button>
							<div class="dropdown-menu dropdown-menu-dark shadow animated--fade-in" style="direction: rtl;text-align: center;">
								<h6 class="dropdown-header text-center">مرتب سازی بر اثاث</h6><a class="dropdown-item" href="#">کمترین موجودی</a><a class="dropdown-item" href="#">بیشترین موجودی</a>
								<div class="dropdown-divider"></div><a class="dropdown-item" href="#">بیشترین فروش</a><a class="dropdown-item" href="#">کمترین فروش</a>
							</div>
						</div>
					</div>
					<div class="card-body" style="max-height: 500px;overflow: auto;"><a class="card-link">
							<div class="border rounded admin-report-product-item">
								<div class="d-flex"><span><strong>موجودی : </strong><br /></span><strong class="border rounded-circle mojoodi">5</strong></div>
								<div style="margin-top: 5px;margin-bottom: 5px;"><img src="product image/image3.jpeg" /><small>کالای 1</small></div>
								<div>
									<h4 class="small fw-bold">درصد فروش نسبت به کل</h4>
									<div class="progress mb-4">
										<div class="progress-bar progress-bar-striped progress-bar-animated" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%;">20%</div>
									</div>
								</div>
							</div>
						</a><a class="card-link">
							<div class="border rounded admin-report-product-item">
								<div class="d-flex"><span><strong>موجودی : </strong><br /></span><strong class="border rounded-circle mojoodi">5</strong></div>
								<div style="margin-top: 5px;margin-bottom: 5px;"><img src="product image/image2.jpeg" /><small>نام کالا</small></div>
								<div>
									<h4 class="small fw-bold">درصد فروش نسبت به کل</h4>
									<div class="progress mb-4">
										<div class="progress-bar progress-bar-striped progress-bar-animated" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%;">50%</div>
									</div>
								</div>
							</div>
						</a><a class="card-link">
							<div class="border rounded admin-report-product-item">
								<div class="d-flex"><span><strong>موجودی : </strong><br /></span><strong class="border rounded-circle mojoodi">5</strong></div>
								<div style="margin-top: 5px;margin-bottom: 5px;"><img src="product image/image3.jpeg" /><small>گوشی همراه مدل ...</small></div>
								<div>
									<h4 class="small fw-bold">درصد فروش نسبت به کل</h4>
									<div class="progress mb-4">
										<div class="progress-bar progress-bar-striped progress-bar-animated" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%;">20%</div>
									</div>
								</div>
							</div>
						</a></div>
				</div>
			</div>
			<div class="col-lg-6 col-xl-6 col-xxl-6">
				<div class="card shadow mb-4">
					<div class="card-header py-3">
						<h6 class="text-primary m-0 fw-bold">10 کالای برتر ( پربازدید ترین )</h6>
					</div>
					<div class="card-body">
						<ol>
							<li style="padding: 5px;"><img src="product image/image3.jpeg" style="width: 30px;height: 30px;" /><span style="margin-right: 10px;">Text</span></li>
							<li style="padding: 5px;"><img src="product image/image2.jpeg" style="width: 30px;height: 30px;" /><span style="margin-right: 10px;">Text</span></li>
							<li style="padding: 5px;"><img src="product image/image1.jpeg" style="width: 30px;height: 30px;" /><span style="margin-right: 10px;">Text</span></li>
						</ol>
					</div>
				</div>
			</div>
		</div>
	</div>
<!-- End: dash org -->
<?php
include 'admin-footer.php'
?>