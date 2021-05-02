<?php
session_start();
require('dataconnection.php');
function testinput($data)
{
	$data=trim($data);
	$data=stripslashes($data);
	$data=htmlspecialchars($data);
	return $data;
}
$loginmsg="";
if($_SESSION["userid"]!="")
{
	if($_SERVER['REQUEST_METHOD']=="POST")
	{
		$stdid=(int)(testinput($_REQUEST["stdid"]));
		$stdname=testinput($_REQUEST["stdname"]);
		$StudentRoll=(int)(testinput($_REQUEST["rollno"]));
		$StudentStandard=(int)(testinput($_REQUEST["stnd"]));
		$StudentAddress=testinput($_REQUEST["stdadd"]);
		$dbconnect=new Dataconnection();
		$dbconnect->createconnection();
		$result=$dbconnect->studentregistration($stdid,$stdname,$StudentRoll,$StudentStandard,$StudentAddress);
		if($result=="1")
		{
			$loginmsg="Registered successfully";
		}
		else
		{
			$loginmsg= "Unable to Register student";
		}
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
		<table>
			<tr>
				<td colspan=2><font color="red" size=4><?php echo $loginmsg;?></font></td>
			</tr>
			<tr>
				<td><label>Student ID</label></td>
				<td><input type="text" name="stdid" placeholder="Student Id"></td>
			</tr>
			<tr><td><label>Student Name</label></td>
				<td><input type="text" name="stdname" placeholder="Studentname"></td>
		
			<tr><td><label>Student Roll No</label></td>
				<td><input type="text" name="rollno" placeholder="Roll No"></td>
			</tr>
			<tr><td><label>Student Standard</label></td>
				<td><input type="text" name="stnd" placeholder="Standerd"></td>
			</tr>
			<tr><td><label>Student Address</label></td>
				<td><input type="text" name="stdadd" placeholder="Address"></td>
			</tr>
			<tr>
				<td><input type="submit" value ="proceed"></td>
			</tr>
		</table>
	</form>

</body>
</html>
<?php
}
else
{

		header("Location:http://localhost/reportcard/login.php");
}
?>