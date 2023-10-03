<?php

// <?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the form data and sanitize it
    
    $categoryName = $_POST['category'];
    $subcategory = $_POST['subcategory'];
    $description = $_POST['description'];

    // echo $categoryName;
    // echo $description;
    // Database connection (assuming you have a connection.php file as mentioned before)
    include './../conection.php';

    $sql="SELECT category_id from category where category_name='".$categoryName."'";
    $result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $category_id=$row['category_id'];

    }}
    // Prepare and execute the SQL query to insert data into the database
    $sql = "INSERT INTO sub_category (sub_category_name, description,category_id) VALUES ('$subcategory', '$description',$category_id)";
    
    if ($conn->query($sql) === TRUE) {
        echo "Sub Category added successfully!";
    } else {
        echo "Error: " . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>
