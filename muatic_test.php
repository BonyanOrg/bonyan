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


// ================ ZOHO ================ //

$path = 'C:/xampp/htdocs/bonyan/wp-content/themes/bonyan/vendor/autoload.php';
require_once($path);


use zcrmsdk\crm\setup\restclient\ZCRMRestClient;
use zcrmsdk\oauth\ZohoOAuth;
class Record{
    public function __construct()
    {
        $configuration = array("client_id"=>"{client_id}","client_secret"=>"{client_secret}","redirect_uri"=>"{redirect_uri}","currentUserEmail"=>"{user_email_id}","apibaseurl"=>"{apiBaseUrl}");
        \zcrmsdk\crm\setup\restclient\ZCRMRestClient::initialize($configuration);
    }
    public static function generateAccessTokenFromGrantToken(){
        
        $oAuthClient = ZohoOAuth::getClientInstance();
        $grantToken = “paste_the_self_authorized_grant_token_here”;
        $oAuthTokens = $oAuthClient->generateAccessToken($grantToken); 
    }
}
$obj =new Record();
$obj->generateAccessTokenFromGrantToken();
 


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
$token = (new OAuthBuilder())
    ->id("id")
    ->build();

// if grant token is available
$token = (new OAuthBuilder())
    ->clientId("clientId")
    ->clientSecret("clientSecret")
    ->grantToken("grantToken")
    ->redirectURL("redirectURL")
    ->build();

// if ID (obtained from persistence) is available
$token = (new OAuthBuilder())
    ->clientId("clientId")
    ->clientSecret("clientSecret")
    ->refreshToken("refreshToken")
    ->redirectURL("redirectURL")
    ->build();

// if access token is available
$token = (new OAuthBuilder())
    ->accessToken("accessToken")
    ->build();





// namespace \zohocrm\com\zoho\crm\sample\initializer;

// use \zohocrm\com\zoho\api\authenticator\OAuthBuilder;

// use \zohocrm\com\zoho\api\authenticator\store\DBBuilder;

// use \zohocrm\com\zoho\api\authenticator\store\FileStore;

// use \zohocrm\com\zoho\crm\api\InitializeBuilder;

// use \zohocrm\com\zoho\crm\api\UserSignature;

// use \zohocrm\com\zoho\crm\api\dc\USDataCenter;

// use \zohocrm\com\zoho\api\logger\LogBuilder;

// use \zohocrm\com\zoho\api\logger\Levels;

// use \zohocrm\com\zoho\crm\api\SDKConfigBuilder;

// use \zohocrm\com\zoho\crm\api\ProxyBuilder;

