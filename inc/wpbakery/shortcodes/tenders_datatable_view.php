<?php

/**
 * Tenders Table
 * 
 * 
 */
if (!function_exists('tenders_datatable_shortcode')) {
    function tenders_datatable_shortcode($atts)
    {

        ob_start();
?>
        <?php //========[{ Enqueue Widget Style }]========//
        if (!function_exists('tenders_datatable_register_style')) {
            function tenders_datatable_register_style()
            {
        ?>
                <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
                <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.0/css/responsive.dataTables.min.css">
        <?php
            }
            tenders_datatable_register_style();
        } ?>

        <div class="about-us-datatable custom-widget">
            <h2 class="sema-title primary-title"><?php _e('Tenders', 'sema'); ?></h2>

            <div class="colors-index my-2">
                <div class="color-index-item active-color">
                    <div class="color-box"></div>
                    <span><?php _e('Active', 'sema') ?> </span>
                </div>

                <div class="color-index-item inactive-color">
                    <div class="color-box"></div>
                    <span> <?php _e('Inactive', 'sema') ?> </span>
                </div>
            </div>

            <table id="tenders-table" class="display nowrap dataTable dtr-inline collapsed" style="width: 100%;" aria-describedby="example_info">
                <thead>
                    <tr>
                        <th><?php _e('Posted', 'sema'); ?></th>
                        <th><?php _e('Title', 'sema'); ?></th>
                        <th><?php _e('Status', 'sema'); ?></th>
                        <th><?php _e('Location', 'sema'); ?></th>
                        <th><?php _e('Deadline', 'sema'); ?></th>
                        <th><?php _e('Unit', 'sema'); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $args = array(
                        'post_type' => 'tender',
                        'post_status' => 'publish',

                    );
                    $tenders_posts = new WP_Query($args);
                    if ($tenders_posts->have_posts()) {
                        while ($tenders_posts->have_posts()) {
                            $tenders_posts->the_post();
                            $post = $tenders_posts->post;
                            $to_status = get_post_meta(get_the_ID(), "to_status", true);
                            $to_location = get_post_meta(get_the_ID(), "to_location", true);
                            $to_deadline = get_post_meta(get_the_ID(), "to_deadline", true);
                            $to_unit = get_post_meta(get_the_ID(), "to_unit", true);

                            $end_date = new DateTime($to_deadline);
                            $end_date = $end_date->format('Y-m-d');

                            $create_data = new DateTime($post->post_date);
                            $create_data = $create_data->format('Y-m-d');
                    ?>
                            <tr>
                                <td> <?php echo $create_data ?> </td>
                                <td><a href="<?php echo get_permalink(get_the_ID()) ?>" class="link-in-table"> <?php the_title() ?> </a></td>
                                <td> <?php echo $to_status ?> </td>
                                <td> <?php echo $to_location ?> </td>
                                <td> <?php echo $end_date ?> </td>
                                <td> <?php echo $to_unit ?> </td>
                            </tr>
                    <?php
                        }
                    }

                    ?>
                </tbody>
            </table>
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
