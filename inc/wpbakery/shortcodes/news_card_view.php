<?php

/**
 * News Card Component - REAL DATA VERSION
 * 
 * news_card_post_id - Specific post ID (optional)
 * news_card_category - Category slug (optional)
 * news_card_tag - Tag slug (optional)
 * news_card_fallback_title - Fallback title if no post found
 * news_card_fallback_description - Fallback description if no post found
 * news_card_button_text - Button text
 * news_card_image - Custom image (optional, will use post featured image if empty)
 * 
 */
if (!function_exists('news_card_shortcode')) {
    function news_card_shortcode($atts)
    {
        extract(shortcode_atts(array(
            'news_card_post_id' => '',
            'news_card_category' => '',
            'news_card_tag' => '',
            'news_card_fallback_title' => __('Latest News', 'bonyan'),
            'news_card_fallback_description' => __('Stay updated with our latest news and updates.', 'bonyan'),
            'news_card_button_text' => __('Read More', 'bonyan'),
            'news_card_image' => '',
        ), $atts));
        
        ob_start();
        
        // Get real post data
        $post_data = null;
        
        if (!empty($news_card_post_id)) {
            // Get specific post by ID
            $post_data = get_post($news_card_post_id);
        } else {
            // Get latest post from category/tag
            $args = array(
                'post_type' => 'post',
                'post_status' => 'publish',
                'posts_per_page' => 1,
                'orderby' => 'date',
                'order' => 'DESC',
            );
            
            if (!empty($news_card_category)) {
                $args['category_name'] = $news_card_category;
            }
            
            if (!empty($news_card_tag)) {
                $args['tag'] = $news_card_tag;
            }
            
            $query = new WP_Query($args);
            if ($query->have_posts()) {
                $post_data = $query->posts[0];
            }
            wp_reset_postdata();
        }
        
        if ($post_data) {
            $title = $post_data->post_title;
            $description = $post_data->post_excerpt ?: wp_trim_words($post_data->post_content, 20);
            $link = get_permalink($post_data->ID);
            $image = !empty($news_card_image) ? $news_card_image : get_the_post_thumbnail_url($post_data->ID, 'large');
            
            // Get category name for tag
            $categories = get_the_category($post_data->ID);
            $tag = !empty($categories) ? $categories[0]->name : __('News', 'bonyan');
        } else {
            // Fallback data
            $title = $news_card_fallback_title;
            $description = $news_card_fallback_description;
            $link = '#';
            $image = !empty($news_card_image) ? $news_card_image : get_template_directory_uri() . '/dist/imgs/news-card-image.png';
            $tag = __('News', 'bonyan');
        }
?>

        <div class="news-inner-section custom-widget">
            <div class="news-inner-section__content">
                <span class="news-inner-section__tag"><?php echo esc_html($tag); ?></span>
                <h3 class="news-inner-section__title"><?php echo esc_html($title); ?></h3>
                <p class="news-inner-section__description"><?php echo esc_html($description); ?></p>
                <a href="<?php echo esc_url($link); ?>" class="news-inner-section__button btn btn-primary"><?php echo esc_html($news_card_button_text); ?></a>
            </div>
            <div class="news-inner-section__image">
                <img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($title); ?>">
            </div>
        </div>

<?php
        return ob_get_clean();
    }
}

add_shortcode('news_card', 'news_card_shortcode'); 