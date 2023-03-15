window.addEventListener('DOMContentLoaded', function () {
    /* ===[Start Campaigns Slider]=== */
    const campaignsCarousel = new Swiper(".campaigns-carousel", {
        preloadImages: false,
        touchEventsTarget: "container",
        grabCursor: true,

        lazy: {
            checkInView: true,
            enabled: true,
            loadOnTransitionStart: true
        },

        breakpoints: {
            1200: {
                slidesPerView: 3,
                spaceBetween: 35
            },

            769: {
                slidesPerView: 2,
                spaceBetween: 35
            },

            500: {
                slidesPerView: 1.4,
                spaceBetween: 20
            },

            400: {
                slidesPerView: 1.15,
                spaceBetween: 10
            },

            0: {
                slidesPerView: 1.05,
                spaceBetween: 10
            }
        },

        navigation: {
            nextEl: ".campaigns-next-arrow",
            prevEl: ".campaigns-prev-arrow",
        },
    });
    /* ===[End Campaigns Slider]=== */
});
