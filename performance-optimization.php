<?php
/**
 * Performance Optimization Functions for Bonyan Theme
 * This file contains functions to improve WordPress site performance
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Optimize WordPress Performance
 */
function bonyan_performance_optimizations() {
    
    // Remove unnecessary WordPress features
    remove_action('wp_head', 'wp_generator');
    remove_action('wp_head', 'wlwmanifest_link');
    remove_action('wp_head', 'rsd_link');
    remove_action('wp_head', 'wp_shortlink_wp_head');
    remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10);
    
    // Disable emojis
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('admin_print_styles', 'print_emoji_styles');
    
    // Remove query strings from static resources
    function bonyan_remove_script_version($src) {
        if (strpos($src, 'ver=')) {
            $src = remove_query_arg('ver', $src);
        }
        return $src;
    }
    add_filter('script_loader_src', 'bonyan_remove_script_version', 15, 1);
    add_filter('style_loader_src', 'bonyan_remove_script_version', 15, 1);
    
    // Optimize database queries
    function bonyan_optimize_queries($query) {
        if (!is_admin() && $query->is_main_query()) {
            // Limit posts per page
            if (is_home() || is_archive()) {
                $query->set('posts_per_page', 12);
            }
            
            // Optimize slider queries
            if (is_page_template('home-page.php')) {
                // Cache slider posts
                $slider_posts = wp_cache_get('main_slider_posts', 'bonyan');
                if (false === $slider_posts) {
                    $slider_posts = get_posts(array(
                        'post_type' => 'main_slider',
                        'post_status' => 'publish',
                        'posts_per_page' => 5, // Limit to 5 posts
                        'no_found_rows' => true, // Don't count total rows
                        'update_post_meta_cache' => false, // Don't cache post meta
                        'update_post_term_cache' => false, // Don't cache terms
                    ));
                    wp_cache_set('main_slider_posts', $slider_posts, 'bonyan', 3600); // Cache for 1 hour
                }
            }
        }
    }
    add_action('pre_get_posts', 'bonyan_optimize_queries');
    
    // Add browser caching headers
    function bonyan_add_cache_headers() {
        if (!is_admin()) {
            header('Cache-Control: public, max-age=31536000'); // 1 year
            header('Expires: ' . gmdate('D, d M Y H:i:s \G\M\T', time() + 31536000));
        }
    }
    add_action('send_headers', 'bonyan_add_cache_headers');
    
    // Optimize images
    function bonyan_optimize_images() {
        // Add lazy loading to images
        add_filter('wp_get_attachment_image_attributes', function($attr, $attachment, $size) {
            $attr['loading'] = 'lazy';
            return $attr;
        }, 10, 3);
    }
    add_action('init', 'bonyan_optimize_images');
    
    // Defer non-critical JavaScript
    function bonyan_defer_js($tag, $handle, $src) {
        $defer_scripts = array(
            'bonyan-script',
            'bonyan-home-sliders-script',
            'bonyan-hero-donation-form-script'
        );
        
        if (in_array($handle, $defer_scripts)) {
            return str_replace(' src', ' defer src', $tag);
        }
        
        return $tag;
    }
    add_filter('script_loader_tag', 'bonyan_defer_js', 10, 3);
    
    // Optimize CSS loading
    function bonyan_optimize_css() {
        // Preload critical CSS
        add_action('wp_head', function() {
            echo '<link rel="preload" href="' . get_template_directory_uri() . '/dist/css/bootstrap.min.css" as="style" onload="this.onload=null;this.rel=\'stylesheet\'">';
            echo '<link rel="preload" href="' . get_template_directory_uri() . '/dist/css/style.min.css" as="style" onload="this.onload=null;this.rel=\'stylesheet\'">';
        }, 1);
    }
    add_action('init', 'bonyan_optimize_css');
}

// Initialize performance optimizations
add_action('init', 'bonyan_performance_optimizations');

/**
 * Clean up database and optimize tables
 */
function bonyan_cleanup_database() {
    // Clean up expired transients
    wp_clear_scheduled_hook('wp_scheduled_delete');
    
    // Optimize database tables (run monthly)
    if (!wp_next_scheduled('bonyan_optimize_database')) {
        wp_schedule_event(time(), 'monthly', 'bonyan_optimize_database');
    }
}
add_action('init', 'bonyan_cleanup_database');

/**
 * Database optimization callback
 */
function bonyan_optimize_database_callback() {
    global $wpdb;
    
    // Get all tables
    $tables = $wpdb->get_results('SHOW TABLES', ARRAY_N);
    
    foreach ($tables as $table) {
        $table_name = $table[0];
        if (strpos($table_name, $wpdb->prefix) === 0) {
            $wpdb->query("OPTIMIZE TABLE $table_name");
        }
    }
}
add_action('bonyan_optimize_database', 'bonyan_optimize_database_callback');

/**
 * Disable problematic plugins temporarily
 */
function bonyan_disable_problematic_plugins() {
    // Check if WPML is causing issues
    if (defined('ICL_SITEPRESS_VERSION')) {
        // Temporarily disable WPML core functionality
        add_filter('wpml_current_language', '__return_false');
        add_filter('wpml_default_language', '__return_false');
    }
}
add_action('init', 'bonyan_disable_problematic_plugins');

/**
 * Add performance monitoring
 */
function bonyan_performance_monitoring() {
    if (current_user_can('administrator')) {
        // Add performance metrics to admin bar
        add_action('admin_bar_menu', function($wp_admin_bar) {
            $wp_admin_bar->add_menu(array(
                'id' => 'performance-metrics',
                'title' => 'Performance',
                'href' => '#'
            ));
            
            // Show query count and load time
            $wp_admin_bar->add_menu(array(
                'parent' => 'performance-metrics',
                'id' => 'query-count',
                'title' => 'Queries: ' . get_num_queries(),
                'href' => '#'
            ));
            
            $wp_admin_bar->add_menu(array(
                'parent' => 'performance-metrics',
                'id' => 'load-time',
                'title' => 'Load Time: ' . number_format(timer_stop(), 3) . 's',
                'href' => '#'
            ));
        }, 100);
    }
}
add_action('init', 'bonyan_performance_monitoring');

/**
 * Optimize main slider query
 */
function bonyan_optimize_slider_query($query_args) {
    // Limit slider posts to 5 maximum
    $query_args['posts_per_page'] = 5;
    
    // Disable unnecessary queries
    $query_args['no_found_rows'] = true;
    $query_args['update_post_meta_cache'] = false;
    $query_args['update_post_term_cache'] = false;
    
    return $query_args;
}
add_filter('main_slider_query_args', 'bonyan_optimize_slider_query');

/**
 * Add critical CSS inline for above-the-fold content
 */
function bonyan_critical_css() {
    if (is_page_template('home-page.php')) {
        echo '<style id="critical-css">';
        echo '.main-slider { min-height: 400px; }';
        echo '.impact-categories { padding: 2rem 0; }';
        echo '.container { max-width: 1200px; margin: 0 auto; }';
        echo '</style>';
    }
}
add_action('wp_head', 'bonyan_critical_css', 1);

/**
 * Optimize asset loading
 */
function bonyan_optimize_assets() {
    // Remove unnecessary styles and scripts
    if (!is_admin()) {
        // Remove WordPress version
        remove_action('wp_head', 'wp_generator');
        
        // Remove REST API link
        remove_action('wp_head', 'rest_output_link_wp_head');
        
        // Remove oEmbed links
        remove_action('wp_head', 'wp_oembed_add_discovery_links');
    }
}
add_action('init', 'bonyan_optimize_assets'); 