<?php

add_action('wp_ajax_show_donate_form', 'show_donate_form');
add_action('wp_ajax_nopriv_show_donate_form', 'show_donate_form');
function show_donate_form()
{

    $form_id = $_POST['form_id'];
    $give_form =  do_shortcode('[give_form id="' . $form_id . '"]', true);
    $give_form = str_replace('?giveDonationFormInIframe=1', '?giveDonationFormInIframe=1&amount=' . $_POST['amount'], $give_form);

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

        jQuery(document).ready(function($) {
            var getamount = giveGetQueryVariable('amount');
            var amount = '1.00';
            if (getamount !== false) {
                amount = getamount;
            }
            if ($('#give-amount').length > 0) {
                $('#give-amount')
                    .val(amount)
                    .focus()
                    .trigger('blur');
            }

        });
    </script>

<?php

}


?>