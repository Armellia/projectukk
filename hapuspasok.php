<?php
	session_start();
	include "koneksi.php";
	$IdPasok=$_GET['IdPasok'];
	$sql="delete from tbpasok where IdPasok='$IdPasok'";
	
	$query=mysql_query($sql);
	
	if($query)
	{
		echo "<script>
			alert('Data Berhasil Di Hapus!!');
			location.href='pasok.php';
		</script>";
	}
	else 
	{
		echo "<script>
			alert('Data Gagal Di Hapus!!');
			location.href='pasok.php';
		</script>";
	}
?>