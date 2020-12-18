<?php 
	session_start();
	$folder = 'img/';
	$file_upload = $folder . basename($_FILES['file']['name']);
	move_Uploaded_file($_FILES['file']['tmp_name'], $file_upload);
	$con = mysqli_connect('127.0.0.1', 'root','','43urok');
	$query = mysqli_query($con, "INSERT INTO works (file, description, student_id) VALUES ('{$file_upload}', '{$_POST['desc']}', '{$_SESSION['student_id']}')");
	header("Location: accountStudent.php");
 ?>