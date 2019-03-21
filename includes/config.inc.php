<?php


  $servername = "localhost";
  $dbusername = "root";
  $dbpass = "";
  $dbname = "dg1";


  //database connection
  $conn = mysqli_connect($servername, $dbusername, $dbpass, $dbname);

  //check connection
  if($conn === false) {
    die("ERROR: Could not connect. ". mysqli_connect_error());
  }


 ?>
