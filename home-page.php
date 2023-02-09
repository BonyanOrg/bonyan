<?php

/* Template Name: Home-Page */

get_header();

?>


<!-- MAIN SLIDER WILL BE HERE -->
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<h1>Template home-page.php</h1>



<?php if (have_posts()) : while (have_posts()) : the_post();
        the_content();
    endwhile;
else : ?>
    <p>Sorry, no posts matched your criteria.</p>
<?php endif; ?>







<?php

get_footer();
