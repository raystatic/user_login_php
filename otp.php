<!DOCTYPE html>
<html>
<head>
	<title>Otp page</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="design.css">
</head>
<body>

	<div>
		<?php

			session_start();

			if (isset($_POST["submit"])) {
				$response_otp = $_POST["otp"];
				echo $response_otp;
				echo $_SESSION["otp"];
				if($response_otp == $_SESSION["otp"]){
					echo '<script language="javascript">';
					echo 'alert("OTP Verification Success.. Correct OTP!")';
					echo '</script>';
				}else{
					echo '<script language="javascript">';
					echo 'alert("OTP Verification Failed!.. Wrong OTP!")';
					echo '</script>';
				}

			}

		?> 		
	</div>

	<div class="container">
		<h1 align="center">OTP Verification</h1>
		<form action="otp.php" method="post">
			
			<div align="center"><input type="text" name="otp" required="true" placeholder="Enter a 5 digit otp sent to the registered mobile number"></div>

			<div align="center"><input type="submit" name="submit" value="Check OTP" class="otpbutton"></div>

		</form>
	</div>

</body>
</html>
