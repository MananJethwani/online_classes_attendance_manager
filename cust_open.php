 
<?php 
session_start(); 
session_unset(); 
session_destroy(); 
?> 
<html> 
<head> 
<title>Login Page</title> 
</head> 
<body> 
<h3 align="center"> - Enter your CustomerID - </h3> 
<form name="myloginForm" method="post" action="cust_check.php"> 
<table width="300" border="1" align="center" cellpadding="5" cellspacing="0"> 
<tr> 
<td style="color:rgb(6,59,118)"><b>Cust. ID</b></td> 
<td><input name="loginID" type="text" id="loginID" /></td> 
</tr> 
<tr>
<td style="color:rgb(6,59,118)"><b>Cust. Name</b></td> 
<td><input name="loginN" type="text" id="loginN" /></td>
</tr>
<tr> 
<td colspan="2" align="center"> 
<input type="submit" name="submit" value="Login" /></td> 
</tr> 
</table> 
</body> 
</html>
