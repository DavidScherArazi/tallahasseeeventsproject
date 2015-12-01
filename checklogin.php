<?php

$host="localhost"; // Host name 
$username="root"; // Mysql username 
$password=""; // Mysql password 
$db_name="orgusers"; // Database name 
$tbl_name="orgusers"; // Table name 


// Connect to server and select databse.
$connect = mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");

// Define $myusername and $mypassword 
$myusername=$_POST['myusername']; 
$mypassword=$_POST['mypassword']; 

// To protect MySQL injection (more detail about MySQL injection)
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = mysql_real_escape_string($myusername);
$mypassword = mysql_real_escape_string($mypassword);
$sql="SELECT * FROM $tbl_name WHERE username='$myusername' and password='$mypassword'";
$result=mysql_query($sql);

// Mysql_num_row is counting table row
$count=mysql_num_rows($result);

// If result matched $myusername and $mypassword, table row must be 1 row
if($count==1){
$login=true;
// Register $myusername, $mypassword and redirect to file "profile.php"
header("location:loggedin.php?password=$mypassword&username=$myusername&login=true");
}
else {
echo "Wrong Username or Password";
header("location:profile.php");
}
ob_end_flush();
mysql_close($connect);

$conn->close();
?>
