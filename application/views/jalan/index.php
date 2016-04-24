<?php echo anchor("jalan/insert");?>
<table>
  <tr>
    <th>
      Nama Jalan
    </th>
    <th>
      Operasi
    </th>
  </tr>
  <?php foreach ($result as $key): ?>
    <tr>
      <td>
        <?php echo $key->nama_jalan ?>
      </td>
      <td>
        <?php echo anchor("jalan/edit/".$key->id_nama_jalan);?>
      </td>
    </tr>
  <?php endforeach; ?>
</table>
<?php echo $links; ?>
