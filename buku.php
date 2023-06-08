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
    	<title>Buku</title>
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
                <h3 align="center" style="margin-top:20px;">Isi Data Buku</h3>
                <hr>
            	<form action="inputbuku.php" method="post" name="forminputbuku">
                	<table align="center" style="padding-top:20px;">
                        <tr>
                        	<td>Judul Buku :</td>
                            <td><input type="text" name="JudulBuku" size="30"></td>
                        </tr>
                        <tr>
                        	<td>NoISBN :</td>
                            <td><input type="text" name="NoISBN" size="30"></td>
                        </tr>
                        <tr>
                        	<td>Penulis :</td>
                            <td><input type="text" name="Penulis" size="30"></td>
                        </tr>
                        <tr>
                        	<td>Penerbit :</td>
                            <td><input type="text" name="Penerbit" size="30"></td>
                        </tr>
                        <tr>
                        	<td>Tahun Terbit :</td>
                            <td><input type="text" name="TahunTerbit" size="30"></td>
                        </tr>
                        <tr>
                        	<td>Stok :</td>
                            <td><input type="text" name="Stok" size="30" readonly></td>
                        </tr>
                        <tr>
                        	<td>Harga Pokok :</td>
                            <td><input type="text" name="HargaPokok" size="30"></td>
                        </tr>
                        <tr>
                        	<td>Harga Jual :</td>
                            <td><input type="text" name="HargaJual" size="30"></td>
                        </tr>
                        <tr>
                        	<td>PPN :</td>
                            <td><input type="text" name="PPN" size="30"></td>
                        </tr>
                        <tr>
                        	<td>Diskon :</td>
                            <td><input type="text" name="Diskon" size="30"></td>
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
                        <th>No ISBN</th>
                        <th>Penulis</th>
                        <th>Penerbit</th>
                        <th>Tahun Terbit</th>
                        <th>Stok</th>
                        <th>Harga Pokok</th>
                        <th>Harga Jual</th>
                        <th>PPN</th>
                        <th>Diskon</th>
                        <th>Aksi</th>
                    </tr>
                    <?php
                    	include "koneksi.php";
                        $sql="select * from tbbuku";
                        $query=mysql_query($sql);
                        $No=1;
                        while ($data=mysql_fetch_array($query))
                        {

					?>
                    <tr align="center">
                    	<td><?php echo $No;?></td>
                        <td><?php echo $data['JudulBuku'];?></td>
                        <td><?php echo $data['NoISBN'];?></td>
                        <td><?php echo $data['Penulis'];?></td>
                        <td><?php echo $data['Penerbit'];?></td>
                        <td><?php echo $data['TahunTerbit'];?></td>
                        <td><?php echo $data['Stok'];?></td>
                        <td><?php echo $data['HargaPokok'];?></td>
                        <td><?php echo $data['HargaJual'];?></td>
                        <td><?php echo $data['PPN'];?>%</td>
                        <td><?php echo $data['Diskon'];?>%</td>
                        <td><a href="hapusbuku.php?<?php echo"IdBuku=".$data['IdBuku'];?>">Hapus</a> ||<a href="editbuku.php?<?php echo"IdBuku=".$data['IdBuku'];?>"> Edit</a></td>
                    </tr>
                    <?php
                    	$No++;
						}
					?>
                </table>
            </div>
            <div id="footer"></div>
        </div>
    </body>
</html>