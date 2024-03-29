<?php 

$nama_lengkap = $_GET['nama_lengkap'];
$user_name = $_GET['user_name'];
$password = $_GET['password'];

echo "<h1>Selamat {$nama_lengkap}, Kamu Sudah Terdaftar</h1>";
echo "<h3>Username : {$user_name}</h3>";
echo "<h3>Password : {$password}</h3>";

?>