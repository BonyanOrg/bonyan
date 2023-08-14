<div id="signup-modal" class="signup-modal user-action-modal">
    <div class="modal-window">
        <div class="user-action-content login-content">

            <!-- User Action Image -->
            <div class="user-action-img">
                <img data-src="<?php echo get_template_directory_uri() . '/dist/imgs/login.png'; ?>" alt="" class="lazyload hide-from-mobile-down">

                <img data-src="<?php echo get_template_directory_uri() . '/dist/imgs/login-mobile.png'; ?>" alt="" class="lazyload hide-from-mobile-up">

                <div class="user-action-logo">
                    <img data-src="<?php echo get_template_directory_uri() . '/dist/imgs/bonyan-white-logo.png'; ?>" alt="" class="lazyload">
                </div>
            </div>

            <div class="user-action-form signup-form">
                <div class="loader"></div>
                <!-- Login Back Button -->
                <div class="back-btn-helper user-action-btn" data-target="login-modal">
                    <i class="fa-solid fa-arrow-left"></i>
                    <span><?php _e('Back','bonyan') ?></span>
                </div>

                <!-- Title -->
                <div class="bonyan-title primary-color my-4"><span><?php _e('Sign Up','bonyan') ?></span></div>

                <!-- Form -->
                <form id="registration_form">
                    <div class="form-inputs-container">
                        <div class="input-holder">
                            <label for="first-name"><?php _e('First Name','bonyan') ?></label>
                            <input type="text" name="first-name" id="registration_user_first_name" placeholder="<?php _e('First Name','bonyan') ?>">
                        </div>

                        <div class="input-holder">
                            <label for="last-name"><?php _e('Last Name','bonyan') ?></label>
                            <input type="text" name="last-name" id="registration_user_last_name" placeholder="<?php _e('Last Name','bonyan') ?>">
                        </div>

                        <div class="input-holder">
                            <label for="register-user-email"><?php _e('Eamil','bonyan') ?></label>
                            <input type="email" name="register-user-email" id="registration_user_email" placeholder="<?php _e('Email Address','bonyan') ?>">
                        </div>

                        <!-- <div class="input-holder">
                            <label for="user-age"><?php // _e('Age','bonyan') ?></label>
                            <input type="text" name="user-age" id="registration_user_age" placeholder="<?php _e('Your Age','bonyan') ?>" class="only-number">
                        </div> -->

                        <div class="input-holder">
                            <label><?php _e('Gender','bonyan') ?></label>

                            <div class="radio-btns-container gender">
                                <div class="gender-item">
                                    <label for="male"><?php _e('Male','bonyan') ?></label>

                                    <div class="radio-btn-holder">
                                        <input type="radio" name="gender" id="male">
                                        <div class="custom-radio-btn"></div>
                                    </div>
                                </div>

                                <div class="gender-item">
                                    <label for="female"><?php _e('Female','bonyan') ?></label>

                                    <div class="radio-btn-holder">
                                        <input type="radio" name="gender" id="female">
                                        <div class="custom-radio-btn"></div>
                                    </div>
                                </div>
                                <div class="gender-item">
                                    <label for="other"><?php _e('Other','bonyan') ?></label>

                                    <div class="radio-btn-holder">
                                        <input type="radio" name="gender" id="other">
                                        <div class="custom-radio-btn"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="input-holder">
                            <label for="date-of-birth"><?php _e('Date of birth','bonyan') ?></label>
                            <input type="date" name="date-of-birth" id="registration_user_birth_date">
                        </div>

                        <div class="input-holder">
                            <label for="register-user-password"> <?php _e('Password','bonyan') ?></label>

                            <div class="password-holder">
                                <!-- To show password -->
                                <div class="show-password password-type">
                                    <i class="fa-solid fa-eye"></i>
                                </div>

                                <!-- To hide password -->
                                <div class="hide-password password-type">
                                    <i class="fa-solid fa-eye-slash"></i>
                                </div>

                                <input type="password" name="register-user-password" id="registration_user_password" placeholder="<?php _e('Insert Password','bonyan') ?>" class="pe-5">
                            </div>
                        </div>

                        <div class="input-holder">
                            <label for="confirm-user-password"><?php _e('Confirm Password','bonyan') ?></label>

                            <div class="password-holder">
                                <!-- To show password -->
                                <div class="show-password password-type">
                                    <i class="fa-solid fa-eye"></i>
                                </div>

                                <!-- To hide password -->
                                <div class="hide-password password-type">
                                    <i class="fa-solid fa-eye-slash"></i>
                                </div>

                                <input type="password" name="confirm-user-password" id="registration_user_password_confirm" placeholder="<?php _e('Confirm Password','bonyan') ?>" class="pe-5">
                            </div>
                        </div>
                    </div>

                    <div class="form-cta">
                        <button class="secondary-btn"><?php _e('Sign Up','bonyan') ?></button>
                    </div>

                    <div class="not-have-account">
                        <div class="user-action-btn" data-target="login-modal"><?php _e('Already have account? ','bonyan') ?><span><?php _e('Login','bonyan') ?></span></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>