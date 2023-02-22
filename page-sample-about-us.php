<?php get_header(); ?>

<?php echo get_template_part('template-parts/page-head'); ?>

<div class="my-3 my-md-5">
    <!-- Icon Title Description Widget -->
    <?php echo get_template_part('template-parts/icon-title-desc'); ?>

    <!-- Locations Widget -->
    <?php echo get_template_part('template-parts/locations'); ?>

    <!-- Background Title Description Widget for (values) -->
    
    <div class="bg-title-desc-container py-4 py-lg-5">
        <div class="container">
            <h2 class="bonyan-title primary-color mb-3 mb-lg-5 text-center text-xl-start">Values</h2>
        </div>

        <?php echo get_template_part('template-parts/bg-title-desc'); ?>
    </div>
</div>

<?php get_footer();
