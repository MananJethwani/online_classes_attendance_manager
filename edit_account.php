<?php
//Start the session to see if the user is authenticated user. 
session_start(); 
//Check if the user is authenticated first. Or else redirect to login page 
if(isset($_SESSION['IS_AUTHENTICATED']) && $_SESSION['IS_AUTHENTICATED'] == 1){ 
require('menu.php'); 
// Code to be executed when 'Insert' is clicked. 
if ($_POST['submit'] == 'Insert'){
//validation flag to check that all validations are done 
$validationFlag = true; 
//Check all the required fields are filled 
if(!($_POST['Account_Number']))
{ 
echo 'All the fields marked as * are compulsary.<br>'; 
$validationFlag = false; 
} 

else{ 
$account_number = $_POST['Account_Number']; 
$branch_name = $_POST['Branch_Name']; 
$balance = $_POST['Balance']; 
$account_date = $_POST['Ac_date']; 
}


//If all validations are correct, connect to MySQL and execute the query 
if($validationFlag){ 
//Connect to mysql server 
$link = mysqli_connect('localhost', 'root', ''); 
//Check link to the mysql server 
if(!$link){ 
die('Failed to connect to server: ' . mysqli_error($link)); 
} 
//Select database 
$db = mysqli_select_db($link, 'lab_2'); 
if(!$db){ 
die("Unable to select database"); 
} 
//Create Insert query 
$query = "INSERT INTO account (ACCOUNT_NUMBER,BRANCH_NAME ,BALANCE,DATE) VALUES ($account_number,'$branch_name',$balance,'$account_date')"; 
//Execute query 
$results = mysqli_query($link, $query); 
 
//Check if query executes successfully 
if($results == FALSE) 
echo mysqli_error($link) . '<br>'; 
else 
echo 'Data inserted successfully! '; 
} 
} 
 
// Code to be executed when 'Update' is clicked. 
if ($_POST['submit'] == 'Update'){ 
if(!$_POST['Account_Number']) 
echo 'Enter the name of the Account Number as it is the primary key.'; 
else{ 
$validationFlag = true;

$account_number = $_POST['Account_Number'];
$balance = $_POST['Balance']; 
$branch_name = $_POST['Branch_Name']; 

 
//$update = "UPDATE customer SET customer_name = '$customer_name'"; 

if($_POST['Balance']){ 
$update = "UPDATE account SET Balance = $balance WHERE Account_Number = '$account_number'"; 
} 
if($_POST['Branch_Name']){ 
$update = "UPDATE account SET Branch_Name = '$branch_name' WHERE Account_Number = '$account_number'"; 
} 

//If all validations are correct, connect to MySQL and execute the query 
if($validationFlag){ 
//Connect to mysql server 
$link = mysqli_connect('localhost', 'root', ''); 
//Check link to the mysql server 
if(!$link){ 
die('Failed to connect to server: ' . mysqli_error($link)); 
} 
//Select database 
$db = mysqli_select_db($link, 'lab_2'); 
if(!$db){ 
die("Unable to select database"); 
} 
//Execute query 
$results = mysqli_query($link, $update); 
if($results == FALSE) 
echo mysqli_error($link) . '<br>'; 
else 
echo mysqli_info($link); 
} 
} 
} 
// Code to be executed when 'Delete' is clicked. 
if ($_POST['submit'] == 'Delete'){ 
if(!$_POST['Account_Number']) 
echo 'Enter the name of the customer as it is the primary key.'; 
else{ 

$account_number = $_POST['Account_Number']; 


$delete = "DELETE FROM account WHERE ACCOUNT_NUMBER = '$account_number'"; 
//Connect to mysql server 
$link = mysqli_connect('localhost', 'root', ''); 
//Check link to the mysql server 
if(!$link){ 
die('Failed to connect to server: ' . mysqli_error($link)); 
} 
//Select database 
$db = mysqli_select_db($link, 'lab_2'); 
if(!$db){ 
die("Unable to select database"); 
} 
//Execute query 
$results = mysqli_query($link, $delete); 
if($results == FALSE) 
echo mysqli_error($link) . '<br>'; 
else 
echo 'Data deleted successfully'; 
} 
} 
} 
else{ 
header('location:login_form.php'); 
exit(); 
} 
?>
