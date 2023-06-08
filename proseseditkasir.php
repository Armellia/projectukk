<?php
	session_start();
	include "koneksi.php";
	$IdKasir=$_POST['IdKasir'];
	$Username=$_POST['Username'];
	$Password=$_POST['Password'];
	$NamaLengkap=$_POST['NamaLengkap'];
	$Alamat=$_POST['Alamat'];
	$Telp=$_POST['Telp'];
	$Status=$_POST['Status'];
	
	$sql="update tbkasir set Username='$Username', Password='$Password', NamaLengkap='$NamaLengkap' , Alamat='$Alamat', Telp='$Telp', Status='$Status' where IdKasir='$IdKasir'";
	$query=mysql_query($sql);
	
	if($query)
	{
		echo "<script>
			alert('Data Berhasil Di Edit !!');
			location.href='kasir.php';
		</script>";
	}
	else 
	{
		echo "<script>
			alert('Data Gagal Di Edit!!');
			location.href='editkasir.php';
		</script>";
	}
?>