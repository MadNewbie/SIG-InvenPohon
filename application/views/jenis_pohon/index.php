<?php echo anchor("#","Tambah Jenis Pohon",array('class'=>'btn btn-primary','data-toggle'=>'modal','data-target'=>'#modal-tambah-jenis'));?>
<table class="table">
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
        <i><?php echo $key->nama_ilmiah ?></i>
      </td>
      <td>
        <?php echo '<button class="btn btn-success" type="button" onClick=editJenisPohon('.$key->id_jenis_pohon.') data-toggle="modal" data-target="#modal-ubah-jenis">Ubah</button>'; ?>
      </td>
    </tr>
  <?php endforeach; ?>
</table>
<?php echo $links; ?>
<!-- Modal tambah jenis pohon -->
<div id="modal-tambah-jenis" class="fade modal">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
        <h3 class="text-center">Tambah Jenis Pohon</h3>
        <div>
          <?php echo form_open('jenis_pohon/insert'); ?>
            <table>
              <tr>
                <td>
                  Nama Lokal
                </td>
                <td>
                  <input type="text" name="data[nama_lokal]" value="" required="true">
                </td>
              </tr>
              <tr>
                <td>
                  Nama Ilmiah
                </td>
                <td>
                  <input type="text" name="data[nama_ilmiah]" value="" required="true">
                </td>
              </tr>
              <tr class="container">
                <td class="center">
                  <button class="btn btn-primary"type="submit" name="button">Tambah</button>
                </td>
              </tr>
            </table>
        <?php echo form_close(); ?>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Modal edit jenis pohon -->
<div id="modal-ubah-jenis" class="fade modal">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
        <h3 class="text-center">Ubah Jenis Pohon</h3>
        <div>
          <?php echo form_open('jenis_pohon/edit'); ?>
            <table>
              <tr>
                <td>
                  <input type="text" id="id_jenis_pohon" name="data[id_jenis_pohon]" hidden="true" value="">
                </td>
              </tr>
              <tr>
                <td>
                  Nama Lokal
                </td>
                <td>
                  <input type="text" id="nama_lokal" name="data[nama_lokal]" value="" required="true">
                </td>
              </tr>
              <tr>
                <td>
                  Nama Ilmiah
                </td>
                <td>
                  <input type="text" id="nama_ilmiah" name="data[nama_ilmiah]" value="" required="true">
                </td>
              </tr>
              <tr class="container">
                <td class="center">
                  <button class="btn btn-primary"type="submit" name="button">Ubah</button>
                </td>
              </tr>
            </table>
        <?php echo form_close(); ?>
        </div>
      </div>
    </div>
  </div>
</div>
