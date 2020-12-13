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
    $CourseName = $_POST["courseName"];
    $CourseId = $CourseName."@".$Email;
    $qry="INSERT INTO courses VALUES ('$Email','$CourseName','$CourseId')";
    // $result=mysqli_query($link,$qry);
    $result = 1;
    if($result == 1) {
        echo $_FILES[$_POST["formFile"]];
    } else {
        include('courseReg.php');
        echo '<center> Invalid Info !!!<center>'; 
    }
?>