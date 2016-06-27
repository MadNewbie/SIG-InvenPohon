<div class="col-lg-12 col-md-12 col-xs-12" style="min-height:500px">
  <h2 class="text-center">Bantuan</h2>
  <p>
    <b>Rekap Data :</b> <br> Menu yang digunakan untuk menampilkan semua data kondisi fisik pohon yang telah tersimpan berdasarkan periode waktu tertentu. <br> Data yang telah ditampilkan dapat diunduh dengan cara menekan tombol <b>Download Rekap Data</b>
  </p>
  <p>
    <b>Info Grafis :</b> <br> Menu yang digunakan untuk menampilkan semua data kondisi fisik pohon yang telah tersimpan berdasarkan jenis pohon atau nama jalan tertentu dan ditampilkan dalam bentuk grafik lingkaran dan informasi geografis. <br> Data yang telah ditampilkan dapat diunduh dengan cara menekan tombol <b>Download Data Rekap</b>
  </p>
</div>
<div id="modal-login" class="fade modal">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
        <h3 class="text-center">Login</h3>
        <div>
          <?php echo form_open('Auth/login'); ?>
          <table>
            <tr>
              <td>
                Username
              </td>
              <td>
                <input type="text" name="data[username]" value="" required="true">
              </td>
            </tr>
            <tr>
              <td>
                Password
              </td>
              <td>
                <input type="password" name="data[password]" value="" required="true">
              </td>
            </tr>
            <tr class="container">
              <td class="center">
                <button type="submit" class="btn btn-primary" value="">Login</button>
              </td>
            </tr>
          </table>
        <?php echo form_close(); ?>
        </div>
      </div>
    </div>
  </div>
</div>
