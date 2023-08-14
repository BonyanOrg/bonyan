<?php
$queried_object = get_queried_object();
$paged = get_query_var('paged') ? get_query_var('paged') : 1;
$taxonomy_name = $queried_object->taxonomy;



?>


<section class="campaign-section">
    <div class="container">

        <?php get_template_part('template-parts/search-terms-header', null, array("taxonomy_name" => $taxonomy_name, "queried_object" => $queried_object)); ?>


        <div class="campaign my-2 my-lg-5">
            <div class="cards-container">


                <?php

                $args = array(
                    'post_type' => 'campaign',
                    'posts_per_page' => get_option('posts_per_page'),
                    'post_status' => 'publish',
                    'paged' => $paged,
                    'meta_key' => 'co_campaign_end_date',
                    'orderby' => 'meta_value',
                    'order' => 'DESC',
                    'tax_query' => array(
                        array(
                            'taxonomy' => $taxonomy_name,
                            'field' => 'term_id',
                            'terms' => $queried_object->term_id,

                        ),
                    ),
                );

                $campaigns_posts = new WP_Query($args);


                if ($campaigns_posts->have_posts()): ?>

                    <?php
                    /* Start the Loop */
                    while ($campaigns_posts->have_posts()):
                        $campaigns_posts->the_post();

                        ?>
                        <?php get_template_part('template-parts/cards/content', $post->post_type); ?>

                        <?php


                    endwhile;

                    //the_posts_navigation();
                
                else:

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