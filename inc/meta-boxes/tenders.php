<?php

// to => tender Options

///////////////////////////////////
// Tender Options

function Init_tender_Options($post)
{
    wp_nonce_field(basename(__FILE__), "to_tender_options");
    $to_is_urgent = get_post_meta($post->ID, "to_is_urgent", true);
    $to_location = get_post_meta($post->ID, "to_location", true);
    $to_deadline = get_post_meta($post->ID, "to_deadline", true);

?>

    <style>
        .to_table tbody tr td input:not([type='checkbox']) {
            width: 350px;
        }
        .to_table tbody tr td input {
            margin-left: 30px;
        }
    </style>

    <table class="to_table">
        <tbody>
            <!-- Is Urgent -->
            <tr class="form-field">
                <th>
                    <label for="to_is_urgent">Is Urgent</label>
                </th>
                <td><input type="checkbox" name="to_is_urgent" id="to_is_urgent" value="yes" <?php echo $to_is_urgent == "yes" ? 'checked' : ''; ?>> YES </td>
            </tr>

            <!-- Location -->
            <tr class="form-field">
                <th>
                    <label for="to_location">Location</label>
                </th>
                <td><input type="text" name="to_location" id="to_location" value="<?php echo $to_location; ?>"></td>
            </tr>

            <!-- Deadline -->
            <tr class="form-field">
                <th>
                    <label for="to_deadline">Deadline</label>
                </th>
                <td><input type="date" name="to_deadline" id="to_deadline" value="<?php echo $to_deadline; ?>"></td>
            </tr>

        </tbody>
    </table>

<?php
}

/////////////////////////
// Add Meta Box To CPT
add_action('admin_init', 'add_tender_options');
function add_tender_options()
{
    add_meta_box(
        'tender-options',
        "Tender Options",
        'Init_tender_Options',
        "tender",
        'normal',
        'default',
        null
    );
}

////////////////////////
// Save Value When Save
function save_tender_options($post_id)
{
    $is_valid_nonce = (isset($_POST['to_tender_options']) && wp_verify_nonce($_POST['to_tender_options'], basename(__FILE__))) ? 'true' : 'false';
    // Exits script depending on save status
    if (!$is_valid_nonce) {
        return;
    }

    if (isset($_POST['to_is_urgent'])) {
        update_post_meta($post_id, 'to_is_urgent', $_POST['to_is_urgent']);
    } else {
        update_post_meta($post_id, 'to_is_urgent', '');
    }
    if (isset($_POST['to_location'])) {
        update_post_meta($post_id, 'to_location', $_POST['to_location']);
    } else {
        update_post_meta($post_id, 'to_location', '');
    }

    if (isset($_POST['to_deadline'])) {
        update_post_meta($post_id, 'to_deadline', $_POST['to_deadline']);
    } else {
        update_post_meta($post_id, 'to_deadline', '');
    }

}
add_action('save_post', 'save_tender_options', 10, 2);
