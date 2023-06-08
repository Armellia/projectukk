<?php
	session_start();
	include "koneksi.php";
	
	$IdDistributor=$_POST['IdDistributor'];
	$IdBuku=$_POST['IdBuku'];
	$Jumlah=$_POST['Jumlah'];
	$TglMasuk=$_POST['TglMasuk'];
	
	$sql="insert into tbpasok values('','$IdDistributor','$IdBuku','$Jumlah','$TglMasuk','')";
	$query=mysql_query($sql);
	
	if($query)
	{
		echo "<script>
			alert('Input Data Berhasil!!');
			location.href='pasok.php';
		</script>";
	}
	else {
		echo "<script>
			alert('Data Gagal Di Input!!');
			location.href='pasok.php';
		</script>";
	}
?>