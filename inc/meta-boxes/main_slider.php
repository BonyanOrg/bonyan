<?php

// mad => Main Slider Details

///////////////////////////////////
// Main Slider Details

function Init_main_slider_Details($post)
{
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
                <td><input type="number" min="0" name="mad_give_form_id" id="mad_give_form_id" value="<?php echo $mad_give_form_id; ?>"></td>
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
    if (!empty($_POST['mad_give_form_id']))
    update_post_meta($post_id, 'mad_give_form_id', $_POST['mad_give_form_id']);
}
add_action('save_post', 'save_main_slider_details', 10, 2);
