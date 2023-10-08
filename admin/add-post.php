<?php
include('includes/header.php');
// For adding post  
if (isset($_POST['submit'])) {
    $posttitle = addslashes($_POST['posttitle']);
    $catid = $_POST['category'];
    $postdetails = addslashes($_POST['postdescription']);
    $postedby = $_SESSION['username'];
    $arr = explode(" ", $posttitle);
    $url = implode("-", $arr);
    $imgfile = $_FILES["postimage"]["name"];
    // get the image extension
    $extension = substr($imgfile, strlen($imgfile) - 4, strlen($imgfile));
    // allowed extensions
    $allowed_extensions = array(".jpg", "jpeg", ".png", ".gif");
    // Validation for allowed extensions .in_array() function searches an array for a specific value.
    if (!in_array($extension, $allowed_extensions)) {
        echo "<script>alert('Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
    } else {
        //rename the image file
        $imgnewfile = md5($imgfile) . $extension;
        // Code for move image into directory
        move_uploaded_file($_FILES["postimage"]["tmp_name"], "../images/post_images/" . $imgnewfile);

        $status = 1;
        $query = mysqli_query($conn, "insert into tblposts(PostTitle,CategoryId,PostDetails,PostUrl,Is_Active,PostImage,likeCount,postedBy) values('$posttitle','$catid','$postdetails','$url','$status','$imgnewfile',0,'$postedby')");
        if ($query) {
            $msg = "Post successfully added ";
        } else {
            $error = "Something went wrong . Please try again.";
        }

    }
}
?>
<main role="main">

    <section class="panel important">
        <h2>Write Some News</h2>
        <ul>
            <li>Information Panel</li>
        </ul>
    </section>

    <section class="panel important">
        <h2>Write a post</h2>
        <form name="addpost" method="post" class="row" enctype="multipart/form-data" style="padding:20px;">
            <div class="form-group col-md-6">
                <label for="exampleInputEmail1">Post Title</label>
                <input type="text" class="form-control" id="posttitle" name="posttitle" placeholder="Enter title"
                    required>
            </div>
            <div class="form-group col-md-6">
                <label for="exampleInputEmail1">Category</label>
                <select class="form-control" name="category" id="category" required>
                    <option value="">Select Category </option>
                    <?php
                    // Feching active categories
                    $ret = mysqli_query($conn, "select id,CategoryName from  tblcategory where Is_Active=1");
                    while ($result = mysqli_fetch_array($ret)) {
                        ?>
                        <option value="<?php echo htmlentities($result['id']); ?>">
                            <?php echo htmlentities($result['CategoryName']); ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box">
                        <h4 class="m-b-30 m-t-0 header-title"><b>Post Details</b></h4>
                        <textarea class="summernote" name="postdescription" required rows="20"></textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box">
                        <h4 class="m-b-30 m-t-0 header-title"><b>Feature Image</b></h4>
                        <input type="file" class="form-control" id="postimage" name="postimage" required>
                    </div>
                </div>
            </div>
            <button type="submit" name="submit" style="margin:30px 0">Save and
                Post</button>
        </form>
    </section>

</main>

<?php
include('includes/footer.php');
?>