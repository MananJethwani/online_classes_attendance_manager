<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
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
</head>
<body>
    <nav class="navbar" style="background: rgb(2,0,36);background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(8,40,93,1) 0%, rgba(44,161,185,1) 100%);">
  		<div class="container-fluid">
    		<a class="navbar-brand" style="position:relative; left:100px; color:white; ">Your Manager</a>
			<a class="btn btn-primary" href="logOut.php" role="button" style="position:relative; left:1250px;top:5px; color:white; background:#FE20CE; border-color:#FE20CE; border-radius:15px;margin-right:0px;">Log Out</a>
  		</div>
	</nav>
    <div class = "b1">
    <?php
        if(!isset($_SESSION)) {
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
        $qry = "SELECT * FROM courses WHERE teacherEmail = '$Email'";
        $result=mysqli_query($link,$qry);
        echo '  <h1 class="txt2"> Attendance </h1>
                        <table class="t1">
                        <tr>
                            <th class="txt">Course Name</th>
                            <th class="txt">total Students</th>
                            <th class="txt">total classes</th>
                </tr>';
        while ($row = $result->fetch_assoc()) {
            $field1name = $row["courseName"];
            $courseId = $field1name."@".$Email;
            $qry = "SELECT * FROM attendance WHERE courseId='$courseId'";
            $res = mysqli_query($link,$qry);
            $field2name = mysqli_num_rows ( $res );
            $field3name = $res->fetch_assoc()["totalClasses"];
            echo '<tr><th class="txt">'.$field1name.'</th> <th class="txt">'.$field2name.'</th> <th class="txt">'.$field3name.'</th> <tr>';
        }
        echo '</table>';
    ?>
    </div>
</body>
</html>
