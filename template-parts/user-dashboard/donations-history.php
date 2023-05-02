              <!-- Start Donation History Tab Content -->
              <div class="d-none dashboard-tab-content" id="donation-history">
                  <div class="dashboard-donor-info-box with-padding pt-3">
                      <div class="donor-avatar">
                          <img src="<?php echo $user_profile_photo; ?>" alt="Donor Avatar">
                      </div>

                      <div class="donor-info">
                          <div class="donor-info-item donor-info--name">
                              <span><?php echo $user_FirstName . " " . $user_LastName; ?></span>
                          </div>

                          <div class="donor-info--others">
                              <div class="donor-info-item donor-info--company">
                                  <svg xmlns="http://www.w3.org/2000/svg" width="17.948" height="16.154" viewBox="0 0 17.948 16.154">
                                      <path id="Path_10535" data-name="Path 10535" d="M8.282,17.359h2.692V11.922l-3.59-3.13-3.59,3.13v5.437H6.487v-3.59H8.282Zm10.769,1.795H2.9a.9.9,0,0,1-.9-.9V11.514a.9.9,0,0,1,.308-.677L5.59,7.975V3.9a.9.9,0,0,1,.9-.9H19.051a.9.9,0,0,1,.9.9V18.256A.9.9,0,0,1,19.051,19.154Zm-4.487-8.974v1.795h1.795V10.179Zm0,3.59v1.795h1.795V13.769Zm0-7.179V8.385h1.795V6.59Zm-3.59,0V8.385h1.795V6.59Z" transform="translate(-2 -3)" fill="#5b5b5b" />
                                  </svg>

                                  <span><?php echo $user_company; ?></span>
                              </div>

                              <div class="donor-info-item donor-info--last-donation">
                                  <svg id="Group_3108" data-name="Group 3108" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                      <path id="Path_10536" data-name="Path 10536" d="M0,0H24V24H0Z" fill="none" />
                                      <path id="Path_10537" data-name="Path 10537" d="M12,22A10,10,0,1,1,22,12,10,10,0,0,1,12,22Zm1-10V7H11v7h6V12Z" fill="#5b5b5b" />
                                  </svg>

                                  <span>
                                      <?php
                                        echo "Last donated " . $last_donate_days . " day ago";
                                        ?>
                                  </span>
                              </div>

                              <div class="donor-info-item donor-info--first-donation-date">
                                  <svg id="Group_3109" data-name="Group 3109" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                      <path id="Path_10538" data-name="Path 10538" d="M0,0H24V24H0Z" fill="none" />
                                      <path id="Path_10539" data-name="Path 10539" d="M20,20a1,1,0,0,1-1,1H5a1,1,0,0,1-1-1V11H1L11.327,1.612a1,1,0,0,1,1.346,0L23,11H20Zm-8-3,3.359-3.359a2.25,2.25,0,0,0-3.182-3.182L12,10.636l-.177-.177a2.25,2.25,0,1,0-3.182,3.182Z" fill="#5b5b5b" />
                                  </svg>


                                  <span><?php echo "Donor For " . $donor_registered_by_days . " days" ?></span>
                              </div>
                          </div>
                      </div>
                  </div>

                  <div class="dashboard-tab-contents-holder">
                      <div class="dashboard-tab-content-section donations-history">
                          <div class="dashboard-content-section-heading mt-3 py-3">
                              <div class="dashboard-content-section-heading-title with-padding">
                                  <span><?php echo $donor->purchase_count; ?> Total Donations</span>
                              </div>
                          </div>

                          <div class="dashboard-content-section-body">
                              <div class="donations-history-values donation-history-datatable with-padding">
                                  <!-- Data Table Will Be Load Here -->
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              <!-- End Donation History Tab Content -->