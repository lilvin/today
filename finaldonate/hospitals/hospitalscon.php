<?php

//connecting to database
$servername="localhost";
$username="root";
$password="";
$dbname="bloodbank";
$message='';
error_reporting(0);
session_start();
include ("../menu/functions.php");

$con=new mysqli($servername,$username,$password,$dbname) or die("failed to connect to server");
if (mysqli_connect_error()){
die("connection failed:".mysqli_connect_error());
}
$email=$_SESSION['email'];
  $sql=$con->query("SELECT * FROM users WHERE email='$email'");
  $return=mysqli_fetch_assoc($sql);

//add hospital
if (isset($_POST['add']))
{
    $ID = $_POST['hospitalID'];
    $name = $_POST['name'];
    $telephone = $_POST['telephone'];
    $location = $_POST['location'];
    $email=$_POST['email'];
	  if(!empty($ID) && !empty($name) && !empty($telephone) && !empty($location)){
	   
	   $sql = "INSERT INTO hospitals(hospitalID,name,mobileNo,location,email) VALUES ('$ID','$name','$telephone','$location','$email')";
	   
	   if($con->query($sql)===TRUE)
	   {
	   $message="registration successfull";
	   }
	   else{
	   $message= "Error:" . $sql. "<br>" . $con->error;
	   }
	  
	   }
	    else{$message= 'Please insert all hospital details'.  mysqli_error($con);}
	   }
	   
//get details
if (isset($_POST['search']))
{
$ID = $_POST['hospitalID'];
  if(!empty($ID)){
  $query ="SELECT * FROM hospitals WHERE (hospitalID='$ID')"; 
  if ($query_run= mysqli_query($con,$query)){
    if(mysqli_num_rows($query_run)==1){
   while($row= $query_run->fetch_assoc()){
  $ID = $row['hospitalID'];
 $name =$row['name'];
  $telephone =$row['mobileNo'];
  $location =$row['location'];
  $hospitalemail=$row['email'];
  
   $cquery ="SELECT  COUNT (*) FROM processedblood WHERE (hospital='$ID')";
$ancount=$cquery;
}
         }
   else{$message= 'Hospital Identification entered does not exist'.  mysqli_error($con);} 
   }
   
   else{$message= 'Failed to select details from database'.  mysqli_error($con);}
   }
  else{$message= 'Please insert hospital ID'.  mysqli_error($con);}
     }
   
   
  // update details
   if (isset($_POST['update'])){
   $ID = $_POST['hospitalID'];
  $name = $_POST['name'];
  $telephone = $_POST['telephone'];
  $location = $_POST['location'];
    
   if(!empty($ID) && !empty($name) && !empty($telephone) && !empty($location)){
 $query= "UPDATE hospitals SET name='$name', mobileNo='$telephone', location='$location' WHERE hospitalID='$ID'";
if ($query_run= mysqli_query($con,$query)){
  echo "yees";
$message= "record sucessfully updated";
}
else{$message= 'record not updated';}
     
     }
  else{$message= 'All fields are required'.  mysqli_error($con);}

}


//delete record
if (isset($_POST['delete'])){

 $ID = $_POST['hospitalID'];
 
 $query= "DELETE FROM hospitals WHERE hospitalID='$ID'";
if ($query_run= mysqli_query($con,$query)){
$message= 'record sucessfully deleted';
}
else{$message= 'An error occured..record not deleted';}
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<link href="/finaldonate/css/templatemo_style.css" rel="stylesheet" type="text/css" />
<!-- templatemo 358 carousel -->

<!-- Carousel Template 
http://www.templatemo.com/preview/templatemo_358_carousel  -->
<script type="text/javascript" src="/finaldonate/js/jquery-1-4-2.min.js"></script> 
<script type="text/javascript" src="/jqueryui/js/jquery-ui-1.7.2.custom.min.js"></script>
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
          <li><a href="../menu/login.php">Login</a></li>
        <?php } ;?>
            

        </ul>
        <br style="clear: left" />
    </div> <!-- end of templatemo_menu -->
    <div class="cleaner"></div>
</div>	<!-- END of templatemo_header_wrapper -->

<div id="templatemo_main">
  <div class="alert alert-success col-md-6" id="message" style="<?php if ($message != "") {?> display: block; margin-left: 350px; <?php } ;?>">
   <?php echo $message ;?>
</div>
<table width="750" height="373" border="1" align="center" height:400px; >
  <tr>
    <th colspan="2" rowspan="7" scope="col">
