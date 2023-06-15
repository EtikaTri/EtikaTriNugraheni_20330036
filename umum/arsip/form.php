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

<?php
  //panggil function.php untuk upload file
  include "config/function.php";

//uji jika klik tombol edit/hapus
if (isset($_GET['hal'])) 
{

  if ($_GET['hal'] =="edit") 
  {
    //tampilkan data yang akan diedit
    $tampil = mysqli_query($koneksi, "SELECT 
                      tbl_arsip.*,
                      tbl_departemen.nama_departemen,
                      tbl_pengirim_surat.nama_pengirim, tbl_pengirim_surat.no_hp
                    FROM 
                      tbl_arsip, tbl_departemen, tbl_pengirim_surat
                    WHERE 
                      tbl_arsip.id_departemen = tbl_departemen.id_departemen
                      and tbl_arsip.id_pengirim = tbl_pengirim_surat.id_pengirim_surat 
                      and tbl_arsip.id_arsip= '$_GET[id]'");


    $data = mysqli_fetch_array($tampil);
    if ($data) 
    {
      //jika data ditemukan, maka data ditampung ke dalam variabel
      $vno_surat = $data['no_surat'];
      $vtanggal_surat = $data['tanggal_surat'];
      $vtanggal_diterima = $data['tanggal_diterima'];
      $vperihal = $data['perihal'];
      $vid_departemen = $data['id_departemen'];
      $vnama_departemen = $data['nama_departemen'];
      $vid_pengirim = $data['id_pengirim'];
      $vnama_pengirim = $data['nama_pengirim'];
      $vfile = $data['file'];
      

    }
    

    }
    elseif ($_GET['hal'] == 'hapus') 
    {
      $hapus = mysqli_query($koneksi, "DELETE FROM tbl_arsip WHERE id_arsip ='$_GET[id]'");

    if($hapus){
        echo"<script>
              alert('Hapus Data Sukses');
              document.location='?halaman=arsip_surat';
            </script>";
    }
    }
}

if (isset($_POST['bssimpan'])) 
{
  //pengujian data apakah data akan diedit/simpan 
  if (@$_GET['hal'] == "edit") {
    //perintah edit data
    //ubah data

    //apakah user pilih file/gambar atau tidak
    if ($_FILES['file']['error'] === 4) {
      $file = $vfile;
    }else{
      $file = upload();
    }
    
    $Edit = mysqli_query($koneksi, "UPDATE tbl_arsip SET 
                                      no_surat         ='$_POST[no_surat]',
                                      tanggal_surat    ='$_POST[tanggal_surat]',
                                      tanggal_diterima ='$_POST[tanggal_diterima]',
                                      perihal          ='$_POST[perihal]',
                                      id_departemen    ='$_POST[id_departemen]',
                                      id_pengirim      ='$_POST[id_pengirim]',
                                      file             ='$file'
                                    where id_arsip   = '$_GET[id]'");
    //ubah data
     if ($Edit) 
    {
      echo"<script>
            alert('Edit Data Sukses');
            document.location='?halamanumum=arsip_surat';
          </script>";
    }
    else
    {
      echo"<script>
            alert('Edit Data Gagal');
            document.location='?halamanumum=arsip_surat';
          </script>";
    }

  }
  else
  {
    //perintah simpan data baru
    //simpan data
    $file   = upload();
    $simpan = mysqli_query($koneksi, "INSERT INTO tbl_arsip 
                      VALUES ('',
                              '$_POST[no_surat]',
                              '$_POST[tanggal_surat]',
                              '$_POST[tanggal_diterima]',
                              '$_POST[perihal]',
                              '$_POST[id_departemen]',
                              '$_POST[id_pengirim]',
                              '$file'
                            )");
     if ($simpan) 
    {
      echo"<script>
        alert('Simpan Data Sukses');
        document.location='?halaman=arsip_surat';
       </script>";
    }else
    {
        echo"<script>
        alert('Simpan Data Gagal');
        document.location='?halaman=arsip_surat';
       </script>";
    }
  }
 
}

?>


<div class="card mt-3">
  <div class="card-header bg-danger text-white ">

    Form Data Arsip Surat
  </div>
  <div class="card-body">
    <form method="post" action="" enctype="multipart/form-data">
      <div class="form-group">
        <label for="no_surat">No. Surat</label>
        <input type="text" class="form-control mt-3" id="no_surat" name="no_surat"
        value="<?=@$vno_surat?>">
      </div>
      <div class="form-group">
        <label for="tanggal_surat">Tanggal Surat </label>
        <input type="date" class="form-control mt-3" id="tanggal_surat" name="tanggal_surat"
        value="<?=@$vtanggal_surat?>">
      </div>
      <div class="form-group">
        <label for="tanggal_diterima">Tanggal Diterima </label>
        <input type="date" class="form-control mt-3" id="tanggal_diterima" name="tanggal_diterima"
        value="<?=@$vtanggal_diterima?>">
      </div>
      <div class="form-group">
        <label for="perihal">Perihal</label>
        <input type="text" class="form-control mt-3" id="perihal" name="perihal"
        value="<?=@$vperihal?>">
      </div>

      <div class="form-group">
        <label for="id_departemen">Tujuan</label>
        <select class="form-control" name="id_departemen">
          <option value="<?=@$vid_departemen?>"><?=@$vnama_departemen?></option>
          <?php
              $tampil = mysqli_query($koneksi, "SELECT * from tbl_departemen order by 
                nama_departemen asc");
              while ($data = mysqli_fetch_array($tampil)) {
                echo "<option value = '$data[id_departemen]'>$data[nama_departemen]</option>";
                
              }
          ?>
        </select>
      </div>

      <div class="form-group">
        <label for="id_pengirim">Pengirim Surat</label>
        <select class="form-control" name="id_pengirim">
          <option value="<?=@$vid_pengirim?>"><?=@$vnama_pengirim?></option>
          <?php
              $tampil = mysqli_query($koneksi, "SELECT * from tbl_pengirim_surat order by 
                nama_pengirim asc");
              while ($data = mysqli_fetch_array($tampil)) {
                echo "<option value = '$data[id_pengirim_surat]'>$data[nama_pengirim]</option>";
                
              }
          ?>
        </select>
      </div>
      <div class="form-group">
        <label for="file">Pilih File</label>
        <input type="file" class="form-control mt-3" id="file" name="file"
        value="<?=@$vfile?>">
      </div>

      <button type="submit" name="bssimpan" class="btn btn-primary mt-3">Simpan</button>
      <button type="reset" name="bbatal" class="btn btn-danger mt-3">Batal</button>
  </form>
  </div>
</div>