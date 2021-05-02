<?php 

	$rollno=6;
	$stdname=;
	$pos=3;

	$servername="localhost";

	$username="root";

	$password="";

	$dbname="student";

	// create connection


	$conn= new mysqli($servername,$username,$password,$dbname);

	//check connection

	if($conn->connect_error){

		die("connection failed :".$conn->connect_error);
	}

	$conn->set_charset("utf8");

	$sql="INSERT into studentlist(`roll`,`name`,`position`) values ($rollno,'$stdname',$pos)";

	

	if($conn->query($sql)===true){
		echo "data successfully inserted";


	}
	else
	{
		echo"Unable to insert data".$conn->error;
	}
	$conn->close();
?>

