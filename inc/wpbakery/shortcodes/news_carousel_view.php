<?php

/**
 * Header Title
 * 
 * news_carousel_header_text
 * news_carousel_btn_link
 * news_carousel_cards_count
 * post_type
 * post_tag
 * news_categories
 * 
 */
if (!function_exists('news_carousel_shortcode')) {
    function news_carousel_shortcode($atts)
    {
        extract(shortcode_atts(array(
            'news_carousel_header_text'     => 'Latest News and Updates',
            'news_carousel_btn_link'     => '',
            'news_carousel_cards_count'     => '6',
            'post_type'     => '',
            'post_tag'     => '',
            'news_categories'     => '',
        ), $atts));
        // Get url of full image size
        $link     = vc_build_link($news_carousel_btn_link);
        $a_href   = isset($link['url']) ? $link['url'] : '';

        ob_start();
?>

        <?php
        //========[{ Enqueue Widget Style }]========//
        if (!function_exists('news_carousel_register_style')) {
            function news_carousel_register_style()
            {
                global $load_swiper_style;
                if (!$load_swiper_style) {
                    load_swiper_style('wp_bakery');
                }
        ?>
        <?php
            }
            news_carousel_register_style();
        } ?>

        <!-- Start News Cards -->
        <section class="news-section py-5 custom-widget">
                <div class="d-flex align-items-center justify-content-center justify-content-xl-strtch mb-3 ">
                    <h2 class="bonyan-title"><?php echo esc_html($news_carousel_header_text); ?></h2>

                    <div class="custom-swiper-nav ms-auto">
                        <div class="swiper-nav-btn swiper-prev-nav news-prev-arrow"></div>
                        <div class="swiper-nav-btn swiper-next-nav news-next-arrow"></div>
                    </div>

                    <a href="<?php echo $a_href ?>" class="more-btn secondary-outlined-btn ms-3 primary-color hide-from-laptop-up"><?php _e('View All', 'bonyan') ?></a>
                </div>

                <div class="swiper news-carousel">
                    <div class="swiper-wrapper">
                        <?php
                        // ========================================
                        // BACKEND DEVELOPER: EASY SWITCH TO REAL POSTS
                        // ========================================
                        // To enable real posts, simply change this to: $use_real_posts = true;
                        $use_real_posts = false;
                        
                        if ($use_real_posts) {
                            // REAL POSTS CODE - Uncomment when ready
                            /*
                            $args = array(
                                'post_type' => 'post',
                                'post_status' => 'publish',
                                'posts_per_page' => $news_carousel_cards_count ? $news_carousel_cards_count : 6,
                            );
                            
                            // Only add tax query if specific tag or category is selected
                            if ($post_tag != "" && $post_tag != "none") {
                                $args['tax_query'] = array(
                                    array(
                                        "taxonomy" => "post_tag",
                                        'field'    => 'slug',
                                        'terms'    => $post_tag,
                                    ),
                                );
                            } elseif ($news_categories != "" && $news_categories != "none") {
                                $args['tax_query'] = array(
                                    array(
                                        "taxonomy" => "category",
                                        'field'    => 'slug',
                                        'terms'    => $news_categories,
                                    ),
                                );
                            }
                            
                            $news_Posts = new WP_Query($args);
                            
                            if ($news_Posts->have_posts()) {
                                while ($news_Posts->have_posts()) {
                                    $news_Posts->the_post();
                                    
                                    // Get the first category for the badge
                                    $categories = get_the_category();
                                    $category_name = !empty($categories) ? $categories[0]->name : 'News';
                            ?>
                                    <div class="swiper-slide">
                                        <div class="news-card">
                                            <a href="<?php the_permalink(); ?>" class="news-card-link">
                                                <div class="news-card-image">
                                                    <?php if (has_post_thumbnail()): ?>
                                                        <?php the_post_thumbnail('medium', array('class' => 'img-fluid')); ?>
                                                    <?php else: ?>
                                                        <img src="https://via.placeholder.com/400x250/CFE2FD/1877F2?text=News" alt="News Placeholder" class="img-fluid">
                                                    <?php endif; ?>
                                                </div>
                                                <div class="news-card-content">
                                                    <div class="news-badge"><?php echo esc_html($category_name); ?></div>
                                                    <h3 class="news-title"><?php the_title(); ?></h3>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                            <?php
                                }
                            }
                            wp_reset_query();
                            */
                        } else {
                            // PLACEHOLDER CONTENT - Shows by default
                            $sample_news = array(
                                array(
                                    'title' => 'Severe malnutrition cases have tripled in Islamic Relief clinics across Darfur, as hundreds of thousands of people continue to flee ongoing attacks and violence in the region. The humanitarian crisis has reached critical levels with children and families facing unprecedented challenges.',
                                    'category' => 'Press Releases',
                                    'image' => 'https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?w=400&h=250&fit=crop&crop=center'
                                ),
                                array(
                                    'title' => 'Arafat in Ethiopia: The childhood I know, the life I always miss. Growing up in the refugee camps taught me resilience and hope, but the memories of home and family continue to shape my journey and inspire my work with humanitarian organizations.',
                                    'category' => 'Press Releases',
                                    'image' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=400&h=250&fit=crop&crop=center'
                                ),
                                array(
                                    'title' => 'Eid Mubarak from Islamic Relief Worldwide.',
                                    'category' => 'Press Releases',
                                    'image' => 'https://images.unsplash.com/photo-1518611012118-696072aa579a?w=400&h=250&fit=crop&crop=center'
                                ),
                                array(
                                    'title' => 'Emergency Response Team Deployed to Support Communities Affected by Recent Natural Disasters. Our dedicated volunteers and staff are working around the clock to provide immediate assistance, shelter, and essential supplies to those in need.',
                                    'category' => 'Emergency Response',
                                    'image' => 'https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=400&h=250&fit=crop&crop=center'
                                ),
                                array(
                                    'title' => 'New Educational Programs Launched to Empower Youth in Underserved Communities. Through innovative learning initiatives and community partnerships, we are creating opportunities for children to build brighter futures and achieve their full potential.',
                                    'category' => 'Education',
                                    'image' => 'https://images.unsplash.com/photo-1518611012118-696072aa579a?w=400&h=250&fit=crop&crop=center'
                                ),
                                array(
                                    'title' => 'Partnership Announcement: Collaborative Efforts to Address Global Humanitarian Challenges. We are excited to announce new strategic partnerships that will enhance our ability to serve communities worldwide and create lasting positive impact.',
                                    'category' => 'Partnerships',
                                    'image' => 'https://images.unsplash.com/photo-1552664730-d307ca884978?w=400&h=250&fit=crop&crop=center'
                                )
                            );
                            
                            foreach ($sample_news as $news) {
                        ?>
                                <div class="swiper-slide">
                                    <div class="news-card">
                                        <a href="#" class="news-card-link">
                                            <div class="news-card-image">
                                                <img src="<?php echo esc_url($news['image']); ?>" alt="<?php echo esc_attr($news['title']); ?>" class="img-fluid">
                                            </div>
                                            <div class="news-card-content">
                                                <div class="news-badge"><?php echo esc_html($news['category']); ?></div>
                                                <h3 class="news-title"><?php echo esc_html($news['title']); ?></h3>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                        <?php
                            }
                        }
                        ?>
                    </div>
                </div>

                <a href="<?php echo $a_href ?>" class="more-btn secondary-outlined-btn primary-color hide-from-ipad-down mt-3 py-3 h-auto"><?php _e('View All', 'bonyan') ?></a>
            
        </section>
        <!-- End News Cards -->


        <?php
        //========[{ Enqueue Widget script }]========//
        if (!function_exists('news_carousel_register_script')) {
            function news_carousel_register_script()
            {
                global $load_swiper_script;
                if (!$load_swiper_script) {
                    load_swiper_script('wp_bakery');
                }
        ?>
        <?php
            }
            news_carousel_register_script();
        } ?>



<?php
        return ob_get_clean();
    }
}

add_shortcode('news_carousel', 'news_carousel_shortcode'); 