<?php
include './header.php'
?>
  <div class="container">
    <h2>Add Category</h2>
    <form action="./../backend/insert_category.php " method="post">
      <div class="form-group">
        <label for="categoryName">Category Name:</label>
        <input type="text" id="categoryName" name="categoryName" placeholder="Enter category name">
      </div>
      <div class="form-group">
        <label for="Description">Description:</label>
        <input type="text" id="description" name="description" placeholder="Enter description">
      </div>
      <div class="form-group">
        <input type="submit" value="Add Category">
      </div>
    </form>
  </div>
<?php
include './footer.php'
?>