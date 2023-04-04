<?php
// try {
//     $path = 'C:/xampp/htdocs/bonyan/wp-content/themes/bonyan/vendor/autoload.php';
//     require_once($path);


//     $settings = array(
//         'baseUrl'      => 'https://mautic.bonyan.ngo',
//         'version'      => 'OAuth2',
//         'clientKey'    => '1_68uyla94azk0okwogk8k4ck4g0cc4c4gocc4o4s48c4wg44wgo',
//         'clientSecret' => '1eje2sdu8un4g0wc0swsww80g0ks4wwwk8cgwco8ksg44c48og',
//         'callback'     => 'http://192.168.10.8/bonyan'
//     );


//     // Initiate the auth object
//     $initAuth   = new \Mautic\Auth\ApiAuth();
//     $auth     = $initAuth->newAuth($settings);

//     // Initiate process for obtaining an access token; this will redirect the user to the authorize endpoint and/or set the tokens when the user is redirected back after granting authorization

//     if ($auth->validateAccessToken()) {
//         if ($auth->accessTokenUpdated()) {
//             $accessTokenData = $auth->getAccessTokenData();

//             //store access token data however you want
//         }
//     }

//     // ...
//     $initAuth   = new \Mautic\Auth\ApiAuth();
//     $auth       = $initAuth->newAuth($settings);
//     $apiUrl     = "https://mautic.bonyan.ngo";
//     $api        = new \Mautic\MauticApi();
//     $contactApi = $api->newApi("contacts", $auth, $apiUrl);
//     $id=13881;
//     $contact = $contactApi->get($id);
//     var_dump($contact);
// } catch (Exception $th) {
//     var_dump($th);
// }
require_once 'C:/xampp/htdocs/bonyan/wp-load.php';
$maticurl = "https://hook.integromat.com/16cykmkx2fxzwu5jtfnken8231wzxocy";
$args=array(
    "Create Contact" => True,
    'IP Address' => "192.168.10.111",
);

$Post_Http = wp_remote_post($url, array(
    'body' => $args,
    'timeout' => 45,
    'sslverify' => false
));

if (is_wp_error($Post_Http)) {
    $error_message = $Post_Http->get_error_message();
    // handle the error
} else {
    // handle the response
}
