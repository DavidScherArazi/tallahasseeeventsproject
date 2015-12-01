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
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "event";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM event NATURAL JOIN (SELECT name,OrgID FROM organization.organization) AS T";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table><tr><th>eventID</th><th>Title</th><th>Description</th><th>Address</th><th>Rating</th><th>Organization Name</th><th>Date</th><th>Start Time</th><th>End Time</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
 		echo "<tr><td>".$row["eventID"]."</td><td>".$row["Title"]."</td><td>".$row["Description"]."</td><td>".$row["Address"]."</td><td>".$row["name"]."</td><td>".$row["Date"]."</td><td>".$row["Start Time"]."</td><td>".$row["End Time"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
$conn->close();
?>
</body>
</html>
