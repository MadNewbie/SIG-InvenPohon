<?php
// We change the headers of the page so that the browser will know what sort of file is dealing with. Also, we will tell the browser it has to treat the file as an attachment which cannot be cached.
// var_dump($data);
// die();
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=laporan.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>
<table border='1'>
  <tr>
    <td>ID Pohon</td>
    <td>Nama Lokal</td>
    <td>Nama Ilmiah</td>
    <td>Nama Jalan</td>
    <td>Tinggi (Meter)</td>
    <td>Diameter Batang (Sentimeter)</td>
    <td>Lebar Tajuk (Meter)</td>
    <td>Bentuk Tajuk</td>
    <td>Kerusakan</td>
  </tr>
  <?php foreach ($data as $key => $value): ?>
    <tr>
      <td><?php echo (isset($value->id_pohon)) ? $value->id_pohon : "" ;?></td>
      <td><?php echo (isset($value->nama_lokal)) ? $value->nama_lokal : "" ;?></td>
      <td><?php echo (isset($value->nama_ilmiah)) ? $value->nama_ilmiah : "" ;?></td>
      <td><?php echo (isset($value->nama_jalan)) ? $value->nama_jalan : "" ;?></td>
      <td><?php echo (isset($value->tinggi)) ? $value->tinggi : 0 ;?></td>
      <td><?php echo (isset($value->diameter_pohon)) ? $value->diameter_pohon/pi() : 0 ;?></td>
      <td><?php echo (isset($value->lebar_tajuk)) ? $value->lebar_tajuk : 0 ;?></td>
      <td><?php echo (isset($value->bentuk_tajuk)) ? $value->bentuk_tajuk : "" ;?></td>
      <td><?php echo (isset($value->total_kerusakan)) ? $value->total_kerusakan : 0 ;?>%</td>
    </tr>
  <?php endforeach; ?>
</table>
