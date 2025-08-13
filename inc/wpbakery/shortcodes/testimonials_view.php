<?php

/**
 * Testimonials Component
 * 
 */
if (!function_exists('testimonials_shortcode')) {
    function testimonials_shortcode($atts)
    {
        extract(shortcode_atts(array(
            'testimonials_title' => 'Trusted by volunteers everywhere',
        ), $atts));

        $testimonials_items = vc_param_group_parse_atts($atts['testimonials_items']);

        // ========================================
        // BACKEND DEVELOPER: EASY SWITCH TO REAL DATA
        // ========================================
        // To enable real testimonials from database, simply change this to: $use_real_testimonials = true;
        $use_real_testimonials = false;

        ob_start();
?>

        <?php
        //========[{ Enqueue Widget Style }]========//
        if (!function_exists('testimonials_register_style')) {
            function testimonials_register_style()
            {
                global $load_swiper_style;
                if (!$load_swiper_style) {
                    load_swiper_style('wp_bakery');
                }
            }
            testimonials_register_style();
        } ?>

        <!-- Start Testimonials -->
        <section class="testimonials-section py-5 custom-widget">
            <div class="container">
                <div class="d-flex align-items-center justify-content-center justify-content-xl-start mb-4">
                    <h2 class="bonyan-title primary-color bold"><?php echo esc_html($testimonials_title); ?></h2>
                </div>
                
                <div class="swiper testimonials-carousel">
                    <div class="swiper-wrapper">
                        <?php
                        if ($use_real_testimonials && !empty($testimonials_items)) {
                            // REAL TESTIMONIALS CODE - Uncomment when ready
                            /*
                            foreach ($testimonials_items as $testimonial) {
                                $rating = isset($testimonial['testimonial_rating']) ? intval($testimonial['testimonial_rating']) : 5;
                                $text = isset($testimonial['testimonial_text']) ? $testimonial['testimonial_text'] : '';
                                $author = isset($testimonial['testimonial_author']) ? $testimonial['testimonial_author'] : '';
                            ?>
                                <div class="swiper-slide">
                                    <div class="testimonial-card">
                                        <div class="testimonial-rating">
                                            <?php for ($i = 1; $i <= 5; $i++) : ?>
                                                <svg class="star-icon <?php echo $i <= $rating ? 'filled' : 'empty'; ?>" 
                                                     xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                    <path d="M8.38359 6.00345C8.84548 4.73955 9.07642 4.1076 9.2778 3.798C10.5596 1.82739 13.4448 1.82739 14.7266 3.798C14.928 4.1076 15.1589 4.73955 15.6208 6.00346L15.668 6.13263C15.708 6.24218 15.7281 6.29696 15.7489 6.34585C16.0484 7.04718 16.7206 7.51721 17.4821 7.55772C17.5352 7.56054 17.5935 7.56054 17.7101 7.56054H18.2082C18.5419 7.56054 18.7088 7.56054 18.7909 7.56469C21.8179 7.71786 23.0061 11.5651 20.5926 13.3985C20.5272 13.4482 20.3893 13.5423 20.1137 13.7305C20.0651 13.7637 20.0409 13.7803 20.0196 13.7956C19.3094 14.3084 19.0155 15.2237 19.2945 16.054C19.3029 16.0789 19.314 16.1094 19.3363 16.1704C19.5764 16.8276 19.6965 17.1562 19.7381 17.3223C20.4136 20.023 17.6026 22.2676 15.1183 21.011C14.9655 20.9338 14.6885 20.7548 14.1345 20.3969L13.2913 19.8523C13.095 19.7254 12.9968 19.662 12.9004 19.6136C12.3353 19.3295 11.6691 19.3295 11.104 19.6136C11.0076 19.662 10.9094 19.7254 10.713 19.8523L9.88691 20.3859C9.31916 20.7527 9.03528 20.9361 8.87852 21.0148C6.39814 22.2613 3.59768 20.0252 4.26428 17.3305C4.30641 17.1602 4.42906 16.8246 4.67435 16.1533C4.69783 16.0891 4.70956 16.057 4.71845 16.0304C4.99194 15.2115 4.70907 14.3095 4.0169 13.7934C3.99442 13.7767 3.96885 13.7587 3.9177 13.7227C3.62944 13.5202 3.48531 13.4189 3.4161 13.3644C1.06072 11.5105 2.2571 7.72767 5.25014 7.56531C5.3381 7.56054 5.51426 7.56054 5.86659 7.56054H6.2975C6.41106 7.56054 6.46783 7.56054 6.51952 7.55787C7.2831 7.51832 7.95732 7.04688 8.25656 6.34326C8.27681 6.29564 8.2963 6.24231 8.33527 6.13566L8.38359 6.00345Z" 
                                                          fill="<?php echo $i <= $rating ? '#FABC1C' : '#E5E5E5'; ?>"/>
                                                </svg>
                                            <?php endfor; ?>
                                        </div>
                                        
                                        <?php if ($text) : ?>
                                            <div class="testimonial-text">
                                                <?php echo esc_html($text); ?>
                                            </div>
                                        <?php endif; ?>
                                        
                                        <?php if ($author) : ?>
                                            <div class="testimonial-author">
                                                <?php echo esc_html($author); ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php
                            }
                            */
                        } else {
                            // PLACEHOLDER CONTENT - Shows by default (forced sample data)
                            $sample_testimonials = array(
                                array(
                                    'rating' => 5,
                                    'text' => 'When I volunteered, I discovered a new side of myself. For the first time, I felt like I was part of real change.',
                                    'author' => 'Mohammad'
                                ),
                                array(
                                    'rating' => 5,
                                    'text' => 'Volunteering with this organization has been the most rewarding experience of my life. I\'ve seen firsthand the impact we can make together.',
                                    'author' => 'Sarah'
                                ),
                                array(
                                    'rating' => 5,
                                    'text' => 'The sense of community and purpose I found here is incredible. Every day I learn something new and meet amazing people.',
                                    'author' => 'Ahmed'
                                ),
                                array(
                                    'rating' => 5,
                                    'text' => 'Being part of this mission has transformed my perspective on life. I\'m grateful for every opportunity to serve others.',
                                    'author' => 'Fatima'
                                ),
                                array(
                                    'rating' => 5,
                                    'text' => 'The dedication and passion of everyone here is inspiring. I\'ve never felt more connected to a cause than I do now.',
                                    'author' => 'David'
                                ),
                                array(
                                    'rating' => 5,
                                    'text' => 'This experience has taught me the true meaning of compassion and service. I\'m proud to be part of such an amazing team.',
                                    'author' => 'Aisha'
                                )
                            );
                            
                            foreach ($sample_testimonials as $testimonial) {
                        ?>
                            <div class="swiper-slide">
                                <div class="testimonial-card">
                                    <div class="testimonial-rating">
                                        <?php for ($i = 1; $i <= 5; $i++) : ?>
                                            <svg class="star-icon filled" 
                                                 xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <path d="M8.38359 6.00345C8.84548 4.73955 9.07642 4.1076 9.2778 3.798C10.5596 1.82739 13.4448 1.82739 14.7266 3.798C14.928 4.1076 15.1589 4.73955 15.6208 6.00346L15.668 6.13263C15.708 6.24218 15.7281 6.29696 15.7489 6.34585C16.0484 7.04718 16.7206 7.51721 17.4821 7.55772C17.5352 7.56054 17.5935 7.56054 17.7101 7.56054H18.2082C18.5419 7.56054 18.7088 7.56054 18.7909 7.56469C21.8179 7.71786 23.0061 11.5651 20.5926 13.3985C20.5272 13.4482 20.3893 13.5423 20.1137 13.7305C20.0651 13.7637 20.0409 13.7803 20.0196 13.7956C19.3094 14.3084 19.0155 15.2237 19.2945 16.054C19.3029 16.0789 19.314 16.1094 19.3363 16.1704C19.5764 16.8276 19.6965 17.1562 19.7381 17.3223C20.4136 20.023 17.6026 22.2676 15.1183 21.011C14.9655 20.9338 14.6885 20.7548 14.1345 20.3969L13.2913 19.8523C13.095 19.7254 12.9968 19.662 12.9004 19.6136C12.3353 19.3295 11.6691 19.3295 11.104 19.6136C11.0076 19.662 10.9094 19.7254 10.713 19.8523L9.88691 20.3859C9.31916 20.7527 9.03528 20.9361 8.87852 21.0148C6.39814 22.2613 3.59768 20.0252 4.26428 17.3305C4.30641 17.1602 4.42906 16.8246 4.67435 16.1533C4.69783 16.0891 4.70956 16.057 4.71845 16.0304C4.99194 15.2115 4.70907 14.3095 4.0169 13.7934C3.99442 13.7767 3.96885 13.7587 3.9177 13.7227C3.62944 13.5202 3.48531 13.4189 3.4161 13.3644C1.06072 11.5105 2.2571 7.72767 5.25014 7.56531C5.3381 7.56054 5.51426 7.56054 5.86659 7.56054H6.2975C6.41106 7.56054 6.46783 7.56054 6.51952 7.55787C7.2831 7.51832 7.95732 7.04688 8.25656 6.34326C8.27681 6.29564 8.2963 6.24231 8.33527 6.13566L8.38359 6.00345Z" 
                                                      fill="#FABC1C"/>
                                            </svg>
                                        <?php endfor; ?>
                                    </div>
                                    
                                    <div class="testimonial-text">
                                        <?php echo esc_html($testimonial['text']); ?>
                                    </div>
                                    
                                    <div class="testimonial-author">
                                        <?php echo esc_html($testimonial['author']); ?>
                                    </div>
                                </div>
                            </div>
                        <?php
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Testimonials -->

        <?php
        //========[{ Enqueue Widget script }]========//
        if (!function_exists('testimonials_register_script')) {
            function testimonials_register_script()
            {
                global $load_swiper_script;
                if (!$load_swiper_script) {
                    load_swiper_script('wp_bakery');
                }
        ?>
                <script>
                    <?php require_once(get_template_directory() . '/dist/js/components/wpb/testimonials-carousel.min.js'); ?>
                </script>
        <?php
            }
            testimonials_register_script();
        } ?>

<?php
        return ob_get_clean();
    }
}

add_shortcode('testimonials', 'testimonials_shortcode'); 