<?php
//connecting to database
$servername="localhost";
$username="root";
$password="";
$dbname="bloodbank";


$con=new mysqli($servername,$username,$password,$dbname) or die("failed to connect to MySQL:".mysql_error());
if ($con->connect_error){
die("connection failed:".$con->connect_error);
}


//inserting record 
 
		$firstName = $_POST['firstName'];
		$lastName = $_POST['lastName'];
		$idNumber = $_POST['idNumber'];
		$mobile = $_POST['mobile'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$user="user";
			  // $password_hash=md5($password);

		if (empty($firstName) && empty($lastName) && empty($idNumber) && empty($email) && empty($mobile) && empty($password) ) {
			
			echo 'All fields are required';

		}elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			
			echo "invalid email address";
		}else{

			$sql = "INSERT INTO users(firstName,lastName,idNumber,mobile,email,userType,password) VALUES ('$firstName','$lastName','$idNumber','$mobile','$email','$user','$password')";
			// var_dump($sql);
			// die();

            $query = mysqli_query($con,$sql);

				   if(!$query)
				   {
				   echo"registration failed.";
				   }
				   else{
				   echo "registration successful.login to proceed";
				   }

		}

		// /*lilian*/
	  
	 //  if(!empty($firstName) && !empty($lastName) && !empty($idNumber) && !empty($email) && !empty($mobile) && !empty($password)){

	 //  if(filter_var($email, FILTER_VALIDATE_EMAIL)){	   
	   
	 //   $sql = "INSERT INTO users(firstName,lastName,idNumber,mobile,email,userType,password) VALUES ('$firstName','$lastName','$idNumber','$mobile','$email','$user',$password')";
	   
	 //   if(!$con->query($sql))
	 //   {
	 //   echo"registration failed. You might have entered an existing email address or ID number.";
	 //   }
	 //   else{
	 //   echo "success";
	 //   }
	 //   }
	 //    else{
	 //   echo "invalid email address";
	 //   }
	 //    }
  // else{echo 'All fields are required'.  mysqli_error($con);}
     
	   $con->close();
	   
?>
