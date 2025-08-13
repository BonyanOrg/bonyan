// Testimonials Carousel
document.addEventListener('DOMContentLoaded', function() {
    const testimonialsSwiper = new Swiper('.testimonials-carousel', {
        slidesPerView: 1,
        spaceBetween: 20,
        loop: true,
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
        },
        breakpoints: {
            640: {
                slidesPerView: 2,
                spaceBetween: 20,
            },
            768: {
                slidesPerView: 3,
                spaceBetween: 25,
            },
            1024: {
                slidesPerView: 4,
                spaceBetween: 30,
            },
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        // Responsive behavior
        on: {
            init: function() {
                // Custom logic on init if needed
            },
            resize: function() {
                // Handle resize events
                this.update();
            }
        }
    });
}); 