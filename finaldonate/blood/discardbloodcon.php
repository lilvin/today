

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
 
//delete expired records
if (isset($_POST['delete'])){

 $edate = $_POST['edate'];
 
 $query= "DELETE FROM processedblood WHERE edate='$edate'";
if (mysqli_query($con,$query)){
echo 'records sucessfully deleted';
}
else{echo 'An error occured..records not deleted';}
}

//delete infected record
if (isset($_POST['deletes'])){

 $status = $_POST['status'];
 
 $query= "DELETE FROM processedblood WHERE status='$status'";
if (mysqli_query($con,$query)){
echo 'records sucessfully deleted';
}
else{echo 'An error occured..records not deleted';}
}
?>
