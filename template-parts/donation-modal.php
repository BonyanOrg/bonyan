<div id="donation-modal" class="donation-modal user-action-modal">
    <div class="modal-window">
        <div class="user-action-content">

            <!-- User Action Image -->
            <div class="user-action-img">
                <img data-src="<?php echo get_template_directory_uri() . '/dist/imgs/login.png'; ?>" alt="" class="lazyload hide-from-mobile-down">

                <img data-src="<?php echo get_template_directory_uri() . '/dist/imgs/login-mobile.png'; ?>" alt="" class="lazyload hide-from-mobile-up">
                
                <div class="user-action-logo">
                    				<img data-src="<?php echo get_template_directory_uri() . '/dist/imgs/smile-logo.png'; ?>" alt="" class="lazyload">
                </div>
            </div>

            <div class="user-action-form">
                <!-- Back Button -->
                <div class="back-btn">
                    <i class="fa-solid fa-arrow-left"></i>
                    <span><?php _e('Back','bonyan') ?></span>
                </div>

                <!-- Title -->
                <div class="my-4">
                    <span class="bonyan-title donation-modal-title primary-color"><?php _e('To donate to this campaign please log in or continue as a guest','bonyan') ?></span>
                </div>
                

                <!-- Login Button -->
                <button class="secondary-btn py-3 px-4 w-100 border-0 user-action-btn mt-2" data-target="login-modal"><strong><?php _e('Log in','bonyan') ?></strong></button>

                <!-- Continue as a guest -->
                <button class=" secondary-outlined-btn py-3 donation-btn px-4 w-100 mt-3 primary-color user-action-btn continue-as-guest" data-qurbandetails="" data-target="givewp-modal"><strong><?php _e('Continue as a guest','bonyan') ?></strong></button>

            </div>
        </div>
    </div>
</div>