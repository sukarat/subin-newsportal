<?php
session_start();
if (isset($_SESSION['username'])) {
    $loginText = "Log Out";
    $loginAction = "logout";
} else {
    session_destroy();
    header("Location: /login.php");
    exit();
}
require_once('../includes/connection.php');
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
    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

</head>

<body id="top">
    <header role="banner">
        <h1>News Portal Admin</h1>
        <ul class="utilities">
            <br>
            <!-- <li class="users"><a href="#">My Account</a></li> -->
            <li class="logout warn"><a href="../../login.php?action=logout">Log Out</a></li>
        </ul>
    </header>

    <nav role='navigation'>
        <ul class="main">
            <li class="dashboard"><a href="/admin">Dashboard</a></li>
            <li class="write"><a href="add-category.php">Add Category</a></li>
            <li class="write"><a href="manage-categories.php">Manage Categories</a></li>
            <li class="write"><a href="add-post.php">Write news</a></li>
            <li class="write"><a href="manage-posts.php">Manage Posts</a></li>
            <!-- <li class="users"><a href="#">Manage Users</a></li> -->
        </ul>
    </nav>