<!DOCTYPE html>
<html>
<head>
	<title>User Login</title>
</head>
<body>

<div>

	<div>
		<?php

			include 'config.php';

			if(isset($_POST['submit'])){
				$email = $_POST['email'];
				$password = $_POST['password'];

				$pass_sql = "select * from users where email = '$email' AND password = '$password';";
				$pass_check = mysqli_query($conn,$pass_sql);
				$pass_check_num = mysqli_num_rows($pass_check);

				if ($pass_check_num<=0) {
					echo "Email or password is incorrect. Please try again carefully!";
				}else{
					echo "Login successful!";
				}


			}

		 ?>
	</div>

	<div>
		<form action="login.php" method="post">
			<h1>Login</h1><br>
			Email
			<input type="email" name="email" required="true"><br>
			Password
			<input type="password" name="password" required="true"><br>

			<input type="submit" name="submit" value="Login">
	 		
		</form>
	</div>
</div>

</body>
</html>