<?php

// mad => Main Slider Details

///////////////////////////////////
// Main Slider Details

function Init_main_slider_Details($post)
{
    wp_nonce_field(basename(__FILE__), "main_slider_options");

    $mad_give_form_id = get_post_meta($post->ID, "mad_give_form_id", true);

    ?>

    <style>
        .mad_table tr {
            text-align: left;
            border: 1px solid red;
        }

        .mad_table tbody tr td {
            padding-left: 15px;
        }
    </style>

    <table class="mad_table">
        <tbody>

            <!-- Give Form ID -->
            <tr class="form-field">
                <th>
                    <label for="mad_give_form_id">Give Form ID</label>
                </th>
                <td><input type="number" min="0" name="mad_give_form_id" id="mad_give_form_id"
                        value="<?php echo $mad_give_form_id; ?>"></td>
            </tr>
        </tbody>
    </table>

    <?php
}

/////////////////////////
// Add Meta Box To CPT
add_action('admin_init', 'add_main_slider_details');
function add_main_slider_details()
{
    add_meta_box(
        'main_slider-details',
        "Main Slider Details",
        'Init_main_slider_Details',
        "main_slider",
        'normal',
        'default',
        null
    );
}

////////////////////////
// Save Value When Save
function save_main_slider_details($post_id)
{

    $is_valid_nonce = (isset($_POST['main_slider_options']) && wp_verify_nonce($_POST['main_slider_options'], basename(__FILE__))) ? 'true' : 'false';
    // Exits script depending on save status
    if (!$is_valid_nonce) {
        return;
    }
    if (isset($_POST['mad_give_form_id']))
        update_post_meta($post_id, 'mad_give_form_id', $_POST['mad_give_form_id']);
}
add_action('save_post', 'save_main_slider_details', 10, 2);