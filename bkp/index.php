<?php
if (isset($_POST['login'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  // Add your authentication logic here
  // For demonstration purposes, we'll use a simple check

  // Replace 'username' and 'password' with your actual credentials
  $validUsername = 'username';
  $validPassword = 'password';

  if ($username === $validUsername && $password === $validPassword) {
    // Successful login
    echo "Login successful! Welcome, $username!";
  } else {
    // Invalid credentials
    echo "Invalid username or password!";
  }
}
?>
<!DOCTYPE html>
<html>
<head>
<style>
 .news-section {
    /* display: flex;
    gap: 20px; */
    display: grid;
    margin-top:20px ;
    margin-left:20px ;
    margin-right:20px ;
    grid-template-columns: auto auto ;
    gap: 50px 100px;  
}

  .news-item {
    border: 1px solid #ccc;
    padding: 20px;
    background-color: #f9f9f9;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    flex: 1;
  }

  .comment-form {
    display: none;
    margin-top: 10px;
    padding: 10px;
    border: 1px solid #ccc;
    background-color: #f9f9f9;
  }

  .comment-form label {
    display: block;
    font-weight: bold;
  }

  .comment-form textarea {
    width: 100%;
    padding: 5px;
    margin-top: 5px;
  }

  .comment-form button {
    background-color: #007bff;
    color: white;
    border: none;
    padding: 5px 10px;
    cursor: pointer;
  }
</style>
  <title>News Portal</title>
  <link rel="stylesheet" href="./css/homePage.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
  <h1 style="text-align: center;">News Portal</h1>
  <nav>

    <ul class="nav-links">
      <li><a href="/index.php">Home</a></li>
      <li><a href="/preference.php">Preference</a></li>
      <li> <a class="btn btn-primary" href="/loginPage.php" role="button">Admin login</a></li>

    </ul>
  </nav>

  <!--  <h3 style="text-align: center;">News Portal</h3> -->

  <div class="news-section">

  <?php
  include './backend/fetch_post.php'
  ?>
</div>

<script>
  const toggleButton = document.querySelector('.toggle-comment-form');
  const commentForm = document.querySelector('.comment-form');

  toggleButton.addEventListener('click', () => {
    commentForm.style.display = commentForm.style.display === 'none' ? 'block' : 'none';
  });
</script>






  
</body>
</html>
