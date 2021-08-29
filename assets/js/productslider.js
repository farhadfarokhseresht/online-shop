var swiper = new Swiper(".productslider .mySwiper", {
    centeredSlides: true,
        autoplay: {
          delay: 2500,
          disableOnInteraction: false,
        },    
    slidesPerView: 3,
        spaceBetween: 30,
        freeMode: true,
        pagination: {
            el: ".productslider .swiper-pagination",
            clickable: true,
        },
    });