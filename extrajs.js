// loader

// window.addEventListener("load",function() {
//     document.body.innerHTML += '<div id="loader"><img src="loader2.gif"></div>'
//     $('#loader').animate({'opacity': '0'}, 1000,function () {
//         return $('#loader').remove();
//     })
// })

// alert add product
$('body').find('alert').ready(function () {
    // $('#alert').animate({'opacity': '0'}, 1000,function () {
    $('#alert').remove();
    // })
})

// filter
function phonesearch() {
    var x = $('#phone_smart_fil').css('display');
    if (x == "none") {
        $('#phone_smart_fil').css('display', 'inline');
    } else {
        $('#phone_smart_fil').css('display', 'none');
    }
}

function filter1() {
    var x = $('#filter1mnu').css('display');
    if (x == "none") {
        $('#filter1mnu').css('display', 'inline');
    } else {
        $('#filter1mnu').css('display', 'none');
    }
}

function filter2() {
    var x = $('#filter2mnu').css('display');
    if (x == "none") {
        $('#filter2mnu').css('display', 'inline');
    } else {
        $('#filter2mnu').css('display', 'none');
    }
}

function filter3() {
    var x = $('#filter3mnu').css('display');
    if (x == "none") {
        $('#filter3mnu').css('display', 'inline');
    } else {
        $('#filter3mnu').css('display', 'none');
    }
}


// cart

