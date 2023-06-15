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
if (isset($_POST['bssimpan'])) 
{
  //pengujian data apakah data akan diedit/simpan 
  if ($_GET['hal'] == "edit") {
    //perintah edit data
    //ubah data
    $Edit = mysqli_query($koneksi, "UPDATE tbl_departemen 
                    SET nama_departemen ='$_POST[nama_departemen]'where id_departemen = '$_GET[id]'");
     if ($Edit) 
    {
      echo"<script>
        alert('Edit Data Sukses');
        document.location='?halamanumum=departemen';
       </script>";
    }
  }
  else
  {
    //perintah simpan data baru
    //simpan data
    $simpan = mysqli_query($koneksi, "INSERT INTO tbl_departemen 
                    VALUES ('','$_POST[nama_departemen]')");
     if ($simpan) 
    {
      echo"<script>
        alert('Simpan Data Sukses');
        document.location='?halamanumum=departemen';
       </script>";
    }
  }
 
}
//uji jika klik tombol edit/hapus
if (isset($_GET['hal'])) 
{

  if ($_GET['hal'] =="edit") 
  {
    //tampilkan data yang akan diedit
    $tampil = mysqli_query($koneksi, "SELECT * FROM tbl_departemen where id_departemen= '$_GET[id]'");
    $data = mysqli_fetch_array($tampil);
    if ($data) 
    {
      //jika data ditemukan, maka data ditampung ke dalam variabel
      $vnama_departemen = $data['nama_departemen'];
    }

  }else{

    $hapus = mysqli_query($koneksi, "DELETE FROM tbl_departemen WHERE id_departemen ='$_GET[id]'");

    if($hapus){
        echo"<script>
              alert('Hapus Data Sukses');
              document.location='?halamanumum=departemen';
            </script>";
    }

  }
  
}
?>

<div class="card mt-3">
  <div class="card-header bg-dark text-white">
    Form Data Departemen
  </div>
  <div class="card-body">
    <form method="post" action="">
      <div class="form-group">
       <label for="nama_departemen">Nama Departemen</label>
       <input type="text" class="form-control mt-3" id="nama_departemen" name="nama_departemen"
       value="<?=@$vnama_departemen?>">
      </div>
      <button type="submit" name="bssimpan" class="btn btn-primary mt-3">Simpan</button>
      <button type="reset" name="bbatal" class="btn btn-danger mt-3">Batal</button>
  </form>
  </div>
</div>

<div class="card mt-3">
  <div class="card-header bg-dark text-white">
    Data Departemen
  </div>
  <div class="card-body">
    <table class="table table-borderd table-hovered table-striped">
      <tr>
        <th>No</th>
        <th>Nama Departemen</th>
        <th>Aksi</th>
      </tr>
      <?php
          $tampil = mysqli_query($koneksi, "SELECT * from tbl_departemen order by 
            id_departemen desc");
          $no = 1;
          while ($data=mysqli_fetch_array($tampil)): 
          
      ?>
      <tr>
        <td><?=$no++?></td>
        <td><?=$data['nama_departemen']?></td>
        
      </tr>
    <?php endwhile; ?>
    </table>
  </div>
</div>


            