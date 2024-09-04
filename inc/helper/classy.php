<?php
function classy_donation_and_form_script() {
    ?>
    <script>
        (function (win) {
            // Function to initialize or reinitialize the campaigns
            function initClassyCampaigns() {
                var donationButtons = document.querySelectorAll('.classy-donation[data-campaign-id]');
                var donationForms = document.querySelectorAll('.classy-form[data-campaign-id]');
                var campaigns = [];

                // Helper function to configure campaigns based on type (modal or inline)
                function configureCampaign(element, type) {
                    var campaignId = element.getAttribute('data-campaign-id');
                    return {
                        campaignId: campaignId,
                        donation: type === 'modal' 
                            ? { modal: { urlParams: {}, elementSelector: '.classy-donation[data-campaign-id="' + campaignId + '"]' } }
                            : { inline: { urlParams: {}, elementSelector: '.classy-form[data-campaign-id="' + campaignId + '"]' } }
                    };
                }

                // Collect all campaigns from donation buttons and forms
                Array.from(donationButtons).forEach(button => campaigns.push(configureCampaign(button, 'modal')));
                Array.from(donationForms).forEach(form => campaigns.push(configureCampaign(form, 'inline')));

                // Update egProps if there are new campaigns
                if (campaigns.length > 0) {
                    win.egProps = { campaigns: campaigns };

                    // Ensure the embed script is only appended once
                    if (!document.querySelector('script[src="https://sdk.classy.org/embedded-giving.js"]')) {
                        win.document.body.appendChild(makeEGScript());
                    }
                }
            }

            // Function to create the embed script
            function makeEGScript() {
                var egScript = win.document.createElement('script');
                egScript.setAttribute('type', 'text/javascript');
                egScript.setAttribute('async', 'true');
                egScript.setAttribute('src', 'https://sdk.classy.org/embedded-giving.js');
                return egScript;
            }

            // Initialize campaigns on first load
            initClassyCampaigns();

            // Expose the init function globally to call it after adding new elements
            win.initClassyCampaigns = initClassyCampaigns;
        })(window);
    </script>
    <?php
}
add_action('wp_footer', 'classy_donation_and_form_script');
