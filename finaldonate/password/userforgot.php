<?php

//connecting to database
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

if (isset($_POST['change']))
{
  $mobile = $_POST['mobile'];
  $sql =$con->query("SELECT * FROM users WHERE mobile='$mobile'");
  $return =mysqli_fetch_assoc($sql);
  
  if (empty($mobile)) {

    $message = "Please enter your phonenumber";

  }elseif(strlen($mobile)<13 || strlen($mobile) >13){

    $message = "Please provide a valid phone number you registered with";

  }elseif($mobile !== $return['mobile']){
    
    $message = "Thats not the phone number you registered with";

  }else{
  
  $code = "123456789";
  $code = str_shuffle($code);
  $code = substr($code,1,4);

  $updateCode = "UPDATE users SET code='$code' WHERE mobile='$mobile'";
  $updateCodeQuery=$con->query($updateCode);
  // Specify your authentication credentials
  $username   = "lilianKirito";
  $apikey     = "29748e398b5b4f31537215ae95f602d98c5ae89184a941e5c756fe3b610d23b3";


  $message    = $code;
  // Create a new instance of our awesome gateway class
  $gateway    = new AfricasTalkingGateway($username, $apikey);

  try 
  { 
    // Thats it, hit send and we'll take care of the rest. 
    $results = $gateway->sendMessage($mobile, $message);
              
    // foreach($results as $result) {
    //   // status is either "Success" or "error message"
    //   echo "Message sent successfully ";
    //   // echo " Status: " .$result->status;
    //   // echo " StatusCode: " .$result->statusCode;
    //   // echo " MessageId: " .$result->messageId;
    //   // echo " Cost: "   .$result->cost."\n";
    // }
    header("location: usercode.php");
    exit();
  }
  catch ( AfricasTalkingGatewayException $e )
  {
    echo "Encountered an error while sending: ".$e->getMessage();
  }


    }

  }
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Donate Blood- Change Password</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"/>

<style>
	html{overflow-x:hidden;}
	</style>
<link href="/finaldonate/css/templatemo_style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<!-- templatemo 358 carousel -->
<!-- 
Carousel Template 
http://www.templatemo.com/preview/templatemo_358_carousel 
-->
<script type="text/javascript" src="/finaldonate/js/jquery-1-4-2.min.js"></script> 
<!--script type="text/javascript" src="/jqueryui/js/jquery-ui-1.7.2.custom.min.js"></script--> 
<script type="text/javascript" src="/finaldonate/js/jquery-ui.min.js"></script> 
<script type="text/javascript" src="/finaldonate/js/showhide.js"></script> 
<link rel="stylesheet" href="/finaldonate/css/slimbox2.css" type="text/css" media="screen" /> 
<script type="text/JavaScript" src="/finaldonate/js/jquery.mousewheel.js"></script> 
<script type="text/JavaScript" src="/finaldonate/js/slimbox2.js"></script> 

<link rel="stylesheet" type="text/css" href="/finaldonate/css/ddsmoothmenu.css" />

<script type="text/javascript" src="/finaldonate/js/jquery.min.js"></script>
<script type="text/javascript" src="/finaldonate/js/ddsmoothmenu.js">
/***********************************************
* Smooth Navigational Menu- (c) Dynamic Drive DHTML code library (www.dynamicdrive.com)
* This notice MUST stay intact for legal use
* Visit Dynamic Drive at http://www.dynamicdrive.com/ for full source code
***********************************************/

 
<script type="text/javascript">

ddsmoothmenu.init({
	mainmenuid: "templatemo_menu", //menu DIV id
	orientation: 'h', //Horizontal or vertical menu: Set to "h" or "v"
	classname: 'ddsmoothmenu', //class added to menu's outer DIV
	//customtheme: ["#1c5a80", "#18374a"],
	contentsource: "markup" //"markup" or ["container_id", "path_to_menu_file"]
})

</script> 

<style type="text/css">
<!--
.style10 {color: #000000}
#message{
  display: none;
}
-->
</style>
</head>

