<?php
include './header.php';
?>
<div class="container">


    <div class="category-list">
        <!-- This is where the categories will be displayed -->
        <?php 
        include '../backend/fetch_sub_categories.php';
        ?>
    </div>
</div>

    <?php
include './footer.php';
?>