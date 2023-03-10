<?php

$bonyan_version = wp_get_theme()->get('Version');
function bonyan_scripts()
{

    /* =====[START Enqueue GLOBAL Assets]===== */
    // __Styles__

    // Bootstrap Style
    wp_enqueue_style('bonyan-bootstrap-style', get_template_directory_uri() . "/dist/css/bootstrap.min.css", array(), $GLOBALS['bonyan_version']);

    // Swiper Style
    wp_enqueue_style('bonyan-swiper-carousel-style', 'https://cdnjs.cloudflare.com/ajax/libs/Swiper/9.0.4/swiper-bundle.min.css', array());

    // Roboto Font Family
    wp_enqueue_style('bonyan-en-font', 'https://fonts.googleapis.com/css2?family=Cairo:wght@800;900&family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet', array());

    // Fontawesome Style
    wp_enqueue_style('bonyan-fontawesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css', array());

    // Toastr Style
    wp_enqueue_style('bonyan-toastr', 'https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css', array());

    // Datatable Style
    wp_enqueue_style('bonyan-datatable-css', 'https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css', array());
    wp_enqueue_style('bonyan-datatable-responsive-css', 'https://cdn.datatables.net/responsive/2.4.0/css/responsive.dataTables.min.css', array());

    // Global Datatable custom style
    wp_enqueue_style('bonyan-global-datatable-style', get_template_directory_uri() . "/dist/css/global-datatable.min.css", array('bonyan-datatable-css', 'bonyan-datatable-responsive-css'), $GLOBALS['bonyan_version']);

    // Bonyan Style
    wp_enqueue_style('bonyan-style', get_template_directory_uri() . "/dist/css/style.min.css", array('bonyan-bootstrap-style'), $GLOBALS['bonyan_version']);

    // Bonyan Home Style
    wp_enqueue_style('bonyan-home-style', get_template_directory_uri() . "/dist/css/home.min.css", array('bonyan-bootstrap-style', 'bonyan-swiper-carousel-style'), $GLOBALS['bonyan_version']);

    // Dashboard Style
    wp_enqueue_style('bonyan-dashboard-style', get_template_directory_uri() . "/dist/css/dashboard.min.css", array(), $GLOBALS['bonyan_version']);

    // __WPB STYLE__
    wp_enqueue_style('bonyan-quick-donation-style', get_template_directory_uri() . "/dist/css/components/wpb/quick-donation.min.css", array('bonyan-bootstrap-style'), $GLOBALS['bonyan_version']);

    // Primary Carouse
    wp_enqueue_style('bonyan-primary-carousel-style', get_template_directory_uri() . "/dist/css/components/wpb/primary-carousel.min.css", array('bonyan-bootstrap-style'), $GLOBALS['bonyan_version']);

    // Project Card 
    wp_enqueue_style('bonyan-project-card-style', get_template_directory_uri() . "/dist/css/components/wpb/project-card.min.css", array('bonyan-bootstrap-style'), $GLOBALS['bonyan_version']);

    // Contact Info Style
    wp_enqueue_style('bonyan-contact-info-style', get_template_directory_uri() . "/dist/css/components/wpb/contact-info.min.css", array('bonyan-bootstrap-style'), $GLOBALS['bonyan_version']);

    // Vacancies Style
    wp_enqueue_style('bonyan-vacancies-style', get_template_directory_uri() . "/dist/css/components/wpb/vacancies.min.css", array('bonyan-bootstrap-style'), $GLOBALS['bonyan_version']);

    // Tenders Style
    wp_enqueue_style('bonyan-tenders-style', get_template_directory_uri() . "/dist/css/components/wpb/tenders.min.css", array('bonyan-bootstrap-style'), $GLOBALS['bonyan_version']);

    // Icon Title Description Style
    wp_enqueue_style('bonyan-icon-title-desc-style', get_template_directory_uri() . "/dist/css/components/wpb/icon-title-desc.min.css", array('bonyan-bootstrap-style'), $GLOBALS['bonyan_version']);

    // Background Title Description Style
    wp_enqueue_style('bonyan-bg-title-desc-style', get_template_directory_uri() . "/dist/css/components/wpb/bg-title-desc.min.css", array('bonyan-bootstrap-style'), $GLOBALS['bonyan_version']);

    // Locations Style
    wp_enqueue_style('bonyan-locations-style', get_template_directory_uri() . "/dist/css/components/wpb/locations.min.css", array('bonyan-bootstrap-style'), $GLOBALS['bonyan_version']);

    // File Card Style
    wp_enqueue_style('bonyan-file-card-style', get_template_directory_uri() . "/dist/css/components/wpb/file-card.min.css", array('bonyan-bootstrap-style'), $GLOBALS['bonyan_version']);

    // Program Stats Style
    wp_enqueue_style('bonyan-program-stats-style', get_template_directory_uri() . "/dist/css/components/wpb/program-stats.min.css", array('bonyan-bootstrap-style'), $GLOBALS['bonyan_version']);

    // Banner Style
    wp_enqueue_style('bonyan-banner-style', get_template_directory_uri() . "/dist/css/components/wpb/banner.min.css", array('bonyan-bootstrap-style'), $GLOBALS['bonyan_version']);

    // Success Story Card Style
    wp_enqueue_style('bonyan-success-story-card-style', get_template_directory_uri() . "/dist/css/components/wpb/success-story-card.min.css", array('bonyan-bootstrap-style'), $GLOBALS['bonyan_version']);

    // Blog Card Style
    wp_enqueue_style('bonyan-blog-card-style', get_template_directory_uri() . "/dist/css/components/blog-card.min.css", array('bonyan-bootstrap-style'), $GLOBALS['bonyan_version']);

    // Top Donation Stats Style
    wp_enqueue_style('bonyan-top-donation-stats-style', get_template_directory_uri() . "/dist/css/components/top-donation-stats.min.css", array('bonyan-bootstrap-style'), $GLOBALS['bonyan_version']);

    // Trustee Card Style
    wp_enqueue_style('bonyan-trustee-card-style', get_template_directory_uri() . "/dist/css/components/wpb/trustee-card.min.css", array('bonyan-bootstrap-style'), $GLOBALS['bonyan_version']);

    // __Scripts__
    wp_enqueue_script('bonyan-toastr-script', 'https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js', array('jquery'), false, true);

    // Datatable Scripts 
    wp_enqueue_script('bonyan-datatable-js', 'https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js', array(), false, true);
    wp_enqueue_script('bonyan-datatable-responsive-js', 'https://cdn.datatables.net/responsive/2.4.0/js/dataTables.responsive.min.js', array(), false, true);

    // Used in: [Home page]
    wp_enqueue_script('bonyan-swiper-carousel-script', 'https://cdnjs.cloudflare.com/ajax/libs/Swiper/9.0.4/swiper-bundle.min.js', array(), false, true);

    wp_enqueue_script('bonyan-script', get_template_directory_uri() . '/dist/js/scripts.min.js', array(), $GLOBALS['bonyan_version'], true);

    wp_enqueue_script('bonyan-dashboard-script', get_template_directory_uri() . '/dist/js/dashboard.min.js', array('jquery'), $GLOBALS['bonyan_version'], true);


    // Home sliders
    wp_enqueue_script('bonyan-home-sliders-script', get_template_directory_uri() . '/dist/js/home-sliders.min.js', array('bonyan-swiper-carousel-script'), $GLOBALS['bonyan_version'], true);

    // Quick Donation
    wp_enqueue_script('bonyan-quick-donation-script', get_template_directory_uri() . '/dist/js/components/wpb/quick-donation.min.js', array(), $GLOBALS['bonyan_version'], true);

    // Primary Carousel
    wp_enqueue_script('bonyan-primary-carousel-script', get_template_directory_uri() . '/dist/js/components/wpb/primary-carousel.min.js', array('bonyan-swiper-carousel-script'), $GLOBALS['bonyan_version'], true);

    // Vacancies
    wp_enqueue_script('bonyan-vacancies-script', get_template_directory_uri() . '/dist/js/components/wpb/vacancies.min.js', array('jquery'), $GLOBALS['bonyan_version'], true);

    // Tenders
    wp_enqueue_script('bonyan-tenders-script', get_template_directory_uri() . '/dist/js/components/wpb/tenders.min.js', array('jquery'), $GLOBALS['bonyan_version'], true);

    // Tenders
    wp_enqueue_script('bonyan-success-story-carousel-script', get_template_directory_uri() . '/dist/js/components/wpb/success-story-carousel.min.js', array('jquery'), $GLOBALS['bonyan_version'], true);

    // __Ajax__
    wp_enqueue_script('ajax-scripts', get_template_directory_uri() . '/assets/js/ajax-scripts.js', array('jquery', 'bonyan-script'), $GLOBALS['bonyan_version'], true);
    wp_localize_script('ajax-scripts', 'ajax_script_object', array(
        'ajaxurl' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('ajax-nonce'),
        'user_id' => is_user_logged_in() ? get_current_user_id() : '',
    ));
    /* =====[End Enqueue GLOBAL Assets]===== */

    // Underscore Scripts
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }

    $style_sheets_will_support_rtl = ['bonyan-style', 'bonyan-bootstrap-style'];
    support_rtl($style_sheets_will_support_rtl);
}

add_action('wp_enqueue_scripts', 'bonyan_scripts');

function load_admin_dashboard_assets()
{
    wp_enqueue_style('select2-css', get_stylesheet_directory_uri() . '/dist/css/select2.min.css', '', true);
    wp_enqueue_script('select2-js', get_stylesheet_directory_uri() . '/dist/js/select2.min.js', array('jquery'), '', true);
}
add_action('admin_enqueue_scripts', 'load_admin_dashboard_assets');

/**
 * Add RTL support to stylesheets
 *
 * @param array $styles_ids
 * @return void
 */
function support_rtl($styles_ids)
{
    foreach ($styles_ids as $style_id) :
        wp_style_add_data($style_id, 'rtl', 'replace');
        wp_style_add_data($style_id, 'suffix', '.min');
    endforeach;
}
