<?php
include "header.php";
?>

<div class = "container-fluid" style = "margin-top: 30px;">

	<!-- Start: phone filter -->
	<div id = "phone_smart_fil">

		<div class = "phonefiltertop">
			<i onclick = "diplay_state('phone_smart_fil')" class = "fa fa-close me-auto" style = "cursor: pointer;"></i><span class = "ms-auto" style = "font-weight: bold;">فیلتر ها</span>
		</div>


		<div class = "border rounded d-flex d-sm-flex d-md-flex d-lg-flex align-items-center justify-content-sm-center align-items-sm-center justify-content-md-center align-items-md-center justify-content-lg-center align-items-lg-center" id = "kalayemojood">
			<span style = "font-size: 12px;padding: 10px;color: var(--bs-danger);cursor: pointer;">پاک کردن همه</span>
			<div class = "form-check form-switch me-auto" style = "margin-left: 15px;">
				<input type = "checkbox" class = "form-check-input" id = "formCheck-2"/><label class = "form-check-label" for = "formCheck-1">فقط کالای موجود<br/></label>
			</div>
		</div>
		<!-- End: kalaye mojood -->

		<!-- Start: filter1 -->
		<div class = "border rounded" id = "pfilter1">
			<div onclick = "diplay_state('pfilter1body')" class = "d-flex d-md-flex d-lg-flex justify-content-md-center align-items-md-center justify-content-lg-center align-items-lg-center pcfilterhader">
				<span>شبکه های ارتباطی</span><i class = "fas fa-chevron-down me-auto" style = "margin-right: 10px;"></i>
			</div>
			<div id = "pfilter1body" style = "display: none;">
				<ul class = "list-unstyled" style = "margin-top: 10px;">
					<li class = "d-md-flex align-items-md-center" style = "padding: 5px;">
						<input type = "checkbox" style = "margin-left: 5px;"/><span>4G</span></li>
					<li class = "d-md-flex align-items-md-center" style = "padding: 5px;">
						<input type = "checkbox" style = "margin-left: 5px;"/><span>4G</span></li>
					<li class = "d-md-flex align-items-md-center" style = "padding: 5px;">
						<input type = "checkbox" style = "margin-left: 5px;"/><span>4G</span></li>
				</ul>
			</div>
		</div>
		<!-- End: filter1 -->

		<!-- Start: ghymat -->
		<div class = "border rounded" id = "pfilter2">
			<div onclick = "diplay_state('pfilter2body')" class = "d-flex d-md-flex d-lg-flex justify-content-md-center align-items-md-center justify-content-lg-center align-items-lg-center pcfilterhader">
				<span>محدوده قیمت</span><i class = "fas fa-chevron-down me-auto" style = "margin-right: 10px;"></i>
			</div>
			<div id = "pfilter2body" style = "display: none;">
				<div>
					<div class = "d-flex" id = "slider-range"></div>
					<div class = "d-flex">
						<div class = "text-center d-grid" style = "width: 50%;padding: 5px;">
							<span>از</span><span id = "amount-1" style = "background: rgba(133,135,150,0.1);border-radius: 10px;">Text</span><span>تومان</span>
						</div>
						<div class = "text-center d-grid" style = "width: 50%;padding: 5px;">
							<span>تا</span><span style = "background: rgba(133,135,150,0.1);border-radius: 10px;">Text</span><span>تومان</span>
						</div>
					</div>
					<div class = "d-sm-flex d-md-flex justify-content-sm-center align-items-sm-center justify-content-md-center align-items-md-center" style = "margin-bottom: 6px;">
						<button class = "btn btn-primary border rounded-pill" type = "button" style = "background: rgba(246,194,62,0.15);box-shadow: none;border: none;color: var(--bs-red);">اعمال محدودیت قیمت</button>
					</div>
				</div>
			</div>
		</div>
		<!-- End: ghymat -->
	</div>
	<!-- End: phone filter -->

	<div class = "row" style = "margin: 0px;margin-bottom: 10%;">

		<!-- Start: menu -->
		<div class = "col">
			<nav class = "navbar navbar-light navbar-expand-md" style = "padding: 0px;">
				<div class = "container-fluid">
					<ul class = "list-inline d-sm-flex ms-auto justify-content-sm-center align-items-sm-center" style = "margin-bottom: 0px;">
						<li class = "list-inline-item d-sm-flex justify-content-sm-center align-items-sm-center" id = "page_loc_list_item">
							<div class = "d-sm-flex justify-content-sm-center align-items-sm-center">
								<svg xmlns = "http://www.w3.org/2000/svg" width = "1em" height = "1em" viewBox = "0 0 24 24" fill = "none" style = "margin-left: 5px;">
									<path d = "M16.2426 6.34317L14.8284 4.92896L7.75739 12L14.8285 19.0711L16.2427 17.6569L10.5858 12L16.2426 6.34317Z" fill = "currentColor"></path>
								</svg>
								<span>Text</span></div>
						</li>
					</ul>
				</div>
			</nav>

			<!-- Start: جست و جوی پیشرفته -->
			<div class = "text-end d-lg-none d-xl-none d-xxl-none">
				<div onclick = "diplay_state('phone_smart_fil')" class = "border rounded shadow-sm d-inline-flex align-items-center" id = "phonefilterbutn">
					<span>جست و جوی پیشرفته</span><i class = "fa fa-list-alt" style = "margin-right: 5px;margin-left: 5px;"></i>
				</div>
			</div>
			<!-- End: جست و جوی پیشرفته -->

			<div id = "productshow">
				<!-- Start: top filter -->
				<div class = "sortby">
					<div class = "d-flex">
						<i class = "fas fa-filter d-flex align-items-center"></i><span class = "d-flex align-items-center">مرتب سازی بر اساس : </span>
					</div>
					<ul class = "list-inline sortbylist">
						<li class = "list-inline-item sortbyitem" id = "sortbyactive">پربازدیدترین</li>
						<li class = "list-inline-item sortbyitem">ارزان ترین</li>
						<li class = "list-inline-item sortbyitem">ارزان ترین</li>
					</ul>
				</div>
				<!-- End: top filter -->

				<div>
					<!-- Start: pc mod -->
					<ul class = "list-inline d-none d-print-inline d-lg-inline d-xl-inline d-xxl-inline" id = "pcmode">
                        <?php foreach (get_products() as $item) {
                            echo '
                        <li id="pruduct' . $item[0] . '" class="list-inline-item" style="margin: 0px;text-align: center;cursor: pointer;">
                          <a href="product.php?p=' . $item[0] . '" id="producthref">
                             <div id="filter_items">
                                
                                <!-- Start: image -->
                                <div class="d-block d-lg-flex d-xl-flex justify-content-lg-center align-items-lg-center justify-content-xl-center align-items-xl-center" id="imagediv">
                                    <img src="product_images/' . $item[3] . '"></div>
                                <!-- End: image -->
                                
                                <!-- Start: name -->
                                <div class="d-lg-flex justify-content-lg-end" id="name"><span>' . $item[1] . '</span></div>
                                <!-- End: name -->
                                
                                <!-- Start: price -->
                                <div id="price">
                                    <div style="padding-left: 10px;text-align: left;"><span style="background: #ef394e;color: var(--bs-white);font-weight: bold;padding: 4px;border-radius: 10px;font-size: 12px;">15%</span><span style="text-decoration: line-through;margin-left: 15px;font-size: 20px;color: #858796;">Text</span></div>
                                    <!-- Start: price -->
                                    <div>
                                        <!-- Start: price val -->
                                        <span style="margin-left: 11px;font-weight: bold;">' . $item[2] . '</span>
                                        <!-- End: price val -->
                                        <span>تومان</span>
                                    </div>
                                    <!-- End: price -->
                                </div>
                                <!-- End: price -->
                                <form method="post" action="#pruduct' . $item[0] . '" >
                                <input type="hidden" name="proId" value="' . $item[0] . '">
                                <button class="fas fa-cart-plus border rounded-pill d-lg-flex mx-auto justify-content-lg-center align-items-lg-center" id="addtocart" name="addToCart" type="submit">
                                </button>
                                </form>
                            </div>
                           </a>
                        </li>
                        ';
                        } ?>
					</ul>
					<!-- End: pc mod -->

					<!-- Start: phone mode -->
					<ul class = "list-inline d-lg-none d-xl-none d-xxl-none justify-content-md-end" id = "phonemode" style = "margin-top: 10px;">
                        <?php foreach (get_products() as $item) {
                            echo '
                        <li id="mpruduct' . $item[0] . '"  class="list-inline-item" style="display: flex;width: 100%;">
                          <a href="product.php?p=' . $item[0] . '" id="producthref" >
                            <div id="filter_items">
                                
                                <!-- Start: image -->
                                <div class="d-flex d-md-flex d-xl-flex align-items-center align-items-md-center justify-content-xl-center align-items-xl-center" id="imagediv" style="margin-right: 10px;margin-left: 20px;">
                                 <img src="product_images/' . $item[3] . '"></div>
                                <!-- End: image -->
                                
                                <div class="d-grid" style="width: 100%;padding: 10px;">
                                    <!-- Start: name -->
                                    <div class="d-lg-flex align-items-lg-center" id="name"><span>' . $item[1] . '</span></div>
                                    <!-- End: name -->
                                    
                                    <div class="text-center" style="padding-left: 10px;"><span style="background: #ef394e;color: var(--bs-white);font-weight: bold;padding: 4px;border-radius: 10px;font-size: 12px;">15%</span><span style="text-decoration: line-through;margin-left: 15px;font-size: 20px;">Text</span></div>
                                    <!-- Start: price -->
                                    <div class="text-end d-lg-flex align-items-lg-center" id="price">
                                        <span style="margin-left: 11px;font-weight: bold;">' . $item[2] . '</span>
                                        <span>تومان</span>
                                    </div>
                                    <!-- End: price -->
                                    <form method="post" action="#mpruduct' . $item[0] . '"  >
                                        <input type="hidden" name="proId" value="' . $item[0] . '">
                                        <button class="fas fa-cart-plus border rounded-pill d-flex d-sm-flex d-md-flex d-lg-flex justify-content-center align-items-center mx-auto justify-content-sm-center align-items-sm-center justify-content-md-center align-items-md-center justify-content-lg-center align-items-lg-center" id="addtocart" name="addToCart" type="submit">
                                        </button>
                                    </form>
                                </div>
                            </div>
                          </a>
                        </li>
                         ';
                        } ?>
					</ul>
					<!-- End: phone mode -->
				</div>
			</div>
			<!-- Start: page num -->
			<div class = "text-center d-lg-flex justify-content-lg-center" style = "height: 30px;margin: 10px;">
				<ul class = "list-inline" style = "color: var(--bs-blue);">
					<li class = "list-inline-item"><i class = "fa fa-step-backward"></i></li>
					<li class = "list-inline-item">1</li>
					<li class = "list-inline-item"><i class = "fa fa-step-forward"></i></li>
				</ul>
			</div>
			<!-- End: page num -->
		</div>
		<!-- End: menu -->

		<!-- Start: filters -->
		<div class = "col-auto d-none d-lg-grid d-xl-grid d-xxl-grid mb-auto">
			<!-- Start: in line filtrs -->
			<form action = "filters.php" method = "post">
				<div class = "border rounded shadow-sm" id = "inlinefilter">
					<div id = "topdiv">
						<p style = "margin: 0px;font-size: 12px;font-weight: bold;color: var(--bs-gray-dark);">فیلتر های اعمال شده :</p>
						<button name = "delfilter" style = "background: none;border: none;" class = "me-auto" id = "delfilter">حذف</button>
					</div>
					<div style = "padding: 5px;">
						<!-- Start: filter bu -->
                        <?php foreach ($_SESSION['filters'] as $ky => $val) {
                            echo '
                    <button value="delfilter" name="' . $ky . '"  class="btn btn-primary border rounded-pill" id="filtersbu" type="submit">' . $val . '<i class="fas fa-times" style="margin-right: 5px;"></i></button>
                    ';
                        } ?>
						<!-- End: filter bu -->

					</div>
				</div>
			</form>
			<!-- End: in line filtrs -->

			<!-- Start: kalaye mojood -->
			<form action = "" method = "post">
				<div class = "border rounded-pill shadow-sm d-sm-flex d-md-flex d-lg-flex justify-content-sm-center align-items-sm-center justify-content-md-center align-items-md-center justify-content-lg-center align-items-lg-center" id = "kalaye_mojood">
					<div class = "form-check form-switch">
						<input onclick = "this.form.submit()" name = "kalamojood" <?php if ($kalayemojood) {
                            echo 'checked';
                        } ?> class = "form-check-input" type = "checkbox" id = "formCheck"><label class = "form-check-label" for = "formCheck">فقط کالای موجود<br></label>
					</div>
				</div>
			</form>
			<!-- End: kalaye mojood -->

			<!-- Start: filter1 -->
			<div class = "border rounded shadow-sm" id = "filter1">
				<div onclick = "diplay_state('filter1body')" class = "d-flex d-md-flex d-lg-flex justify-content-md-center align-items-md-center justify-content-lg-center align-items-lg-center pcfilterhader">
					<span>شبکه های ارتباطی</span><i class = "fas fa-chevron-down me-auto" style = "margin-right: 10px;"></i>
				</div>
				<div id = "filter1body" style = "display: none;">
					<ul class = "list-unstyled" style = "margin-top: 10px;padding: 0px;padding-right: 10px;">
						<li class = "d-md-flex align-items-md-center" style = "padding: 5px;">
							<input type = "checkbox" style = "margin-left: 5px;"/><span>4G</span></li>
						<li class = "d-md-flex align-items-md-center" style = "padding: 5px;">
							<input type = "checkbox" style = "margin-left: 5px;"/><span>4G</span></li>
						<li class = "d-md-flex align-items-md-center" style = "padding: 5px;">
							<input type = "checkbox" style = "margin-left: 5px;"/><span>4G</span></li>
					</ul>
				</div>
			</div>
			<!-- End: filter1 -->

			<!-- Start: filter2 -->
			<div class = "border rounded shadow-sm" id = "filter2">
				<div onclick = "diplay_state('filter2body')" class = "d-flex d-md-flex d-lg-flex me-auto justify-content-md-center align-items-md-center justify-content-lg-center align-items-lg-center pcfilterhader">
					<span>رنگ ها</span><i class = "fas fa-chevron-down me-auto" style = "margin-right: 10px;"></i></div>
				<div id = "filter2body" style = "display: none;">
					<ul class = "list-unstyled" style = "margin-top: 10px;padding: 0px;padding-right: 5px;padding-left: 10px;">
						<li class = "d-flex d-md-flex order-last align-items-md-center" style = "padding: 5px;">
							<input type = "checkbox" style = "margin-left: 5px;"/><span>ابی</span><i class = "fas fa-circle me-auto" style = "color: var(--bs-blue);font-size: 10px;"></i>
						</li>
						<li class = "d-flex d-md-flex order-last align-items-md-center" style = "padding: 5px;">
							<input type = "checkbox" style = "margin-left: 5px;"/><span>قرمز</span><i class = "fas fa-circle me-auto" style = "color: var(--bs-red);font-size: 10px;"></i>
						</li>
					</ul>
				</div>
			</div>
			<!-- End: filter2 -->

			<!-- Start: filter3 -->
			<div class = "border rounded shadow-sm" id = "filter3">
				<div onclick = "diplay_state('filter3body')" class = "d-flex d-md-flex d-lg-flex justify-content-md-center align-items-md-center justify-content-lg-center align-items-lg-center pcfilterhader">
					<span>محدوده قیمت</span><i class = "fas fa-chevron-down me-auto" style = "margin-right: 10px;"></i>
				</div>
				<div id = "filter3body" style = "display: none;">
					<div class = "d-flex" id = "slider-range"></div>
					<div class = "d-flex">
						<div class = "text-center d-grid" style = "width: 50%;padding: 5px;">
							<span>از</span><span id = "amount1" style = "background: rgba(133,135,150,0.1);border-radius: 10px;">Text</span><span>تومان</span>
						</div>
						<div class = "text-center d-grid" style = "width: 50%;padding: 5px;">
							<span>تا</span><span id = "amount2" style = "background: rgba(133,135,150,0.1);border-radius: 10px;">Text</span><span>تومان</span>
						</div>
					</div>
					<div class = "d-sm-flex d-md-flex justify-content-sm-center align-items-sm-center justify-content-md-center align-items-md-center" style = "margin-bottom: 6px;">
						<button class = "btn btn-primary border rounded-pill" type = "button" style = "background: rgba(246,194,62,0.15);box-shadow: none;border: none;color: var(--bs-red);">اعمال محدودیت قیمت</button>
					</div>
				</div>
			</div>
			<!-- End: filter3 -->

			<!-- Start: filter4 -->
			<div class = "border rounded shadow-sm" id = "filter4">
				<div class = "d-flex d-md-flex d-lg-flex justify-content-md-center align-items-md-center justify-content-lg-center align-items-lg-center" style = "border-bottom: 1px solid rgba(133,135,150,0.24);padding: 5px;">
					<span><strong>دسته‌بندی نتایج</strong><br/></span></div>
				<div>
					<form action = "" method = "post">
						<ul class = "list-unstyled">
                            <?php foreach (brandlist() as $bitem) {
                                echo '
                            <li>
                                <i class="fas fa-chevron-left" style="font-size: 10px;"></i>
                                <button name="brandid" onclick="this.form.submit()" style="direction: ltr" class="btn btn-primary" id="filter4bu" type="submit" value="' . $bitem[0] . '">
                                    <span>' . $bitem[1] . '</span>
                                </button>
                            </li>
                            ';
                            } ?>
						</ul>
					</form>
				</div>
			</div>
			<!-- End: filter4 -->

			<!-- Start: filter5 -->
			<div class = "text-center border rounded shadow-sm" id = "filter5">
				<form class = "d-none d-sm-inline ms-md-3 my-2 my-md-0 mw-100 navbar-search">
					<div class = "input-group">
						<button class = "btn btn-primary btn-sm py-0" id = "shbu" type = "button">
							<i class = "fas fa-search"></i></button>
						<input type = "text" class = "form-control form-control-sm border-0 small" style = "padding: 0px;margin: 0px;margin-right: 0px;" placeholder = "جست و جو در نتایج..."/>
					</div>
				</form>
			</div>
			<!-- End: filter5 -->
		</div>
		<!-- End: filters -->
	</div>
</div>

<?php
include "footer.php";
?>
