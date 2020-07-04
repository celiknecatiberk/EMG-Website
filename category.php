<?php 

	require_once("comp/header.php");
	require_once("comp/navbar.php");

	if (isset($_GET['id'])) {
		$category_id = escape($_GET['id']);
		$category_num = $db->GetNum("category","id='$category_id'");

		if ($category_num == 0) {
			redirect("404.php");
		}
	}else{
		redirect("404.php");
	}
?>
	
 <a href='categories.php ' class="return2" id="return2"> <span id="spanreturn">Return Library</span></a> 

<div class="container " >
	<div class="bg-grey">
		<div class="catHeader">
			<?php
				$category = $db->Fetch("*","category","id='$category_id'");
				echo "<p class='text-uppercase'>{$category['name']}</p>";		
			?>
		</div>
	
		<div class="row arrow">
				<?php	
				$books = $db->FetchAll("*","book","category_id='$category_id'","`id` ASC");
				$book_num = $db->GetNum("book","category_id='$category_id'");

				if ($book_num == 0) {
					echo "<h3 class='NoBook'>No Book Found !!</h3> ";
					// echo " <a href='categories.php'> <i class='fas fa-angle-double-left'> &nbsp;<span class='return'> Return Back</span></i>&nbsp;<i class='fas fa-angle-double-right'></i>  </a> ";
					exit();
				}

	
				foreach ($books as $key => $book) {
					?>
					<div class="mt-1 col-md-3 catBookName ">
						<a style="display:block" id="book<?php echo $book['id']; ?>" href="book.php?id=<?php echo $book['id']; ?>" class="thumbnail">
							<img src="<?php echo $book['book_image']; ?>">
							<p class="text-blue text-center "><?php echo $book['book_name']; ?></p>
						</a>
					</div>
					<?php
				}
			?>
		
		</div>
	
	</div>		
</div>

	<?php   
		require_once("comp/footer_nav.php");
		require_once("comp/footer.php");		
	?>
