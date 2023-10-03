<?php
include './header.php'
?>
  <div class="post-form">
    <h2>Add a New Post</h2>
    <form id="postForm" action="../backend/add_post.php" method="post" enctype="multipart/form-data">
      <label for="postTitle">Title</label>
      <input type="text" id="postTitle" name="post_title" >

      <label for="postContent">Content</label>
      <textarea id="postContent" rows="5" name="post_content" ></textarea>
      <div class="form-field">
            <label for="category">Category:</label>
            <select id="category" name="category" >
                <option value="">Select a category</option>
                <?php
                  include '../backend/fetch_categories_for_sub_categories_page.php';
        // include './../backend/fetch_categories_for_sub_categories_page.php';
                ?>
                <!-- <option value="Category 1">Category 1</option>
        <option value="Category 2">Category 2</option>
        <option value="Category 3">Category 3</option> -->
                <!-- Add more categories here -->
            </select>
        </div>
        <div class="form-field">
            <label for="sub_category">Sub Category:</label>
            <select id="sub_category" name="sub_category" >
                <option value="">Select a sub category</option>
                <?php
                  include '../backend/fetch_subcategories_for_post.php';
        // include './../backend/fetch_categories_for_sub_categories_page.php';
                ?>
                <!-- <option value="Category 1">Category 1</option>
        <option value="Category 2">Category 2</option>
        <option value="Category 3">Category 3</option> -->
                <!-- Add more categories here -->
            </select>
        </div>

      <label for="postImage">Upload Photo</label>
      <input type="file" id="post_image"  name="post_image" required>

      
      <button type="submit">Add Post</button>
    </form>

    <div class="post-image-preview" id="imagePreview"></div>
  </div>
<!-- 
  <script>
    const postForm = document.getElementById('postForm');
    const postImage = document.getElementById('postImage');
    const imagePreview = document.getElementById('imagePreview');

    postForm.addEventListener('submit', function (event) {
      event.preventDefault();

      const title = document.getElementById('postTitle').value;
      const content = document.getElementById('postContent').value;

      // Here you can handle the form submission, e.g., send the data to a server using AJAX or perform other actions.

      // For the purpose of this example, we'll just log the data to the console.
      console.log('Title:', title);
      console.log('Content:', content);
    });

    postImage.addEventListener('change', function (event) {
      const file = event.target.files[0];

      if (file) {
        const reader = new FileReader();

        reader.onload = function () {
          const imageElement = document.createElement('img');
          imageElement.src = reader.result;
          imageElement.alt = 'Post Image';
          imageElement.classList.add('post-image-preview');
          imagePreview.innerHTML = '';
          imagePreview.appendChild(imageElement);
        };

        reader.readAsDataURL(file);
      }
    });
  </script> -->
<?php
include './footer.php'
?>