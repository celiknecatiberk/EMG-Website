<?php

require_once("comp/fst.php");

$delete = $db->Delete("list" , "id='{$_GET['list_id']}'");
redirect_url("list.php");

?>