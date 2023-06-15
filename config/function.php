<?php
//persiapan function untuk upload file/foto
function upload ()
{
	//deklarasikan varabel kebutuan 
	$namafile = $_FILES['file']['name'];
	$ukuranfile = $_FILES['file']['size'];
	$error = $_FILES['file']['error'];
	$tmpname = $_FILES['file']['tmp_name'];


	//cek apakah yang diupload file/gambar
	$eksfilevalid = ['jpg', 'jpeg', 'png', 'pdf'];
	$eksfile = explode('.', $namafile);
	$eksfile = strtolower(end($eksfile));


	if (!in_array($eksfile, $eksfilevalid)) {
		echo "<script> alret('Yang anda upload bukan Gambar/File PDF..!')</script>";
		return false;
	}

	//cek jika ukuran file terlalu besar
	if($ukuranfile > 1000000){
		echo "<script> alret('Ukuran file anda terlalu besar!')</script>";
		return false;
	}

	//jika lolos pengeecekan file bis diupload
	//generate nama file baru
	$namafilebaru  = uniqid();
	$namafilebaru .='.';
	$namafilebaru .= $eksfile;

	move_uploaded_file($tmpname, 'file/'.$namafilebaru);
	return $namafilebaru;
}

?>