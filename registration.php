<!DOCTYPE html>
<html>
<head>
	<title>User Registration</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="design.css">
</head>
<body>

<div>
	<?php

		include 'config.php';

		if(isset($_POST['submit'])){
			$firstname = $_POST['firstname'];
			$lastname = $_POST['lastname'];
			$email = $_POST['email'];
			$phonenumber = $_POST['phonenumber'];
			$password = $_POST['password'];

			$fullname = $firstname." ".$lastname;

			$check_sql = "select * from users where email='$email';";
			$check_result = mysqli_query($conn,$check_sql);
			$check_result_num = mysqli_num_rows($check_result);

			if($check_result_num>0){
				echo '<script language="javascript">';
				echo 'alert("User already exist with this email address!")';
				echo '</script>';
			}else{
				$sql = "insert into users (name, email, phone, password) values ('$fullname', '$email', '$phonenumber', '$password');";
				$result = mysqli_query($conn,$sql);

				if ($result) {
					echo '<script language="javascript">';
					echo 'alert("Registration done successfully!!")';
					echo '</script>';
				}else{
					echo '<script language="javascript">';
					echo 'alert("There was an error in registration! Please try again later.")';
					echo '</script>';
				}
			}
		}

	?>
</div>

<div class="container">
	<form action="registration.php" method="post">
		<h1 align="center">Registration</h1><br>
		<div align="center"><input type="text" name="firstname" required="true" placeholder="Enter First Name"><br></div>
		<div align="center"><input type="text" name="lastname" required="true" placeholder="Enter Last Name"><br></div>
		<div align="center"><input type="email" name="email" required="true" placeholder="Enter Email"><br></div>
		<div align="center"><input type="text" name="phonenumber" required="true" placeholder="Enter Phone Number"><br></div>
		<div align="center"><input type="password" name="password" required="true" placeholder="Enter Password"><br></div>
		
		<div align="center"><input type="submit" name="submit" value="Register" class="otpbutton"></div>
 		
	</form>

	<div class="container signin">
    <p>Already have an account? <a href="login.php">Sign in</a>.</p>
  </div>

</div>

</body>
</html>