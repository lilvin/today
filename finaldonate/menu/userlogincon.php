<?php
include_once 'init.php';
session_start();
include ("functions.php");

if (logged_in()) {
  $email=$_SESSION['email'];
  $sql=$con->query("SELECT * FROM users WHERE email='$email'");
  $return=mysqli_fetch_assoc($sql);
  
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Donate Blood- Donated Blood</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"/>

<style>
  html{overflow-x:hidden;}
  </style>
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
.style4 {color: #CC0000}
.style2 {            width: 469px;
}
.style5 {}
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
            <li><a href="/finaldonate/index.php">Home</a></li>
            <li><a href="/finaldonate/about.php" >About</a></li>
      <li><a href="/finaldonate/services.php">Services</a></li>
            <li><a href="/finaldonate/blog.php" >Blog</a></li>
            <li><a href="/finaldonate/contact.php" >Contact Us</a></li>
       <?php if(logged_in()){ ;?>
                <li class="dropdown">
           <a href="#" class="dropdown-toggle" data-toggle="dropdown"> Hello <?php echo $return['firstName'];?>
           <span class="caret"></span> 
           </a>
           <ul class="dropdown-menu dropnav" role="menu">
             <?php if($return['userType'] == 'admin'){ ;?>
                <li><a href="adminlogincon.php">Dashboard</a></li>
                <li><a href="../password/adminpassword.php">Change password</a></li>
             <?php }else{ ;?>
                <li><a href="userlogincon.php">Dashboard</a></li>
                <li><a href="../password/userpassword.php">Change password</a></li>
             <?php } ;?>
              
             <li><a href="logout.php">Log Out</a></li>
           </ul>
         </li>
             <?php }else{ ;?>
          <li><a href="login.php">Login</a></li>
        <?php } ;?>
            

        </ul>
        <br style="clear: left" />
    </div> <!-- end of templatemo_menu -->
    <div class="cleaner"></div>
</div>  <!-- END of templatemo_header_wrapper -->

<div id="templatemo_main">
 
<div id="inputs" style="width:800px; height:300px; margin-left:100px; border:3px solid #a1a1a1">
<table width="800" height:300px; border="2" align="center" >
  <tr>
    <th colspan="2" rowspan="7" scope="col">
	<!-- begin table inside table-->
	
<form id="form1" name="form1" method="post" action="">
<span class="style4">Personal Details</span><br/>
ID number:<br/>      
  <input name="idNumber" type="text" maxlength="8" id="idNumber" value="<?php echo $return['idNumber']; ?>" disabled>
  <br/>
First name:<br/>    
<input name="firstname" type="text" maxlength="20" id="firstname" value="<?php echo $return['firstName']; ?>"disabled>
<br/>
Last name:<br/> 
<input name="lastname" type="text" maxlength="20" id="lastname" value="<?php echo $return['lastName']; ?>"disabled>
<br/>
Email address:<br/>
<input name="email" type="text" maxlength="50" id="email" value="<?php echo $return['email']; ?>"disabled>
<br/>
Mobile:<br/>  
<input name="mobile" type="text" maxlength="10" id="mobile" value="<?php echo $return['mobile']; ?>"disabled>
<br/>
<br/>
</form>
</th>
</tr>
<!--second column-->
<tr>
    <th colspan="2" bgcolor="#FFFFFF" scope="col"><span class="style9">Manage Account</span></th>
    <th colspan="2" bgcolor="#FFFFFF" scope="col"><span class="style9">Recipient Menu </span></th>
      <th colspan="2" bgcolor="#FFFFFF" scope="col"><span class="style9">Donor Menu</span></th>
  </tr>
  <tr>
    <td width="150" bgcolor="#CC3366"><input name="update" type="submit" id="update" value="Update details"  onclick="location.href='/finaldonate/menu/userupdate.php'"/></td>
    <td bgcolor="#CC3366">&nbsp;</td>
    <td bgcolor="#CC3366"><input name="appointment" type="submit" id="appointment" value="Book recipient appointment" onclick="location.href='/finaldonate/appointments/recipientsappointments.php'"/></td>
    <td bgcolor="#CC3366">&nbsp;</td>
    <td bgcolor="#CC3366"><input name="appointment" type="submit" id="appointment" value="Book donor appointment" onclick="location.href='/finaldonate/appointments/donorsappointments.php'"/></td>
    <td bgcolor="#CC3366">&nbsp;</td>

    
  <tr>
    <td bgcolor="#CC3366"><input name="password" type="submit" id="password" value="Change Password" onclick="location.href='/finaldonate/password/userpassword.php'"/></td>
    <td bgcolor="#CC3366">&nbsp;</td>
    <td bgcolor="#CC3366"><input name="cancel" type="submit" id="cancel" value="Cancel reciepient appointment" onclick="location.href='/finaldonate/appointments/recipientscancel.php'"/></td>
    <td bgcolor="#CC3366">&nbsp;</td>
    <td bgcolor="#CC3366"><input name="cancel" type="submit" id="cancel" value="Cancel donor appointment" onclick="location.href='/finaldonate/appointments/donorscancel.php'"/></td>
    <td bgcolor="#CC3366">&nbsp;</td>
    
     
     
  </tr>
  <tr>
   <td bgcolor="#CC3366"><input name="hospital" type="submit" id="hospital" value="Search for hospital" onclick="location.href='/finaldonate/hospitals/searchhospital.php'"/></td>
    <td bgcolor="#CC3366">&nbsp;</td>
  
     
  </tr>
  </tr>
  <br/>
  </br>
</table>
<br/>
<br/>
<br/>
<br/>
<br/>

<div>
</div> <!-- END of templatemo_main -->



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
<?php
}else{

  header("location:login.php");
  exit();
} 

?>


