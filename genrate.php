<?php 

	$Studentid=(int)$_REQUEST["stdid"];
	$StudentRollNo=(int)$_REQUEST["rollno"];
	$Standard=(int)$_REQUEST["sta"];



	$servername="localhost";

	$username="root";

	$password="";

	$dbname="studentmanagement";

	// create connection


	$conn= new mysqli($servername,$username,$password,$dbname);

	//check connection

	if($conn->connect_error){

		die("connection failed :".$conn->connect_error);
	}

	$conn->set_charset("utf8");

	$sql="SELECT * FROM studentlist";

	$result=$conn->query($sql);

	if($result->num_rows>0){

		//output data of each row

	 ?>
	 <table border=2>
	 	<tr>
	 		<th>stdid</th>
	 		<th>rollno</th>
	 		<th>sta</th>
	 	</tr>
<?php 

	echo"The Data Inserted By You <br>";

	$reportcard=array();

	while( $row= $result->fetch_assoc()){

		$reportcard[]=$row;
	}

	for($i=0;$i<count($reportcard);$i++)
	{
		echo"<tr><td>".$reportcard[$i]["stdid"]."</td><td>".$reportcard[$i]["rollno"]."</td><td>".$reportcard[$i]["sta"]."</td></tr>";
	}
?>
</table>
<?php
}
else
{
	echo"No result found";
}
$conn->close();
?>



	



 ?>
