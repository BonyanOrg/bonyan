<?php get_header();
/* Template Name: Donor-Dashboard */


// ====[USER DATA INIT]==== //
if (!is_user_logged_in()) {

?>
    <h1 align="center"> <?php _e('You Must Login To See Your Dashboard', 'bonyan'); ?></h1>
    <script>
        window.location.href = "<?php echo home_url('/') ?>";
    </script>
<?php
}

$user_FirstName = get_user_meta($userdata->ID, 'first_name', true) ?? "First Name";
$user_LastName = get_user_meta($userdata->ID, 'last_name', true) ?? "Last Name";
$user_Website = $user_url ?? "www.2p.com.tr";
$user_Email = $user_email ?? "info@2p.com.tr";
$user_birth_date = ($user_birth_date = get_user_meta($userdata->ID, 'birth_date', true)) ? $user_birth_date : '';
$user_age = ($user_age = get_user_meta($userdata->ID, 'age', true)) ? $user_age : '';
//$user_city = ($user_city = get_user_meta($userdata->ID, 'city', true)) ? $user_city : '';
//$user_country = ($user_country = get_user_meta($userdata->ID, 'country', true)) ? $user_country : '';
//$user_address = ($user_address = get_user_meta($userdata->ID, 'address', true)) ? $user_address : '';
$user_mobile_number = ($user_mobile_number = get_user_meta($userdata->ID, 'mobile_number', true)) ? $user_mobile_number : '';
$user_profile_photo = ($user_profile_photo = get_user_meta($userdata->ID, 'user_profile_photo', true)) ? $user_profile_photo : 'https://via.placeholder.com/180x180';
$facebook_url = ($facebook_url = get_user_meta($userdata->ID, 'facebook_url', true)) ? $facebook_url : '';
$twitter_url = ($twitter_url = get_user_meta($userdata->ID, 'twitter_url', true)) ? $twitter_url : '';
$instagram_url = ($instagram_url = get_user_meta($userdata->ID, 'instagram_url', true)) ? $instagram_url : '';







?>
<?php echo get_template_part('template-parts/page-header'); ?>

