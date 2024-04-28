<?php
session_start();


if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $username = $_POST['username'];
    $password = $_POST['password'];

    require_once 'db_connection.php'; 

   
    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
      
        $_SESSION['username'] = $username;
        header("Location: users.php");
        exit();
    } else {
        
        $error = "Invalid username or password";
    }
}
?>
