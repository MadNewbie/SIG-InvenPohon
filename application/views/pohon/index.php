<?php echo anchor("pohon/insert","Tambah Data Fisik pohon",array('class'=>'btn btn-success')) ?>
<?php if ($result==NULL): ?>
  <br><h3>Tidak ada data pohon yang tersimpan</h3>
<?php else: ?>
<table class="table">
  <tr>
    <th>
      ID Pohon
    </th>
    <th>
      Nama Lokal
    </th>
    <th>
      Nama Ilmiah
    </th>
    <th>
      Lokasi
    </th>
    <th>
      Total Kerusakan
    </th>
  </tr>
    <?php foreach ($result as $key => $value): ?>
      <a href="pohon/update">
        <tr>
          <td>
            <?php echo $value->id_pohon; ?>
          </td>
          <td>
            <?php foreach ($jenis_pohon as $a => $b) {
              # mencocokkan id_jenis_pohon dengan nama_lokal
              if($b->id_jenis_pohon == $value->id_jenis_pohon){
                echo $b->nama_lokal;
              }
            } ?>
          </td>
          <td>
            <?php foreach ($jenis_pohon as $a => $b) {
              # mencocokkan id_jenis_pohon dengan nama_lokal
              if($b->id_jenis_pohon == $value->id_jenis_pohon){
                echo '<i>'.$b->nama_ilmiah.'</i>';
              }
            } ?>
          </td>
          <td>
            <?php foreach ($nama_jalan as $a => $b) {
              # mencocokkan id_jenis_pohon dengan nama_lokal
              if($b->id_nama_jalan == $value->id_nama_jalan){
                echo $b->nama_jalan;
              }
            } ?>
          </td>
          <td>
            <?php echo $value->total_kerusakan; ?>%
          </td>
        </tr>
      </a>
    <?php endforeach; ?>
  <?php endif; ?>
</table>
