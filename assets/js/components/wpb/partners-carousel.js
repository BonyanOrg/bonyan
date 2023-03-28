window.addEventListener('DOMContentLoaded', function () {
    /* ===[Start References Slider]=== */
    const referencesSwiper = new Swiper(".referencesSwiper", {
        preloadImages: false,
        touchEventsTarget: "container",
        grabCursor: true,

        lazy: {
            checkInView: true,
            enabled: true,
            loadOnTransitionStart: true
        },
        
        autoplay: {
            delay: 3000,
            pauseOnMouseEnter: true,
            disableOnInteraction: false,
            waitForTransition: true,
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