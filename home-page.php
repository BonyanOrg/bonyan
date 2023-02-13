<?php

/* Template Name: Home-Page */

get_header();

?>


<!-- Start Main Slider -->
<?php get_template_part('template-parts/components/main-slider'); ?>
<!-- End Main Slider -->



<?php if (have_posts()) : while (have_posts()) : the_post();
        the_content();
    endwhile;
else : ?>
    <p>Sorry, no posts matched your criteria.</p>
<?php endif; ?>







<?php

get_footer();
