<?php
session_set_cookie_params(7 * 24 * 60 * 60); // 1 week in seconds

session_start();

// Check if the login session is set
if(isset($_SESSION['login_id'])) {
    require_once 'db_connect.php';
    // Retrieve user details from the database
    $user_qry = $conn->query("SELECT * FROM users WHERE `id` = '".$_SESSION['login_id']."' ") or die(mysqli_error($conn));
    $user = $user_qry->fetch_array();
    $user_name = $user['firstname']." ".$user['lastname'];
}
// If login session is not set, check for the login cookie
elseif (isset($_COOKIE['logged_in'])) {
    require_once 'db_connect.php';
    // Retrieve user details from the database using the stored cookie information
    $user_qry = $conn->query("SELECT * FROM users WHERE `id` = '".$_COOKIE['login_id']."' ") or die(mysqli_error($conn));
    $user = $user_qry->fetch_array();
    $user_name = $user['firstname']." ".$user['lastname'];
}
// Redirect to login page if neither session nor login cookie is set
else {
    header('location: index.php');
}
?>