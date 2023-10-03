<?php
include('includes/header.php');
require_once('includes/connection.php');
?>

<!-- Content
    ================================================== -->
<div class="s-content">

    <div class="row">

        <div id="main" class="s-content__main large-8 column">

            <?php
            $catId = $_GET['id'];
            $sql = "SELECT id, PostTitle, PostingDate, PostDetails, PostImage FROM tblposts WHERE CategoryId = $catId";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) { ?>
                    <article class="entry">

                        <header class="entry__header">

                            <h2 class="entry__title h1">
                                <a href="single.php?id=<?= $row['id'] ?>" title=""><?= $row['PostTitle'] ?></a>
                            </h2>

                            <div class="entry__meta">
                                <ul>
                                    <li><?= $row['PostingDate'] ?></li>
                                    <!-- <li><a href="#" title="" rel="category tag">Ghost</a></li>
                                <li>John Doe</li> -->
                                </ul>
                            </div>

                        </header>

                        <div class="featured-img">
                            <img src="images/post_images/<?= $row['PostImage'] ?>" alt="">
                        </div>

                        <div class="entry__content">
                            <p>
                                <?= mb_strimwidth($row['PostDetails'], 0, 200, ' ...'); ?>
                            </p>
                        </div>

                    </article> <!-- end entry -->

                <?php }
            }
            ?>



        </div> <!-- end main -->
        <?php
        include('includes/sidebar.php');
        ?>

    </div> <!-- end row -->

</div> <!-- end content-wrap -->

<?php
include('includes/footer.php');
?>