<?php
	header("Content-Type: application/json");
	require_once("../class/db.php");
	require_once("../inc/function.php");
	session_start();
	$database = new db();
	$mysqli = db::$_mysqli;

	if (isset($_POST['book_id'])) {
		$book_id = escape($_POST['book_id']);
		$result = array();
		if (isset($_SESSION['id'])) { 
			$user_id = $_SESSION['id'];
			$insert = $database->Insert("cart","'','$book_id','$user_id','y',''");

			if ($insert) {
				$result['type'] = "success";
				$result['message'] = "Book added to the list <a href='list.php' class='text-bd-blue'>View Basket</a>";
			}else{
				$result['type'] = "error";
				$result['message'] = "Error please try again.";
			}

		}else{ 
			$result['type'] = "error";
			$result['message'] = "You need to Login <a href='login.php' class='text-bd-blue'>Login</a>";
		}

		echo json_encode($result);
	}
?>