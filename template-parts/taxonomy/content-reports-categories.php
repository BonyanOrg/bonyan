<?php
$queried_object = get_queried_object();
$taxonomy_name = $queried_object->taxonomy;



?>


<section class="campaign-section">
    <div class="container">

        <div class="content-with-info-panel report-cat-page">

            <?php
            $cat_description = get_term_meta($queried_object->term_id, 'reports_cat_desc', true);
            if ($cat_description != '') :

            ?>
                <div class="inner-content">
                    <?php echo $cat_description; ?>
                    <!-- <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Amet, soluta. Ipsum illo nisi, enim sapiente animi officia dicta a culpa omnis hic suscipit neque beatae molestias molestiae ullam! Praesentium nam rerum asperiores saepe dolorum a accusantium nobis aliquam voluptatem, officiis quaerat earum eaque hic esse repudiandae aliquid repellendus sint quia dicta culpa eum sed obcaecati dolor. Quod quos enim earum! Molestiae vero consequatur illo animi reiciendis atque eum fugiat distinctio error. Nulla dolorem id soluta at exercitationem iste aspernatur neque, commodi quas sunt inventore, alias tenetur cumque odit illo enim obcaecati laboriosam sint possimus ullam consequatur porro! Illo, voluptate temporibus.</p> -->
                </div>
            <?php endif; ?>

            <div class="info-panel">
                <div class="file-card">
                    <!-- File Icon (No need to be dynamic) -->
                    <div class="file-icon">
                        <img data-src="<?php echo get_template_directory_uri() . '/dist/imgs/report-icon.png'; ?>" alt="" class="lazyload">
                    </div>

                    <!-- File Name -->
                    <h3 class="file-name"><?php _e('Last Report', 'bonyan') ?></h3>

                    <!-- File CTAs -->
                    <div class="file-cta">
                        <?php
                        $last_post_id = $posts[0]->ID;
                        $PDF_file = get_post_meta($last_post_id, 'ro_reports_pdf_file', true);
                        $PDF_file_url = wp_get_attachment_url($PDF_file);
                        ?>
                        <a href="<?php echo $PDF_file_url ?>" class="reversed-primary-btn preview-file"><?php _e('Preview', 'bonyan') ?></a>
                        <a href="<?php echo $PDF_file_url ?>" target="_blank" download class="primary-btn download-file"><?php _e('Download the file', 'bonyan') ?></a>
                    </div>
                </div>
            </div>
        </div>

        <?php get_template_part('template-parts/search-terms-header', null, array("taxonomy_name" => $taxonomy_name, "queried_object" => $queried_object)); ?>


        <div class="campaign my-2 my-lg-5">
            <div class="cards-container">
                <div class="loader"></div>

                <?php if (have_posts()) : ?>

                    <?php
                    $counter = 0;
                    /* Start the Loop */
                    while (have_posts()) :
                        the_post();
                        // if ($counter == 0) { // Skip First Post
                        //     $counter++;
                        //     continue;
                        // }

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
            <?php
            custom_pagination();

            ?>
</section>