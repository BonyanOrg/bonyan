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
                    <span>Back</span>
                </div>

                <!-- Title -->
                <h2 class="bonyan-title primary-color my-4">Sign Up</h2>

                <!-- Form -->
                <form id="registration_form">
                    <div class="form-inputs-container">
                        <div class="input-holder">
                            <label for="first-name">First Name</label>
                            <input type="text" name="first-name" id="registration_user_first_name" placeholder="First Name">
                        </div>

                        <div class="input-holder">
                            <label for="last-name">Last Name</label>
                            <input type="text" name="last-name" id="registration_user_last_name" placeholder="Last Name">
                        </div>

                        <div class="input-holder">
                            <label for="register-user-email">Eamil</label>
                            <input type="email" name="register-user-email" id="registration_user_email" placeholder="Email Address">
                        </div>

                        <div class="input-holder">
                            <label for="user-age">Age</label>
                            <input type="text" name="user-age" id="registration_user_age" placeholder="Your Age" class="only-number">
                        </div>

                        <div class="input-holder">
                            <label>Gender</label>

                            <div class="radio-btns-container gender">
                                <div class="gender-item">
                                    <label for="male">Male</label>

                                    <div class="radio-btn-holder">
                                        <input type="radio" name="gender" id="male">
                                        <div class="custom-radio-btn"></div>
                                    </div>
                                </div>

                                <div class="gender-item">
                                    <label for="female">Female</label>

                                    <div class="radio-btn-holder">
                                        <input type="radio" name="gender" id="female">
                                        <div class="custom-radio-btn"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="input-holder">
                            <label for="date-of-birth">Date of birth</label>
                            <input type="date" name="date-of-birth" id="registration_user_birth_date" value="<?php echo date("Y-m-d") ?>" min='<?php echo date("Y-m-d", strtotime("-100 year")) ?>' max='<?php echo date("Y-m-d", strtotime("-18 year")) ?>'>
                        </div>

                        <div class="input-holder">
                            <label for="register-user-password">Password</label>

                            <div class="password-holder">
                                <!-- To show password -->
                                <div class="show-password password-type">
                                    <i class="fa-solid fa-eye"></i>
                                </div>

                                <!-- To hide password -->
                                <div class="hide-password password-type">
                                    <i class="fa-solid fa-eye-slash"></i>
                                </div>

                                <input type="password" name="register-user-password" id="registration_user_password" placeholder="Insert Password" class="pe-5">
                            </div>
                        </div>

                        <div class="input-holder">
                            <label for="confirm-user-password">Confirm Password</label>

                            <div class="password-holder">
                                <!-- To show password -->
                                <div class="show-password password-type">
                                    <i class="fa-solid fa-eye"></i>
                                </div>

                                <!-- To hide password -->
                                <div class="hide-password password-type">
                                    <i class="fa-solid fa-eye-slash"></i>
                                </div>

                                <input type="password" name="confirm-user-password" id="registration_user_password_confirm" placeholder="Confirm Password" class="pe-5">
                            </div>
                        </div>
                    </div>

                    <div class="form-cta">
                        <button class="secondary-btn">Sign Up</button>
                    </div>

                    <div class="not-have-account">
                        <div class="user-action-btn" data-target="login-modal">Don't have account yet? <span>Sign up</span></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>