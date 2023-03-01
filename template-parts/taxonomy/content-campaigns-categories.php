<?php
$queried_object = get_queried_object();
$taxonomy_name = $queried_object->taxonomy;



?>


<section class="campaign-section">
    <div class="container">

    <?php get_template_part('template-parts/search-terms-header', null, array("taxonomy_name" => $taxonomy_name, "queried_object" => $queried_object)); ?>


        <div class="campaign">
            <div class="cards-container">


                <?php if (have_posts()) : ?>

                    <?php
                    /* Start the Loop */
                    while (have_posts()) :
                        the_post();

                    ?>
                        <?php get_template_part('template-parts/cards/content','campaign'); ?>

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
            <?php
            custom_pagination();

            ?>
</section>