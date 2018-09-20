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
<title>Donate Blood</title>
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

<!-- Load the CloudCarousel JavaScript file -->
<script type="text/JavaScript" src="js/cloud-carousel.1.0.5.js"></script>
 
<script type="text/javascript">
$(document).ready(function(){
                           
    // This initialises carousels on the container elements specified, in this case, carousel1.
    $("#carousel1").CloudCarousel(      
        {           
            reflHeight: 40,
            reflGap: 2,
            titleBox: $('#da-vinci-title'),
            altBox: $('#da-vinci-alt'),
            buttonLeft: $('#slider-left-but'),
            buttonRight: $('#slider-right-but'),
            yRadius: 30,
            xPos: 480,
            yPos: 32,
            speed:0.15,php
            autoRotate: "no",
            autoRotateDelay: 1500
        }
    );
});
 
</script>

</head>

<body id="home">

<div id="templatemo_header_wrapper">
    <div id="site_title">
    <a href="index.html?lang=en&amp;style=style-default"
                            class="appbrand pull-left"><img src="images/blood2.jpg" width="200" height="100"></a>
    </div>
     <div id="templatemo_menu" class="ddsmoothmenu">
        <ul>
            <li><a href="index.php" class="selected">Home</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="services.php">Services</a></li>
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
<div id="templatemo_slider">
    <!-- This is the container for the carousel. -->
    <div id = "carousel1" style="width:960px; height:280px;background:none;overflow:scroll; margin-top: 20px">            
        <!-- All images with class of "cloudcarousel" will be turned into carousel items -->
        <!-- You can place links around these images -->
        <a href="#" rel="lightbox"><img class="cloudcarousel" src="images/blood3.png" alt="donatebloood" title="Just a pint" /></a>
        <a href="#" rel="lightbox"><img class="cloudcarousel" src="images/blood5.png" alt="donateblood" title="Book appointment" /></a>
        <a href="#" rel="lightbox"><img class="cloudcarousel" src="images/transfusion.jpg" alt="donateblood" title="Transfusion process" /></a>
        <a href="#" rel="lightbox"><img class="cloudcarousel" src="images/during1.jpg" alt="donateblood" title="During transfusion" /></a>
        <a  href="#" rel="lightbox"><img class="cloudcarousel" src="images/blood6.jpg" alt="donateblood" title="Storage of donated blood" /></a>
        <a href="#" rel="lightbox"><img class="cloudcarousel" src="images/types2.jpg" alt="donateblood" title="All types are required" /></a>
       
    </div>
    
    <!-- Define left and right buttons. -->
    <center>
    <input id="slider-left-but" type="button" value="" />
    <input id="slider-right-but" type="button" value="" />
    </center>
</div>
 
 <div id="templatemo_main">
	
    <div class="col one_third fp_services">
    <h2>Welcome!</h2>
        <img src="images/blood9.jpg" alt="Image 04 " class="image_fl" />
        <p>Donate bLood and help save a life today. Register as a recipient to find a transfusion centre. Register as a donor and save upto three 
                lives by voluntarily following the following two steps.</p>
  		<ul class="templatemo_list">
            <li class="flow"><a href="menu/login.php">Login to your account or create a new account.</a></li>
            <li class="flow nomr"><a href="menu/login.php">Book an appointment at your nearest hospital.</a></li>
           
        </ul>
    </div>
    <div class="col one_third fp_services">
        <h2>FAQs</h2>
        <div class="rp_pp">
            <img src="images/templatemo_image_01.jpg" alt="Image 01" />
            <a href="login.html">Where Can I Donate? </a>
			<p>Login to find a donor center or blood bank and schedule your appointment today. <a href="blog.html">learn more </a></p>
                        <div class="cleaner"></div>
        </div>
        <div class="rp_pp">
            <img src="images/templatemo_image_02.jpg" alt="Image 02" />
            <a href="blog.html">How Can I know My Blood Type?</a>
            <p> After donating or when planning to be transfused your blood type is tested and 
                the type is verified. <a href="blog.html">learn more </a></p>
            <div class="cleaner"></div>
        </div>
        <div class="rp_pp">
            <img src="images/templatemo_image_03.jpg" alt="Image 03" />
            <a href="blog.html">Why Donate?</a>
            <p>Saving more than one life is reason to donate.
                Just a pinch of blood can save upto three lives. <a href="blog.html">learn more </a></p>
            <div class="cleaner"></div>
        </div>
    </div>
    <div class="col one_third  fp_services">
        
        <h2>Testimonials</h2>
        <div class="testimonial">
               <p>I used to wait for blood donation campaigns to donate blood. After finding out about donate blood website i can readily help save a life.</p>
            <cite>Rock  <a href="#"><span>- Student</span></a></cite></div>
    	<div class="testimonial">
            <p>I have a condition that requires blood transfusion after a given time span. I had problems locating the nearest blood bank and book an appointment but now i thank donate blood for making it easier.</p>
    		<cite>John <a href="#"><span>- Businessman</span></a></cite></div>
    </div>
	
    
    <div class="cleaner"></div>
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
