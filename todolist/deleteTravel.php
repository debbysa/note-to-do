<?php
include("../config/koneksi.php");

	mysqli_query($mysqli,"DELETE FROM travel WHERE id_travel = '$_GET[id]'");
	header('location:tambahTravel.php#kegiatanmu');


?>