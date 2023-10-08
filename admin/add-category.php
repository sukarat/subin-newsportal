<?php
include('includes/header.php');
// For adding category  
if (isset($_POST['submit'])) {
    $category = $_POST['category'];
    $description = $_POST['description'];
    $status = 1;
    $query = mysqli_query($conn, "insert into tblcategory(CategoryName,Description,Is_Active) values('$category','$description','$status')");
    if ($query) {
        $msg = "Category created ";
    } else {
        $error = "Something went wrong . Please try again.";
    }
}
?>
<main role="main">

    <section class="panel important">
        <h2>Add Category</h2>
        <div class="row">
            <div class="col-sm-6">
                <!---Success Message--->
                <?php if (isset($msg)) { ?>
                <div class="alert alert-success" role="alert">
                    <strong>Well done!</strong> <?php echo htmlentities($msg); ?>
                </div>
                <?php } ?>
                <!---Error Message--->
                <?php if (isset($error)) { ?>
                <div class="alert alert-danger" role="alert">
                    <strong>Oh snap!</strong> <?php echo htmlentities($error); ?>
                </div>
                <?php } ?>
            </div>
        </div>
        <form class="row" name="category" method="post" style="padding:20px;">
            <div class="form-group col-md-6">
                <label class="control-label">Category</label>
                <input type="text" class="form-control" value="" name="category" required>
            </div>
            <div class="form-group col-md-6">
                <label class=" control-label">Category Description</label>
                <textarea class="form-control" rows="5" name="description" required></textarea>
            </div>
            <div class="form-group col-md-12">
                <button type="submit" class="btn btn-custom waves-effect waves-light btn-md" name="submit" style="margin:30px 0">
                    Submit
                </button>
            </div>
        </form>
    </section>

</main>

<?php
include('includes/footer.php');
?>