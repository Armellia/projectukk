<?php
	session_start();
	include "koneksi.php";
	
	$NamaDistributor=$_POST['NamaDistributor'];
	$Alamat=$_POST['Alamat'];
	$Telp=$_POST['Telp'];
	
	$sql="insert into tbdistributor values('','$NamaDistributor','$Alamat','$Telp')";
	$query=mysql_query($sql);
	
	if($query)
	{
		echo "<script>
			alert('Input Data Berhasil!!');
			location.href='distributor.php';
		</script>";
	}
	else {
		echo "<script>
			alert('Data Gagal Di Input!!');
			location.href='distributor.php';
		</script>";
	}
?>