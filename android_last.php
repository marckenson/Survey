<?php
	
	require_once('android_connect.php');

	if(!$con)
	{
		die("Could not establish connection:" . mysql_error());
	}

		$droid_sid = $_REQUEST['sid'];
		$droid_qnum = $_REQUEST['qnum'];
				
		$v = mysql_query("select * from survey where sid = '$droid_sid' order by survey.qnum asc");
		
		while($t = mysql_fetch_array($v)){
			print(json_encode($t['ques'])).":"."#";
			print(json_encode($t['ans1']))."#";
			print(json_encode($t['ans2']))."#";
			print(json_encode($t['ans3']))."#";
			print(json_encode($t['ans4']))."%";
		}
		
	mysql_close($con);
?>