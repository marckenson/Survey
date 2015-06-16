<?php
	
	require_once('android_connect.php');
	
	if(!$con)
	{
		die("Could not establish connection:" . mysql_error());
	}

	$droid_user = $_REQUEST['user'];
	$droid_sid = $_REQUEST['sid'];
	$droid_qnum = $_REQUEST['qnum'];
	$droid_ques = $_REQUEST['ques'];
	$droid_ans1 = $_REQUEST['ans1'];
	$droid_ans2 = $_REQUEST['ans2'];
	$droid_ans3 = $_REQUEST['ans3'];
	$droid_ans4 = $_REQUEST['ans4'];
	
		$check = '';
		$i = mysql_query("select * from survey where user = '$droid_user' and sid = '$droid_sid'
						  and qnum = '$droid_qnum'");
		
		while($row = mysql_fetch_array($i)){
			$check = $row;			
		}
		
		if($check == NULL){
		
			$q = "insert into b31_16306157_db.survey(user, sid, qnum, ques, ans1, ans2, ans3, ans4)
			      values('$droid_user', '$droid_sid', '$droid_qnum', '$droid_ques', '$droid_ans1',
			      		 '$droid_ans2', '$droid_ans3', '$droid_ans4')";
			$s = mysql_query($q);

			print(json_encode('true'));
		}
		
		if($check != NULL){

			$r = "update survey set ques = '$droid_ques',
				  ans1 = '$droid_ans1', ans2 = '$droid_ans2', 
				  ans3 = '$droid_ans3', ans4 = '$droid_ans4' 
				  where user = '$droid_user' and sid = '$droid_sid'
				  and qnum = '$droid_qnum'";
				  
			$v = mysql_query($r);		  
				  
			print(json_encode('false'));
		}
		
	mysql_close($con);
?>