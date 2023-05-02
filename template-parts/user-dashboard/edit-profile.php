  <!-- Start Edit Profile Tab Content -->
  <div class="d-none dashboard-tab-content" id="edit-profile">
      <div class="dashboard-tab-content-section donations-history">
          <div class="dashboard-content-section-heading py-3">
              <div class="dashboard-content-section-heading-title with-padding">
                  <span>Edit Profile</span>
              </div>
          </div>

          <div class="dashboard-content-section-body">
              <div class="edit-avatar with-padding">
                  <label class="dashboard-custom-upload-file" for="dashboard-upload-avatar">
                      <div class="donor-avatar">
                          <img src="<?php echo $user_profile_photo; ?>" alt="Donor Avatar">
                      </div>

                      <div class="dashboard-upload-information">
                          <span>This image here to set avatar of <span>Find Image</span></span>
                      </div>

                      <input type="file" name="dashboard-upload-avatar" id="dashboard-upload-avatar" class="dashboard-upload-file-input">
                  </label>
              </div>

              <div class="edit-donor-info-container custom-inputs with-padding">
                  <div class="select-holder">
                      <label>Prefix</label>
                      <select name="prefix" id="prefix">
                          <option value="male" <?php if ($user_gender == "male") echo "selected" ?>>Mr.</option>
                          <option value="female" <?php if ($user_gender == "female") echo "selected" ?>>Mrs.</option>
                      </select>
                  </div>

                  <div class="input-holder">
                      <label for="edit_user_info_first_name">First Name</label>
                      <input type="text" name="edit_user_info_first_name" id="edit_user_info_first_name" value="<?php echo $user_FirstName  ?>">
                  </div>

                  <div class="input-holder">
                      <label for="edit_user_info_last_name">Last Name</label>
                      <input type="text" name="edit_user_info_last_name" id="edit_user_info_last_name" value="<?php echo $user_LastName  ?>">
                  </div>

                  <div class="input-holder full-width">
                      <label for="company">Company</label>
                      <input type="text" name="edit_user_info_company" id="edit_user_info_company" value="<?php echo $user_company; ?>">
                  </div>

                  <div class="input-holder full-width">
                      <label for="edit_user_info_email">Email</label>
                      <input type="email" name="edit_user_info_email" id="edit_user_info_email" value="<?php echo $user_Email; ?>">
                  </div>

                  <button id="edit-save-user-information" class="primary-btn">Save</button>
              </div>
          </div>

      </div>
  </div>
  <!-- End Edit Profile Tab Content -->