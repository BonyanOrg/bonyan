<?php
// Add Upload fields to "Add New Taxonomy" form
function add_category_cover_field()
{
    wp_enqueue_media();
?>
    <div class="form-field">
        <label for="category_cover">Category Cover Image</label>
        <input type="text" style="width:400px" name="category_cover" id="category_cover" class="category-cover">
        <input class="upload_video_button button" name="_add_category_cover" id="_add_category_cover" type="button" value="Select/Upload Image" />
        <div class="img-wrap" style="width: 300px; margin-top: 1rem">
            <img src="" id="category-cover-img" style="max-width: 100%;">
        </div>
        <script>
            jQuery(document).ready(function($) {

                // Instantiates the variable that holds the media library frame.
                var meta_image_frame, white_meta_image_frame;

                // Runs when the image button is clicked.
                $('#_add_category_cover').click(function(e) {

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
                        $('#category_cover').val(media_attachment.url);
                        $('#category-cover-img').attr("src", media_attachment.url)
                    });

                    // Opens the media library frame.
                    meta_image_frame.open();
                });

                $('#category_cover').on('change', function() {
                    $('#category-cover-img').attr("src", $(this).val());
                });

            });
        </script>
    </div>
<?php
}
add_action('category_add_form_fields', 'add_category_cover_field', 10, 2);

// Add Upload fields to "Edit Taxonomy" form
function category_edit_cover_field($term)
{
    wp_enqueue_media();
    // put the term ID into a variable
    $t_id = $term->term_id;

    // retrieve the existing value(s) for this meta field. This returns an array
    $term_meta = get_term_meta($t_id, 'category_cover', true);

    $default_image = isset($term_meta) ? esc_attr($term_meta) : '';

?>

    <tr class="form-field">
        <th scope="row" valign="top"><label for="_category_cover">Category Cover Image</label></th>
        <td>
            <input type="text" style="width:400px" name="category_cover" id="category_cover" class="category-cover" value="<?php echo $default_image; ?>">
            <input class="upload_video_button button" name="_category_cover" id="_category_cover" type="button" value="Select/Upload Image" />
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
                <img src="<?php echo $default_image; ?>" id="category-cover-img">
            </div>

        </td>
    </tr>



    <script>
        jQuery(document).ready(function($) {
            $('#_category_cover').click(function() {
                wp.media.editor.send.attachment = function(props, attachment) {
                    $('#category-cover-img').attr("src", attachment.url)
                    $('.category-cover').val(attachment.url)
                }
                wp.media.editor.open(this);
                return false;
            });
            $('#category_cover').on('change', function() {
                $('#category-cover-img').attr("src", $(this).val());
            });
        });
    </script>
<?php
}
add_action('category_edit_form_fields', 'category_edit_cover_field', 10, 2);

// Save Taxonomy Image fields callback function.
function save_category_custom_meta($term_id)
{
    if (isset($_POST['category_cover'])) {
        update_term_meta($term_id, 'category_cover', $_POST['category_cover']);
    }
}
add_action('edited_category', 'save_category_custom_meta', 10, 2);
add_action('create_category', 'save_category_custom_meta', 10, 2);
