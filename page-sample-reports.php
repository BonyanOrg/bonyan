<?php get_header(); ?>
<?php echo get_template_part('template-parts/page-head'); ?>

<div class="container">
    <!-- Categories & Search -->
    <div class="categories-and-search">
        <div class="categories-filter">
            <a href="#" class="category-filter-item">
                <span>Syria</span>
            </a>
            <a href="#" class="category-filter-item">
                <span>Yemen</span>
            </a>
            <a href="#" class="category-filter-item">
                <span>Palestine</span>
            </a>
            <a href="#" class="category-filter-item">
                <span>Lebanon</span>
            </a>
        </div>

        <form method="get" action="<?php echo home_url('/'); ?>" class="search-form">
            <div class="input-holder search-input-holder">
                <div class="search-icon">
                    <svg id="Group_262" data-name="Group 262" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path id="Path_153" data-name="Path 153" d="M0,0H24V24H0Z" fill="none" />
                        <path id="Path_154" data-name="Path 154" d="M18.031,16.617,22.314,20.9,20.9,22.314l-4.282-4.283a9,9,0,1,1,1.414-1.414Zm-2.006-.742a7,7,0,1,0-.15.15l.15-.15Z" fill="#6d54a7" />
                    </svg>
                </div>
                <input type="search" name="s" id="header-search-input" placeholder="<?php _e('Search...', 'bonyan') ?>" class="ps-5 pe-2">
            </div>
        </form>
    </div>
</div>

<!-- Start Reports Cards -->
<div class="container">
    <div class="cards-container grid-4">
        <?php echo get_template_part('template-parts/file-card') ?>
        <?php echo get_template_part('template-parts/file-card') ?>
        <?php echo get_template_part('template-parts/file-card') ?>
        <?php echo get_template_part('template-parts/file-card') ?>
        <?php echo get_template_part('template-parts/file-card') ?>
        <?php echo get_template_part('template-parts/file-card') ?>
        <?php echo get_template_part('template-parts/file-card') ?>
        <?php echo get_template_part('template-parts/file-card') ?>
    </div>
</div>
<!-- End Reports Cards -->

<?php get_footer();
