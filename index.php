<?php
include('includes/header.php');
require_once('includes/connection.php');


/**
 * If Like Button is clicked then increase like count and save to database
 */
if (isset($_POST['like_btn'])) {

    $likeCount = $_POST['likeCount'] + 1;
    $id = $_POST['id'];
    $sql = "UPDATE tblposts SET likeCount = '$likeCount' WHERE id = '$id'";

    try {
        $result = $conn->query($sql);
    } catch (Exception $e) {
    }
}
?>

<!-- Content
    ================================================== -->
<div class="s-content">

    <div class="row">

        <div id="main" class="s-content__main large-8 column">

            <?php
            $sql = "SELECT id, PostTitle, PostingDate, PostDetails, PostImage, likeCount FROM tblposts ORDER BY id DESC";
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
                                    <li><?= date("F jS, Y", strtotime($row['PostingDate'])); ?></li>
                                    <li>
                                        <form action="" method="post">
                                            <input type="hidden" name="id" value=<?= $row['id'] ?>>
                                            <input type="hidden" name="likeCount" value=<?= $row['likeCount'] ?>>
                                            <button type="submit" name="like_btn" class="like_btn">
                                                <i class="fa-regular fa-thumbs-up"></i>(<?= $row['likeCount'] ?>)</button>
                                        </form>
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