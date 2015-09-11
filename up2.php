<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydb";
$pp=$_POST['name'];
echo $pp."<br>";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "UPDATE Myguests SET score=score+1 WHERE id=$pp";

if ($conn->query($sql) === TRUE) {
	
    header("location: home.php");

    
} else {
    echo "Error updating record: " . $conn->error;
}


$conn->close();
?>
