<?php 

header("Content-type: application/octet-stream");

header("Content-Disposition: attachment; filename=$title.xls");

header("Pragma: no-cache");

header("Expires: 0");

?>

<table border="1" width="100%">

<thead>
<center><h2>Laporan Data barang</h2></center>
    <center><h3>Toko Serba Ada</h3></center>
<tr>

 <th>No. </th>
 <th>Kode Barang</th>
 <th>Nama Barang</th>
 <th>Harga Beli</th>
 <th>Harga jual</th>
 <th>Stock</th>



 </tr>

</thead>

<tbody

<?php $i=1; foreach($barang as $barang) { ?>

<tr>

 <td><?php echo $barang->id ?></td>
 <td><?php echo $barang->kode_barang ?></td>
 <td><?php echo $barang->nama_barang ?></td>
 <td><?php echo $barang->harga_beli ?></td>
 <td><?php echo $barang->harga_jual ?></td>
 <td><?php echo $barang->stok ?></td>

 </tr>

<?php $i++; } ?>

</tbody>

</table>