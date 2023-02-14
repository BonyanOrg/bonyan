<?php get_header(); ?>

<!-- Main slider -->
<?php echo get_template_part('template-parts/main-slider') ?>

<!-- Quick Donation -->
<?php echo get_template_part('template-parts/quick-donation') ?>

<!-- Campaigns -->
<div class="container">
    <?php echo get_template_part('template-parts/campaign-card') ?>
</div>

<?php get_footer(); ?>