<?php
// Add Upload fields to "Add New Taxonomy" form
function add_campaign_cover_field()
{
    wp_nonce_field(basename(__FILE__), "campaign_cat_options");

    wp_enqueue_media();
    ?>
    <div class="form-field">
        <label for="campaign_cover">Campaign Cover Image</label>
        <input type="text" style="width:400px" name="campaign_cover" id="campaign_cover" class="campaign-cover">
        <input class="upload_video_button button" name="_add_campaign_cover" id="_add_campaign_cover" type="button"
            value="Select/Upload Image" />
        <div class="img-wrap" style="width: 300px; margin-top: 1rem">
            <img src="" id="campaign-cover-img" style="max-width: 100%;">
        </div>
        <script>
            jQuery(document).ready(function ($) {

                // Instantiates the variable that holds the media library frame.
                var meta_image_frame, white_meta_image_frame;

                // Runs when the image button is clicked.
                $('#_add_campaign_cover').click(function (e) {

                    // Prevents the default action from occuring.
                    e.preventDefault();

                    // If the frame already exists, re-open it.
                    if (meta_image_frame) {
                        meta_image_frame.open();
                        return;
                    }

                    // Sets up the media library frame
                    meta_image_frame = wp.media.frames.meta_image_frame = wp.media({
                        title: 'Select or Upload Image',
                        button: {
                            text: 'Use this Image'
                        },
                        library: {
                            type: 'image',
                        }
                    });

                    // Runs when an image is selected.
                    meta_image_frame.on('select', function () {

                        // Grabs the attachment selection and creates a JSON representation of the model.
                        var media_attachment = meta_image_frame.state().get('selection').first().toJSON();

                        // Sends the attachment URL to our custom image input field.
                        $('#campaign_cover').val(media_attachment.url);
                        $('#campaign-cover-img').attr("src", media_attachment.url)
                    });

                    // Opens the media library frame.
                    meta_image_frame.open();
                });

                $('#campaign_cover').on('change', function () {
                    $('#campaign-cover-img').attr("src", $(this).val());
                });

            });
        </script>
    </div>
    <?php
}
add_action('campaigns-categories_add_form_fields', 'add_campaign_cover_field', 10, 2);

// Add Upload fields to "Edit Taxonomy" form
function campaign_edit_cover_field($term)
{
    wp_nonce_field(basename(__FILE__), "campaign_cat_options");

    wp_enqueue_media();
    // put the term ID into a variable
    $t_id = $term->term_id;

    // retrieve the existing value(s) for this meta field. This returns an array
    $term_meta = get_term_meta($t_id, 'campaigns-categories_cover', true);

    $default_image = isset($term_meta) ? esc_attr($term_meta) : '';

    ?>

    <tr class="form-field">
        <th scope="row" valign="top"><label for="_campaign_cover">campaign Cover Image</label></th>
        <td>
            <input type="text" style="width:400px" name="campaign_cover" id="campaign_cover" class="campaign-cover"
                value="<?php echo $default_image; ?>">
            <input class="upload_video_button button" name="_campaign_cover" id="_campaign_cover" type="button"
                value="Select/Upload Image" />
        </td>
    </tr>
    <tr class="form-field">
        <th scope="row" valign="top"></th>
        <td>
            <style>
                <?php if (empty($default_image)) { ?>
                    div.img-wrap {
                        background: url('http://placehold.it/300x300') no-repeat center;
                    }

                <?php } ?>
                div.img-wrap {
                    background-size: contain;
                    max-width: 300px;
                    max-height: 300px;
                    width: 100%;
                    height: 100%;
                    overflow: hidden;
                }

                div.img-wrap img {
                    max-width: 100%;
                    object-fit: cover;
                }
            </style>
            <div class="img-wrap">
                <img src="<?php echo $default_image; ?>" id="campaign-cover-img">
            </div>

        </td>
    </tr>



    <script>
        jQuery(document).ready(function ($) {
            $('#_campaign_cover').click(function () {
                wp.media.editor.send.attachment = function (props, attachment) {
                    $('#campaign-cover-img').attr("src", attachment.url)
                    $('.campaign-cover').val(attachment.url)
                }
                wp.media.editor.open(this);
                return false;
            });
            $('#campaign_cover').on('change', function () {
                $('#campaign-cover-img').attr("src", $(this).val());
            });
        });
    </script>
    <?php
}
add_action('campaigns-categories_edit_form_fields', 'campaign_edit_cover_field', 10, 2);

// Save Taxonomy Image fields callback function.
function save_campaigns_custom_meta($term_id)
{
    $is_valid_nonce = (isset($_POST['campaign_cat_options']) && wp_verify_nonce($_POST['campaign_cat_options'], basename(__FILE__))) ? 'true' : 'false';
    // Exits script depending on save status
    if (!$is_valid_nonce) {
        return;
    }
    
    if (isset($_POST['campaign_cover'])) {
        update_term_meta($term_id, 'campaigns-categories_cover', $_POST['campaign_cover']);
    }
    if (isset($_POST['campaign_arrangment'])) {
        update_term_meta($term_id, 'campaign_arrangment', $_POST['campaign_arrangment']);
    }
}
add_action('edited_campaigns-categories', 'save_campaigns_custom_meta', 10, 2);
add_action('create_campaigns-categories', 'save_campaigns_custom_meta', 10, 2);