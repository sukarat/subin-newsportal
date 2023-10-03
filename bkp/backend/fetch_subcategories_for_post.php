<?php
include './../conection.php';

$sql = "SELECT sub_category_id,sub_category_name, description,category_id FROM sub_category";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<option value='".$row["sub_category_name"]."'>".$row["sub_category_name"]."</option>";
    }
} else {
    echo "No sub categories found.";
}

$conn->close();
?>
