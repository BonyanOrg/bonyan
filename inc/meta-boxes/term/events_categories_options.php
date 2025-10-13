<?php
// Add Upload fields to "Add New Taxonomy" form
function add_event_field()
{
    wp_nonce_field(basename(__FILE__), "event_cat_options");

    ?>
    <style>
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

    <div class="form-field">
        <!-- Background Color -->
        <th>
            <label for="events-categories_bgcolor"> Background Color</label>
        </th>
        <td>
            <input type="text" minlength="4" maxlength="7" placeholder="EX: #f47920" id="color_input"
                name="events-categories_bgcolor" value="#1877F2">
            <div>
                <div class="color-holder" id="color_preview"
                    style="background-color:<?php echo !empty($events_categories_bgcolor) ? $events_categories_bgcolor : '#1877F2' ?>;">
                </div>
            </div>
        </td>
    </div>
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
add_action('events-categories_add_form_fields', 'add_event_field', 10, 2);

// Add Upload fields to "Edit Taxonomy" form
function event_edit_cover_field($term)
{

    wp_nonce_field(basename(__FILE__), "event_cat_options");
    // put the term ID into a variable
    $t_id = $term->term_id;

    // retrieve the existing value(s) for this meta field. This returns an array
    $events_categories_bgcolor = get_term_meta($t_id, 'events-categories_bgcolor', true);
    $events_categories_text_color = get_term_meta($t_id, 'events-categories_text_color', true);
    $events_categories_border_color = get_term_meta($t_id, 'events-categories_border_color', true);


    ?>
    <style>
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
    <!-- Background Color -->
    <tr class="form-field">
        <th>
            <label for="events-categories_bgcolor"> Background Color</label>
        </th>
        <td>
            <input type="text" minlength="4" maxlength="7" placeholder="EX: #f47920" id="color_input"
                name="events-categories_bgcolor" value="<?php echo $events_categories_bgcolor; ?>">
            <div>
                <div class="color-holder" id="color_preview"
                    style="background-color:<?php echo !empty($events_categories_bgcolor) ? $events_categories_bgcolor : '#1877F2' ?>;">
                </div>
            </div>
        </td>
    </tr>

    <!-- Text Color -->
    <tr class="form-field">
        <th>
            <label for="events-categories_text_color"> Text Color</label>
        </th>
        <td>
            <input type="text" minlength="4" maxlength="7" placeholder="EX: #f47920" id="color_input"
                name="events-categories_text_color" value="<?php echo $events_categories_text_color; ?>">
            <div>
                <div class="color-holder" id="color_preview"
                    style="background-color:<?php echo !empty($events_categories_text_color) ? $events_categories_text_color : '#fff' ?>;">
                </div>
            </div>
        </td>
    </tr>
    <!-- Border Color -->
    <tr class="form-field">
        <th>
            <label for="events-categories_border_color"> Border Color</label>
        </th>
        <td>
            <input type="text" minlength="4" maxlength="7" placeholder="EX: #f47920" id="color_input"
                name="events-categories_border_color" value="<?php echo $events_categories_border_color; ?>">
            <div>
                <div class="color-holder" id="color_preview"
                    style="background-color:<?php echo !empty($events_categories_border_color) ? $events_categories_border_color : '#9d85d5' ?>;">
                </div>
            </div>
        </td>
    </tr>
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
add_action('events-categories_edit_form_fields', 'event_edit_cover_field', 10, 2);

// Save Taxonomy Image fields callback function.
function save_events_custom_meta($term_id)
{
    $is_valid_nonce = (isset($_POST['event_cat_options']) && wp_verify_nonce($_POST['event_cat_options'], basename(__FILE__))) ? true : false;
    // Exits script depending on save status
    if (!$is_valid_nonce) {
        return;
    }

    if (isset($_POST['events-categories_bgcolor']) && !empty($_POST['events-categories_bgcolor'])) {
        update_term_meta($term_id, 'events-categories_bgcolor', $_POST['events-categories_bgcolor']);
    }

    if (isset($_POST['events-categories_text_color']) && !empty($_POST['events-categories_text_color'])) {
        update_term_meta($term_id, 'events-categories_text_color', $_POST['events-categories_text_color']);
    }

    if (isset($_POST['events-categories_border_color']) && !empty($_POST['events-categories_border_color'])) {
        update_term_meta($term_id, 'events-categories_border_color', $_POST['events-categories_border_color']);
    }
}
add_action('edited_events-categories', 'save_events_custom_meta', 10, 2);
add_action('create_events-categories', 'save_events_custom_meta', 10, 2);