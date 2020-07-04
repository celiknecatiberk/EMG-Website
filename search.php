<?php

	require_once("comp/header.php");
	require_once("comp/navbar.php");

	if (!isset($_GET['search'])) {
		redirect("404.php");
	}
?>
<div class="container padding-10 ">
	<div id="search-container ">
		<div class='row '>
		<?php
			if (!empty($_GET['search'])) {
				
				$search = escape($_GET['search']);
				
				if (strlen($search) < 4) {
					echo "<h2 class='enter'>Enter at least 3 characters when searching ! </h2>";
					exit();
				}

				$search_book = explode(" ", $search);
				$item_count = 0;
				$q = "SELECT * FROM `book` WHERE ";

				foreach ($search_book as $key => $term) {
					$item_count++;
					if ($item_count == 1) {
						$q .= "`tags` LIKE '%$term%' ";
					}else{
						$q .= "AND `tags` LIKE '%$term%' ";
					}
				}
	
				$result_q = $db->Query($q);
				$result_num = mysqli_num_rows($result_q);
				if ($result_num > 0) {
				
					echo "<h2 id='searchinfo' class=' text-center text-bs-primary'>`<span id='foundNumber' class='text-black'>{$result_num}</span>` Result Found</h2>";
					while ($book = mysqli_fetch_assoc($result_q)) {   //sütun isimlerine göre 
						?>
						<div id="searchItem">    
							<a id="bookID<?php echo $book['id']; ?>" style="display:block" href="book.php?id=<?php echo $book['id']; ?>" class="thumbnail">
								<img src="<?php echo $book['book_image']; ?>">
									<p class="text-bs-primary text-center " id="searchBookName"><?php echo $book['book_name']; ?></p>
									<p class="text-bold" id="searchAuthor"><span id="author">Author : </span><?php echo $book['author']; ?></p>
									<span class="text-line-through" id="searchCategory"><?php echo $book['category']; ?></span> 
									<span id="searchPageNumber"> <span id="page">Page Number : </span><?php echo $book['page_number']; ?></span>
							</a>
						</div>
						<?php
					}
				}else{
					echo "<h1 id='noResult'>No results found for `<span id='noBook'>{$search}</span>`</h1>";
				}
			}else{
				echo "<h1 id='noResult' class='text-center text-bs-primary'>Sorry! No Search Term Given</h1>";
			}
		?>
		</div>
	</div>
</div>
<?  
	require_once("comp/footer.php");	 
?>