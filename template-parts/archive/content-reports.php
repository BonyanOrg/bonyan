<?php

$queried_object = get_queried_object();
$taxonomy_name = $queried_object->taxonomies[1];
?>


<div class="container">
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
                            <a href="<?php echo get_term_link($term->term_id) ?>" class="primary-btn download-file">More</a>
                        </div>
                    </div>
        <?php
                }
            }
        } ?>
    </div>
</div>


<?php
