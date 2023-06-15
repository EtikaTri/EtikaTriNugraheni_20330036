<?php
	session_start();
	//hapus session 
	unset($_SESSION['id_pengguna']);
	unset($_SESSION['username']);

	session_destroy();
	echo "<script>
			alert('Anda telah keluar dari halaman Administrator');
			document.location='login.php';
		 </script>";
?>