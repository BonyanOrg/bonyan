<?php
// Ultimate WordPress Password Reset
define('WP_USE_THEMES', false);
require_once('./wp-load.php');

echo "<h2>Ultimate WordPress Password Reset</h2>";

// Show current users
$users = get_users();
echo "<h3>Current Users in Database:</h3>";
foreach ($users as $user) {
    echo "<p>ID: {$user->ID}, Username: {$user->user_login}, Email: {$user->user_email}, Roles: " . implode(', ', $user->roles) . "</p>";
}

// Create/update admin user
$username = 'ultimateadmin';
$password = 'ultimate123';
$email = 'ultimate@localhost.com';

// Check if user exists
$user = get_user_by('login', $username);

if ($user) {
    // Update existing user
    wp_set_password($password, $user->ID);
    $user->set_role('administrator');
    echo "<div style='background: lightblue; padding: 20px; margin: 20px 0;'>";
    echo "<h3>✅ Updated existing user:</h3>";
    echo "<p><strong>Username:</strong> $username</p>";
    echo "<p><strong>Password:</strong> $password</p>";
    echo "</div>";
} else {
    // Create new user
    $user_id = wp_create_user($username, $password, $email);
    
    if (!is_wp_error($user_id)) {
        $user = new WP_User($user_id);
        $user->set_role('administrator');
        
        echo "<div style='background: lightgreen; padding: 20px; margin: 20px 0;'>";
        echo "<h3>✅ Created new admin user:</h3>";
        echo "<p><strong>Username:</strong> $username</p>";
        echo "<p><strong>Password:</strong> $password</p>";
        echo "</div>";
    } else {
        echo "<div style='background: pink; padding: 20px; margin: 20px 0;'>";
        echo "<h3>❌ Error creating user:</h3>";
        echo "<p>" . $user_id->get_error_message() . "</p>";
        echo "</div>";
    }
}

// Also try to reset the first existing user's password
if (!empty($users)) {
    $first_user = $users[0];
    wp_set_password('backup123', $first_user->ID);
    $first_user_obj = new WP_User($first_user->ID);
    $first_user_obj->set_role('administrator');
    
    echo "<div style='background: lightyellow; padding: 20px; margin: 20px 0;'>";
    echo "<h3>🔄 Also reset first existing user:</h3>";
    echo "<p><strong>Username:</strong> {$first_user->user_login}</p>";
    echo "<p><strong>New Password:</strong> backup123</p>";
    echo "</div>";
}

echo "<div style='background: #f0f0f0; padding: 20px; margin: 20px 0;'>";
echo "<h3>🎯 Try These Login Options:</h3>";
echo "<p><strong>Option 1:</strong> $username / $password</p>";
if (!empty($users)) {
    echo "<p><strong>Option 2:</strong> {$users[0]->user_login} / backup123</p>";
}
echo "<p><strong>Login URL:</strong> <a href='/wp-admin' target='_blank'>http://localhost:8080/wp-admin</a></p>";
echo "</div>";

// Check for security plugins that might be blocking
$active_plugins = get_option('active_plugins');
echo "<h3>Active Plugins (potential blockers):</h3>";
foreach ($active_plugins as $plugin) {
    if (strpos($plugin, 'security') !== false || strpos($plugin, 'login') !== false || strpos($plugin, 'limit') !== false) {
        echo "<p style='color: red;'>⚠️ {$plugin}</p>";
    } else {
        echo "<p>{$plugin}</p>";
    }
}
?> 