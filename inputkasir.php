<?php
	session_start();
	include "koneksi.php";
	
	$Username=$_POST['Username'];
	$Password=$_POST['Password'];
	$NamaLengkap=$_POST['NamaLengkap'];
	$Alamat=$_POST['Alamat'];
	$Telp=$_POST['Telp'];
	$Status=$_POST['Status'];
	$Level=$_POST['Level'];
	
	$sql="insert into tbkasir values('','$Username','$Password','$NamaLengkap','$Alamat','$Telp','$Status','$Level')";
	$query=mysql_query($sql);
	
	if($query)
	{
		echo "<script>
			alert('Input Data Berhasil!!');
			location.href='kasir.php';
		</script>";
	}
	else {
		echo "<script>
			alert('Data Gagal Di Input!!');
			location.href='kasir.php';
		</script>";
	}
?>