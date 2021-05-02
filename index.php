<?php
require('dataconnection.php');
session_start(); 
$loginmsg="";
if($_SERVER['REQUEST_METHOD']=="POST")
{
	$id=testinput($_REQUEST["username"]);

	$pass=testinput($_REQUEST["password"]);

	$dbconnect=new Dataconnection();
	$dbconnect->createconnection();
	$loginresult=$dbconnect->getlogininfo($id,$pass);

	if(count($loginresult)>0)
	{
		$_SESSION["userid"]=$id;
		header("Location:http://localhost/reportcard/reportcard.php");
	}
	else
	{
		$loginmsg= "id or password incorrect";
	}

}
function testinput($data)
{
	$data=trim($data);
	$data=stripslashes($data);
	$data=htmlspecialchars($data);
	return $data;
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
	<meta name="viewport" content="width=device-width ,initial-scale=1 ,shrink-to-fit=no" >
</head>
<body>
	<center>
		
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" >

		<h2>Admin Login</h2>
		<table cellpadding="10" cellspacing="0">
			<tr>
				<td colspan=2><font color="red" size=4><?php echo $loginmsg;?></font></td>
			</tr>
			<tr>
				<td><label>Username</label></td>
				<td><input type="text" name="username" placeholder="Username" required></td>
			</tr>
			<tr>
				<td><label>Password</label></td>
				<td><input type="password" name="password" placeholder="Password" required></td>
			</tr>
			<tr>
				<td><input type="submit" value ="Proceed"></td>
			</tr>
		</table>
	</form>
	</center>
</body>
</html>