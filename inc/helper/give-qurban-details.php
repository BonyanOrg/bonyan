<?php
function add_qurbani_table_to_give_form($form_id)
{
    //========================
    //      User Side
    //========================
    ?>
    <div id="give-message-wrap" class="form-row form-row-wide">
        <textarea class="give-textarea" name="give_qurbani_details" id="qurbani-data" readonly hidden></textarea>
        <!-- Enqueue The Style Files -->
        <style>
            <?php
            if (is_wpml_rtl()) {
                include_once(get_template_directory() . '/dist/css/components/qurbani-table-rtl.css');
            } else {
                include_once(get_template_directory() . '/dist/css/components/qurbani-table.css');
            }
            ?>
        </style>


        <table class="donation-details" id="donation-details" style="display:none; width:100%; text-align: center;">
            <!-- Table Will Load Here  -->
        </table>

    </div>
    <?php
    // }
}
add_action('give_after_donation_levels', 'add_qurbani_table_to_give_form');


function save_qurbani_details_in_post_meta($payment_id)
{

    if (isset($_POST['give_qurbani_details'])) {
        $message = wp_strip_all_tags($_POST['give_qurbani_details'], true);
        give_update_payment_meta($payment_id, 'give_qurbani_details', $message);
    }

}

add_action('give_insert_payment', 'save_qurbani_details_in_post_meta');


function qurbani_donation_details($payment_id)
{

    //========================
    //      Admin Side
    //========================
    $qurbani_details = give_get_meta($payment_id, 'give_qurbani_details', true);

    if ($qurbani_details):
        // Add Table Style
        wp_enqueue_style('admin-qurbani-details-style', get_template_directory_uri() . "/dist/css/admin-qurbani-details.css", array(), '1.0');
        ?>
        <meta charset="UTF-8">
        <div id="qurbani-data" class="postbox">
            <h3 class="hndle">
                <?php esc_html_e('Donation Details', 'give'); ?>
            </h3>
            <!-- <div class="inside" style="padding-bottom:10px;">
                 <?php //echo wpautop($qurbani_details); ?>
             </div> -->
            <table class="donation-details" id="donation-details">

            </table>
        </div>

        <?php

        // Enqueue the script to be executed
        wp_enqueue_script('admin-qurbani-details-script', get_template_directory_uri() . '/dist/js/admin-qurbani-details.js', array('jquery'), '1.0', true);
        wp_localize_script(
            'admin-qurbani-details-script',
            'qurbaniObject',
            array(
                'qurbani_details' => json_encode($qurbani_details),
            )
        );
        ?>

    <?php endif;

}

add_action('give_view_donation_details_billing_before', 'qurbani_donation_details', 10, 1);