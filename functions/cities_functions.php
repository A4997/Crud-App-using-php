<?php

function show_cities(){
  $conn = mysqli_connect('localhost', 'root', '', 'amazon');
  $sql = "SELECT * FROM cities";
  $cities = mysqli_query($conn, $sql);
  return $cities;
}


 ?>
