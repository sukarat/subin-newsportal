<?php
include('includes/header.php');
// For adding post  
if (isset($_POST['submit'])) {
    $catid = intval($_GET['cid']);
    $category = $_POST['category'];
    $description = $_POST['description'];
    $query = mysqli_query($conn, "Update  tblcategory set CategoryName='$category',Description='$description' where id='$catid'");
    if ($query) {
        $msg = "Category Updated successfully ";
    } else {
        $error = "Something went wrong . Please try again.";
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
            $catid = intval($_GET['cid']);
            $query = mysqli_query($conn, "Select id,CategoryName,Description,PostingDate,UpdationDate from  tblcategory where Is_Active=1 and id='$catid'");
            $cnt = 1;

            while ($row = mysqli_fetch_array($query)) {
                ?>
                <form class="row" name="category" method="post">
                    <div class="form-group col-md-6">
                        <label class="control-label">Category</label>
                        <input type="text" class="form-control" value="<?php echo htmlentities($row['CategoryName']); ?>"
                            name="category" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="control-label">Category Description</label>
                        <textarea class="form-control" rows="5" name="description"
                            required><?php echo htmlentities($row['Description']); ?></textarea>
                    </div>
                <?php } ?>
                <div class="form-group col-md-12">
                    <button type="submit" class="btn btn-custom waves-effect waves-light btn-md" name="submit">
                        Update
                    </button>
                </div>
            </form>
        </div>

        <!-- container -->
    </div>

</main>

<?php
include('includes/footer.php');
?>