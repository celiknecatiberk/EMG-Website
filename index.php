<?php
require_once("comp/header.php");
require_once("comp/navbar.php");

$slider = $db->FetchAll("image,link", "slider", null, " RAND()");

?>
<header>

    <div class="container">

        <div id="slider" class="carousel slide carousel-fade my-5 " data-ride="carousel">
            <!--" carousel-fade" ile geçiş efekti verdik-->
            <ol class="carousel-indicators">
                <li data-target="#slider" data-slide-to="0" class="active"></li>
                <li data-target="#slider" data-slide-to="1"></li>
                <li data-target="#slider" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">

                <div class="carousel-item active">
                    <img class="d-block w-100" src="<?php echo $slider[0]['image']; ?>" alt="Slider-1"> <!-- d-block demek bunun bir block eleman olduğu ve satırı (içereisinde uluncuğu container'ı)tamamen kaplayacağı anlamına gelir. -->
                    <div class="container">
                        <div class="carousel-caption">
                            <p><a id="kitap1" class="btn btn-lg btn-dark text-warning " style="opacity:.8;display:block;width:12rem;height:3rem;margin:0 auto;" href="<?php echo $slider[0]['link']; ?>" role="button">Read Now</a></p>
                        </div>
                    </div>
                </div>

                <div class="carousel-item">
                    <img class="d-block w-100" src="<?php echo $slider[1]['image']; ?>" alt="Slider-2">
                    <div class="container">
                        <div class="carousel-caption">
                            <p><a id="kitap2"  class="btn btn-lg btn-dark text-warning" style="opacity:.8;display:block;width:12rem;height:3rem;margin:0 auto;" href="<?php echo $slider[1]['link']; ?>" role="button">Read Now</a></p>
                        </div>
                    </div>
                </div>

                <div class="carousel-item">
                    <img class="d-block w-100" src="<?php echo $slider[2]['image']; ?>" alt="Slider-3">
                    <div class="container">
                        <div class="carousel-caption">
                            <p><a id="kitap3"  class="btn btn-lg btn-dark text-warning" style="opacity:.8;display:block;width:12rem;height:3rem;margin:0 auto;" href="<?php echo $slider[2]['link']; ?>" role="button">Read Now</a></p>
                        </div>
                    </div>
                </div>

            </div>
            <a href="#slider" class="carousel-control-prev" id="slideLeft" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </a>
            <a href="#slider" id="slideRight"  class="carousel-control-next" data-slide="next">
                <span class="carousel-control-next-icon"></span>
            </a>
        </div>


        <div class="main-header text-uppercase">
            guideline
        </div>


        <div class="guide">
            <ul>
                <div class="madde">
                    <li>
                        <p> 1 - ) <span style="background-color:rgb(20,52,65);color:rgb(230,207,139);padding:4px 5px;"> By lifting your arm up </span> , you can slide the cursor in the center of the screen upwards. </p>
                    </li>
                </div>
                <div class="madde">
                    <li>
                        <p> 2 - ) <span style="background-color:rgb(20,52,65);color:rgb(230,207,139);padding:4px 5px;">By lowering your arm down </span> , you can slide the cursor down in the middle of the screen. </p>
                    </li>
                </div>
                <div class="madde">
                    <li>
                        <p> 3 - ) <span style="background-color:rgb(20,52,65);color:rgb(230,207,139);padding:4px 5px;">By turning your arm to the right </span> , you can slide the cursor in the center of the screen to the right. </p>
                    </li>
                </div>
                <div class="madde">
                    <li>
                        <p>  4 - ) <span style="background-color:rgb(20,52,65);color:rgb(230,207,139);padding:4px 5px;">By turning your arm to the left </span> , you can slide the cursor in the center of the screen to the left.</p>
                    </li>  
                </div>
                <div class="madde">
                    <li>
                        <p>  5 - ) <span style="background-color:rgb(20,52,65);color:rgb(230,207,139);padding:4px 5px;">By making your arm move towards you </span>, you can click the cursor in the middle of the screen.  </p>
                    </li>  
                </div>
                <div class="madde">
                    <li>
                        <p> 6 - ) If you are too below on the page, you can exit faster than you lift your arm by pressing the <span style="font-style: italic; color:rgb(20,52,65);font-weight: bold;">up arrow button </span> on the left side of the screen.</p>
                    </li>  
                </div>
                <div class="madde">
                    <li>
                        <p> 7 - ) If you are at the top of the page, you can descend faster by lowering your arm down by pressing the <span style="font-style: italic; color:rgb(20,52,65);font-weight: bold;">down arrow button </span> on the left side of the screen. </p>
                    </li>  
                </div>
                <div class="madde">
                    <li>
                        <p> 8 - ) If you are at the bottom of the page and want to go to the top of the page, you can go directly to the top by clicking the <span style="font-style: italic; color:rgb(20,52,65);font-weight: bold;"> "Top of Page" </span>button on the left side in blue.</p>
                    </li>  
                </div>
                <div class="madde">
                    <li>
                        <p> 9 - ) If you are at the top of the page and want to go to the bottom of the page, you can go directly to the bottom by pressing the <span style="font-style: italic; color:rgb(20,52,65);font-weight: bold;"> "End of Page" </span>button on the left side in blue.</p>
                    </li>  
                </div>
            </ul>
        </div>

    </div>

    <div class="modal" id="readBook_3">
        <div class="modal-dialog modal-sm modal-dialog-centered">
            <div class="modal-content" id="pdf_popup">
                <div class="modal-header">
                    <h2 class="modal-title"><?php echo $book['book_name']; ?></h2>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <embed src="<?php echo $book['pdf_file']; ?>" type="" height="100%" width="100%">
                </div>
                <div class="modal-footer">
                        <button class="btn btn-lg btn-danger" type="button" data-dismiss="modal">Close</button>
						<button class="btn btn-lg btn-danger" type="button" data-dismiss="modal">Change Zoom</button> 
						<button class="btn btn-lg btn-danger" type="button" data-dismiss="modal">Up</button> 
						<button class="btn btn-lg btn-danger" type="button" data-dismiss="modal">Down</button> 
                </div>
            </div>
        </div>
</div>
   
</header>



<script>
document.getElementById("upButton").addEventListener("mousedown", mouseDown);
document.getElementById("upButton").addEventListener("mouseup", mouseUp);

function mouseDown() {
  document.getElementById("demo").innerHTML = "The mouse button is held down.";
}

function mouseUp() {
  document.getElementById("demo").innerHTML = "You released the mouse button.";
}
</script>




<?php
require_once("comp/footer_nav.php");
require_once("comp/footer.php");
?>