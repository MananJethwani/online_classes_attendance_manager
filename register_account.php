
 
<?php 
//Start the session to see if the user is authenticated user. 
session_start(); 
//Check if the user is authenticated first. Or else redirect to login page 
if(isset($_SESSION['IS_AUTHENTICATED']) && $_SESSION['IS_AUTHENTICATED'] == 1){ 
require('menu.php'); 
} 
else{ 
header('location:login_form.php'); 
exit(); 
} 
?> 
<html> 
<body> 
<center> 
<h1>Customer Registration/Updation Form</h1> 
<form action="edit_account.php" method="post"> 
<table cellpadding = "10"> 
<tr> 
<td>Account_Number*</td> 
<td><input type="text" name="Account_Number" maxlength="15"></td> 
</tr> 
<tr>  
<td>Branch_Name</td> 
<td><input type="text" name="Branch_Name" maxlength="15"></td> 
</tr>
<tr>
<td>Balance</td> 
<td><input type="text" name="Balance" maxlength="15"></td>
</tr>
<tr> 
<td>Account Opening Date</td>
<td><input type="date" name="Ac_date" maxlength="15"></td>
</tr> 
<td><input type="submit" name="submit" value="Insert"></td> 
<td><input type="submit" name="submit" value="Update"></td> 
<td><input type="submit" name="submit" value="Delete"></td> 
 
</tr> 
</table> 
</form> 
</center> 
</body> 
</html>
