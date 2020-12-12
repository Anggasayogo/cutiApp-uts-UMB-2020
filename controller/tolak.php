<?php
session_start();
include "../koneksi/koneksi.php";
if(!$_SESSION['name']){
    echo "<script> location='../view/login.php'; </script>";
}

$id = $_GET['id'];
$query = mysqli_query($conection,"UPDATE cuti SET approved='2' WHERE id_cuti='$id' ");

if($id){
    echo "<script> alert('Data Success Rejected !');</script>";
    echo "<script> location='../view/hrd.php'; </script>";
}else{
    echo "<script> alert('Hmmm Nampaknyah ada yang salah !');</script>";
    echo "<script> location='../view/hrd.php'; </script>";
}


