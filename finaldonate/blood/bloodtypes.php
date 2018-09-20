
<?php

//connecting to database
$servername="localhost";
$username="root";
$password="";
$dbname="bloodbank";
error_reporting(0);


$con=new mysqli($servername,$username,$password,$dbname) or die("failed to connect to server");
if (mysqli_connect_error()){
die("connection failed:".mysqli_connect_error());
}
session_start();
include ("../menu/functions.php"); 

  $email=$_SESSION['email'];
  $sql=$con->query("SELECT * FROM users WHERE email='$email'");
  $return=mysqli_fetch_assoc($sql);


/// general blood count

	
	
	//////////// per hospital
	if (isset($_POST['details']))
	{
	$hospital = $_POST['hospital'];
	
	//blood group A-
	$query ="SELECT * FROM processedblood WHERE (type='A-' AND hospital='$hospital')";
  
  if ($query_run= mysqli_query($con,$query)){
  	
        $Anp= mysqli_num_rows($query_run);
	
	}
	else{ echo 'could not count';}
	$query ="SELECT * FROM transfusedblood WHERE (type='A-' AND hospital='$hospital')";
  
  if ($query_run= mysqli_query($con,$query)){
  	
        $Ant= mysqli_num_rows($query_run);
	
	}
	else{ echo 'could not count';}
	$ancount=$Anp-$Ant;
	
	//BLOOD GROUP A+
	$query ="SELECT * FROM processedblood WHERE (type='A+' AND hospital='$hospital')";
  
  if ($query_run= mysqli_query($con,$query)){
  	
        $App= mysqli_num_rows($query_run);
	
	}
	else{ echo 'could not count';}
	$query ="SELECT * FROM transfusedblood WHERE (type='A+' AND hospital='$hospital')";
  
  if ($query_run= mysqli_query($con,$query)){
  	
        $Apt= mysqli_num_rows($query_run);
	
	}
	else{ echo 'could not count';}
	$apcount=$App-$Apt;
	
	//BLOOD GROUP B+
	$query ="SELECT * FROM processedblood WHERE (type='B+' AND hospital='$hospital')";
  
  if ($query_run= mysqli_query($con,$query)){
  	
        $Bpp= mysqli_num_rows($query_run);
	
	}
	else{ echo 'could not count';}
	$query ="SELECT * FROM transfusedblood WHERE (type='B+' AND hospital='$hospital')";
  
  if ($query_run= mysqli_query($con,$query)){
  	
        $Bpt= mysqli_num_rows($query_run);
	
	}
	else{ echo 'could not count';}
	$bpcount=$Bpp-$Bpt;


//BLOOD GROUP b-
	$query ="SELECT * FROM processedblood WHERE (type='B-' AND hospital='$hospital')";
  
  if ($query_run= mysqli_query($con,$query)){
  	
        $bnp= mysqli_num_rows($query_run);
	
	}
	else{ echo 'could not count';}
	$query ="SELECT * FROM transfusedblood WHERE (type='B-' AND hospital='$hospital')";
  
  if ($query_run= mysqli_query($con,$query)){
  	
        $bnt= mysqli_num_rows($query_run);
	
	}
	else{ echo 'could not count';}
	$bncount=$bnp-$bnt;
	
	//BLOOD GROUP Ab+
	$query ="SELECT * FROM processedblood WHERE (type='AB+' AND hospital='$hospital')";
  
  if ($query_run= mysqli_query($con,$query)){
  	
        $ABpp= mysqli_num_rows($query_run);
	
	}
	else{ echo 'could not count';}
	$query ="SELECT * FROM transfusedblood WHERE (type='AB+' AND hospital='$hospital')";
  
  if ($query_run= mysqli_query($con,$query)){
  	
        $ABpt= mysqli_num_rows($query_run);
	
	}
	else{ echo 'could not count';}
	$abpcount=$ABpp-$ABpt;
	
	
	
	//BLOOD GROUP AB-
	$query ="SELECT * FROM processedblood WHERE (type='AB-' AND hospital='$hospital')";
  
  if ($query_run= mysqli_query($con,$query)){
  	
        $abnp= mysqli_num_rows($query_run);
	
	}
	else{ echo 'could not count';}
	$query ="SELECT * FROM transfusedblood WHERE (type='AB-' AND hospital='$hospital')";
  
  if ($query_run= mysqli_query($con,$query)){
  	
        $abnt= mysqli_num_rows($query_run);
	
	}
	else{ echo 'could not count';}
	$abncount=$abnp-$abnt;
	
	
	//BLOOD GROUP O+
	$query ="SELECT * FROM processedblood WHERE (type='O+' AND hospital='$hospital')";
  
  if ($query_run= mysqli_query($con,$query)){
  	
        $opp= mysqli_num_rows($query_run);
	
	}
	else{ echo 'could not count';}
	$query ="SELECT * FROM transfusedblood WHERE (type='O+' AND hospital='$hospital')";
  
  if ($query_run= mysqli_query($con,$query)){
  	
        $opt= mysqli_num_rows($query_run);
	
	}
	else{ echo 'could not count';}
	$opcount=$opp-$opt;
	
	
	
	//BLOOD GROUP O-
	$query ="SELECT * FROM processedblood WHERE (type='O-' AND hospital='$hospital')";
  
  if ($query_run= mysqli_query($con,$query)){
  	
        $onp= mysqli_num_rows($query_run);
	
	}
	else{ echo 'could not count';}
	$query ="SELECT * FROM transfusedblood WHERE (type='O-' AND hospital='$hospital')";
  
  if ($query_run= mysqli_query($con,$query)){
  	
        $ont= mysqli_num_rows($query_run);
	
	}
	else{ echo 'could not count';}
	$oncount=$onp-$ont;
	
	
	
	}
	?>





