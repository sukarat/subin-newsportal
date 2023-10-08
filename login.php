<?php
// Start the session
session_start();
/**
 * Checks if the url contains query string named action and the value of action in logout
 * If the action is present and the value is logout then unset the username from session
 * And redirect back to homepage
 */
if (isset($_GET['action']) && $_GET['action'] === "logout") {
    unset($_SESSION['username']);
    header("Location: index.php");
    exit();
}
/**
 * Checks if the session contains username and if yes then the user is already loggedIn
 * So redirect back to homepage
 */
if (isset($_SESSION['username'])){
    header("Location: index.php");
    exit();
}

require_once('includes/connection.php');
/**
 * If Signup Button is clicked get the user details and save to database
 */
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

/**
 * If Login Button is clicked get the user details check in the database
 * If the details match and set the username in session and redirect back to homepage
 */
if (isset($_POST['login_btn'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = "SELECT id, AdminUsername FROM tbluser WHERE AdminUsername = '$username' AND AdminPassword = '$password'";
    try {
        $result = $conn->query($sql);
        if ($result->num_rows === 1){
            $row = mysqli_fetch_assoc($result);

            $_SESSION['id'] = $row['id'];
            $_SESSION['username'] = $row['AdminUsername'];
            header("Location: admin/index.php");
            exit();
        }else{
            $_SESSION["error"] = 'Error: username or password did not match!';
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
                    unset($_SESSION['error']);
                }
                if (isset($_SESSION['success'])) {
                    echo '<p style="text-align:center;color:green;">' . $_SESSION['success'] . '</p>';
                    unset($_SESSION['success']);
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