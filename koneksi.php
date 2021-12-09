<?php

$host="localhost";
$username="root";
$password="";
$databasename="aakademik";
#terdapat variabel con untuk menghubungkan antara database dengan php
$con=@mysqli_connect($host,$username,$password,$databasename);
if (!$con) {
 echo "Error: " . mysqli_connect_error();
 #dan terdapat tampilan eror jika gagal mengkoneksikan 
exit();
}
?>