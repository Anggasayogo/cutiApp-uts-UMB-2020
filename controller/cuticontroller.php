<?php
require "../koneksi/koneksi.php";
session_start();
if(!$_SESSION['email']){
    echo "<script> location='../view/login.php'; </script>";
}

if(isset($_POST['submit'])){
    $user = $_POST['users'];
    $jabatan = $_POST['jabatan'];
    $divisi = $_POST['divisi'];
    $tanggal_cuti = $_POST['tanggal_cuti'];
    $keterangan = $_POST['keterangan'];
    $jenis_cuti = $_POST['jenis_cuti'];
    $data = [$user,$jabatan,$divisi,$tanggal_cuti,$keterangan,$jenis_cuti];

    
    $query = mysqli_query($conection,"INSERT INTO cuti (id_user,jabatan,divisi,tanggal,alasan,jenis) VALUE 
    ('$user','$jabatan','$divisi','$tanggal_cuti','$keterangan','$jenis_cuti') ");
    
    $id_user = $_SESSION['id_user'];
    $stockcuti = mysqli_query($conection,"SELECT * FROM users WHERE id_users='$id_user' ");
    $row = mysqli_fetch_row($stockcuti);

    $stockcuti = $row[5] - 1;
    if($query){
        $updated = mysqli_query($conection,"UPDATE users SET stok_cuti='$stockcuti' WHERE id_users='$user' ");
        if($updated){
            echo "<script> alert('Data Berhasil dimasukan ke DB !');</script>";
            echo "<script> location='../view/cuti.php'; </script>";
        }
        echo "Data gagal di masukan ke databse";
    }else{
        echo "Data gagal di masukan ke databse";
    }
}