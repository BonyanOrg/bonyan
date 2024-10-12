<?php
function classy_donation_and_form_script()
{
?>
    <script>
        //     (function (win) {
        //     // Function to initialize or reinitialize the campaigns
        //     function initClassyCampaigns() {
        //         // Remove the existing embed script if present
        //         removeExistingClassyScript();

        //         // Clear the egProps before re-initializing
        //         if (win.egProps) {
        //             win.egProps.campaigns = [];
        //         }

        //         var donationButtons = document.querySelectorAll('.classy-donation[data-campaign-id]');
        //         var donationForms = document.querySelectorAll('.classy-form[data-campaign-id]');
        //         var campaigns = [];

        //         // Helper function to configure campaigns based on type (modal or inline)
        //         function configureCampaign(element, type) {
        //             var campaignId = element.getAttribute('data-campaign-id');
        //             return {
        //                 campaignId: campaignId,
        //                 donation: type === 'modal'
        //                     ? {
        //                           modal: {
        //                               urlParams: readURLParams(),
        //                               elementSelector: '.classy-donation[data-campaign-id="' + campaignId + '"]',
        //                           },
        //                       }
        //                     : {
        //                           inline: {
        //                               urlParams: {},
        //                               elementSelector: '.classy-form[data-campaign-id="' + campaignId + '"]',
        //                           },
        //                       },
        //             };
        //         }

        //         // Collect all campaigns from donation buttons and forms
        //         Array.from(donationButtons).forEach((button) => campaigns.push(configureCampaign(button, 'modal')));
        //         Array.from(donationForms).forEach((form) => campaigns.push(configureCampaign(form, 'inline')));

        //         // Update egProps if there are new campaigns
        //         if (campaigns.length > 0) {
        //             win.egProps = { campaigns: campaigns };

        //             // Append the embed script after removing the old one
        //             win.document.body.appendChild(makeEGScript());
        //             console.log('Classy campaigns reinitialized');
        //         }
        //     }

        //     // Function to create the embed script
        //     function makeEGScript() {
        //         var egScript = win.document.createElement('script');
        //         egScript.setAttribute('type', 'text/javascript');
        //         egScript.setAttribute('async', 'true');
        //         egScript.setAttribute('src', 'https://sdk.classy.org/embedded-giving.js');
        //         return egScript;
        //     }

        //     // Function to remove existing embed script to avoid caching issues
        //     function removeExistingClassyScript() {
        //         var existingScript = document.querySelector('script[src="https://sdk.classy.org/embedded-giving.js"]');
        //         if (existingScript) {
        //             existingScript.remove();
        //         }

        //         // Optionally clear any event listeners or data associated with classy elements
        //         document.querySelectorAll('.classy-donation, .classy-form').forEach((element) => {
        //             element.replaceWith(element.cloneNode(true)); // Clone and replace to remove listeners
        //         });
        //     }

        //     // Function to read URL params
        //     function readURLParams() {
        //         const searchParams = new URLSearchParams(location.search);
        //         const validUrlParams = ['c_src', 'c_src2', 'amount', 'recurring', 'designation'];
        //         return validUrlParams.reduce(function toURLParamsMap(urlParamsSoFar, validKey) {
        //             const value = searchParams.get(validKey);
        //             console.log(value);
        //             return value === null ? urlParamsSoFar : { ...urlParamsSoFar, [validKey]: value };
        //         }, {});
        //     }

        //     // Initialize campaigns on first load
        //     initClassyCampaigns();

        //     // Expose the init function globally to call it after adding new elements
        //     win.initClassyCampaigns = initClassyCampaigns;
        // })(window);

        (function(win) {
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
                        donation: type === 'modal' ? {
                            modal: {
                                // lazyLoad: true,
                                urlParams: readURLParams(),
                                elementSelector: '.classy-donation[data-campaign-id="' + campaignId + '"]'
                            }
                        } : {
                            inline: {
                                urlParams: {},
                                elementSelector: '.classy-form[data-campaign-id="' + campaignId + '"]'
                            }
                        }
                    };
                }

                // Collect all campaigns from donation buttons and forms
                Array.from(donationButtons).forEach(button => campaigns.push(configureCampaign(button, 'modal')));
                Array.from(donationForms).forEach(form => campaigns.push(configureCampaign(form, 'inline')));

                // Update egProps if there are new campaigns
                if (campaigns.length > 0) {
                    win.egProps = {
                        campaigns: campaigns
                    };

                    // Ensure the embed script is only appended once
                    if (!document.querySelector('script[src="https://sdk.classy.org/embedded-giving.js"]')) {
                        win.document.body.appendChild(makeEGScript());
                        console.log('done');
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

            function readURLParams() {
                const searchParams = new URLSearchParams(location.search)
                const validUrlParams = ['c_src', 'c_src2', 'amount', 'recurring', 'designation']
                return validUrlParams.reduce(function toURLParamsMap(urlParamsSoFar, validKey) {
                    const value = searchParams.get(validKey)
                    console.log(value)
                    return value === null ? urlParamsSoFar : {
                        ...urlParamsSoFar,
                        [validKey]: value
                    }
                }, {})
            }

            // Initialize campaigns on first load
            initClassyCampaigns();

            // Expose the init function globally to call it after adding new elements
            win.initClassyCampaigns = initClassyCampaigns;
        })(window);
    </script>
<?php
}
add_action('wp_footer', 'classy_donation_and_form_script', 1);
