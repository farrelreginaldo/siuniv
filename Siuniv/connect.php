<?php

$host = "localhost";
$db = "db_universitas";
$uname = "root";
$pass = "";

$connect = mysqli_connect($host, $uname, $pass, $db);

if(!$connect)
{
  echo "Koneksi ke Database Gagal : " . mysqli_connect_error();
}
 ?>
