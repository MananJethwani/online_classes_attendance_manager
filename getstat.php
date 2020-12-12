
 <?php 
//Start the session to see if the user is authenticated user. 
session_start(); 
//Check if the user is authenticated first. Or else redirect to login page 
if(isset($_SESSION['IS_AUTHENTICATED']) && $_SESSION['IS_AUTHENTICATED'] == 1){ 
// Code to be executed when 'Loan Taken' is clicked. 
if ($_POST['submit'] == 'Loan Taken') 
{ 
if($_POST['customer_name']) 
{ 
require('menu.php'); 
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
//Prepare query 
$customer_name = $_POST['customer_name']; 
$query = "SELECT CUSTOMER_NAME, borrower.LOAN_NUMBER, AMOUNT
FROM borrower, loan
WHERE borrower.LOAN_NUMBER = loan.LOAN_NUMBER
AND CUSTOMER_NAME = '$customer_name'";
//Execute query 
$result = mysqli_query($link, $query); 
echo "<center><h1>Loan Taken</h1>"; 
echo "<table border='1' cellpadding = '10'> 
<tr><th>Customer Name</th> 
<th>Loan Number</th> 
<th>Amount of Loan</th> 
</tr>"; 

while($row = mysqli_fetch_array($result)) 
 
{ 
echo "<tr><td>" . $row['CUSTOMER_NAME'] . "</td> 
<td>" . $row['LOAN_NUMBER']."</td> 
<td>" . $row['AMOUNT'] . "</td> 
</tr>"; 
echo "<br/>"; 
} 
echo "</table></center>"; 
} 
else 
{ 
include("customer_stat.php"); 
echo "<center>Enter the customer name</ center>"; 
} 
} 
 
 // Code to be executed when 'Account Balance' is clicked. 
if ($_POST['submit'] == 'Account Balance') 
{ 
if($_POST['customer_name']) 
{ 
require('menu.php'); 
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
//Prepare query 
$customer_name = $_POST['customer_name']; 
$query = "SELECT CUSTOMER_NAME,depositor.ACCOUNT_NUMBER,BALANCE
FROM depositor,account
WHERE depositor.ACCOUNT_NUMBER=account.ACCOUNT_NUMBER
AND CUSTOMER_NAME='$customer_name'";
//Execute query 
$result = mysqli_query($link, $query); 
echo "<center><h1>Account Details</h1>"; 
echo "<table border='1' cellpadding = '10'> 
<tr><th>Customer Name</th> 
<th>Account Number</th> 
<th>Balance in Account</th> 
</tr>"; 

while($row = mysqli_fetch_array($result)) 
 
{ 
echo "<tr><td>" . $row['CUSTOMER_NAME'] . "</td> 
<td>" . $row['ACCOUNT_NUMBER']."</td> 
<td>" . $row['BALANCE'] . "</td> 
</tr>"; 
echo "<br/>"; 
} 
echo "</table></center>"; 
} 
else 
{ 
include("customer_stat.php"); 
echo "<center>Enter the customer name</ center>"; 
} 
} 
 
// Code to be executed when 'Account Balance update 10%' is clicked. 
if ($_POST['submit'] == 'Update Account Balance By 10%') 
{ 
if($_POST['customer_name']) 
{ 
require('menu.php'); 
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
//Prepare query 
$customer_name = $_POST['customer_name']; 
$query = "SELECT CUSTOMER_NAME,depositor.ACCOUNT_NUMBER,BALANCE,BALANCE+0.1*BALANCE
FROM depositor,account
WHERE depositor.ACCOUNT_NUMBER=account.ACCOUNT_NUMBER
AND CUSTOMER_NAME='$customer_name'";
/*
$update = "UPDATE account SET account.BALANCE = (account.BALANCE + 0.1*account.BALANCE)
FROM depositor, account
WHERE depositor.ACCOUNT_NUMBER = account.ACCOUNT_NUMBER
AND CUSTOMER_NAME = '$customer_name'";  */

//Execute query 
$result = mysqli_query($link, $query); 
//$updt = mysqli_query($link, $update);

echo "<center><h1>Account Details</h1>"; 
echo "<table border='1' cellpadding = '10'> 
<tr><th>Customer Name</th> 
<th>Account Number</th> 
<th>Balance in Account</th> 
<th>Update Balance by 10%</th> 
</tr>"; 

while($row = mysqli_fetch_array($result)) 
 
{ 
echo "<tr><td>" . $row['CUSTOMER_NAME'] . "</td> 
<td>" . $row['ACCOUNT_NUMBER']."</td> 
<td>" . $row['BALANCE'] . "</td> 
<td>" . $row['BALANCE+0.1*BALANCE'] . "</td>
</tr>"; 
echo "<br/>"; 
} 
echo "</table></center>"; 
} 
else 
{ 
include("customer_stat.php"); 
echo "<center>Enter the customer name</ center>"; 
} 
} 
 

// Code to be executed when 'Account Balance update 10%' is clicked. 
if ($_POST['submit'] == 'Branch Name of Customer') 
{ 
if($_POST['customer_name']) 
{ 
require('menu.php'); 
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
//Prepare query 
$customer_name = $_POST['customer_name']; 
$query = "SELECT CUSTOMER_NAME,BRANCH_NAME
FROM depositor,account
WHERE depositor.ACCOUNT_NUMBER=account.ACCOUNT_NUMBER
AND CUSTOMER_NAME='$customer_name'";
//Execute query 
$result = mysqli_query($link, $query); 
echo "<center><h1>Account Details</h1>"; 
echo "<table border='1' cellpadding = '10'> 
<tr><th>Customer Name</th> 
<th>Branch Name</th> 
 
</tr>"; 

while($row = mysqli_fetch_array($result)) 
 
{ 
echo "<tr><td>" . $row['CUSTOMER_NAME'] . "</td> 
<td>" . $row['BRANCH_NAME']."</td> 


</tr>"; 
echo "<br/>"; 
} 
echo "</table></center>"; 
} 
else 
{ 
include("customer_stat.php"); 
echo "<center>Enter the customer name</ center>"; 
} 
} 
 
 


 
} 
else{ 
header('location:login_form.php'); 
exit(); 
} 
?>
