<?php
// Simple WordPress Password Reset
require_once('./wp-config.php');

echo "<h2>Simple WordPress Password Reset</h2>";

// Connect to database directly
$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Show existing users
$result = $mysqli->query("SELECT ID, user_login, user_email FROM wp_users");
echo "<h3>Current Users:</h3>";
while ($row = $result->fetch_assoc()) {
    echo "<p>ID: {$row['ID']}, Username: {$row['user_login']}, Email: {$row['user_email']}</p>";
}

// Create simple admin user
$username = 'superadmin';
$password = 'password123';
$email = 'superadmin@localhost.com';

// Delete existing user if exists
$mysqli->query("DELETE FROM wp_users WHERE user_login = '$username'");

// Hash password using WordPress method
$password_hash = '$P$B' . substr(md5($password), 0, 8) . md5($password);

// Insert new admin user
$query = "INSERT INTO wp_users (user_login, user_pass, user_nicename, user_email, user_registered, user_status, display_name) 
          VALUES ('$username', '$password_hash', '$username', '$email', NOW(), 0, 'Super Admin')";

if ($mysqli->query($query)) {
    $user_id = $mysqli->insert_id;
    
    // Add admin capabilities
    $mysqli->query("INSERT INTO wp_usermeta (user_id, meta_key, meta_value) VALUES ($user_id, 'wp_capabilities', 'a:1:{s:13:\"administrator\";b:1;}')");
    $mysqli->query("INSERT INTO wp_usermeta (user_id, meta_key, meta_value) VALUES ($user_id, 'wp_user_level', '10')");
    
    echo "<div style='background: lightgreen; padding: 20px; margin: 20px 0;'>";
    echo "<h3>✅ SUCCESS! New admin created:</h3>";
    echo "<p><strong>Username:</strong> $username</p>";
    echo "<p><strong>Password:</strong> $password</p>";
    echo "<p><strong>URL:</strong> <a href='/wp-admin'>http://localhost:8080/wp-admin</a></p>";
    echo "</div>";
} else {
    echo "<p style='color: red;'>Error: " . $mysqli->error . "</p>";
}

$mysqli->close();
?> 