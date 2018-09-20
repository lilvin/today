<?php
session_start();
error_reporting(0);
include_once 'menu/init.php';
include ("menu/functions.php");

  $email=$_SESSION['email'];
  $sql=$con->query("SELECT * FROM users WHERE email='$email'");
  $return=mysqli_fetch_assoc($sql);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Donate Blood Blog Page</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"/>

<style>
	html{overflow-x:hidden;}
	</style>
<link href="css/templatemo_style.css" rel="stylesheet" type="text/css" />
<!-- templatemo 358 carousel -->
<!-- 
Carousel Template 
http://www.templatemo.com/preview/templatemo_358_carousel 
-->
<script type="text/javascript" src="js/jquery-1-4-2.min.js"></script> 
<!--script type="text/javascript" src="/jqueryui/js/jquery-ui-1.7.2.custom.min.js"></script--> 
<script type="text/javascript" src="js/jquery-ui.min.js"></script> 
<script type="text/javascript" src="js/showhide.js"></script> 
<script type="text/JavaScript" src="js/jquery.mousewheel.js"></script> 

<link rel="stylesheet" type="text/css" href="css/ddsmoothmenu.css" />

<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/ddsmoothmenu.js">

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

</head>

<body id="subpage">

<div id="templatemo_header_wrapper">
    <div id="site_title">
    <a href="index.php?lang=en&amp;style=style-default"
                            class="appbrand pull-left"><img src="images/blood2.jpg" width="200" height="100"></a>
    </div>
     <div id="templatemo_menu" class="ddsmoothmenu">
        <ul>
            <li><a href="index.php" >Home</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="services.php" class="selected">Services</a></li>
            <li><a href="blog.php">Blog</a></li>
            <li><a href="contact.php">Contact Us</a></li>
             <?php if(logged_in()){ ;?>
                <li class="dropdown">
           <a href="#" class="dropdown-toggle" data-toggle="dropdown"> Hello <?php echo $return['firstName'];?>
           <span class="caret"></span> 
           </a>
           <ul class="dropdown-menu dropnav" role="menu">
             <?php if($return['userType'] == 'admin'){ ;?>
                <li><a href="menu/adminlogincon.php">Dashboard</a></li>
                <li><a href="password/adminpassword.php">Change password</a></li>
             <?php }else{ ;?>
                <li><a href="menu/userlogincon.php">Dashboard</a></li>
                <li><a href="password/userpassword.php">Change password</a></li>
             <?php } ;?>
              
             <li><a href="menu/logout.php">Log Out</a></li>
           </ul>
         </li>
             <?php }else{ ;?>
          <li><a href="menu/login.php">Login</a></li>
        <?php } ;?>
            

        </ul>
        <br style="clear: left" />
    </div> <!-- end of templatemo_menu -->
    <div class="cleaner"></div>
</div>  <!-- END of templatemo_header_wrapper -->

<div id="templatemo_main">
	<div class="col one_third fp_services">
    <h4>New users registration</h4>
        <img src="images/why.jpg" alt="Image 04 " class="image_fl" />
        <p>Donating blood helps saves lives and not just one. Register as a donor or recipient and get access to other services. Donors can book appointments to donate whereas recipients can book appointments for transfusion.<p>Using the map provided in the contact page a user can locate their preferd blood bank and continue with the process.</p> Users can also view the blood counts per blood types in each hospital.</p>
  		
    </div>
    <div class="col one_third fp_services">
        <h4>Blood donation services</h4>
        
		<p>
            <img src="images/donation1.png" alt="Image 02" />
           
        </p>

        <div class="rp_pp">
            <img src="images/templatemo_image_02.jpg" alt="Image 02" />
            <h6 style="color: #CC3366">Step one</h6>
            <p> Go to the facility of appointment and test questions about your health are asked. It is advisable to give any health related issues you know of about yourself. </p>
            <div class="cleaner"></div>
        </div>
        <div class="rp_pp">
            <img src="images/templatemo_image_03.jpg" alt="Image 03" />
            <h6 style="color: #CC3366">Step two</h6>
            <p>If you pass the test you are directed to the donation room and the blood donation process is carried out. A side sample is also taken.</p>
            <div class="cleaner"></div>
        </div>
		<div class="rp_pp">
            <img src="images/templatemo_image_03.jpg" alt="Image 03" />
            <h6 style="color: #CC3366">Step three</h6>
            <p>After the process is complete you are given refreshments to regain strength and advised on how to recover. the donated blood is separated to various components and tested. If the status is negative it is transfused.</p>
            <div class="cleaner"></div>
        </div>
    </div>
 <div class="col one_third fp_services">
        <h4>Blood transfusion services</h4>
        
		<p>
            <img src="images/transfusion.jpg" alt="Image 02" />
           
        </p>

        <div class="rp_pp">
            <img src="images/templatemo_image_02.jpg" alt="Image 02" />
            <h6 style="color: #CC3366">Step one</h6>
            <p> Go to the facility of appointment and test questions about your health are asked. It is advisable to give any health related issues you know of about yourself.</p>
            <div class="cleaner"></div>
        </div>
        <div class="rp_pp">
            <img src="images/templatemo_image_03.jpg" alt="Image 03" />
            <h6 style="color: #CC3366">Step two</h6>
            <p>If you pass the test you are directed to the tranfusion room and side sample is also taken for testing of blood type among other entities. It is also verified if the required blood component is available.</p>
            <div class="cleaner"></div>
        </div>
		<div class="rp_pp">
            <img src="images/templatemo_image_03.jpg" alt="Image 03" />
            <h6 style="color: #CC3366">Step three</h6>
            <p>After the process is complete you are given the preparation needed for the transfusion.</p>
            <div class="cleaner"></div>
        </div>
    </div>	
    
    <div class="cleaner"></div>
</div> <!-- END of templatemo_main -->

<div id="templatemo_bottom_wrapper">
    <div id="templatemo_bottom">
    	<div class="col one_third">
        	<h4><span></span>Our Services</h4>
            <div class="bottom_box">
                <ul class="footer_list">
                    <li><a href="services.php">Appointments booking</a></li>
                    <li><a href="services.php">Blood donation services</a></li>
                    <li><a href="services.php">Blood transfusion services</a></li>
                    <li><a href="services.php">Health guidance</a></li>
                    
                </ul>  
			</div>
        </div>
        <div class="col one_third">
        	<h4><span></span>Contact us</h4>
            <div class="bottom_box">
			 <p><em> Contact us using the social links. Find contact detailsfor specific hospitals in our <a href="contact.php">Contact Us</a> page. </em></p><br />
                <div class="footer_social_button">
                    <a href="#"><img src="images/facebook.png" title="facebook" alt="facebook" /></a>
                    <a href="#"><img src="images/flickr.png" title="flickr" alt="flickr" /></a>
                    <a href="#"><img src="images/twitter.png" title="twitter" alt="twitter" /></a>
                    
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
    	Copyright � Donate Blood
    </div> <!-- END of templatemo_footer_wrapper -->
</div> <!-- END of templatemo_footer -->

</body>
</html>
