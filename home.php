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
$tmo=rand(10,21);

$sql = "SELECT * FROM myguests WHERE id=$tmo";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
    	
        echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
    }
} else {
    echo "0 results";
}
$tmp=rand(10,21);
$sql = "SELECT * FROM myguests WHERE id=$tmp";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
    	
        echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
    }
} else {
    echo "0 results";
}

$conn->close();
?>
<html>
<body>

<form action="up2.php" method="post">
id: <input type="text" name="name"><br>

<input type="submit">
</form>
<h><bold> top scorer</bold><br></h>

</body>
</html>


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
$sql="SELECT * FROM myguests WHERE score=( SELECT max(score) FROM myguests )";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
    	
      
         echo "id: ". $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]." ".$row["score"]. "<br>";
    }
} else {
    echo "0 results";
}

$conn->close();
?>
