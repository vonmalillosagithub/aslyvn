<?php
	include 'db_connect.php';
	extract($_POST);
	$data=array();
	$get=$conn->query("SELECT * FROM `users` WHERE id=$id") or die(mysqli_error($conn));
	
	if($get->num_rows > 0 ){
		$row = $get->fetch_assoc();
	
		unset($row['department']);
		$data = $row;
	}		
	echo json_encode($data);
	$conn->close();
?>
