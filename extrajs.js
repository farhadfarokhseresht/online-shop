$(document).ready(function () {
    // loader()
    clearurl()
    count_item()
    set_price_to_range()
    get_products()
    update_filter_list()
    update_brand_list()
});

/* global function */

// clear url
function clearurl() {
    var uri = window.location.toString();
    if (uri.indexOf("?") > 0) {
        var clean_uri = uri.substring(0, uri.indexOf("?"));
        window.history.replaceState({}, document.title, clean_uri);
    }
}

// display menus

function diplay_state(id) {
    var object = document.getElementById(id);
    var displayobj = object.style.display;
    if (displayobj == 'none' | displayobj == '') {
        object.style.display = 'block';
    } else {
        object.style.display = 'none';
    }
}

// loader

function loader() {
    // document.body.innerHTML += '<div id="loader"><img src="loader2.gif"></div>'
    // $('#loader').animate({'opacity': '0'}, 800,function () {
    //     return $('#loader').remove();
    // })
}

// home

function mobile_menu_button() {
    document.getElementById("mobile_mod_catgori_menu").style.display = 'block';
    document.getElementById("mobile_menu_button2").style.display = 'block';
}

function mobile_menu_button2() {
    document.getElementById("mobile_mod_catgori_menu").style.display = 'none';
    document.getElementById("mobile_menu_button2").style.display = 'none';
}

// alert

function addalert(txt, success) {
    if (success) {
        const warning = "<div  id='alert' role=\"alert\" class=\"alert alert-success d-sm-flex justify-content-sm-center align-items-sm-center\"><span><strong>" + txt + "</strong></span><span onclick=\"document.getElementById('alert').remove()\" class=\"closealert\" >&times;</span></div>";
        $("body").append(warning);
    } else {
        const warning = "<div  id='alert' role=\"alert\" class=\"alert alert-warning d-sm-flex justify-content-sm-center align-items-sm-center\"><span><strong>" + txt + "</strong></span><span onclick=\"document.getElementById('alert').remove()\" class=\"closealert\" >&times;</span></div>";
        $("body").append(warning);
    }
    $('#alert').animate({'opacity': '0'}, 2000, function () {
        $('#alert').remove();
    })
}


// header

var sherching_keyword = document.getElementById('sherching_keyword');
sherching_keyword.onkeyup = function () {
    var keyword = sherching_keyword.value;
    $.ajax({
        url: "app/home.php",
        method: "GET",
        cache: false,
        // dataType: 'json',
        data: {'keyword': keyword},
        success: function (data) {
            if (data == 0) {
                $('.serching_keyword').css('display', 'none');
            } else {
                $('.serching_keyword').css('display', 'inline');
                document.getElementById('serching_keyword_list').innerHTML = data;
            }

        }
    })

}
var sherching_keyword_mo = document.getElementById('sherching_keyword_mo');
sherching_keyword_mo.onkeyup = function () {
    const keywordm = sherching_keyword_mo.value;
    $.ajax({
        url: "app/home.php",
        method: "GET",
        cache: false,
        // dataType: 'json',
        data: {'keyword': keywordm},
        success: function (data) {
            if (data == 0) {
                $('.serching_keyword_mo').css('display', 'none');
            } else {
                $('.serching_keyword_mo').css('display', 'inline');
                document.getElementById('serching_keyword_list_mo').innerHTML = data;
            }

        }
    })
}

$(document).on('click', function (e) {
    var container = $(".serching_keyword");
    if (!$(e.target).closest(container).length) {
        container.hide();
    }
    var container = $(".serching_keyword_mo");
    if (!$(e.target).closest(container).length) {
        container.hide();
    }
});

// add to cart B

$("body").delegate('#addtocartB', "click", function (event) {//
    var proId = this.value
    qytnum = 1;
    if ($('#qytnum').html() == '') {
        var qytnum = document.getElementById("qytnum").value;
    }
    if ($('#pqytnum').html() == '') {
        var qytnum = document.getElementById("pqytnum").value;
    }
    $.ajax({
        url: "app/action.php",
        method: "POST",
        data: {proId: proId, addToCart: 1, qty: qytnum},
        success: function (data) {
            if (data == 1) {
                addalert("محصول به سبد شما اضاف شد", true);
                get_cart_iems()
                count_item();
            }
            if (data == 0) {
                addalert("محصول در سبد خرید شما قبلا قرار گرفته", false);
            }
        }
    })
})

