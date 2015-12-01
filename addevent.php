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

if(null == $_POST['eventname'] || null == $_POST['description'] || null == $_POST['address'] || $_POST['date']) {
	header("location:loggedin.php");
}


//taking data from the form
$eventname=$_POST['eventname']; 
$description=$_POST['description'];
$address=$_POST['address'];
$date=$_POST['date'];  
$starttime=$_POST['starttime'];
$endtime=$_POST['endtime']; 

$orgID = $_POST['orgid'];
//convert date to sql format
$date = strtotime($date);
$date = date('Y-m-d',$date);   

//Open up db
$servername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "event";

// Create connection
$connect = mysql_connect("$servername", "$dbusername", "$dbpassword")or die("cannot connect"); 
mysql_select_db("$dbname")or die("cannot select DB");

//get largest eventID
$sql = "SELECT MAX(eventID) FROM event";
$result = mysql_query($sql);
$row = mysql_fetch_row($result);
$eventid = $row[0];
$eventid = $eventid + 1; //increment by one

$sql="INSERT INTO `event`(`eventID`, `Title`, `Description`, `Address`, `OrgID`, `Date`, `Start Time`, `End Time`) VALUES ('$eventid','$eventname','$description','$address','$orgID','$date','$starttime','$endtime')";
$result=mysql_query($sql);

if( $result == 1) {
	echo "Success! You are now signed up!";
}
else {
	echo "Failure! Go back and try again!";
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
