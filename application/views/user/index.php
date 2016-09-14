<?php echo anchor("#","Tambah User",array('class'=>'btn btn-primary','data-toggle'=>'modal','data-target'=>'#modal-tambah-user'));?>
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
          <?php if ($_SESSION['id_user'] != $key->id_user) {
            echo '<button class="btn btn-success" type="button" onClick=editUser('.$key->id_user.') data-toggle="modal" data-target="#modal-ubah-user">Ubah User</button>';
            echo anchor(base_url()."user/reset/".$key->id_user,"Reset Password",array('class'=>'btn btn-warning'));
          }?>
        </div>
      </td>
    </tr>
  <?php endforeach; ?>
</table>
<?php echo $links; ?>
<!-- Modal tambah user -->
<div id="modal-tambah-user" class="fade modal">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
        <h3 id="judul-modal" class="text-center">Tambah User</h3>
        <div>
          <?php echo form_open('user/insert'); ?>
          <table>
            <tr>
              <td>
                <input type="text" id="id_user" name="data[id_user]" hidden="true" value="">
              </td>
            </tr>
            <tr>
              <td>
                Nama Lengkap
              </td>
              <td>
                <input type="text" id="nama_lengkap" name="data[nama_lengkap]" value="" required="true">
              </td>
            </tr>
            <tr>
              <td>
                Tanggal Lahir
              </td>
              <td>
                <input type="text" id="tanggal_lahir" name="data[tanggal_lahir]" value="" required="true">
              </td>
            </tr>
            <tr>
              <td>
                Username
              </td>
              <td>
                <input type="text" id="username" name="data[username]" value="" required="true">
              </td>
            </tr>
            <tr>
              <td>
                Tinggi
              </td>
              <td>
                <input type="text" id="tinggi" name="data[tinggi]" value="" required="true">
              </td>
            </tr>
            <tr class="container">
              <td class="center">
                <button type="submit" class="btn btn-primary" value="">Daftarkan</button>
              </td>
            </tr>
          </table>
        <?php echo form_close(); ?>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- modal edit user -->
<div id="modal-ubah-user" class="fade modal">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
        <h3 id="judul-modal" class="text-center">Ubah User</h3>
        <div>
          <?php echo form_open('user/edit'); ?>
          <table>
            <tr>
              <td>
                <input type="text" id="id_user" name="data[id_user]" hidden="true" value="">
              </td>
            </tr>
            <tr>
              <td>
                Nama Lengkap
              </td>
              <td>
                <input type="text" id="nama_lengkap" name="data[nama_lengkap]" value="" required="true">
              </td>
            </tr>
            <tr>
              <td>
                Tanggal Lahir
              </td>
              <td>
                <input type="text" id="tanggal_lahir" name="data[tanggal_lahir]" value="" required="true">
              </td>
            </tr>
            <tr>
              <td>
                Username
              </td>
              <td>
                <input type="text" id="username" name="data[username]" value="" required="true">
              </td>
            </tr>
            <tr>
              <td>
                Tinggi
              </td>
              <td>
                <input type="text" id="tinggi" name="data[tinggi]" value="" required="true">
              </td>
            </tr>
            <tr class="container">
              <td class="center">
                <button type="submit" class="btn btn-primary" value="">Ubah</button>
              </td>
            </tr>
          </table>
        <?php echo form_close(); ?>
        </div>
      </div>
    </div>
  </div>
</div>
