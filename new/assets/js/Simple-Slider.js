document.addEventListener("DOMContentLoaded", function() {

    // Initializing the swiper plugin for the slider.
    // Read more here: http://idangero.us/swiper/api/
    
    var mySwiper = new Swiper('#pila .swiper-container', {
        loop: true,
        pagination: {
            el: '#pila .swiper-pagination' ,
            clickable: true
        },
        autoplay: {
          delay: 3000,
          disableOnInteraction: false,
        },    
        paginationClickable: true,
        navigation: {
            nextEl: '#pila .swiper-button-next',
            prevEl: 'pila .swiper-button-prev'
        }
    });
    
});