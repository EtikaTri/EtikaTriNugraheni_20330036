<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>E-Arsip</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<div class="card mt-3">
  <div class="card-header bg-dark text-white ">
    Data Arsip Surat
  </div>
  <div class="card-body">
   
    <table class="table table-borderd table-hovered table-striped">
      <tr>
        <th>No</th>
        <th>No Surat</th>
        <th>Tanggal Surat</th>
        <th>Tanggal Diterima</th>
        <th>Perihal</th>
        <th>Tujuan</th>
        <th>Pengirim</th>
        <th>File</th>
      
      </tr>
      <?php
          $tampil = mysqli_query($koneksi, "
                    SELECT 
                      tbl_arsip.*,
                      tbl_departemen.nama_departemen,
                      tbl_pengirim_surat.nama_pengirim, tbl_pengirim_surat.no_hp
                    FROM 
                      tbl_arsip, tbl_departemen, tbl_pengirim_surat
                    WHERE 
                      tbl_arsip.id_departemen = tbl_departemen.id_departemen
                      and tbl_arsip.id_pengirim = tbl_pengirim_surat.id_pengirim_surat
                    ");
          $no = 1;
          while ($data=mysqli_fetch_array($tampil)): 
          
      ?>
      <tr>
        <td><?=$no++?></td>
        <td><?=$data['no_surat']?></td>
        <td><?=$data['tanggal_surat']?></td>
        <td><?=$data['tanggal_diterima']?></td>
        <td><?=$data['perihal']?></td>
        <td><?=$data['nama_departemen']?></td>
        <td><?=$data['nama_pengirim']?> / <?=$data['no_hp']?></td>
        <td>
          <?php 
            //uji apakah filenya ada atau tidak
            if (empty($data['file'])) {
              echo " - ";
            }else{

          ?>
            <a href="file/<?=$data['file']?>" target="$_blank">Lihat File </a>
          <?php 
              }
          ?>
        </td>
        
      </tr>
    <?php endwhile; ?>
    </table>
  </div>
</div>