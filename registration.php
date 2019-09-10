<!DOCTYPE html>
<html>
<head>
	<title>User Registration</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style>
		body{
			font-family: Arial, Helvetica, sans-serif;
			background-color: #030303;
		}
		* {
			box-sizing: border-box;
		}
		/*Add padding to containers*/
		.container{
			padding: 16px;
			color: white;
			/*background-color: #4d3434;*/
		}

		::placeholder{
			color: #fcfafa;
		}

		/*Full width input fields*/
		input[type=text], input[type=password], input[type=email] {
			width :100%;
			padding: 15px;
			margin: 5px 0 22px 0;
			border-radius: 25px;
			border: 2px solid white;
			background-color: #030303;
			color: white;
		}
		
		input[type=text]:focus, input[type=password]:focus, input[type=email]:focus{
			background-color: #130e0e;	
			outline: none;
		}

		/* overwrite deafult of hr*/

		hr{
			border: 1px solid #f1f1f1;
			margin-bottom: 25px;
		}

		/* set style for submit button*/
		.registerbutton{
			background-color: #130e0e;
			color: white;
			padding: 16px 20px;
			border: none;
			margin-bottom: 20px;
			cursor: pointer;
			opacity: 0.9;
			border-radius: 25px;
			border: 2px solid white;
			width: 100%;
		}

		.registerbutton:hover{
			opacity: 1
		}

		.signin{
			text-align: center;
		}

		/* Add a blue text color to links */
		a{
			color: dodgerblue;
		}

	</style>
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

<div class="container">
	<form action="registration.php" method="post">
		<h1 align="center">Registration</h1><br>
		<hr>
		<label for="firstname"><b>First Name</b></label><br>
		<input type="text" name="firstname" required="true" placeholder="Enter First Name"><br>
		<label for="lastname"><b>Last Name</b></label>
		<input type="text" name="lastname" required="true" placeholder="Enter Last Name"><br>
		<label for="email"><b>Email</b></label>
		<input type="email" name="email" required="true" placeholder="Enter Email"><br>
		<label for="phonenumber"><b>Phone Number</b></label>
		<input type="text" name="phonenumber" required="true" placeholder="Enter Phone Number"><br>
		<label for="password"><b>Password</b></label>
		<input type="password" name="password" required="true" placeholder="Enter Password"><br>
		<label for="cnfpassword"><b>Confirm Password</b></label>
		<input type="password" name="cnfpassword" required="true" placeholder="Confirm Password"><br>

		<input type="submit" name="submit" value="Register" class="registerbutton">
 		
	</form>

	<div class="container signin">
    <p>Already have an account? <a href="login.php">Sign in</a>.</p>
  </div>

</div>

</body>
</html>