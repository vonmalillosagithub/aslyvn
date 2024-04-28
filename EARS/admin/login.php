<?php
	require_once 'db_connect.php';
	extract($_POST);
	$qry = $conn->query("SELECT * FROM users WHERE username = '$username' AND password = '$password'") or die(mysqli_error($conn));
	$login = $qry->fetch_array();

	if($qry->num_rows > 0){
		session_start();
		foreach($login as $k => $v){
			if(!is_numeric($k) && $k !== 'password') {
				if($k !== 'department') {
					$_SESSION['login_'.$k] = $v;
				}
			}
		}
		// Set a cookie with user id
		setcookie('login_id', $_SESSION['login_id'], time() + (7 * 24 * 60 * 60), '/');
		echo true;
	}

	$conn->close();
?>
