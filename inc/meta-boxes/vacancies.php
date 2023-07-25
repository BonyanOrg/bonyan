<?php

// vd => Vacancy Details

///////////////////////////////////
// Vacancies Details

function Init_Vacancies_Details($post)
{

    wp_nonce_field(basename(__FILE__), "vd_vacancies_options");
    $vd_is_urgent = get_post_meta($post->ID, "vd_is_urgent", true);
    $vd_location = get_post_meta($post->ID, "vd_location", true);
    $vd_deadline = get_post_meta($post->ID, "vd_deadline", true);
    $vd_department = get_post_meta($post->ID, "vd_department", true);

    ?>

    <style>
        .vd_table input:not([type="checkbox"]),
        select {
            width: 250px;
        }

        .vd_table tr {
            text-align: left;
            border: 1px solid red;
        }

        .vd_table tbody tr td {
            padding-left: 15px;
        }
    </style>

    <table class="vd_table">
        <tbody>


            <!-- Job Place Or Location -->
            <tr class="form-field">
                <th>
                    <label for="vd_location">Job Place Or Location</label>
                </th>
                <td><input type="text" name="vd_location" id="vd_location" value="<?php echo $vd_location; ?>"></td>
            </tr>

            <!-- Is Urgent -->
            <tr class="form-field">
                <th>
                    <label for="vd_is_urgent">Is Urgent</label>
                </th>
                <td><input type="checkbox" name="vd_is_urgent" id="vd_is_urgent" value="yes" <?php echo $vd_is_urgent == "yes" ? 'checked' : ''; ?>> <strong>YES</strong></td>
            </tr>

            <!-- Deadline -->
            <tr class="form-field">
                <th>
                    <label for="vd_deadline">Deadline</label>
                </th>
                <td><input type="date" name="vd_deadline" id="vd_deadline" value="<?php echo $vd_deadline; ?>"></td>
            </tr>

            <!-- Department -->
            <tr class="form-field">
                <th>
                    <label for="vd_department">Department</label>
                </th>
                <td><input type="text" name="vd_department" id="vd_department" value="<?php echo $vd_department; ?>"></td>
            </tr>


        </tbody>
    </table>

    <?php
}

/////////////////////////
// Add Meta Box To CPT
add_action('admin_init', 'add_vacancies_details');
function add_vacancies_details()
{
    add_meta_box(
        'vacancy-details',
        "Vacancy Details",
        'Init_Vacancies_Details',
        "vacancy",
        'normal',
        'default',
        null
    );
}

////////////////////////
// Save Value When Save
function save_vacancies_details($post_id)
{
    $is_valid_nonce = (isset($_POST['vd_vacancies_options']) && wp_verify_nonce($_POST['vd_vacancies_options'], basename(__FILE__))) ? true : false;
    // Exits script depending on save status
    if (!$is_valid_nonce) {
        return;
    }

    if (isset($_POST['vd_is_urgent'])) {
        update_post_meta($post_id, 'vd_is_urgent', $_POST['vd_is_urgent']);
    }

    if (isset($_POST['vd_location'])) {
        update_post_meta($post_id, 'vd_location', $_POST['vd_location']);
    }

    if (isset($_POST['vd_deadline'])) {
        update_post_meta($post_id, 'vd_deadline', $_POST['vd_deadline']);
    }

    if (isset($_POST['vd_department'])) {
        update_post_meta($post_id, 'vd_department', $_POST['vd_department']);
    }
}
add_action('save_post', 'save_vacancies_details', 10, 2);