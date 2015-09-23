<html>
<head>
<title>Facemash - Hot Or Not </title>
<link href="ex.css" type="css/text" rel="stylesheet">
</head>
 
<body>
<div style="width:100%;height:80px;border:1px solid black;background: orange;">

<center>

<h1>Facemash - Hot Or Not</h1></center>


</div>
<div style="width:100%;height:480px;border:0px solid black;">

<div style="width:64%;height:470px;border:0px solid black;float:left;">
<center><h2>Choose Whose Better</h2>Click on any picture to Vote Up</center><br/>
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
    	
        echo "<td width='400px'><center>";
                echo  "
                <form action='up2.php' method='post'>
                <input type='text' value='".$row["id"]."' name='name' align='left' hidden>
                <input type='submit' value=' '  style='border:0px solid black;width:200px;height:300px;background:url(";
                	echo '"'.$row["avtar"].'"';
                	echo");background-size: 200px 300px;
    background-repeat: no-repeat;'>
                </form>
                ".$row["firstname"]. " " . $row["lastname"]."<br/>Current Score :- ".$row["score"]." 
               </center></td>";

    }
    echo"</tr></table></center>";
} else {
    echo "Database Error";
}
echo"<center>";
echo"<a href='index.php' style='text-decoration:none;float:right'>Skip</a>";

echo"</center>";


$conn->close();
?>

</div>
<div style="width:32%;height:480px;border-left:1px solid black;float:right;">
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
	echo"<br><br>";
    echo"<table style='border:0px solid black;margin-top:0px;'>
    <tr style='border:0px solid black;width:100%;'>
    <td style='border-bottom:0px solid black;width:300;'>Avtaar</td>
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
    echo"<center>";
echo"<br><br><a href='lists.php' style='text-decoration:none'>Show all</a>";

echo"</center>";

} else {
    echo "0 results";
}

$conn->close();
?>
</center>

</div>
</div>
<div style="width:100%;height:80px;border:1px solid black;">
<center>


<h3><center><a href='uploadnow.php' style='text-decoration:none;float:right'>upload Ur Better Image <br></a></center></h3>

<h3><bold><br>Mail us at :: fightercode32@gmail.com
</bold></h3>
</center>



</div>
</body>
</html>
