<?php echo anchor("jenis_pohon/insert");?>
<table>
  <tr>
    <th>
      Nama Lokal
    </th>
    <th>
      Nama Ilmiah
    </th>
    <th>
      Operasi
    </th>
  </tr>
  <?php foreach ($result as $key): ?>
    <tr>
      <td>
        <?php echo $key->nama_lokal ?>
      </td>
      <td>
        <?php echo $key->nama_ilmiah ?>
      </td>
      <td>
        <?php echo anchor("jenis_pohon/edit/".$key->id_jenis_pohon);?>
      </td>
    </tr>
  <?php endforeach; ?>
</table>
<?php echo $links; ?>
