<?php

if (!is_mobile_or_ipad()) :
    if (is_single() || is_page()) : ?>
        <section class="page-header not-1024-mobile">
            <div class="page-header-decor"></div>
            <div class="container">
                <div class="page-header--contents">
                    <div class="page-header--contents-text" <?php echo header_color('', $post->ID); ?>>
                        <h1 class="mb-3"><?php the_title(); ?></h1>
                        <?php if (function_exists('rank_math_the_breadcrumbs')) rank_math_the_breadcrumbs(); ?>
                    </div>

                    <div class="page-header--contents-image">
                        <img data-src="<?php echo get_the_post_thumbnail_url() ?>" alt="<?php the_title(); ?>" class="lazyload">
                        <div class="page-header--contents-decor" <?php echo header_color('', $post->ID); ?>></div>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>




    <?php if (is_archive()) : ?>
        <section class="page-header not-1024-mobile">
            <div class="page-header-decor"></div>
            <div class="container">
                <div class="page-header--contents">
                    <div class="page-header--contents-text" <?php echo header_color($post_type); ?>>
                        <h1 class="mb-3">
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
                        <?php if (function_exists('rank_math_the_breadcrumbs')) rank_math_the_breadcrumbs(); ?>
                    </div>

                    <div class="page-header--contents-image">
                        <img data-src="
                    <?php
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
                    ?>
                    " alt="Page Header" class="lazyload">
                        <div class="page-header--contents-decor" <?php echo header_color($post_type); ?>></div>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>
<?php else : ?>
    <!-- If Mobile -->

    <?php if (is_single() || is_page()) : ?>
        <section class="mobile-page-header only-1024-mobile" <?php echo header_color('', $post->ID); ?>>
            <div class="container">
                <div class="mobile-page-header--content">
                    <h1 class="mb-2"><?php the_title(); ?></h1>
                    <?php if (function_exists('rank_math_the_breadcrumbs')) rank_math_the_breadcrumbs(); ?>
                </div>
            </div>
        </section>
    <?php endif; ?>


    <?php if (is_archive()) : ?>
        <section class="mobile-page-header only-1024-mobile" <?php echo header_color($post_type); ?>>
            <div class="container">
                <div class="mobile-page-header--content">
                    <h1 class="mb-2">
                        <?php
                        if (isset($category_name) && $category_name != "") echo ucfirst(urldecode($category_name));
                        if (isset($tag) && $tag != "") {
                            $tag_data = get_term_by('term_taxonomy_id', $tag_id);
                            echo ucfirst(urldecode($tag_data->name));
                        }
                        if (isset($post_type) && $post_type != "" && $tag == "") {
                            $post_type_data = get_post_type_object($post_type);
                            $post_type_slug = $post_type_data->rewrite['slug'];
                            echo ucfirst(urldecode($post_type_data->label));
                        }
                        if (isset($term) && $term != "") echo ucfirst(urldecode($term));
                        ?>
                    </h1>
                    <?php if (function_exists('rank_math_the_breadcrumbs')) rank_math_the_breadcrumbs(); ?>
                </div>
            </div>
        </section>
    <?php endif; ?>
<?php endif; ?>


<?php

function header_color($post_type = null, $post_id = null)
{

    if (isset($post_type) && $post_type != "") {
        $header_bg_color = get_option($post_type . 'header_bg_color');
        if (!empty($header_bg_color)) {
            return 'style="background-color: ' . $header_bg_color . '";';
        } else {
            return '';
        }
    }

    if (isset($post_id) && $post_id != "") {
        $po_header_bg_color = get_post_meta($post_id, "po_header_bg_color", true);
        if (!empty($po_header_bg_color)) {
            return 'style="background-color: ' . $po_header_bg_color . '";';
        } else {
            return '';
        }
    }
}
