<table>
  <tr>
    <th>
      Nama Lengkap
    </th>
    <th>
      Username
    </th>
    <th>
      Tingkatan
    </th>
    <th>
      Operasi
    </th>
  </tr>
  <?php foreach ($result as $key): ?>
    <tr>
      <td>
        <?php echo $key->nama_lengkap ?>
      </td>
      <td>
        <?php echo $key->username ?>
      </td>
      <td>
        <?php echo $key->tingkat_user ?>
      </td>
      <td>
        <?php echo anchor("user/edit/".$key->id_user);?>
      </td>
    </tr>
  <?php endforeach; ?>
</table>
<?php echo $links; ?>
