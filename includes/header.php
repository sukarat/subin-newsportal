<?php
session_start();
if (isset($_SESSION['username'])) {
    $loginText = "Log Out";
    $loginAction = "logout";
}else{
    $loginText = "Login";
    $loginAction = "login";
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
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    
    <!-- script
    ================================================== -->
    <script src="js/modernizr.js"></script>
    <script defer src="js/fontawesome/all.min.js"></script>

    <!-- favicons
    ================================================== -->
    <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png">
    <link rel="manifest" href="site.webmanifest">

</head>

<body id="top">
    <!-- Header
    ================================================== -->
    <header class="s-header">

        <div class="row">

            <div class="s-header__content column">
                <h1 class="s-header__logotext">
                    <a href="/" title="">News Portal.</a>
                </h1>
            </div>

        </div> <!-- end row -->

        <nav class="s-header__nav-wrap">

            <div class="row nav-row">

                <ul class="s-header__nav">
                    <li class="current"><a href="/">Home</a></li>
                    <li><a href="login.php?action=<?= $loginAction; ?>"><?= $loginText; ?></a></li>
                </ul> <!-- end #nav -->

            </div>

        </nav> <!-- end #nav-wrap -->

        <a class="header-menu-toggle" href="#0" title="Menu"><span>Menu</span></a>

    </header> <!-- Header End -->