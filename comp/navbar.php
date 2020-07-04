<nav>
    <div class="containerNav clearfix">
        <div id="logo-box">
            <a href="index.php" class="logo text-uppercase" style="text-decoration: none;display:block;" id="logoText2">emg</a>
        </div>

        <div class="input-group">
            <form class="navbar-form" role="search" action="search.php" method="get">
                <div class="input-group">
                    <input required type="text" class="form-control j-keyboard" placeholder="Search" name="search" id="search" value="<?php if (isset($_GET['search'])) echo escape($_GET['search']) ?>">
                    <div class="input-group-btn ">
                        <button class="btn btn-dark bg-lg " id="searchButton" type="submit"><i class="fa fa-search "></i></button>

                    </div>
                </div>
            </form>
        </div>





        <div id="dis">
            <h1 style="font-size:40px; color:#212529; margin:0 0 4px 0; text-align:center;">Screen Keyboard</h1>

            <div id="ic">

                <ul>
                    <li id="bir">1</li>
                    <li id="iki">2</li>
                    <li id="uc">3</li>
                    <li id="dort">4</li>
                    <li id="bes">5</li>
                    <li id="alti">6</li>
                    <li id="yedi">7</li>
                    <li id="sekiz">8</li>
                    <li id="dokuz">9</li>
                    <li id="sifir">0</li>
                    <li id="nokta">.</li>
                    <li id="q">q</li>
                    <li id="w">w</li>
                    <li id="e">e</li>
                    <li id="r">r</li>
                    <li id="t">t</li>
                    <li id="y">y</li>
                    <li id="u">u</li>
                    <li id="i">i</li>
                    <li id="o">o</li>
                    <li id="p">p</li>
                    <li id="et">@</li>
                    <li id="a">a</li>
                    <li id="s">s</li>
                    <li id="d">d</li>
                    <li id="f">f</li>
                    <li id="g">g</li>
                    <li id="h">h</li>
                    <li id="j">j</li>
                    <li id="k">k</li>
                    <li id="l">l</li>
                    <li id="z">z</li>
                    <li id="com">.com</li>     
                    <li id="x">x</li>
                    <li id="c">c</li>
                    <li id="v">v</li>
                    <li id="b">b</li>
                    <li id="n">n</li>
                    <li id="m">m</li>
                    <li id="space" style="width:85px;">Space</li>
                    <li id="backspace" style="width:85px;">Sil</li>  
                    <li id="enter" style="width:90px;">Enter</li>
                

                </ul>
            </div>

        </div>

        <script type="text/javascript">
            var hedefInput = "search";
            $(document).ready(function() {

                var selectKeyboard = function($item) {
                    $('.j-keyboard').removeClass("j-selected-keyboard");
                    $item.addClass("j-selected-keyboard");
                };

                $(".j-keyboard").click(function() {
                    var $input = $(this);
                    $('#dis').slideToggle("fast");
                    selectKeyboard($input);
                });

                $('#ic li').click(function() {
                    $input = $('.j-selected-keyboard');
                    $filter = extraKeyboard($(this).text());
                    var $txt = $input.val() + $filter;
                    if ($filter === 'Enter') {
                        var form = $input.parents('form').eq(0);
                        form.submit();
                        return;
                    }

                    if ($filter === 'Sil') {
                        $txt = $input.val().slice(0, -1);
                    }

                    $input.val($txt);
                });


                var extraKeyboard = function(key) {
                    if (key === 'Space')
                        return ' ';
                    return key;
                }
            });
        </script>



        <div id="nav-links">
            <ul>
                <?php

                session_start();

                if (isset($_SESSION['id'])) {

                    $user_id = escape($_SESSION['id']);
                    $user = $db->Fetch("*", "user", "id='$user_id'");


                ?>
                 

                    <li class="nav-item" title="Home" onclick="location:'index.php'">
                        <a href="index.php" class="nav-link text-uppercase" style="display:block" id="homeNav2">
                            <i class="fas fa-home"></i>
                            Home
                        </a>
                    </li>



                    <li class="nav-item" title="Register">
                        <a href="profile.php" class="nav-link text-uppercase" style="display:block" id="userNameNav">
                            <i class="fas fa-user"></i>
                            <span class="text-20"><?php echo $user['name']; ?></span>
                        </a>
                    </li>

                    <li class="nav-item" title="Book List" style="display:block" id="bookListNav">
                        <a href="list.php" class="nav-link text-uppercase" style="display:block" id="bookList">
                            <i class="fas fa-list"></i>

                            Book List</a>
                    </li>

                    <li class="nav-item" title="Register">
                        <a href="categories.php" class="nav-link text-uppercase" style="display:block" id="cactegoriesNav">
                            <i class="fas fa-layer-group"></i>
                            Categories
                        </a>
                    </li>

                    <li class="nav-item" title="Login">
                        <a href="logout.php" class="nav-link text-uppercase" style="display:block" id="logOutNav">
                            <i class="fas fa-sign-in-alt"></i>

                            logout</a>
                    </li>


                <?php
                } else {
                ?>
                 


                    <li class="nav-item" title="Home">
                        <a href="index.php" class="nav-link text-uppercase" style="display:block" id="homeNav">
                            <i class="fas fa-home"></i>
                            Home
                        </a>
                    </li>

                    <li class="nav-item" title="Login">
                        <a href="login.php" class="nav-link text-uppercase" style="display:block" id="loginNav">
                            <i class="fas fa-sign-in-alt"></i>

                            Login
                        </a>
                    </li>

                    <li class="nav-item" title="Register" style="display:block" id="registerNav">
                        <a href="categories.php" class="nav-link text-uppercase" style="display:block" id="categoriesNav2">
                            <i class="fas fa-layer-group"></i>
                            Categories
                        </a>
                    </li>
                <?php
                }
                ?>
            </ul>
        </div>

    </div>
</nav>