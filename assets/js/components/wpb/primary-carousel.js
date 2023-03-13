window.addEventListener('DOMContentLoaded', function () {
    /* ===[ Start Urgent Campaigns Slider (Might need to separate this code: campaign page) ]=== */
    let primaryCarousel = document.querySelector('.primary-carousel');

    if (primaryCarousel !== null) {
        /* ===[Start Global Lazyload Options]=== */
        const globalSwiperOptions = {
            checkInView: true,
            enabled: true,
            loadOnTransitionStart: true
        }
        /* ===[End Global Lazyload Options]=== */

        let numberOfSlides;

        const primaryCarouselInit = new Swiper(primaryCarousel, {
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
                init: function(s) {
                    numberOfSlides = s.slides.length;
                },

                autoplayTimeLeft(s, time, progress) {
                    if (numberOfSlides > 1) {
                        console.log(progress);
                        let autoplayProgress = document.querySelector('.autoplay-progress span');
                        autoplayProgress.style.width = `${100 - progress * 100}%`;
                    }
                }
            }
        })
    }
    /* ===[ End Urgent Campaigns Slider (Might need to separate this code: campaign page) ]=== */
});
