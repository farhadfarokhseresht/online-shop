// loader
// document.body.innerHTML += '<div id="loader"><img src="loader2.gif"></div>'
// $('#loader').animate({'opacity': '0'}, 800,function () {
//     return $('#loader').remove();
// })

// home
function mobile_menu_button() {
    document.getElementById("mobile_mod_catgori_menu").style.display = 'block';
    document.getElementById("mobile_menu_button2").style.display = 'block';
}

function mobile_menu_button2() {
    document.getElementById("mobile_mod_catgori_menu").style.display = 'none';
    document.getElementById("mobile_menu_button2").style.display = 'none';
}

// display menus
function diplay_state(id) {
    var object = document.getElementById(id);
    var displayobj = object.style.display;
    if (displayobj == 'none' | displayobj == '') {
        object.style.display = 'inline';
    } else {
        object.style.display = 'none';
    }

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
    return rmalert();
}

function rmalert() {
    $('body').find('alert').ready(function () {
        $('#alert').animate({'opacity': '0'}, 8000, function () {
            $('#alert').remove();
        })
    })
}

rmalert()

// profile
function get_profile_info() {
    $.ajax({
        url: "process/profile.php",
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
                url: "process/profile.php",
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

// header
var sherching_keyword = document.getElementById('sherching_keyword');

sherching_keyword.onkeyup = function () {
    var keyword = sherching_keyword.value;
    $.ajax({
        url: "process/home.php",
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





