<?php
	session_start();
	include "koneksi.php";
	
	$NoTransaksi=$_GET['NoTransaksi'];
	
	$sql1="select tbpenjualan.*, tbbuku.* from tbpenjualan inner join tbbuku using (IdBuku) where tbpenjualan.Status=0 and tbpenjualan.NoTransaksi='$NoTransaksi'";
	$query1=mysql_query($sql1);
	$data1=mysql_fetch_array($query1);
?>

<link rel="stylesheet" href="style.css" />
<div id="bingkai">
    <h3 align="center">Pembayaran Buku</h3>
    <hr>
    <table align="center" width="98%" style="margin-left:130px;">
        <tr>
          	<td width="15%">No Transaksi </td>
            <td width="2%">:</td>
            <td><?php echo $data1['NoTransaksi'];?></td>
        </tr>
        <tr>
        	<td>Tanggal Transaksi</td>
            <td>:</td>
            <td><?php echo $data1['TglTransaksi'];?></td>
        </tr>
    </table>
    <br>
    <br/>
    <table align="center" width="80%" border="1">
    	<tr>
        	<th align="center">No</th>
            <th align="center">Judul Buku</th>
            <th align="center">NoISBN</th>
            <th align="center">Harga Jual</th>
            <th align="center">Jumlah</th>
            <th align="center">Diskon</th>
            <th align="center">PPN</th>
            <th align="center">Total</th>
        </tr>
        <?php
        	include "koneksi.php";
			$sql="select tbbuku.* , tbpenjualan.* from tbpenjualan inner join tbbuku using (IdBuku) where tbpenjualan.Status=0 and tbpenjualan.NoTransaksi='$NoTransaksi'";
			$query=mysql_query($sql);
			$No=1;
			while ($data=mysql_fetch_array($query))
			{
		?>
        <tr>
        	<td align="center"><?php echo $No;?></td>
            <td align="center"><?php echo $data['JudulBuku'];?></td>
            <td align="center"><?php echo $data['NoISBN'];?></td>
            <td align="center">Rp. <?php echo number_format($data['HargaJual']);?></td>
            <td align="center"><?php echo $data['Jumlah'];?></td>
            <td align="center"><?php echo $data['Diskon'];?> %</td>
            <td align="center"><?php echo $data['PPN'];?> %</td>
            <td align="center">Rp. <?php echo number_format($data['TotalBayar']); ?></td>
        </tr>
        <?php
        	$No++;
			}
		?>
        <?php 
			include "koneksi.php";
			$sql2="select SUM(TotalBayar) from tbpenjualan where tbpenjualan.Status=0 and tbpenjualan.NoTransaksi='$NoTransaksi'";
			$query2=mysql_query($sql2);
			$data2=mysql_fetch_array($query2)
		?>
        <tr align="center">
        	<td colspan="7" align="center">Total Bayar</td>
            <td align="center">Rp. <?php echo number_format($data2['SUM(TotalBayar)']); ?> </td>
        </tr>
        
        <tr>
        	<td align="center" colspan="8"><a href="prosesbayar.php?<?php echo "NoTransaksi=".$NoTransaksi;?>">Beli Buku</a></td>
        </tr>
    </table>
</div>