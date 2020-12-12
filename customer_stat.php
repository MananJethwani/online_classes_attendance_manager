
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
<h1>Customer Information</h1> 
<form action = "getstat.php" method = "post"> 
<table cellpadding = "10"> 
<tr> 
<td>Customer Name</td> 
<td><input type="text" name="customer_name" maxlength="25"></td> 
</tr> 
</table> 
<table cellpadding = "20"> 
<tr> 
<td><input type="submit" name="submit" value="Loan Taken"></td> 
<td><input type="submit" name="submit" value="Account Balance"></td> 
<td><input type="submit" name="submit" value="Update Account Balance By 10%"></td> 
<td><input type="submit" name="submit" value="Branch Name of Customer"></td> 

</tr> 
</table> 
</form> 
</center> 
</body> 
</html>