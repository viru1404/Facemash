<html>
<head>
<title>Facemash - lists </title>
<link href="ex.css" type="css/text" rel="stylesheet">
</head>
 
<body>
<div style="width:100%;height:80px;border:1px solid black;background: orange;">

<center>

<h1>Facemash - Hot Or Not</h1></center>


</div>
<div style="width:100%;height:1500px;border:0px solid black;">

<div style="width:64%;height:1500px;border:0px solid black;float:left;">
<center><h2></center>


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

$sql="SELECT * FROM myguests ORDER BY score DESC ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo"<center>";
    echo"<table style='border:0px solid black;margin-top:0px;'>
    <tr style='border:0px solid black;width:100%;'>
    <td style='border-bottom:0px solid black;width:200;'>Avtaar</td>
    <td style='border-bottom:0px solid black;width:30%;'>Name</td>
    <td style='border-bottom:0px solid black;width:30%;'>Score</td>
    </tr>";
    while($row = $result->fetch_assoc()) {
    	
      	echo "<tr>";
         echo "
         <td style='border:0px solid black;'><img src=' ". $row["avtar"]. "' width='50px' height='50px'> </td>
		 <td style='border:0px solid black;'>" . $row["firstname"]. " " . $row["lastname"]." </td>
         <td style='border:0px solid black;'>".$row["score"]. "</td>
         ";
    }
    echo"</table>";
    echo"</center>";
    echo"<center>";
echo"<a href='index.php' style='text-decoration:none;float:right'>Back to Facemash</a>";

echo"</center>";

}
 else {
    echo "Database Error";
}

$conn->close();
?>
</div>
<div style="width:32%;height:4100px;border-left:1px solid black;float:right;">
<center>
<h2> <center><br>
<a href='index.php' style='text-decoration:none;float:center'>Back to Facemash</a>
</center>
</h2>


</center>

</div>
</div>

</body>
</html>

