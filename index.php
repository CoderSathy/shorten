<?php

include 'dbconfig.php';

foreach (explode('/',$_SERVER['REQUEST_URI']) as $part) {
  $elem = $part;
}

$conn = new mysqli($servername,$username,$password,$dbname);
if($conn -> connect_error){
  die("Conn failed");
}
$sql = "SELECT * FROM Urls WHERE shorturl='$elem';";

$rs = mysqli_query($conn,$sql);
$getRes = mysqli_fetch_assoc($rs);

$url = $getRes['url'];
header("Location: $url");
$conn->close();
die();
 ?>
