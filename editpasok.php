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
    	<title>Edit Pasok</title>
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
                    <li style="list-style-type:none;"><a href="transaksi.php">Transaksi</a></li>
                    <li style="list-style-type:none;"><a href="laporan.php">Laporan</a></li>
                    <li style="list-style-type:none;"><a href="logout.php">Logout</a></li>
                    <?php } else { ?> 
                    <li style="list-style-type:none;"><a href="#">Pencarian Buku</a></li>
                    <li style="list-style-type:none;"><a href="transaksi.php">Transaksi</a></li>
                    <li style="list-style-type:none;"><a href="laporan.php">Laporan</a></li>
                    <li style="list-style-type:none;"><a href="logout.php">Logout</a></li>
                    <?php } ?>
                </ul>
            </div>
            <div id="konten">
            	<div id="kotakkecil" style="margin-top:0px; height:400px;" >
                <h3 align="center" style="margin-top:20px;">Edit Data Pasok</h3>
                <hr>
            	<form action="proseseditpasok.php" method="post" name="formeditpasok">
                	<table align="center" style="padding-top:20px;">
                    <?php
                    	include "koneksi.php";
                	$IdPasok=$_GET['IdPasok'];
					$sql="select tbpasok.* , tbdistributor.NamaDistributor, tbbuku.JudulBuku from tbpasok inner join tbdistributor using (IdDistributor) inner join tbbuku using (IdBuku) where IdPasok='$IdPasok'";
					$query=mysql_query($sql);
					$data=mysql_fetch_array($query);
					$IdDistributor=$data['IdDistributor'];
					$IdBuku=$data['IdBuku'];
						
					?>
                        <tr>
                        	<td>Nama Distributor :</td>
                            <td><select name="IdDistributor">
                            	<?php
									include "koneksi.php";
                                	$sql1="select * from tbdistributor where IdDistributor='$IdDistributor'";
									$query1=mysql_query($sql1);
									$data1=mysql_fetch_array($query1);
									
									echo "<option value='$data1[IdDistributor]'>$data1[NamaDistributor]</option>";
								?>
                                <?php
                                	$sql2="select * from tbdistributor where IdDistributor NOT IN ($IdDistributor)";
									$query2=mysql_query($sql2);
									while($data2=mysql_fetch_array($query2))
									{
										echo "<option value='$data2[IdDistributor];'>$data2[NamaDistributor]</option>";
									}
								?>
                            </select>
                            <input type="hidden" name="IdPasok" value="<?php echo $data['IdPasok'];?>"></td>
                        </tr>
                        <tr>
                        	<td>Judul Buku :</td>
                            <td><select name="IdBuku">
                            	<?php
									
                                	$sql3="select * from tbbuku where IdBuku='$IdBuku'";
									$query3=mysql_query($sql3);
									$data3=mysql_fetch_array($query3);
									
									echo "<option value='$data3[IdBuku]'>$data3[JudulBuku]</option>";
								?>
                                <?php
                                	$sql4="select * from tbbuku where IdBuku NOT IN ($IdBuku)";
									$query4=mysql_query($sql4);
									while($data4=mysql_fetch_array($query4))
									{
										echo "<option value='$data4[IdBuku];'>$data4[JudulBuku]</option>";
									}
								?>
                            </select></td>
                        </tr>
                        <tr>
                        	<td>Jumlah :</td>
                            <td><input type="text" name="Jumlah" size="30" value="<?php echo $data['Jumlah'];?>"></td>
                        </tr>
                        <tr>
                        	<td>Tanggal Masuk :</td>
                            <td><input type="text" name="TglMasuk" size="30" value="<?php echo $data['TglMasuk'];?>">
                            <input type="hidden" name="IdPasok" value="<?php echo $data['IdPasok'];?>"></td>
                        </tr>
                        <tr>
                        	<td>Tanggal Keluar :</td>
                            <td><input type="text" name="TglKeluar" size="30" value="<?php echo date('Y-m-d'); ?>"></td>
                        </tr>
                        <tr>
                        	<td></td>
                            <td><input type="submit" value="Edit">
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