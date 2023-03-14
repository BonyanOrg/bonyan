<?php
$queried_object = get_queried_object();
$taxonomy_name = $queried_object->taxonomy;




get_header();



get_template_part('template-parts/page', 'header');



?>

<section class="blogs-section my-3 my-md-5">
    <div class="container">

        <div class="categories-and-search">
            <div class="input-holder search ms-auto">
                <?php get_search_form() ?>
            </div>
        </div>

        <div class="cards-container">

            <?php if (have_posts()) : ?>

                <?php
                /* Start the Loop */
                while (have_posts()) :
                    the_post();

                ?>
                    <?php get_template_part('template-parts/cards/content ', 'post'); ?>


            <?php


                endwhile;

            //the_posts_navigation();

            else :

                get_template_part('template-parts/content', 'none');

            endif;
            ?>

        </div>
        <?php custom_pagination();
        ?>
</section>


<?php

get_footer();
