<?php 
include './header.php'
?>
    <div class="container">
        <h1>Add User</h1>
        <form id="userForm">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone:</label>
                <input type="tel" id="phone" required>
            </div>
            <button type="submit">Add User</button>
        </form>
    </div>
    <script src="script.js"></script>
<?php
include './footer.php'
?>