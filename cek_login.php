<?php
session_start();
include "config/koneksi.php";

@$pass = ($_POST['password']);

@$username = mysqli_escape_string($koneksi, $_POST['username']);
@$password = mysqli_escape_string($koneksi, $pass);

$login = mysqli_query($koneksi, "SELECT * from tbl_pengguna
								 WHERE username='$username' and password = '$password'");

$data = mysqli_fetch_array($login);
if ($data) 
{
	$_SESSION['id_pengguna'] = $data['id_pengguna'];
	$_SESSION['username'] = $data['username'];
	header("location:dashboard.php");

}
elseif ($data) {
	
	$_SESSION['username'] = $data['username'];
	header("location:dashboard2.php");

}

else{
	
}
{
	echo "<script>
			alert('Maaf, Login gagal, pastikan username dan password anda benar..!');
			document.location='index.php';
		 </script>";
}


?>