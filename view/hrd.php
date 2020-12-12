<?php
include "../koneksi/koneksi.php";
session_start();
if(!$_SESSION['email']){
    echo "<script> location='../view/login.php'; </script>";
}

$query = mysqli_query($conection,
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
        <div class="col-md-2"></div>
        <div class="col-md-8 shadow p-3 mb-5 bg-white rounded">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Tanggal</th>
                        <th>Alasan</th>
                        <th>Status</th>
                        <th>Approve</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=1; while($row = mysqli_fetch_array($query)) : ?>
                    <tr>
                        <td><?= $i++ ?></td>
                        <td><?= $row['username'] ?></td>
                        <td><?= $row['tanggal'] ?></td>
                        <td><?= $row['alasan'] ?></td>
                        <td>
                        <?php if($row['approved'] == 1){ ?>
                            <span class="badge bg-success">Aproved</span>
                        <?php }else if($row['approved'] == 2){ ?>
                            <span class="badge bg-danger">Ditolak</span>
                        <?php }else{ ?>    
                            <span class="badge bg-warning">Pending</span>
                        <?php } ?>
                        </td>
                        <td>
                            <a href="../controller/ijinkan.php?id=<?= $row['id_cuti'] ?>" class="btn btn-warning">Ijinkan</a>
                            <a href="../controller/tolak.php?id=<?= $row['id_cuti'] ?>" class="btn btn-danger">Tolak</a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
        <div class="col-md-2"></div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
  </body>
</html>