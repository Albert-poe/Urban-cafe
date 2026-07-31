<?php
$host="localhost";
$user="root";
$password="";
$database="urban-cafe";
  $conn= mysqli_connect($host,$user,$password,$database);

  if(!$conn){
    die("connection failed".mysqli_connect_error());
  }

    ?>
