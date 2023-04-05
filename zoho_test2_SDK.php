<?php

$path = 'C:/xampp/htdocs/bonyan/wp-content/themes/bonyan/vendor/autoload.php';
require_once($path);



/*
* Create an instance of Logger Class that requires the following
* level -> Level of the log messages to be logged. Can be configured by typing Levels "::" and choose any level from the list displayed.
* filePath -> Absolute file path, where messages need to be logged.
*/
$logger = (new \com\zoho\api\logger\LogBuilder())
    ->level(com\zoho\api\logger\Levels::INFO)
    ->filePath("/Users/user_name/Documents/php_sdk_log.log")
    ->build();


//Create an UserSignature instance that takes user Email as parameter
$user = new com\zoho\crm\api\UserSignature("websiteadmin@bonyan.ngo");




/*
* Configure the environment
* which is of the pattern Domain::Environment
* Available Domains: USDataCenter, EUDataCenter, INDataCenter, CNDataCenter, AUDataCenter
* Available Environments: PRODUCTION(), DEVELOPER(), SANDBOX()
*/
$environment = com\zoho\crm\api\dc\EUDataCenter::PRODUCTION();




/*
* Create a Token instance that requires the following
* clientId -> OAuth client id.
* clientSecret -> OAuth client secret.
* refreshToken -> REFRESH token.
* accessToken -> Access token.
* grantToken -> GRANT token.
* id -> User unique id.
* redirectURL -> OAuth redirect URL.
*/
//Create a Token instance
// if refresh token is available
// The SDK throws an exception, if the given id is invalid.
// $token = (new com\zoho\api\authenticator\OAuthBuilder())
//     ->id("id")
//     ->build();

// if grant token is available
$token = (new com\zoho\api\authenticator\OAuthBuilder())
    ->clientId("1000.AOCQSTH50JXW4EL40OEJXVNFBONCXS")
    ->clientSecret("7ca1d9c56d7022319db34553948653b7f144902aee")
    ->grantToken("authtooauth")
    ->redirectURL("https://www.google.com")
    ->build();

// if ID (obtained from persistence) is available
// $token = (new com\zoho\api\authenticator\OAuthBuilder())
//     ->clientId("clientId")
//     ->clientSecret("clientSecret")
//     ->refreshToken("refreshToken")
//     ->redirectURL("redirectURL")
//     ->build();

// if access token is available
// $token = (new com\zoho\api\authenticator\OAuthBuilder())
//     ->accessToken("accessToken")
//     ->build();




/*
* Create an instance of DBStore that requires the following
* host -> DataBase host name. Default value "localhost"
* databaseName -> DataBase name. Default  value "zohooauth"
* userName -> DataBase user name. Default value "root"
* password -> DataBase password. Default value ""
* portNumber -> DataBase port number. Default value "3306"
* tabletName -> DataBase table name. Default value "oauthtoken"
*/
//$tokenstore = (new DBBuilder())->build();

// $tokenstore = (new \com\zoho\api\authenticator\store\DBBuilder())
//     ->host("hostName")
//     ->databaseName("dataBaseName")
//     ->userName("userName")
//     ->password("password")
//     ->portNumber("portNumber")
//     ->tableName("tableName")
//     ->build();

// $tokenstore = new FileStore("absolute_file_path");

// $tokenstore = new CustomStore();




/*
* By default, the SDK creates the SDKConfig instance
* autoRefreshFields (default value is false)
* true - all the modules' fields will be auto-refreshed in the background, every hour.
* false - the fields will not be auto-refreshed in the background. The user can manually delete the file(s) or refresh the fields using methods from ModuleFieldsHandler(com\zoho\crm\api\util\ModuleFieldsHandler)
*
* pickListValidation (default value is true)
* A boolean field that validates user input for a pick list field and allows or disallows the addition of a new value to the list.
* true - the SDK validates the input. If the value does not exist in the pick list, the SDK throws an error.
* false - the SDK does not validate the input and makes the API request with the user’s input to the pick list
*
* enableSSLVerification (default value is true)
* A boolean field to enable or disable curl certificate verification
* true - the SDK verifies the authenticity of certificate
* false - the SDK skips the verification
*/
$autoRefreshFields = false;

$pickListValidation = false;

$enableSSLVerification = true;

//The number of seconds to wait while trying to connect. Use 0 to wait indefinitely.
$connectionTimeout = 2;

//The maximum number of seconds to allow cURL functions to execute.
$timeout = 2;

$sdkConfig = (new com\zoho\crm\api\SDKConfigBuilder())
->autoRefreshFields($autoRefreshFields)
->pickListValidation($pickListValidation)
->sslVerification($enableSSLVerification)
->connectionTimeout($connectionTimeout)
->timeout($timeout)
->build();
