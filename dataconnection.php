<?php

	class Dataconnection
{
	var $conn;
	
	public function createconnection()
	{
	
	$servername="localhost";

	$username="root";

	$password="";

	$dbname="studentmanagement";

	// create connection


	$this->conn= new mysqli($servername,$username,$password,$dbname);
	}


	/* function to fetch login data */
	function getlogininfo($id,$pass)
	{
		if($this->conn->connect_error){

			die("connection failed :".$this->conn->connect_error);
		}

		$this->conn->set_charset("utf8");

		$sql="SELECT * FROM logintable where `userid`='$id' and `password`='$pass' ";

		$result=$this->conn->query($sql);
		$logindata=array();

		if($result->num_rows>0)
		{

	

			while( $row= $result->fetch_assoc())
			{

				$logindata[]=$row;
			}

	
		}
		$this->conn->close();
		return $logindata;

	}
	/* inserting student details */
	  function studentregistration($sid,$sname,$sroll,$std,$saddress)
	{
		
	if($this->conn->connect_error){

		die("connection failed :".$this->conn->connect_error);
	}

	$this->conn->set_charset("utf8");

	

		

	$sql="INSERT INTO studentlist (`stdid`,`stdname`,`roll`,`std`,`address`) values ($sid,'$sname',$sroll,$std,'$saddress')";

	

	if($this->conn->query($sql)===true){
		return "1";


	}
	else
	{
		return $this->conn->error;
	}	
	$this->conn->close();
	}

	function reportcard($stuid,$stustd,$hin,$eng,$mat,$sci,$sst,$total,$grade)
	{


		if($this->conn->connect_error)
		{

		die("connection failed :".$this->conn->connect_error);
		}

		$this->conn->set_charset("utf8");

		$sql="INSERT into reportcard(`stdid`, `std`, `hin`, `eng`, `maths`, `sci`, `sst`, `total`, `grade`) values ($stuid,$stustd,'$hin','$eng','$mat','$sci','$sst',$total,'$grade')";

	

		if($this->conn->query($sql)===true)
		{
		return "1";
		}
		else
		{
			return $this->conn->error;
		}
		$this->conn->close();

	}
}	

?>