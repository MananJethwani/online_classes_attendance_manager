<!DOCTYPE html>
<html>
<head>
	<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<title>Login page</title>
	<!-- <link rel="stylesheet" type="text/css" href="style.css"> -->
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
			text-align: center;
			max-width: 300px;
			height:	270px;
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
			<a class="btn btn-primary" href="register.php" role="button" style="position:relative; left:540px; color:white; background:#FE20CE; border-color:#FE20CE; border-radius:15px;margin-right:0px;">Sign Up</a>
			<a class="btn btn-primary" href="loginForm.php" role="button" style="color:white; background:#FE20CE; border-color:#FE20CE; border-radius:15px; width:70px; margin-right:40px;">Login</a>
  		</div>
	</nav>
		

	<aside id="profile">
		<form method="post" action="index.php">
			<h3 style="font-weight:bold">LOGIN</h3><br>
			<div class="input-group">
            	<label for="Email" class="sr-only">Email address</label>
            	<input name="Email" type="email" id="Email" class="form-control" placeholder="Email address" required autofocus>
			</div><br>
			<div class="input-group">
            	<label for="Password" class="sr-only">Password</label>
            	<input name="Password" type="password" id="Password" class="form-control" placeholder="Password" required>
			</div><br>
			<div class="input-group">
				<button type="submit" name="submit" value="Login" class="btn" style="color: white; background: #FE20CE; margin-left:100px;">  Login  </button>
			</div><br>
		</form>
	</aside>
</body>
</html>