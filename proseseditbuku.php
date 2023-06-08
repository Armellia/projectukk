<?php
	session_start();
	include "koneksi.php";
	$IdBuku=$_POST['IdBuku'];
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
	
	$sql="update tbbuku set JudulBuku='$JudulBuku' , NoISBN='$NoISBN' , Penulis='$Penulis', Penerbit='$Penerbit' ,TahunTerbit='$TahunTerbit',Stok='$Stok',HargaPokok='$HargaPokok',HargaJual='$HargaJual', PPN='$PPN', Diskon='$Diskon' where IdBuku='$IdBuku'";
	$query=mysql_query($sql);
	
	if($query)
	{
		echo "<script>
			alert('Data Berhasil Di Edit !!');
			location.href='buku.php';
		</script>";
	}
	else 
	{
		echo "<script>
			alert('Data Gagal Di Edit!!');
			location.href='editbuku.php';
		</script>";
	}
?>