<?php
session_start();

require_once('includes/connection.php');
// Function to calculate Jaccard similarity between two sets
function jaccardSimilarity($set1, $set2)
{
    $intersection = array_intersect($set1, $set2);
    $union = array_merge($set1, $set2);
    $similarity = count($intersection) / count($union);
    return $similarity;
}
function getUserPreferences($userId, $conn){

    $sql = "SELECT preferences FROM tbluser WHERE id = '$userId'";
    $result = $conn->query($sql);
    if ($result->num_rows === 1) {
        $row = mysqli_fetch_assoc($result);
        return $row['preferences'];
    }
}
// Function to get recommended articles for a user
function getRecommendedArticles($userId, $conn)
{
    // Fetch user preferences from the database
    $userPreferences = explode(',', getUserPreferences($userId, $conn));

    // Fetch all articles from the database
    $articles = getAllArticles();

    // Calculate similarity scores for each article
    $articleScores = [];
    foreach ($articles as $article) {
        $articlePreferences = explode(',', $article['category']);
        $similarity = jaccardSimilarity($userPreferences, $articlePreferences);
        $articleScores[$article['id']] = $similarity;
    }

    // Sort articles by similarity score in descending order
    arsort($articleScores);

    // Return the top N recommended articles
    $recommendedArticles = array_slice(array_keys($articleScores), 0, 5);

    return $recommendedArticles;
}
// Fetch recommended articles for the logged-in user
$userId = $_SESSION['id'];
$recommendedArticles = getRecommendedArticles($userId, $conn);

// Display recommended articles
foreach ($recommendedArticles as $articleId) {
    $article = getArticleById($articleId);
    echo '<h2>' . $article['title'] . '</h2>';
    echo '<p>' . $article['content'] . '</p>';
}





die();
?>





<?php
include('includes/header.php');
require_once('includes/connection.php');
/**
 * Checks if the session contains username and if not then the user is not logged In
 * So send user to login page
 */
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>
<div class="row">
    <h2>Select Category from the Dropdown as your pereference in order:</h2>
    <form class="form-signin" method="post" id="register-form" action="action.php">
        <div class="form-group">
            <select id="categories" name="categories[]" multiple>
                <option value="php">PHP</option>
                <option value="python">Python</option>
                <option value="javascript">JavaScript</option>
                <option value="java">Java</option>
                <option value="c">C</option>
                <option value="sql">SQL</option>
                <option value="ruby">Ruby</option>
                <option value=".net">.Net</option>
            </select>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-default" name="btn-save" id="btn-submit">Submit</button>
        </div>
    </form>
</div>
<?php
include('includes/footer.php');
?>