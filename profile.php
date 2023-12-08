<?php
$host = "localhost:3307";
$username = "root";
$password = "";
$database = "form";

$conn = mysqli_connect($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$userId = $_GET['userId'];
// Fetch user profile
$sqlProfile = "SELECT * FROM users WHERE id = $userId";
$resultProfile = $conn->query($sqlProfile);
$profile = $resultProfile->fetch_assoc();

// Fetch user's posts
$sqlPosts = "SELECT * FROM posts WHERE author_id = $userId";
$resultPosts = $conn->query($sqlPosts);

// Fetch user's likes
$sqlLikes = "SELECT COUNT(*) AS like_count FROM likes WHERE user_id = $userId";
$resultLikes = $conn->query($sqlLikes);
$likes = $resultLikes->fetch_assoc()['like_count'];

// Fetch user's comments
$sqlComments = "SELECT COUNT(*) AS comment_count FROM comments WHERE user_id = $userId";
$resultComments = $conn->query($sqlComments);
$comments = $resultComments->fetch_assoc()['comment_count'];
// Display user profile
echo "<h2>User Profile</h2>";
echo "<p>Name: " . $profile['name'] . "</p>";
echo "<p>Email: " . $profile['email'] . "</p>";

// Display user's posts
echo "<h2>Posts</h2>";
while ($row = $resultPosts->fetch_assoc()) {
    echo "<h3>" . $row['title'] . "</h3>";
    echo "<p>" . $row['content'] . "</p>";
}

// Display like and comment counts
echo "<h2>Likes and Comments</h2>";
echo "<p>Likes: " . $likes . "</p>";
echo "<p>Comments: " . $comments . "</p>";
$conn->close();
?>
