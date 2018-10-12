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
	
	if($method == "POST"){
		$HName = $_POST['hospitalname'];
		$HAddress = $_POST['hospitaladdress'];
	
		$sql_update = "UPDATE hospital SET HospitalAddress='$HAddress' WHERE HospitalName='$HName'";
		
		if(mysqli_query($conn, $sql_update)){
			echo "Item Updated";
		}
		else{
			echo "ERROR: $sql_update did not run. ".mysqli_error($conn);
		}
	}

	mysqli_close($conn);
?>