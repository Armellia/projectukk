<?php
	session_start();
	include "koneksi.php";
	$NoTransaksi="";
	$Jumlah=$_POST['Jumlah'];
	$IdBuku=$_POST['IdBuku'];
	
	function carihargabuku($IdBuku)
	{
		$sql="select * from tbbuku where IdBuku=$IdBuku";
		$query=mysql_query($sql);
		$data=mysql_fetch_array($query);
		
		$Diskon=$data['Diskon'];
		$HargaJual=$data['HargaJual'];
		$PPN=$data['PPN'];
		
		$TotalHarga=($HargaJual)-($HargaJual*$Diskon)/100 + ($HargaJual*$PPN)/100;
		return $TotalHarga;
	}
	
	function kurangstokbuku($IdBuku,$Jumlah)
	{
		$sql="select * from tbbuku where IdBuku='$IdBuku'";
		$query=mysql_query($sql);
		$data=mysql_fetch_array($query);
		$Stok=$data['Stok']-$Jumlah;
		
		return $Stok;
	}
	
	$Stok=kurangstokbuku($IdBuku,$Jumlah);
	$IdKasir=$_SESSION['IdKasir'];
	$TotalBayar=carihargabuku($IdBuku);
	$Total=$TotalBayar*$Jumlah;
	$TglTransaksi=date('Y-m-d');
	$Status=0;
	
	$sql="insert into tbpenjualan values('','$NoTransaksi','$IdBuku','$IdKasir','$Jumlah','$Total','$TglTransaksi','$Status')";
	$sql1="update tbbuku set Stok='$Stok' where IdBuku='$IdBuku'";
	
	if($Stok>=0)
	{
	$query=mysql_query($sql);
	mysql_query($sql1);
		echo "<script>
			alert('Data Berhasil Di input');
			location.href='transaksi.php';
		</script>";
	
	}
	else 
	echo "<script>
		alert('Data Gagal Di input');
		location.href='transaksi.php';
	</script>";
?>