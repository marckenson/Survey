<?php

	require_once('android_connect.php');

	$droid_user = $_REQUEST['username'];
	$droid_pass = $_REQUEST['password'];

	if($droid_user == NULL || $droid_pass == NULL){
		$response = "Enter information in the selected field";
		print(json_encode($response));
	}	

	else{
	
		$i = mysql_query("select * from user_accts where username= '$droid_user' ");
		$check = '';
		while($row = mysql_fetch_array($i)){
			$check = $row['username'];
		}
	
		print(json_encode($check));

		if($check == NULL){
			$q = "insert into user_accts values('$droid_user', '$droid_pass')";
			$s = mysql_query($q);

			if(!$s){
				$response["response"] = "User Exsists already";
				print(json_encode($response));		
			}
			else{
				$response["response"] = "New User Created";
				print(json_encode($response));		
			}
		}

		else{
			 $response["response"] = "Record is repeated";
            // print(json_encode($response));
		}
	}
	mysql_close($con);
?>