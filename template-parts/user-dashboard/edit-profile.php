  <!-- Start Edit Profile Tab Content -->
  <div class="d-none dashboard-tab-content" id="edit-profile">
      <div class="dashboard-tab-content-section donations-history">
          <div class="dashboard-content-section-heading py-3">
              <div class="dashboard-content-section-heading-title with-padding">
                  <span><?php _e('Edit Profile', 'bonyan'); ?></span>
              </div>
          </div>

          <div class="dashboard-content-section-body">
              <div class="edit-avatar with-padding">
                  <label class="dashboard-custom-upload-file" for="dashboard-upload-avatar">
                      <div class="donor-avatar">
                          <img src="<?php echo $user_profile_photo; ?>" alt="Donor Avatar">
                      </div>

                      <div class="dashboard-upload-information">
                          <span><?php _e('This image here to set avatar of', 'bonyan'); ?> <span><?php _e('Find Image', 'bonyan'); ?></span></span>
                      </div>

                      <input type="file" name="dashboard-upload-avatar" id="dashboard-upload-avatar" class="dashboard-upload-file-input" accept=".jpg, .jpeg, .png">
                  </label>
              </div>

              <div class="edit-donor-info-container custom-inputs with-padding">
                  <div class="select-holder">
                      <label><?php _e('Prefix', 'bonyan'); ?></label>
                      <select name="prefix" id="prefix">
                          <option value="male" <?php if ($user_gender == "male") echo "selected" ?>><?php _e('Mr.', 'bonyan'); ?></option>
                          <option value="female" <?php if ($user_gender == "female") echo "selected" ?>><?php _e('Mrs.', 'bonyan'); ?></option>
                      </select>
                  </div>

                  <div class="input-holder">
                      <label for="edit_user_info_first_name"><?php _e('First Name', 'bonyan'); ?></label>
                      <input type="text" name="edit_user_info_first_name" id="edit_user_info_first_name" value="<?php echo $user_FirstName  ?>">
                  </div>

                  <div class="input-holder">
                      <label for="edit_user_info_last_name"><?php _e('Last Name', 'bonyan'); ?></label>
                      <input type="text" name="edit_user_info_last_name" id="edit_user_info_last_name" value="<?php echo $user_LastName  ?>">
                  </div>

                  <div class="input-holder full-width">
                      <label for="company"><?php _e('Company', 'bonyan'); ?></label>
                      <input type="text" name="edit_user_info_company" id="edit_user_info_company" value="<?php echo $user_company; ?>">
                  </div>

                  <div class="input-holder full-width">
                      <label for="edit_user_info_email"><?php _e('Email', 'bonyan'); ?></label>
                      <input type="email" name="edit_user_info_email" id="edit_user_info_email" value="<?php echo $user_Email; ?>">
                  </div>

                  <button id="edit-save-user-information" class="primary-btn"><?php _e('Save', 'bonyan'); ?></button>
              </div>
          </div>

      </div>
  </div>
  <!-- End Edit Profile Tab Content -->