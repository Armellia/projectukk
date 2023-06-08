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
    	<title>Pasok</title>
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
            	<div id="kotakkecil" style="margin-top:0px; height:300px;" >
                <h3 align="center" style="margin-top:20px;">Transaksi Barang</h3>
                <hr>
            	<form action="prosestransaksi.php" method="post" name="prosestransaksi">
                	<table align="center" style="padding-top:20px;">
                        <tr>
                        	<td>Judul Buku :</td>
                            <td><select name="IdBuku">
                            	<option value="">
                                	<?php
                                    	include "koneksi.php";
										$sql="select * from tbbuku";
										$query=mysql_query($sql);
										while($data=mysql_fetch_array($query))
										{
											echo "<option value='$data[IdBuku];'>$data[JudulBuku]</option>";
										}
									?>
                                </option>
                            </select></td>
                        </tr>
                        <tr>
                        	<td>Jumlah :</td>
                            <td><input type="text" name="Jumlah" size="30"></td>
                        </tr>
                        
                        <tr>
                        	<td></td>
                            <td><input type="submit" value="Input">
                            	<input type="reset" value="Batal">
                            </td>
                        </tr>
                    </table>
                </form>
                </div>
                <br>
                <br>
                <table align="center" border="1" width="80%">
                	<tr>
                    	<th>No</th>
                        <th>Judul Buku</th>
                        <th>NoISBN</th>
                        <th>Harga Jual</th>
                        <th>Jumlah</th>
                        <th>Diskon</th>
                        <th>PPN</th>
                        <th>Total</th>
                        <th>Aksi</th>
                    </tr>
                    <?php
                    	include "koneksi.php";
                        $sql="select * from tbpenjualan inner join tbbuku using (IdBuku) where Status=0";
                        $query=mysql_query($sql);
                        $No=1;
                        while ($data=mysql_fetch_array($query))
                        {

					?>
                    <tr align="center">
                    	<td><?php echo $No;?></td>
                        <td><?php echo $data['JudulBuku'];?></td>
                        <td><?php echo $data['NoISBN'];?></td>
                        <td>Rp.<?php echo number_format($data['HargaJual']);?></td>
                        <td><?php echo $data['Jumlah'];?></td>
                        <td><?php echo $data['Diskon'];?>%</td>
                        <td><?php echo $data['PPN'];?>%</td>
                        <td>Rp.<?php echo number_format($data['TotalBayar']);?></td>
                        <td><a href="hapustransaksi.php?<?php echo "IdPenjualan=".$data['IdPenjualan'];?>&<?php echo "IdBuku=".$data['IdBuku'];?>&<?php echo "Jumlah=".$data['Jumlah'];?>">Hapus</a></td>
                    </tr>
                    <?php
                    	$No++;
						}
					?>
                    <?php
                    	include "koneksi.php";
						$sql1="select SUM(TotalBayar) from tbpenjualan where Status=0";
						$Total=0;
						$query1=mysql_query($sql1);
						$data1=mysql_fetch_array($query1);
					?>
                    <?php ?>
                    <tr align="center">
                    	<td colspan="7">Total Bayar</td>
                        <td colspan="2">Rp.<?php echo number_format($data1['SUM(TotalBayar)']); ?></td>
                    </tr>
                    <tr align="center">
                    	<td colspan="9"><a a href="prosesbelibuku.php?<?php echo"IdPenjualan=".$data['IdPenjualan'];?>" style="text-decoration:none; font-size:18px;">Beli Buku</a></td>
                    </tr>
                </table>
            </div>
            <div id="footer"></div>
        </div>
    </body>
</html>