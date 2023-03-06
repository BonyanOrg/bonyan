<?php

/**
 * Tenders Table
 * tenders_datatable_title
 * 
 */
if (!function_exists('tenders_datatable_shortcode')) {
    function tenders_datatable_shortcode($atts)
    {

        extract(shortcode_atts(array(
            'tenders_datatable_title'     => '',
            // 'reports_categories'     => '',
        ), $atts));

        ob_start();
?>
        <?php //========[{ Enqueue Widget Style }]========//
        if (!function_exists('tenders_datatable_register_style')) {
            function tenders_datatable_register_style()
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
            tenders_datatable_register_style();
        } ?>

        <div class="custom-widget">
            <div class="global-header-search">
                <h2 class="bonyan-title primary-color"><?php echo $tenders_datatable_title ?></h2>

                <div class="input-holder">
                    <input type="search" class="custom-datatable-search" placeholder="Search in this page">
                </div>
            </div>

            <!-- Tenders Datatable Widget -->
            <div class="tenders-container">
                <table id="tenders-table" class="display nowrap dataTable dtr-inline collapsed" style="width: 100%;" aria-describedby="example_info">
                    <thead>
                        <tr>
                            <th><?php _e('Job', 'bonyan'); ?></th>
                            <th><?php _e('Status', 'bonyan'); ?></th>
                            <th><?php _e('Deadline', 'bonyan'); ?></th>
                            <th><?php _e('Location', 'bonyan'); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $args = array(
                            'post_type' => 'tender',
                            'post_status' => 'publish',
                            'order_by' => 'date',
                            'order' => 'DESC'

                        );
                        // if ($reports_categories != "none") {
                        //     $args['tax_query'] = array(
                        //         array(
                        //             "taxonomy" => "reports-categories",
                        //             'field'    => 'slug',
                        //             'terms'    => $terms_dropdown_values,
                        //         ),
                        //     );
                        // }
                        $tenders_posts = new WP_Query($args);
                        if ($tenders_posts->have_posts()) {
                            while ($tenders_posts->have_posts()) {
                                $tenders_posts->the_post();
                                $post = $tenders_posts->post;
                                $to_is_urgent = get_post_meta(get_the_ID(), "to_is_urgent", true);
                                $to_location = get_post_meta(get_the_ID(), "to_location", true);
                                $to_deadline = get_post_meta(get_the_ID(), "to_deadline", true);

                                // IS Active Or not 
                                $end_date = new DateTime($to_deadline);
                                $current_date = date('Y-m-d');
                                $end_date = $end_date->format('Y-m-d');
                                $is_active = $current_date <= $end_date ? 'true' : 'false';
                                // Get Result

                                $end_date = new DateTime($to_deadline);
                                $end_date = $end_date->format('d M Y '); // redesign format for front end date
                                $is_urgent = (!empty($to_is_urgent) && $to_is_urgent == "yes") ? 'true' : 'false';

                        ?>

                                <tr isactive="<?php echo $is_active ?>" isurgent="<?php echo $is_urgent  ?>">
                                    <td><a href="<?php echo get_permalink(get_the_ID()) ?>"> <?php the_title() ?>
                                            <span class="urgent">Urgent</span></a></td>
                                    <td><?php echo $is_active == "true" ? __('Active', 'bonyan') : __('Inactive', 'bonyan'); ?></td>
                                    <td><?php echo $end_date  ?></td>
                                    <td><?php echo $to_location ?></td>
                                </tr>

                        <?php

                            }
                        } ?>

                    </tbody>
                </table>
            </div>
        </div>


        <?php

        //========[{ Enqueue Widget script }]========//
        if (!function_exists('tenders_datatable_register_script')) {
            function tenders_datatable_register_script()
            {
        ?>
                <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
                <script src="https://cdn.datatables.net/responsive/2.4.0/js/dataTables.responsive.min.js"></script>
        <?php
            }
            tenders_datatable_register_script();
        } ?>

<?php
        return ob_get_clean();
    }
}

add_shortcode('tenders_datatable', 'tenders_datatable_shortcode');
