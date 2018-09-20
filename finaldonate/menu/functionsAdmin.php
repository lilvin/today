<?php

function email_exists($con ,$email){

    $result=mysqli_query($con,"SELECT * FROM users WHERE email='$email' AND userType='admin'");

    if(mysqli_num_rows($result) >0){

        return true;

    }else{

        return false;
    }
}

function logged_in(){
 
   if(isset($_SESSION['email']) || isset($_COOKIE['email'])){

    return true;

   }else{

    return false;
   }
}
?>
