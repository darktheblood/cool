<?php 

	require('dataconnection.php');
	$StudentId=(int)$_REQUEST["stdid"];
	$StudentStandard=(int)$_REQUEST["std"];
	$Hindi=(int)$_REQUEST["hin"];
	$English=(int)$_REQUEST["eng"];
	$Mathematics=(int)$_REQUEST["maths"];
	$Science=(int)$_REQUEST["sci"];
	$SocialStudies=(int)$_REQUEST["sst"];
	$Total=($Hindi+$English+$Mathematics+$Science+$SocialStudies);

	if ($Total>=60){
		$grade = "First Division";
	}
	else if($Total>=45){
		$grade = "Second Division";
	}
	else if($Total>=33){
		$grade = "Third Division";
	}
	else{
		$grade = "Fail";
	}

	echo "Student grade: $grade";


	$dbconnect=new Dataconnection();
	$dbconnect->createconnection();
	$result=$dbconnect->reportcard($StudentId,$StudentStandard,$Hindi,$English,$Mathematics,$Science,$SocialStudies,$Total,$grade);
	if($result=="1")
	{
		echo " successfully";
	}
	else
	{
		echo "Unable to insert";
	}


 ?>