<?php

// mad => Main Slider Details

///////////////////////////////////
// Main Slider Details

function Init_main_slider_Details($post)
{
    wp_nonce_field(basename(__FILE__), "main_slider_options");

    $mad_give_form_id = get_post_meta($post->ID, "mad_give_form_id", true);
    $mad_choice = get_post_meta($post->ID, "mad_choice", true);
    if (empty($mad_choice)) {
        $mad_choice = 'give_id'; // Default choice if not set
    }
    $mad_url = get_post_meta($post->ID, "mad_url", true);
    $mad_url_button_text = get_post_meta($post->ID, "mad_url_button_text", true);

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
            <!-- Choose Option -->
            <tr class="form-field">
                <th>
                    <label for="mad_choice">Choose Option</label>
                </th>
                <td>
                    <input type="radio" name="mad_choice" value="give_id" <?php checked($mad_choice, 'give_id'); ?>> Give Form ID
                    <input type="radio" name="mad_choice" value="url" <?php checked($mad_choice, 'url'); ?>> URL
                </td>
            </tr>
            <!-- Give Form ID -->
            <tr class="form-field give_id_field">
                <th>
                    <label for="mad_give_form_id">Give Form ID</label>
                </th>
                <td><input type="number" min="0" name="mad_give_form_id" id="mad_give_form_id" value="<?php echo $mad_give_form_id; ?>" placeholder="Enter Give Form ID"></td>
            </tr>
            <!-- URL -->
            <tr class="form-field url_field">
                <th>
                    <label for="mad_url">URL</label>
                </th>
                <td><input type="text" name="mad_url" id="mad_url" value="<?php echo $mad_url; ?>" placeholder="Enter URL"></td>
            </tr>
            <tr class="url_field">
                <th>
                    <label for="mad_url_button_text">Button Text</label>
                </th>
                <td><input type="text" name="mad_url_button_text" id="mad_url_button_text" value="<?php echo $mad_url_button_text; ?>" placeholder="Enter Button Text"></td>
            </tr>

        </tbody>
    </table>

    <script type="text/javascript">
        jQuery(document).ready(function($) {
            if ("<?php echo $mad_choice; ?>" == "give_id") {
                $(".give_id_field").show();
                $(".url_field").hide();
            } else {
                $(".give_id_field").hide();
                $(".url_field").show();
            }
            $('input[type="radio"]').click(function() {
                if ($(this).attr("value") == "give_id") {
                    $(".give_id_field").show();
                    $(".url_field").hide();
                }
                if ($(this).attr("value") == "url") {
                    $(".give_id_field").hide();
                    $(".url_field").show();
                }
            });
        });
    </script>

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
    if (isset($_POST['mad_choice'])) {
        update_post_meta($post_id, 'mad_choice', $_POST['mad_choice']);

        if ($_POST['mad_choice'] == 'give_id') {
            if (isset($_POST['mad_give_form_id'])) {
                update_post_meta($post_id, 'mad_give_form_id', $_POST['mad_give_form_id']);
            }
            delete_post_meta($post_id, 'mad_url');
            delete_post_meta($post_id, 'mad_url_button_text');
        } else if ($_POST['mad_choice'] == 'url') {
            if (isset($_POST['mad_url'])) {
                update_post_meta($post_id, 'mad_url', $_POST['mad_url']);
            }
            if (isset($_POST['mad_url_button_text'])) {
                update_post_meta($post_id, 'mad_url_button_text', $_POST['mad_url_button_text']);
            }
            delete_post_meta($post_id, 'mad_give_form_id');
        }
    }
        update_post_meta($post_id, 'mad_give_form_id', $_POST['mad_give_form_id']);
}
add_action('save_post', 'save_main_slider_details', 10, 2);