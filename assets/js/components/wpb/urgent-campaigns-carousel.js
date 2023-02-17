window.addEventListener('DOMContentLoaded', function () {
    /* ===[Start Global Lazyload Options]=== */
    const globalSwiperOptions = {
        checkInView: true,
        enabled: true,
        loadOnTransitionStart: true
    }
    /* ===[End Global Lazyload Options]=== */

    /* ===[ Start Urgent Campaigns Slider (Might need to separate this code: campaign page) ]=== */
    let urgentCampgians = document.querySelector('.urgent-campaigns-carousel');
    const urgentCampaignsCarousel = new Swiper(urgentCampgians, {
        preloadImages: false,
        touchEventsTarget: "container",
        grabCursor: true,
        rewind: true,

        autoplay: {
            delay: 5000,
            pauseOnMouseEnter: true,
            disableOnInteraction: false,
            waitForTransition: true,
        },

        lazy: {
            ...globalSwiperOptions
        },

        effect: 'fade',
        fadeEffect: {
            crossFade: true
        },

        on: {
            autoplayTimeLeft(s, time, progress) {
                let autoplayProgress = document.querySelector('.autoplay-progress span');
                autoplayProgress.style.width = `${100 - progress * 100}%`;
            }
        }
    })
    /* ===[ End Urgent Campaigns Slider (Might need to separate this code: campaign page) ]=== */
});
