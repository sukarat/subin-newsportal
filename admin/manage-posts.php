<?php
include('includes/header.php');
// For adding post  

if ($_GET['action'] = 'del') {
    $postid = intval($_GET['pid']);
    $query = mysqli_query($conn, "update tblposts set Is_Active=0 where id='$postid'");
    if ($query) {
        $msg = "Post deleted ";
    } else {
        $error = "Something went wrong . Please try again.";
    }
}
?>
<main role="main">

    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="page-title-box">
                    <h2 class="page-title">Manage Posts </h2>
                </div>
            </div>
        </div>
        <!-- end row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="card-box">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="example">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = mysqli_query($conn, "select tblposts.id as postid,tblposts.PostTitle as title,tblcategory.CategoryName as category from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId where tblposts.Is_Active=1 ");
                                $rowcount = mysqli_num_rows($query);
                                if ($rowcount == 0) {
                                    ?>
                                    <tr>
                                        <td colspan="4" align="center">
                                            <h3 style="color:red">No record found</h3>
                                        </td>
                                    <tr>
                                    <?php
                                } else {
                                    while ($row = mysqli_fetch_array($query)) {
                                        ?>
                                        <tr>
                                            <td><?php echo htmlentities($row['title']); ?></td>
                                            <td><?php echo htmlentities($row['category']) ?></td>
                                            <td><a class="btn btn-primary btn-sm"
                                                    href="edit-post.php?pid=<?php echo htmlentities($row['postid']); ?>"><i
                                                        class="fa fa-pencil"></i></a>
                                                &nbsp;<a class="btn btn-danger btn-sm"
                                                    href="manage-posts.php?pid=<?php echo htmlentities($row['postid']); ?>&&action=del"
                                                    onclick="return confirm('Do you reaaly want to delete ?')"> <i
                                                        class="fa fa-trash-o"></i></a>
                                            </td>
                                        </tr>
                                    <?php }
                                } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>

<?php
include('includes/footer.php');
?>