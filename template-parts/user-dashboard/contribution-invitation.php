<!-- Start Contribution Invitation Tab Content -->
<div class="d-none dashboard-tab-content" id="contribution-invitation">
    <div class="dashboard-tab-content-section donations-history">
        <div class="dashboard-content-section-heading py-3">
            <div class="dashboard-content-section-heading-title with-padding">
                <span>
                    <?php _e('Contribution Invitation', 'bonyan'); ?>
                </span>
            </div>
        </div>

        <div class="dashboard-content-section-body">
            <div class="with-padding">
                <p><b>
                        <?php _e('Fill the information then choose where you want to send the invitation', 'bonyan'); ?>
                    </b></p>
                <hr>
            </div>
            <div class="contribution-details-form custom-inputs with-padding">


                <div class="select-holder">
                    <label>
                        <?php _e('Select Campaign To Contribute*', 'bonyan'); ?>
                    </label>
                    <select name="select_campaign_to_contribute" id="select_campaign_to_contribute">
                        <option value="">
                            <?php _e('Search For a Campaign', 'bonyan'); ?>
                        </option>
                    </select>
                </div>

                <div class="input-holder">
                    <label for="contribution_value">
                        <?php _e('Contribution Value', 'bonyan'); ?>
                    </label>
                    <input type="number" name="contribution_value" id="contribution_value"
                        value="<?php echo $user_LastName ?>">
                </div>

                <div class="input-holder full-width">
                    <label for="invitation_message">
                        <?php _e('Invitation Message', 'bonyan'); ?>
                    </label>
                    <textarea name="invitation_message" id="invitation_message" cols="30" rows="7"></textarea>
                </div>

                <!-- <button id="edit-save-user-information" class="primary-btn">Save</button> -->
            </div>

            <div class="invite-container mt-lg-4 mt-3 mb-3 with-padding">
                <p><b>
                        <?php _e('Invite Via', 'bonyan'); ?>
                    </b></p>
                <div class="invite-btns">
                    <a href="#" target="_blank" class="invite-btn by-whatsapp"
                        title="<?php _e('Invite by WhatsApp', 'bonyan'); ?>">
                        <i class="fa-brands fa-whatsapp"></i>
                    </a>
                    <a href="#" target="_blank" class="invite-btn by-telegram"
                        title="<?php _e('Invite by Telegram', 'bonyan'); ?>">
                        <i class="fa-brands fa-telegram"></i>
                    </a>

                    <a href="#" target="_blank" class="invite-btn by-facebook"
                        title="<?php _e('Invite by Facebook', 'bonyan'); ?>">
                        <i class="fa-brands fa-facebook-f"></i>
                    </a>

                    <a href="#" target="_blank" class="invite-btn by-twitter"
                        title="<?php _e('Invite by Twitter', 'bonyan'); ?>">
                        <i class="fa-brands fa-twitter"></i>
                    </a>

                    <a href="#" target="_blank" class="invite-btn by-reddit"
                        title="<?php _e('Invite by Reddit', 'bonyan'); ?>">
                        <i class="fa-brands fa-reddit"></i>
                    </a>

                    <a href="#" target="_blank" class="invite-btn by-gmail"
                        title="<?php _e('Invite by Gmail', 'bonyan'); ?>">
                        <i class="fa-brands fa-google"></i>
                    </a>

                    <a href="#" target="_blank" class="invite-btn by-email"
                        title="<?php _e('Invite by Email', 'bonyan'); ?>">
                        <i class="fa-solid fa-envelope"></i>
                    </a>

                </div>
            </div>
        </div>

    </div>
</div>

