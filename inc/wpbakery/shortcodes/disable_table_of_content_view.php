<?php

/**
 * Header Title
 * 
 * disable_table_of_content_text
 * disable_table_of_content_btn_link
 * 
 */
if (!function_exists('disable_table_of_content_shortcode')) {
    function disable_table_of_content_shortcode($atts)
    {



        ob_start();
?>
        <p style="display:none;">nnoo__TABLE_OF_CONTENT__ooff</p>
<?php
        return ob_get_clean();
    }
}

add_shortcode('disable_table_of_content', 'disable_table_of_content_shortcode');
