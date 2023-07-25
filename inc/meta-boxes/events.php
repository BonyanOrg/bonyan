<?php

// evento => event Options

///////////////////////////////////
// event Options

function Init_event_Options($post)
{
    wp_nonce_field(basename(__FILE__), "evento_event_options");
    $evento_location = get_post_meta($post->ID, "evento_location", true);
    $evento_startDate = get_post_meta($post->ID, "evento_startDate", true);
    $evento_endDate = get_post_meta($post->ID, "evento_endDate", true);
    $evento_bgcolor = get_post_meta($post->ID, "evento_bgcolor", true);

    ?>

    <style>
        .evento_table tbody tr td input:not([type='checkbox']) {
            width: 350px;
        }

        .evento_table tbody tr td input {
            margin-left: 30px;
        }

        .color-holder {
            display: flex;
            width: 65px;
            height: 25px;
            background: #fff;
            overflow: hidden;
            border: 2px solid #007cba;
            justify-content: center;
            align-items: center;
            padding: 3px;
            border-radius: 3px;
            margin: 5px 3px;
        }
    </style>


    <table class="evento_table">
        <tbody>


            <!-- Location -->
            <tr class="form-field">
                <th>
                    <label for="evento_location">Location</label>
                </th>
                <td><input type="text" name="evento_location" id="evento_location" value="<?php echo $evento_location; ?>">
                </td>
            </tr>

            <!-- Start Date -->
            <tr class="form-field">
                <th>
                    <label for="evento_startDate">Start Date</label>
                </th>
                <td><input type="datetime-local" name="evento_startDate" id="evento_startDate"
                        value="<?php echo $evento_startDate; ?>">
                </td>
            </tr>

            <!-- End Date -->
            <tr class="form-field">
                <th>
                    <label for="evento_endDate">End Date</label>
                </th>
                <td><input type="datetime-local" name="evento_endDate" id="evento_endDate"
                        value="<?php echo $evento_endDate; ?>">
                </td>
            </tr>
            <!-- Background Color -->
            <tr class="form-field">
                <th>
                    <label for="evento_bgcolor"> Background Color</label>
                </th>
                <td>
                    <input type="text" minlength="4" maxlength="7" placeholder="EX: #f47920" id="color_input"
                        name="evento_bgcolor" value="<?php echo !empty($evento_bgcolor) ? $evento_bgcolor : '#6D54A7';
                        ?>">
                    <div>
                        <div class="color-holder" id="color_preview"
                            style="background-color:<?php echo !empty($evento_bgcolor) ? $evento_bgcolor : '#6D54A7' ?>;">
                        </div>
                    </div>
                </td>
            </tr>

        </tbody>
    </table>

    <script>
        // change color on input change
        jQuery(document).on('keyup input change', '#color_input', function (e) {
            e.preventDefault();
            const td_parent = this.parentElement;
            let color_preview_holder = td_parent.querySelector('.color-holder')
            color_preview_holder.style.backgroundColor = this.value;
        });
    </script>

    <?php
}

/////////////////////////
// Add Meta Box evento CPT
add_action('admin_init', 'add_event_options');
function add_event_options()
{
    add_meta_box(
        'event-options',
        "Event Options",
        'Init_event_Options',
        "events",
        'normal',
        'default',
        null
    );
}

////////////////////////
// Save Value When Save
function save_event_options($post_id, $post)
{
    $is_valid_nonce = (isset($_POST['evento_event_options']) && wp_verify_nonce($_POST['evento_event_options'], basename(__FILE__))) ? true : false;
    // Exits script depending on save status
    if (!$is_valid_nonce) {
        return;
    }


    if ($post->post_type == "events") {


        if (isset($_POST['evento_location'])) {
            update_post_meta($post_id, 'evento_location', $_POST['evento_location']);
        }

        if (isset($_POST['evento_startDate'])) {
            update_post_meta($post_id, 'evento_startDate', $_POST['evento_startDate']);
        }

        if (isset($_POST['evento_endDate'])) {
            update_post_meta($post_id, 'evento_endDate', $_POST['evento_endDate']);
        }

        if (isset($_POST['evento_bgcolor'])) {
            update_post_meta($post_id, 'evento_bgcolor', $_POST['evento_bgcolor']);
        }
    }


}
add_action('save_post', 'save_event_options', 10, 2);