<script>
    jQuery(document).ready(function ($) {
        var CampaignSelect2 = $("#select_campaign_to_contribute");
        let massageInput = document.getElementById("invitation_message");
        let contribution_value = document.getElementById("contribution_value");
        var SelectedCampaignURL = "";
        var EnteredAmount = 60;
        var EnteredMassage = "";
        var getDirection = document.dir;
        let getLang = document.documentElement.lang;
        switch (getLang) {
            // Arabic
            case 'ar':
                select2Sentences = {
                    noMatches: "لايوجد نتائج",
                    noResults: "لم يتم العثور على نتائج",
                    inputTooShort: "اكتب 3 أحرف على الأقل",
                    searching: "جاري البحث ...",
                    noSelectedCampaign: "يرجى تحديد الحملة",


                }
                break;

            case 'es':
                select2Sentences = {
                    noMatches: "There are no results",
                    noResults: "No results found",
                    inputTooShort: "You must enter more characters...",
                    noSelectedCampaign: "Please Select Campaign",

                }


                break;

            // English (Default)
            default: {
                select2Sentences = {
                    noMatches: "There are no results",
                    noResults: "No results found",
                    inputTooShort: "You must enter more characters...",
                    noSelectedCampaign: "Please Select Campaign",


                }
            }
        }

        $('.invite-btn').on('click', function () {
            if (SelectedCampaignURL == "") {
                toastr.info(select2Sentences.noSelectedCampaign);
            }
        });
        CampaignSelect2.select2({
            minimumInputLength: 3,
            cache: true,

            dir: getDirection == 'rtl' ? 'rtl' : 'ltr',
            language: {
                noMatches: () => (select2Sentences.noMatches),
                noResults: () => (select2Sentences.noResults),
                inputTooShort: () => (select2Sentences.inputTooShort),
                searching: () => (select2Sentences.searching)
            },
            ajax: {
                url: '<?php echo admin_url('admin-ajax.php'); ?>',
                type: 'POST',
                // dataType: 'json',
                data: function (term) {
                    return {
                        action: 'get_campaigns',
                        nonce: '<?php echo wp_create_nonce('ajax-nonce'); ?>',
                        term: term.term,
                    };
                },
                processResults: function (data) {
                    // Transforms the top-level key of the response object from 'items' to 'results'
                    return {
                        results: data.campaigns
                    };
                }
            },
        });
        CampaignSelect2.on("select2:select", function (e) {
            SelectedCampaignURL = e.params.data.id;
            setInvitationLinks(SelectedCampaignURL, EnteredAmount, EnteredMassage);
        }); // Notify only Select2 of changes


        massageInput.addEventListener('input', function (e) {
            EnteredMassage = e.target.value;
            setInvitationLinks(SelectedCampaignURL, EnteredAmount, EnteredMassage);
        })

        contribution_value.addEventListener('input', function (e) {
            EnteredAmount = e.target.value;
            setInvitationLinks(SelectedCampaignURL, EnteredAmount, EnteredMassage);
        })

        function setInvitationLinks(campaignUrl, amount, massage) {
            if (SelectedCampaignURL == "") {
                return;
            }
            massage = encodeURIComponent(massage + "\n");
            let EncodedUrl = encodeURIComponent(decodeHTMLEntities(campaignUrl) + "&amount=" + amount);
            $(".by-whatsapp").attr("href", "https://wa.me/?text=" + massage + " " + EncodedUrl);
            $(".by-telegram").attr("href", "https://t.me/share/url?url=" + EncodedUrl + "&text=" + massage);
            $(".by-facebook").attr("href", "http://www.facebook.com/sharer/sharer.php?u=" + encodeURIComponent(campaignUrl + "&amount=" + amount));
            $(".by-twitter").attr("href", "https://twitter.com/intent/tweet?text=" + massage + " " + "&url=" + EncodedUrl);
            $(".by-gmail").attr("href", "https://mail.google.com/mail/u/0/?view=cm&to&su=Contribution+Invitation&body=" + massage + " " + EncodedUrl + "%0A&bcc&cc&fs=1&tf=1");
            $(".by-email").attr("href", "mailto:?subject=Contribution Invitation&body=" + massage + " " + EncodedUrl);
            $(".by-linkedin").attr("href", "https://www.linkedin.com/sharing/share-offsite/?url=" + EncodedUrl);
            $(".by-reddit").attr("href", "https://www.reddit.com/submit?url=" + massage + " " + EncodedUrl + "&title=Contribution Invitation");
        }

        function decodeHTMLEntities(text) {
            const element = document.createElement('div');
            element.innerHTML = text;
            return element.textContent;
        }
    });
</script>
<!-- End Contribution Invitation Tab Content -->