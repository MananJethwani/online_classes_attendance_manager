<html>
<head>
<link rel="stylesheet" href="styles.css">
</head>
<?php 
if ($_POST['submit'] == 'Login') { 
$Email = $_POST['Email']; 
$Password = $_POST['Password']; 
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
    $qry="SELECT * FROM users WHERE Email = '$Email' AND Password = '$Password'";
    $result=mysqli_query($link,$qry);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $count = 1;
    }
    else{ 
        include('loginForm.php'); 
        echo '<center>Incorrect Username or Password !!!<center>'; 
        exit(); 
    }
    if( $count == 1){ 
        session_start();
        $_SESSION['IS_AUTHENTICATED'] = 1;
        $_SESSION['Email'] = $Email;
        $_SESSION['userType'] = $row['UserType'];
        echo session_id(); 
        header('location:main_page.php');
    } 
    else{
    echo '<center>Incorrect Username or Password !!!<center>'; 
    exit(); 
    } 
}
else{
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