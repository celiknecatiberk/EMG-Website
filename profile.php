<?php
	require_once("comp/header.php");
	require_once("comp/navbar.php");   

	

	$user_id = escape($_SESSION['id']);
	$user = $db->Fetch("*","user","id='$user_id'");

?>

<div class="container">

	<div class="profileImg"> 
		<img src="images/user.png" alt="">
	</div>

	<div class="p_card">
	<i class="fas fa-phone-square-alt"></i>
	<i class="fas fa-id-card-alt"></i>
			<p class="pname"><?php echo $user['name'];?> <?php echo $user['surname']; ?></p>
			<p class="p_mail"><?php echo $user['email']; ?></p>		
			<p class="p_phoneNumber">+90 <?php echo $user['phone']; ?> </p>
			<p class="p_unique"> #<?php echo $user['uid']; ?></p>
			<a href="index.php">
				<p><button  id="searchnewButton" class="p-button"style="display:block;margin:0 auto;" >Return Home</button></p>
			</a>

	</div>




</div> 
<?php
 	require_once("comp/footer_nav.php");
	require_once("comp/footer.php");
?>