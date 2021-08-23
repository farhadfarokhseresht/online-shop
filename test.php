<?php foreach (Get_cart_item()[0] as $itminfo) { echo '
                    <li id="cart_list_item" class="cart_list_item" style="display: inline!important;" >
                        <div style="display: block;width: 100%;margin-bottom: 20px;">
                            <div class="d-flex">
                                <!-- Start: card item data -->
                                <div class="d-block" id="cart_item_data">
                                    <div id="cart_item_name">
                                        <p id="CartItemName">' . $itminfo[1] . '<br></p>
                                    </div>
                                    <div id="cart_item_info">
                                        <p class="d-md-flex justify-content-md-end">xxxxxxxxxx<i class="fa fa-chevron-circle-left"></i></p>
                                    </div>
                                </div>
                                <!-- End: card item data -->

                                <!-- Start: card_list_image -->
                                <div class="card_list_image"><img id="productimg" class="rounded" src="product_images/' . $itminfo[3] . '" ></div>
                                <!-- End: card_list_image -->
                            </div>
                            <div class="d-flex" style="margin: 0px;margin-bottom: 0px;padding-bottom: 0px;">
                                <!-- Start: card item price -->
                                <div id="cart_item_price">
                                    <p class="text-danger d-flex" style="margin: 0px;"><span>تومان</span><span style="margin-right: 10px;margin-left: 10px;">xxx</span><span>تخفیف</span></p>
                                    <p class="d-flex" style="margin: 0px;"><span>تومان</span><span id="P_price" style="margin-left: 10px;">' . $itminfo[2] . '</span></p>
                                </div>
                                <!-- End: card item price -->
                                <!-- Start: card item num -->
                                <div class="d-flex" style="width: 28%;min-width: 104px;">
                                    <form action="action.php" method="post" >
                                    <div style="width: 100%;height: 44px;display: -webkit-box;margin-top: 4px;margin-left: -99px;">
                                        <button name="removeItemFromCart" id="removeItemFromCart" class="btn btn-primary d-flex justify-content-center align-items-center" type="submit" style="background: rgba(78,115,223,0);color: var(--bs-secondary);border-style: none;margin-top: 20px;">حذف<i class="fa fa-trash-o"></i></button>
                                        <input type="hidden" value='.$itminfo[0].' name="rid" id="rid">
                                    </div>
                                    </form>
                                    <div style="width: 100%;height: 44px;display: -webkit-box;display: flex;border: 1px solid #eee;border-radius: 8px;color: #0fabc6;font-size: 15px;font-size: 1.071rem;line-height: 1.467;justify-content: space-between;align-items: center;margin-top: 4px;">
                                        <button name="button_qty_rm" id="button_qty_rm" class="btn btn-primary"  type="submit">-</button>
                                        <p class="d-flex d-sm-flex justify-content-center align-items-center justify-content-sm-center align-items-sm-center" id="qty_box">' . $itminfo[5] . '</p>
                                        <button name="button_qty_add" id="button_qty_add" class="btn btn-primary"  type="submit">+</button>
                                        <input  type="hidden" value='.$itminfo[5].' name="qty" id="qty" >
                                        <input  type="hidden" value='.$itminfo[0].' name="update_id" id="update_id" >
                                    </div>
                                </div>
                                <!-- End: card item num -->
                            </div>
                        </div>
                    </li>
                    ';} ?>