<?php
$response = array();
include 'db/db_connect.php';
include 'functions.php';
 
//Get the input request parameters
$inputJSON = file_get_contents('php://input');
$input = json_decode($inputJSON, TRUE); //convert JSON into array
 
//Check for Mandatory parameters
if(isset($input['Usuario']) && isset($input['Password'])){
	$username = $input['Usuario'];
	$password = $input['Password'];
	//$query    = "SELECT full_name,password_hash, salt FROM member WHERE username = ?";
	$query    = "SELECT Nombre,Password FROM usuario WHERE Usuario = ?";
	
 
 
	if($stmt = $con->prepare($query)){
		$stmt->bind_param("s",$username);
		$stmt->execute();
		//$stmt->bind_result($fullName,$passwordHashDB,$salt);
		$stmt->bind_result($fullName,$passwordDB);
		if($stmt->fetch()){
			//Validate the password
			//if(password_verify(concatPasswordWithSalt($password,$salt),$passwordHashDB)){
			if($password == $passwordDB){
				$response["status"] = 0;
				$response["message"] = "Login successful";
				$response["Nombre"] = $fullName;
			}
			else{
				$response["status"] = 1;
				$response["message"] = "Invalid username and password combination";
			}
		}
		else{
			$response["status"] = 1;
			$response["message"] = "Invalid username and password combination";
		}
		
		$stmt->close();
	}
}
else{
	$response["status"] = 2;
	$response["message"] = "Missing mandatory parameters";
}
//Display the JSON response
echo json_encode($response);
?>