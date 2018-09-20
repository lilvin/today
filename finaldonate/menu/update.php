<?php
  // update details
   if (isset($_POST['update'])){
   $idNumber = $_POST['idNumber'];
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $email = $_POST['email'];
  $mobile = $_POST['mobile'];
  $password = $_POST['password'];
  //$password_hash=md5($password);
  
   if(!empty($idNumber) && !empty($firstname) && !empty($lastname) && !empty($email) && !empty($mobile) && !empty($password)){
       if (filter_var($email, FILTER_VALIDATE_EMAIL)){
       $query ="SELECT * FROM users WHERE (idNumber='$idNumber' AND password='$password')";
  
  if ($query_run= mysqli_query($con,$query)){
    
        if(mysqli_num_rows($query_run)==1){
  
 $query= "UPDATE users SET firstName='$firstname',lastName='$lastname', email='$email', mobile='$mobile' WHERE idNumber='$idNumber' AND password='$password'";
if ($query_run= mysqli_query($con,$query)){
echo 'record sucessfully updated';
}
else{echo 'record not updated. Ensure that your ID number and password are correct';}
 }
     else{echo 'Wrong ID number/password combination'.  mysqli_error($con);} 
   }
   
   else{echo 'Failed to select details from database'.  mysqli_error($con);}
}
        else{
       echo "invalid email address";
       }
       }
  else{echo 'All fields are required'.  mysqli_error($con);}

}
  
?>

//admin get details
// get details
   if (isset($_POST['update'])){
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $idNumber = $_POST['idNumber'];
    $mobile =$_POST['mobile'];
    $email = $_POST['email'];
    $password=$_POST['password'];
    //$password_hash=md5($password);

  if(!empty($id) && !empty($firstName) && !empty($lastName) && !empty($email) && !empty($mobile) && !empty($password)){
     if (filter_var($email, FILTER_VALIDATE_EMAIL)){
         $query ="SELECT * FROM users WHERE (idNumber='$idNumber' AND password='$password')";
  
  if ($query_run= mysqli_query($con,$query)){
    
        if(mysqli_num_rows($query_run)==1){
  
  
 $query= "UPDATE users SET firstName='$firstname',lastName='$lastname', email='$email', mobile='$mobile'WHERE id='$idNumber' AND password='$password'";
if ($query_run= mysqli_query($con,$query)){
echo 'record sucessfully updated';
}
else{echo 'record not updated. Ensure that your ID number and password are correct';}
 }
   else{echo 'Wrong ID number/password combination'.  mysqli_error($con);} 
   }
   
   else{echo 'Failed to select details from database'.  mysqli_error($con);}
}
      else{
     echo "invalid email address";
     }
     }
  else{echo 'All fields are required'.  mysqli_error($con);}
}

  
?>
