<?php

/**
 * Vacancies Datatable
 * 
 * 
 */
if (!function_exists('advanced_search_shortcode')) {
    function advanced_search_shortcode($atts)
    {

        extract(shortcode_atts(array(
            //'advanced_search_title'     => '',
        ), $atts));


        ob_start();
?>
        <?php //========[{ Enqueue Widget Style }]========//
        if (!function_exists('advanced_search_register_style')) {
            function advanced_search_register_style()
            {
        ?>
                <style>
                    <?php
                    //require_once(get_template_directory() . '/dist/css/global-datatable.min.css');
                    //require_once(get_template_directory() . "/dist/css/components/wpb/vacancies.min.css");
                    ?>
                </style>
        <?php
            }
            advanced_search_register_style();

            $posts_types = get_CPTs_with_name(['exclude' => ['main_slider', 'give_forms']]);
        } ?>
        <div class="custom-widget">
            <form action="<?php echo home_url('/'); ?>" method="GET" class="">
                <input type="text" name="s">
                <select name="post_type" id="adv-post-type" class="">
                    <option value=""><?php _e('-- Search all items --', 'bonyan'); ?></option>
                    <?php

                    foreach ($posts_types as $key => $value) {
                        echo '<option value="' . $key . '" ' . selected($post_type, $key) . '>' . $value . '</option>';
                    }

                    ?>
                </select>
                <select name="cats" id="adv-cats" class="">
                    <option value=""><?php _e('-- Search all items --', 'bonyan'); ?></option>

                </select>

                <input type="date" name="from" placeholder="<?php _e('Without specifying a specific time', 'bonyan'); ?>" id="datepicker-input" class="" autocomplete="off">

                <button type="submit" class=""><?php _e('Search', 'bonyan'); ?></button>


            </form>

        </div>

        <?php

        //========[{ Enqueue Widget script }]========//
        if (!function_exists('advanced_search_register_script')) {
            function advanced_search_register_script()
            {
        ?>

                <script>
                    <?php
                    //require_once(get_template_directory() . '/dist/js/components/wpb/vacancies.min.js');
                    ?>
                </script>
        <?php
            }
            advanced_search_register_script();
        } ?>


<?php
        return ob_get_clean();
    }
}

add_shortcode('advanced_search', 'advanced_search_shortcode');
