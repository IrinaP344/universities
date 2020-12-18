<?php 
	session_start();
	$con = mysqli_connect('127.0.0.1', 'root','','43urok');
	$query = mysqli_query($con, "INSERT INTO applications (student_id, university_id) VALUES ('{$_SESSION['student_id']}', '{$_GET['id']}')");
	header("Location: index.php");
 ?>

 