<?php
add_action('admin_init', 'register_cpt_archive_settings');
function register_cpt_archive_settings()
{

    $custom_post_types = get_custom_post_types();
    foreach ($custom_post_types as $cpt) {
        register_setting('cpt-archive-title-desc-group', $cpt . '_archive_title'); // new_option_name = html input name
        register_setting('cpt-archive-title-desc-group', $cpt . '_archive_description'); // new_option_name = html input name
    }
}


function cpt_archive_title_desc_page_callback()
{
    ?>

    <form method="post" class="bonyan-form" action="options.php">
        <?php
        wp_enqueue_media();

        settings_fields('cpt-archive-title-desc-group');
        do_settings_sections('cpt-archive-title-desc-group');
        $cpt_archive_titles = array();
        $cpt_archive_descriptions = array();
        // banners
        $custom_post_types = get_custom_post_types(['give_forms']);
        foreach ($custom_post_types as $cpt) {

            array_push($cpt_archive_titles, get_option($cpt . '_archive_title') ?? '');
            array_push($cpt_archive_descriptions, get_option($cpt . '_archive_description') ?? '');
        }
        ?>
        <style>
            .input-holder {
                margin-top: 10px;
                margin-left: 8px;
                min-width: 500px;
                height: 35px;
            }
        </style>
        <table class="form-table">
            <tbody>

                <?php
                $counter = 0; ?>
                <?php foreach ($custom_post_types as $cpt) { ?>
                    <!-- Banner 1 -->
                    <tr>
                        <th>
                            <?php echo ucfirst($cpt); ?> <small></small>
                        </th>
                        <td>
                            <!-- Title -->
                            <label for="<?php echo $cpt . '_archive_title' ?>"> <?php echo ucfirst($cpt); ?> Title</label>
                            <br>
                            <input type="text" name="<?php echo $cpt . '_archive_title' ?>" class="input-holder" value="<?php echo $cpt_archive_titles[$counter];
                                 ?>">
                            <br>
                            <!-- Description -->
                            <label for="<?php echo $cpt . '_archive_description' ?>"> <?php echo ucfirst($cpt); ?>
                                Description</label>
                            <br>
                            <input type="text" name="<?php echo $cpt . '_archive_description' ?>" class="input-holder" value="<?php echo $cpt_archive_descriptions[$counter];
                                 ?>">
                        </td>

                    </tr>
                    <?php
                    $counter++;
                } ?>
            </tbody>

        </table>

        <?php submit_button(); ?>
    </form>


    <?php
}