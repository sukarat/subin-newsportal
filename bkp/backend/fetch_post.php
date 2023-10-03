<?php
session_start();
$hostname = "localhost";     // Usually 'localhost' if using a local server
$username = "root";     // MySQL username
$password = "";     // MySQL password
$database = "newsportal";     // MySQL database name

// Create a connection to the MySQL database
$conn = new mysqli($hostname, $username, $password, $database);

// Check if the connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT post_id,title,content,photo FROM post  inner join sub_category on  post.sub_category_id=sub_category.sub_category_id inner join category on sub_category.category_id=category.category_id where category_name='".$_SESSION['priority']."' ;";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<div class='news-item'>
        <h2>".$row['title']."</h2>
        <p>".$row['content']."</p>
        <img src='".$row['photo']."' style='width: 50%;' alt='Image 2'>
        <button class='toggle-comment-form'>Leave a Comment</button>
        <form class='comment-form'>
          <label for='user-comment'>Leave your comment:</label>
          <textarea id='user-comment' name='user-comment' rows='4' placeholder='Enter your comment'></textarea>
          <button type='submit'>Submit</button>
        </form>
      </div>";
    }
} else {
    echo "No categories found.";
}

$conn->close();
?>
