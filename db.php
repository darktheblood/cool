<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
</head>
<body>
	<?php 

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

	$sql="SELECT * FROM studentlist";

	$result=$conn->query($sql);

	if($result->num_rows>0){

		//output data of each row

	 ?>
	 <table border=2>
	 	<tr>
	 		<th>roll</th>
	 		<th>name</th>
	 		<th>position</th>
	 	</tr>
<?php 

	echo"The Data Inserted By You <br>";

	/*$logindata=array();*/

	while( $row= $result->fetch_assoc()){

		$logindata[]=$row;
	}

	for($i=0;$i<count($logindata);$i++)
	{
		echo"<tr>
		<td>".$logindata[$i]["roll"]."</td>
		<td>".$logindata[$i]["name"]."</td>
		<td>".$logindata[$i]["position"]."</td>
		</tr>";
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


</body>
</html>