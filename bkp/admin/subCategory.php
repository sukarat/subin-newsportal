<?php
include './header.php'
?>
<h1 class="container">Subcategory Selection Page</h1>

<div class=" container">
    <form action="../backend/insert_sub_category.php" method="post">

        <div class="form-field">
            <label for="category">Category:</label>
            <select id="category" name="category" required>
                <option value="">Select a category</option>
                <?php
                  include '../backend/fetch_categories_for_sub_categories_page.php';
                ?>
            </select>
        </div>
        <div class="form-field">
            <label for="subcategory">Subcategory:</label>
            <input type="text" id="subcategory" name="subcategory" required>
        </div>
        <div class="form-field">
            <label for="description">Description:</label>
            <textarea id="description" name="description" required></textarea>
        </div>
        <button class="submit-btn" onclick="submitForm()">Add Subcategory</button>
    </form>

</div>

<script>
    // function submitForm() {
    //   const category = document.getElementById('category').value;
    //   const subcategory = document.getElementById('subcategory').value;
    //   const description = document.getElementById('description').value;

    //   if (category === '') {
    //     alert('Please select a category.');
    //     return;
    //   }

    //   // Do something with the category, subcategory, and description, e.g., submit to server or perform any other action
    //   console.log('Category:', category);
    //   console.log('Subcategory:', subcategory);
    //   console.log('Description:', description);

    //   // Clear the form fields
    //   document.getElementById('category').value = '';
    //   document.getElementById('subcategory').value = '';
    //   document.getElementById('description').value = '';
    // }
  </script>
<?php
include './footer.php'
?>