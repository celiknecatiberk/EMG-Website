<?php
require_once("comp/header.php");
require_once("comp/navbar.php");




if (!isset($_SESSION['id'])) {
	echo "<h1 class='text-center text-upper text-danger mt-5'>Please <a class='text-black' href='login.php'>Login</a> to view your book list </h1>";
	exit();
} else {
	$user_id = $_SESSION['id'];
}

$lists = $db->FetchAll("*", "list", "user_id='$user_id'", "`id` DESC");


if (empty($lists)) {
	echo "<h1 class='text-center mt-5 text-danger text-25 text-upper'>Your book list is empty <a class='text-black' id='booklistgo' href='categories.php'>Go Book List</a></h1>";
	exit();
}



?>
<div class="container padding-10">
	<div id="cart-container-main">
		<div class="text-center text-20 text-bold" id="list-message"></div>
		<table class="table">
			<th>
				<p>Image</p>
			</th>
			<th>
				<p class="bookNameSpecial">Book Name</p>
			</th>
			<th>
				<p class="authorNameSpecial">Author</p>
			</th>
			<th>
				<p>Category</p>
			</th>
			<th>
				<p class="pageNameSpecial">Page</p>
			</th>
			<th>
				<p>Read</p>
			</th>
			<th>
				<p>Remove</p>
			</th>

			<?php $list_id_stack = "";  ?>
			<?php foreach ($lists as $key => $list) : ?>
				<tr>
					<?php
					$list_id = $list['id'];
					$list_book_id = $list['book_id'];
					$list_id_stack .= $list_book_id . ",";
					$listObject = $db->Fetch("*", "book", "id='$list_book_id'");
					?>
					<td class='list_item'><img src='<?= $listObject['book_image'] ?>' class='cart-image mt-4 mb-4'></td>
					<div class='row'>
						<td class='list_item '>
							<div class='col-12'> <?= $listObject['book_name'] ?></div>
						</td>
						<td class='list_item '>
							<div class='col-12'> <?= $listObject['author'] ?></div>
						</td>
						<td class='list_item '> <?= $listObject['category'] ?></td>
						<td class='list_item '> <?= $listObject['page_number'] ?></td>
					</div>
					<td><button id="readButton<?= $list_id ?>" data-name="<?= $listObject['book_name'] ?>" data-book="<?=$listObject['pdf_file'] ?>" style="display:block;width:70px;height:40px;font-family:sans-serif;font-size:12px;"  type='button' id='button2' class='btn btn-block btn-warning mt-1 j-readBtn text-18' data-toggle="modal" data-target="#readBook_2">Read</button></td>
					
					<td><a id="silButton<?= $list_id ?>" style="display:block;height:40px;padding-top:12px;" href="bookList-delete.php?list_id=<?= $list_id ?>" class="remove_from_list_part btn btn-block btn-danger mt-1 text-18"><i class='fa fa-trash text-black' style="font-size:14px;"></i></button></td>
				</tr>
			<?php endforeach; ?>

		</table>
		<hr/>

		<div class="modal" id="readBook_2">
			<div class="modal-dialog modal-sm modal-dialog-centered">
				<div class="modal-content" id="pdf_popup">
					<div class="modal-header">
						<h2 class="modal-title j-modal-title"></h2>
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
					<div class="modal-body">
						<embed src="#" type="" height="100%" width="100%" class="j-embed">
					</div>
					<div class="modal-footer">
						<button class="btn btn-lg btn-danger j-modal-close" type="button" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>


		<div  class="float-right">
			<div class="row ">
				<div class="col-sm-12 mt-3 mb-3">
					<a href="categories.php" id="searchnewButton" style="display:block;width:250px;height:60px;padding-top:16px;" class="btn btn-success btn-lg btn-block "><p style="font-size:15px;font-family:sans-serif;">Search New Books</p></a>
				</div>
			</div>
		</div>



		<div class="float-clear"></div>
	</div>
</div>
<script>
		$(document).ready(function() {
			$('.j-readBtn').on('click' , function(){
				$('.j-embed').attr("src" , $(this).data('book'));
				$('.j-modal-title').html($(this).data('name'));
			});

			$('.j-modal-close').on('click' , function(){
				$('.j-embed').attr("src" ,"");
				$('.j-modal-title').html("");
			});
		});
	</script>
<?php
require_once("comp/footer_nav.php");
require_once("comp/footer.php");
?>