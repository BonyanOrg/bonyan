<?php
// Add Upload fields to "Add New Taxonomy" form
function add_reports_cover_field()
{
    wp_enqueue_media();
?>
    <div class="form-field">
        <label for="reports_cover">reports Cover Image</label>
        <input type="text" style="width:400px" name="reports_cover" id="reports_cover" class="reports-cover">
        <input class="upload_video_button button" name="_add_reports_cover" id="_add_reports_cover" type="button" value="Select/Upload Image" />
        <div class="img-wrap" style="width: 300px; margin-top: 1rem">
            <img src="" id="reports-cover-img" style="max-width: 100%;">
        </div>
        <script>
            jQuery(document).ready(function($) {

                // Instantiates the variable that holds the media library frame.
                var meta_image_frame, white_meta_image_frame;

                // Runs when the image button is clicked.
                $('#_add_reports_cover').click(function(e) {

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
                    meta_image_frame.on('select', function() {

                        // Grabs the attachment selection and creates a JSON representation of the model.
                        var media_attachment = meta_image_frame.state().get('selection').first().toJSON();

                        // Sends the attachment URL to our custom image input field.
                        $('#reports_cover').val(media_attachment.url);
                        $('#reports-cover-img').attr("src", media_attachment.url)
                    });

                    // Opens the media library frame.
                    meta_image_frame.open();
                });

                $('#reports_cover').on('change', function() {
                    $('#reports-cover-img').attr("src", $(this).val());
                });

            });
        </script>
    </div>
<?php
}
add_action('reports-categories_add_form_fields', 'add_reports_cover_field', 10, 2);

// Add Upload fields to "Edit Taxonomy" form
function reports_edit_cover_field($term)
{
    wp_enqueue_media();
    // put the term ID into a variable
    $t_id = $term->term_id;

    // retrieve the existing value(s) for this meta field. This returns an array
    $term_meta = get_term_meta($t_id, 'reports-categories_cover', true);
    $cat_description = get_term_meta($t_id, 'reports_cat_desc', true);

    $default_image = isset($term_meta) ? esc_attr($term_meta) : '';

?>

    <tr class="form-field">
        <th scope="row" valign="top"><label for="reports_cat_desc">Category Description</label></th>
        <td>
            <?php
            wp_editor($cat_description, 'biography', array(
                'wpautop'       => false,
                'media_buttons' => false,
                'textarea_name' => 'reports_cat_desc',
                'textarea_rows' => 10,
                'teeny'         => false
            ));
            ?>
        </td>
    </tr>
    <tr class="form-field">
        <th scope="row" valign="top"><label for="_reports_cover">reports Cover Image</label></th>
        <td>
            <input type="text" style="width:400px" name="reports_cover" id="reports_cover" class="reports-cover" value="<?php echo $default_image; ?>">
            <input class="upload_video_button button" name="_reports_cover" id="_reports_cover" type="button" value="Select/Upload Image" />
        </td>
    </tr>
    <tr class="form-field">
        <th scope="row" valign="top"></th>
        <td>
            <style>
                <?php if (empty($default_image)) { ?>div.img-wrap {
                    background: url('http://placehold.it/300x300') no-repeat center;
                }

                <?php } ?>div.img-wrap {
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
                <img src="<?php echo $default_image; ?>" id="reports-cover-img">
            </div>

        </td>
    </tr>



    <script>
        jQuery(document).ready(function($) {
            $('#_reports_cover').click(function() {
                wp.media.editor.send.attachment = function(props, attachment) {
                    $('#reports-cover-img').attr("src", attachment.url)
                    $('.reports-cover').val(attachment.url)
                }
                wp.media.editor.open(this);
                return false;
            });
            $('#reports_cover').on('change', function() {
                $('#reports-cover-img').attr("src", $(this).val());
            });
        });
    </script>
<?php
}
add_action('reports-categories_edit_form_fields', 'reports_edit_cover_field', 10, 2);

// Save Taxonomy Image fields callback function.
function save_reports_custom_meta($term_id)
{
    if (isset($_POST['reports_cover'])) {
        update_term_meta($term_id, 'reports-categories_cover', $_POST['reports_cover']);
    }
    if (isset($_POST['reports_cat_desc'])) {
        update_term_meta($term_id, 'reports_cat_desc', $_POST['reports_cat_desc']);
    } else {
        update_term_meta($term_id, 'reports_cat_desc', '');
    }
    //update_term_meta($term_id, 'reports_arrangment', $_POST['reports_arrangment']);
}
add_action('edited_reports-categories', 'save_reports_custom_meta', 10, 2);
add_action('create_reports-categories', 'save_reports_custom_meta', 10, 2);
