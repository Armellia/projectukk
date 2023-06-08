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
    	<title>Edit Buku</title>
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
                <h3 align="center" style="margin-top:20px;">Edit Data Buku</h3>
                <hr>
            	<form action="proseseditbuku.php" method="post" name="formeditbuku">
                	<table align="center" style="padding-top:20px;">
                    <?php
                    	include "koneksi.php";
                	$IdBuku=$_GET['IdBuku'];
					$sql="select * from tbbuku where IdBuku='$IdBuku'";
					$query=mysql_query($sql);
					$data=mysql_fetch_array($query);
						
					?>
                        <tr>
                        	<td>Judul Buku :</td>
                            <td>
                            <input type="hidden" name="IdBuku" size="30" value="<?php echo $IdBuku;?>"><input type="text" name="JudulBuku" size="30" value="<?php echo $data['JudulBuku'];?>"></td>
                        </tr>
                        <tr>
                        	<td>NoISBN :</td>
                            <td><input type="text" name="NoISBN" size="30" value="<?php echo $data['NoISBN'];?>"></td>
                        </tr>
                        <tr>
                        	<td>Penulis :</td>
                            <td><input type="text" name="Penulis" size="30" value="<?php echo $data['Penulis'];?>"></td>
                        </tr>
                        <tr>
                        	<td>Penerbit :</td>
                            <td><input type="text" name="Penerbit" size="30" value="<?php echo $data['Penerbit'];?>"></td>
                        </tr>
                        <tr>
                        	<td>Tahun Terbit :</td>
                            <td><input type="text" name="TahunTerbit" size="30" value="<?php echo $data['TahunTerbit'];?>"></td>
                        </tr>
                        <tr>
                        	<td>Stok :</td>
                            <td><input type="text" name="Stok" size="30" value="<?php echo $data['Stok'];?>" readonly></td>
                        </tr>
                        <tr>
                        	<td>Harga Pokok :</td>
                            <td><input type="text" name="HargaPokok" size="30" value="<?php echo $data['HargaPokok'];?>"></td>
                        </tr>
                        <tr>
                        	<td>Harga Jual :</td>
                            <td><input type="text" name="HargaJual" size="30" value="<?php echo $data['HargaJual'];?>"></td>
                        </tr>
                        <tr>
                        	<td>PPN :</td>
                            <td><input type="text" name="PPN" size="30" value="<?php echo $data['PPN'];?>"></td>
                        </tr>
                        <tr>
                        	<td>Diskon :</td>
                            <td><input type="text" name="Diskon" size="30" value="<?php echo $data['Diskon'];?>"></td>
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