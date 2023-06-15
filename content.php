<?php  

	@$halaman=$_GET['halaman'];

	if ($halaman == "departemen") 
	{
		//echo "Tampil";
		include "menu/departemen/departemen.php";
		
	}
	elseif ($halaman == "pengirim_surat") 
	{
		include "menu/pengirim_surat/pengirim_surat.php";
		
	}
	elseif ($halaman == "arsip_surat") 
	{
		if(@$_GET['hal'] =="tambahdata" || @$_GET['hal'] =="edit" || @$_GET['hal'] =="hapus"){
			include "menu/arsip/form.php";
			
		}else{
			include "menu/arsip/data.php";
			
		}
	}
    elseif ($halaman== "kelola") {

    	include "kelola.php";
    }
	else
	{
		//echo "Tampil Home";
		include "dashboard.php";
		include "dashboard2.php";

	}
?>