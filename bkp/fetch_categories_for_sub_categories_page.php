<?php
include './conection.php';

$sql = "SELECT category_id, category_name, description FROM category";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<option value='".$row["category_name"]."'>".$row["category_name"]."</option>";
    }
} else {
    echo "No categories found.";
}

$conn->close();
?>
