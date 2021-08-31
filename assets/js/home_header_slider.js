document.addEventListener("DOMContentLoaded", function() {

    // Initializing the swiper plugin for the slider.
    // Read more here: http://idangero.us/swiper/api/
    
    var mySwiper = new Swiper('#bigslider .swiper-container', {
        loop: true,
        pagination: {
            el: '.swiper-pagination' ,
            clickable: true
        },
        paginationClickable: true,
        navigation: {
            nextEl: '#bigslider .swiper-button-next',
            prevEl: '#bigslider .swiper-button-prev'
        }
    });
    
});