// remove from cart
$("body").delegate('#removeItemFromCart', "click", function (event) {//
    var rid = this.value
    $.ajax({
        url: "app/action.php",
        method: "POST",
        data: {rid: rid, removeItemFromCart: 1},
        success: function (data) {
            if (data == 1) {
                addalert("محصول از سبد خرید شما حذف شد!", false);
                get_cart_iems()
                count_item();
            }
        }
    })
})

// get cart items
function get_cart_iems() {
    $.ajax({
        url: "app/action.php",
        method: "POST",
        data: {Get_cart_item: 1},
        success: function (data) {
            $('#cart_dropdown_list').html(data)
        }
    })
}

//
function count_item() {
    $.ajax({
        url: "app/action.php",
        method: "GET",
        data: {count_item: 1},
        success: function (data) {
            $('#cart_badge_item_num').text(data + "+");
            $('#cart_dropdown_header').text(data + " کالا ");
        }
    })
}

//
$("body").delegate('#cart_dropdown', "click", function (event) {
    // event.preventDefault();
    get_cart_iems()
    count_item()
});

/* end global function */


/* profile */
function get_profile_info() {
    $.ajax({
        url: "app/profile.php",
        method: "GET",
        cache: false,
        // dataType: 'json',
        data: {'getprofile': 1},
        success: function (data) {
            var infodata = jQuery.parseJSON(data);
            insertdata(infodata);
        }
    })
}

function edite(form, formbu, changebutn) {
    $("body").delegate(formbu, "click", function (event) {//
        event.preventDefault();
        $(form).find('input').prop('disabled', false);//
        $(form).find(changebutn).css('display', 'inline');
        $(form).find(formbu).css('display', 'none');
        $(form).find('#cancel_change').css('display', 'inline');
        $("body").delegate(changebutn, "click", function (event) {
            const postdata = {}; //uid: uid
            $("form" + form + " :input").each(function () {//
                var input = $(this);
                dataid = input.attr('id');
                dataval = input.val();
                postdata[dataid] = dataval;
            });
            $.ajax({
                url: "app/profile.php",
                method: "POST",
                data: postdata,
                success: function (data) {
                    // $(form).append(data);
                    if (data == 1) {
                        addalert('!اطلاعات شما ثبت شد', true);
                        $(form).find('input').prop('disabled', true);
                        $(form).find(changebutn).css('display', 'none');
                        $(form).find(formbu).css('display', 'inline');
                        $(form).find('#cancel_change').css('display', 'none');
                        get_profile_info()
                        insertdata()
                    } else {
                        addalert('!لطفا تمام فیلد ها را پر کنید', false);
                    }
                }
            })
        })
        $("body").delegate("#cancel_change", "click", function (event) {
            $(form).find('input').prop('disabled', true);
            $(form).find(changebutn).css('display', 'none');
            $(form).find(formbu).css('display', 'inline');
            $(form).find('#cancel_change').css('display', 'none');
            get_profile_info()
            insertdata()
        })
    })
}

function insertdata(infodata) {
    // var mobile = '<?php echo $userinfo[3];?>';
    // var email = '<?php echo $userinfo[2];?>';
    // var first_name = '<?php echo $userinfo[0];?>';
    // var last_name = '<?php echo $userinfo[1];?>';
    document.getElementById("mobile").value = infodata['userinfo']['mobile'];
    document.getElementById("email").value = infodata['userinfo']['email'];
    document.getElementById("first_name").value = infodata['userinfo']['first_name'];
    document.getElementById("last_name").value = infodata['userinfo']['last_name'];
    //
    // var province = '<?php echo $address_list[1];?>';
    // var city = '<?php echo $address_list[2];?>';
    // var address1 = '<?php echo $address_list[3];?>';
    // var plack = '<?php echo $address_list[4];?>';
    // var vahed = '<?php echo $address_list[5];?>';
    // var codposti = '<?php echo $address_list[6];?>';
    // var codmli = '<?php echo $address_list[7];?>';
    // var rfname = '<?php echo $address_list[8];?>';
    // var rlname = '<?php echo $address_list[9];?>';
    // var rphone = '<?php echo $address_list[10];?>';
    // var addressid = '<?php echo $address_list[0];?>';
    document.getElementById("province").value = infodata['address_list']['province'];
    document.getElementById("city").value = infodata['address_list']['city'];
    document.getElementById("address1").value = infodata['address_list']['address1'];
    document.getElementById("plack").value = infodata['address_list']['plack'];
    document.getElementById("vahed").value = infodata['address_list']['vahed'];
    document.getElementById("codposti").value = infodata['address_list']['codposti'];
    document.getElementById("codmli").value = infodata['address_list']['codmli'];
    document.getElementById("rfname").value = infodata['address_list']['rfname'];
    document.getElementById("rlname").value = infodata['address_list']['rlname'];
    document.getElementById("rphone").value = infodata['address_list']['rphone'];
    document.getElementById("addressid").value = infodata['address_list']['id'];
}


