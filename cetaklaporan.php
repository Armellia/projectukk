 <table align="center" width="100%" border="1">
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
			$IdKasir=$_POST['IdKasir'];
			$sql="select tbbuku.* , tbpenjualan.* from tbpenjualan inner join tbbuku on tbpenjualan.IdBuku=tbbuku.IdBuku where tbpenjualan.IdKasir='$IdKasir'";
			$query=mysql_query($sql);
			$No=1;
			$Total=0;
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
			$Total=$Total+$data['TotalBayar'];
        	$No++;
			}
		?>
        <tr align="center">
        	<td colspan="7" align="center">Total Bayar</td>
            <td align="center">Rp. <?php echo $Total; ?> </td>
        </tr>
        <tr>
        	<td align="center" colspan="8"><a href="javascript:window.print;">Cetak Laporan</a></td>
        </tr>
    </table>
</div>