class Initialize
{
    public function initialize()
    {
        /*
      * Create an instance of Logger Class that requires the following
      * level -> Level of the log messages to be logged. Can be configured by typing Levels "::" and choose any level from the list displayed.
      * filePath -> Absolute file path, where messages need to be logged.
    */
        $logger = (new com\zoho\api\logger\LogBuilder())
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
        $environment = com\zoho\crm\api\dc\USDataCenter::DEVELOPER();

        /*
    * Create a Token instance
    * clientId -> OAuth client id.
    * clientSecret -> OAuth client secret.
    * grantToken -> GRANT token.
    * redirectURL -> OAuth redirect URL.
    */
        //Create a Token instance
        $token = (new com\zoho\api\authenticator\OAuthBuilder())
            ->clientId("1000.TNQX8V88VSC97JTUOTMIERX4LIL6YL")
            ->clientSecret("7ec4c47367a6ccf10a036d180a49dfe2c3daa58698")
            ->grantToken("grantToken")
            ->redirectURL("http://example.com/callbackurl")
            ->build();

        /*
     * TokenStore can be any of the following
     * DB Persistence - Create an instance of DBStore
     * File Persistence - Create an instance of FileStore
     * Custom Persistence - Create an instance of CustomStore
    */

        /*
    * Create an instance of DBStore.
    * host -> DataBase host name. Default value "localhost"
    * databaseName -> DataBase name. Default  value "zohooauth"
    * userName -> DataBase user name. Default value "root"
    * password -> DataBase password. Default value ""
    * portNumber -> DataBase port number. Default value "3306"
    * tableName -> DataBase table name. Default value "oauthtoken"
    */
        //$tokenstore = (new DBBuilder())->build();

        $tokenstore = (new com\zoho\api\authenticator\store\DBBuilder())
            ->host("hostName")
            ->databaseName("dataBaseName")
            ->userName("userName")
            ->password("password")
            ->portNumber("portNumber")
            ->tableName("tableName")
            ->build();

        // $tokenstore = new FileStore("absolute_file_path");

        // $tokenstore = new CustomStore();

        $autoRefreshFields = false;

        $pickListValidation = false;

        $connectionTimeout = 2; //The number of seconds to wait while trying to connect. Use 0 to wait indefinitely.

        $timeout = 2; //The maximum number of seconds to allow cURL functions to execute.

        $sdkConfig = (new com\zoho\crm\api\SDKConfigBuilder())->autoRefreshFields($autoRefreshFields)->pickListValidation($pickListValidation)->sslVerification(false)->connectionTimeout($connectionTimeout)->timeout($timeout)->build();

        // $resourcePath = "/Users/user_name/Documents/phpsdk-application";
        $resourcePath = "C:/xampp/htdocs/bonyan/wp-content/themes/bonyan/vendor/zohocrm/php-sdk-2.0";

        //Create an instance of RequestProxy
        // $requestProxy = (new com\zoho\crm\api\ProxyBuilder())
        // ->host("proxyHost")
        // ->port("proxyPort")
        // ->user("proxyUser")
        // ->password("password")
        // ->build();

        /*
      * Set the following in InitializeBuilder
      * user -> UserSignature instance
      * environment -> Environment instance
      * token -> Token instance
      * store -> TokenStore instance
      * SDKConfig -> SDKConfig instance
      * resourcePath -> resourcePath - A String
      * logger -> Log instance (optional)
      * requestProxy -> RequestProxy instance (optional)
    */
        (new com\zoho\crm\api\InitializeBuilder())
            ->user($user)
            ->environment($environment)
            ->token($token)
            ->store($tokenstore)
            ->SDKConfig($sdkConfig)
            ->resourcePath($resourcePath)
            //->logger($logger)
            //->requestProxy($requestProxy)
            ->initialize();
    }
}

$refresh_token = new Initialize();

var_dump($refresh_token);

$var = "1";


