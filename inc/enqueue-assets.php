<?php

$bonyan_version = wp_get_theme()->get('Version');
function bonyan_scripts()
{

    /* =====[START Enqueue GLOBAL Assets]===== */
    // __Styles__
    wp_enqueue_style('bonyan-bootstrap', get_template_directory_uri() . "/dist/css/bootstrap.min.css", array(), $GLOBALS['bonyan_version']);
    wp_enqueue_style('bonyan-swiper-carousel-style', 'https://cdnjs.cloudflare.com/ajax/libs/Swiper/9.0.4/swiper-bundle.min.css', array());
    wp_enqueue_style('bonyan-en-font', 'https://fonts.googleapis.com/css2?family=Cairo:wght@800;900&family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet', array());
    wp_enqueue_style('bonyan-fontawesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css', array());
    wp_enqueue_style('bonyan-toastr', 'https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css', array());
    wp_enqueue_style('bonyan-style', get_template_directory_uri() . "/dist/css/style.min.css", array('bonyan-bootstrap'), $GLOBALS['bonyan_version']);
    wp_enqueue_style('bonyan-home-style', get_template_directory_uri() . "/dist/css/home.min.css", array('bonyan-bootstrap', 'bonyan-swiper-carousel-style'), $GLOBALS['bonyan_version']);

    // WPB
    wp_enqueue_style('bonyan-quick-donation-style', get_template_directory_uri() . "/dist/css/components/wpb/quick-donation.min.css", array('bonyan-bootstrap'), $GLOBALS['bonyan_version']);

    wp_enqueue_style('bonyan-primary-carousel-style', get_template_directory_uri() . "/dist/css/components/wpb/primary-carousel.min.css", array('bonyan-bootstrap'), $GLOBALS['bonyan_version']);

    wp_enqueue_style('bonyan-project-card-style', get_template_directory_uri() . "/dist/css/components/wpb/project-card.min.css", array('bonyan-bootstrap'), $GLOBALS['bonyan_version']);

    wp_enqueue_style('bonyan-contact-info-style', get_template_directory_uri() . "/dist/css/components/wpb/contact-info.min.css", array('bonyan-bootstrap'), $GLOBALS['bonyan_version']);

    // __Scripts__
    wp_enqueue_script('bonyan-toastr-script', 'https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js', array('jquery'), false, true);

    // __Ajax__
    wp_enqueue_script('ajax-scripts', get_template_directory_uri() . '/assets/js/ajax-scripts.js', array('jquery'), $GLOBALS['bonyan_version'], true);
    wp_localize_script('ajax-scripts', 'ajax_script_object', array(
        'ajaxurl' => admin_url('admin-ajax.php'),
    ));

    // Used in: [Home page]
    wp_enqueue_script('bonyan-swiper-carousel-script', 'https://cdnjs.cloudflare.com/ajax/libs/Swiper/9.0.4/swiper-bundle.min.js', array(), false, true);
    
    wp_enqueue_script('bonyan-script', get_template_directory_uri() . '/dist/js/scripts.min.js', array(), $GLOBALS['bonyan_version'], true);
    wp_enqueue_script('bonyan-home-sliders-script', get_template_directory_uri() . '/dist/js/home-sliders.min.js', array('bonyan-swiper-carousel-script'), $GLOBALS['bonyan_version'], true);   
    wp_enqueue_script('bonyan-quick-donation-script', get_template_directory_uri() . '/dist/js/components/wpb/quick-donation.min.js', array(), $GLOBALS['bonyan_version'], true);
    wp_enqueue_script('bonyan-primary-carousel-script', get_template_directory_uri() . '/dist/js/components/wpb/primary-carousel.min.js', array('bonyan-swiper-carousel-script'), $GLOBALS['bonyan_version'], true);
    /* =====[End Enqueue GLOBAL Assets]===== */

    // Underscore Scripts
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }

    $style_sheets_will_support_rtl = ['bonyan-style', 'bonyan-bootstrap-css'];
    support_rtl($style_sheets_will_support_rtl);
}

add_action('wp_enqueue_scripts', 'bonyan_scripts');

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