/* filters */
function getVals() {
    // Get slider values
    var parent = this.parentNode;
    var slides = parent.getElementsByTagName("input");
    var slide1 = parseFloat(slides[0].value);
    var slide2 = parseFloat(slides[1].value);
    // Neither slider will clip the other, so make sure we determine which is larger
    if (slide1 > slide2) {
        var tmp = slide2;
        slide2 = slide1;
        slide1 = tmp;
    }
    /*var displayElement = parent.getElementsByClassName("rangeValues")[0];
    displayElement.innerHTML = slide1 + " - " + slide2;*/
    $('#amount1').text(slide1);
    $('#amount1m').text(slide1);
    $('#amount2').text(slide2);
    $('#amount2m').text(slide2);

}

window.onload = function () {
    // Initialize Sliders
    var sliderSections = document.getElementsByClassName("range-slider");
    for (var x = 0; x < sliderSections.length; x++) {
        var sliders = sliderSections[x].getElementsByTagName("input");
        for (var y = 0; y < sliders.length; y++) {
            if (sliders[y].type === "range") {
                sliders[y].oninput = getVals;
                // Manually trigger event first time to display values
                sliders[y].oninput();
            }
        }
    }
}

function set_price_to_range() {
    $.ajax({
        url: "app/action.php",
        method: "GET",
        cache: false,
        data: {'minmaxprice': 1},
        success: function (data) {
            var jdata = jQuery.parseJSON(data);
            var min = jdata[0];
            var max = jdata[1];
            document.getElementById("pricerange_min").min = min;
            document.getElementById("pricerange_min").max = max;
            document.getElementById("pricerange_min").value = min;
            document.getElementById("pricerange_max").min = min;
            document.getElementById("pricerange_max").max = max;
            document.getElementById("pricerange_max").value = max;

        }
    })

}

$("body").delegate('#brandid', "click", function (event) {//
    var brandid = this.value
    $.ajax({
        url: "app/action.php",
        method: "POST",
        data: {brandid: brandid},
        success: function (data) {
            get_products()
            update_brand_list()
            update_filter_list()
        }
    })
})
// $("body").delegate('#kalamojood', "click", function (event) {//
//     var kalamojood = this.value
//     alert(kalamojood)
//     if (kalamojood =='on'){
//         $.ajax({
//             url: "app/action.php",
//             method: "POST",
//             data: {kalamojood: kalamojood},
//             success: function (data) {
//                 get_products()
//                 update_filter_list()
//                 checkbox_kmojd()
//             }
//         })
//     }else {
//         this.value = 'off';
//         checkbox_kmojd()
//         update_filter_list()
//     }
//
// })
$("body").delegate('#delfilter', "click", function (event) {//
    $.ajax({
        url: "app/action.php",
        method: "GET",
        data: {delfilter: 1},
        success: function (data) {
            get_products()
            checkbox_kmojd()
            update_brand_list()
            update_filter_list()
        }
    })
})
$("body").delegate('#filtersbu', "click", function (event) {
    var filter_name = this.name
    // var filter_val = this.value
    var datapost = {filtersbu: 1, filter_name: filter_name};
    $.ajax({
        url: "app/action.php",
        method: "POST",
        data: datapost,
        success: function (data) {
            get_products();
            update_brand_list()
            update_filter_list()
            checkbox_kmojd()
        }
    })
})

function get_products() {
    $.ajax({
        url: "app/action.php",
        method: "POST",
        data: {get_products: 1},
        success: function (data) {
            loader();
            $('#productshow').find('#pcmode').html(data);
        }
    })
}

function update_filter_list() {
    $.ajax({
        url: "app/action.php",
        method: "POST",
        data: {update_filter_list: 1},
        success: function (data) {
            $('#update_filter_list').html(data);
            get_products()
        }
    })
}

function update_brand_list() {
    $.ajax({
        url: "app/action.php",
        method: "GET",
        data: {brandlist: 1},
        success: function (data) {
            $('#brand_list').html(data);
        }
    })
}

function sortfilter(filtername) {
    $('.sortbylist').find('.sortbyactive').removeClass('sortbyactive');
    $('#' + filtername).addClass('sortbyactive');
    $.ajax({
        url: "app/action.php",
        method: "post",
        data: {get_products: 1, sortfil: filtername},
        success: function (data) {
            loader();
            $('#productshow').find('#pcmode').html(data);
        }
    })
}
