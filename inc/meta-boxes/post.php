<?php

// po => Post Options

///////////////////////////////////
// Post Options

function Init_post_Options($post)
{
    wp_nonce_field(basename(__FILE__), "post_options");
    $po_give_form_id = get_post_meta($post->ID, "po_give_form_id", true);


    ?>

    <table class="po_table">
        <tbody>

            <tr class="form-field">
                <th>
                    <label for="po_give_form_id">Give Form Id</label>
                </th>
                <td><input type="number" name="po_give_form_id" id="po_give_form_id"
                        value="<?php echo $po_give_form_id; ?>"></td>
            </tr>

        </tbody>
    </table>

    <?php
}

/////////////////////////
// Add Meta Box To CPT
add_action('admin_init', 'add_post_options');
function add_post_options()
{
    add_meta_box(
        'post-options',
        "Post options",
        'Init_post_Options',
        "post",
        'normal',
        'default',
        null
    );
}

////////////////////////
// Save Value When Save
function save_post_options($post_id)
{

    $is_valid_nonce = (isset($_POST['post_options']) && wp_verify_nonce($_POST['post_options'], basename(__FILE__))) ? 'true' : 'false';
    // Exits script depending on save status
    if (!$is_valid_nonce) {
        return;
    }
    if (isset($_POST['po_give_form_id']))
        update_post_meta($post_id, 'po_give_form_id', $_POST['po_give_form_id']);


}
add_action('save_post', 'save_post_options', 10, 2);