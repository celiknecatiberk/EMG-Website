<?php
header("Content-Type: application/json");
require_once("../class/db.php");
require_once("../comp/function.php");
$database = new db();
$mysqli = db::$_mysqli;

if (isset($_POST['name'])) {
	$name = escape($_POST['name']);
	$surname = escape($_POST['surname']);
	$phone = escape($_POST['phone']);
	$email = escape($_POST['email']);
	$unique = escape($_POST['unique']);
	$password = escape($_POST['password']);
	$password = md5($password);
	$result = array();

	$email_num = $database->GetNum("user", "email='$email'");

	if ($email_num == 0) {

		$uniqueDB  = $database->Fetch("*", "code", "code='{$unique}' AND status='a'");
		if ($uniqueDB['id']) {
			$insert = $database->Insert("user", "'','$name','$surname','$phone','$email','$unique','$password'");
			if ($insert) {
				$result['type'] = "Success";
				$result['message'] = "Your are Register";
				$uniqueUp = $database->Update("code", "status='p'", "id='{$uniqueDB['id']}'");
			} else {
				$result['type'] = "Error";
				$result['message'] = "Error Please Try again !";
			}
		} else {
			$result['type'] = "Error";
			$result['message'] = "Not Found Unique Code !";
		}
	} else {
		$result['type'] = "Error";
		$result['message'] = "Email Already Register <span class='text-bs-primary'>Please Login !</span>";
	}

	echo json_encode($result);
}
