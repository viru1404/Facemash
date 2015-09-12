<html>
<head>
<title>Facemash - Hot Or Not </title>
<link href="ex.css" type="css/text" rel="stylesheet">
</head>
 
<body>
<div style="width:100%;height:80px;border:1px solid black;">

<center>

<h1>Facemash - Hot Or Not</h1>
</div>
<div style="width:100%;height:480px;border:1px solid black;">

<div style="width:64%;height:470px;border:1px solid black;float:left;">
<center><h3>Choose Whose Better</h3></center>
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
    echo"<center><table><tr>";
    while($row = $result->fetch_assoc()) {
    	
        echo "<td width='400px'><center><br/><img src='".$row["avtar"]."' width='200px' height='300px'><br>";
                echo  $row["firstname"]. " " . $row["lastname"]."<br/>Current Score :- ".$row["score"]." <br/><br/><form action='up2.php' method='post'><input type='text' value='".$row["id"]."' name='name' align='left' hidden><input type='submit' value='Vote Up'></form></center></td>";

    }
    echo"</tr></table></center>";
} else {
    echo "Database Error";
}

$conn->close();
?>

</div>
<div style="width:32%;height:470px;border:1px solid black;float:right;">
<center>
<h1>#Trending People</h1>

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
    echo"<table style='border:0px solid black;margin-top:0px;'>
    <tr style='border:0px solid black;width:100%;'>
    <td style='border-bottom:1px solid black;width:300;'>Avtaar</td>
    <td style='border-bottom:1px solid black;width:30%;'>Name</td>
    <td style='border-bottom:1px solid black;width:30%;'>Score</td>
    </tr>";
    while($row = $result->fetch_assoc()) {
    	
      	echo "<tr>";
         echo "
         <td style='border:0px solid black;'><img src=' ". $row["avtar"]. "' width='50px' height='50px'> </td>
		 <td style='border:0px solid black;'>" . $row["firstname"]. " " . $row["lastname"]." </td>
         <td style='border:0px solid black;'>".$row["score"]. "</td>
         <br>";
    }
    echo"</table>";
} else {
    echo "0 results";
}

$conn->close();
?>
</center>

</div>
</div>
<div style="width:100%;height:80px;border:1px solid black;"><br/><br/>
<center>
&copy; RAPL Ind
</center>


</div>
</body>
</html>