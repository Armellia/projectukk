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
                <h3 align="center" style="margin-top:20px;">Edit Data Kasir</h3>
                <hr>
            	<form action="proseseditkasir.php" method="post" name="formeditkasir">
                	<table align="center" style="padding-top:20px;">
                    <?php
                    	include "koneksi.php";
                	$IdKasir=$_GET['IdKasir'];
					$sql="select * from tbkasir where IdKasir='$IdKasir'";
					$query=mysql_query($sql);
					$data=mysql_fetch_array($query);
						
					?>
                        <tr>
                        	<td>Username :</td>
                            <td><input type="hidden" name="IdKasir" size="30" value="<?php echo $data['IdKasir'];?>"><input type="text" name="Username" size="30" value="<?php echo $data['Username'];?>"></td>
                        </tr>
                        <tr>
                        	<td>Password :</td>
                            <td><input type="text" name="Password" size="30" value="<?php echo $data['Password'];?>"></td>
                        </tr>
                        <tr>
                        	<td>Nama Lengkap :</td>
                            <td><input type="text" name="NamaLengkap" size="30" value="<?php echo $data['NamaLengkap'];?>"></td>
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
                        	<td>Status :</td>
                            <td><input type="text" name="Status" size="30" value="<?php echo $data['Status'];?>" readonly></td>
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