<?php
$queried_object = get_queried_object();
$taxonomy_name = $queried_object->taxonomy;



?>



<div class="container">

    <?php get_template_part('template-parts/search-terms-header', null, array("taxonomy_name" => $taxonomy_name, "queried_object" => $queried_object)); ?>


    <div class="campaign my-2 my-lg-5">
        <div class="cards-container">


            <?php if (have_posts()) : ?>

                <?php
                /* Start the Loop */
                while (have_posts()) :
                    the_post();

                ?>
                    <?php get_template_part('template-parts/cards/content', $post->post_type); ?>

            <?php


                endwhile;

            //the_posts_navigation();

            else :

                get_template_part('template-parts/content', 'none');

            endif;
            ?>
            <?php

            ?>



        </div>
    </div>
    <?php
    custom_pagination();

    ?>
</div>