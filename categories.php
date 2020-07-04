<?php
require_once("comp/header.php");
require_once("comp/navbar.php");

$slider = $db->FetchAll("image,link", "slider", null, " RAND()");

?>
<div class="extraCategories">
    <div class="container">
        <div class="row">
            <?php

            $categories = $db->FetchAll("*", "category", null, "`id` ASC");
            foreach ($categories as $key => $category) {
                $category_name = $category['name'];
                $category_id = $category['id'];
                $category_image = $category['image'];

            ?>
                <div class="categories-elements">
                    <a style="width:335px;height:403px" id="category<?php echo $category_id; ?>" href="category.php?id=<?php echo $category_id; ?>" >
                        <div class="card ">
                            <img src="<?php echo $category_image; ?>" class="card-img-top" alt="">
                            <div class="card-body">
                                <p class="card-title text-uppercase text-dark">
                                    <?php echo $category_name; ?>
                                </p>
                                <button type="button" id="formore<?php echo $category_id; ?>" class="button button-second">For more ..</button>
                            </div>
                        </div>
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