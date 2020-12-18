<?php 
	session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Профиль поступающего</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>
	<?php 
		$con = mysqli_connect('127.0.0.1', 'root','','43urok');
		$query = mysqli_query($con, "SELECT * FROM students");
		if($_SESSION['student_id'] == null){
	 ?>
	<!--если студент НЕ авторизовался, то показывается эта часть, в том числе ссылка на страницу  логина-->
	<div class="col-10 mx-auto">
		<h3>Войдите как абитуриент</h3>
		<p>Вы не авторизованы</p>
		<a href="loginStudent.php">Авторизация абитуриента</a>
	</div>
	<?php }else{ ?>
	<!--если студент авторизовался, то показываются nav (меню) и контент всего сайта-->
	<?php 
		$stroka = $query->fetch_assoc();
	 ?>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
	  <a class="navbar-brand" href="#">Привет, <?php echo $stroka['fio'] ?></a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>
	  <div class="collapse navbar-collapse" id="navbarNav">
	    <ul class="navbar-nav">
	      <li class="nav-item">
	        <a href="signOutStudent.php" class="nav-link text-danger">Выйти</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="index.php">Главная</a>
	      </li>
	      
	    </ul>
	  </div>
	</nav>
	<div class="col-10 mx-auto mt-5">
		<div class="row">
			<div class="col-3 border py-3 rounded">
				<h5>Добавить работу</h5>
				<form action="updatefile.php" method="POST" enctype="multipart/form-data">
					<input class="mt-3 form-control" type="" placeholder="Описание" name="desc">
					<input placeholder="Выбрать файл" class="mt-3" type="file" name="file">
					<button class="btn btn-success mt-3">Загрузить работу в портфолио</button>
				</form>
			</div>
			
			<!--Вывод работ-->
			<?php 
				$query2 = mysqli_query($con, "SELECT * FROM works");
				for($i=0;$i<mysqli_num_rows($query2);$i++){
					$stroka1 = $query2->fetch_assoc();
			 ?>
			<div class="col-3">
				<img class="w-100" src=<?php echo $stroka1['file'] ?>>
				<p><?php echo $stroka1['description'] ?></p>
			</div>	
			<?php } ?>
		</div>
		<div class=" mt-5">
			<?php 
				$query3 = mysqli_query($con, "SELECT * FROM universities INNER JOIN applications ON applications.university_id = universities.id WHERE applications.student_id = '{$_SESSION['student_id']}'");
				$stroka2 = $query3->fetch_assoc();
			?>
			<h3>Мои заявки в университеты</h3>	
			<?php  
				for($i=0;$i<mysqli_num_rows($query3);$i++){
					$stroka2 = $query3->fetch_assoc();
			 ?>
				<p class="fw-bolder"><?php echo $stroka2['name'] ?></p>
			<?php } ?>
		</div>
	</div>

<?php } ?>
</body>
</html>
