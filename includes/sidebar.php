<div id="sidebar" class="s-content__sidebar large-4 column">

    <div class="widget widget--categories">
        <h3 class="h6">Categories.</h3>
        <ul>
            <?php
            $sql = "SELECT id, CategoryName FROM tblcategory";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    echo '<li><a href="/category-archive.php?id='.$row["id"].'" title="">' . $row["CategoryName"] . '</a></li>';
                }
            }
            ?>
        </ul>
    </div>

    <div class="widget widget_popular">
        <h3 class="h6">Popular Post.</h3>

        <ul class="link-list">
            <li><a href="#">Sint cillum consectetur voluptate.</a></li>
            <li><a href="#">Lorem ipsum Ullamco commodo.</a></li>
            <li><a href="#">Fugiat minim eiusmod do.</a></li>
        </ul>
    </div>

</div> <!-- end sidebar -->