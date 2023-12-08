<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$host = "localhost:3307";
$username = "root";
$password = "";
$database = "registration_db";


if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


if (isset($_POST['username']) && isset($_POST['password'])) {
    $login_username = $_POST['username'];
    $login_password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $login_username);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);

    if ($row && password_verify($login_password, $row['password'])) {
        echo "login succesfull.";
        header("Location: index2.html");
exit;
    
    } else {
        echo "Invalid username or password.";
    }


    mysqli_stmt_close($stmt);
} else {
    echo "Error: Form data not received.";
}


mysqli_close($conn);
?>
