<?php
// function myprefix_give_per_form_currency($currency, $donation_or_form_id, $args)
// {

//     if (isset($_COOKIE['FormAndCurrency']) && !empty($_COOKIE['FormAndCurrency'])) {
//         $Currency_Cookies_Array = explode('|', $_COOKIE['FormAndCurrency']);
//     }
//     if (
//         !empty($Currency_Cookies_Array) &&
//         $Currency_Cookies_Array[0] == $donation_or_form_id &&
//         !empty($Currency_Cookies_Array[1])
//     ) {
//         return $Currency_Cookies_Array[1];
//     }
//     return $currency;
// }
// add_filter('give_currency', 'myprefix_give_per_form_currency', 999, 3);
// function myprefix_give_per_form_currency($currency, $donation_or_form_id)
// {

//     if (isset($_COOKIE['CustomCurrency']) && !empty($_COOKIE['CustomCurrency'])) {
//         return $_COOKIE['CustomCurrency'];
//     }
//     return $currency;
// }
// add_filter('give_currency', 'myprefix_give_per_form_currency', 10, 2);

add_action('wp_ajax_show_donate_form', 'show_donate_form');
add_action('wp_ajax_nopriv_show_donate_form', 'show_donate_form');
function show_donate_form()
{
    // Check for nonce security      
    if (!wp_verify_nonce($_POST['nonce'], 'ajax-nonce')) {
        die('Busted!');
    }

    $groups_array = [];


    $form_id = $_POST['form_id'];
    $groups_details = json_encode($_POST['groups_details']);
    $groups_details = isset($_POST['groups_details']) ? json_decode($groups_details) : '';
    //$groups_details = isset($_POST['groups_details']) ? $_POST['groups_details'] : '';
    $global_total = 0;
    foreach ($groups_details as $group_detail) {
        $global_total += intval($group_detail->total);
        array_push($groups_array, $group_detail);
    }
    $global_total = $global_total == 0 ? 1 : $global_total; // On empty set 1 Dolar by default

    $give_form = do_shortcode('[give_form id="' . $form_id . '"]', true);
    //apply_filters('give_currency', '', $form_id, ['custom_currency_form_id' => $form_id,'custom_currency_currency' => 'EUR'], 999, 3);
    if ($give_form == "") {
        wp_send_json([
            'error_message' => "No form was found",
        ], 400);
        wp_die();
    }

    // TODO: If currency variable is set
    //setcookie("FormAndCurrency", $form_id . '|KWD', time() + 3600, "/");
    setcookie("DonCampaign", $form_id, time() + 3600, "/"); // This Cookie to show thankyou page when the user return to home page
    if (isset($_POST['amount']) && empty($_POST['type'])) {
        $give_form = str_replace('?giveDonationFormInIframe=1', '?giveDonationFormInIframe=1&amount=' . $_POST['amount'], $give_form);
    }
    if (isset($_POST['type']) && $_POST['type'] === "quick_donation" && isset($_POST['charity_type'])) {
        $give_form = str_replace('?giveDonationFormInIframe=1', '?giveDonationFormInIframe=1&amount=' . $_POST['amount'] . '&description=' . $_POST['charity_type'], $give_form);
    }
    if (!empty($groups_array)) {
        $give_form = str_replace('?giveDonationFormInIframe=1', '?giveDonationFormInIframe=1&amount=' . $global_total . '&details=' . urlencode(json_encode($groups_array)) . '', $give_form);
    }


    wp_send_json([
        'give_form' => $give_form,
    ], 200);
    wp_die();
}


add_action('give_post_form_output', 'give_populate_amount', 10, 2);

function give_populate_amount($form_id, $args)
{
    ?>

    <script>
        function giveGetQueryVariable(variable) {
            var query = window.location.search.substring(1);
            var vars = query.split('&');
            for (var i = 0; i < vars.length; i++) {
                var pair = vars[i].split('=');
                if (pair[0] == variable) {
                    return pair[1];
                }
            }
            return (false);
        }
        jQuery(document).ready(function ($) {
            var getamount = giveGetQueryVariable('amount');
            var getdescription = giveGetQueryVariable('description');
            var getdetails = giveGetQueryVariable('details');
            var levelBtnContainer = document.getElementById('give-donation-level-button-wrap');
            var amount = '1.00';
            if (getamount !== false) {
                amount = getamount;
            }
            if ($('#give-amount').length > 0) {
                $('#give-amount').val(amount).focus().trigger('blur');
                let form = document.querySelector(".give-form");
                let attributeValue = form.getAttribute("data-give_cs_base_amounts");

                // Parse the attribute value as JSON
                let parsedValue = JSON.parse(attributeValue);
                if (parsedValue !== null) {

                    // Update the "custom" value
                    parsedValue.custom = parseInt(amount);

                    // Convert the updated value back to a string
                    let updatedValue = JSON.stringify(parsedValue);

                    // Set the updated attribute value
                    form.setAttribute("data-give_cs_base_amounts", updatedValue);
                }
            }
            if (getdescription != 'null' && getdescription != '' && getdescription !== false) {
                $('#give-comment').val(decodeURI(getdescription)).focus().trigger('blur');
            }
            var tableData = JSON.parse(decodeURIComponent(getdetails));
            var table = document.getElementById("donation-details");
            if (tableData) {

                if (document.dir) {
                    var headers = ['أسم المجموعة', 'الكمية', 'العدد', 'المجموع'];
                } else {
                    var headers = ['Group Name', 'Amount', 'Quantity', 'Total'];
                }
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
                        if (value.length === 0) {
                            value = "0";
                        }
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
                // Add a row with a value in the last column
                var lastRow = document.createElement("tr");
                var beforeLastCell = document.createElement("td");
                var lastCell = document.createElement("td");
                beforeLastCell.setAttribute("colspan", "2");
                beforeLastCell.classList.add("before-total-cell");
                lastCell.textContent = "$ " + amount;
                lastCell.classList.add("total-cell");
                lastCell.setAttribute("colspan", "2");
                lastRow.appendChild(beforeLastCell);
                lastRow.appendChild(lastCell);
                table.appendChild(lastRow);

                table.style.display = "block";

                //Disable All Buttons And Inputs
                levelBtnContainer.setAttribute('style', 'display:none !important');
                let buttons = document.querySelectorAll(".give-donation-level-btn");
                buttons.forEach((button) => {
                    button.disabled = true;
                });
                let input = document.querySelector(".give-text-input");
                input.readOnly = true;
            }

            document.getElementById('give-engraving-message').textContent = decodeURIComponent(getdetails);
        });
    </script>

    <?php

}


?>