<section class="dashboard">
    <!-- Start Dashboard Tabs -->
    <div class="dashboard-tabs">
        <div class="container">
            <div class="dashboard-tabs--container">
                <!-- Start My Account Tab -->
                <div class="dashboard-tab-item my-account-tab active-tab" data-target="my-account">
                    <div class="tab-title">
                        <h2><?php _e('My Account', 'bonyan'); ?></h2>
                    </div>
                </div>
                <!-- End My Account Tab -->

                <!-- Start Donations Tab -->
                <div class="dashboard-tab-item donations-tab" data-target="donations" id="user-donations-tab">
                    <div class="tab-title">
                        <h2><?php _e('Donations', 'bonyan'); ?></h2>
                    </div>
                </div>
                <!-- End Donations Tab -->

                <!-- Start Favorite Campaign Tab -->
                <div class="dashboard-tab-item donations-tab" data-target="favorite-campaigns" id="user-favorite-campaigns-tab">
                    <div class="tab-title">
                        <h2><?php _e('Favorite Campaigns', 'bonyan'); ?></h2>
                    </div>
                </div>
                <!-- End Donations Tab -->


                <div class="logout ms-auto">
                    <a href="<?php echo wp_logout_url() ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" width="33" height="34.737" viewBox="0 0 33 34.737">
                            <path id="Path_10640" data-name="Path 10640" d="M6.211,29.789H9.684v3.474H30.526V5.474H9.684V8.947H6.211V3.737A1.737,1.737,0,0,1,7.947,2H32.263A1.737,1.737,0,0,1,34,3.737V35a1.737,1.737,0,0,1-1.737,1.737H7.947A1.737,1.737,0,0,1,6.211,35ZM9.684,17.632H21.842v3.474H9.684v5.211L1,19.368l8.684-6.947Z" transform="translate(-1 -2)" fill="#f47920" />
                        </svg>

                        <span><?php _e('Logout', 'bonyan'); ?></span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- End Dashboard Tabs -->

    <!-- Start Dashboard Tabs Contents -->
    <div class="dashboard-tabs-contents">
        <div class="container">

            <!-- Start my account content -->
            <div class="active-tab-content dashboard-tab-content" id="my-account">
                <div class="loader"></div>
                <div class="tab-content-title">
                    <h3><?php _e('User Information', 'bonyan'); ?></h3>
                    <button class="ms-auto view-mode edit-user-info-btn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20.141" height="22.346" viewBox="0 0 20.141 22.346">
                            <path id="Path_10661" data-name="Path 10661" d="M6.82,17.661,18.168,6.313,16.586,4.731,5.238,16.079v1.582ZM7.748,19.9H3V15.152L15.795,2.357a1.119,1.119,0,0,1,1.582,0l3.165,3.165a1.119,1.119,0,0,1,0,1.582ZM3,22.137H23.141v2.238H3Z" transform="translate(-3 -2.029)" fill="#009b89" />
                        </svg>

                        <?php _e('Edit', 'bonyan'); ?>
                    </button>

                    <div class="btns-edit-mode edit-mode-input ms-auto">
                        <button id="cancel-user-information-edit" class="primary-btn"><?php _e('Cancle', 'bonyan'); ?></button>
                        <button id="save-user-information-edit" class="primary-btn"><?php _e('Save', 'bonyan'); ?></button>
                    </div>
                </div>

                <div class="tab-content-details user-information">
                    <div class="user-information-item avatar-container">
                        <img id="user-avatar" src="<?php echo $user_profile_photo ?>" alt="Avatar">
                        <input type="file" id="user-avatar-input" class="edit-mode-input mt-3" accept=".jpg, .jpeg, .png">
                    </div>

                    <div class="user-information-items">
                        <div class="user-information-item user-first-name">
                            <h4><?php _e('First Name', 'bonyan'); ?></h4>
                            <p class="user-information-item-content view-mode"><?php echo $user_FirstName ?></p>
                            <input type="text" value="<?php echo $user_FirstName ?>" class="edit-mode-input" id="first-name-input">
                        </div>

                        <div class="user-information-item user-last-name">
                            <h4><?php _e('Last Name', 'bonyan'); ?></h4>
                            <p class="user-information-item-content view-mode"><?php echo $user_LastName ?></p>
                            <input type="text" value="<?php echo $user_LastName ?>" class="edit-mode-input" id="last-name-input">
                        </div>

                        <div class="user-information-item user-mobile-number">
                            <h4><?php _e('Mobile Number', 'bonyan'); ?></h4>
                            <p class="user-information-item-content view-mode"><?php echo $user_mobile_number ?></p>
                            <input type="text" value="<?php echo $user_mobile_number ?>" class="edit-mode-input" id="phone-input">
                        </div>

                        <div class="user-information-item user-email-address">
                            <h4><?php _e('Email Address', 'bonyan'); ?></h4>
                            <p class="user-information-item-content view-mode"><?php echo $user_Email ?></p>
                            <input type="text" value="<?php echo $user_Email ?>" class="edit-mode-input" id="email-input">
                        </div>
                    </div>

                    <div class="user-information-items">
                        <div class="user-information-item user-website">
                            <h4><?php _e('Website', 'bonyan'); ?></h4>
                            <p class="user-information-item-content view-mode"><a href="https://<?php echo $user_Website ?>" target="_blank"><?php echo $user_Website ?></a></p>
                            <input type="text" value="<?php echo $user_Website ?>" class="edit-mode-input" id="website-input">
                        </div>

                        <div class="user-information-item user-socialmedia">
                            <h4><?php _e('Social Media Profiles', 'bonyan'); ?></h4>
                            <div class="user-socialmedia-container view-mode">
                                <div class="user-socialmedia-item user-social-facebook">
                                    <a <?php if (!empty($instagram_url)) : ?>href="<?php echo $facebook_url ?>" <?php endif; ?> target="_blank">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                                            <path d="M279.14 288l14.22-92.66h-88.91v-60.13c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S260.43 0 225.36 0c-73.22 0-121.08 44.38-121.08 124.72v70.62H22.89V288h81.39v224h100.17V288z" />
                                        </svg>
                                    </a>
                                </div>

                                <div class="user-socialmedia-item user-social-instagram">
                                    <a <?php if (!empty($instagram_url)) : ?> href="<?php echo $instagram_url ?>" <?php endif; ?> target="_blank">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                                            <path d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z" />
                                        </svg>
                                    </a>
                                </div>

                                <div class="user-socialmedia-item user-social-twitter">
                                    <a <?php if (!empty($twitter_url)) : ?> href="<?php echo $twitter_url ?>" <?php endif; ?> target="_blank">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                                            <path d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z" />
                                        </svg>
                                    </a>
                                </div>
                            </div>

                            <div class="user-socialmedia-edit-mode edit-mode-input">
                                <div class="user-socialmedia-edit-items">
                                    <div class="social-option first-social-option-container">
                                        <input type="url" value="<?php echo $facebook_url ?>" placeholder="<?php _e('Facebbok URL', 'bonyan'); ?>" id="facebook-input">
                                    </div>

                                    <div class="social-option second-social-option-container">
                                        <input type="url" value="<?php echo $instagram_url ?>" placeholder="<?php _e('Instagram URL', 'bonyan'); ?>" id="instagram-input">
                                    </div>

                                    <div class="social-option third-social-option-container">
                                        <input type="url" value="<?php echo $twitter_url ?>" placeholder="<?php _e('Twitter URL', 'bonyan'); ?>" id="twitter-input">
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="user-information-items">
                        <div class="user-information-item user-birth-date">
                            <h4><?php _e('Date of birth', 'bonyan'); ?></h4>
                            <p class="user-information-item-content view-mode"><?php echo $user_birth_date ?></p>
                            <input type="date" value="<?php echo $user_birth_date ?>" class="edit-mode-input" id="birth-date-input" max='<?php echo date("Y-m-d", strtotime("-18 year")) ?>'>
                        </div>
                        <div class="user-information-item user-age">
                            <h4><?php _e('Age', 'bonyan'); ?></h4>
                            <p class="user-information-item-content view-mode"><?php echo $user_age ?></p>
                            <input type="number" value="<?php echo $user_age ?>" class="edit-mode-input" id="age-input">
                        </div>
                    </div>
                </div>
            </div>
            <!-- End my account content -->

            <!-- Start Donation content -->
            <div class="dashboard-tab-content" id="donations">

                <div class="donations-container">
                    <div class="tab-content-title">
                        <h3><?php _e('Donation History', 'bonyan'); ?></h3>
                    </div>
                    <div class="loader loading-donations"></div>
                    <!-- Data Table Will Load Here -->
                </div>


                <div class="recurring-donations-container mt-5">
                    <div class="tab-content-title">
                        <h3><?php _e('Recurring Donations', 'bonyan'); ?></h3>
                    </div>
                    <div class="loader loading-recurring"></div>
                    <!-- Data Table Will Load Here -->
                </div>

            </div>
            <!-- End Donation content -->

            <!-- Start Favourite Campaigns Content -->
            <div class="dashboard-tab-content" id="favorite-campaigns">
                <div class="tab-content-title">
                    <h3><?php _e('Favorite Campaigns', 'bonyan'); ?></h3>
                </div>

                <div class="cards-container">
                    <?php

                    $user_id = get_current_user_id();
                    $user_fav_campaigns = get_user_meta($user_id, 'FavCampaigns', true);
                    $fav_campaign_array = explode(",", $user_fav_campaigns);

                    $args = array(
                        'post_type' => 'campaign',
                        'post_status ' => 'publish',
                        'posts_per_page' => -1,
                        'post__in' => $fav_campaign_array,

                    );
                    $favorite_user_campaigns = new WP_Query($args);

                    if ($favorite_user_campaigns->have_posts()) :
                        while ($favorite_user_campaigns->have_posts()) :
                            $favorite_user_campaigns->the_post();
                    ?>
                            <?php get_template_part('template-parts/cards/content', 'campaign', array('is_donor_dashboard' => true)); ?>
                    <?php
                        endwhile;
                    endif;
                    ?>

                </div>
                <?php //custom_pagination($favorite_user_campaigns);
                ?>
            </div>
            <!-- End Favorite Campaigns Content -->

        </div>
    </div>
    <!-- End Dashboard Tabs Contents -->
</section>

<?php get_footer();
