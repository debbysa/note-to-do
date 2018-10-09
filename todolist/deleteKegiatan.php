<?php
include("../config/koneksi.php");

// hapus buku
// echo "$_GET[id]";
	mysqli_query($mysqli,"DELETE FROM todolist WHERE id = '$_GET[id]'");
	header('location:tambahKegiatan.php#kegiatanmu');


?>