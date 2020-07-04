<?php
require_once("comp/fst.php");

session_start();
if (isset($_SESSION['id'])) {
    $user_id = escape($_SESSION['id']);
    $user = $db->Fetch("*","user","id='$user_id'");

    $selectList = $db->Fetch("*","list","user_id='{$user['id']}' AND book_id='{$_GET['book_id']}'");

    if(!$selectList['id']){
        $addList = $db->Insert("list" , "'','{$_GET['book_id']}','{$user['id']}'");
    }

    redirect_url("list.php");
}else{
    redirect_url("login.php");
}
