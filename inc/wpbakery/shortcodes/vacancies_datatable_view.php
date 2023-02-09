<?php

/**
 * Vacancies Datatable
 * 
 * 
 */
if (!function_exists('vacancies_datatable_shortcode')) {
    function vacancies_datatable_shortcode($atts)
    {



        ob_start();
?>
        <?php //========[{ Enqueue Widget Style }]========//
        if (!function_exists('vacancies_datatable_register_style')) {
            function vacancies_datatable_register_style()
            {
        ?>
                <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
                <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.0/css/responsive.dataTables.min.css">
        <?php
            }
            vacancies_datatable_register_style();
        } ?>

        <div class="about-us-datatable custom-widget">
            <h2 class="bonyan-title primary-title"><?php _e('Vacancies', 'bonyan'); ?></h2>

            <div class="colors-index my-2">
                <div class="color-index-item active-color">
                    <div class="color-box"></div>
                    <span><?php _e('Active', 'bonyan') ?> </span>
                </div>

                <div class="color-index-item inactive-color">
                    <div class="color-box"></div>
                    <span> <?php _e('Inactive', 'bonyan') ?> </span>
                </div>
            </div>

            <table id="vacancies-table" class="display nowrap dataTable dtr-inline collapsed" style="width: 100%;" aria-describedby="example_info">
                <thead>
                    <tr>
                        <th><?php _e('Requisition Tittle', 'bonyan'); ?></th>
                        <th><?php _e('Requisition Number', 'bonyan'); ?></th>
                        <th><?php _e('Job Location', 'bonyan'); ?></th>
                        <th><?php _e('Nature Of Working', 'bonyan'); ?></th>
                        <th><?php _e('Required <br> Number', 'bonyan'); ?></th>
                        <th><?php _e('Gender', 'bonyan'); ?></th>
                        <th><?php _e('Type Of Contract', 'bonyan'); ?></th>
                        <th><?php _e('Start Date', 'bonyan'); ?></th>
                        <th><?php _e('Submission End Date', 'bonyan'); ?></th>
                        <th><?php _e('Submission Button', 'bonyan'); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $args = array(
                        'post_type' => 'vacancy',
                        'post_status' => 'publish',
                        'suppress_filters' => 0,

                    );
                    $vacancies_posts = new WP_Query($args);
                    if ($vacancies_posts->have_posts()) {
                        while ($vacancies_posts->have_posts()) {
                            $vacancies_posts->the_post();
                            $vd_requisition_number = get_post_meta(get_the_ID(), "vd_requisition_number", true);
                            $vd_job_location = get_post_meta(get_the_ID(), "vd_job_location", true);
                            $vd_nature_of_working = get_post_meta(get_the_ID(), "vd_nature_of_working", true);
                            $vd_required_number = get_post_meta(get_the_ID(), "vd_required_number", true);
                            $vd_gender = get_post_meta(get_the_ID(), "vd_gender", true);
                            $vd_type_of_contract = get_post_meta(get_the_ID(), "vd_type_of_contract", true);
                            $vd_start_date = get_post_meta(get_the_ID(), "vd_start_date", true);
                            $vd_submission_end_date = get_post_meta(get_the_ID(), "vd_submission_end_date", true);

                            $current_date = date('Y-m-d');
                            $end_date = new DateTime($vd_submission_end_date);
                            $end_date = $end_date->format('Y-m-d');
                            $is_active = $current_date <= $end_date ? true : false;

                    ?>
                            <tr <?php echo $is_active ? 'data-status="active"' : ''; ?>>
                                <td><a href="<?php echo get_permalink(get_the_ID()) ?>" class="link-in-table"> <?php the_title() ?> </a></td>
                                <td> <?php echo $vd_requisition_number ?> </td>
                                <td> <?php echo $vd_job_location ?> </td>
                                <td> <?php echo $vd_nature_of_working ?> </td>
                                <td> <?php echo $vd_required_number ?> </td>
                                <td> <?php echo $vd_gender ?> </td>
                                <td> <?php echo $vd_type_of_contract ?> </td>
                                <td> <?php echo $vd_start_date ?> </td>
                                <td> <?php echo $vd_submission_end_date ?> </td>
                                <td> <a href="<?php echo get_permalink(get_the_ID()) ?>" class="link-in-table link-as-btn ms-3 ms-md-0"> <?php _e('Submission', 'bonyan'); ?> </a> </td>
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
