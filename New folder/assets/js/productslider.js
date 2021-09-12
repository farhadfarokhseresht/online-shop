var swiper = new Swiper(".productslider .mySwiper", {
        centeredSlides: true,
        slidesPerView: 4,
        centeredSlides: true,
        // spaceBetween: 30,
        grabCursor: true,
        // loop: true,
        autoplay: {
          delay: 5500,
          disableOnInteraction: false,
        },    
        freeMode: true,
        pagination: {
            el: ".productslider .swiper-pagination",
            clickable: true,
        },
    });