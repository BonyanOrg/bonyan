window.addEventListener('DOMContentLoaded', function () {
    /* ===[Start Global Lazyload Options]=== */
    const globalSwiperOptions = {
        checkInView: true,
        enabled: true,
        loadOnTransitionStart: true
    }
    /* ===[End Global Lazyload Options]=== */

    /* ===[Start Success Story Carousel]=== */
    const successStoryCarousel = new Swiper(".success-story-carousel", {
        preloadImages: false,
        touchEventsTarget: "container",
        grabCursor: true,

        lazy: {
            ...globalSwiperOptions
        },

        autoplay: {
            delay: 3000,
            pauseOnMouseEnter: true,
            disableOnInteraction: false,
            waitForTransition: true,
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
            nextEl: ".success-story-next-arrow",
            prevEl: ".success-story-prev-arrow",
        },
    });
    /* ===[End Success Story Carousel]=== */
});