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

    /* ===[Start Campaigns Slider]=== */
    const campaignsCarousel = new Swiper(".campaigns-carousel", {
        preloadImages: false,
        touchEventsTarget: "container",
        grabCursor: true,

        lazy: {
            ...globalSwiperOptions
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

    /* ===[Start References Slider]=== */
    const referencesSwiper = new Swiper(".referencesSwiper", {
        preloadImages: false,
        touchEventsTarget: "container",
        grabCursor: true,

        lazy: {
            ...globalSwiperOptions
        },

        breakpoints: {
            1200: {
                slidesPerView: 6,
                spaceBetween: 50,
            },

            769: {
                slidesPerView: 4,
                spaceBetween: 50
            },

            400: {
                slidesPerView: 3,
                spaceBetween: 50
            },

            0: {
                slidesPerView: 2.5,
                spaceBetween: 30
            }
        },

        navigation: {
            nextEl: ".references-next-arrow",
            prevEl: ".references-prev-arrow",
        },
    });
    /* ===[End References Slider]=== */
});