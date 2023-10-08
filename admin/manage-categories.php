<?php
include('includes/header.php');
// For adding category  
if ($_GET['action'] == 'del' && $_GET['rid']) {
    $id = intval($_GET['rid']);
    $query = mysqli_query($conn, "update tblcategory set Is_Active='0' where id='$id'");
    $msg = "Category deleted ";
}
?>
<main role="main">

    <section class="panel important">
        <h2>Manage Category</h2>
        <div class="table-responsive">
            <table class="table m-0 table-bordered" id="example">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Category</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = mysqli_query($conn, "Select id,CategoryName,Description,PostingDate,UpdationDate from tblcategory where Is_Active=1");
                    $cnt = 1;
                    while ($row = mysqli_fetch_array($query)) {
                        ?>
                    <tr>
                        <td><?php echo htmlentities($cnt); ?></td>
                        <td><?php echo htmlentities($row['CategoryName']); ?></td>
                        <td><?php echo htmlentities($row['Description']); ?></td>
                        <td><a class="btn btn-primary btn-sm"
                                href="edit-category.php?cid=<?php echo htmlentities($row['id']); ?>"><i
                                    class="fa fa-pencil"></i></a>
                            &nbsp;<a class="btn btn-danger btn-sm"
                                href="manage-categories.php?rid=<?php echo htmlentities($row['id']); ?>&&action=del"> <i
                                    class="fa fa-trash-o"></i></a>
                        </td>
                    </tr>
                    <?php
                    $cnt++;
                    } ?>
                </tbody>
            </table>
        </div>
    </section>

</main>

<?php
include('includes/footer.php');
?>