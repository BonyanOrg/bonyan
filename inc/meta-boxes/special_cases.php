<?php

// sco => Special Cases Options

///////////////////////////////////
// special_cases Options

function Init_Special_Case_Options($post)
{

    wp_nonce_field(basename(__FILE__), "sco_special_case_options");
    $sco_special_case_end_date = get_post_meta($post->ID, "sco_special_case_end_date", true);
    $sco_give_form_id = get_post_meta($post->ID, "sco_give_form_id", true);
    $sco_donation_amount = get_post_meta($post->ID, "sco_donation_amount", true);

    $sco_show_progress_bar = get_post_meta($post->ID, "sco_show_progress_bar", true);
    $sco_show_donors_count = get_post_meta($post->ID, "sco_show_donors_count", true);
    $sco_show_reaming_time = get_post_meta($post->ID, "sco_show_reaming_time", true);

    ?>

    <style>
        #sco_special_case_end_date {
            width: 350px;
            margin-left: 30px;
        }

        .select-special_case {
            width: 350px;
        }
    </style>

    <table class="sco_table">
        <tbody>

            <!-- special_cases End Date -->
            <tr class="form-field">
                <th>
                    <label for="sco_special_case_end_date">Special Cases End Date</label>
                </th>
                <td><input type="date" name="sco_special_case_end_date" id="sco_special_case_end_date"
                        value="<?php echo $sco_special_case_end_date; ?>"></td>
            </tr>
            <tr class="form-field">
                <th>
                    <label for="sco_give_form_id">Give Form Id</label>
                </th>
                <td>

                    <!-- <input type="number" name="co_give_form_id" id="co_give_form_id" class="select-campaign" value="<?php // echo $co_give_form_id; 
                        ?>"> -->
                    <select name="sco_give_form_id" id="sco_give_form_id" class="select-special_case">
                        <?php if (!empty($sco_give_form_id)): ?>
                            <option value="<?php echo $sco_give_form_id; ?>" selected="selected"><?php echo get_the_title($sco_give_form_id); ?></option>
                        <?php endif; ?>
                    </select>
                </td>
            </tr>

            <tr class="form-field">
                <th>
                    <label for="sco_donation_amount">Default Amount</label>
                </th>
                <td><input type="number" name="sco_donation_amount" id="sco_donation_amount"
                        value="<?php echo $sco_donation_amount; ?>"></td>
            </tr>
            <tr class="form-field">
                <th>
                    <label for="sco_show_progress_bar">Show Progress Bar ?</label>
                </th>
                <td><input type="checkbox" name="sco_show_progress_bar" id="sco_show_progress_bar" value="yes" <?php echo $sco_show_progress_bar == "yes" ? 'checked' : ''; ?>> Yes</td>
            </tr>
            <tr class="form-field">
                <th>
                    <label for="sco_show_donors_count">Show Donors Count ?</label>
                </th>
                <td><input type="checkbox" name="sco_show_donors_count" id="sco_show_donors_count" value="yes" <?php echo $sco_show_donors_count == "yes" ? 'checked' : ''; ?>> Yes</td>
            </tr>
            <tr class="form-field">
                <th>
                    <label for="sco_show_reaming_time">Show End Date ?</label>
                </th>
                <td><input type="checkbox" name="sco_show_reaming_time" id="sco_show_reaming_time" value="yes" <?php echo $sco_show_reaming_time == "yes" ? 'checked' : ''; ?>> Yes</td>
            </tr>
        </tbody>
    </table>

    <script>
        (function ($) {
            // init select2
            $(document).ready(function () {
                // Init select2
                $('.select-special_case').select2({
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
                        data: function (term) {
                            return {
                                action: 'get_campaigns_by_name',
                                term: term.term,
                            };
                        },
                        processResults: function (data) {
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
add_action('admin_init', 'add_special_case_options');
function add_special_case_options()
{
    add_meta_box(
        'special_case-options',
        "special_case options",
        'Init_Special_Case_Options',
        "special_case",
        'normal',
        'default',
        null
    );
}

////////////////////////
// Save Value When Save
function save_special_case_options($post_id)
{
    $is_valid_nonce = (isset($_POST['sco_special_case_options']) && wp_verify_nonce($_POST['sco_special_case_options'], basename(__FILE__))) ? true : false;
    // Exits script depending on save status
    if (!$is_valid_nonce) {
        return;
    }

    if (isset($_POST['sco_special_case_end_date']))
        update_post_meta($post_id, 'sco_special_case_end_date', $_POST['sco_special_case_end_date']);

    if (isset($_POST['sco_give_form_id']))
        update_post_meta($post_id, 'sco_give_form_id', $_POST['sco_give_form_id']);

    if (isset($_POST['sco_donation_amount']))
        update_post_meta($post_id, 'sco_donation_amount', $_POST['sco_donation_amount']);


    if (isset($_POST['sco_show_progress_bar'])) {
        update_post_meta($post_id, 'sco_show_progress_bar', $_POST['sco_show_progress_bar']);
    }

    if (isset($_POST['sco_show_donors_count'])) {
        update_post_meta($post_id, 'sco_show_donors_count', $_POST['sco_show_donors_count']);
    }

    if (isset($_POST['sco_show_reaming_time'])) {
        update_post_meta($post_id, 'sco_show_reaming_time', $_POST['sco_show_reaming_time']);
    }
}
add_action('save_post', 'save_special_case_options', 10, 2);





// Show Meta In Special Case Columns
add_filter('manage_special_case_posts_columns', 'smashing_filter_special_case_posts_columns');
function smashing_filter_special_case_posts_columns($columns)
{
    $columns['progress_bar'] = 'Show Progress Bar';
    return $columns;
}

add_action('manage_special_case_posts_custom_column', 'smashing_special_case_column', 10, 2);
function smashing_special_case_column($column, $post_id)
{
    // Image column
    if ('progress_bar' === $column) {
        $sco_show_progress_bar = get_post_meta($post_id, "sco_show_progress_bar", true);
        echo $sco_show_progress_bar == "yes" ? '<p style="color:green;">YES</p>' : '<p style="color:red;">NO</p>';
    }
}