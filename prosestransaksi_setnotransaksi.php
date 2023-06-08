<?php
	session_start();
	include "koneksi.php";
	$IdKasir=$_SESSION['IdKasir'];
	
	function buatnotransaksi()
	{
		$Kunci="ABCDEFGHIJKLMNPQRSTUVWXYZ123456789";
		$Huruf=substr(str_shuffle($Kunci),0,4);
		
		$Tahun=date('Y-m-d');
		$Kode=$Tahun.$Kunci;
		return $Kode;
	}
	
	$NoTransaksi=buatnotransaksi();
	$sql="update tbpenjualan set NoTransaksi='$NoTransaksi' where Status=0 and  IdKasir='$IdKasir'";
	$sql1="select * from tbpenjualan where Status=0";
	$query1=mysql_query($sql1);
	
	if(mysql_num_rows($sql)>0)
	{
		$query=mysql_query($sql);
		if($query)
		{
			echo "<script>
				alert('Pembelian berhasil');
				location.href='pembayaran.php?NoTransaksi='$NoTransaksi'';
			</script>";
		}
		else 
		{
			echo "<script>
				alert('Pastikan Ada buku yg ingin di beli');
				location.href='transaksi.php';
			</script>";
		}
	}
?>