<?php
// include '';
// <?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the form data and sanitize it

   $post_title=$_POST['post_title'];
   $post_content=$_POST['post_content'];
   $post_category=$_POST['category'];
   $sub_category=$_POST['sub_category'];
   $target_dir = "uploads/";
//    $target_file = $target_dir . basename($_FILES["post_image"]["name"]);
//    $post_image=$_FILES['post_image'];
$target_file = $target_dir . basename($_FILES["post_image"]["name"]);
$uploadOk = 1;
echo $uploadOk;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
// if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["post_image"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    if (move_uploaded_file($_FILES["post_image"]["tmp_name"], $target_file)) {
        echo "The file ". htmlspecialchars( basename( $_FILES["post_image"]["name"])). " has been uploaded.";
      } else {
        echo "Sorry, there was an error uploading your file.";
      }
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
// }

    include './../conection.php';
    // http://localhost/newsportal/uploads/
   
    $sql = "INSERT INTO post (title,content,photo,sub_category_id) VALUES ('$post_title','$post_content','http://localhost/newsportal/uploads/".basename($_FILES["post_image"]["name"])."',(SELECT sub_category_id FROM sub_category WHERE sub_category_name='".$sub_category."'))";
    
    if ($conn->query($sql) === TRUE) {
        echo "Category added successfully!";
    } else {
        echo "Error: " . $conn->error;
    }

//     $conn->close();
}
?>
