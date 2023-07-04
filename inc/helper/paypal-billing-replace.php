<?php
add_action('give_post_form_output', 'replace_billing_details', 10, 2);

function replace_billing_details($form_id, $args)
{
    ?>
    <script>
        jQuery(document).ready(function ($) {
            var billingFieldsSectionLabel = document.querySelector('.paypal-commerce_billing_fields_section_label');
            var veCcAddressFieldset = document.querySelector('#give_cc_address');
            var veCcFields61Fieldset = document.querySelector('#give_cc_fields-<?php echo $form_id; ?>');
            var givePurchaseFormWrap = document.querySelector('#give_purchase_form_wrap');

            if (billingFieldsSectionLabel && veCcAddressFieldset && veCcFields61Fieldset && givePurchaseFormWrap) {
                givePurchaseFormWrap.insertBefore(billingFieldsSectionLabel, veCcFields61Fieldset);
                givePurchaseFormWrap.insertBefore(veCcAddressFieldset, veCcFields61Fieldset);
            }
        });
    </script>
    <?php
}