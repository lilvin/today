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
?>
