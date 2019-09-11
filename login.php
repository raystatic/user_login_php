<!DOCTYPE html>
<html>
<head>
	<title>User Login</title>
	<meta name="viewport" content="width=device-width, inital-scale=1">
	<link rel="stylesheet" type="text/css" href="design.css">
</head>
<body>

<div>

	<div>
		<?php

			session_start();

			include 'config.php';
			// include 'otp.php';
					

			if(isset($_POST['submit'])){
				$email = $_POST['email'];
				$password = $_POST['password'];

				$pass_sql = "select * from users where email = '$email' AND password = '$password';";
				$pass_check = mysqli_query($conn,$pass_sql);
				$pass_check_num = mysqli_num_rows($pass_check);

				if ($pass_check_num<=0) {
					echo '<script language="javascript">';
					echo 'alert("Email or password is incorrect. Please try again carefully!")';
					echo '</script>';
				}else{
						$otp = rand(pow(10, 4), pow(10, 5)-1);
						while($row = mysqli_fetch_array($pass_check)){
                            $phone = $row['phone'];
                        }

						$curl = curl_init();

						curl_setopt_array($curl, array(
						  CURLOPT_URL => "https://www.fast2sms.com/dev/bulk?authorization=ZkCIq1fsd0T2Yi7ap9byjnRBLuQXK6cemP4hSAwxW5V3MzGlgre1qBLDzoZxKCbGSWiXfdUYPt9TrluA&sender_id=FSTSMS&language=english&route=qt&numbers=".urlencode($phone)."&message=15360&variables=".urlencode('{BB}')."&variables_values=".urlencode($otp)."",
						  CURLOPT_RETURNTRANSFER => true,
						  CURLOPT_ENCODING => "",
						  CURLOPT_MAXREDIRS => 10,
						  CURLOPT_TIMEOUT => 30,
						  CURLOPT_SSL_VERIFYHOST => 0,
						  CURLOPT_SSL_VERIFYPEER => 0,
						  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
						  CURLOPT_CUSTOMREQUEST => "GET",
						  CURLOPT_HTTPHEADER => array(
						    "cache-control: no-cache"
						  ),
						));

						$response = curl_exec($curl);
						$err = curl_error($curl);

						curl_close($curl);

						if ($err) {
							echo '<script language="javacript">';
							echo "cURL Error #:" . $err;
							echo '</script>';
						} else {
							echo '<script language="javacript">';
							echo $response;
							echo '</script>';
						}


						$_SESSION["otp"] = $otp;

						header("location: otp.php");


				}
			}

		 ?>
	</div>

	<div class="container">
		<form action="login.php" method="post">
			<h1 align="center">Login</h1><br>
			<div align="center"><input type="email" name="email" required="true" placeholder="Enter registered email address"><br></div>
			<div align="center"><input type="password" name="password" required="true" placeholder="Enter password"><br></div>

			<div align="center"><input type="submit" name="submit" value="Login" class="otpbutton"></div>
	 		
		</form>

			<div class="container signin">
    			<p>New User? <a href="registration.php">Register Here</a>.</p>
  		</div>

	</div>
</div>

</body>
</html>