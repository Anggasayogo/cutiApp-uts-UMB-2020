<?php
session_start();
include "../koneksi/koneksi.php";

if(!$_SESSION['email']){
    echo "<script> location='../view/login.php'; </script>";
}

$query = mysqli_query($conection,"SELECT * FROM users INNER JOIN role ON users.id_role=role.id_role WHERE role.id_role='2' ");
$queries = mysqli_query($conection,"SELECT * FROM jenis_cuti");
$id_user = $_SESSION['id_user'];
$stockcuti = mysqli_query($conection,"SELECT * FROM users WHERE id_users='$id_user' ");
$row = mysqli_fetch_row($stockcuti);


$cutisaya = mysqli_query($conection,
"SELECT * FROM cuti INNER JOIN 
users ON users.id_users=cuti.id_user
INNER JOIN jenis_cuti ON cuti.jenis=jenis_cuti.id_jenis_cuti");


?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <title>Aplikasi Cuti</title>
  </head>
  <body>
    <?php include "template.php" ?>
    <div class="row">
        <div class="col-md-3">
            <div class="container shadow-sm p-2 mb-3 bg-white rounded">
                <h4 class="text-center">Sisa Cuti Kamu</h4>
                <h1 class="text-center"><?= $row[5]; ?></h1>
                <p class="mt-2 text-center">NOTED : Jatah Cuti Kamu Akan berkurang Otomatis Ketika Kamu Mengirim permohonan cuti</p>
            </div>
        </div>
        <div class="col-md-6 shadow p-3 mb-5 bg-white rounded">
            <form method="POST" action="../controller/cuticontroller.php">
                <div class="form-group">
                    <label>Pilih Users</label>
                    <select class="form-control" name="users">
                        <option>---- PILIH ----</option>
                        <?php $i=1; while($row = mysqli_fetch_array($query)) : ?>
                        <option value="<?= $row['id_users'] ?>"><?= $row['username'] ?></option>
                        <?php endwhile; ?>
                    </select>
                </div>
                <div class="form-group mt-3">
                    <label>Input Jabatan</label>
                    <input type="text" name="jabatan" class="form-control" placeholder="Input jabatan"/>
                </div>
                <div class="form-group mt-3">
                    <label>Input Divisi</label>
                    <input type="text" name="divisi" class="form-control" placeholder="Input Divisi"/>
                </div>
                <div class="form-group mt-3">
                    <label>Pilih Tanggal Cuti</label>
                    <input type="date" name="tanggal_cuti" class="form-control" placeholder="Input Divisi"/>
                </div>
                <div class="form-group mt-3">
                    <label>Input Alasan Cuti</label>
                    <textarea class="form-control" name="keterangan" placeholder="Input Keterangan"></textarea>
                </div>
                <div class="form-group">
                    <label>Pilih Cuti</label>
                    <Select name="jenis_cuti" class="form-control" >
                    <option>---- PILIH ----</option>
                    <?php $i=1; while($row = mysqli_fetch_array($queries)) : ?>
                        <option value="<?= $row['id_jenis_cuti'] ?>"><?= $row['nama_cuti'] ?></option>
                    <?php endwhile; ?>
                    </Select>
                </div>
                <button class="form-control btn btn-primary mt-3" type="submit" name="submit" >Submit</button>
            </form>
        </div>
        <div class="col-md-3">
            <div class="container shadow-sm p-2 mb-3 bg-white rounded">
                <p>Cuti Yang Anda Ajukan</p>
                <ul>
                    <?php $i=1; while($row = mysqli_fetch_array($cutisaya)) : ?>
                    <li class="mt-2">Permohonan Tanggal <?= $row['tanggal'] ?> dengan alasan "<?= $row['alasan'] ?>"
                    <?php if($row['approved'] == 1){ ?>
                            <span class="badge bg-success">Aproved</span>
                        <?php }else if($row['approved'] == 2){ ?>
                            <span class="badge bg-danger">Ditolak</span>
                        <?php }else{ ?>    
                            <span class="badge bg-warning">Pending</span>
                        <?php } ?> 
                    </li>
                    <?php endwhile; ?>
                </ul>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
  </body>
</html>