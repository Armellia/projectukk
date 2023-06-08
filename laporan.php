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
    	<title>Halaman Utama</title>
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
            	<div id="kotakkecil">
            	<form action="cetaklaporan.php" method="post">
                <h3 align="center">Laporan</h3>
                <hr>
                	<table align="center" style="padding-top:40px;">
                    	<tr>
                        	<td>Nama Kasir</td>
                            <td>
                            	<select name="IdKasir">
                                	<?php
                                    	include "koneksi.php";
										$sql="select tbkasir.NamaLengkap , tbpenjualan.* from tbpenjualan inner join tbkasir using (IdKasir) group by tbpenjualan.IdKasir";
										$query=mysql_query($sql);
										while($data=mysql_fetch_array($query))
										{
											echo "<option value=$data[IdKasir]>$data[NamaLengkap]</option>";

										}
									?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                        	<td></td>
                            <td ><input type="submit" value="Tampil"></td>
                        </tr>
                    </table>
                </form>
                </div>	
            </div>
            <div id="footer"></div>
        </div>
    </body>
</html>