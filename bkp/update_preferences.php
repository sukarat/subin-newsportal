<?php
include './conection.php';


// Get user ID (you may use a session or authentication method to identify the user)
$user_id = 1; // Replace with the actual user ID

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get selected preferences from the form
    if (isset($_POST["preferences"])) {
        $selected_preferences = $_POST["preferences"];

        // Clear existing preferences for this user
        $sql_delete = "DELETE FROM user_preferences WHERE user_id = $user_id";
        $conn->query($sql_delete);

        // Insert new preferences into the database
        foreach ($selected_preferences as $category) {
            $category = $conn->real_escape_string($category);
            $sql_insert = "INSERT INTO user_preferences (user_id, category, score) VALUES ($user_id, '$category', 1)";
            $conn->query($sql_insert);
        }

        echo "Preferences updated successfully.";
    } else {
        echo "No preferences selected.";
    }
}

// Close the database connection
$conn->close();
?>

