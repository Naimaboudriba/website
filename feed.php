<?php
require_once 'post.php';
// Connexion à la base de données
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$host = "localhost:3307";
$username = "root";
$password = "";
$database = "registration_db";

$conn = mysqli_connect($host, $username, $password, $database);


if ($conn->connect_error) {
    die("Erreur de connexion à la base de données : " . $conn->connect_error);
}
$sql = "INSERT INTO posts (title, content, author) VALUES ('New Post', 'This is the content of the post', 'John Doe')";

if ($conn->query($sql) === TRUE) {
    echo "New post created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
$sql = "SELECT * FROM posts";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Loop through the query results and display the post details
    while ($row = $result->fetch_assoc()) {
        $postId = $row['id'];
        $title = $row['title'];
        $content = $row['content'];
        $author = $row['author'];
        $date = $row['date'];

   
        echo "<h2>$title</h2>";
        echo "<p>$content</p>";
        echo "<p>Author: $author</p>";
        echo "<p>Date: $date</p>";
    
    }
} else {
    echo "No posts found.";
}
$conn->close();
while ($row = $result->fetch_assoc()) {
    $postId = $row['id'];
    $title = $row['title'];
    $content = $row['content'];
    $author = $row['author'];
    $date = $row['date'];

    echo "<h2>$title</h2>";
    echo "<p>$content</p>";
    echo "<p>Author: $author</p>";
    echo "<p>Date: $date</p>";

    // Like button
    echo "<button onclick=\"likePost($postId)\">Like</button>";

    // Comment button
    echo "<button onclick=\"commentPost($postId)\">Comment</button>";


}

?>  