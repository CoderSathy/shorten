<?php

function Shortener($url){
  $return_url = short_url($url);
  return 'localhost/shorten/'.$return_url;
}

function short_url($url)
{
  $shorturl = getRandomSlug(5);

  include 'dbconfig.php';

  $conn = new mysqli($servername,$username,$password,$dbname);
  if($conn -> connect_error){
    die("Conn failed");
  }
  $sql = "INSERT INTO Urls(url,shorturl) VALUES('$url','$shorturl');";

  if($conn->query($sql)===TRUE){
    // created successfully
  }

  else{
    echo 'Error';
  }

  $conn -> close();

  return $shorturl;
}

function getRandomSlug($length)
{
  $characters = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
  $characterlength = strlen($characters);
  $randomString = '';

  for($i=0;$i<$length;$i++){
    $randomString .= $characters[rand(0,$characterlength-1)];
  }
  return $randomString;
}
 ?>
