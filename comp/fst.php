<?php
session_start();
	require_once("class/db.php");
	require_once("comp/function.php");
	
	error_reporting(E_ALL);
	ini_set('display_errors', 'Off');

	$db = new db();
	$mysqli = db::$_mysqli;
