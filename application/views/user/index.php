<?php echo anchor("user/insert","Tambah User",array('class'=>'btn btn-primary'));?>
<table class="table">
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
    <tr style="height:25px">
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
        <div class="btn-group">
          <?php echo anchor("user/edit/".$key->id_user,"Ubah User",array('class'=>'btn btn-success'));?>
        </div>
      </td>
    </tr>
  <?php endforeach; ?>
</table>
<?php echo $links; ?>
