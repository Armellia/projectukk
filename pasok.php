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
                <h3 align="center" style="margin-top:20px;">Isi Data Pasok</h3>
                <hr>
            	<form action="inputpasok.php" method="post" name="forminputpasok">
                	<table align="center" style="padding-top:20px;">
                        <tr>
                        	<td>Nama Distributor :</td>
                            <td><select name="IdDistributor">
                            	<option value="">
                                	<?php
                                    	include "koneksi.php";
										$sql="select * from tbdistributor";
										$query=mysql_query($sql);
										while($data=mysql_fetch_array($query))
										{
											echo "<option value='$data[IdDistributor];'>$data[NamaDistributor]</option>";
										}
									?>
                                </option>
                            </select></td>
                        </tr>
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
                        	<td>Tanggal Masuk :</td>
                            <td><input type="text" name="TglMasuk" size="30" value="<?php echo date('Y-m-d');?>"></td>
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
                        <th>Nama Distributor</th>
                        <th>Judul Buku</th>
                        <th>Jumlah</th>
                        <th>Tanggal Masuk</th>
                        <th>Aksi</th>
                    </tr>
                    <?php
                    	include "koneksi.php";
                        $sql="select tbpasok.*,tbdistributor.*,tbbuku.* from tbpasok inner join tbdistributor using(IdDistributor) inner join tbbuku using(IdBuku)";
                        $query=mysql_query($sql);
                        $No=1;
                        while ($data=mysql_fetch_array($query))
                        {

					?>
                    <tr align="center">
                    	<td><?php echo $No;?></td>
                        <td><?php echo $data['NamaDistributor'];?></td>
                        <td><?php echo $data['JudulBuku'];?></td>
                        <td><?php echo $data['Jumlah'];?></td>
                        <td><?php echo $data['TglMasuk'];?></td>
                        <td><a href="hapuspasok.php?<?php echo"IdPasok=".$data['IdPasok'];?>">Hapus</a> ||<a href="editpasok.php?<?php echo"IdPasok=".$data['IdPasok'];?>"> Edit</a>|| <a href="kirimbuku.php?<?php echo"IdPasok=".$data['IdPasok'];?>"> Detail </a></td>
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