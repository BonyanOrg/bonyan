<?php get_header(); ?>
<?php echo get_template_part('template-parts/page-head'); ?>

<div class="single-program">
    <div class="container">
        <div class="content-with-info-panel">
            <div class="inner-content">
                <br><br>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Amet, soluta. Ipsum illo nisi, enim sapiente animi officia dicta a culpa omnis hic suscipit neque beatae molestias molestiae ullam! Praesentium nam rerum asperiores saepe dolorum a accusantium nobis aliquam voluptatem, officiis quaerat earum eaque hic esse repudiandae aliquid repellendus sint quia dicta culpa eum sed obcaecati dolor. Quod quos enim earum! Molestiae vero consequatur illo animi reiciendis atque eum fugiat distinctio error. Nulla dolorem id soluta at exercitationem iste aspernatur neque, commodi quas sunt inventore, alias tenetur cumque odit illo enim obcaecati laboriosam sint possimus ullam consequatur porro! Illo, voluptate temporibus.</p>

                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Amet, soluta. Ipsum illo nisi, enim sapiente animi officia dicta a culpa omnis hic suscipit neque beatae molestias molestiae ullam! Praesentium nam rerum asperiores saepe dolorum a accusantium nobis aliquam voluptatem, officiis quaerat earum eaque hic esse repudiandae aliquid repellendus sint quia dicta culpa eum sed obcaecati dolor. Quod quos enim earum! Molestiae vero consequatur illo animi reiciendis atque eum fugiat distinctio error. Nulla dolorem id soluta at exercitationem iste aspernatur neque, commodi quas sunt inventore, alias tenetur cumque odit illo enim obcaecati laboriosam sint possimus ullam consequatur porro! Illo, voluptate temporibus.</p>

                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Amet, soluta. Ipsum illo nisi, enim sapiente animi officia dicta a culpa omnis hic suscipit neque beatae molestias molestiae ullam! Praesentium nam rerum asperiores saepe dolorum a accusantium nobis aliquam voluptatem, officiis quaerat earum eaque hic esse repudiandae aliquid repellendus sint quia dicta culpa eum sed obcaecati dolor. Quod quos enim earum! Molestiae vero consequatur illo animi reiciendis atque eum fugiat distinctio error. Nulla dolorem id soluta at exercitationem iste aspernatur neque, commodi quas sunt inventore, alias tenetur cumque odit illo enim obcaecati laboriosam sint possimus ullam consequatur porro! Illo, voluptate temporibus.</p>

                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Amet, soluta. Ipsum illo nisi, enim sapiente animi officia dicta a culpa omnis hic suscipit neque beatae molestias molestiae ullam! Praesentium nam rerum asperiores saepe dolorum a accusantium nobis aliquam voluptatem, officiis quaerat earum eaque hic esse repudiandae aliquid repellendus sint quia dicta culpa eum sed obcaecati dolor. Quod quos enim earum! Molestiae vero consequatur illo animi reiciendis atque eum fugiat distinctio error. Nulla dolorem id soluta at exercitationem iste aspernatur neque, commodi quas sunt inventore, alias tenetur cumque odit illo enim obcaecati laboriosam sint possimus ullam consequatur porro! Illo, voluptate temporibus.</p>

                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Amet, soluta. Ipsum illo nisi, enim sapiente animi officia dicta a culpa omnis hic suscipit neque beatae molestias molestiae ullam! Praesentium nam rerum asperiores saepe dolorum a accusantium nobis aliquam voluptatem, officiis quaerat earum eaque hic esse repudiandae aliquid repellendus sint quia dicta culpa eum sed obcaecati dolor. Quod quos enim earum! Molestiae vero consequatur illo animi reiciendis atque eum fugiat distinctio error. Nulla dolorem id soluta at exercitationem iste aspernatur neque, commodi quas sunt inventore, alias tenetur cumque odit illo enim obcaecati laboriosam sint possimus ullam consequatur porro! Illo, voluptate temporibus.</p>

                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Amet, soluta. Ipsum illo nisi, enim sapiente animi officia dicta a culpa omnis hic suscipit neque beatae molestias molestiae ullam! Praesentium nam rerum asperiores saepe dolorum a accusantium nobis aliquam voluptatem, officiis quaerat earum eaque hic esse repudiandae aliquid repellendus sint quia dicta culpa eum sed obcaecati dolor. Quod quos enim earum! Molestiae vero consequatur illo animi reiciendis atque eum fugiat distinctio error. Nulla dolorem id soluta at exercitationem iste aspernatur neque, commodi quas sunt inventore, alias tenetur cumque odit illo enim obcaecati laboriosam sint possimus ullam consequatur porro! Illo, voluptate temporibus.</p>
            </div>

            <div class="info-panel">
                <div class="info-panel--card with-light">
                    <h2 class="info-panel-title">Achievements</h2>

                    <div class="info-box no-underline">
                        <div class="info-item with-underline">
                            <span>4,000</span>
                            <span>Beneficiaries</span>
                        </div>

                        <div class="info-item with-underline">
                            <span>400</span>
                            <span>Projects</span>
                        </div>

                        <div class="info-item with-underline">
                            <span>400</span>
                            <span>Campaigns</span>
                        </div>
                    </div>
                </div>

                <?php echo get_template_part('template-parts/program-stats'); ?>
            </div>
        </div>

        <div class="cards-container">
            <!-- Success Story -->
            <?php echo get_template_part('template-parts/success-story-card') ?>
        </div>

        <!-- Start Campaign Cards -->
        <section class="success-story-section py-5">
            <div class="container">

                <div class="d-flex align-items-center justify-content-center justify-content-xl-strtch mb-3 ">
                    <h2 class="bonyan-title primary-color bold">Success Stories</h2>

                    <div class="custom-swiper-nav ms-auto hide-from-laptop-up">
                        <div class="swiper-nav-btn swiper-prev-nav success-story-prev-arrow"></div>
                        <div class="swiper-nav-btn swiper-next-nav success-story-next-arrow"></div>
                    </div>
                </div>


                <div class="swiper success-story-carousel">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <?php get_template_part('template-parts/success-story-card'); ?>
                        </div>

                        <div class="swiper-slide">
                            <?php get_template_part('template-parts/success-story-card'); ?>

                        </div>

                        <div class="swiper-slide">
                            <?php get_template_part('template-parts/success-story-card'); ?>

                        </div>

                        <div class="swiper-slide">
                            <?php get_template_part('template-parts/success-story-card'); ?>
                        </div>
                    </div>
                </div>
        </section>
        <!-- End Campaign Cards -->

    </div>
</div>

<?php get_footer();