// namespace \zohocrm\com\zoho\crm\sample\record;
// use \zohocrm\com\zoho\crm\api\HeaderMap;
// use \zohocrm\com\zoho\crm\api\ParameterMap;
// use \zohocrm\com\zoho\crm\api\layouts\Layout;
// use \zohocrm\com\zoho\crm\api\record\APIException;
// use \zohocrm\com\zoho\crm\api\record\ActionWrapper;
// use \zohocrm\com\zoho\crm\api\record\BodyWrapper;
// use \zohocrm\com\zoho\crm\api\record\ConvertActionWrapper;
// use \zohocrm\com\zoho\crm\api\record\ConvertBodyWrapper;
// use \zohocrm\com\zoho\crm\api\record\DeletedRecordsWrapper;
// use \zohocrm\com\zoho\crm\api\record\FileBodyWrapper;
// use \zohocrm\com\zoho\crm\api\record\FileDetails;
// use \zohocrm\com\zoho\crm\api\record\InventoryLineItems;
// use \zohocrm\com\zoho\crm\api\record\LeadConverter;
// use \zohocrm\com\zoho\crm\api\record\LineItemProduct;
// use \zohocrm\com\zoho\crm\api\record\LineTax;
// use \zohocrm\com\zoho\crm\api\record\MassUpdate;
// use \zohocrm\com\zoho\crm\api\record\MassUpdateActionWrapper;
// use \zohocrm\com\zoho\crm\api\record\MassUpdateBodyWrapper;
// use \zohocrm\com\zoho\crm\api\record\MassUpdateResponseWrapper;
// use \zohocrm\com\zoho\crm\api\record\MassUpdateSuccessResponse;
// use \zohocrm\com\zoho\crm\api\record\Participants;
// use \zohocrm\com\zoho\crm\api\record\PricingDetails;
// use \zohocrm\com\zoho\crm\api\record\RecordOperations;
// use \zohocrm\com\zoho\crm\api\record\RecurringActivity;
// use \zohocrm\com\zoho\crm\api\record\RemindAt;
// use \zohocrm\com\zoho\crm\api\record\ResponseWrapper;
// use \zohocrm\com\zoho\crm\api\record\SuccessResponse;
// use \zohocrm\com\zoho\crm\api\record\SuccessfulConvert;
// use \zohocrm\com\zoho\crm\api\tags\Tag;
// use \zohocrm\com\zoho\crm\api\record\DeleteRecordParam;
// use \zohocrm\com\zoho\crm\api\record\DeleteRecordsParam;
// use \zohocrm\com\zoho\crm\api\record\GetDeletedRecordsHeader;
// use \zohocrm\com\zoho\crm\api\record\GetDeletedRecordsParam;
// use \zohocrm\com\zoho\crm\api\record\GetMassUpdateStatusParam;
// use \zohocrm\com\zoho\crm\api\record\GetRecordHeader;
// use \zohocrm\com\zoho\crm\api\record\GetRecordParam;
// use \zohocrm\com\zoho\crm\api\record\GetRecordsHeader;
// use \zohocrm\com\zoho\crm\api\record\GetRecordsParam;
// use \zohocrm\com\zoho\crm\api\record\SearchRecordsParam;
// use \zohocrm\com\zoho\crm\api\record\{Cases, Field, Solutions, Accounts, Campaigns, Calls, Leads, Tasks, Deals, Sales_Orders, Contacts, Quotes, Events, Price_Books, Purchase_Orders, Vendors};
// use \zohocrm\com\zoho\crm\api\util\Choice;
// use \zohocrm\com\zoho\crm\api\util\StreamWrapper;
// use \zohocrm\com\zoho\crm\api\record\Territory;
// use \zohocrm\com\zoho\crm\api\record\Comment;
// use \zohocrm\com\zoho\crm\api\record\Consent;
// use \zohocrm\com\zoho\crm\api\attachments\Attachment;
// class Record
// {
//     /**
//      * Update Records
//      * This method is used to update multiple records of a module by their IDs and print the response.
//      * @param moduleAPIName - The API Name of the module to update records.
//      * @throws Exception
//      */
//     public static function updateRecords(string $moduleAPIName)
//     {
//         //API Name of the module to create records
//         //$moduleAPIName = "Leads";

//         //Get instance of RecordOperations Class
//         $recordOperations = new com\zoho\crm\api\record\RecordOperations();

//         //Get instance of BodyWrapper Class that will contain the request body
//         $request = new com\zoho\crm\api\record\BodyWrapper();

//         //List of Record instances
//         $records = array();

//         $recordClass = 'com\zoho\crm\api\record\Record';

//         //Get instance of Record Class
//         $record1 = new $recordClass();

//         $record1->setId("3477061010531018");

//         /*
//          * Call addFieldValue method that takes two arguments
//          * 1 -> Call Field "." and choose the module from the displayed list and press "." and choose the field name from the displayed list.
//          * 2 -> Value
//          */
//         $field = new com\zoho\crm\api\record\Field("");

//         $record1->addFieldValue(com\zoho\crm\api\record\Leads::City(), "City");

//         $record1->addFieldValue(com\zoho\crm\api\record\Leads::LastName(), "Last Name");

//         $record1->addFieldValue(com\zoho\crm\api\record\Leads::FirstName(), "First Name");

//         $record1->addFieldValue(com\zoho\crm\api\record\Leads::Company(), "KKRNP");

//         $record1->addKeyValue("External", "TestExternal123");

//         /*
//          * Call addKeyValue method that takes two arguments
//          * 1 -> A string that is the Field's API Name
//          * 2 -> Value
//          */
//         $record1->addKeyValue("Custom_field", "Value");

//         $record1->addKeyValue("Custom_field_2", "value");

//         //Add Record instance to the list
//         array_push($records, $record1);

//         //Get instance of Record Class
//         $record2 = new $recordClass();

//         $record2->setId("3477061010532001");

//         /*
//          * Call addFieldValue method that takes two arguments
//          * 1 -> Call Field "." and choose the module from the displayed list and press "." and choose the field name from the displayed list.
//          * 2 -> Value
//          */
//         $record2->addFieldValue(com\zoho\crm\api\record\Leads::City(), "City");

