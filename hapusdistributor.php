<?php
	session_start();
	include "koneksi.php";
	$IdDistributor=$_GET['IdDistributor'];
	$sql="delete from tbdistributor where IdDistributor='$IdDistributor'";
	
	$query=mysql_query($sql);
	
	if($query)
	{
		echo "<script>
			alert('Data Berhasil Di Hapus!!');
			location.href='distributor.php';
		</script>";
	}
	else 
	{
		echo "<script>
			alert('Data Gagal Di Hapus!!');
			location.href='distributor.php';
		</script>";
	}
?>