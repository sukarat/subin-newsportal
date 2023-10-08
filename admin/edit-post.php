<?php
include('includes/header.php');
// For adding post  

if (isset($_POST['update'])) {
    $posttitle = $_POST['posttitle'];
    $catid = $_POST['category'];
    $postdetails = $_POST['postdescription'];
    $lastuptdby = $_SESSION['login'];
    $arr = explode(" ", $posttitle);
    $url = implode("-", $arr);
    $status = 1;
    $postid = intval($_GET['pid']);
    if (!empty($_FILES["postimage"]["name"])) {
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
            $query = mysqli_query($conn, "update tblposts set PostTitle='$posttitle',CategoryId='$catid',PostDetails='$postdetails',PostUrl='$url',Is_Active='$status',lastUpdatedBy='$lastuptdby',PostImage='$imgnewfile' where id='$postid'");
        }
    }else{
        $query = mysqli_query($conn, "update tblposts set PostTitle='$posttitle',CategoryId='$catid',PostDetails='$postdetails',PostUrl='$url',Is_Active='$status',lastUpdatedBy='$lastuptdby' where id='$postid'");
        if ($query) {
            $msg = "Post successfully added ";
        } else {
            $error = "Something went wrong . Please try again.";
        }
    }
}
?>
<main role="main">

    <!-- Start content -->
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="page-title-box">
                        <h2 class="page-title">Edit Post </h2>
                    </div>
                </div>
            </div>
            <?php
            $postid = intval($_GET['pid']);
            $query = mysqli_query($conn, "select tblposts.id as postid,tblposts.PostImage,tblposts.PostTitle as title,tblposts.PostDetails,tblcategory.CategoryName as category,tblcategory.id as catid from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId where tblposts.id='$postid' and tblposts.Is_Active=1 ");
            while ($row = mysqli_fetch_array($query)) {
                ?>

                <form name="addpost" method="post" class="row" enctype="multipart/form-data">
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">Post Title</label>
                        <input type="text" class="form-control" id="posttitle"
                            value="<?php echo htmlentities($row['title']); ?>" name="posttitle" placeholder="Enter title"
                            required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">Category</label>
                        <select class="form-control" name="category" id="category" required>
                            <option value="<?php echo htmlentities($row['catid']); ?>">
                                <?php echo htmlentities($row['category']); ?></option>
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
                                <textarea class="summernote" name="postdescription" rows="20"
                                    required><?php echo htmlentities($row['PostDetails']); ?></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-box">
                                <h4 class="m-b-30 m-t-0 header-title"><b>Post Image</b></h4>
                                <img src="../images/post_images/<?php echo htmlentities($row['PostImage']); ?>"
                                    width="300" />
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-box">
                                <h4 class="m-b-30 m-t-0 header-title"><b>Choose New Feature Image</b></h4>
                                <input type="file" class="form-control" id="postimage" name="postimage">
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <button type="submit" name="update" style="margin:10px 0;">Update
                </button>
        </div>

        <!-- container -->
    </div>

</main>

<?php
include('includes/footer.php');
?>