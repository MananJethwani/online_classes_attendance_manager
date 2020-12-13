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
    $myfile = fopen($_FILES['zoomFile']['tmp_name'], "r") or die("Unable to open file!");
    while(!feof($myfile)) { 
        $vari = fgets($myfile);
        $toRemove = 0;
        for($i = strlen($vari) - 1; $i >= 0; $i--){
            if($vari[$i] == ':'){
                $toRemove = $i + 2;
                break;
            }
        }
        if(feof($myfile)) {
            $vari = substr($vari, $toRemove);
        }else{
            $vari = substr($vari, $toRemove, -1);
        }
        $vari = substr($vari, 0, strlen($vari)-1);
        $vari = $vari.'@iiitdmj.ac.in';
        $qry = "SELECT * FROM attendance WHERE studentEmail = '$vari ';";
        echo $qry;
        if($result = mysqli_query($link,$qry)) {
            echo 'Found '.$vari.'<br>';
            $CourseId = $_POST["courseName"]."@".$_SESSION["Email"];
            $qry = "UPDATE attendance SET classAttended=classAttended+1 WHERE studentEmail='$vari' AND courseId='$CourseId'";
            if($result = mysqli_query($link,$qry)) {
                echo "Updated ".$vari."<br>";
            }
        }
    }
    fclose($myfile);   
    $Email = $_SESSION["Email"];
    $CourseName = $_POST["courseName"];
    $CourseId = $CourseName."@".$Email;
    $qry="UPDATE attendance SET totalClasses=totalClasses+1 WHERE courseId='$CourseId'";
    $result=mysqli_query($link,$qry);
    if($result == 1){
       header("location: main_page.php");
    }
?>