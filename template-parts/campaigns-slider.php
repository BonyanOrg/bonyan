<!-- Start Campaign Cards -->
<section class="campaigns-section py-5">
    <div class="container">

        <div class="d-flex align-items-center justify-content-center justify-content-xl-strtch mb-3 ">
            <h2 class="bonyan-title primary-color bold">Campaigns</h2>

            <div class="custom-swiper-nav ms-auto from-laptop-up">
                <div class="swiper-nav-btn swiper-prev-nav campaigns-prev-arrow"></div>
                <div class="swiper-nav-btn swiper-next-nav campaigns-next-arrow"></div>
            </div>

            <a href="#" class="more-btn secondary-outlined-btn ms-3 primary-color from-laptop-up">see more</a>
        </div>


        <div class="swiper campaigns-carousel">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <?php get_template_part('template-parts/campaign-card'); ?>
                </div>

                <div class="swiper-slide">
                    <?php get_template_part('template-parts/campaign-card'); ?>
                </div>

                <div class="swiper-slide">
                    <?php get_template_part('template-parts/campaign-card'); ?>
                </div>

                <div class="swiper-slide">
                    <?php get_template_part('template-parts/campaign-card'); ?>
                </div>
            </div>
        </div>

        <a href="#" class="more-btn secondary-outlined-btn primary-color from-ipad-down mt-3 py-3 h-auto">see more</a>
</section>
<!-- End Campaign Cards -->