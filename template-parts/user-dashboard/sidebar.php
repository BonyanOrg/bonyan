<!-- Start Dashboard sidebar -->
<div class="dashboard-sidebar">
    <div class="sidebar-header">
        <div class="sidebar-logo">
            <!-- <?php the_custom_logo(); ?> -->
        </div>
        <div class="collapse-toggler">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                <path d="M0 96C0 78.3 14.3 64 32 64H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 128 0 113.7 0 96zM64 256c0-17.7 14.3-32 32-32H480c17.7 0 32 14.3 32 32s-14.3 32-32 32H96c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32s14.3-32 32-32H416c17.7 0 32 14.3 32 32z" />
            </svg>
        </div>
    </div>

    <div class="dashboard-sidebar-item active" title="<?php _e('Donor Dashboard', 'bonyan'); ?>" data-target="donor-dashboard">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
            <path id="Path_10524" data-name="Path 10524" d="M21,20a1,1,0,0,1-1,1H4a1,1,0,0,1-1-1V9.49a1,1,0,0,1,.386-.79l8-6.222a1,1,0,0,1,1.228,0l8,6.222A1,1,0,0,1,21,9.49V20Z" transform="translate(-3 -2.267)" fill="#5b5b5b" />
        </svg>

        <span><?php _e('Donor Dashboard', 'bonyan'); ?></span>
    </div>

    <div class="dashboard-sidebar-item" id="donations-history-tab-btn" title="<?php _e('Donation History', 'bonyan'); ?>" data-target="donation-history">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
            <path id="Path_10527" data-name="Path 10527" d="M12,2A10,10,0,1,1,2,12H4A8,8,0,1,0,5.385,7.5H8v2H2v-6H4V6A9.981,9.981,0,0,1,12,2Zm1,5v4.585l3.243,3.243-1.415,1.415L11,12.413V7Z" transform="translate(-2 -2)" fill="#5b5b5b" />
        </svg>

        <span><?php _e('Donation History', 'bonyan'); ?></span>
    </div>

    <div class="dashboard-sidebar-item" id="recurring-donations-tab-btn" title="<?php _e('Recurring Donations', 'bonyan'); ?>" data-target="recurring-donations">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
            <path id="Path_10558" data-name="Path 10558" d="M18.537,19.567A9.982,9.982,0,1,1,20.19,17.74L17,12h3a8,8,0,1,0-2.46,5.772Z" transform="translate(-2 -2)" fill="#5b5b5b" />
        </svg>

        <span><?php _e('Recurring Donations', 'bonyan'); ?></span>
    </div>

    <div class="dashboard-sidebar-item" title="<?php _e('Edit Profile', 'bonyan'); ?>" data-target="edit-profile">

        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
            <path id="Path_10530" data-name="Path 10530" d="M12,1l9.5,5.5v11L12,23,2.5,17.5V6.5Zm0,14a3,3,0,1,0-3-3A3,3,0,0,0,12,15Z" transform="translate(-2.5 -1)" fill="#5b5b5b" />
        </svg>

        <span><?php _e('Edit Profile', 'bonyan'); ?></span>
    </div>

    <div class="dashboard-sidebar-item" title="<?php _e('Favorite Campaign', 'bonyan'); ?>" data-target="wishlist">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="18.881" viewBox="0 0 24 18.881">
            <path id="Icon_awesome-heart" data-name="Icon awesome-heart" d="M19.483,3.539a5.763,5.763,0,0,0-7.864.573l-.83.856-.83-.856a5.763,5.763,0,0,0-7.864-.573A6.052,6.052,0,0,0,1.677,12.3l8.155,8.421a1.321,1.321,0,0,0,1.909,0L19.9,12.3a6.048,6.048,0,0,0-.413-8.762Z" transform="translate(0.001 -2.248)" fill="#5b5b5b" />
        </svg>

        <span><?php _e('Wishlist', 'bonyan'); ?></span>
    </div>

    <div class="dashboard-sidebar-item" title="Invitation to contribute" data-target="contribution-invitation">
        <svg viewBox="0 0 24 24" width="24" height="24" xmlns="http://www.w3.org/2000/svg" id="campaign" class="icon glyph" fill="#000000">
            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
            <g id="SVGRepo_iconCarrier">
                <path d="M22,4.28V15.72a2,2,0,0,1-.77,1.58,2.05,2.05,0,0,1-1.23.42,2,2,0,0,1-.48-.06L10,15.28,8.88,15H7a5,5,0,0,1-3.5-1.43A5,5,0,0,1,7,5H8.88L19.52,2.34a2,2,0,0,1,1.71.36A2,2,0,0,1,22,4.28Z" style="fill:#5b5b5b"></path>
                <path d="M10,16.31V20a2,2,0,0,1-2,2H6.82a2,2,0,0,1-2-1.61L3.8,15.08a5.68,5.68,0,0,0,1.74.74A5.9,5.9,0,0,0,7,16H8.76Z" style="fill:#5b5b5b"></path>
            </g>
        </svg>

        <span><?php _e('Contribution Invitation', 'bonyan'); ?></span>
    </div>

    <a href="<?php echo wp_logout_url() ?>" class="dashboard-sidebar-item logout">
        <svg xmlns="http://www.w3.org/2000/svg" width="19" height="20" viewBox="0 0 19 20">
            <path id="Path_10533" data-name="Path 10533" d="M4,18H6v2H18V4H6V6H4V3A1,1,0,0,1,5,2H19a1,1,0,0,1,1,1V21a1,1,0,0,1-1,1H5a1,1,0,0,1-1-1Zm2-7h7v2H6v3L1,12,6,8Z" transform="translate(-1 -2)" fill="#5b5b5b" />
        </svg>

        <span><?php _e('Logout', 'bonyan'); ?></span>
    </a>
</div>
<!-- End Dashboard sidebar -->