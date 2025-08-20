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
                          <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48" fill="none">
  <path d="M10.9552 5.6362C10.7883 4.96845 10.1883 4.5 9.5 4.5C8.8117 4.5 8.21172 4.96845 8.04479 5.6362C7.83717 6.46667 7.56341 6.94027 7.25184 7.25184C6.94027 7.56341 6.46667 7.83717 5.6362 8.04478C4.96845 8.21172 4.5 8.8117 4.5 9.5C4.5 10.1883 4.96845 10.7883 5.6362 10.9552C6.46667 11.1628 6.94027 11.4366 7.25184 11.7482C7.56341 12.0597 7.83717 12.5333 8.04479 13.3638C8.21172 14.0316 8.8117 14.5 9.5 14.5C10.1883 14.5 10.7883 14.0316 10.9552 13.3638C11.1628 12.5333 11.4366 12.0597 11.7482 11.7482C12.0597 11.4366 12.5333 11.1628 13.3638 10.9552C14.0316 10.7883 14.5 10.1883 14.5 9.5C14.5 8.8117 14.0316 8.21172 13.3638 8.04478C12.5333 7.83717 12.0597 7.56341 11.7482 7.25184C11.4366 6.94027 11.1628 6.46667 10.9552 5.6362Z" fill="white"/>
  <path d="M34.9502 5.5C38.5123 5.5 40.2934 5.50007 41.542 6.40723C41.9452 6.70019 42.2998 7.05478 42.5928 7.45801C43.4999 8.7066 43.5 10.4877 43.5 14.0498V33.7832C43.5 37.3453 43.4998 39.1264 42.5928 40.375C42.2998 40.7782 41.9452 41.1328 41.542 41.4258C40.2934 42.3329 38.5123 42.333 34.9502 42.333H13.0498C9.48769 42.333 7.7066 42.3329 6.45801 41.4258C6.05484 41.1328 5.70016 40.7782 5.40723 40.375C4.50019 39.1264 4.5 37.3453 4.5 33.7832V14.0498C4.5 13.3767 4.50169 12.7672 4.50781 12.2129C5.14083 12.4741 5.57792 12.7713 5.90332 13.0967C6.40179 13.5951 6.8397 14.3531 7.17188 15.6816C7.43897 16.75 8.39872 17.5 9.5 17.5C10.6013 17.5 11.561 16.75 11.8281 15.6816C12.1603 14.3531 12.5982 13.5951 13.0967 13.0967C13.5951 12.5982 14.3531 12.1603 15.6816 11.8281C16.75 11.561 17.5 10.6013 17.5 9.5C17.5 8.39872 16.75 7.43898 15.6816 7.17188C14.3531 6.8397 13.5951 6.40178 13.0967 5.90332C12.9785 5.78512 12.8647 5.6515 12.7539 5.5H34.9502ZM16.4873 17.9385C16.2144 17.8923 15.9345 17.9033 15.666 17.9707C14.8144 18.1848 14.247 19.2309 13.1123 21.3223L8.08496 30.5879C7.86431 30.9946 7.75404 31.1981 7.67676 31.4131C7.6114 31.5949 7.56344 31.7827 7.53418 31.9736C7.49959 32.1994 7.5 32.4309 7.5 32.8936C7.5 35.1774 7.49954 36.3198 7.95215 37.1885C8.33097 37.9155 8.92432 38.5088 9.65137 38.8877C10.5201 39.3403 11.6624 39.3398 13.9463 39.3398H34.4824C36.3627 39.3398 37.3033 39.3401 38.0439 39.0303C39.0136 38.6246 39.7848 37.8535 40.1904 36.8838C40.5002 36.1431 40.5 35.2026 40.5 33.3223C40.5 32.7747 40.5001 32.5007 40.4531 32.2383C40.3915 31.8945 40.27 31.5638 40.0947 31.2617C39.9608 31.031 39.784 30.8212 39.4297 30.4033L36.501 26.9492C35.4664 25.729 34.9486 25.1192 34.2822 24.9766C34.0677 24.9307 33.8468 24.9196 33.6289 24.9453C32.9521 25.0254 32.3799 25.5859 31.2363 26.7051L29.3105 28.5898C28.027 29.8461 27.3849 30.4742 26.6475 30.5234C26.4114 30.5392 26.1742 30.5133 25.9473 30.4463C25.2386 30.2368 24.75 29.483 23.7725 27.9766L19.2959 21.0801C18.0005 19.0839 17.3532 18.085 16.4873 17.9385ZM32.5 11.5C29.7386 11.5 27.5 13.7386 27.5 16.5C27.5 19.2614 29.7386 21.5 32.5 21.5C35.2614 21.5 37.5 19.2614 37.5 16.5C37.5 13.7386 35.2614 11.5 32.5 11.5Z" fill="white"/>
</svg>
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
                          <option value="other" <?php if ($user_gender == "other") echo "selected" ?>><?php _e('Other', 'bonyan'); ?></option>
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