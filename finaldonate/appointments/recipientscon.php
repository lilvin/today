<?php
//connecting to database
$servername="localhost";
$username="root";
$password="";
$dbname="bloodbank";


$con=new mysqli($servername,$username,$password,$dbname) or die("failed to connect to server");
if (mysqli_connect_error()){
die("connection failed:".mysqli_connect_error());
}



 if (isset($_POST['book'])){
 $ID = $_POST['idNumber'];
 $mobile = $_POST['mobileNumber'];
  $location = $_POST['location'];
  $blood=$_POST['blood'];
   $hospital = $_POST['hospital'];
    $date = $_POST['date'];
    $time=$_POST['time'];
    $appointmentType="RECIPIENT";
    if(!empty($ID)&& !empty($mobile)  && !empty($location) && !empty($hospital) && !empty($date)){
     
     $sql = "INSERT INTO appointments(idNumber,mobileNumber,hospitaID,location,bloodType,date,time,appointmentType) VALUES ('$ID','$mobile','$hospital','$location','$blood','$date','$time','$appointmentType')";
     
     if($con->query($sql)===TRUE)
     {
     echo"booking successfull. You will be contacted for further guidance.";
     }
     else{
     echo "Error:" . $sql. "<br>" . $con->error;
     }
     $con->close();
     }
      else{echo 'Please insert all booking details'.  mysqli_error($con);}
     }
     
     
     
     //cancel appointment
     if (isset($_POST['cancel']))
{
$ID = $_POST['idNumber'];
$date =$_POST['date'];
  $password =$_POST['password'];
 
  
  if(!empty($ID) && !empty($password)){
  $query ="SELECT * FROM users WHERE (idNumber='$ID' AND password='$password')";
  
  if ($query_run= mysqli_query($con,$query)){
    
        if(mysqli_num_rows($query_run)==1){
   
  //  echo 'yees';
  //  while($row= $query_run->fetch_assoc()){
  // if (isset($_POST['delete'])){

 $ID = $_POST['idNumber'];
 
 $query= "DELETE FROM appointments WHERE idNumber='$ID' AND date='$date'";
if ($query_run= mysqli_query($con,$query)){
echo 'record sucessfully deleted';
}
// else{echo 'An error occured..record not deleted';}
// }
         }
   else{echo 'Wrong ID/password combination'.  mysqli_error($con);} 
   }
   
   else{echo 'Failed to select details from database'.  mysqli_error($con);}
   }
  else{echo 'Please insert your ID number and password'.  mysqli_error($con);}
}
?>

