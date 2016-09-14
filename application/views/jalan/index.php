<?php echo anchor("#","Tambah Jalan",array('class'=>'btn btn-primary','data-toggle'=>'modal','data-target'=>'#modal-tambah-jalan'));?>
<table class="table">
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
        <?php echo '<button class="btn btn-success" type="button" onClick=editNamaJalan('.$key->id_nama_jalan.') data-toggle="modal" data-target="#modal-ubah-jalan">Ubah</button>'; ?>
      </td>
    </tr>
  <?php endforeach; ?>
</table>
<?php echo $links; ?>
<!-- Modal tambah jalan -->
<div id="modal-tambah-jalan" class="fade modal">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
        <h3 class="text-center">Tambah Jalan</h3>
        <div>
          <?php echo form_open('jalan/insert'); ?>
            <table>
              <tr>
                <td>
                  Nama Jalan
                </td>
                <td>
                  <input type="text" name="data[nama_jalan]" value="" required="true">
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
<!-- Modal edit jalan -->
<div id="modal-ubah-jalan" class="fade modal">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
        <h3 class="text-center">Ubah Jalan</h3>
        <div>
          <?php echo form_open('jalan/update'); ?>
            <table>
              <tr>
                <td>
                  <input type="text" id="id_nama_jalan" name="data[id_nama_jalan]" hidden="true" value="">
                </td>
              </tr>
              <tr>
                <td>
                  Nama Jalan
                </td>
                <td>
                  <input type="text" id="nama_jalan" name="data[nama_jalan]" value="" required="true">
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
