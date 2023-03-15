window.addEventListener('DOMContentLoaded', function () {
    /* ===[Start Global Lazyload Options]=== */
    const globalSwiperOptions = {
        checkInView: true,
        enabled: true,
        loadOnTransitionStart: true
    }
    /* ===[End Global Lazyload Options]=== */

    /* ===[Start Main Slider]=== */
    const mainCarousel = new Swiper(".main-carousel", {
        preloadImages: false,
        touchEventsTarget: "container",
        grabCursor: true,

        lazy: {
            ...globalSwiperOptions
        },

        pagination: {
            el: ".swiper-pagination",
        },

        effect: 'fade',
        fadeEffect: {
            crossFade: true
        },
    });
    /* ===[End Main Slider]=== */
});