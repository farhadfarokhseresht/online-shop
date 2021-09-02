// loader
// document.body.innerHTML += '<div id="loader"><img src="loader2.gif"></div>'
// $('#loader').animate({'opacity': '0'}, 800,function () {
//     return $('#loader').remove();
// })

// display menus
function drop_down_anime(id) {
    var object = document.getElementById(id);
    var displayobj = object.style.display;
    if (displayobj == 'none') {
        object.style.display = 'inline';
    } else {
        object.style.display = 'none';
    }

}


// alert
function addalert(txt,success) {
    if(success){
        const warning = "<div  id='alert' role=\"alert\" class=\"alert alert-success d-sm-flex justify-content-sm-center align-items-sm-center\"><span><strong>"+txt+"</strong></span><span onclick=\"document.getElementById('alert').remove()\" class=\"closealert\" >&times;</span></div>";
        $("body").append(warning);
    }else {
        const warning = "<div  id='alert' role=\"alert\" class=\"alert alert-warning d-sm-flex justify-content-sm-center align-items-sm-center\"><span><strong>"+txt+"</strong></span><span onclick=\"document.getElementById('alert').remove()\" class=\"closealert\" >&times;</span></div>";
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
        data: {'getprofile':1},
        success: function (data) {
            alert(data)
            insertdata();
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
                dataval = input.val()
                if (dataval != "") {
                    postdata[dataid] = dataval
                } else {
                    addalert('!لطفا تمام فیلد ها را پر کنید', false);
                }
            });
            $.ajax({
                url: "process/profile.php",
                method: "POST",
                data: postdata,
                success: function (data) {
                    $(form).append(data);
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



