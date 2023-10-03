<?php
include './../conection.php';

$sql =" SELECT * FROM admin WHERE username='".$_POST['username']."' AND password='".$_POST['password']."'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    header("Location: /admin/adminHomepage.php");
} else {
    echo "No categories found.";
}

$conn->close();
?>
