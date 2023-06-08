<?php
	session_start();
	$NamaLengkap=$_SESSION['NamaLengkap'];
	$Level=$_SESSION['Level'];
	
	if($NamaLengkap=="")
	{
		echo "<script>
			alert('Maaf Anda Tidak Bisa Mengakses Halaman ini!!');
			location.href='login.php';
		</script>";
	}
?>

<html>
	<head>
    	<title>Kirim Buku</title>
        <link rel="stylesheet" href="style.css">
    </head>
    
    <body>
    	<div id="kotak">
        	<div id="header"></div>
            <div id="topmenu">
            	<?php if($Level=="Admin")
				{
					?>
            	<ul>
                	<li style="list-style-type:none;"><a href="#">Pencarian Buku</a></li>
                    <li style="list-style-type:none;"><a href="distributor.php">Distributor</a></li>
                    <li style="list-style-type:none;"><a href="buku.php">Buku</a></li>
                    <li style="list-style-type:none;"><a href="kasir.php">Kasir</a></li>
                    <li style="list-style-type:none;"><a href="pasok.php">Pasok</a></li>
                    <li style="list-style-type:none;"><a href="transaksi">Transaksi</a></li>
                    <li style="list-style-type:none;"><a href="laporan.php">Laporan</a></li>
                    <li style="list-style-type:none;"><a href="logout">Logout</a></li>
                    <?php } else { ?> 
                    <li style="list-style-type:none;"><a href="#">Pencarian Buku</a></li>
                    <li style="list-style-type:none;"><a href="transaksi">Transaksi</a></li>
                    <li style="list-style-type:none;"><a href="laporan.php">Laporan</a></li>
                    <li style="list-style-type:none;"><a href="logout">Logout</a></li>
                    <?php } ?>
                </ul>
            </div>
            <div id="konten">
            	<div id="kotakkecil" style="margin-top:0px; height:400px;" >
                <h3 align="center" style="margin-top:20px;">Kirim Buku</h3>
                <hr>
            	<form action="proseskirimbuku.php" method="post" name="formkirimbuku">
                	<table align="center" style="padding-top:20px;">
                    <?php
                    	include "koneksi.php";
                	$IdPasok=$_GET['IdPasok'];
					$sql="select * from tbpasok where IdPasok='$IdPasok'";
					$query=mysql_query($sql);
					$data=mysql_fetch_array($query);
					?>
                        <tr>
                        	<td>Nama Distributor :</td>
                            <td>
                            	<?php
									$IdDistributor=$data['IdDistributor'];
                                	$sql1="select * from tbdistributor where IdDistributor='$IdDistributor'";
									$query1=mysql_query($sql1);
									$data1=mysql_fetch_array($query1);
								?>
                            <input type="hidden" name="IdPasok" value="<?php echo $data['IdPasok'];?>"><input type="hidden" name="IdBuku" value="<?php echo $data['IdBuku'];?>">
                            <input type="text" name="NamaDistributor" value="<?php echo $data1['NamaDistributor'];?>" readonly></td>
                        </tr>
                        <tr>
                        	<td>Judul Buku :</td>
                            <td>
                            	<?php
									$IdBuku=$data['IdBuku'];
                                	$sql2="select * from tbbuku where IdBuku='$IdBuku'";
									$query2=mysql_query($sql2);
									$data2=mysql_fetch_array($query2);
								?>
                                <input type="text" name="JudulBuku" value="<?php echo $data2['JudulBuku'];?>" readonly>
                               </td>
                        </tr>
                        <tr>
                        	<td>Jumlah :</td>
                            <td><input type="text" name="Jumlah" size="30" value="<?php echo $data['Jumlah'];?>" readonly></td>
                        </tr>
                        <tr>
                        	<td>Tanggal Keluar :</td>
                            <td><input type="text" name="TglKeluar" size="30" value="<?php echo date('Y-m-d'); ?>" readonly></td>
                        </tr>
                        <tr>
                        	<td></td>
                            <td><input type="submit" value="Kirim">
                            	<input type="reset" value="Batal">
                            </td>
                        </tr>
                    </table>
                </form>
                </div>
            </div>
            <div id="footer"></div>
        </div>
    </body>
</html>