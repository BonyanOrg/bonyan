<?php


$queried_object = get_queried_object();

?>


<section class="blogs-section">
    <div class="container">
        <div class="input-holder search my-3">
            <?php get_search_form() ?>

        </div>

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