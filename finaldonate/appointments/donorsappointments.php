<?php
//connecting to database
$message='';
$servername="localhost";
$username="root";
$password="";
$dbname="bloodbank";
session_start();
include ("../menu/functions.php");

$con=new mysqli($servername,$username,$password,$dbname) or die("failed to connect to server");
if (mysqli_connect_error()){
die("connection failed:".mysqli_connect_error());
}
$email=$_SESSION['email'];
  $sql=$con->query("SELECT * FROM users WHERE email='$email'");
  $return=mysqli_fetch_assoc($sql);



 if (isset($_POST['book'])){
 $ID = $_POST['ID'];
   $hospital = $_POST['hospital'];
    $date = $_POST['date'];
    $time=$_POST['time'];
    $appointmentType="DONOR";
    if(!empty($ID) && !empty($hospital) && !empty($date)){
     
     $sql = "INSERT INTO appointments(idNumber,hospitaID,date,time,appointmentType) VALUES ('$ID','$hospital','$date','$time','$appointmentType')";
     
         if($con->query($sql)===TRUE)
         {
         //echo"booking successfull. You will be contacted for further guidance.";
            $message = "booking successfull. You will be contacted for further guidance.";
         }
         else{
           $message= "Error:" . $sql. "<br>" . $con->error;
         }
     }
      else{
        $message = 'Please insert all booking details'.  mysqli_error($con);
      }
    }
     
     
     
     //cancel appointment
     if (isset($_POST['cancel']))
{
$ID = $_POST['ID'];
$date =$_POST['date'];
  $password =$_POST['password'];
 
  
  if(!empty($ID) && !empty($password)){
  $query ="SELECT * FROM users WHERE (idNumber='$ID' AND password='$password')";
  
  if ($query_run= mysqli_query($con,$query)){
    
        if(mysqli_num_rows($query_run)==1){
   
  //  echo 'yees';
  //  while($row= $query_run->fetch_assoc()){
  // if (isset($_POST['delete'])){

 $ID = $_POST['ID'];
 
 $query= "DELETE FROM appointments WHERE idNumber='$ID' AND date='$date'";
if ($query_run= mysqli_query($con,$query)){
echo 'record sucessfully deleted';
}
else{echo 'An error occured..record not deleted';}
}
         }
   else{echo 'Wrong ID/password combination'.  mysqli_error($con);} 
   }
   
   else{echo 'Failed to select details from database'.  mysqli_error($con);}
   }
  // else{echo 'Please insert your ID number and password'.  mysqli_error($con);}
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
.style4 {color: #CC0000}
.style2 {            width: 469px;
}
.style5 {}
-->
#message{
  display: none;
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
   <div class="alert alert-success col-md-6" id="message" style="<?php if( $message != ""){?> display: block; margin-left:350px;<?php } ;?>">
      <p><strong><?php echo $message ;?></strong></p>
     </div>
<table width="332" height:300px; border="1" align="center" >
  <tr>
    <th colspan="2" rowspan="7" scope="col">
	<!-- begin table inside table-->
  <form id="form1" name="form1" method="post" action="donorsappointments.php">
    
    <table width="332" border="1" align="center">
      <tr>
        <th colspan="2" scope="col">Book an appointment to doante blood </th>
      </tr>
      <tr>
        <td width="109"><span class="style3">ID number </span></td>
        <td width="207"><p>
          <input name="ID" maxlength="8" id="ID">
          </input>
        </p>        </td>
      </tr>
      
        <td>Hospital</td>
        <td><select name="hospital" size="1" id="hospital">
		<option>101</option>
            <option>102</option>
            <option>103</option>
            <option>104</option>
                        </select></td>
      </tr>
	 
      <tr>
        <td>Appointment date </td>
        <td><input name="date" type="date" id="date">
                        </input></td>
      </tr>
      <tr>
        <td>Appointment time </td>
        <td><input name="time" type="time" id="time">
                        </input></td>
      </tr>
      <tr>
        <td colspan="2">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="2"> <div align="center">
          <input name="book" type="submit" id="book" value="Book appointment" />
		            
        </div></td>
      </tr>
    </table>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <label></label>
  </form>
  <!--second column--></th>
    <th colspan="2" bgcolor="#FFFFFF" scope="col"><span class="style9">Menu</span></th>
  </tr>
  <tr>
    <td width="143" bgcolor="#CC3366"><input name="update" type="submit" id="update" value="Update details"  onclick="location.href='/finaldonate/menu/donorsupdate.php'"/></td>
    <td width="1" bgcolor="#CC3366">&nbsp;</td>
  </tr>
  <tr>
    <td bgcolor="#CC3366"><input name="password" type="submit" id="password" value="Change Password" onclick="location.href='/finaldonate/password/donorspassword.php'"/></td>
    <td bgcolor="#CC3366">&nbsp;</td>
  </tr>
  <tr>
    <td bgcolor="#CC3366"><input name="hospital2" type="submit" id="hospital2" value="Search for hospital" onclick="location.href='/finaldonate/hospitals/searchhospital.php'"/></td>
    <td bgcolor="#CC3366">&nbsp;</td>
  </tr>
  <tr>
    <td bgcolor="#CC3366"><input name="appointment" type="submit" id="appointment" value="Book appointment" onclick="location.href='/finaldonate/appointments/donorsappointments.php'"/></td>
    <td bgcolor="#CC3366">&nbsp;</td>
  </tr>
  <tr>
    <td bgcolor="#CC3366"><input name="cancel" type="submit" id="cancel" value="Cancel appointment" onclick="location.href='/finaldonate/appointments/donorscancel.php'"/></td>
    <td bgcolor="#CC3366">&nbsp;</td>
  </tr>
  <tr>
    <td bgcolor="#CC3366">&nbsp;</td>
    <td bgcolor="#CC3366">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="4"><div align="center"></div></td>
  </tr>
</table>
  
   <form id="form1" name="form1" method="get" action="donorslogincon.php">
    <label></label>
   </form>
  <p>&nbsp;</p>
</div> <!-- END of templatemo_main -->



<div id="templatemo_bottom_wrapper">
    <div id="templatemo_bottom">
    	<div class="col one_third">
        	<h4><span></span>Our Services</h4>
            <div class="bottom_box">
                <ul class="footer_list">
                    <li><a href="/donateblood/services.html">Appointments booking</a></li>
                    <li><a href="/donateblood/services.html">Blood donation services</a></li>
                    <li><a href="/donateblood/services.html">Blood transfusion services</a></li>
                    <li><a href="/donateblood/services.html">Health guidance</a></li>
                    
                </ul>  
			</div>
        </div>
        <div class="col one_third">
        	<h4><span></span>Contact us</h4>
            <div class="bottom_box">
			 <p><em> Contact us using the social links. Find contact detailsfor specific hospitals in our <a href="/donateblood/contact.html">Contact Us</a> page. </em></p><br />
                <div class="footer_social_button">
                    <a href="#"><img src="/donateblood/images/facebook.png" title="facebook" alt="facebook" /></a>
                    <a href="#"><img src="/donateblood/images/flickr.png" title="flickr" alt="flickr" /></a>
                    <a href="#"><img src="/donateblood/images/twitter.png" title="twitter" alt="twitter" /></a>
                    
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

