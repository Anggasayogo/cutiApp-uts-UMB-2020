<?php 
session_start();

if($_SESSION['email']){
    session_destroy();
    echo "<script> alert('Berhasil Keluar Smoga Hari Harimu Menyenangkan ^^!');</script>";
	echo "<script> location='../view/login.php'; </script>"; 
}else{
    echo "<script> alert('Upss Maaf Anda Harus Login Terlebih dahulu');</script>";
	echo "<script> location='../view/login.php'; </script>"; 
}