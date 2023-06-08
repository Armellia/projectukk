<?php
	session_start();
	include "koneksi.php";
	
	$NoTransaksi=$_GET['NoTransaksi'];
	
	$sql="update tbpenjualan set Status=1 where NoTransaksi='$NoTransaksi'";
	$query=mysql_query($sql);
	
	if($query)
	{
		echo "<script>
			alert('Pembayaran Berhasil');
			location.href='cetaknota.php?NoTransaksi=$NoTransaksi';
		</script>";
	}
?>