<?php

$queried_object = get_queried_object();
$taxonomy_name = $queried_object->taxonomies[1];
?>


<div class="container">
    <div class="content-with-info-panel">

        <?php // Echo pre Report Archive Template
        $post_slug = !empty(get_option('reports_archive_page_template')) ? esc_html(get_option('reports_archive_page_template')) : '';
        if (!empty($post_slug)) :
        ?>
            <div class="inner-content">
                <?php
                $args = array(
                    'name'        => $post_slug,
                    'post_type'   => 'page',
                    'post_status' => 'publish',
                    'numberposts' => 1,
                );
                
                $posts = get_posts($args);
                if (!empty($posts) && isset($posts[0])) {
                    $report_archive_template = $posts[0];
                ?>
                    <style type="text/css" data-type="vc_shortcodes-custom-css">
                        <?php echo get_post_meta($report_archive_template->ID, '_wpb_shortcodes_custom_css', true); ?>
                    </style>
                <?php
                    $content = apply_filters('the_content', $report_archive_template->post_content);
                    echo $content;
                }
                ?>
                <!-- <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Amet, soluta. Ipsum illo nisi, enim sapiente animi officia dicta a culpa omnis hic suscipit neque beatae molestias molestiae ullam! Praesentium nam rerum asperiores saepe dolorum a accusantium nobis aliquam voluptatem, officiis quaerat earum eaque hic esse repudiandae aliquid repellendus sint quia dicta culpa eum sed obcaecati dolor. Quod quos enim earum! Molestiae vero consequatur illo animi reiciendis atque eum fugiat distinctio error. Nulla dolorem id soluta at exercitationem iste aspernatur neque, commodi quas sunt inventore, alias tenetur cumque odit illo enim obcaecati laboriosam sint possimus ullam consequatur porro! Illo, voluptate temporibus.</p> -->
            </div>
        <?php else : echo '</br> </br>';
        endif; ?>

    </div>
    <div class="cards-container grid-4">
        <?php if (!empty($taxonomy_name)) {
            $terms = get_terms(array(
                'taxonomy' => $taxonomy_name,
                'hide_empty' => false,
            ));
            if (count($terms) > 0) {
                foreach ($terms as $term) {
        ?>
                    <div class="file-card">
                        <!-- File Icon (No need to be dynamic) -->
                        <div class="file-icon">
                            <img data-src="<?php echo get_template_directory_uri() . '/dist/imgs/report_cat_icon.png'; ?>" alt="" class="lazyload">
                        </div>

                        <!-- File Name -->
                        <h3 class="file-name"><?php echo $term->name  ?></h3>

                        <!-- File CTAs -->
                        <div class="file-cta">
                            <a href="<?php echo get_term_link($term->term_id) ?>" class="primary-btn download-file"><?php _e('More', 'bonyan') ?></a>
                        </div>
                    </div>
        <?php
                }
            }
        } ?>
    </div>
</div>


<?php