<body id="subpage">

<div id="templatemo_header_wrapper">
  <div id="site_title">
	<a href="/finaldonate/index.php?lang=en&amp;style=style-default"
							class="appbrand pull-left"><img src="/finaldonate/images/blood2.jpg" width="200" height="100"></a>
  </div>
      <div id="templatemo_menu" class="ddsmoothmenu">
        <ul>
            <li><a href="../index.php">Home</a></li>
            <li><a href="../about.php" >About</a></li>
			<li><a href="../services.php">Services</a></li>
            <li><a href="../blog.php" >Blog</a></li>
            <li><a href="../contact.php" >Contact Us</a></li>
			<li><a href="../menu/login.php" >Login</a>
			                </li>

        </ul>
        <br style="clear: left" />
    </div> <!-- end of templatemo_menu -->
    <div class="cleaner"></div>
</div>	<!-- END of templatemo_header_wrapper -->

<div id="templatemo_main">
  <div class="alert alert-success col-md-6" id="message" style="<?php if ($message != "") {?> display: block; margin-left: 350px; <?php } ;?>">
   <?php echo $message ;?>
</div>
<div class="container userforgotcol-md-4 col-sm-6 col-xs-12 col-md-offset-4 col-sm-offset-3" style="border-radius: 5px;background-color: #E4E1E1;
    margin-bottom: 30px;">
  <h1><label>Change password.</label></h1>
   <div class="row">
    <div class="col-md-6 col-lg-6">
 <form  method="post" action="userforgot.php">
   <div class="form-group">
          <h5>Enter your mobile Number to receive reset code</h5>
          <label for="number">Mobile No:</label>
          <input type="text" name="mobile" class="form-control" placeholder="+254722000000" style="width: 180%;" id="number">
         </div>
         
          <input type="submit" name="change" value="change" class="btn btn-success">
          <div><br>
            <br>
          </div>
  </form>
</div>
</div>
</div> <!-- END of templatemo_main -->



<div id="templatemo_bottom_wrapper">
    <div id="templatemo_bottom">
    	<div class="col one_third">
        	<h4><span></span>Our Services</h4>
            <div class="bottom_box">
                <ul class="footer_list">
                    <li><a href="/finaldonate/services.html">Appointments booking</a></li>
                    <li><a href="/finaldonate/services.html">Blood donation services</a></li>
                    <li><a href="/finaldonate/services.html">Blood transfusion services</a></li>
                    <li><a href="/finaldonate/services.html">Health guidance</a></li>
                    
                </ul>  
			</div>
        </div>
        <div class="col one_third">
        	<h4><span></span>Contact us</h4>
            <div class="bottom_box">
			 <p><em> Contact us using the social links. Find contact detailsfor specific hospitals in our <a href="/finaldonate/contact.html">Contact Us</a> page. </em></p><br />
                <div class="footer_social_button">
                    <a href="#"><img src="/finaldonate/images/facebook.png" title="facebook" alt="facebook" /></a>
                    <a href="#"><img src="/finaldonate/images/flickr.png" title="flickr" alt="flickr" /></a>
                    <a href="#"><img src="/finaldonate/images/twitter.png" title="twitter" alt="twitter" /></a>
                    
                </div>
			</div>
        </div>
        <div class="col one_third no_margin_right">
        	<h4><span></span>About Us</h4>
            <div class="bottom_box">
                <p><em> Donate Blood is a combined effort of various blood banks to provide a means that 
                helps in conducting blood donation drives, facilitate registration of blood 
                donors and recipients among other blood donation activities.</em></p><br />              
               
            </div>
        </div>
        
    	<div class="cleaner"></div>
    </div> <!-- END of tempatemo_bottom -->
</div> <!-- END of tempatemo_bottom_wrapper -->

<div id="templatemo_footer_wrapper">
    <div id="templatemo_footer">
    	Copyright © Donate Blood
    </div> <!-- END of templatemo_footer_wrapper -->
</div> <!-- END of templatemo_footer -->

</body>
</html>

