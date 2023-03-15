<?php

/**
 * Quick Donation
 * 
 */
if (!function_exists('projects_section_shortcode')) {
    function projects_section_shortcode($atts)
    {
        extract(shortcode_atts(array(
            'projects_section_header_text'     => '',
            'projects_section_cards_count'     => '',
            'projects_categories'     => '',
        ), $atts));



        ob_start();
?>

        <style>
            <?php
            //========[{ Enqueue Widget Style }]========//
            if (!function_exists('projects_section_register_style')) {
                function projects_section_register_style()
                {
                    //require_once(get_template_directory() . '/dist/css/components/wpb/quick-donation.min.css');
                }
                projects_section_register_style();
            } ?>
        </style>
        <div class="container custom-widget">
            <h2 class="bonyan-title primary-color mb-4 mb-md-5"><?php echo $projects_section_header_text ?></h2>
            <div class="cards-container">

                <?php $args = array(
                    'post_type' => 'projects',
                    'post_status' => 'publish',
                    'posts_per_page' => $projects_section_cards_count,
                    "tax_query" => array(
                        array(
                            "taxonomy" => 'projects-categories',
                            'field'    => 'slug',
                            'terms'    => !empty($projects_categories) ? $projects_categories : 6,
                        ),
                    ),
                );
                $projects_Posts = new WP_Query($args);
                if ($projects_Posts->have_posts()) {
                    while ($projects_Posts->have_posts()) {
                        $projects_Posts->the_post();

                ?>
                        <?php get_template_part('template-parts/cards/content', 'projects') ?>


                <?php

                    }
                }
                wp_reset_postdata();



                ?>
            </div>
        </div>



        <script>
            <?php //require_once(get_template_directory() . '/dist/js/components/wpb/quick-donation.min.js'); 
            ?>
        </script>



<?php
        return ob_get_clean();
    }
}

add_shortcode('projects_section', 'projects_section_shortcode');
