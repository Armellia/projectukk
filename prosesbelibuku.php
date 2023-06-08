<?php
	session_start();
	include "koneksi.php";
	
	$IdKasir=$_SESSION['IdKasir'];
	$IdPenjualan=$_GET['IdPenjualan'];
	function buatnotransaksi()
	{
		$Kunci="ABCDEFGHIJKLMNPQRSTUVWXYZ123456789";
		$Huruf=substr(str_shuffle($Kunci),0,4);
		$Tahun=date('Y-m-d');
		$Kode=$Huruf.$Tahun;
		
		return($Kode);
	}
	
	$NoTransaksi=buatnotransaksi();
	$sql="update tbpenjualan set NoTransaksi='$NoTransaksi' where IdKasir='$IdKasir' and Status=0";
	mysql_query($sql);
	
	echo"<script>
		alert('Proses Pembayaran..');
		location.href='pembayaran.php?NoTransaksi=$NoTransaksi';
	</script>";
?>