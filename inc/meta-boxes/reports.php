<?php

// ro => Reports Options

///////////////////////////////////
// Reports Options

function Init_reports_Options($post)
{
    $ro_reports_pdf_file = get_post_meta($post->ID, "ro_reports_pdf_file", true);

?>

    <style>
        #ro_reports_pdf_file {
            width: 350px;
            margin-left: 30px;
        }
    </style>

    <table class="ro_table">
        <tbody>

            <!-- PDF File -->
            <tr class="form-field">

                <?php

                global $post;
                $post_id = $post->ID;


                $args = array(
                    'post_type'     => 'attachment',
                    'numberposts'   => -1,
                    'post_mime_type' => 'application/pdf',
                    'fields' => 'ids',
                );
                $attachments = get_posts($args);

                $ro_reports_pdf_file =  !empty(get_post_meta($post_id, 'ro_reports_pdf_file', true)) ? get_post_meta($post_id, 'ro_reports_pdf_file', true) : '';

                ?>
                <div class="inputs-holder" style="display: flex; flex-wrap: wrap; gap: 0 15px">
                    <label for="" style="flex: 0 1 auto; width: 32%;">
                        <b><?php _e('Choose The Document', 'bonyan') ?></b>
                        <select name="ro_reports_pdf_file" style="width:100%; margin:5px 0;">
                            <option value=""><?php _e('-- Choose a Document --', 'bonyan') ?></option>
                            <?php foreach ($attachments as $attachment) { ?>
                                <option value="<?php echo $attachment; ?>" <?php echo $ro_reports_pdf_file == $attachment ? 'selected' : ''; ?>><?php echo get_the_title($attachment); ?></option>
                            <?php } ?>
                        </select>
                    </label>
                </div>
            </tr>

        </tbody>
    </table>

<?php
}

/////////////////////////
// Add Meta Box To CPT
add_action('admin_init', 'add_reports_options');
function add_reports_options()
{
    add_meta_box(
        'reports-options',
        "Reports options",
        'Init_reports_Options',
        "reports",
        'normal',
        'default',
        null
    );
}

////////////////////////
// Save Value When Save
function save_reports_options($post_id)
{
    if (!empty($_POST['ro_reports_pdf_file']))
        update_post_meta($post_id, 'ro_reports_pdf_file', $_POST['ro_reports_pdf_file']);
}
add_action('save_post', 'save_reports_options', 10, 2);
