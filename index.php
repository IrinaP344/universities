
<!DOCTYPE html>
<html>
<head>
	<title>Проект</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>
	<?php 
	$con = mysqli_connect('127.0.0.1', 'root','','43urok');
 ?>
	
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
	 <a class="navbar-brand" href="index.php">Поступай легко!</a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>
	  <div class="collapse navbar-collapse" id="navbarNav">
	    <ul class="navbar-nav">
	      <li class="nav-item ml-3">
	         <a href="accountStudent.php">Аккаунт студента</a>
	      </li>
	      
	    </ul>
	  </div>
	</nav>
	<div class="col-10 mx-auto">
		<div class="row">	
			
			<!--карточка одного университета-->
			<?php 
				$query = mysqli_query($con, "SELECT * FROM universities");
				for($i=0;$i<mysqli_num_rows($query);$i++){
					$stroka1 = $query->fetch_assoc();
			 ?>
					<div class="col-3">
						<form action="check.php" method="GET">
							<img class="w-100" src=<?php echo $stroka1['photo']?> >
							<h3><?php echo $stroka1['name'] ?></h3>
							<p><?php echo $stroka1['description'] ?></p>
							<input type="" style="display: none;" name="id" value='<?php echo $stroka1["id"] ?>'>
							<button class="btn btn-primary">Подать заявку</button>
						</form>
					</div>
			<?php } ?>
	
		</div>
	</div>
</body>
</html>