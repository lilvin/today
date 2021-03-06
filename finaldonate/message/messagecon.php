<?php
session_start();
$message = "";
$servername="localhost";
$username="root";
$password="";
$dbname="bloodbank";
include ("../menu/functions.php");
require_once ("AfricasTalkingGateway.php");
//error_reporting(0);


$con=new mysqli($servername,$username,$password,$dbname) or die("failed to connect to server");
if (mysqli_connect_error()){
die("connection failed:".mysqli_connect_error());
}

$array = array();

if (isset($_POST['sendmsg'])) {
  $message = $_POST['message'];
  $sql=$con->query("SELECT mobile FROM users");

  while ($result=$sql->fetch_assoc()) {
    $array[] = $result;
  }
}

// Specify your authentication credentials
$username   = "";
$apikey     = "";


// Create a new instance of our awesome gateway class
$gateway    = new AfricasTalkingGateway($username, $apikey);

$recipients = "";
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

?>
