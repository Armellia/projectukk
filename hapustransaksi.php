<?php
	session_start();
	include "koneksi.php";
	$IdPenjualan=$_GET['IdPenjualan'];
	$IdBuku=$_GET['IdBuku'];
	$Jumlah=$_GET['Jumlah'];
	function kurangstokbuku($IdBuku,$Jumlah){
		$sql="select * from tbbuku where IdBuku='$IdBuku'";
		$query=mysql_query($sql);
		$data=mysql_fetch_array($query);
		$Stok=$data['Stok']+$Jumlah;
		
		return $Stok;
	}
	$Stok=kurangstokbuku($IdBuku,$Jumlah);
	$sql="delete from tbpenjualan where IdPenjualan='$IdPenjualan'";
	$sql2="update tbbuku set Stok='$Stok' where IdBuku='$IdBuku'";
	

	$query=mysql_query($sql);
	
	if($query)
	{
		mysql_query($sql2);
		echo "<script>
			alert('Data Berhasil Di Hapus!!');
			location.href='transaksi.php';
		</script>";
	}
	else 
	{
		echo "<script>
			alert('Data Gagal Di Hapus!!');
			location.href='transaksi.php';
		</script>";
	}
?>