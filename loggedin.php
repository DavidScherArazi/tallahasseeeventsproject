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
<?php

//checks to see if any of the required fields are missing
if(null == $_GET['username']|| null == $_GET['password'] ){
	header("location:profile.php");
}

$login = $_GET['login'];
$password = $_GET['password'];
$username = $_GET['username'];


//get the orgID from username
$servername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "orgusers";

// Create connection
$connect = mysql_connect("$servername", "$dbusername", "$dbpassword")or die("cannot connect"); 
mysql_select_db("$dbname")or die("cannot select DB");

//Query orgusers for orgID
$sql = "SELECT orgID FROM orgusers WHERE username = '$username'";
$result = mysql_query($sql);
$row = mysql_fetch_row($result);

//print orgID
$orgid = $row[0];
echo "<font size = 16> Hello $username!</font> <br>";
echo "Your organization identification number is $orgid <br> <br>";
echo "My Events:";

mysql_close($connect); //close connection

$dbname = "event";
//create table that shows that orgs events.
$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
$sql = "SELECT * FROM event WHERE OrgID = '$orgid'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table><tr><th>eventID</th><th>Title</th><th>Description</th><th>Address</th><th>Date</th><th>Start Time</th><th>End Time</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
 		echo "<tr><td>".$row["eventID"]."</td><td>".$row["Title"]."</td><td>".$row["Description"]."</td><td>".$row["Address"]."</td><td>".$row["Date"]."</td><td>".$row["Start Time"]."</td><td>".$row["End Time"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

?>

<br>
<!-- add event -->
<br>
<table width="300" border="0" align="left" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
<tr>
<form name="form1" method="post" action="addevent.php">
<!-- pass along orgID -->
<input type = "hidden" name="orgid" value="<?php echo $orgid ?>">
<td>
<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
<tr>
<td colspan="3"><strong>Add New Event </strong></td>
</tr>
<tr>
<td width="78">Event Name</td>
<td width="6">:</td>
<td width="294"><input name="eventname" type="text" id="eventname"></td>
</tr>
<tr>
<td>Description</td>
<td>:</td>
<td><input name="description" type="text" id="description"></td>
</tr>
<tr>
<td>Address</td>
<td>:</td>
<td><input name="address" type="text" id="address"></td>
</tr>
<tr>
<td>Date</td>
<td>:</td>
<td><input name="date" type="date" id="date"></td>
</tr>
<tr>
<td>Start Time</td>
<td>:</td>
<td><input name="starttime" type="number" id="starttime"></td>
</tr>
<tr>
<td>End Time</td>
<td>:</td>
<td><input name="endtime" type="number" id="endtime"></td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td><input type="submit" name="Submit" value="Submit"></td>
</tr>
</table>
</td>
</form>
</tr>
</table>

<!-- remove event -->
<table width="300" border="0" align="Right" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
<tr>
<form name="form1" method="post" action="removeevent.php">
<td>
<!-- pass along orgID -->
<input type = "hidden" name="orgid" value="<?php echo $orgid ?>">
<table width="100%" border="0" cellpadding="10" cellspacing="1" bgcolor="#FFFFFF">
<tr>
<td colspan="3"><strong>Remove Event </strong></td>
</tr>
<tr>
<td width="78">eventID</td>
<td width="6">:</td>
<td width="294"><input name="eventID" type="number" id="eventID"></td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td><input type="submit" name="Submit" value="Remove"></td>
</tr>
</table>
</td>
</form>
</tr>
</table>

</body>
</html>
