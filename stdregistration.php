<?php 

	require('dataconnection.php');


	

		$stdid=(int)($_REQUEST["stdid"]);
		$stdname=$_REQUEST["stdname"];
		$StudentRoll=(int)($_REQUEST["rollno"]);
		$StudentStandard=(int)($_REQUEST["stnd"]);
		$StudentAddress=$_REQUEST["stdadd"];
		$dbconnect=new Dataconnection();
	$dbconnect->createconnection();
	$result=$dbconnect->studentregistration($stdid,$stdname,$StudentRoll,$StudentStandard,$StudentAddress);
	if($result=="1")
	{
		echo "Registered successfully";
	}
	else
	{
		echo "Unable to Register student";
	}
	
	
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 </head>
 <body>
 	<form action="stdreg.php" method="post">
 		<table>
 			<tr>
 				<td><input type="submit" value ="OK"></td>
 			</tr>
 		</table>
 	</form>
 
 </body>
 </html>