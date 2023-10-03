<?php
// Start the session
session_start();
require_once('includes/connection.php');
if (isset($_POST['register_btn'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "INSERT INTO tbluser (AdminUserName, AdminPassword, userType) VALUES ('$username', '$password', 0)";
    try {
        $result = $conn->query($sql);
        $_SESSION["success"] = 'Success: new user created !';
    } catch (Exception $e) {
        // Set session variables
        $_SESSION["error"] = 'Error: ' . $e->getMessage();
    }
}
if (isset($_POST['login_btn'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = "SELECT AdminUsername, AdminPassword FROM tbluser WHERE AdminUsername = '$username' AND AdminPassword = '$password'";
    try {
        $result = $conn->query($sql);
        if ($result->num_rows > 0){
            $_SESSION["success"] = 'Success: username and password match !';
        }else{
            $_SESSION["error"] = 'Error: username not found !';
        }
    } catch (Exception $e) {
        // Set session variables
        $_SESSION["error"] = 'Error: ' . $e->getMessage();
    }

}


?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        form {
            border: 3px solid #f1f1f1;
        }

        input[type=text],
        input[type=password] {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        button {
            background-color: #04AA6D;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
        }

        button:hover {
            opacity: 0.8;
        }

        .cancelbtn {
            width: auto;
            padding: 10px 18px;
            background-color: #f44336;
            text-decoration: none;
            color: #fff;
        }

        .imgcontainer {
            text-align: center;
            margin: 24px 0 12px 0;
        }

        img.avatar {
            width: 40%;
            border-radius: 50%;
        }

        .container {
            padding: 16px;
        }

        span.psw {
            float: right;
            padding-top: 16px;
        }

        /* Change styles for span and cancel button on extra small screens */
        @media screen and (max-width: 300px) {
            span.psw {
                display: block;
                float: none;
            }

            .cancelbtn {
                width: 100%;
            }
        }
    </style>
</head>

<body>

    <div class="wrap" style="max-width:500px;margin:0 auto;">
        <h2 style="text-align:center;">Login Form</h2>

        <form action="" method="post">
            <div class="container">
                <?php
                if (isset($_SESSION['error'])) {
                    echo '<p style="text-align:center;color:red;">' . $_SESSION['error'] . '</p>';
                    session_unset();
                }
                if (isset($_SESSION['success'])) {
                    echo '<p style="text-align:center;color:green;">' . $_SESSION['success'] . '</p>';
                    session_unset();
                }
                ?>
                <label for="uname"><b>Username</b></label>
                <input type="text" placeholder="Enter Username" name="username" required>

                <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="password" required>

                <button type="submit" name="login_btn">Login</button>
                <p class="or" style="text-align:center;">For new user, provide username and password then click on sign
                    up below!</p>
                <button type="submit" name="register_btn">Sign Up</button>
            </div>

            <div class="container" style="background-color:#f1f1f1">
                <a href="/" type="button" class="cancelbtn">Cancel</a>
            </div>
        </form>
    </div>

</body>

</html>