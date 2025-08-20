<?php

/**
 * Projects Section
 * 
 */
if (!function_exists('projects_section_shortcode')) {
    function projects_section_shortcode($atts)
    {
        extract(shortcode_atts(array(
            'projects_section_header_text'     => '',
            'projects_section_cards_count'     => 9,
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
                    require_once(get_template_directory() . "/dist/css/components/wpb/project-card.min.css");
                }
                projects_section_register_style();
            } ?>
        </style>
        
        <div class="container custom-widget mt-5 mb-5">
            <?php if (!empty($projects_section_header_text)): ?>
                <h2 class="bonyan-title primary-color mb-4 mb-md-5"><?php echo esc_html($projects_section_header_text); ?></h2>
            <?php endif; ?>
            
            <div class="cards-container">
                <?php 
                // Build query arguments
                $query_args = array(
                    'post_type' => 'projects',
                    'post_status' => 'publish',
                    'posts_per_page' => intval($projects_section_cards_count),
                    'orderby' => 'date',
                    'order' => 'DESC'
                );

                // Add taxonomy query only if category is specified and not 'none'
                if (!empty($projects_categories) && $projects_categories !== 'none') {
                    $query_args['tax_query'] = array(
                        array(
                            'taxonomy' => 'projects-categories',
                            'field'    => 'slug',
                            'terms'    => $projects_categories,
                        ),
                    );
                }

                $projects_query = new WP_Query($query_args);
                
                if ($projects_query->have_posts()) {
                    while ($projects_query->have_posts()) {
                        $projects_query->the_post();
                        get_template_part('template-parts/cards/content', 'projects');
                    }
                    
                } else {
                    // No projects found - show fallback fake cards for design preview
                    // Generate 6 fake project cards
                    $fake_projects = array(
                        array(
                            'title' => 'Community Health Initiative',
                            'excerpt' => 'A comprehensive healthcare program providing medical services to underserved communities. This project focuses on preventive care and health education.',
                            'image' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=400&h=200&fit=crop&crop=center'
                        ),
                        array(
                            'title' => 'Educational Support Program',
                            'excerpt' => 'Supporting students with scholarships, school supplies, and mentoring programs to ensure quality education for all children.',
                            'image' => 'https://images.unsplash.com/photo-1559827260-dc66d52bef19?w=400&h=200&fit=crop&crop=center'
                        ),
                        array(
                            'title' => 'Clean Water Project',
                            'excerpt' => 'Installing water purification systems and wells in rural areas to provide clean drinking water to communities in need.',
                            'image' => 'https://images.unsplash.com/photo-1559827260-dc66d52bef19?w=400&h=200&fit=crop&crop=center'
                        ),
                        array(
                            'title' => 'Women Empowerment Workshop',
                            'excerpt' => 'Skills training and business development programs designed to empower women and create sustainable income opportunities.',
                            'image' => 'https://images.unsplash.com/photo-1487412720507-e7ab37603c6f?w=400&h=200&fit=crop&crop=center'
                        ),
                        array(
                            'title' => 'Emergency Relief Fund',
                            'excerpt' => 'Providing immediate assistance to families affected by natural disasters and humanitarian crises.',
                            'image' => 'https://images.unsplash.com/photo-1581578731548-c64695cc6952?w=400&h=200&fit=crop&crop=center'
                        ),
                        array(
                            'title' => 'Youth Leadership Program',
                            'excerpt' => 'Developing leadership skills and civic engagement among young people through workshops and community projects.',
                            'image' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=400&h=200&fit=crop&crop=center'
                        )
                    );
                    
                    foreach ($fake_projects as $fake_project) {
                        echo '<a href="#" class="project-card">';
                        echo '<div class="project-img">';
                        echo '<img src="' . esc_url($fake_project['image']) . '" alt="' . esc_attr($fake_project['title']) . '" style="border-radius: 8px 8px 0 0;">';
                        echo '</div>';
                        
                        echo '<div class="project-title">';
                        echo '<h3 class="bonyan-title">' . esc_html($fake_project['title']) . '</h3>';
                        echo '</div>';
                        
                        echo '<div class="project-desc">';
                        echo '<p>' . esc_html($fake_project['excerpt']) . '</p>';
                        echo '</div>';
                        echo '</a>';
                    }
                }
                
                wp_reset_postdata();
                ?>
            </div>
        </div>

<?php
        return ob_get_clean();
    }
}

add_shortcode('projects_section', 'projects_section_shortcode');
