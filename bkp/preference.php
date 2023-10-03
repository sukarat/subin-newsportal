<!DOCTYPE html>
<html>
<head>
    <title>News Article Input</title>
</head>
<body>
    <h2>Enter News Articles and Priorities</h2>
    <form action="process_articles.php" method="post">
        <table>
            <tr>
                <th>Category</th>
                <th>Priority</th>
                <th>Article Content</th>
            </tr>
            <tr>
                <td>
                    
                    <select name="category" required>
                        <option value="">Select a category</option>
                        <?php
                  include './fetch_categories_for_sub_categories_page.php';
                ?>
                    </select>
                </td>
                <td><input value="" min="1" max="3" type="number" id="firstPriority" name="priority[]" required></td>
            </tr>
            <tr>
                <td>
                    
                    <select name="category" required>
                        <option value="">Select a category</option>
                        <?php
                  include './fetch_categories_for_sub_categories_page.php';
                ?>
                    </select>
                </td>
                <td><input value="" min="1" max="3" type="number" name="priority[]" id="secondPriority"  required></td>
            </tr>
            <tr>
                <td>
                    
                    <select name="category" required>
                        <option value="">Select a category</option>
                        <?php
                  include './fetch_categories_for_sub_categories_page.php';
                ?>
                    </select>
                </td>
                <td><input value="" min="1" max="3" type="number" id="thirdPriority" name="priority[]" onchange="checkPriority();" required></td>
            </tr>
            <tr>
            </tr>
        </table>
        <br>
        <input type="submit" value="Submit" >
    </form>

<script>
    var first = document.getElementById("firstPriority");
    var second = document.getElementById("secondPriority");
    var third = document.getElementById("thirdPriority");
    second.addEventListener("keyup",(e)=>{
        var firstval = first.value;
        var secondval =second.value;
        var thirdval = third.value;
        if((firstval==secondval)){
        alert("priority for 0different categories cannot be same");
       } 
    })
    third.addEventListener("keyup",(e)=>{
        var firstval = first.value;
        var secondval =second.value;
        var thirdval = third.value;
        if((firstval==secondval) || (secondval == thirdval) ){
        alert("priority for different categories cannot be same");
       } 
    })

</script>
</body>
</html>
