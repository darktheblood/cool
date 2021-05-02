<?php 

	
	$rollno=102;

	$stdname="Akash kumar singh";

	$servername="localhost";

	$username="root";

	$password="";

	$dbname="student";

	//create connaction


	$conn=new mysqli($servername,$username,$password,$dbname);

	//check connaction

	if($conn->connect_error)
	{
		die("connaction failed :".$conn->connect_error);
	}

	$conn->set_charset("utf8");

	$sql="DELETE from studentlist where `name`='$stdname'";


	if($conn->query($sql)===true){

		echo "Data succesfully delete";
	}

	else{
		echo "unable to delete".$conn->error;
	}
	$conn->close();

 ?>