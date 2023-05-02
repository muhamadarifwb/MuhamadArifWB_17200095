<?php 

header("Content-type: application/octet-stream");

header("Content-Disposition: attachment; filename=$title.xls");

header("Pragma: no-cache");

header("Expires: 0");

?>

<table border="1" width="100%">

<thead>
<center><h2>Laporan Data Kasir</h2></center>
    <center><h3>Toko Serba Ada</h3></center>
<tr>

 <th>No. </th>
 <th>Kode Kasir</th>
 <th>Nama kasir</th>
 <th>User Name</th>
 <th>Password</th>



 </tr>

</thead>

<tbody>

<?php $i=1; foreach($kasir as $kasir) { ?>

<tr>

 <td><?php echo $kasir->id ?></td>
 <td><?php echo $kasir->kode_kasir ?></td>
 <td><?php echo $kasir->nama_kasir ?></td>
 <td><?php echo $kasir->username_kasir ?></td>
 <td><?php echo $kasir->password_kasir ?></td>

 </tr>

<?php $i++; } ?>

</tbody>

</table>