<?php

// co => Campaign Options

///////////////////////////////////
// Campaign Options

function Init_Campaign_Options($post)
{
    $co_campaign_end_date = get_post_meta($post->ID, "co_campaign_end_date", true);
    $co_give_form_id = get_post_meta($post->ID, "co_give_form_id", true);
    $co_donation_amount = get_post_meta($post->ID, "co_donation_amount", true);
    $co_giveloop_default_program_id = get_post_meta($post->ID, "co_giveloop_default_program_id", true);

    $co_show_progress_bar = get_post_meta($post->ID, "co_show_progress_bar", true);
    $co_show_donors_count = get_post_meta($post->ID, "co_show_donors_count", true);
    $co_show_reaming_time = get_post_meta($post->ID, "co_show_reaming_time", true);

?>

    <style>
        #co_campaign_end_date {
            width: 350px;
            margin-left: 30px;
        }
    </style>

    <table class="co_table">
        <tbody>

            <!-- Campaign End Date -->
            <tr class="form-field">
                <th>
                    <label for="co_campaign_end_date">Campaign End Date</label>
                </th>
                <td><input type="date" name="co_campaign_end_date" id="co_campaign_end_date" value="<?php echo $co_campaign_end_date; ?>"></td>
            </tr>
            <tr class="form-field">
                <th>
                    <label for="co_give_form_id">Give Form Id</label>
                </th>
                <td><input type="number" name="co_give_form_id" id="co_give_form_id" value="<?php echo $co_give_form_id; ?>"></td>
            </tr>
            <tr class="form-field">
                <th>
                    <label for="co_giveloop_default_program_id">Give Loop Default Program ID </label>
                </th>
                <td><input type="number" name="co_giveloop_default_program_id" id="co_giveloop_default_program_id" value="<?php echo $co_giveloop_default_program_id; ?>"></td>
            </tr>
            <tr class="form-field">
                <th>
                    <label for="co_donation_amount">Default Amount</label>
                </th>
                <td><input type="number" name="co_donation_amount" id="co_donation_amount" value="<?php echo $co_donation_amount; ?>"></td>
            </tr>
            <tr class="form-field">
                <th>
                    <label for="co_show_progress_bar">Show Progress Bar ?</label>
                </th>
                <td><input type="checkbox" name="co_show_progress_bar" id="co_show_progress_bar" value="yes" <?php echo $co_show_progress_bar == "yes" ? 'checked' : ''; ?>> Yes</td>
            </tr>
            <tr class="form-field">
                <th>
                    <label for="co_show_donors_count">Show Donors Count ?</label>
                </th>
                <td><input type="checkbox" name="co_show_donors_count" id="co_show_donors_count" value="yes" <?php echo $co_show_donors_count == "yes" ? 'checked' : ''; ?>> Yes</td>
            </tr>
            <tr class="form-field">
                <th>
                    <label for="co_show_reaming_time">Show End Date ?</label>
                </th>
                <td><input type="checkbox" name="co_show_reaming_time" id="co_show_reaming_time" value="yes" <?php echo $co_show_reaming_time == "yes" ? 'checked' : ''; ?>> Yes</td>
            </tr>
        </tbody>
    </table>

<?php
}

/////////////////////////
// Add Meta Box To CPT
add_action('admin_init', 'add_campaign_options');
function add_campaign_options()
{
    add_meta_box(
        'campaign-options',
        "Campaign options",
        'Init_Campaign_Options',
        "campaign",
        'normal',
        'default',
        null
    );
}

////////////////////////
// Save Value When Save
function save_campaign_options($post_id)
{
    if (!empty($_POST['co_campaign_end_date']))
        update_post_meta($post_id, 'co_campaign_end_date', $_POST['co_campaign_end_date']);
    if (!empty($_POST['co_give_form_id']))
        update_post_meta($post_id, 'co_give_form_id', $_POST['co_give_form_id']);
    if (!empty($_POST['co_giveloop_default_program_id']))
        update_post_meta($post_id, 'co_giveloop_default_program_id', $_POST['co_giveloop_default_program_id']);
    if (!empty($_POST['co_donation_amount']))
        update_post_meta($post_id, 'co_donation_amount', $_POST['co_donation_amount']);
    if (!empty($_POST['co_show_progress_bar']))
        update_post_meta($post_id, 'co_show_progress_bar', $_POST['co_show_progress_bar']);
    if (!empty($_POST['co_show_donors_count']))
        update_post_meta($post_id, 'co_show_donors_count', $_POST['co_show_donors_count']);
    if (!empty($_POST['co_show_reaming_time']))
        update_post_meta($post_id, 'co_show_reaming_time', $_POST['co_show_reaming_time']);
}
add_action('save_post', 'save_campaign_options', 10, 2);





// Show Meta In Campaigns Columns
add_filter('manage_campaign_posts_columns', 'smashing_filter_posts_columns');
function smashing_filter_posts_columns($columns)
{
    $columns['progress_bar'] = 'Show Progress Bar';
    return $columns;
}

add_action('manage_campaign_posts_custom_column', 'smashing_campaign_column', 10, 2);
function smashing_campaign_column($column, $post_id)
{
    // Image column
    if ('progress_bar' === $column) {
        $co_show_progress_bar = get_post_meta($post_id, "co_show_progress_bar", true);
        echo $co_show_progress_bar == "yes" ? '<p style="color:green;">YES</p>' : '<p style="color:red;">NO</p>';
    }
}
