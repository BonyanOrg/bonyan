<?php get_header(); ?>

<!-- Main slider -->
<?php echo get_template_part('template-parts/main-slider') ?>

<!-- Quick Donation -->
<?php echo get_template_part('template-parts/quick-donation') ?>

<!-- Campaigns Slider -->
<?php echo get_template_part('template-parts/campaigns-slider') ?>

<!-- Partners -->
<?php echo get_template_part('template-parts/partners') ?>

<!-- Programs Cards -->
<?php echo get_template_part('template-parts/program-card') ?>

<!-- Statistics -->
<?php echo get_template_part('template-parts/statistics') ?>

<!-- Blog Card -->
<div class="container">
    <div class="cards-container">
        <?php echo get_template_part('template-parts/blog-card') ?>
    </div>
</div>

<?php get_footer(); ?>