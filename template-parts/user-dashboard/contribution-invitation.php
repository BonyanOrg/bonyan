                <!-- Start Contribution Invitation Tab Content -->
                <div class="d-none dashboard-tab-content" id="contribution-invitation">
                    <div class="dashboard-tab-content-section donations-history">
                        <div class="dashboard-content-section-heading py-3">
                            <div class="dashboard-content-section-heading-title with-padding">
                                <span>Contribution Invitation</span>
                            </div>
                        </div>

                        <div class="dashboard-content-section-body">
                            <div class="with-padding">
                                <p><b>Fill the information then choose where you want to send the invitation</b></p>
                                <hr>
                            </div>
                            <div class="contribution-details-form custom-inputs with-padding">


                                <div class="select-holder">
                                    <label>Select Campaign To Contribute*</label>
                                    <select name="select_campaign_to_contribute" id="select_campaign_to_contribute">
                                        <option value="">Search For a Campaign</option>
                                    </select>
                                </div>

                                <div class="input-holder">
                                    <label for="contribution_value">Contribution Value</label>
                                    <input type="number" name="contribution_value" id="contribution_value" value="<?php echo $user_LastName  ?>">
                                </div>

                                <div class="input-holder full-width">
                                    <label for="invitation_message">Invitation Message</label>
                                    <textarea name="invitation_message" id="invitation_message" cols="30" rows="7"></textarea>
                                </div>

                                <!-- <button id="edit-save-user-information" class="primary-btn">Save</button> -->
                            </div>

                            <div class="invite-container mt-lg-4 mt-3 mb-3 with-padding">
                                <p><b>Invite Via</b></p>
                                <div class="invite-btns">
                                    <a href="#" class="invite-btn by-whatsapp" title="Invite by WhatsApp">
                                        <i class="fa-brands fa-whatsapp"></i>
                                    </a>
                                    <a href="#" class="invite-btn by-telegram" title="Invite by Telegram">
                                        <i class="fa-brands fa-telegram"></i>
                                    </a>

                                    <a href="#" class="invite-btn by-facebook" title="Invite by Facebook">
                                        <i class="fa-brands fa-facebook-f"></i>
                                    </a>

                                    <!-- <a href="#" class="invite-btn by-linkedin" title="Invite by Linkedin">
                                        <i class="fa-brands fa-linkedin-in"></i>
                                    </a> -->

                                    <!-- <a href="#" class="invite-btn by-instagram" title="Invite by Instagram">
                                        <i class="fa-brands fa-instagram"></i>
                                    </a> -->

                                    <a href="#" class="invite-btn by-twitter" title="Invite by Twitter">
                                        <i class="fa-brands fa-twitter"></i>
                                    </a>

                                    <a href="#" class="invite-btn by-gmail" title="Invite by Gmail">
                                        <i class="fa-brands fa-google"></i>
                                    </a>

                                    <a href="#" class="invite-btn by-email" title="Invite by Email">
                                        <i class="fa-solid fa-envelope"></i>
                                    </a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <script>
                    jQuery(document).ready(function($) {
                                var CampaignSelect2 = $("#select_campaign_to_contribute");
                                let massageInput = document.getElementById("invitation_message");
                                let contribution_value = document.getElementById("contribution_value");
                                var SelectedCampaignURL = "";
                                var EnteredAmount = 60;
                                var EnteredMassage = "";
                                $('.invite-btn').on('click', function() {
                                    if (SelectedCampaignURL == "") {
                                        toastr.info('Please Select Campaign');
                                    }
                                });
                                CampaignSelect2.select2({
                                    minimumInputLength: 3,
                                    language: "ar",
                                    cache: true,

                                    // dir: 'rtl',
                                    // language: {
                                    //     noMatches: () => ("لايوجد نتائج"),
                                    //     noResults: () => ("لم يتم العثور على نتائج"),
                                    //     inputTooShort: () => ("اكتب 3 أحرف على الأقل")
                                    // },
                                    ajax: {
                                        url: '<?php echo admin_url('admin-ajax.php'); ?>',
                                        type: 'POST',
                                        // dataType: 'json',
                                        data: function(term) {
                                            return {
                                                action: 'get_campaigns',
                                                nonce: '<?php echo wp_create_nonce('ajax-nonce'); ?>',
                                                term: term.term,
                                            };
                                        },
                                        processResults: function(data) {
                                            // Transforms the top-level key of the response object from 'items' to 'results'
                                            //console.log(data);
                                            return {
                                                results: data.campaigns
                                            };
                                        }
                                    },
                                });
                                CampaignSelect2.on("select2:select", function(e) {
                                    SelectedCampaignURL = e.params.data.id;
                                    setInvitationLinks(SelectedCampaignURL, EnteredAmount, EnteredMassage);
                                    //console.log(e.params.data);
                                }); // Notify only Select2 of changes


                                massageInput.addEventListener('input', function(e) {
                                    EnteredMassage = e.target.value;
                                    setInvitationLinks(SelectedCampaignURL, EnteredAmount, EnteredMassage);
                                })

                                contribution_value.addEventListener('input', function(e) {
                                    EnteredAmount = e.target.value;
                                    setInvitationLinks(SelectedCampaignURL, EnteredAmount, EnteredMassage);
                                })

                                function setInvitationLinks(campaignUrl, amount, massage) {
                                    if (SelectedCampaignURL == "") {
                                        return;
                                    }
                                    let EncodedUrl = encodeURIComponent(decodeHTMLEntities(campaignUrl) + "&amount=" + amount);
                                    $(".by-whatsapp").attr("href", "https://wa.me/?text=" + massage + " " + EncodedUrl);
                                    $(".by-telegram").attr("href", "https://t.me/share/url?url=" + EncodedUrl + "&text=" + massage);
                                    $(".by-facebook").attr("href", "http://www.facebook.com/sharer/sharer.php?u=" + encodeURIComponent(campaignUrl + "&amount=" + amount));
                                    $(".by-twitter").attr("href", "https://twitter.com/intent/tweet?text=" + massage + " " + "&url=" + EncodedUrl);
                                    $(".by-gmail").attr("href", "https://mail.google.com/mail/u/0/?view=cm&to&su=Contribution+Invitation&body=" + massage + " " + EncodedUrl + "%0A&bcc&cc&fs=1&tf=1");
                                    $(".by-email").attr("href", "mailto:?subject=Contribution Invitation&body=" + massage + " " + EncodedUrl);
                                    $(".by-linkedin").attr("href", "https://www.linkedin.com/sharing/share-offsite/?url=" + EncodedUrl);
                                    }

                                    function decodeHTMLEntities(text) {
                                        const element = document.createElement('div');
                                        element.innerHTML = text;
                                        return element.textContent;
                                    }
                                });
                </script>
                <!-- End Contribution Invitation Tab Content -->