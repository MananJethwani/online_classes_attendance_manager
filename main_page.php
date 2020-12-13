<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <nav class="navbar" style="background: rgb(2,0,36);background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(8,40,93,1) 0%, rgba(44,161,185,1) 100%);">
  		<div class="container-fluid">
    		<a class="navbar-brand" style="position:relative; left:100px; color:white; ">Your Manager</a>
			<a class="btn btn-primary" href="logOut.php" role="button" style="position:relative; left:1250px;top:5px; color:white; background:#FE20CE; border-color:#FE20CE; border-radius:15px;margin-right:0px;">Log Out</a>
  		</div>
	</nav>
    <div class="b1">
    <?php
        if (!isset($_SESSION)) {
            session_start();
        }
        if ($_SESSION['IS_AUTHENTICATED'] == 1) {
            if ($_SESSION['userType'] == 'teacher') {
                echo '<div  style="position: relative;color:white;font-size: 25px;top: 80px;left:100px;letter-spacing: 0.5px;"><a style="color:white;font-size:25px;" href="courseReg.php"> Create course </a></div>';
                echo '<div  style="position: relative;color:white;font-size: 25px;top: 140px;left:100px;letter-spacing: 0.5px;"><a style="color:white;font-size:25px;" href="updateAttendance.php"> Update course Attendance</a></div>';
                echo '<div  style="position: relative;color:white;font-size: 25px;top: 210px;left:100px;letter-spacing: 0.5px;"><a style="color:white;font-size:25px;" href="selectcourse.php"> View Course Attendance </a></div>';
                echo '<div  style="position: relative;color:white;font-size: 25px;top: 280px;left:100px;letter-spacing: 0.5px;"><a style="color:white;font-size:25px;" href="myCourse.php"> View My Courses </a></div>';
            } else {
                $link = mysqli_connect('localhost', 'root', ''); 
                if(!$link) { 
                    die('Failed to connect to server: ' . mysqli_error()); 
                } 
                $db = mysqli_select_db($link,'PROJECT'); 
                if(!$db) { 
                    die("Unable to select database"); 
                }
                $Email = $_SESSION['Email'];
                $qry = "SELECT * FROM attendance WHERE studentEmail = '$Email'";
                $result = mysqli_query($link,$qry);
                echo '  <h1 class="txt2"> Attendance </h1>
                        <table class="t1">
                        <tr>
                            <th class="txt">Course Name</th>
                            <th class="txt">present</th>
                            <th class="txt">total classes</th>
                        </tr>';
                if ($result && mysqli_num_rows($result) > 0) {
                    // output data of each row
                    while($row = mysqli_fetch_assoc($result)) {
                    $Cname=explode("@",$row["courseId"])[0];
                    $present = $row["classAttended"];
                    $total = $row["totalClasses"];
                    echo '<tr><th class="txt">'.$Cname.'</th> <th class="txt">'.$present.'</th> <th class="txt">'.$total.'</th> <tr>';
                    }
                }
                echo '</table>';
            }
        }
        else {
            header("location: loginForm.php");
        }
    ?>
    </div>
</body>
</html>