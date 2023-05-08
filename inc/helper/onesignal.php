<?php
add_filter('onesignal_include_post', 'onesignal_include_post_filter', 10, 3);
function onesignal_include_post_filter($new_status, $old_status, $post)
{
    if ($post->post_type == "events" && $new_status == "publish") {
        return true;
    }
}