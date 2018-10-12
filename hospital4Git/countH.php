<?php
	header('Access-Control-Allow-Origin: *');
	$url = "127.0.0.1";
	$database = "dpn";
	$username = "root";
	$password = "";
	
	$conn = mysqli_connect($url, $username, $password, $database);
	
	if(!$conn)
	{
		die("Connection failed: ".$conn->connect_error);
	}
	
	$method = $_SERVER['REQUEST_METHOD'];
	
	/*
	if($method == "GET")
	{
		$HName = $_POST['hospitalname'];
	
		$sql = "SELECT * FROM hospital WHERE HospitalName LIKE '$HName'";
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
	
	if($method == "POST"){
		$HName = $_POST['hospitalname'];
			
		$sql_count = "SELECT COUNT(*) FROM hospital";
		
		
		$result = mysqli_query($conn, $sql_count);
		//$rows = array();
		
		$row = mysqli_fetch_row($result);
		$items_number = $row[0];
		
		if(mysqli_query($conn, $sql_count)){
			echo "Hospitals Counted " .$items_number;
			//parse_str($sql_count);
			//echo $hCount;
			//echo implode ("", $result);
			//echo mysqli_fetch_assoc($result);
		}
		else{
			echo "ERROR: $sql_count did not run. ".mysqli_error($conn);
		}
		
		
		/*
		if($result->num_rows > 0){
			
			while($row = $result->fetch_assoc()){
				echo "Hospital Count: " . $row["HospitalId"]. "<br>";
			}
		}
		else{
			echo "0 results";
		}
		*/
		/*
		$result = mysqli_query($conn, $sql_search);
		$rows = array();
		
		if(mysqli_num_rows($result) > 0)
		{
			while($r = mysqli_fetch_assoc($result))
			{
				array_push($rows, $r);
			}
			
			echo 
			print json_encode($rows);
		}
		else
		{
			echo "No data";
		}
		*/
	}

	mysqli_close($conn);
?>