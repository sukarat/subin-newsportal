<?php
// Function to get user preferences from the database
function getUserPreferences($userId, $conn)
{
    $query = "SELECT preferences FROM tbluser WHERE id = $userId";
    $result = $conn->query($query);

    if ($result && $row = $result->fetch_assoc()) {
        return $row['preferences'];
    } else {
        return "";
    }
}

// Function to get all articles from the database
function getAllArticles($conn)
{
    /* $query = "SELECT id, PostTitle, PostDetails, CategoryId FROM tblposts"; */
    $query = "select tblposts.id as id,tblposts.PostTitle as title,tblcategory.CategoryName as category from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId";
    $result = $conn->query($query);

    $articles = [];
    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $articles[] = $row;
        }
    }

    return $articles;
}

// Function to get an article by ID from the database
function getArticleById($articleId, $conn)
{
    $query = "SELECT id, PostTitle, PostDetails FROM tblposts WHERE id = $articleId";
    $result = $conn->query($query);

    if ($result && $row = $result->fetch_assoc()) {
        return $row;
    } else {
        return null;
    }
}

// Function to calculate Jaccard similarity between two sets
function jaccardSimilarity($set1, $set2)
{
    $intersection = array_intersect($set1, $set2);
    $union = array_merge($set1, $set2);
    $similarity = count($intersection) / count($union);
    return $similarity;
}

// Function to get recommended articles for a user
function getRecommendedArticles($userId, $conn)
{
    // Fetch user preferences from the database
    $userPreferences = explode(',', getUserPreferences($userId, $conn));

    // Fetch all articles from the database
    $articles = getAllArticles($conn);

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
    $article = getArticleById($articleId, $conn);
    echo '<li><a href="/single.php?id=' . $articleId . '">' . $article['PostTitle'] . '</a></li>';
}

// Close the conn connection
$conn->close();

?>