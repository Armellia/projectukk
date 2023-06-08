<?php
	session_start();
	include "koneksi.php";
	$IdKasir=$_GET['IdKasir'];
	$sql="delete from tbkasir where IdKasir='$IdKasir'";
	
	$query=mysql_query($sql);
	
	if($query)
	{
		echo "<script>
			alert('Data Berhasil Di Hapus!!');
			location.href='kasir.php';
		</script>";
	}
	else 
	{
		echo "<script>
			alert('Data Gagal Di Hapus!!');
			location.href='kasir.php';
		</script>";
	}
?>