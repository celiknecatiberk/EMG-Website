<?php 
session_start();
session_destroy();   //oturumla ilişkilendirilmiş tüm veriyi yokeder
header("Location: index.php");
exit();
 ?>