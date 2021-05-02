<?php
session_start();
if($_SESSION["userid"]!="")
{
?>
<html>
<body>
	Welcome <?php echo $_SESSION["userid"];?>
</body>
</html>
<?php
}
else
{

		header("Location:http://localhost/reportcard/reportcard.php");
}
?>




