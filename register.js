$(document).ready(function () {
    var userphonenum = document.getElementById("userphonenum");
    $.ajax({
        url: "app/register_app/registery.php",
        method: "POST",
        data: {getnumber:1},
        success: function (data) {
            if (data != 0) {
                userphonenum.innerText = data;
            }else {
                // location.replace("register.html");
            }
        }
    })
    sendtime(3)
});

function My_Validate() {
    var _error;
    _error = document.getElementById("_error");
    var phonenum = document.forms["registerform"]["re_phone_number"].value;
    if (phonenum == "" | phonenum.length < 11 | phonenum.length > 11) {
        _error.innerHTML = "لطفا شماره همراه خود را صحیح وارد کنید";
        return false;
    } else {
        return true;
    }

}
function startTimer(duration, display) {
    var timer = duration, minutes, seconds;
    setInterval(function () {
        minutes = parseInt(timer / 60, 10);
        seconds = parseInt(timer % 60, 10);
        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;
        display.textContent = minutes + ":" + seconds;
        if (--timer < 0) {
            timer = duration;
        }
        if(seconds==0){
            $('#sendcodagin').css('color','#003ff8');
        }else {
            $('#sendcodagin').css('color','#767272');
        }
    }, 1000);
}
function sendtime(tm) {
    var fiveMinutes = tm,
        display = document.querySelector('#time');
    startTimer(fiveMinutes, display);
};



$("body").delegate('#loginbut', "click", function (event) {
    if (My_Validate()) {
        const phonens = document.getElementById('re_phone_number').value;
        var datapost = {phonenumber: phonens};
        $.ajax({
            url: "app/register_app/registery.php",
            method: "POST",
            data: datapost,
            success: function (data) {
                if (data != 0) {
                    location.replace("register-sc.html");
                } else {
                    _error.innerHTML = '! خطایی در ارسال پیامک رخ داده لطفا دوباره امتحان کنید';
                }

            }
        })
    }
})


$("body").delegate('#sendcod', "click", function (event) {
    _error = document.getElementById("_error");
    var usercod = document.getElementById('usercod').value;
    var datapost = {sendcod: usercod};
    $.ajax({
        url: "app/register_app/registery.php",
        method: "POST",
        data: datapost,
        success: function (data) {
            if (data != 0) {
                location.replace("index.php");
            } else {
                _error.innerHTML = '! کد صحیح را وارد کنید ';
            }

        }
    })

})


$("body").delegate('#sendcodagin', "click", function (event) {
    $.ajax({
        url: "app/register_app/registery.php",
        method: "POST",
        data: {sendcodagin:1},
        success: function (data) {
            if (data != 0) {
                _error.innerHTML = '! کد برای شما ارسال گردید ';
            }
            sendtime(5)
        }
    })

})
