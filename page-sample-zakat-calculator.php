<?php get_header(); ?>
<?php echo get_template_part('template-parts/page-head') ?>

<div class="container my-4">
    <?php echo get_template_part('template-parts/zakat_calculator_view') ?>
</div>

<div class="container">
    <h2 class="bonyan-title primary-color mb-4 mb-md-5">Program Projects</h2>
    <div class="cards-container">
        <?php echo get_template_part('template-parts/project-card') ?>
        <?php echo get_template_part('template-parts/project-card') ?>
        <?php echo get_template_part('template-parts/project-card') ?>
        <?php echo get_template_part('template-parts/project-card') ?>
        <?php echo get_template_part('template-parts/project-card') ?>
        <?php echo get_template_part('template-parts/project-card') ?>
    </div>
</div>

<?php get_footer();