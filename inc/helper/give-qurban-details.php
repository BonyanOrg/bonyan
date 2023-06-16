<?php
function myprefix123_give_donations_custom_form_fields($form_id)
{
    //========================
    //      User Side
    //========================
    // Only display for forms with the IDs "754" and "578";
    // Remove "If" statement to display on all forms
    // For a single form, use this instead:
    // if ( $form_id == 754) {
    // $forms = array( 754, 578 );
    // if ( in_array( $form_id, $forms ) ) {
    ?>
    <div id="give-message-wrap" class="form-row form-row-wide">
        <label class="give-label" for="give-engraving-message">
            <?php _e('What should be engraved on the plaque?', 'give'); ?>
            <?php if (give_field_is_required('give_engraving_message', $form_id)): ?>
                <span class="give-required-indicator">*</span>
            <?php endif ?>
            <span class="give-tooltip give-icon give-icon-question"
                data-tooltip="<?php _e('Please provide the names that should be engraved on the plaque.', 'give') ?>">
            </span>
        </label>

        <textarea class="give-textarea" name="give_engraving_message" id="give-engraving-message" readonly
            hidden>test my text</textarea>
        <style>
            .donation-details {
                display: block;
                width: 100%;
                text-align: center;
                border-collapse: unset;
                border-radius: 10px;
                overflow: hidden;
                border-collapse: unset;
                border-radius: 10px;
                border-spacing: 0;
            }

            .donation-details th {
                padding: 8px;
                border: 1px solid #6d54a778;
                font-size: 15px;
            }

            <?php if (is_wpml_rtl()): ?>
                .donation-details th:first-child {
                    border-top-right-radius: 10px;
                }

                .donation-details th:last-child {
                    border-top-left-radius: 10px;
                }
            <?php else: ?>
                .donation-details th:first-child {
                    border-top-left-radius: 10px;
                }

                .donation-details th:last-child {
                    border-top-right-radius: 10px;
                }

            <?php endif ?>

            .donation-details td:not(.before-total-cell) {
                width: 100%;
                border: 1px solid #6d54a778;
                padding: 5px;
                font-size: 14px;
            }

            .donation-details tr .total-cell {
                font-weight: bold;
                text-align: center;
                padding: 10px 5px;
                background: #6d54a7;
                color: white;
                border-bottom-left-radius: 10px;
                border-bottom-right-radius: 10px;
            }
        </style>

        <table class="donation-details" id="donation-details" style="display:none; width:100%; text-align: center;">
        </table>

    </div>
    <?php
    // }
}
add_action('give_after_donation_levels', 'myprefix123_give_donations_custom_form_fields');


function myprefix123_give_donations_save_custom_fields($payment_id)
{

    if (isset($_POST['give_engraving_message'])) {
        $message = wp_strip_all_tags($_POST['give_engraving_message'], true);
        give_update_payment_meta($payment_id, 'give_engraving_message', $message);
    }

}

add_action('give_insert_payment', 'myprefix123_give_donations_save_custom_fields');


function myprefix123_give_donations_donation_details($payment_id)
{

    //========================
    //      Admin Side
    //========================
    $engraving_message = give_get_meta($payment_id, 'give_engraving_message', true);

    if ($engraving_message): ?>
        <style>
            .donation-details {
                margin: 5px;

            }

            .donation-details td {
                width: 100%;
                box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 1px 3px 1px;
                padding: 5px;
                text-align: center;
            }
        </style>
        <div id="give-engraving-message" class="postbox">
            <h3 class="hndle">
                <?php esc_html_e('Donation Details', 'give'); ?>
            </h3>
            <!-- <div class="inside" style="padding-bottom:10px;">
                 <?php //echo wpautop($engraving_message); ?>
             </div> -->
            <table class="donation-details" id="donation-details">

            </table>
        </div>
        <script>
            var tableData = JSON.parse(<?php echo json_encode($engraving_message); ?>);
            var table = document.getElementById("donation-details");
            var headers = ['Group Name', 'Amount', 'Quantity', 'Total'];
            // Create the table header row         
            var headerRow = document.createElement("tr");
            // Create table header cells         
            headers.forEach(function (key) {
                var th = document.createElement("th");
                th.textContent = key;
                headerRow.appendChild(th);
            });
            // Append the header row to the table         
            table.appendChild(headerRow);
            // Create table body rows and cells         
            tableData.forEach(function (rowData) {
                var row = document.createElement("tr");
                Object.values(rowData).forEach(function (value, index, array) {
                    var cell = document.createElement("td");
                    if (index === 0 && array.length > 1) {
                        // Add the value from index 1 to the value at index 0
                        value += '<br>' + array[1];
                    }
                    if (index === 1) { // if countries row (ignore) 
                        return;
                    }
                    if (index === 2 || index === Object.values(rowData).length - 1) {// Check if it's the second column Amount
                        // Add something to the value in the second column
                        value = "$ " + value;
                    }
                    cell.innerHTML = value.replace(/\+/g, ' '); // Replace the + with spaces
                    row.appendChild(cell);
                });
                // Append each row to the table             
                table.appendChild(row);
            });
        </script>

    <?php endif;

}

add_action('give_view_donation_details_billing_before', 'myprefix123_give_donations_donation_details', 10, 1);