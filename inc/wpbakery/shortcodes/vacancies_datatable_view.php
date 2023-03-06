<?php

/**
 * Vacancies Datatable
 * 
 * 
 */
if (!function_exists('vacancies_datatable_shortcode')) {
    function vacancies_datatable_shortcode($atts)
    {

        extract(shortcode_atts(array(
            'vacancies_datatable_title'     => '',
        ), $atts));


        ob_start();
?>
        <?php //========[{ Enqueue Widget Style }]========//
        if (!function_exists('vacancies_datatable_register_style')) {
            function vacancies_datatable_register_style()
            {
        ?>
                <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
                <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.0/css/responsive.dataTables.min.css">
                <style>
                    <?php
                    require_once(get_template_directory() . '/dist/css/global-datatable.min.css');
                    ?>
                </style>
        <?php
            }
            vacancies_datatable_register_style();
        } ?>
        <div class="container custom-widget">
            <div class="global-header-search">
                <h2 class="bonyan-title primary-color"><?php echo $vacancies_datatable_title ?></h2>

                <div class="input-holder">
                    <input type="search" class="custom-datatable-search" placeholder="Search in this page">
                </div>
            </div>
            <!-- Vacancies Datatable Widget -->
            <div class="vacancies-container">
                <table id="vacancies-table" class="display nowrap dataTable dtr-inline collapsed" style="width: 100%;" aria-describedby="example_info">
                    <thead>
                        <tr>
                            <th><?php _e('Job', 'bonyan'); ?></th>
                            <th><?php _e('Status', 'bonyan'); ?></th>
                            <th><?php _e('Deadline', 'bonyan'); ?></th>
                            <th><?php _e('Department', 'bonyan'); ?></th>
                            <th><?php _e('Location', 'bonyan'); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $args = array(
                            'post_type' => 'vacancy',
                            'post_status' => 'publish',
                            'order_by' => 'date',
                            'order' => 'DESC',
                            'suppress_filters' => 0,

                        );
                        $vacancies_posts = new WP_Query($args);
                        if ($vacancies_posts->have_posts()) {
                            while ($vacancies_posts->have_posts()) {
                                $vacancies_posts->the_post();
                                $vd_is_urgent = get_post_meta(get_the_ID(), "vd_is_urgent", true);
                                $vd_location = get_post_meta(get_the_ID(), "vd_location", true);
                                $vd_deadline = get_post_meta(get_the_ID(), "vd_deadline", true);
                                $vd_department = get_post_meta(get_the_ID(), "vd_department", true);

                                // IS Active Or not 
                                $end_date = new DateTime($vd_deadline);
                                $current_date = date('Y-m-d');
                                $end_date = $end_date->format('Y-m-d');
                                $is_active = $current_date <= $end_date ? 'true' : 'false';
                                // Get Result
                                $end_date = new DateTime($vd_deadline);
                                $end_date = $end_date->format('d M Y '); // redesign format for front end date

                                $is_urgent = (!empty($vd_is_urgent) && $vd_is_urgent == "yes") ? 'true' : 'false';
                        ?>
                                <tr isactive="<?php echo $is_active ?>" isurgent="<?php echo $is_urgent  ?>">
                                    <td><a href="<?php echo get_permalink(get_the_ID()) ?>"> <?php the_title() ?><span class="urgent">Urgent</span></a></td>
                                    <td><?php echo $is_active == "true" ? __('Active', 'bonyan') : __('Inactive', 'bonyan'); ?></td>
                                    <td><?php echo $end_date ?></td>
                                    <td><?php echo $vd_department ?></td>
                                    <td><?php echo $vd_location ?></td>
                                </tr>
                        <?php }
                        } ?>
                    </tbody>
                </table>
            </div>
        </div>

        <?php

        //========[{ Enqueue Widget script }]========//
        if (!function_exists('vacancies_datatable_register_script')) {
            function vacancies_datatable_register_script()
            {
        ?>
                <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
                <script src="https://cdn.datatables.net/responsive/2.4.0/js/dataTables.responsive.min.js"></script>
        <?php
            }
            vacancies_datatable_register_script();
        } ?>


<?php
        return ob_get_clean();
    }
}

add_shortcode('vacancies_datatable', 'vacancies_datatable_shortcode');
