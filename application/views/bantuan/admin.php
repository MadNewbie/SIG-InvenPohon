<div class="col-lg-12 col-md-12 col-xs-12" style="min-height:500px">
  <h2 class="text-center">Bantuan</h2>
  <p>
    <b>Rekap Data :</b> <br> Menu yang digunakan untuk menampilkan semua data kondisi fisik pohon yang telah tersimpan berdasarkan periode waktu tertentu. <br> Data yang telah ditampilkan dapat diunduh dengan cara menekan tombol <b>Download Rekap Data</b>
  </p>
  <p>
    <b>Info Grafis :</b> <br> Menu yang digunakan untuk menampilkan semua data kondisi fisik pohon yang telah tersimpan berdasarkan jenis pohon atau nama jalan tertentu dan ditampilkan dalam bentuk grafik lingkaran dan informasi geografis. <br> Data yang telah ditampilkan dapat diunduh dengan cara menekan tombol <b>Download Data Rekap</b>
  </p>
  <p>
    <b>Kelola Akun :</b> <br>Menu yang digunakan untuk menambah, mengubah dan mereset password akun yang pada sistem. <br>Tombol <b>Tambah User</b> berfungsi untuk menambah user pada sistem. <br>Tombol <b>Ubah</b> berfungsi untuk mengubah data user. <br> Tombol <b>Reset Password</b> berfungsi untuk mengatur ulang password pengguna
  </p>
  <p>
    <b>Kelola Nama Jalan :</b> <br>Menu yang digunakan untuk menambah atau mengubah nama jalan yang pada sistem. <br>Tombol <b>Tambah Jalan</b> berfungsi untuk menambah nama jalan pada sistem. <br>Tombol <b>Ubah</b> berfungsi untuk mengubah data nama jalan.
  </p>
  <p>
    <b>Kelola Jenis Pohon :</b> <br>Menu yang digunakan untuk menambah atau mengubah nama lokal dan nama ilmiah jenis pohon pada sistem. <br>Tombol <b>Tambah Jenis Pohon</b> berfungsi untuk menambah jenis pohon pada sistem. <br>Tombol <b>Ubah</b> berfungsi untuk mengubah data nama ilmiah maupun nama lokal dar jenis pohon.
  </p>
  <p>
    <b>Pantau Surveyor :</b> <br>Menu yang digunakan untuk menampilkan semua data kondisi fisik pohon yang telah dimasukkan oleh surveyor tertentu. <br>Data yang telah ditampilkan dapat diunduh dengan cara menekan tombol <b>Download Rekap Data</b>
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
