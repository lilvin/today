<?php

//connecting to database
$servername="localhost";
$username="root";
$password="";
$dbname="bloodbank";
$message='';
session_start();
include ("../menu/functions.php");

$con=new mysqli($servername,$username,$password,$dbname) or die("failed to connect to server");
if (mysqli_connect_error()){
die("connection failed:".mysqli_connect_error());
}
$email=$_SESSION['email'];
  $sql=$con->query("SELECT * FROM users WHERE email='$email'");
  $return=mysqli_fetch_assoc($sql);
 

if (isset($_POST['search']))
{
$ID = $_POST['ID'];
 $date = $_POST['date'];

  
  if(!empty($ID) && !empty($date)){
  $query ="SELECT * FROM appointments WHERE (idNumber='$ID'AND date='$date') AND appointmentType='RECIPIENT'";
  
  if ($query_run= mysqli_query($con,$query)){
  	
        if(mysqli_num_rows($query_run)==1){
   
   echo 'yees';
   while($row= $query_run->fetch_assoc()){
  $ID = $row['idNumber'];
 $mobile =$row['mobileNumber'];
  $location =$row['location'];
  $hospital =$row['hospitaID'];
  $blood =$row['bloodType'];
  $date =$row['date'];
  $time=$row['time'];

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Donate Blood- Appointments Page</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"/>

<style>
	html{overflow-x:hidden;}
	</style>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link href="/finaldonate/css/templatemo_style.css" rel="stylesheet" type="text/css" />
<!-- templatemo 358 carousel -->
<!-- 
Carousel Template 
http://www.templatemo.com/preview/templatemo_358_carousel 
-->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.js.css">
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
<table width="712" height="373" border="1" align="center" height:400px; >
  <tr>
    <th colspan="2" rowspan="7" scope="col">
<!--newtable inside big table -->

  <form id="form1" name="form1" method="post" action="adminrecipientscon.php">
    <label></label>
    <p>
      <label></label>
    </p>
    <table width="332" border="1" align="center">
      <tr>
        <th colspan="2" scope="col">Search or update appointments details using ID number and date.</th>
      </tr>
      <tr>
        <td width="109"><span class="style3">ID number </span></td>
        <td width="207"><p>
          <input name="ID" maxlength="8" id="ID" value="<?php echo $ID; ?>">
          </input>
        </p>        </td>
      </tr>
	  	        <tr>
        <td width="109"><span class="style3">Mobile </span></td>
        <td width="207"><p>
          <input name="mobile" maxlength="10" id="mobile" value="<?php echo $mobile; ?>">
          </input>
        </p>        </td>
      </tr>

      <tr>
        <td><span class="style3">Location</span></td>
        <td><p>
          <select name="location" size="1" id="location" value="<?php echo $location; ?>">
            <option>Nairobi</option>
            <option>Kisumu</option>
            <option>Kitale</option>
            <option>Eldoret</option>
          </select>
        </p>        </td>
      </tr>
      <tr>
        <td>Hospital</td>
        <td><select name="hospital" size="1" id="hospital" value="<?php echo $hospital; ?>">
		<option>101</option>
            <option>102</option>
            <option>103</option>
            <option>104</option>
                        </select></td>
      </tr>
     
	   <tr>
        <td>Blood Type</td>
        <td><select name="blood" size="1" id="blood" value="<?php echo $blood; ?>">
		<option>A+</option>
            <option>A-</option>
            <option>AB+</option>
			<option>AB-</option>
            <option>B+</option>
			<option>B-</option>
            <option>0+</option>
            <option>O-</option>
            
                        </select></td>
      </tr>
	   <tr>
        <td>Appointment Date </td>
        <td><input name="date" type="date" id="date" value="<?php echo $date; ?>">
                        </input></td>
      </tr>
      <tr>
        <td>Appointment time </td>
        <td><input name="time" type="time" id="time" value="<?php echo $time; ?>">
                        </input></td>
      </tr>
	  	   <tr>
        <td>New Appointment Date </td>
        <td><input name="newdate" type="date" id="newdate" >
                        </input></td>
      </tr>

      <tr>
        <td colspan="2">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="2"> <div align="center">
          <input name="search" type="submit" id="search" value="search appointment" />
		   <input name="update" type="submit" id="update" value="update appointment" />
		          </div></td>
      </tr>
    </table>
	 </form>
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

    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <label></label>
 
  
   
  <p>&nbsp;</p>
 
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

<?php 
}
}
	 else{echo 'Wrong appointment details'.  mysqli_error($con);} 
   }
   
   else{echo 'Failed to select details from database'.  mysqli_error($con);}
   }
  else{echo 'Please insert patient ID and appointment date'.  mysqli_error($con);}
     }
	 
	 
  // update details
   if (isset($_POST['update'])){
   $ID = $_POST['ID'];
  $mobile = $_POST['mobile'];
  $location = $_POST['location'];
  $hospital = $_POST['hospital'];
  $blood = $_POST['blood'];
  $date = $_POST['date'];
  $time=$_POST['time'];
  $newdate = $_POST['newdate'];
  
    
   if(!empty($ID) && !empty($date) && !empty($mobile) && !empty($location) && !empty($hospital) && !empty($blood)){
 $query= "UPDATE appointments SET ID='$ID', mobile='$mobile', location='$location' , hospital='$hospital', blood='$blood', date='$newdate',time='$time'  WHERE ID='$ID' AND date='$date'";
if ($query_run= mysqli_query($con,$query)){
echo 'record sucessfully updated';
}
else{echo 'record not updated';}
}
else{echo 'All fields are required';}
}

//////full list 
	 if (isset($_POST['all']))
{
  
  $query ="SELECT * FROM appointments WHERE appointmentType='RECIPIENT'";

  if ($query_run= mysqli_query($con,$query)){
  	
        if(mysqli_num_rows($query_run)>0){
          // header("Content-Type: application/xls");    
          // header("Content-Disposition: attachment; filename=Recipients Appointments.xls"); 
          // header("Pragma: no-cache"); 
          // header("Expires: 0");
           echo
    '<table border=1>
  <tr>
  <th> idNumber</th>
  <th> mobileNumber</th>
  <th> location</th>
  <th> hospital</th>
  <th> bloodType</th>
  <th> date</th>
  <th> Time</th>
  </tr>';
   
   while($row= mysqli_fetch_assoc($query_run)){

echo "<tr>";
echo "<td>".$row['idNumber']."</td>";
echo "<td>".$row['mobileNumber']."</td>";
echo "<td>".$row['location']."</td>";
echo "<td>".$row['hospitaID']."</td>";
echo "<td>".$row['bloodType']."</td>";
echo "<td>".$row['date']."</td>";
echo "<td>".$row['time']."</td>";
echo "</tr>";

}
echo "</table>";
         }

	 else{echo 'No menu items'.  mysqli_error($con);} 
   }
   
   else{echo 'Failed to select details from database'.  mysqli_error($con);}
   
        }



?>
