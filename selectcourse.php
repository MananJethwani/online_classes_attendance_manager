<!doctype html>
<html lang="en">
  <head>
	<?php
		if (!isset($_SESSION)) {
			session_start();
		}
		$link = mysqli_connect('localhost', 'root', ''); 
		if(!$link) {
			die('Failed to connect to server: ' . mysqli_error()); 
		}
		$db = mysqli_select_db($link,'PROJECT'); 
		if(!$db) { 
			die("Unable to select database");
		}
		$Email = $_SESSION["Email"];
		$qry="SELECT * FROM users WHERE Email='$Email' AND UserType='teacher'";
		$result=mysqli_query($link,$qry);
		if (mysqli_num_rows ( $result ) == 0) {
			
			header("location: main_page.php");
		}
	?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>ATTENDANCE-VIEW</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <style>
		body {
			background-image: url("background.jpg");
			background-repeat: no-repeat;
			background-size:cover;
			background-position:center;
			height: 700px;
		}
		button .btn{
			padding: 10px;
			margin: 10px auto;
			font-size: 15px;
			border: none;
			border-radius: 5px;
			background-color: #5CDB95;
		}
		aside{
			margin: 10px;
			position:relative;
			top:50px;
			left:50px;
		}

		#profile{
			float:top;
			font-family: sans-serif;
			/* text-align: center; */
			max-width: 325px;
			height:	300px;
			box-shadow: 10px 10px 0px #FE20CE;
			margin-left: 50px;
			margin-top:50px;
			padding: 15px;
			background: #14367D;
			color:white;
			border-radius:40px;
        }
	</style>
  </head>
  <body>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
	<nav class="navbar" style="background: rgb(2,0,36);background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(8,40,93,1) 0%, rgba(44,161,185,1) 100%);">
  		<div class="container-fluid">
    		<a class="navbar-brand" style="position:relative; left:100px; color:white; ">Your Manager</a>
			<a class="btn btn-primary" href="logOut.php" role="button" style="position:relative; left:1250px;top:5px; color:white; background:#FE20CE; border-color:#FE20CE; border-radius:15px;margin-right:0px;">Log Out</a>
  		</div>
	</nav>
    
    <aside id="profile">
      <form method="post" action="attendanceView.php">
			<h3 style="font-weight:bold; text-align:center;"> VIEW-ATTENDANCE</h3><br><br>
			<div class="input-group">
        <label for="courseName" class="sr-only">Password</label>
        <input name="courseName" type="text" id="courseName" class="form-control" placeholder="Course Name" required style="width:293px;">
			</div><br><br>
      <div class="input-group">
				<button type="submit" name="submit" value="Login" class="btn" style="color: white; background: #FE20CE; margin-left:100px;">  SHOW </button>
			</div><br>
		</form>
	</aside>
  </body>
</html>
