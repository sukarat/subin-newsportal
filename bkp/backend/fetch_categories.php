<?php
include './../conection.php';

$sql = "SELECT category_id, category_name, description FROM category";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<div class='category'>
                <div class='category-info'>
                <span>Category Name:</span>
                    <div class='category-name'>" . $row["category_name"] . "</div>
                    <br>
                    <span>Category Description:</span>
                    <div class='category-description'>" . $row["description"] . "</div>
                </div>
                <button class='delete-button'>Delete</button>
            </div>";
    }
} else {
    echo "No categories found.";
}

$conn->close();
?>
