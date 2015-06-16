<?php
	
	require_once('android_connect.php');

	if(!$con)
	{
		die("Could not establish connection:" . mysql_error());
	}


	$droid_user = $_REQUEST['username'];
	$droid_pass = $_REQUEST['password'];

	if($droid_user == NULL || $droid_pass == NULL){
		$response = "Enter information in the selected field";
		print(json_encode($response));
	}	

	else{
	
		$i = mysql_query("select * from user_accts where username= '$droid_user' and password = '$droid_pass'");
		$check = '';
		$pass = '';
		while($row = mysql_fetch_array($i)){
			$check = $row['username'];
			$pass = $check.$row['password'];
		}
		print(json_encode($pass));
	}
	mysql_close($con);
?>