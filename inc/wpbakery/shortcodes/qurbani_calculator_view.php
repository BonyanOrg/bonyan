<?php

/**
 * Quick Donation
 *
 */
if (!function_exists('qurbani_calculator_shortcode')) {
    function qurbani_calculator_shortcode($atts, $content)
    {
        extract(
            shortcode_atts(
                array(
                    'qurbani_calculator_title' => '',
                    'qurbani_calculator_give_form_id' => '',
                ),
                $atts
            )
        );

        $qurbani_calculator_items = vc_param_group_parse_atts($atts['qurbani_calculator_groups']);


        ob_start();
?>

        <style>
            <?php
            //========[{ Enqueue Widget Style }]========//
            if (!function_exists('qurbani_calculator_register_style')) {
                function qurbani_calculator_register_style()
                {
                    require_once(get_template_directory() . '/dist/css/components/wpb/zakat.min.css');

                    //require_once(get_template_directory() . '/dist/css/components/wpb/quick-donation.min.css');
                }
                qurbani_calculator_register_style();
            } ?>.result-container {
                opacity: 0.5;
                margin-top: 10px;
                background-color: #36363624 !important;
            }
        </style>

        <div class="zakat-calculator-container custom-widget">
            <p><strong>
                    <?= esc_html($qurbani_calculator_title); ?>
                </strong></p>
            <p class="mb-4">
                <?= wp_kses_post($content); ?>
            </p>
            <br>

            <div class="zakat-calculator-inputs">

                <?php foreach ($qurbani_calculator_items as $qurbani_calculator_item) {
                    $group_name = $qurbani_calculator_item['qurbani_calculator_group_name'];
                    $group_id = bin2hex($group_name); // Remove All special characters and spaces

                ?>
                    <div class="zakat-calculator-item">
                        <input type="text" hidden class="group-details-container <?php echo $group_id ?>">
                        <label class="mb-2" for="value-of-gold">
                            <?php echo $group_name; ?>
                        </label>
                        <p class="mb-4">
                            <?php echo $qurbani_calculator_item['qurbani_calculator_group_countries'] ?>
                        </p>
                        <input type="number" min="0" step="1" id="<?php echo $group_id ?>-quantity" onwheel="event.preventDefault()" class=" only-number" placeholder="<?php _e('Add total quantity', 'bonyan'); ?>">

                        <input type="number" min="0" step="1" id="<?php echo $group_id ?>-result" class="result-container only-number" placeholder="0.00" disabled>
                    </div>
                <?php } ?>

                <div class="zakat-calculator-result">
                    <p class="calculated-zakat-amount mb-2" id="calculated-qurban-amount"><strong><span>0.00</span>$</strong>
                    </p>
                    <button class="primary-btn " id="qurbani-donation-btn" <?php echo is_user_logged_in() ? 'data-target="givewp-modal"' : 'data-target="donation-modal"'; ?> data-amount="" data-giveformid="<?php echo $qurbani_calculator_give_form_id ?>">
                        <?php _e('Donate Now', 'bonyan'); ?>
                    </button>

                </div>
            </div>
        </div>


        <script>
            var qurban_total = document.querySelector('#calculated-qurban-amount span');
            let donationBtn = document.getElementById('qurbani-donation-btn');
            const resultContainers = document.querySelectorAll('.result-container');
            const detailsContainers = document.querySelectorAll('.group-details-container');

            var result_of_times;
            let finalResult = 0;
            let tempLastQuantity = "1";
            let tempGroupObject = {};
            let tempGroupName = "";
            let tempGroupAmount = "";
            let tempGroupId = "";
            var groups_object = new Object();

            <?php foreach ($qurbani_calculator_items as $qurbani_calculator_item) {
                $group_name = $qurbani_calculator_item['qurbani_calculator_group_name'];
                $group_id = bin2hex($group_name);
                $group_amount = $qurbani_calculator_item['qurbani_calculator_group_amount'];
                $group_countries = $qurbani_calculator_item['qurbani_calculator_group_countries'];
            ?>

                tempGroupName = '<?php echo $group_name; ?>';
                tempGroupAmount = '<?php echo $group_amount; ?>';
                tempGroupCountries = '<?php echo $group_countries; ?>';
                tempGroupId = '<?php echo $group_id; ?>' + '-quantity'; // prepare Elemet ID Convert from php to js
                tempGroupId = tempGroupId.toString(); // convert to string to make it easier to make it compatible with getElementById function

                tempGroupObject = {
                    "group": tempGroupName,
                    "countries": tempGroupCountries,
                    "amount": tempGroupAmount,
                    "quantity": 0,
                    "total": 0,
                };
                groups_object.group_<?php echo $group_id; ?> = (tempGroupObject);

                // On Enter The Value In The Text Inputs 
                document.getElementById('' + tempGroupId).addEventListener('keyup', function(event) {
                    // Get the key code for the pressed key
                    const keyCode = event.keyCode || event.which;
                    finalResult = 0;

                    // Check if the pressed key is a decimal point
                    if (keyCode === 190) {
                        // Prevent the default behavior (input of the decimal point)
                        getDir !== 'rtl' ? toastr.error("Invalid number") : toastr.error("الرقم غير صالح");
                        if (tempLastQuantity != "") { // if the saved value is not a empty string
                            this.value = tempLastQuantity; // Restore the old value
                        }
                        return;
                    }

                    tempLastQuantity = event.target.value; // Save The Value in temp variable to restore it after input `.` in the filed

                    // Handle the keyup event here
                    result_of_times = (event.target.value * <?php echo $group_amount ?>).toFixed(2);
                    document.getElementById('<?php echo $group_id . '-result' ?>').value = result_of_times;
                    resultContainers.forEach(container => { // Get the result container and there values
                        if (container.value !== "") {

                            finalResult = parseInt(finalResult) + parseInt(container.value);
                        }
                    });
                    qurban_total.innerHTML = parseInt(finalResult).toFixed(2);
                    donationBtn.setAttribute('data-amount', Math.round(finalResult));
                    detailsContainers.forEach(container => { // Get the result container and there values
                        if (container.value !== "") {

                            finalResult = parseInt(finalResult) + parseInt(container.value);
                        }
                    });
                    let group_total = Math.round(parseInt(tempLastQuantity) * groups_object.group_<?php echo $group_id; ?>.amount);
                    groups_object.group_<?php echo $group_id; ?>.total = (isNaN(group_total) || group_total === null || group_total === undefined || group_total === '') ? 0 : group_total;
                    groups_object.group_<?php echo $group_id; ?>.quantity = tempLastQuantity;
                });

            <?php
            } ?>
                (function($) {

                    let modalBtn = document.getElementById('qurbani-donation-btn');
                    let cartToJson = "";
                    let getDir = document.dir;

                    if (modalBtn !== null) {
                        let targetedModalName;
                        let targetedModal;
                        let giveFormId;
                        let amount;
                        let charityTagName;

                        modalBtn.addEventListener('click', function() {
                            // e.preventDefault();
                            targetedModalName = modalBtn.getAttribute('data-target');
                            targetedModal = document.getElementById(targetedModalName);
                            giveFormId = this.getAttribute('data-giveformid');
                            amount = this.getAttribute('data-amount');
                            charityTagName = this.getAttribute('data-tagName');

                            // Check if this is donation button then check if the giveFormId not exist so don't open modal

                            if (amount == 0 || amount == null || amount == "") {
                                getDir !== 'rtl' ? toastr.info("Please Select Something") : toastr.info("الرجاء التحديد");
                                return;
                            }
                            if (!giveFormId) {
                                toastr.warning('No form ID was found');
                                return;
                            }

                            let continueAsGuest = document.querySelector('.continue-as-guest');
                            continueAsGuest.setAttribute('data-giveformid', giveFormId);
                            continueAsGuest.setAttribute('data-amount', amount === null ? 50 : amount);
                            continueAsGuest.setAttribute('data-tagName', charityTagName);
                            if (targetedModalName == "donation-modal") {
                                continueAsGuest.setAttribute('data-qurbandetails', JSON.stringify(groups_object));
                            }
                            console.log(groups_object);
                            // Send Request Contain The Groups Details
                            if (targetedModalName !== null && targetedModalName == "givewp-modal") {
                                $("#givewp-modal").empty(); // Clear All The Forms In the Container
                                $.ajax({
                                    dataType: "json",
                                    method: "POST",
                                    url: ajax_script_object.ajaxurl,
                                    data: {
                                        action: "show_donate_form",
                                        nonce: ajax_script_object.nonce,
                                        form_id: giveFormId,
                                        groups_details: groups_object,
                                    },
                                    statusCode: {
                                        400: function(data) {
                                            toastr.error(data.responseJSON.error_message);

                                        },
                                        200: function(data) {
                                            $("#give_form_container").remove(); // Clear The Container On Success
                                            $("#givewp-modal").append(`<div id="give_form_container"> ${data.give_form} </div>`);
                                        },
                                    },

                                });
                            }

                            // Open The Modal If It Is Exist
                            if (targetedModal !== null) {
                                // If already a modal opened
                                if (document.body.classList.contains('modal-active')) {
                                    document.querySelectorAll('.user-action-modal').forEach((userActionModal) => {
                                        userActionModal.classList.remove('opened');
                                        userActionModal.closest('body').classList.remove('modal-active');
                                        userActionModal.style.display = 'none';
                                        userActionModal.style.opacity = '0';
                                    });
                                }

                                // Open
                                targetedModal.classList.add('opened');
                                targetedModal.closest('body').classList.add('modal-active');
                                targetedModal.style.display = 'flex';

                                setTimeout(() => {
                                    targetedModal.style.opacity = '1';
                                }, 100);
                            }

                            // Reset qurbani donation details on close the modal
                            if (targetedModal !== null) {
                                targetedModal.addEventListener('click', function(e) {
                                    if (e.target.classList.contains(targetedModalName) || e.target.classList.contains('back-btn')) {
                                        targetedModal.classList.remove('opened');
                                        targetedModal.closest('body').classList.remove('modal-active');
                                        targetedModal.style.opacity = '0';
                                        continueAsGuest.setAttribute('data-qurbandetails', ""); // Reset Qurban Details (for normal donations)

                                        setTimeout(() => {
                                            targetedModal.style.display = 'none';
                                        }, 300);
                                    }
                                });
                            }
                        });
                    }

                })(jQuery);
        </script>
<?php
        return ob_get_clean();
    }
}

add_shortcode('qurbani_calculator', 'qurbani_calculator_shortcode');
