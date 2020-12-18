<?php 
 	session_start();
 	$con = mysqli_connect('127.0.0.1', 'root','','43urok');
	$query = mysqli_query($con, "SELECT * FROM students WHERE phone='{$_POST['phone']}' AND password='{$_POST['password']}'");
	$result = $query->fetch_assoc();
	$_SESSION['student_id'] = $result['id'];
	if (mysqli_num_rows($query)>0) {
		header("Location: accountStudent.php");
	}else{
		header('Location: loginStudent.php');
	}
  ?>