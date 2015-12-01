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
</head>

<body>
<?php
//get variables from the form

//checks to see if any of the required fields are missing
if(null == $_POST['myusername']|| null == $_POST['mypassword']|| null == $_POST['address']|| null == $_POST['name'] ){
	echo "missing required information! Please try again!";
	header("location:profile.php");
}

$myusername=$_POST['myusername']; 
$mypassword=$_POST['mypassword'];
$address=$_POST['address'];
$phone=$_POST['phone'];
$name=$_POST['name'];

//open up db
$servername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "orgusers";

// Create connection
$connect = mysql_connect("$servername", "$dbusername", "$dbpassword")or die("cannot connect"); 
mysql_select_db("$dbname")or die("cannot select DB");

//get largest orgID
$sql = "SELECT MAX(orgID) FROM orgusers";
$result = mysql_query($sql);
$row = mysql_fetch_row($result);
$orgid = $row[0];
$orgid = $orgid + 1; //increment by one

//add new user to orgusers
$sql="INSERT INTO `orgusers`(`orgID`, `username`, `password`) VALUES ('$orgid','$myusername','$mypassword')";
$result=mysql_query($sql);

mysql_close($connect);
//convert address to lat and long.
$prepAddr = str_replace(' ','+',$address);
$geocode=file_get_contents('https://maps.google.com/maps/api/geocode/json?address='.$prepAddr.'&sensor=false&key=AIzaSyDDntr-6KgJCxy9UF6-_3KdQdrtN-8yCOs');
$output= json_decode($geocode);
$latitude = $output->results[0]->geometry->location->lat;
$longitude = $output->results[0]->geometry->location->lng;

$dbname = "organization";
// Create connection
$connect = mysql_connect("$servername", "$dbusername", "$dbpassword")or die("cannot connect"); 
mysql_select_db("$dbname")or die("cannot select DB");

$sql="INSERT INTO `organization`(`orgID`, `name`, `address`, `Phone#`, `lat`, `lng`) VALUES ('$orgid','$name','$address','$phone','$latitude','$longitude')";
$result=mysql_query($sql);

if($result == 1) {
	echo "success! You are now officially signed up!";
}
else {
	echo "failure!";
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
