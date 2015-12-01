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
$eventID=$_POST['eventID'];
	
//Open up db
$servername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "event";

$orgID = $_POST['orgid'];
// Create connection
$connect = mysql_connect("$servername", "$dbusername", "$dbpassword")or die("cannot connect"); 
mysql_select_db("$dbname")or die("cannot select DB");

$sql="SELECT orgID FROM event WHERE eventID = '$eventID'";
$result=mysql_query($sql);
$row = mysql_fetch_row($result);
$orgID2 = $row[0];

//checks to make sure that organization owns that event
if($orgID2 == $orgID){
$sql = "DELETE FROM `event` WHERE eventID = '$eventID'";
$result=mysql_query($sql);
	if($result == 1) {
		echo "success!";
	}
	else {
		echo "failure!";
	}
}
else {
	echo "You do not have access to that event, please go back and try again.";
}
mysql_close($connect);
?>

<script>
function goBack() {
    window.history.back();
}
</script>

<button onclick="goBack()">Go Back</button>

</body>
</html>
