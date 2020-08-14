<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Simple Url Shortener!</title>
    <link rel="stylesheet" href="css/styles.css"/>
  </head>
  <body>
    <center>
    <h1>Shortener!</h1>
    <p>Just generate short urls here...!</p>




<br><br>


<form  action="create.php">
<input type="text" name="urls" placeholder="Paste your url here">
</form>




<?php

if(isset($_GET['urls'])){
  $url = $_GET['urls'];
  shorten_url($url);
}

function shorten_url($url){
  include 'shorten.php';

  $outputurl = Shortener($url);

 ?>
 <input type="text" onClick="msg()" value="<?php echo $outputurl;?>"/>
<?php
}

?>
  </center>
  </body>
</html>
