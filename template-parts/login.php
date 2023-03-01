<div id="login-modal" class="login-modal user-action-modal">
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

            <div class="user-action-form login-form">
                <!-- Login Back Button -->
                <div class="back-btn">
                    <i class="fa-solid fa-arrow-left"></i>
                    <span>Back</span>
                </div>

                <!-- Title -->
                <h2 class="bonyan-title primary-color my-4">Login</h2>

                <!-- Form -->
                <form action="" method="">
                    <div class="input-holder">
                        <label for="user-email">Eamil</label>
                        <input type="email" name="user-email" id="user-email">
                    </div>

                    <div class="input-holder">
                        <label for="user-password">Password</label>

                        <div class="password-holder">
                            <!-- To show password -->
                            <div class="show-password password-type">
                                <i class="fa-solid fa-eye"></i>
                            </div>

                            <!-- To hide password -->
                            <div class="hide-password password-type">
                                <i class="fa-solid fa-eye-slash"></i>
                            </div>

                            <input type="password" name="user-password" id="user-password" class="pe-5">
                        </div>
                    </div>

                    <div class="forgot-password">
                        <a href="#">Forgot Password?</a>
                    </div>

                    <div class="form-cta">
                        <button class="secondary-btn">Login</button>
                    </div>

                    <div class="not-have-account">
                        <a href="#">Don't have account yet? <span>Sign up</span></a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>