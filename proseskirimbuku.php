<?php 
	include "koneksi.php";
	$IdPasok=$_POST['IdPasok'];
	$IdBuku=$_POST['IdBuku'];
	$Jumlah=$_POST['Jumlah'];
	$TglKeluar=$_POST['TglKeluar'];
	
	//babi ga mau ke kirim!!!!!!!!!!!!!!!!!!!!
	function jumlahbuku($IdBuku)
	{
		$sql="select Stok from tbbuku where IdBuku='$IdBuku'";
		$query=mysql_query($sql);
		$data=mysql_fetch_array($query);
		$StokAwal=$data['Stok'];
		return ($StokAwal);
	}
	
	$StokAwal=jumlahbuku($IdBuku);
	$StokSekarang=$StokAwal + $Jumlah;
	
	$sql="update tbbuku set Stok='$StokSekarang' where IdBuku='$IdBuku'";
	mysql_query($sql);
	$sql1="update tbpasok set Jumlah=0 where IdPasok='$IdPasok'";
	mysql_query($sql1);
	
	echo "<script>
		alert('Data Berhasil Dikirim!');
		location.href='pasok.php';
	</script>";
?>