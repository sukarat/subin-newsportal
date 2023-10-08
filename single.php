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
        $_SESSION["success"] = 'Success: like increased !';
    } catch (Exception $e) {
        // Set session variables
        $_SESSION["error"] = 'Error: ' . $e->getMessage();
    }
}

/**
 * Post comment
 */

//Genrating CSRF Token
if (empty($_SESSION['token'])) {
    $_SESSION['token'] = bin2hex(random_bytes(32));
}

if (isset($_POST['submit'])) {
    //Verifying CSRF Token
    if (!empty($_POST['csrftoken'])) {
        if (hash_equals($_SESSION['token'], $_POST['csrftoken'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $comment = $_POST['comment'];
            $postid = intval($_GET['id']);
            $st1 = '1';
            $query = mysqli_query($conn, "insert into tblcomments(postId,name,email,comment,status) values('$postid','$name','$email','$comment','$st1')");
            if ($query):
                echo "<script>alert('Comment successfully added ! ');</script>";
                unset($_SESSION['token']);
            else:
                echo "<script>alert('Something went wrong. Please try again.');</script>";

            endif;

        }
    }
}
//Genrating CSRF Token
if (empty($_SESSION['token'])) {
    $_SESSION['token'] = bin2hex(random_bytes(32));
}
?>

<!-- Content
    ================================================== -->
<div class="s-content">

    <div class="row">

        <div id="main" class="s-content__main large-8 column">

            <?php
            $id = $_GET['id'];
            $sql = "SELECT id, PostTitle, PostingDate, PostDetails, PostImage, likeCount FROM tblposts WHERE id = $id";
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
                                <?= $row['PostDetails']; ?>
                            </p>
                        </div>

                    </article> <!-- end entry -->

                <?php }
            }
            ?>

            <!---Comment Display Section --->
            <div class="col-md-8">
                <?php
                $sts = 1;
                $query = mysqli_query($conn, "select name,comment,postingDate from  tblcomments where postId='$id' and status='$sts'");
                while ($row = mysqli_fetch_array($query)) {
                    ?>
                <div class="media mb-4">
                    <img class="d-flex mr-3 rounded-circle" src="images/usericon.png" alt="">
                    <div class="media-body">
                        <h5 class="mt-0"><?php echo htmlentities($row['name']); ?> <br />
                            <span style="font-size:11px;"><b>at</b>
                                <?php echo htmlentities($row['postingDate']); ?></span>
                        </h5>
                        <?php echo htmlentities($row['comment']); ?>
                    </div>
                </div>
                <?php } ?>
                <!---Comment Section --->
            </div>
            <div class="col-md-8">
                <hr>
                <div class="card my-4 bg-transparent border-0">
                    <h5 class="card-header bg-transparent border-0">Leave a Comment</h5>
                    <div class="card-body">
                        <form name="Comment" method="post">
                        <input type="hidden" name="csrftoken" value="<?php echo htmlentities($_SESSION['token']); ?>" />
                            <div class="form-group">
                                <input type="text" name="name" class="form-control rounded-0"
                                    placeholder="Enter your fullname" required>
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" class="form-control rounded-0"
                                    placeholder="Enter your Valid email" required>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control rounded-0" name="comment" rows="3" placeholder="Comment"
                                    required></textarea>
                            </div>
                            <button type="submit" class="btn btn-danger" name="submit">Submit</button>
                        </form>
                    </div>
                </div>
            </div>


        </div> <!-- end main -->
        <?php
        include('includes/sidebar.php');
        ?>

    </div> <!-- end row -->

</div> <!-- end content-wrap -->

<?php
include('includes/footer.php');
?>