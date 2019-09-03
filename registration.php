<!DOCTYPE html>
<html>
<head>
	<title>User Registration</title>
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
				echo "User already exist with this email address!";
			}else{
				$sql = "insert into users (name, email, phone, password) values ('$fullname', '$email', '$phonenumber', '$password');";
				$result = mysqli_query($conn,$sql);

				if ($result) {
					echo "Registration done successfully!!";
				}else{
					echo "There was an error in registration! Please try again later.";
				}
			}
		}

	?>
</div>

<div>
	<form action="registration.php" method="post">
		<h1>Registration</h1><br>
		First Name
		<input type="text" name="firstname" required="true"><br>
		Last Name
		<input type="text" name="lastname" required="true"><br>
		Email
		<input type="email" name="email" required="true"><br>
		Phone Number
		<input type="text" name="phonenumber" required="true"><br>
		Password
		<input type="password" name="password" required="true"><br>

		<input type="submit" name="submit" value="Register">
 		
	</form>
</div>

</body>
</html>