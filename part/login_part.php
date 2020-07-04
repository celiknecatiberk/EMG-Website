<?php
session_start();
	header("Content-Type: application/json");
	require_once("../class/db.php");
	require_once("../comp/function.php");
	$database = new db();
	$mysqli = db::$_mysqli;


		if (isset($_POST['email'])) {
	
		$email = escape($_POST['email']);
		$password = escape($_POST['password']);
		$password = md5($password);
		$result = array();

		$q = $database->Fetch("`id`","user","email='$email' AND password='$password'");

		if ($q) {
			$result['type'] = "success";
			$result['message'] = "Welcome";

			
			$_SESSION['id'] = $q['id'];
			
	
		}else{
			$result['type'] = "error";
			$result['message'] = "Invalid Email or Password";
		}

		echo json_encode($result);
	}
?>
 
             
       
          