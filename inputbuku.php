<?php
	session_start();
	include "koneksi.php";
	
	$JudulBuku=$_POST['JudulBuku'];
	$NoISBN=$_POST['NoISBN'];
	$Penulis=$_POST['Penulis'];
	$Penerbit=$_POST['Penerbit'];
	$TahunTerbit=$_POST['TahunTerbit'];
	$Stok=$_POST['Stok'];
	$HargaPokok=$_POST['HargaPokok'];
	$HargaJual=$_POST['HargaJual'];
	$PPN=$_POST['PPN'];
	$Diskon=$_POST['Diskon'];
	
	$sql="insert into tbbuku values('','$JudulBuku','$NoISBN','$Penulis','$Penerbit','$TahunTerbit','$Stok','$HargaPokok','$HargaJual','$PPN','$Diskon')";
	$query=mysql_query($sql);
	
	if($query)
	{
		echo "<script>
			alert('Input Data Berhasil!!');
			location.href='buku.php';
		</script>";
	}
	else {
		echo "<script>
			alert('Data Gagal Di Input!!');
			location.href='buku.php';
		</script>";
	}
?>