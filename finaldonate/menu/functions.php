<?php

function email_exists($con ,$email){

    $result=mysqli_query($con,"SELECT * FROM users WHERE email='$email'");

    if(mysqli_num_rows($result) >0){

        return true;

    }else{

        return false;
    }
}
function mobile_exists($con ,$mobile){

    $result=mysqli_query($con,"SELECT * FROM users WHERE mobile='$mobile'");

    if(mysqli_num_rows($result) >0){

        return true;

    }else{

        return false;
    }
}
function idNumber_exists($con ,$idNumber){

    $result=mysqli_query($con,"SELECT * FROM users WHERE idNumber='$idNumber'");

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

function admin_login(){
     if(isset($_SESSION['email']) || isset($_COOKIE['email'])){
    $_SESSION['email'] = $email;
     $result=mysqli_query($con,"SELECT * FROM users WHERE email='$email'");
     $sql=$result->fetch_assoc($result);

     if ($sql['userType'] == 'admin') {
         return true;
     }else{
        return false;
     }
    
   }
   function serial_exists($con ,$serial){

    $result=mysqli_query($con,"SELECT * FROM processedblood WHERE serial='$serial'");

    if(mysqli_num_rows($result) >0){

        return true;

    }else{

        return false;
    }
}
}
?>
