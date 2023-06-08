<?php
	session_start();
	include "koneksi.php";
	$IdBuku=$_GET['IdBuku'];
	$sql="delete from tbbuku where IdBuku='$IdBuku'";
	
	$query=mysql_query($sql);
	
	if($query)
	{
		echo "<script>
			alert('Data Berhasil Di Hapus!!');
			location.href='buku.php';
		</script>";
	}
	else 
	{
		echo "<script>
			alert('Data Gagal Di Hapus!!');
			location.href='buku.php';
		</script>";
	}
?>