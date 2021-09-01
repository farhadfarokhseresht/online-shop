// loader
// document.body.innerHTML += '<div id="loader"><img src="loader2.gif"></div>'
// $('#loader').animate({'opacity': '0'}, 800,function () {
//     return $('#loader').remove();
// })

// display menus
function drop_down_anime(id){
    var object = document.getElementById(id);
    var displayobj = object.style.display;
    if (displayobj == 'none'){
        object.style.display = 'inline';
    }else {
        object.style.display = 'none';
    }

}


// alert add product
$('body').find('alert').ready(function () {
    $('#alert').animate({'opacity': '0'}, 8000,function () {
    $('#alert').remove();
    })
})

// profile




