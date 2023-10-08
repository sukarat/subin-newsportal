<?php
session_start();
if (isset($_SESSION['username'])) {
    $loginText = "Log Out";
    $loginAction = "logout";
    $user_id = intval($_SESSION['id']);
} else {
    session_destroy();
    header("Location: /login.php");
    exit();
}

require_once('includes/connection.php');
// For saving user preference to user table  
if (isset($_POST['update'])) {
    array_pop($_POST);
    $categories = implode(",", $_POST);
    $query = mysqli_query($conn, "Update tbluser set preferences='$categories' where id='$user_id'");
    if ($query) {
        $msg = "Preferences Updated successfully ";
    } else {
        $error = "Something went wrong . Please try again.";
    }
}

$query = mysqli_query($conn, "SELECT preferences FROM tbluser WHERE id = 2");
if ($query) {
    $row = mysqli_fetch_array($query);
    $preferred_cats = explode(",", $row[0]);
}
?>
<!DOCTYPE html>
<html class="no-js" lang="en">

<head>

    <!--- basic page needs
    ================================================== -->
    <meta charset="utf-8">
    <title>News Portal</title>
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- mobile specific metas
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS
    ================================================== -->
    <link rel="stylesheet" href="admin/css/admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

</head>

<body id="top">
    <header role="banner">
        <h1>News Portal Admin</h1>
        <ul class="utilities">
            <br>
            <!-- <li class="users"><a href="#">My Account</a></li> -->
            <li class="logout warn"><a href="../login.php?action=logout">Log Out</a></li>
        </ul>
    </header>

    <nav role='navigation'>
        <ul class="main">
            <li class="dashboard"><a href="index.php">Dashboard</a></li>
            <li class="dashboard"><a href="index.php">Go to News Homepage</a></li>
            <!-- <li class="write"><a href="add-category.php">Add Category</a></li>
            <li class="write"><a href="manage-categories.php">Manage Categories</a></li>
            <li class="write"><a href="add-post.php">Write news</a></li>
            <li class="write"><a href="manage-posts.php">Manage Posts</a></li> -->
            <!-- <li class="users"><a href="#">Manage Users</a></li> -->
        </ul>
    </nav>
    <main role="main">

        <section class="panel important">
            <h2>Choose Preferred Category by Using the Tick Mark Icon of the right:</h2>
            <div class="table-responsive">
                <form action="" method="post">
                    <table class="table m-0 table-bordered" id="example">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Category</th>
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
                                    <td>
                                        <?php
                                            $checked = "";
                                            if(in_array($row['CategoryName'], $preferred_cats) ){
                                                $checked = "checked";
                                            }
                                        ?>
                                        <input type="Checkbox" name="<?php echo htmlentities($row['CategoryName']); ?>" value="<?php echo htmlentities($row['CategoryName']); ?>" <?php echo $checked; ?>>
                                    </td>
                                </tr>
                                <?php
                                $cnt++;
                            } ?>
                        </tbody>
                    </table>

                    <button type="submit" name="update"
                        style="margin:10px auto;width:100px;display:block;">Update</button>
                </form>
            </div>
        </section>
    </main>
</body>

</html>