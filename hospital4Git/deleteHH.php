<?php
	header('Access-Control-Allow-Origin: *');
	$url = "127.0.0.1";
	$database = "dpn";
	$username = "root";
	$password = "";
	
	$conn = mysqli_connect($url, $username, $password, $database);
	
	if(!$conn){
		die("Connection failed: ".$conn->connect_error);
	}
	
	$method = $_SERVER['REQUEST_METHOD'];
	/*
	if($method == "GET")
	{
		$sql = "SELECT * FROM record";
		$result = mysqli_query($conn, $sql);
		$rows = array();
		
		if(mysqli_num_rows($result) > 0)
		{
			while($r = mysqli_fetch_assoc($result))
			{
				array_push($rows, $r);
			}
			
			print json_encode($rows);
		}
		
		else
		{
			echo "No data";
		}
	}
	*/
	
	if($method == "POST")
	{
		$HName = $_POST['hospitalname'];
			
		$sql_delete = "DELETE FROM hospital WHERE HospitalName='$HName'";
		
		if(mysqli_query($conn, $sql_delete)){
			echo "Item successfully deleted from the database";
		}
		else{
			echo "ERROR: $sql_delete did not run. ".mysqli_error($conn);
		}
	}

	mysqli_close($conn);
?>