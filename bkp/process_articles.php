<?php
session_start();

if($_POST){
    $_SESSION['priority'] = $_POST['category'];
    echo $_POST['category'];
    header("Location: index.php");
    exit;
}


?>
