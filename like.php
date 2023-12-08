<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$host = "localhost:3307";
$username = "root";
$password = "";
$database = "feed";

$conn = mysqli_connect($host, $username, $password, $database);


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  
    $postId = $_POST['postId'];

}
?>
