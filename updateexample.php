<?php 

	$rollno=10;
	
	$stdname="Rahul Kumar Singh";

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

	$sql="UPDATE studentlist set `name`='$stdname' where `roll`=$rollno";

	

	if($conn->query($sql)===true){
		echo "data successfully updated";


	}
	else
	{
		echo"Unable to update data".$conn->error;
	}
	$conn->close();
?>

