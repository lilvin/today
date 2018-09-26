<?php
require_once('AfricasTalkingGateway.php');

// Specify your authentication credentials
$username   = "";
$apikey     = "";


$txt=$_POST['message'];
$message    = $txt;
// Create a new instance of our awesome gateway class
$gateway    = new AfricasTalkingGateway($username, $apikey);

try 
{ 
  // Thats it, hit send and we'll take care of the rest. 
  $results = $gateway->sendMessage($recipients, $message);
            
  foreach($results as $result) {
    // status is either "Success" or "error message"
    echo "Message sent successfully ";
    // echo " Status: " .$result->status;
    // echo " StatusCode: " .$result->statusCode;
    // echo " MessageId: " .$result->messageId;
    // echo " Cost: "   .$result->cost."\n";
  }
}
catch ( AfricasTalkingGatewayException $e )
{
  echo "Encountered an error while sending: ".$e->getMessage();
}