<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Donate Blood- Hospitals</title>
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
.style7 {            width: 157px;
}
.style8 {color: #CC0000}
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
                <li><a href="../menu/adminlogincon.php">Dashboard</a></li>
                <li><a href="../password/adminpassword.php">Change password</a></li>
             <?php }else{ ;?>
                <li><a href="../menu/userlogincon.php">Dashboard</a></li>
                <li><a href="../password/userpassword.php">Change password</a></li>
             <?php } ;?>
              
             <li><a href="../menu/logout.php">Log Out</a></li>
           </ul>
         </li>
             <?php }else{ ;?>
          <li><a href="menu/login.php">Login</a></li>
        <?php } ;?>
        </ul>

        <br style="clear: left" />
    </div> <!-- end of templatemo_menu -->
    <div class="cleaner"></div>
</div>	<!-- END of templatemo_header_wrapper -->

<div id="templatemo_main">

  <form id="form1" name="form1" method="post" action="bloodcount.php">
    <label></label>
    <p>
      <label></label>
    </p>
    <table border="1" align="center" class="style1">
	<tr>
        <td align="center" class="style7" style="color: #000000"> Select Hospital</td>
         <td><select name="hospital" size="1" id="hospital">
		<option>101</option>
            <option>102</option>
            <option>103</option>
            <option>104</option>
                        </select></td>
						 <td  class="style7" align="center" style="color: #000000"><input name="details" type="submit" id="details" value="Get Details" /> </td>
      </tr>
	  <tr>
         
      </tr>
	 </table>
	 
   <table  border="1" align="center" class="style1"> <td align="center" width="157" style="color: #000000"><input name="all" type="submit" id="all" value="Get Details from all hospitals" /> </td></table>
   
    <table border="1" align="center" class="style1">

            <tr>
        <td width="157" align="center" class="style7" style="color: #CC0000"> Blood Type</td>
        <td width="98" style="color: #000000"> <span class="style8">Blood Count in the hospital </span></td>
      </tr>
      <tr>
        <td align="center" class="style7" style="color: #000000"> A+</td>
        <td><input name="apcount" type="text" id="apcount" value="<?php echo $apcount; ?>" /> </td>
      </tr>
      <tr>
        <td align="center" class="style7" style="color: #000000"> A-</td>
        <td><input name="ancount" type="text" id="ancount" value="<?php echo $ancount; ?>" /> </td>
      </tr>
      <tr>
        <td align="center" class="style7" style="color: #000000"> B+</td>
        <td><input name="bpcount" type="text" id="bpcount" value="<?php echo $bpcount; ?>" /> </td>
      </tr>
      <tr>
        <td align="center" class="style7" style="color: #000000"> B-</td>
        <td><input name="bncount" type="text" id="bncount" value="<?php echo $bncount; ?>" />  </td>
      </tr>
      <tr>
        <td align="center" class="style7" style="color: #000000"> AB+</td>
        <td><input name="abpcount" type="text" id="abpcount" value="<?php echo $abpcount; ?>" /> </td>
      </tr>
      <tr>
        <td align="center" class="style7" style="color: #000000"> AB-</td>
        <td><input name="abncount" type="text" id="abncount" value="<?php echo $abncount; ?>" />  </td>
      </tr>
      <tr>
        <td align="center" class="style7" style="color: #000000"> 0+</td>
        <td><input name="opcount" type="text" id="opcount" value="<?php echo $opcount; ?>" /> </td>
      </tr>
      <tr>
        <td align="center" class="style7" style="color: #000000"> O-</td>
        <td><input name="oncount" type="text" id="oncount" value="<?php echo $oncount; ?>" /> </td>
      </tr>
	   
    </table>
    <p>&nbsp;</p>
    <label></label>
  </form>
 
  
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
