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
    	<title>Kasir</title>
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
                <h3 align="center" style="margin-top:20px;">Isi Data Kasir</h3>
                <hr>
            	<form action="inputkasir.php" method="post" name="forminputkasir">
                	<table align="center" style="padding-top:20px;">
                        <tr>
                        	<td>Username :</td>
                            <td><input type="text" name="Username" size="30"></td>
                        </tr>
                        <tr>
                        	<td>Password :</td>
                            <td><input type="text" name="Password" size="30"></td>
                        </tr>
                        <tr>
                        	<td>Nama Lengkap :</td>
                            <td><input type="text" name="NamaLengkap" size="30"></td>
                        </tr>
                        <tr>
                        	<td>Alamat :</td>
                            <td><input type="text" name="Alamat" size="30"></td>
                        </tr>
                        <tr>
                        	<td>Telp :</td>
                            <td><input type="text" name="Telp" size="30"></td>
                        </tr>
                        <tr>
                        	<td>Status :</td>
                            <td><input type="text" name="Status" size="30" ></td>
                        </tr>
                        <tr>
                        	<td>Level :</td>
                            <td><input type="text" name="Level" size="30"></td>
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
                        <th>Username</th>
                        <th>Password</th>
                        <th>Nama Lengkap</th>
                        <th>Alamat</th>
                        <th>Telp</th>
                        <th>Status</th>
                        <th>Level</th>
                        <th>Aksi</th>
                    </tr>
                    <?php
                    	include "koneksi.php";
                        $sql="select * from tbkasir";
                        $query=mysql_query($sql);
                        $No=1;
                        while ($data=mysql_fetch_array($query))
                        {

					?>
                    <tr align="center">
                    	<td><?php echo $No;?></td>
                        <td><?php echo $data['Username'];?></td>
                        <td><?php echo $data['Password'];?></td>
                        <td><?php echo $data['NamaLengkap'];?></td>
                        <td><?php echo $data['Alamat'];?></td>
                        <td><?php echo $data['Telp'];?></td>
                        <td><?php echo $data['Status'];?></td>
                        <td><?php echo $data['Level'];?></td>
                        <td><a href="hapuskasir.php?<?php echo"IdKasir=".$data['IdKasir'];?>">Hapus</a> ||<a href="editkasir.php?<?php echo"IdKasir=".$data['IdKasir'];?>"> Edit</a></td>
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