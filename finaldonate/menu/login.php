<?php
session_start();
$error ="";
include_once 'init.php';
include ("functions.php");

if (logged_in()) {
  header("location:userlogincon.php");
  exit();
}

if(isset($_POST['login'])){
  $email=mysqli_real_escape_string($con,$_POST['email']);
  $password=mysqli_real_escape_string($con,$_POST['password']);


   if(email_exists($con,$email)){
     
     $result=mysqli_query($con,"SELECT * FROM users WHERE email='$email'");
     $retPassword=mysqli_fetch_assoc($result);
        
        $decryptPassword=password_verify($password,$retPassword['password']);
           if(!$decryptPassword){
              $error="password is not correct";
           }
           else{
              
              $_SESSION['email'] = $email;  //session set for the email
              if ($retPassword['userType'] == 'user') {
                header("location:userlogincon.php");
              }else{
                 header("location:adminlogincon.php");
              }
             
            }

    }else{

     $error="Email does not exist";
   }

}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Donate Blood- Login Page</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"/>

<style>
	html{overflow-x:hidden;}
	</style>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<link href="/finaldonate/css/templatemo_style.css" rel="stylesheet" type="text/css" />

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

</script>

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
.style3 {color: #000000}
-->
#error{
 display: none;
}
.login{
  margin-left: 300px;
}
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
            <li><a href="/finaldonate/index.php">Home</a></li>
            <li><a href="/finaldonate/about.php" >About</a></li>
			<li><a href="/finaldonate/services.php">Services</a></li>
            <li><a href="/finaldonate/blog.php" >Blog</a></li>
            <li><a href="/finaldonate/contact.php" >Contact Us</a></li>
			<li><a href="/finaldonate/menu/login.php" class="selected">Login</a></li>

        </ul>
        <br style="clear: left" />
    </div> <!-- end of templatemo_menu -->
    <div class="cleaner"></div>
</div>	<!-- END of templatemo_header_wrapper -->
<div id="templatemo_main">
<div class="alert alert-success col-md-6" id="error" style="<?php if ($error != "") {?> display: block; margin-left: 350px; <?php } ;?>">
   <?php echo $error ;?>
  </div>
  <div class="container login col-md-4 col-sm-6 col-xs-12 col-md-offset-4 col-sm-offset-3" style="border-radius: 5px;background-color: #E4E1E1;
    margin-bottom: 30px;margin-left: 400px;">
     <h1><label>Donate Blood</label></h1><label><h4><a style="color:green" href="userReg.php" >Register</a> if you do not have an account.</label></h4>
     <div class="row">
       <div class="col-md-6 col-lg-6">
       <form method="POST" action="login.php"> 
        <div class="form-group" style="width: 150%;">
          <label for="email">Email:</label>
          <input type="text" name="email" class="form-control" placeholder="you@example.com" style="width: 180%;">
         </div>
         <div class="form-group"style="width: 150%;">
          <label for="password">Password:</label>
          <input type="password" name="password" class="form-control" placeholder="password"style="width: 180%;">
         </div>
         <div>
          <input type="submit" name="login" style="width: 120%;margin-left:80px;" value="Login" class="btn btn-success btn-lg">
        </div>
         <a href="../password/userforgot.php"  style="margin-left:30px; margin-top: -38px;">Forgot Password?</a>
        </form>
   
       </div>
      <br>
      <br>
     </div>
    <br>
   </div>
<div id="templatemo_bottom_wrapper">
    <div id="templatemo_bottom">
    	<div class="col one_third">
        	<h4><span></span>Our Services</h4>
            <div class="bottom_box">
                <ul class="footer_list">
                    <li><a href="/finaldonate/services.php">Appointments booking</a></li>
                    <li><a href="/finaldonate/services.php">Blood donation services</a></li>
                    <li><a href="/finaldonate/services.php">Blood transfusion services</a></li>
                    <li><a href="/finaldonate/services.php">Health guidance</a></li>
                    
                </ul>  
			</div>
        </div>
        <div class="col one_third">
        	<h4><span></span>Contact us</h4>
            <div class="bottom_box">
			 <p><em> Contact us using the social links. Find contact detailsfor specific hospitals in our <a href="/finaldonate/contact.php">Contact Us</a> page. </em></p><br />
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

