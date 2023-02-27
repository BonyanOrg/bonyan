<?php
if (is_single() || is_page()) : ?>

    <div class="page-head" style="background: url('<?php echo get_the_post_thumbnail_url() ?>') ">
        <div class="container">
            <h1><?php the_title(); ?></h1>
            <nav aria-label="breadcrumbs" class="rank-math-breadcrumb">
                <?php if (function_exists('rank_math_the_breadcrumbs')) rank_math_the_breadcrumbs(); ?>
            </nav>
        </div>
    </div>
<?php endif; ?>




<?php if (is_archive()) : ?>
    <div class="page-head" style="background: url(' <?php
                                                    if (isset($category_name) && $category_name != "") {
                                                        $term_details = get_term_by('slug', $category_name, 'category');
                                                        $var = $term_details->term_id;
                                                        $category_image_url = get_term_meta($term_details->term_id, 'category_cover', true);
                                                        echo $category_image_url != "" ? $category_image_url : "";
                                                    }

                                                    if (isset($term) && $term != "") {
                                                        $term_details = get_term_by('slug', $term, $taxonomy);
                                                        $var = $term_details->term_id;
                                                        $category_image_url = get_term_meta($term_details->term_id, $taxonomy . '_cover', true);
                                                        echo $category_image_url != "" ? $category_image_url : "";
                                                    }

                                                    if (isset($post_type) && $post_type != "") {
                                                        $header_cover_image_id = get_option($post_type . 'header_cover_image');
                                                        echo wp_get_attachment_url($header_cover_image_id) != "" ?  wp_get_attachment_url($header_cover_image_id) : "";
                                                    }
                                                    ?>') ">
        <div class="container">
            <h1>
                <?php
                if (isset($category_name) && $category_name != "") {
                    $term_data = get_term_by('slug', $category_name, 'category');
                    echo ucfirst(urldecode($term_data->name));
                }
                if (isset($tag) && $tag != "") {
                    $tag_data = get_term_by('term_taxonomy_id', $tag_id);
                    echo ucfirst(urldecode($tag_data->name));
                }
                if (isset($post_type) && $post_type != "" && $tag == "") {
                    $post_type_data = get_post_type_object($post_type);
                    $post_type_slug = $post_type_data->rewrite['slug'];
                    echo ucfirst(urldecode($post_type_data->label));
                }
                if (isset($term) && $term != "") {
                    $term_data = get_term_by('slug', $term, $taxonomy);
                    echo ucfirst(urldecode($term_data->name));
                }

                ?>
            </h1>

            <nav aria-label="breadcrumbs" class="rank-math-breadcrumb">
                <?php if (function_exists('rank_math_the_breadcrumbs')) rank_math_the_breadcrumbs(); ?>
            </nav>
        </div>
    </div>
<?php endif; ?>