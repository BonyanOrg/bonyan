<?php

/**
 * Impact Statistics
 * 
 * impact_title
 * impact_cards
 * 
 */
if (!function_exists('impact_statistics_shortcode')) {
    function impact_statistics_shortcode($atts)
    {
        extract(shortcode_atts(array(
            'impact_title' => __('Our impact for children in 2024', 'bonyan'),
            'impact_cards' => '',
        ), $atts));

        // Parse the repeater field
        $impact_cards_data = array();
        if (!empty($impact_cards)) {
            $impact_cards_data = vc_param_group_parse_atts($impact_cards);
        }
        
        // Ensure impact_cards_data is an array
        if (!is_array($impact_cards_data)) {
            $impact_cards_data = array();
        }

        ob_start();
?>

        <?php
        //========[{ Enqueue Widget Style }]========//
        if (!function_exists('impact_statistics_register_style')) {
            function impact_statistics_register_style()
            {
                wp_enqueue_style(
                    'impact-statistics-style',
                    get_template_directory_uri() . '/dist/css/components/wpb/impact-statistics.min.css',
                    array(),
                    '1.0.0'
                );
            }
            impact_statistics_register_style();
        } ?>

        <!-- Start Impact Statistics -->
        <section class="impact-statistics-section py-5 custom-widget">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2 class="bonyan-title impact-title"><?php echo esc_html($impact_title); ?></h2>
                        
                        <div class="impact-cards-wrapper">
                            <div class="row">
                                <?php
                                // ========================================
                                // BACKEND DEVELOPER: EASY SWITCH TO WPBakery DATA
                                // ========================================
                                // To enable WPBakery data, ensure you have at least 4 cards configured
                                // with all fields: card_icon, card_number, card_text
                                
                                if (!empty($impact_cards_data) && count($impact_cards_data) >= 4) {
                                    // WPBakery data is properly configured - use it
                                    foreach ($impact_cards_data as $card) {
                                        $icon = isset($card['card_icon']) ? $card['card_icon'] : '';
                                        $number = isset($card['card_number']) ? $card['card_number'] : '';
                                        $text = isset($card['card_text']) ? $card['card_text'] : '';
                                        
                                        // Get icon path
                                        $icon_path = get_template_directory_uri() . '/dist/imgs/' . $icon . '.svg';
                                ?>
                                    <div class="col-6 col-md-6 col-lg-3 mb-4">
                                        <div class="impact-card">
                                            <div class="impact-card-icon">
                                                <img src="<?php echo esc_url($icon_path); ?>" alt="<?php echo esc_attr($text); ?>" class="impact-icon">
                                            </div>
                                            <div class="impact-card-number">
                                                <?php echo esc_html($number); ?>
                                            </div>
                                            <div class="impact-card-text">
                                                <?php echo esc_html($text); ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                    }
                                } else {
                                    // Show sample cards when WPBakery data is not properly configured
                                    $sample_cards = array(
                                        array(
                                            'card_icon' => 'face-kid',
                                            'card_number' => '113.6K',
                                            'card_text' => __('Children Helped', 'bonyan')
                                        ),
                                        array(
                                            'card_icon' => 'globe',
                                            'card_number' => '45',
                                            'card_text' => __('Countries Reached', 'bonyan')
                                        ),
                                        array(
                                            'card_icon' => 'heart-red',
                                            'card_number' => '2.1M',
                                            'card_text' => __('Lives Impacted', 'bonyan')
                                        ),
                                        array(
                                            'card_icon' => 'star',
                                            'card_number' => '98%',
                                            'card_text' => __('Success Rate', 'bonyan')
                                        )
                                    );
                                    
                                    foreach ($sample_cards as $card) {
                                        $icon = $card['card_icon'];
                                        $number = $card['card_number'];
                                        $text = $card['card_text'];
                                        
                                        // Get icon path
                                        $icon_path = get_template_directory_uri() . '/dist/imgs/' . $icon . '.svg';
                                ?>
                                    <div class="col-6 col-md-6 col-lg-3 mb-4">
                                        <div class="impact-card">
                                            <div class="impact-card-icon">
                                                <img src="<?php echo esc_url($icon_path); ?>" alt="<?php echo esc_attr($text); ?>" class="impact-icon">
                                            </div>
                                            <div class="impact-card-number">
                                                <?php echo esc_html($number); ?>
                                            </div>
                                            <div class="impact-card-text">
                                                <?php echo esc_html($text); ?>
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
                </div>
            </div>
        </section>
        <!-- End Impact Statistics -->

        <?php
        //========[{ Enqueue Widget script }]========//
        if (!function_exists('impact_statistics_register_script')) {
            function impact_statistics_register_script()
            {
                // No JavaScript needed for this component
            }
            impact_statistics_register_script();
        } ?>

<?php
        return ob_get_clean();
    }
}

add_shortcode('impact_statistics', 'impact_statistics_shortcode'); 