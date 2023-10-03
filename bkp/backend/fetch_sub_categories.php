<?php
include './../conection.php';

$sql = "SELECT sub_category_id, sub_category_name, sub_category.description,category_name  FROM sub_category inner join category on sub_category.category_id=category.category_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<div class='category'>
                <div class='category-info'>
                <span>Category Name:</span>
                <div class='category_name'>" . $row["category_name"] . "</div>
                <br>
                <span>Sub Category:</span>
                <div class='sub_category_name'>" . $row["sub_category_name"] . "</div>
                    <br>
                
                    <span>Sub Category Description:</span>
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