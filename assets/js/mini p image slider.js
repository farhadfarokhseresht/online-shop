var swiper = new Swiper(".minisilider", {
        centeredSlides: true,
        slidesPerView:3,
        centeredSlides: true,
        spaceBetween: 0,
        grabCursor: true,
        // loop: true,
        autoplay: {
          delay: 1500,
          disableOnInteraction: false,
        },    
        freeMode: true,
        pagination: {
            el: ".productslider .swiper-pagination",
            clickable: true,
        },
    });