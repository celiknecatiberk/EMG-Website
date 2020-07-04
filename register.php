<?php
require_once("comp/header.php");
require_once("comp/navbar.php");
?>

<div class="container login-register-form">
    <div class="register-form">
        <h1 class="text-danger text-center text-uppercase display-2">Register
            <hr>
        </h1>
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" id="s-form">
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="s-name" class="text-dark display-4">Name</label>
                    <input type="text" class="form-control form-control-lg j-keyboard" name="s-name" id="s-name" placeholder="Enter Your Name.">
                </div>
                <div class="form-group col-md-6">
                    <label for="s-surname" class="text-dark display-4"> Surname</label>
                    <input type="text" class="form-control form-control-lg j-keyboard" name="s-surname" id="s-surname" placeholder="Enter Your Surname.">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="s-phone" class="text-dark display-4">Phone Number</label>
                    <input type="phone" class="form-control form-control-lg j-keyboard" name="s-phone" id="s-phone" placeholder="Enter Your Phone Number." maxlength="11">
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label for="s-email" class="text-dark display-4">E-mail</label>
                    <input type="email" class="form-control form-control-lg j-keyboard" name="s-email" id="s-email" placeholder="Enter Your Email.">
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>

            </div>
            <div class="form-group">
                <label for="s-unique" class="text-dark display-4">Unique Machine Code</label>
                <input type="text" class="form-control form-control-lg j-keyboard" name="s-unique" id="s-unique" placeholder="Enter Your Unique Machine Code.">
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="form-group pass_show">
                <label for="s-password" class="text-dark display-4">Password</label>
                <input type="password" class="form-control form-control-lg col-sm-10 j-keyboard" name="s-password" id="s-password" placeholder="Enter Your Password.">
                <input id="showPasss" class="how_hide_password_box" type="checkbox" onclick="show_hide_password()"> <span class="show_passworld_word">Show Password</span>


                <script>
                    function show_hide_password() {
                        var x = document.getElementById("s-password");
                        if (x.type === "password") {
                            x.type = "text";
                        } else {
                            x.type = "password";
                        }
                    }
                </script>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>

            <input type="submit" class="btn btn-lg btn-block btn-danger" value="Register" id="s-register" name="s-register">
            <div class="return"><a href="login.php" id="returnLoginPage" style="display:block"><i class="far fa-arrow-alt-circle-left returnBackArrow"></i>
                    <p class="returnBack">Return to login page</p>
                </a></div>
            <span id="s-message" class="h3 text-success text-20 float-right"></span>

        </form>
    </div>

</div>

<?php
require_once("comp/footer_nav.php");
require_once("comp/footer.php");
?>