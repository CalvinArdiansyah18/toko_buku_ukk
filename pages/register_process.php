<?php
include "../conf/conn.php";
$nama = $_POST["nama"];
$alamat = $_POST["alamat"];
$telepon = $_POST["telepon"];
$status = $_POST["status"];
$username = $_POST["username"];
$password = md5($_POST["password"]);
$level = $_POST["level"];

$query = ("INSERT INTO kasir (nama, alamat, telepon, status, username, password, level) VALUES ('$nama', '$alamat', '$telepon', '$status', '$username', '$password', '$level')");
if ($koneksi->query($query)) {
  //redirect ke halaman index.php 
  //header("location: index.php");
  echo '<script>alert("Data Berhasil Disimpan !!!");
  window.location.href="../pages/login.php"</script>';
} else {
  //pesan error gagal update data
  //echo "Data Gagal Disimpan!";
  echo '<script>alert("Data Digagal Disimpan !!!");
  window.location.href="../pages/login.php"</script>';
}