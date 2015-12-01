<HTML lang="en">
<head> 
<title> Organizations List </title>
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
$dbname = "organization";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//Query all of the organization table
$sql = "SELECT * FROM organization";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table><tr><th>Organization ID Number</th><th>Name</th><th>Address</th><th>Main Phone</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
 		echo "<tr><td>".$row["orgID"]."</td><td>".$row["name"]."</td><td>".$row["address"]."</td><td>".$row["Phone#"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
$conn->close();
?>
</body>
</html>
