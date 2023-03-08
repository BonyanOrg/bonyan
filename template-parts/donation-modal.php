<div id="donation-modal" class="donation-modal user-action-modal">
    <div class="modal-window">
        <div class="user-action-content">

            <!-- User Action Image -->
            <div class="user-action-img">
                <img data-src="<?php echo get_template_directory_uri() . '/dist/imgs/login.png'; ?>" alt="" class="lazyload hide-from-mobile-down">

                <img data-src="<?php echo get_template_directory_uri() . '/dist/imgs/login-mobile.png'; ?>" alt="" class="lazyload hide-from-mobile-up">
                
                <div class="user-action-logo">
                    <img data-src="<?php echo get_template_directory_uri() . '/dist/imgs/bonyan-white-logo.png'; ?>" alt="" class="lazyload">
                </div>
            </div>

            <div class="user-action-form">
                <!-- Back Button -->
                <div class="back-btn">
                    <i class="fa-solid fa-arrow-left"></i>
                    <span>Back</span>
                </div>

                <!-- Title -->
                <h2 class="bonyan-title primary-color my-4">To add this campaign to your wishlist, please log in or continue as a guest</h2>

                <!-- Login Button -->
                <button class="secondary-btn py-3 px-4 w-100 border-0 user-action-btn mt-2" data-target="login-modal"><strong>Log in</strong></button>

                <!-- Continue as a guest -->
                <button class=" secondary-outlined-btn py-3 donation-btn px-4 w-100 mt-3 primary-color user-action-btn continue-as-guest" data-target="givewp-modal"><strong>Continue as a guest</strong></button>

            </div>
        </div>
    </div>
</div>