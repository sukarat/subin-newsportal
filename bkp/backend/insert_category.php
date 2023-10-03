 <?php

// <?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the form data and sanitize it

    $categoryName = $_POST['categoryName'];
    $description = $_POST['description'];

    // echo $categoryName;
    // echo $description;
    // Database connection (assuming you have a connection.php file as mentioned before)
    include './../conection.php';

    // Prepare and execute the SQL query to insert data into the database
    $sql = "INSERT INTO category (category_name, description) VALUES ('$categoryName', '$description')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Category added successfully!";
    } else {
        echo "Error: " . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>
