<!DOCTYPE html>
<html>
<head>
  <title>Login Page</title>
  <link rel="stylesheet" type="text/css" href="./css/login.css">
</head>
<body>
  <div class="container">
  <form class="login-form" action="./backend/check_admin.php" method="POST">
      <h2>News Portal login</h2>
      <input type="text" name="username" placeholder="Username" required>
      <input type="password" name="password" placeholder="Password" required>
      <button type="submit" name="login">Login</button>
    </form>
  </div>
</body>
</html>
