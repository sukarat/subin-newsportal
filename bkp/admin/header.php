<!DOCTYPE html>
<html>

<head>
    <title>Admin Dashboard</title>
    <style>
    /* Reset some default styles */
    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }

    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
    }

    /* Sidebar styles */
    .sidebar {
        width: 250px;
        background-color: #333;
        color: #fff;
        padding: 20px;
        position: fixed;
        height: 100%;
    }

    .sidebar ul {
        list-style: none;
        padding: 0;
    }

    .sidebar li {
        margin-bottom: 10px;
    }

    .sidebar a {
        display: block;
        color: #fff;
        text-decoration: none;
        padding: 10px;
        border-radius: 4px;
    }

    /*     
    .sidebar a:hover {
      background-color: #555;
    }
     */
    .sidebar .active {
        background-color: #555;
    }

    /* Main content styles */
    .content {
        margin-left: 250px;
        padding: 20px;
    }

    /* Header styles */
    .header {
        background-color: #333;
        color: #fff;
        padding: 20px;
    }

    /* Footer styles */
    .footer {
        background-color: #333;
        color: #fff;
        padding: 20px;
        text-align: center;
    }

    /* Responsive styles */
    @media (max-width: 768px) {
        .sidebar {
            width: 100%;
            position: static;
            height: auto;
        }

        .content {
            margin-left: 0;
        }
    }





    /* for category .php */

    .container {
      max-width: 400px;
      margin: 0 auto;
      padding: 20px;
    }

    .form-group {
      margin-bottom: 20px;
    }

    .form-group label {
      display: block;
      font-weight: bold;
      margin-bottom: 5px;
    }

    .form-group input[type="text"] {
      width: 100%;
      padding: 10px;
      font-size: 16px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }

    .form-group input[type="submit"] {
      background-color: #4CAF50;
      color: white;
      padding: 10px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    .form-group input[type="submit"]:hover {
      background-color: #45a049;
    }
/* for subcategory */

.subcategory-form {
    /* width: 100%; */
      margin-bottom: 20px;
    }

    .form-field {
      margin-bottom: 10px;
    }

    .form-field label {
      display: block;
      margin-bottom: 5px;
    }

    .form-field select,
    .form-field input[type="text"],
    .form-field textarea {
      /* width: 100%; */
      padding: 5px;
      border: 1px solid #ccc;
      border-radius: 3px;
    }

    .form-field textarea {
      height: 100px;
    }

    .submit-btn {
      background-color: #4caf50;
      color: #fff;
      padding: 10px 20px;
      border: none;
      border-radius: 3px;
      cursor: pointer;
    }

    .submit-btn:hover {
      background-color: #45a049;
    }
    /* for user.php */
    /* body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
} */

.container {
    max-width: 600px;
    margin: 20px auto;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

h1 {
    text-align: center;
}

.form-group {
    margin-bottom: 15px;
}

label {
    display: block;
    font-weight: bold;
}

input {
    width: 100%;
    padding: 8px;
    font-size: 16px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

button {
    display: block;
    width: 100%;
    padding: 10px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}
/* for post.php */
/* body {
      font-family: Arial, sans-serif;
      padding: 20px;
    } */

    .post-form {
      max-width: 400px;
      margin: 0 auto;
    }

    .post-form label {
      display: block;
      margin-bottom: 10px;
    }

    .post-form input[type="text"],
    .post-form input[type="file"] {
      width: 100%;
      padding: 10px;
      margin-bottom: 20px;
    }

    .post-form textarea {
      width: 100%;
      padding: 10px;
      margin-bottom: 20px;
      resize: vertical;
    }

    .post-form button {
      padding: 10px 20px;
      background-color: #007bff;
      color: #fff;
      border: none;
      cursor: pointer;
    }

    .post-form button:hover {
      background-color: #0056b3;
    }

    .post-image-preview {
      max-width: 100%;
      margin-bottom: 20px;
    }
/* Basic styling for the admin page */
/* body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
} */

header {
    background-color: #333;
    color: #fff;
    padding: 15px;
}

header h1 {
    margin: 0;
}

main {
    padding: 20px;
}

.comments-section {
    border: 1px solid #ccc;
    padding: 10px;
}

.comments-list {
    list-style: none;
    padding: 0;
}

.comment-item {
    margin-bottom: 15px;
}

.comment-text {
    font-size: 16px;
}

.comment-date {
    font-size: 12px;
    color: #888;
}
/* for categoryView.php */


.category {
    border: 1px solid #ddd;
    margin: 10px;
    padding: 10px;
    display: flex;
    align-items: center;
    justify-content: space-between;
}
.category-info{
width: 100%;
}
.category-name {
    font-weight: bold;
}

.category-description {
    color: #888;
}

.delete-button {
    background-color: #ff0000;
    color: #fff;
    border: none;
    padding: 5px 10px;
    cursor: pointer;
    max-width: min-content;
}

    </style>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
</head>

<body>
    <div class="sidebar ">
        <ul>
            <li><a href="adminHomepage.php" class="active">Dashboard</a></li>
            <li>
                <div class="dropdown">
                    <button class="btn btn-dark dropdown-toggle text-dark" type="button" data-toggle="dropdown">Category
                        <span class="caret"></span></button>
                    <ul class="dropdown-menu">
                        <li><a href="category.php">Add</a></li>
                        <li><a href="categoryView.php">View</a></li>
                    </ul>
                </div>
            </li>
            <li>
                <div class="dropdown">
                    <button class="btn btn-dark dropdown-toggle" type="button" data-toggle="dropdown">Sub-Category
                        <span class="caret"></span></button>
                    <ul class="dropdown-menu">
                        <li><a href="subCategory.php">Add</a></li>
                        <li><a href="subCategoryView.php">View</a></li>
                    </ul>
                </div>
            </li>
            <!-- <li>
                <div class="dropdown">
                    <button class="btn btn-dark dropdown-toggle" type="button" data-toggle="dropdown">User
                        <span class="caret"></span></button>
                    <ul class="dropdown-menu">
                        <li><a href="user.php">Add</a></li>
                        <li><a href="user.php">View</a></li>
                    </ul>
                </div>
            </li> -->
            <li>
                <div class="dropdown">
                    <button class="btn btn-dark dropdown-toggle" type="button" data-toggle="dropdown">Posts
                        <span class="caret"></span></button>
                    <ul class="dropdown-menu">
                        <li><a href="post.php">Add</a></li>
                        <li><a href="post.php">View</a></li>
                    </ul>
                </div>
            </li>
            <li><div class="dropdown">
                    <button class="btn btn-dark dropdown-toggle" type="button" data-toggle="dropdown">Comments
                        <span class="caret"></span></button>
                    <ul class="dropdown-menu">
                        <li><a href="#">Read</a></li>
                        <li><a href="#">View</a></li>
                    </ul>
                </div></li>
        </ul>
    </div>


   