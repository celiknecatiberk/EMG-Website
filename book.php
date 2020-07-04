<?php
require_once("comp/header.php");
require_once("comp/navbar.php");

$slider = $db->FetchAll("image,link", "slider", null, " RAND()");


if (isset($_GET['id'])) {
    $book_id = escape($_GET['id']);
    $book = $db->Fetch("*", "book", "id='$book_id'");
    if (!$book) {
        redirect("404.php");
    }
} else {
    redirect("404.php");
}

$cat = $db->FetchAll("*", "category", null, "`id` DESC");
foreach ($cat as $key => $category) {
    $category_id = $category['id'];
}

?>


<div class="container">

    <div class="card bookImg">
        <img src="<?php echo $book['book_image']; ?>" alt="">
    </div>

    <div class="bookContent">
        <div class="row">
            <div class="bookNameWord col-4">
                <p>Book Name :</p>
            </div>
            <div class="bookName col-8">
                <p><?php echo $book['book_name']; ?></p>
            </div>
        </div>

        <div class="row">
            <div class="authorWord col-4">
                <p>Author :</p>
            </div>
            <div class="author col-8">
                <p><?php echo $book['author']; ?></p>
            </div>
        </div>

        <div class="row">
            <div class="categoryWord col-4">
                <p>Category :</p>
            </div>
            <div class="category col-8">
                <p><?php echo $book['category']; ?></p>
            </div>
        </div>

        <div class="row">
            <div class="bookPageWord col-4">
                <p>Page Number :</p>
            </div>
            <div class="bookPage col-8">
                <p><?php echo $book['page_number']; ?></p>
            </div>
        </div>

        <div class="row">
            <div class="isbnWord col-4">
                <p>ISBN :</p>
            </div>
            <div class="isbn col-8">
                <p><?php echo $book['isbn']; ?> </p>
            </div>
        </div>


        <?php if ($user['id']) : ?>
            <button type="button" id="button1" class="button button-third" data-toggle="modal" data-target="#readBook">Read</button>
        <?php else : ?>
            <a href="login.php" id="button1" class="button button-third ">Read</a>
        <?php endif; ?>
        <a href="bookList-add.php?book_id=<?= $book['id'] ?>" id="button2" class="button button-third">Read Later</a>
        <a href="category.php?id=<?php echo $book['category_id']; ?>"> <button type="button" id="button3" class="button button-fourth">Return Back</button></a>
    </div>




    <div class="modal" id="readBook">
        <div class="modal-dialog modal-sm modal-dialog-centered">
            <div class="modal-content" id="pdf_popup" >
                <div class="modal-header">
                    <h2 class="modal-title"><?php echo $book['book_name']; ?></h2>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body" id="iframeContainer" style="overflow:auto">
				<script>
				
	var defaultScrollTop = 0;
	var zoomed = false;
	
				function goDown()
				{
					$('#iframeContainer').scrollTop(defaultScrollTop + 100); defaultScrollTop +=100
				}
				
				function goUp()
				{
						$('#iframeContainer').scrollTop(defaultScrollTop - 100); defaultScrollTop -=100
				}
				function zoom()
				{
					if(zoomed==false)
					{
						$("#iframeOrnek").removeClass('notZoomed')
						$("#iframeOrnek").addClass('zoomed')

						zoomed = true;
					}
					else{
						$("#iframeOrnek").removeClass('zoomed')
							$("#iframeOrnek").addClass('notZoomed')

						 zoomed = false;
					}
					
					
				}
				</script>
			<style>
			.zoomed{
				-webkit-transform: scale(2); /* Safari and Chrome */ 
						  transform: scale(2); /* zoom factor - prefix if needed */
						  overflow: hidden; /* remove big-ass scrollbars */
						  
			}
			.notZoomed{
				-webkit-transform: scale(1); /* Safari and Chrome */ 
						  transform: scale(1); /* zoom factor - prefix if needed */
						  overflow: hidden; /* remove big-ass scrollbars */
						 
			}
			</style>
   <iframe id="iframeOrnek" width="100%" height="6000" src="<?php echo $book['pdf_file']; ?>" frameborder="0" scrolling="no">
   </iframe>



							
					
                   
                </div>
                <div class="modal-footer">
                    <button class="btn btn-lg btn-danger" type="button" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
require_once("comp/footer_nav.php");
require_once("comp/footer.php");
?>