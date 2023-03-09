<?php

add_action('wp_ajax_add_to_fav', 'add_to_fav');
add_action('wp_ajax_nopriv_add_to_fav', 'add_to_fav');
function add_to_fav()
{
    // Check for nonce security      
    if (!wp_verify_nonce($_POST['nonce'], 'ajax-nonce')) {
        die('Busted!');
    }
    $massage = "";

    // For Registered Users 
    if (isset($_POST['user_id']) && isset($_POST['campaign_id']) && !empty($_POST['user_id']) &&  !empty($_POST['campaign_id'])) {
        $user_id = $_POST['user_id'];
        $campaign_id = $_POST['campaign_id'];
        $user_fav_campaigns = get_user_meta($user_id, 'FavCampaigns', true);

        if (empty($user_fav_campaigns)) { // if first campaign
            update_user_meta($user_id, 'FavCampaigns', $campaign_id);
            $massage = __('Campaign Added Successfully', 'bonyan');
        }
        if (!empty($user_fav_campaigns)) {
            $fav_campaign_array = explode(",", $user_fav_campaigns);
            if (!in_array($campaign_id, $fav_campaign_array)) {
                array_push($fav_campaign_array, $campaign_id);
                $massage = __('Campaign Added Successfully', 'bonyan');
            } else { // if campaign exists so delete it from favorites
                $fav_campaign_array = array_diff($fav_campaign_array, [$campaign_id]);
                $massage = __('Campaign Removed Successfully', 'bonyan');
            }
            $fav_campaigns_string = implode(",", $fav_campaign_array);
            update_user_meta($user_id, 'FavCampaigns', $fav_campaigns_string);
        }
    }


    // For Guest Users
    if (isset($_POST['user_id']) && isset($_POST['campaign_id']) && empty($_POST['user_id'])) {
        $campaign_id = $_POST['campaign_id'];
        if (!isset($_COOKIE["FavCampaigns"])) { // If User Does Not have any campaign before
            setcookie("FavCampaigns", $campaign_id, time() + 3600, "/");
            $massage = __('Campaign Added Successfully', 'bonyan');
        }
        if (isset($_COOKIE["FavCampaigns"])) { // If User has one favorite
            $fav_campaign_array = explode(",", $_COOKIE["FavCampaigns"]);
            if (!in_array($campaign_id, $fav_campaign_array)) {
                array_push($fav_campaign_array, $campaign_id);
                $massage = __('Campaign Added Successfully', 'bonyan');
            } else { // if campaign exists so delete it from favorites
                $fav_campaign_array = array_diff($fav_campaign_array, [$campaign_id]);
                $massage = __('Campaign Removed Successfully', 'bonyan');
            }
            $fav_campaigns_string = implode(",", $fav_campaign_array);
            setcookie("FavCampaigns", $fav_campaigns_string, time() + 3600, "/");
        }
    }



    wp_send_json([
        'message' => $massage,
    ], 200);
    wp_die();
}
