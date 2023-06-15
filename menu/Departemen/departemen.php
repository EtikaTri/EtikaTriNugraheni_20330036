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
<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="login.php">
                <div class="sidebar-brand-icon">
                    
                    <i class="fas fa-home"></i>
               
                </div>
                <div class="sidebar-brand-text mx-3">E-Arsip Kalurahan </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="dashboard.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            

            <!-- Nav Item - Pages Collapse Menu -->
            <!-- Divider -->
            

            <!-- Heading -->
            <div class="sidebar-heading">
                Menu
            </div>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="admin.php?halaman=departemen">
                    <i class="fas fa-fw fa-file"></i>
                    <span>Data Departemen</span></a>

            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="admin.php?halaman=pengirim_surat">
                    <i class="fas fa-fw fa-file"></i>
                    <span>Data Pengirim</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="admin.php?halaman=arsip_surat">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Data Arsip Surat</span></a>
            </li>

            
        

            <!-- Divider -->
            <hr class="sidebar-divider">

            

            
            

        </ul>
        <!-- End of Sidebar -->
            <hr class="sidebar-divider"></ul>
        <div id="content-wrapper" class="d-flex flex-column">
          </li>

                        
                        
<ul class="navbar-nav ml-auto">                       
<div class="card mt-0">
</div>
</ul>

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
                        document.location='?halaman=departemen';
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
                        document.location='?halaman=departemen';
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
                              document.location='?halaman=departemen';
                            </script>";
                    }

                  }
                  
                }
                ?>
    
                <div class="card mt-0 ">
                  <div class="card-header bg-dark text-white border-5 ">
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
                        <td>
                          
                          <a href="?halaman=departemen&hal=edit&id=<?=$data['id_departemen']?>" class="btn btn-warning btn-md" title="Ubah Data"><i class="fa fa-edit"> </i></a>

                            <a onclick="return confirm('Apakah anda yakin ingin menghapus data?')" href="?halaman=departemen&hal=hapus&id=<?=$data['id_departemen']?>" class="btn btn-danger btn-md" title="Hapus Data"><i class="fa fa-trash"> </i></a>
                        </td>
                      </tr>
                    <?php endwhile; ?>
                    </table>
                  </div>
                </div>

                </div>
        <!-- End of Content Wrapper -->
<!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                
                <div class="modal-body">Apakah anda yakin ingin keluar ?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-danger" href="login.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>




