<html>
<head>
<link rel="stylesheet" href="styles.css">
</head>
<?php 
if ($_POST['submit'] == 'Login'){ 
$Email = $_POST['Email'];
$Password = $_POST['Password'];
$UserType = $_POST['userType'];
if($Email && $Password){
    $count = 0;
    $link = mysqli_connect('localhost', 'root', ''); 
    if(!$link) {
        die('Failed to connect to server: ' . mysqli_error()); 
    }
    $db = mysqli_select_db($link,'PROJECT'); 
    if(!$db) { 
        die("Unable to select database");
    }
    $qry="INSERT INTO users VALUES('$Email','$Password','$UserType')";
    
    $result=mysqli_query($link,$qry);
    if($result == 1){
        $count = 1;
    }
    else{ 
        include('register.php'); 
        echo '<center>Incorrect Username or Password !!!<center>'; 
    exit();
    }
    if( $count == 1){
        session_start();
        $_SESSION['IS_AUTHENTICATED'] = 1; 
        $_SESSION['Email'] = $Email;
        $_SESSION['userType'] = $UserType; 
        header('location:main_page.php');
    } 
    else{  
    include('register.php');
    echo '<center>Incorrect Username or Password !!!<center>'; 
    exit();
    }
} 
else{ 
    include('register.php'); 
    echo '<center>Username or Password missing!!</center>'; 
    exit(); 
}
}
else{
header("location: loginForm.php");
exit(); 
}
?>
</html>