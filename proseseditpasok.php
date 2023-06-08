<?php
	session_start();
	include "koneksi.php";
	$IdPasok=$_POST['IdPasok'];
	$IdDistributor=$_POST['IdDistributor'];
	$IdBuku=$_POST['IdBuku'];
	$Jumlah=$_POST['Jumlah'];
	$TglMasuk=$_POST['TglMasuk'];
	$TglKeluar=date('Y-m-d');
	
	$sql="update tbpasok set IdDistributor='$IdDistributor', IdBuku='$IdBuku', Jumlah='$Jumlah', TglMasuk='$TglMasuk', TglKeluar='$TglKeluar' where IdPasok='$IdPasok'";
	$query=mysql_query($sql);
	
	if($query)
	{
		echo "<script>
			alert('Data Berhasil Di Edit !!');
			location.href='pasok.php';
		</script>";
	}
	else 
	{
		echo "<script>
			alert('Data Gagal Di Edit!!');
			location.href='editpasok.php';
		</script>";
	}
?>