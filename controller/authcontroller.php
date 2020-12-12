<?php
session_start();
include "../koneksi/koneksi.php";

if(isset($_POST['submit'])){
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);

    $query = mysqli_query($conection,"SELECT * FROM users INNER JOIN role ON users.id_role=role.id_role WHERE email='$email' ");
    $row = mysqli_fetch_row($query);
    if($email == $row[2]){
        if($password == $row[3]){
            $_SESSION['name'] = $row[1];
            $_SESSION['email'] = $row[2];
            $_SESSION['stock'] = $row[5];
            $_SESSION['id_role'] = $row[6];
            $_SESSION['id_user'] = $row[0];

            if($row[6] == 1){
                echo "<script> alert('Selamat Datang $row[1]!');</script>";
                echo "<script> location='../view/hrd.php'; </script>"; 
            }else if($row[6] == 2){
                echo "<script> alert('Selamat Datang $row[1]!');</script>";
                echo "<script> location='../view/cuti.php'; </script>"; 
            }else if($row[6] == 3 ){
                echo "<script> alert('Selamat Datang $row[1]!');</script>";
                echo "<script> location='../view/admin.php'; </script>";
            }
            
        }else{
                echo "<script> alert('Password salah !');</script>";
	            echo "<script> location='../view/login.php'; </script>";    
        }
    }else{
        echo "<script> alert('Email Salah !');</script>";
	    echo "<script> location='../view/login.php'; </script>";
    }

}
