<?php
	header("Content-Type: application/json");
	require_once("../class/db.php");
	require_once("../inc/function.php");
	session_start();
	$database = new db();
	$mysqli = db::$_mysqli;

	if (isset($_POST['list_id'])) {
		$list_id = escape($_POST['list_id']);
		$result = array();

		if (isset($_SESSION['id'])) {
			$user_id = $_SESSION['id'];
			$delete = $database->Query("DELETE FROM `list` WHERE id='$list_id' AND user_id='$user_id'");

			$affected_rows = mysqli_affected_rows($mysqli);
			if ($affected_rows != 0) {
				$result['type'] = "success";
			}else{
				$result['type'] = "error";
				$result['message'] = "Error Try again <a href='list.php' class='text-bs-primary'> Reload</a>";
			}
		}else{
			$result['type'] = "error";
			$result['message'] = "Please login <a href='login.php' class='text-bs-primary'>Login</a>";
		}

		echo json_encode($result);
	}
?>