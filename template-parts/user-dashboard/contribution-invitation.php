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
                                        <option value="campaign1">campaign1</option>
                                        <option value="campaign2">campaign2</option>
                                        <option value="campaign3">campaign3</option>
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

                                    <a href="#" class="invite-btn by-facebook" title="Invite by Facebook">
                                        <i class="fa-brands fa-facebook-f"></i>
                                    </a>

                                    <a href="#" class="invite-btn by-instagram" title="Invite by Instagram">
                                        <i class="fa-brands fa-instagram"></i>
                                    </a>

                                    <a href="#" class="invite-btn by-twitter" title="Invite by Twitter">
                                        <i class="fa-brands fa-twitter"></i>
                                    </a>

                                    <a href="#" class="invite-btn by-email" title="Invite by Email">
                                        <i class="fa-solid fa-envelope"></i>
                                    </a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- End Contribution Invitation Tab Content -->