<!--newtable inside big table -->

  <form id="form1" name="form1" method="post" action="hospitalscon.php">
    <label></label>
    <p>
      <label></label>
    </p>
    <table width="481" border="1" align="center">
      <tr>
        <th colspan="2" scope="col"><span class="style8">Hospital Details </span></th>
        <th scope="col"><div align="left"></div></th>
      </tr>
      <tr>
        <td width="102"><span class="style3">Hospital ID </span></td>
        <td width="196"><input name="hospitalID" type="text" id="hospitalID" value="<?php echo $ID; ?>"/></td>
        <td width="161">
          
          <div align="left">
            <input style="width:120px" name="add" type="submit" id="submit" value="Add Hospital" />
          </div></td>
      </tr>
      <tr>
        <td><span class="style3">Hospital Name </span></td>
        <td><input name="name" type="text" id="name" value="<?php echo $name; ?>"/></td>
        <td>
          
          <div align="left">
            <input style="width:120px" name="search" type="submit" id="search" value="Search Hospital" />
          </div></td>
      </tr>
      <tr>
        <td><span class="style3">Telephone</span></td>
        <td><input name="telephone" type="text" id="telephone" value="<?php echo $telephone; ?>" /></td>
        <td>
          
          <div align="left">
            <input style="width:120px" name="update" type="submit" id="update" value="Update Record" />
          </div></td>
      </tr>
      <tr>
        <td><span class="style3">Location</span></td>
        <td><input name="location" type="text" id="location" value="<?php echo $location; ?>" /></td>
        <td>
          
          <div align="left">
		  
            <input style="width:120px" name="del" type="button" id="del" value="Delete Record" onclick="location.href='/finaldonate/hospitals/confirmdelete.php'" /> 
			
          </div></td>
      </tr>
      <tr>
        <td><span class="style3">Email</span></td>
        <td><input name="email" type="text" id="email"value="<?php echo $hospitalemail; ?>" /></td>
        <td>
        </tr>
      <tr>
      <tr>
        <td colspan="3"> <div align="center">
          <p class="style3">&nbsp;</p>
          <p class="style3">&nbsp;</p>
        </div></td>
      </tr>
    </table>
    
  </form>
 <table width="330" border="1" align="center" style="margin-top:5px">
      <tr>
        <td><div align="center">
          <input name="view" type="submit" id="view" value="View blood count" onClick="location.href='/finaldonate/blood/bloodcount.php'"/>
        </div></td>
      </tr>
    </table>
	
	<!--second column-->
	 </th>
    <th colspan="2" bgcolor="#FFFFFF" scope="col"><span class="style9">Menu</span></th>
  </tr>
  <tr>
    <td width="179" bgcolor="#CC3366"><input  style="width:150px" name="update2" type="submit" id="update2" value="Update personal Details" onclick="location.href='/finaldonate/menu/adminupdate.php'"/>    </td>
    <td width="169" bgcolor="#CC3366"><input style="width:150px"  name="hospitals" type="submit" id="hospitals" value="Hospitals" onclick="location.href='/finaldonate/hospitals/hospitals.php'"/></td>
  </tr>
  <tr>
    <td bgcolor="#CC3366"><input  style="width:150px" name="password" type="submit" id="password" value="Change Password" onclick="location.href='/finaldonate/password/adminpassword.php'"/></td>
    <td bgcolor="#CC3366"><input style="width:150px" name="types" type="submit" id="types" value="Blood Counts" onclick="location.href='/finaldonate/blood/bloodtypes.php'"/></td>
  </tr>
  <tr>
    <td bgcolor="#CC3366"><input style="width:150px" name="processed" type="submit" id="processed" value="Processed Blood" onclick="location.href='/finaldonate/blood/processedblood.php'"/></td>
    <td bgcolor="#CC3366"><input style="width:150px" name="donated" type="submit" id="donated" value="Donated Blood" onclick="location.href='/finaldonate/blood/donatedblood.php'"/></td>
  </tr>
  <tr>
    <td bgcolor="#CC3366"><input style="width:150px" name="recipientsapp" type="submit" id="recipientsapp" value="Recipients Appointments" onclick="location.href='/finaldonate/appointments/adminrecipients.php'"/></td>
    <td bgcolor="#CC3366"><input style="width:150px" name="transfused" type="submit" id="transfused" value="Transfused Blood" onclick="location.href='/finaldonate/blood/transfusedblood.php'"/></td>
  </tr>
  <tr>
    <td bgcolor="#CC3366"><input style="width:150px" name="donorsapp" type="submit" id="donorsapp" value="Donors Appointments" onclick="location.href='/finaldonate/appointments/admindonors.php'"/></td>
    <td bgcolor="#CC3366"><input style="width:150px" name="discard" type="submit" id="discard" value="Discard Blood" onclick="location.href='/finaldonate/blood/discardblood.php'"/></td>
  </tr>
  <tr>
    <td bgcolor="#CC3366">&nbsp;</td>
    <td bgcolor="#CC3366">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="4"><div align="center"></div></td>
  </tr>
</table>
  
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

