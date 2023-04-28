<?php
add_action('admin_init', 'register_site_settings');
function register_site_settings()
{

    $custom_post_types = get_custom_post_types();
    foreach ($custom_post_types as $cpt) {
        register_setting('cpt-cover-image-group', $cpt . 'header_cover_image'); // new_option_name = html input name
    }
    register_setting('cpt-cover-image-group', 'reports_archive_page_desc'); // new_option_name = html input name
}


function theme_settings_render()
{
?>
    <style>
        .attach-holder {
            display: flex;
            width: 200px;
            height: 100px;
            background: #fff;
            overflow: hidden;
            border: 2px solid #007cba;
            justify-content: center;
            align-items: center;
            padding: 3px;
            border-radius: 3px;
            margin: 5px 3px;
        }

        .attach-holder img {
            width: 100%;
            height: 100%;
        }

        .reset-input {
            color: #ce0000;
            cursor: pointer;
        }

        .form-table th {
            min-width: 230px;
            max-width: 100%;
        }
    </style>
    <form method="post" class="bonyan-form" action="options.php">
        <?php
        wp_enqueue_media();

        settings_fields('cpt-cover-image-group');
        do_settings_sections('cpt-cover-image-group');
        $cpt_header_cover_image = array();
        // banners
        $custom_post_types = get_custom_post_types(['give_forms']);
        foreach ($custom_post_types as $cpt) {

            array_push($cpt_header_cover_image, get_option($cpt . 'header_cover_image') ?? '');
        }
        ?>
        <table class="form-table">
            <?php
            $counter = 0; ?>
            <?php foreach ($custom_post_types as $cpt) { ?>
                <!-- Banner 1 -->
                <tr>
                    <th>
                        <span class="dashicons dashicons-trash reset-input"></span> <?php echo $cpt; ?> <small>Header Image</small>
                    </th>
                    <td>
                        <input type="hidden" name="<?php echo $cpt . 'header_cover_image' ?>" class="cpt_header_image_cover" value="<?php echo $cpt_header_cover_image[$counter];
                                                                                                                                    ?>">
                        <div style="display: flex; align-items: center;flex-wrap: wrap;" class="attachment-s-preview">
                            <?php if ($cpt_header_cover_image[$counter] != "") { ?>
                                <div class="attach-holder">
                                    <img src="<?php echo wp_get_attachment_url($cpt_header_cover_image[$counter]) ?>" width="100">
                                </div>
                            <?php } ?>
                        </div>
                        <button class="button upload_cpt_header_image" data-limit="2" data-url-key="<?php echo $cpt . 'header_cover_image' ?>">upload</button>
                    </td>
                </tr>
            <?php
                $counter++;
            } ?>
            <tr>
                <th>Report Archive Page Description</th>
                <td>
                    <?php
                    wp_editor(get_option('reports_archive_page_desc'), 'biography', array(
                        'wpautop'       => false,
                        'media_buttons' => false,
                        'textarea_name' => 'reports_archive_page_desc',
                        'textarea_rows' => 10,
                        'teeny'         => false
                    ));
                    ?>
                </td>
            </tr>
        </table>

        <script>
            let file_frame_upload = btn = url_key = limit = 0;
            jQuery('.upload_cpt_header_image').on('click', function(e) {
                e.preventDefault();
                btn = jQuery(this),
                    limit = parseInt(jQuery(this).data('limit'));
                url_key = jQuery(this).data('url-key');
                if (!url_key || url_key == '') {
                    alert('check url key');
                } else {


                }


                // Create the media frame.
                file_frame_upload = wp.media.frames.file_frame = wp.media({
                    library: {
                        type: ['image']
                    },
                    multiple: true // Set to true to allow multiple files to be selected
                });
                const imglimit = limit; // images upload items limit
                file_frame_upload.on('select', function() {
                    // set multiple to false so only get one image from the uploader
                    attachment = file_frame_upload.state().get('selection').toJSON();
                    // here are some of the variables you could use for the attachment;
                    var url = attachment;
                    // attachments ids
                    var attachment_id = attachment_url = '';
                    for (var i = 0; i < attachment.length; i++) {
                        // looping attchment id's seprated with comma ', '
                        if (i < (imglimit)) {
                            attachment_id += attachment[i].id + ',';
                            attachment_url += `<div class="attach-holder"><img src="${attachment[i].url}" width="100"></div>`;
                        }
                    }
                    btn.parent().find('.cpt_header_image_cover').val(attachment_id.slice(0, -1));
                    btn.parent().find('.attachment-s-preview').html(attachment_url);
                });

                // Finally, open the modal
                file_frame_upload.open();
            });
            // reset form inputs 
            jQuery(document).on('click', '.reset-input', function(e) {
                e.preventDefault();
                jQuery(this).parent().siblings('td').find('input').val('');
                jQuery(this).parent().siblings('td').find('.attachment-s-preview').html('');
            });
        </script>
        <?php submit_button(); ?>
    </form>


<?php
}
