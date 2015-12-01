<HTML lang="en">
<head> 
<title> Events List </title>
<!-- Tabs at the top of the page -->
<style>
ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
}

li {
    float: left;
}

a:link, a:visited {
    display: block;
    width: 120px;
    font-weight: bold;
    color: #FFFFFF;
    background-color: #98bf21;
    text-align: center;
    padding: 4px;
    text-decoration: none;
    text-transform: uppercase;
}

a:hover, a:active {
    background-color: #7A991A;
}
</style>
<div id="ts_tabmenu">
    <ul>
        <li><a href=index.php><strong>Index</strong></a></li>
        <li><a href=profile.php><strong>My Profile</strong></a></li>
        <li><a href=eventlist.php><strong>Event List</strong></a></li>
        <li><a href=orglist.php><strong>Org List</strong></a></li>
        <li><a href=about.php><strong>About</strong></a></li>
    </ul>
</div>	
</head>

<body>
<font size = 14> <center> Welcome to the login page, here you can log in to your organization's account and add/delete events.
Please log into the following form. </center> </font>

<br>
<table width="300" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
<tr>
<form name="form1" method="post" action="checklogin.php">
<td>
<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
<tr>
<td colspan="3"><strong>Member Login </strong></td>
</tr>
<tr>
<td width="78">Username</td>
<td width="6">:</td>
<td width="294"><input name="myusername" type="text" id="myusername"></td>
</tr>
<tr>
<td>Password</td>
<td>:</td>
<td><input name="mypassword" type="text" id="mypassword"></td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td><input type="submit" name="Submit" value="Login"></td>
</tr>
</table>
</td>
</form>
</tr>
</table>

<br>
<table width="300" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
<tr>
<form name="form1" method="post" action="signup.php">
<td>
<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
<tr>
<td colspan="3"><strong>Member Sign-Up</strong></td>
</tr>
<tr>
<td width="78">Username</td>
<td width="6">:</td>
<td width="294"><input name="myusername" type="text" id="myusername"></td>
</tr>
<tr>
<td>Password</td>
<td>:</td>
<td><input name="mypassword" type="text" id="mypassword"></td>
</tr>
<tr>
<td>Organization's Name</td>
<td>:</td>
<td><input name="name" type="text" id="name"></td>
</tr>
<tr>
<td>Address</td>
<td>:</td>
<td><input name="address" type="text" id="address"></td>
</tr>
<tr>
<td>Phone # (optional)</td>
<td>:</td>
<td><input name="phone" type="text" id="phone"></td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td><input type="submit" name="Submit" value="Sign-Up"></td>
</tr>
</table>
</td>
</form>
</tr>
</table>


</body>
</html>
