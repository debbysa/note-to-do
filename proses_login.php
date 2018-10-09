<?php
session_start();

include 'config/koneksi.php';

$uname=$_POST['username'];
$pass=md5($_POST['password']);


$query="select * from login where username='$uname' and password='$pass'";
$hasil=mysqli_query($mysqli,$query);
$data=mysqli_fetch_array($hasil);
$cekdata=mysqli_num_rows($hasil);

if($cekdata>0){
	$_SESSION['password']=$pass;
	$_SESSION['nama']=$data['nama'];
	$_SESSION['level']=$data['level'];
	$_SESSION['username']=$uname;

header("Location: landing.php");
}
else{
	header("Location: index.php");
}
?>