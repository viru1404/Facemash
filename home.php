<html>
<head>
<title>
Facemash
</title>
</head>
<body>
	<h1>Welcome To Facemash</h1>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
//$tmo=rand(10,21);
$sql = "SELECT * FROM myguests ORDER BY rand() LIMIT 2";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
    	
        echo "Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
                echo "<form action='up2.php' method='post'><input type='text' value='".$row["id"]."' name='name' hidden><input type='submit' value='Vote Up'></form>";

    }
} else {
    echo "Database Error";
}

$conn->close();
?>

<hr>

<h1><b> TOP SCORERS</b><br></h1>



<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql="SELECT * FROM myguests ORDER BY score DESC LIMIT 5 ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo"<table style='border:1px solid black;'><tr style='border:1px solid black;'><td style='border:1px solid black;'>Name</td><td style='border:1px solid black;'>Score</td></tr>";
    while($row = $result->fetch_assoc()) {
    	
      	echo "<tr style='border:1px solid black;'>";
         echo "<td style='border:1px solid black;'>" . $row["firstname"]. " " . $row["lastname"]." </td><td style='border:1px solid black;'>".$row["score"]. "</td><br>";
    }
    echo"</table>";
} else {
    echo "0 results";
}

$conn->close();
?>

</body>

</html>

