var swiper = new Swiper(".minisilider", {
        centeredSlides: true,
        slidesPerView:3,
        centeredSlides: true,
        grabCursor: true,
        freeMode: true,
        pagination: {
            el: ".productslider .swiper-pagination",
            clickable: true,
        },
    navigation: {
            nextEl: '.minislider-next',
        }
    });