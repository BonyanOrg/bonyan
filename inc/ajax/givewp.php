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
function myprefix_give_per_form_currency($currency, $donation_or_form_id)
{

    if (isset($_COOKIE['CustomCurrency']) && !empty($_COOKIE['CustomCurrency'])) {
        return $_COOKIE['CustomCurrency'];
    }
    return $currency;
}
add_filter('give_currency', 'myprefix_give_per_form_currency', 10, 2);

add_action('wp_ajax_show_donate_form', 'show_donate_form');
add_action('wp_ajax_nopriv_show_donate_form', 'show_donate_form');
function show_donate_form()
{
    // Check for nonce security      
    if (!wp_verify_nonce($_POST['nonce'], 'ajax-nonce')) {
        die('Busted!');
    }

    $groups_array = [];
    $element1 = new stdClass();
    $element1->group = "A";
    $element1->amount = 70;
    $element1->currency = "USD";
    $element1->quantity = 5;
    $element1->total = 350;
    array_push($groups_array, $element1);

    $element2 = new stdClass();
    $element2->group = "A";
    $element2->amount = 70;
    $element2->currency = "USD";
    $element2->quantity = 5;
    $element2->total = 350;
    array_push($groups_array, $element2);


    $form_id = $_POST['form_id'];

    $give_form = do_shortcode('[give_form id="' . $form_id . '"]', true);
    //apply_filters('give_currency', '', $form_id, ['custom_currency_form_id' => $form_id,'custom_currency_currency' => 'EUR'], 999, 3);
    if ($give_form == "") {
        wp_send_json([
            'error_message' => "No form was found",
        ], 400);
        wp_die();
    }

    // TODO: If currency variable is set
    setcookie("FormAndCurrency", $form_id . '|KWD', time() + 3600, "/");
    setcookie("DonCampaign", $form_id, time() + 3600, "/"); // This Cookie to show thankyou page when the user return to home page
    if (isset($_POST['amount']) && empty($_POST['type'])) {
        $give_form = str_replace('?giveDonationFormInIframe=1', '?giveDonationFormInIframe=1&amount=' . $_POST['amount'], $give_form);
    }
    if (isset($_POST['type']) && $_POST['type'] === "quick_donation" && isset($_POST['charity_type'])) {
        $give_form = str_replace('?giveDonationFormInIframe=1', '?giveDonationFormInIframe=1&amount=' . $_POST['amount'] . '&description=' . $_POST['charity_type'], $give_form);
    }
    if (!empty($groups_array)) {
        $give_form = str_replace('?giveDonationFormInIframe=1', '?giveDonationFormInIframe=1&amount=' . $_POST['amount'] . '&details=' . urlencode(json_encode($groups_array)), $give_form);
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
            var amount = '1.00';
            if (getamount !== false) {
                amount = getamount;
            }
            if ($('#give-amount').length > 0) {
                $('#give-amount').val(amount).focus().trigger('blur');
            }
            if (getdescription != 'null' && getdescription != '' && getdescription !== false) {
                $('#give-comment').val(decodeURI(getdescription)).focus().trigger('blur');
            }
            tableData = JSON.parse(decodeURIComponent(getdetails));
            var table = document.getElementById("donation-details");
            // Create the table header row         
            var headerRow = document.createElement("tr");
            // Create table header cells         
            Object.keys(tableData[0]).forEach(function (key) {
                var th = document.createElement("th");
                th.textContent = key;
                headerRow.appendChild(th);
            });
            // Append the header row to the table         
            table.appendChild(headerRow);
            // Create table body rows and cells         
            tableData.forEach(function (rowData) {
                var row = document.createElement("tr");
                Object.values(rowData).forEach(function (value) {
                    var cell = document.createElement("td");
                    cell.textContent = value;
                    row.appendChild(cell);
                });
                // Append each row to the table             
                table.appendChild(row);
            });
            table.style.display = "block";
            document.getElementById('give-engraving-message').textContent = decodeURIComponent(getdetails);
            console.log(JSON.parse(decodeURIComponent(getdetails)));
        });
    </script>

    <?php

}


?>