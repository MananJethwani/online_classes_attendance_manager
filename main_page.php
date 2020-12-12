

<?php 
//Start the session to see if the user is authencticated user. 
session_start(); 
//Check if the session variable for user authentication is set, if not redirect to login page. 
if(isset($_SESSION['IS_AUTHENTICATED']) && $_SESSION['IS_AUTHENTICATED'] == 1){ 
//include the menu require('menu.php');
echo 'Hello '.$_SESSION['USER_NAME'].'!';

$link = mysqli_connect('localhost', 'root', '');
$db = mysqli_select_db($link, 'labexam');

$credqry = "SELECT credit_amount FROM customer WHERE cust_id = ".$_SESSION['USER_ID'].";";
$result = mysqli_query($link, $credqry);
if($result != NULL){
    $row = mysqli_fetch_assoc($result);
    echo "\n\n Your Credit Due is  ".$row['credit_amount'];
}
} 
else{ 
header('location:login_form.php'); 
exit(); 
} 
?>
<html> 
<head> 
<title>Login Page</title> 
</head> 
<body> 
<h3 align="center"> - Enter Purchase details - </h3> 
<form name="myloginForm" method="post" action="buy_books.php"> 
<table width="300" border="1" align="center" cellpadding="5" cellspacing="0"> 
<tr> 
<td style="color:rgb(6,59,118)"><b>Book ISBN</b></td> 
<td><input name="bookISBN" type="text" id="bookISBN" /></td> 
</tr> 
<tr>
<td style="color:rgb(6,59,118)"><b>No. Of Books</b></td> 
<td><input name="bookN" type="text" id="bookN" /></td>
</tr>
<tr>
<td style="color:rgb(6,59,118)"><b>By Credit? (0)</b></td> 
<td><input name="credit" type="text" id="credit" /></td>
</tr>
<tr> 
<td colspan="2" align="center"> 
<input type="submit" name="submit" value="Buy" /></td> 
</tr> 
</table> 
</body> 
</html>
