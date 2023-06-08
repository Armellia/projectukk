<?php
	session_start();
	include "koneksi.php";
	$IdDistributor=$_POST['IdDistributor'];
	$NamaDistributor=$_POST['NamaDistributor'];
	$Alamat=$_POST['Alamat'];
	$Telp=$_POST['Telp'];
	
	$sql="update tbdistributor set NamaDistributor='$NamaDistributor' , Alamat='$Alamat' ,Telp='$Telp' where IdDistributor='$IdDistributor' ";
	$query=mysql_query($sql);
	
	if($query)
	{
		echo "<script>
			alert('Data Berhasil Di Edit !!');
			location.href='distributor.php';
		</script>";
	}
	else 
	{
		echo "<script>
			alert('Data Gagal Di Edit!!');
			location.href='editdistributor.php';
		</script>";
	}
?>