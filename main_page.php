<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
    <?php
        if (!isset($_SESSION)) {
            session_start();
        }
        if ($_SESSION['IS_AUTHENTICATED'] == 1) {
            if ($_SESSION['userType'] == 'teacher') {
                $link = mysqli_connect('localhost', 'root', ''); 
                if(!$link) { 
                    die('Failed to connect to server: ' . mysqli_error()); 
                } 
                $db = mysqli_select_db($link,'PROJECT'); 
                if(!$db) { 
                    die("Unable to select database"); 
                }
                $qry = "SELECT * FROM courses WHERE teacherEmail =".$_SESSION['Email'];
                $result = mysqli_query($link,$qry);
                if ($result && mysqli_num_rows($result) > 0) {
                    // output data of each row
                    while($row = mysqli_fetch_assoc($result)) {
                      echo $row["teacheEmail"]."- Course ".$row["courseName"]."<br>";
                    }
                }
                echo '<form method="get" action="courseReg.php"> <button type="submit"> create New Course </button> </form>';
            } else {
                // student data
            }
        }
        else {
            header("location: loginForm.php");
        }
    ?>
</body>
</html>