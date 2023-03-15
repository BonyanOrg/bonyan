<?php function my_custom_override_iframe_template_styles() {
    wp_enqueue_style(
        'givewp-iframes-styles',
        get_template_directory_uri() . '/dist/css/givewp-iframes-styles.css',
        /**
         *  Below, use give-sequoia-template-css to style the multi-step donation form
         *  or use give-donor-dashboards-app to style the donor dashboard
         */
        'give-sequoia-template-css'
    );
}

add_action('wp_print_styles', 'my_custom_override_iframe_template_styles', 10);
