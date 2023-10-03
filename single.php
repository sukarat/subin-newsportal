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
            $id = $_GET['id'];
            $sql = "SELECT PostTitle, PostingDate, PostDetails, PostImage FROM tblposts WHERE id = $id";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) { ?>
                    <article class="entry">

                        <header class="entry__header">

                            <h2 class="entry__title h1">
                                <a href="single.php" title=""><?= $row['PostTitle'] ?></a>
                            </h2>

                            <div class="entry__meta">
                                <ul>
                                    <li><?= $row['PostingDate'] ?></li>
                                </ul>
                            </div>

                        </header>

                        <div class="featured-img">
                            <img src="images/post_images/<?= $row['PostImage'] ?>" alt="">
                        </div>

                        <div class="entry__content">
                            <p>
                                <?= $row['PostDetails']; ?>
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