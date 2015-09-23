
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
<br>
<br>
<br>

<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {

    $check = $_FILES["fileToUpload"]["tmp_name"];
    if($check !== false) {
        $uploadOk = 1;

        // Check if file already exists
if (file_exists($target_file)) {
    echo "file is already uploaded."."<br>".
   " ab kya jaan loge <br>";
    $uploadOk = 0;
}
    // Check file size
if ($_FILES["fileToUpload"]["size"] > 5000000) {
    echo "Sorry, your file is too large.<br>";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.<br>";
    $uploadOk = 0;
}

    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}



// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>
</div>
<div style="width:32%;height:480px;border-left:0px solid black;float:right;">
<center>

<h2> <center><br>
<a href='index.php' style='text-decoration:none;float:center'>Back to Facemash</a>
</center>
</h2>


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
