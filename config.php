<?php 

	$db_server="localhost";
	$db_user = "root";
	$db_password = "9015_knock";
	$db_name = "web_task_iic";

	$conn = mysqli_connect($db_server, $db_user, $db_password, $db_name);

	if (!$conn) {
		echo "DB connection Failure!";
	}

 ?>