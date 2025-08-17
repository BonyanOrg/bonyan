<?php

/**
 * News Card Component
 * 
 * news_card_tag_text
 * news_card_title
 * news_card_description
 * news_card_button_text
 * news_card_button_link
 * news_card_image
 * 
 */
if (!function_exists('news_card_shortcode')) {
    function news_card_shortcode($atts)
    {
        extract(shortcode_atts(array(
            'news_card_tag_text'     => 'News',
            'news_card_title'        => 'Refugee Camps In Jordan',
            'news_card_description'  => 'Jordan is home to Za\'atari, Azraq, and Mrajeeb Al Fhood refugee camps for Syrian refugees. Although a great number of Syrian refugees are living in Jordan, however, only 18 percent of refugees in Jordan live in refugee camps.',
            'news_card_button_text'  => 'See more',
            'news_card_button_link'  => '#',
            'news_card_image'        => '',
        ), $atts));
        
        ob_start();
?>

        <div class="news-inner-section custom-widget">
            <div class="news-inner-section__content">
                <span class="news-inner-section__tag"><?php echo esc_html($news_card_tag_text); ?></span>
                <h3 class="news-inner-section__title"><?php echo esc_html($news_card_title); ?></h3>
                <p class="news-inner-section__description"><?php echo esc_html($news_card_description); ?></p>
                <a href="<?php echo esc_url($news_card_button_link); ?>" class="news-inner-section__button btn btn-primary"><?php echo esc_html($news_card_button_text); ?></a>
            </div>
            <div class="news-inner-section__image">
                <?php if (!empty($news_card_image)) : ?>
                    <img src="<?php echo esc_url($news_card_image); ?>" alt="<?php echo esc_attr($news_card_title); ?>">
                <?php else : ?>
                    <img src="<?php echo get_template_directory_uri(); ?>/dist/imgs/news-card-image.png" alt="Refugee child in camp">
                <?php endif; ?>
            </div>
        </div>

<?php
        return ob_get_clean();
    }
}

add_shortcode('news_card', 'news_card_shortcode'); 