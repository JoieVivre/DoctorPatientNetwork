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
			
		$sql_search = "SELECT HospitalName, HospitalAddress FROM hospital WHERE HospitalName LIKE '%$HName%' ORDER BY HospitalName";
		
		$result = mysqli_query($conn, $sql_search);
		$rows = array();
		
		if(mysqli_query($conn, $sql_search)){
			if($result->num_rows > 0){
				/*
				while($row = $result->fetch_assoc()){
					echo " Hospital Id: " . $row["HospitalId"]. " - Hospital Name: " . $row["HospitalName"]. " - Hospital Address: " . $row["HospitalAddress"]. "<br>"; 
				}
				*/
				while($r = mysqli_fetch_assoc($result)){
					array_push($rows, $r);
				}
			
				print json_encode($rows);
			}
			else{
				echo "Item not found: 0 results";
			}
		}
		else{
			echo "ERROR: $sql_search did not run. ".mysqli_error($conn);
		}
		
		
		
	}

	mysqli_close($conn);
?>