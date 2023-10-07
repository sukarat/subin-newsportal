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
                    echo '<li><a href="/category-archive.php?id=' . $row["id"] . '" title="">' . $row["CategoryName"] . '</a></li>';
                }
            }
            ?>
        </ul>
    </div>

    <div class="widget widget_popular">
        <h3 class="h6">Popular Post.</h3>

        <ul class="link-list">
            <?php
            $sql = "SELECT id, PostTitle FROM tblposts ORDER BY likeCount DESC";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    echo '<li><a href="/single.php?id=' . $row["id"] . '">' . $row["PostTitle"] . '</a></li>';
                }
            }
            ?>
        </ul>
    </div>

</div> <!-- end sidebar -->