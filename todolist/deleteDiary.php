<?php
include("../config/koneksi.php");

// hapus buku
// echo "$_GET[id]";
	mysqli_query($mysqli,"DELETE FROM diary WHERE id_diary = '$_GET[id]'");
	header('location:tambahDiary.php#kegiatanmu');


?>