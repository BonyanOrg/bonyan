<?php

/* Template Name: Home-Page */

get_header();

?>


<!-- Start Main Slider -->
<?php get_template_part('template-parts/components/main-slider'); ?>
<!-- End Main Slider -->



<div class="entry-content inner-content container">
    <?php
    the_content();
    ?>
</div>









<?php

get_footer();
