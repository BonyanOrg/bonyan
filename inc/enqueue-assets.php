<?php

$bonyan_version = wp_get_theme()->get('Version');
function bonyan_scripts()
{

    /* =====[START Enqueue GLOBAL Assets]===== */
    // __Styles__

    // Bootstrap Style
    wp_enqueue_style('bonyan-bootstrap-style', get_template_directory_uri() . "/dist/css/bootstrap.min.css", array(), $GLOBALS['bonyan_version']);

    // Roboto Font Family
    wp_enqueue_style('bonyan-en-font', 'https://fonts.googleapis.com/css2?family=Cairo:wght@800;900&family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet', array());

    // Fontawesome Style
    wp_enqueue_style('bonyan-fontawesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css', array());
    //wp_enqueue_style('bonyan-fontawesome', get_template_directory_uri() . "/dist/css/cdn/all.min.css", array());

    // Toastr Style
    // wp_enqueue_style('bonyan-toastr', 'https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css', array());
    wp_enqueue_style('bonyan-toastr', get_template_directory_uri() . "/dist/css/cdn/toastr.min.css", array());

    // Sweet Alert Style
    // wp_enqueue_style('bonyan-toastr', 'https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css', array());
    wp_enqueue_style('bonyan-sweet-alert-css', get_template_directory_uri() . "/dist/css/cdn/sweetalert2.min.css", array());



    // Bonyan Style
    wp_enqueue_style('bonyan-style', get_template_directory_uri() . "/dist/css/style.min.css", array('bonyan-bootstrap-style'), $GLOBALS['bonyan_version']);


    // Blog Card Style 
    wp_enqueue_style('bonyan-blog-card-style', get_template_directory_uri() . "/dist/css/components/blog-card.min.css", array('bonyan-bootstrap-style'), $GLOBALS['bonyan_version']);


    // __Scripts__
    wp_enqueue_script('bonyan-toastr-script', get_template_directory_uri() . "/dist/js/cdn/toastr.min.js", array('jquery'), false, true);
    wp_enqueue_script('bonyan-sweet-alert-script', get_template_directory_uri() . "/dist/js/cdn/sweetalert2.min.js", array(), false, true);
    wp_enqueue_script('bonyan-script', get_template_directory_uri() . '/dist/js/scripts.min.js', array(), $GLOBALS['bonyan_version'], true);


    // Inject JS to GiveWP iFrame
    wp_enqueue_script('injected-givewp-script', get_template_directory_uri() . '/dist/js/givewp-iframes-scripts.js', array(), $GLOBALS['bonyan_version'], true);

    // __Ajax__
    wp_enqueue_script('ajax-scripts', get_template_directory_uri() . '/assets/js/ajax-scripts.js', array('jquery', 'bonyan-script'), $GLOBALS['bonyan_version'], true);
    wp_localize_script('ajax-scripts', 'ajax_script_object', array(
        'ajaxurl' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('ajax-nonce'),
        'user_id' => is_user_logged_in() ? get_current_user_id() : '',
    ));
    /* =====[End Enqueue GLOBAL Assets]===== */

    /* =====[Enqueue Reports Assets]===== */
    if (is_post_type_archive('reports') || is_tax('reports-categories')) {
        // __Styles__ 
        wp_enqueue_style('bonyan-file-card-style', get_template_directory_uri() . "/dist/css/components/wpb/file-card.min.css", array('bonyan-bootstrap-style'), $GLOBALS['bonyan_version']);
    }
    /* =====[End Enqueue Reports Assets]===== */

    /* =====[Enqueue Projects Assets]===== */
    if (is_post_type_archive('projects') || is_tax('projects-categories')) {
        // __Styles__ 
        wp_enqueue_style('bonyan-project-card-style', get_template_directory_uri() . "/dist/css/components/wpb/project-card.min.css", array('bonyan-bootstrap-style'), $GLOBALS['bonyan_version']);
    }
    /* =====[End Enqueue Projects Assets]===== */

    /* =====[Enqueue Campaign Assets]===== */
    if (is_post_type_archive('campaign') || is_tax('campaigns-categories')) {

        // __CDN__
        load_swiper_style('enqueue_action');
        load_swiper_script('enqueue_action');


        // __Styles__ 
        wp_enqueue_style('bonyan-primary-carousel-style', get_template_directory_uri() . "/dist/css/components/wpb/primary-carousel.min.css", array('bonyan-bootstrap-style'), $GLOBALS['bonyan_version']);

        // __Scripts__
        wp_enqueue_script('bonyan-primary-carousel-script', get_template_directory_uri() . '/dist/js/components/wpb/primary-carousel.min.js', array('bonyan-swiper-carousel-script'), $GLOBALS['bonyan_version'], true);
    }
    if (is_singular('campaign')) {
        // __Styles__ 
        wp_enqueue_style('bonyan-top-donation-stats-style', get_template_directory_uri() . "/dist/css/components/top-donation-stats.min.css", array('bonyan-bootstrap-style'), $GLOBALS['bonyan_version']);
    }
    /* =====[End Enqueue Campaign Assets]===== */

    /* =====[Enqueue Dashboard Assets]===== */
    if (is_page_template('dashboard-page.php')) {
        // __CDN__
        wp_enqueue_style('bonyan-datatable-css', get_template_directory_uri() . "/dist/css/cdn/jquery.dataTables.min.css", array());
        wp_enqueue_style('bonyan-datatable-responsive-css', get_template_directory_uri() . "/dist/css/cdn/responsive.dataTables.min.css", array());

        wp_enqueue_script('bonyan-datatable-js', get_template_directory_uri() . "/dist/js/cdn/jquery.dataTables.min.js", array(), false, true);
        wp_enqueue_script('bonyan-datatable-responsive-js', get_template_directory_uri() . "/dist/js/cdn/dataTables.responsive.min.js", array(), false, true);

        // __Styles__ 
        wp_enqueue_style('bonyan-dashboard-style', get_template_directory_uri() . "/dist/css/dashboard.min.css", array(), $GLOBALS['bonyan_version']);
        wp_enqueue_style('bonyan-global-datatable-style', get_template_directory_uri() . "/dist/css/global-datatable.min.css", array('bonyan-datatable-css', 'bonyan-datatable-responsive-css'), $GLOBALS['bonyan_version']);

        // __Scripts__
        wp_enqueue_script('bonyan-dashboard-script', get_template_directory_uri() . '/dist/js/dashboard.min.js', array('jquery'), $GLOBALS['bonyan_version'], true);
    }
    /* =====[End Enqueue Dashboard Assets]===== */



    /* =====[Enqueue Home Page Assets]===== */
    if (is_page_template('home-page.php')) {
        // __CDN__
        load_swiper_style('enqueue_action');
        load_swiper_script('enqueue_action');

        // __Styles__ 
        wp_enqueue_style('bonyan-home-style', get_template_directory_uri() . "/dist/css/home.min.css", array('bonyan-bootstrap-style', 'bonyan-swiper-carousel-style'), $GLOBALS['bonyan_version']);

        wp_enqueue_script('bonyan-home-sliders-script', get_template_directory_uri() . '/dist/js/home-sliders.min.js', array('bonyan-swiper-carousel-script'), $GLOBALS['bonyan_version'], true);
    }
    /* =====[End Enqueue Home Page Assets]===== */


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

function load_swiper_style($type)
{
    global $load_swiper_style;
    $load_swiper_style = true;
    if ($type == 'enqueue_action') {
        // __CDN__
        wp_enqueue_style('bonyan-swiper-carousel-style',  get_template_directory_uri() . "/dist/css/cdn/swiper-bundle.min.css", array());
        wp_enqueue_script('bonyan-swiper-carousel-script', get_template_directory_uri() . "/dist/js/cdn/swiper-bundle.min.js", array(), false, true);
    }
    if ($type == 'wp_bakery') {
        echo '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.4.5/swiper-bundle.min.css">';
    }
}

function load_swiper_script($type)
{
    global $load_swiper_script;
    $load_swiper_script = true;
    if ($type == 'enqueue_action') {
        // __CDN__
        wp_enqueue_script('bonyan-swiper-carousel-script', get_template_directory_uri() . "/dist/js/cdn/swiper-bundle.min.js", array(), false, true);
    }
    if ($type == 'wp_bakery') {
        echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.4.5/swiper-bundle.min.js"></script>';
    }
}

