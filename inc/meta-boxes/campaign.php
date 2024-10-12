<?php

// co => Campaign Options

///////////////////////////////////
// Campaign Options

function Init_Campaign_Options($post)
{

    wp_nonce_field(basename(__FILE__), "co_campaign_options");
    $co_donation_platform = get_post_meta($post->ID, "co_donation_platform", true);
    $co_give_form_id = get_post_meta($post->ID, "co_give_form_id", true);

    $co_classy_campaign_id = get_post_meta($post->ID, "co_classy_campaign_id", true);

    $co_givecloud_campaign_id = get_post_meta($post->ID, "co_givecloud_campaign_id", true);

    $co_charity_stack_element_id = get_post_meta($post->ID, "co_charity_stack_element_id", true);

    $co_fund_raise_up_form_id = get_post_meta($post->ID, "co_fund_raise_up_form_id", true);
    $is_fund_rase_up_recurring = get_post_meta($post->ID, "is_fund_rase_up_recurring", true);

    $co_campaign_end_date = get_post_meta($post->ID, "co_campaign_end_date", true);
    $co_donation_amount = get_post_meta($post->ID, "co_donation_amount", true);

    $co_show_progress_bar = get_post_meta($post->ID, "co_show_progress_bar", true);
    $co_show_donors_count = get_post_meta($post->ID, "co_show_donors_count", true);
    $co_show_reaming_time = get_post_meta($post->ID, "co_show_reaming_time", true);

?>

    <style>
        #co_campaign_end_date {
            width: 350px;
        }

        .select-campaign {
            width: 350px;
        }
    </style>

    <table class="co_table">
        <tbody>

            <!-- Donation Platform -->
            <tr class="form-field">
                <th>
                    <label for="co_donation_platform">Donation Platform</label>
                </th>
                <td>
                    <select name="co_donation_platform" id="co_donation_platform">
                        <option value="">--Select The Platform--</option>
                        <option value="give_wp" <?= selected($co_donation_platform, 'give_wp', true) ?>>Give WP</option>
                        <option value="fund_raise_up" <?= selected($co_donation_platform, 'fund_raise_up', true) ?>>FundRaiseUp</option>
                        <option value="charity_stack" <?= selected($co_donation_platform, 'charity_stack', true) ?>>Charity Stack</option>
                        <option value="classy" <?= selected($co_donation_platform, 'classy', true) ?>>Classy</option>
                        <option value="givecloud" <?= selected($co_donation_platform, 'givecloud', true) ?>>Give Cloud</option>
                    </select>
                </td>
            </tr>
            <!-- Give WP Form ID -->
            <tr class="form-field">
                <th>
                    <label for="co_give_form_id">Give Form Id</label>
                </th>
                <td>
                    <select name="co_give_form_id" id="co_give_form_id" class="select-campaign">
                        <?php if (!empty($co_give_form_id)) : ?>
                            <option value="<?php echo $co_give_form_id; ?>" selected="selected"><?php echo get_the_title($co_give_form_id); ?></option>
                        <?php endif; ?>
                    </select>
                </td>
            </tr>
            <!-- Charity Stack Element ID -->
            <tr class="form-field">
                <th>
                    <label for="co_charity_stack_element_id">Charity Stack Element ID</label>
                </th>
                <td><input type="text" name="co_charity_stack_element_id" id="co_charity_stack_element_id" value="<?php echo $co_charity_stack_element_id; ?>"></td>
            </tr>
            <!-- Classy  ID -->
            <tr class="form-field">
                <th>
                    <label for="co_classy_campaign_id">Classy Campaign ID</label>
                </th>
                <td><input type="text" name="co_classy_campaign_id" id="co_classy_campaign_id" value="<?php echo $co_classy_campaign_id; ?>"></td>
            </tr>
            <!-- Give Cloud  ID -->
            <tr class="form-field">
                <th>
                    <label for="co_givecloud_campaign_id">Give Cloud Campaign ID</label>
                </th>
                <td><input type="text" name="co_givecloud_campaign_id" id="co_givecloud_campaign_id" value="<?php echo $co_givecloud_campaign_id; ?>"></td>
            </tr>
            <tr>
                <td>
                    <hr>
                </td>
            </tr>
            <!-- FundRaiseUp Form ID -->
            <tr class="form-field">
                <th>
                    <label for="co_fund_raise_up_form_id">FundRaiseUp Form ID</label>
                </th>
                <td><input type="text" name="co_fund_raise_up_form_id" id="co_fund_raise_up_form_id" value="<?php echo $co_fund_raise_up_form_id; ?>"></td>

            </tr>
            <tr class="form-field">
                <th>
                    <label for="is_fund_rase_up_recurring">Is FundRaiseUp Donation Recurring?(YES)</label>
                </th>
                <td>
                    <select name="is_fund_rase_up_recurring" id="is_fund_rase_up_recurring">
                        <option value="">--Select The Recurring Period--</option>
                        <option value="once" <?= selected($is_fund_rase_up_recurring, 'once', true) ?>>Once</option>
                        <option value="daily" <?= selected($is_fund_rase_up_recurring, 'daily', true) ?>>Daily</option>
                        <option value="weekly" <?= selected($is_fund_rase_up_recurring, 'weekly', true) ?>>Weekly</option>
                        <option value="biweekly" <?= selected($is_fund_rase_up_recurring, 'biweekly', true) ?>>Biweekly</option>
                        <option value="every4weeks" <?= selected($is_fund_rase_up_recurring, 'every4weeks', true) ?>>Every 4 weeks</option>
                        <option value="monthly" <?= selected($is_fund_rase_up_recurring, 'monthly', true) ?>>Monthly</option>
                        <option value="bimonthly" <?= selected($is_fund_rase_up_recurring, 'bimonthly', true) ?>>Bimonthly</option>
                        <option value="quarterly" <?= selected($is_fund_rase_up_recurring, 'quarterly', true) ?>>Quarterly</option>
                        <option value="semiannual" <?= selected($is_fund_rase_up_recurring, 'semiannual', true) ?>>Semiannually</option>
                        <option value="annual" <?= selected($is_fund_rase_up_recurring, 'annual', true) ?>>Annually</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <hr>
                </td>
            </tr>
            <!-- Campaign End Date -->
            <tr class="form-field">
                <th>
                    <label for="co_campaign_end_date">Campaign End Date</label>
                </th>
                <td><input type="date" name="co_campaign_end_date" id="co_campaign_end_date" value="<?php echo $co_campaign_end_date; ?>"></td>
            </tr>

            <tr class="form-field">
                <th>
                    <label for="co_donation_amount">Default Amount</label>
                </th>
                <td><input type="number" name="co_donation_amount" id="co_donation_amount" value="<?php echo $co_donation_amount; ?>"></td>
            </tr>
            <tr>
                <td>
                    <hr>
                </td>
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

    <script>
        (function($) {
            // init select2
            $(document).ready(function() {
                // Init select2
                $('.select-campaign').select2({
                    minimumInputLength: 3,
                    language: "ar",
                    cache: true,

                    dir: (isRtl) ? 'rtl' : 'ltr',
                    language: {
                        noMatches: () => ("لايوجد نتائج"),
                        noResults: () => ("لم يتم العثور على نتائج"),
                        inputTooShort: () => ("اكتب 3 أحرف على الأقل")
                    },
                    ajax: {
                        url: ajaxurl,
                        type: 'POST',
                        // dataType: 'json',
                        data: function(term) {
                            return {
                                action: 'get_campaigns_by_name',
                                term: term.term,
                            };
                        },
                        processResults: function(data) {
                            // Transforms the top-level key of the response object from 'items' to 'results'
                            return {
                                results: data.campaigns
                            };
                        }
                    },
                });
            });
        }(jQuery));
    </script>

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
    $is_valid_nonce = (isset($_POST['co_campaign_options']) && wp_verify_nonce($_POST['co_campaign_options'], basename(__FILE__))) ? true : false;
    // Exits script depending on save status
    if (!$is_valid_nonce) {
        return;
    }

    if (isset($_POST['co_donation_platform']))
        update_post_meta($post_id, 'co_donation_platform', $_POST['co_donation_platform']);

    if (isset($_POST['co_give_form_id']))
        update_post_meta($post_id, 'co_give_form_id', $_POST['co_give_form_id']);

    if (isset($_POST['co_charity_stack_element_id']))
        update_post_meta($post_id, 'co_charity_stack_element_id', sanitize_text_field($_POST['co_charity_stack_element_id']));

    if (isset($_POST['co_classy_campaign_id']))
        update_post_meta($post_id, 'co_classy_campaign_id', intval(absint(sanitize_text_field($_POST['co_classy_campaign_id']))));

    if (isset($_POST['co_givecloud_campaign_id']))
        update_post_meta($post_id, 'co_givecloud_campaign_id', sanitize_text_field($_POST['co_givecloud_campaign_id']));

    if (isset($_POST['co_fund_raise_up_form_id']))
        update_post_meta($post_id, 'co_fund_raise_up_form_id', $_POST['co_fund_raise_up_form_id']);

    if (isset($_POST['is_fund_rase_up_recurring']))
        update_post_meta($post_id, 'is_fund_rase_up_recurring', $_POST['is_fund_rase_up_recurring']);


    if (isset($_POST['co_campaign_end_date']))
        update_post_meta($post_id, 'co_campaign_end_date', $_POST['co_campaign_end_date']);

    if (isset($_POST['co_donation_amount']))
        update_post_meta($post_id, 'co_donation_amount', $_POST['co_donation_amount']);


    if (isset($_POST['co_show_progress_bar']) && $_POST['co_show_progress_bar'] == 'yes') {
        update_post_meta($post_id, 'co_show_progress_bar', $_POST['co_show_progress_bar']);
    } else {
        delete_post_meta($post_id, 'co_show_progress_bar');
    }

    if (isset($_POST['co_show_donors_count']) && $_POST['co_show_donors_count'] == 'yes') {
        update_post_meta($post_id, 'co_show_donors_count', $_POST['co_show_donors_count']);
    } else {
        delete_post_meta($post_id, 'co_show_donors_count');
    }

    if (isset($_POST['co_show_reaming_time']) && $_POST['co_show_reaming_time'] == 'yes') {
        update_post_meta($post_id, 'co_show_reaming_time', $_POST['co_show_reaming_time']);
    } else {
        delete_post_meta($post_id, 'co_show_reaming_time');
    }
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
