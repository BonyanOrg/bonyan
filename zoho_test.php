<?php

$curl = curl_init();
curl_setopt_array($curl, array(
    CURLOPT_URL => "https://accounts.zoho.eu/oauth/v2/token",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => array(
        "grant_type" => "authorization_code",
        "code" => "1000.ec201cdeaad06d45c7730434e2f9d713.a2353336e1ecdb15b919c3af4b1d2983",
        "client_id" => "1000.TNQX8V88VSC97JTUOTMIERX4LIL6YL",
        "redirect_uri" => "https://bonyan.ngo/beta",
        "client_secret" => "7ec4c47367a6ccf10a036d180a49dfe2c3daa58698",
    )
));
$response = curl_exec($curl);
curl_close($curl);

$response_data = json_decode($response, true);
$auth_token = $response_data["access_token"];



// Define API credentials and parameters
//$auth_token = "your-auth-token";
$crm_key = "1000.TNQX8V88VSC97JTUOTMIERX4LIL6YL";
$api_endpoint = "https://www.zohoapis.com/crm/v2/Leads/upsert";
$lead_data = array(
    "data" => array(
        array(
            "Email" => "john.doe@example.com",
            "First_Name" => "John",
            "Last_Name" => "Doe",
            "Company" => "Acme Inc.",
            "Phone" => "+1 555-555-5555"
        )
    ),
    "trigger" => array("workflow", "approval", "blueprint")
);
$headers = array(
    "Authorization: Zoho-oauthtoken " . $auth_token,
    "X-Zoho-CRM-Client-Id: " . $crm_key,
    "Content-Type: application/json"
);

// Send the API request
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $api_endpoint);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($lead_data));
$response = curl_exec($curl);
curl_close($curl);

// Handle the response
$response_data = json_decode($response, true);
if (isset($response_data["data"]) && count($response_data["data"]) > 0) {
    $lead_id = $response_data["data"][0]["details"]["id"];
    echo "Upserted lead with ID " . $lead_id;
} else {
    echo "No lead data returned in response";
}
