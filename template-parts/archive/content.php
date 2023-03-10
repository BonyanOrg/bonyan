<?php


$queried_object = get_queried_object();
$taxonomy_name = $queried_object->taxonomy;
?>


<section class="blogs-section">
    <div class="container">
    <?php get_template_part('template-parts/search-terms-header', null, array("taxonomy_name" => $taxonomy_name, 'archive' => true)); ?>

        <!-- <div class="input-holder search my-3">
            <?php get_search_form() ?>

        </div> -->

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

            else :

                get_template_part('template-parts/content', 'none');

            endif;
            ?>



        </div>
        <?php custom_pagination(); ?>

    </div>
</section>