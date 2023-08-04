window.addEventListener('DOMContentLoaded', function () {
    var isWithSidebar = document.querySelector('.with-sidebar') === null ? "3" : "2";

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

        autoplay: {
            delay: 3000,
            pauseOnMouseEnter: true,
            disableOnInteraction: false,
            waitForTransition: true,
        },

        breakpoints: {
            1200: {
                slidesPerView: isWithSidebar,
                spaceBetween: 35
            },

            769: {
                slidesPerView: 2,
                spaceBetween: 35
            },

            500: {
                spaceBetween: 20
            },

            400: {
                spaceBetween: 10
            },

            0: {
                slidesPerView: 1,
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
