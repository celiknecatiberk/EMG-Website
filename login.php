<?php
	require_once("comp/header.php");
    require_once("comp/navbar.php");

    if (isset($_SESSION['id'])) {
		//redirect("index.php");
	}
	
	
?>

    <div class="container login-register-form">
            <div class="login-form ">
                    <h1 class="text-danger text-center text-uppercase display-2">Login<hr></h1>
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" id="l-form" autocomplete="off">
                        <div class="form-group">
                            <label class="text-dark display-4" >E-mail</label>
                            <input type="text" class="form-control form-control-lg j-keyboard" id="l-email" name="l-email" placeholder="Enter Your Email." autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label class="text-dark display-4" >Password</label>
                            <input type="password" class="form-control form-control-lg j-keyboard" id="l-password" name="l-password" placeholder="Enter Your Password." >
                        </div>
                        <input type="submit" value="Login" id="l-login" name="l-login" class=" btn btn-lg btn-block btn-danger ">
                        <span id="l-message" class="h3 text-success text-20 float-right"></span>
                    </form>

                <div class="start_here_all">
                    <span class="new">Are you a new user? Create your EMG account from <a id="here___"  href="register.php"><span class="start_here"> here </span></a></span>
                </div>

        </div>
    </div>
<?php
    require_once("comp/footer_nav.php");
    require_once("comp/footer.php");
?>