//         $record2->addFieldValue(com\zoho\crm\api\record\Leads::LastName(), "Last Name");

//         $record2->addFieldValue(com\zoho\crm\api\record\Leads::FirstName(), "First Name");

//         $record2->addFieldValue(com\zoho\crm\api\record\Leads::Company(), "KKRNP");

//         /*
//          * Call addKeyValue method that takes two arguments
//          * 1 -> A string that is the Field's API Name
//          * 2 -> Value
//          */
//         $record2->addKeyValue("Custom_field", "Value");

//         $record2->addKeyValue("Custom_field_2", "value");

//         //Add Record instance to the list
//         // array_push($records, $record2);

//         //Set the list to Records in BodyWrapper instance
//         $request->setData($records);

//         $trigger = array("approval", "workflow", "blueprint");

//         $request->setTrigger($trigger);

//         $headerInstance = new com\zoho\crm\api\HeaderMap();

//         $headerInstance->add(com\zoho\crm\api\record\GetRecordHeader::XEXTERNAL(), "Leads.External");

//         //Call createRecords method that takes BodyWrapper instance and moduleAPIName as parameter.
//         $response = $recordOperations->updateRecords($moduleAPIName, $request, $headerInstance);

//         if ($response != null) {
//             //Get the status code from response
//             echo ("Status Code: " . $response->getStatusCode() . "\n");

//             if ($response->isExpected()) {
//                 //Get object from response
//                 $actionHandler = $response->getObject();

//                 if ($actionHandler instanceof com\zoho\crm\api\record\ActionWrapper) {
//                     //Get the received ResponseWrapper instance
//                     $actionWrapper = $actionHandler;

//                     //Get the list of obtained ActionResponse instances
//                     $actionResponses = $actionWrapper->getData();

//                     foreach ($actionResponses as $actionResponse) {
//                         //Check if the request is successful
//                         if ($actionResponse instanceof com\zoho\crm\api\record\SuccessResponse) {
//                             //Get the received SuccessResponse instance
//                             $successResponse = $actionResponse;

//                             //Get the Status
//                             echo ("Status: " . $successResponse->getStatus()->getValue() . "\n");

//                             //Get the Code
//                             echo ("Code: " . $successResponse->getCode()->getValue() . "\n");

//                             echo ("Details: ");

//                             //Get the details map
//                             foreach ($successResponse->getDetails() as $key => $value) {
//                                 //Get each value in the map
//                                 echo ($key . " : ");

//                                 print_r($value);

//                                 echo ("\n");
//                             }

//                             //Get the Message
//                             echo ("Message: " . $successResponse->getMessage()->getValue() . "\n");
//                         }
//                         //Check if the request returned an exception
//                         else if ($actionResponse instanceof com\zoho\crm\api\record\APIException) {
//                             //Get the received APIException instance
//                             $exception = $actionResponse;

//                             //Get the Status
//                             echo ("Status: " . $exception->getStatus()->getValue() . "\n");

//                             //Get the Code
//                             echo ("Code: " . $exception->getCode()->getValue() . "\n");

//                             echo ("Details: ");

//                             //Get the details map
//                             foreach ($exception->getDetails() as $key => $value) {
//                                 //Get each value in the map
//                                 echo ($key . " : " . $value . "\n");
//                             }

//                             //Get the Message
//                             echo ("Message: " . $exception->getMessage()->getValue() . "\n");
//                         }
//                     }
//                 }
//                 //Check if the request returned an exception
//                 else if ($actionHandler instanceof com\zoho\crm\api\record\APIException) {
//                     //Get the received APIException instance
//                     $exception = $actionHandler;

//                     //Get the Status
//                     echo ("Status: " . $exception->getStatus()->getValue() . "\n");

//                     //Get the Code
//                     echo ("Code: " . $exception->getCode()->getValue() . "\n");

//                     echo ("Details: ");

//                     //Get the details map
//                     foreach ($exception->getDetails() as $key => $value) {
//                         //Get each value in the map
//                         echo ($key . " : " . $value . "\n");
//                     }

//                     //Get the Message
//                     echo ("Message: " . $exception->getMessage()->getValue() . "\n");
//                 }
//             } else {
//                 print_r($response);
//             }
//         }
//     }
// }
