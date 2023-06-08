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
    	<title>Distributor</title>
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
            	<div id="kotakkecil" style="margin-top:0px; height:250px;" >
                <h3 align="center" style="margin-top:20px;">Isi Data Distributor</h3>
                <hr>
            	<form action="proseseditdistributor.php" method="post" name="formeditdistributor">
                	<table align="center" style="padding-top:20px;">
                    <?php
                    	include "koneksi.php";
                	$IdDistributor=$_GET['IdDistributor'];
					$sql="select * from tbdistributor where IdDistributor='$IdDistributor'";
					$query=mysql_query($sql);
					$data=mysql_fetch_array($query);
						
					?>
                        <tr>
                        	<td>Nama Distributor :</td>
                            <td><input type="hidden" name="IdDistributor" value="<?php echo $data['IdDistributor'];?>"><input type="text" name="NamaDistributor" size="30" value="<?php echo $data['NamaDistributor'];?>"></td>
                        </tr>
                        <tr>
                        	<td>Alamat :</td>
                            <td><input type="text" name="Alamat" size="30" value="<?php echo $data['Alamat'];?>"></td>
                        </tr>
                        <tr>
                        	<td>Telp :</td>
                            <td><input type="text" name="Telp" size="30" value="<?php echo $data['Telp'];?>"></td>
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