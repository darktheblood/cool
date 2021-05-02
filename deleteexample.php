<?php 

	$rollno=4;

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

	$sql="DELETE from studentlist  where `roll`=$rollno";

	

	if($conn->query($sql)===true){
		echo "data successfully deleted";


	}
	else
	{
		echo"Unable to delete data".$conn->error;
	}
	$conn->close();
?>

