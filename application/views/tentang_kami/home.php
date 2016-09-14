<div class="col-md-12 col-lg-12 col-xs-12" style="height:500px">
  <h2 class="text-center">Sistem Informasi Geografis Ruang Terbuka Hijau (SIG-RTH)</h2>
  <div class="col-lg-4 col-md-offset-2 col-md-12 col-xs-12">
    <img src="<?php echo base_url();?>assets/css/images/logotrans.png" alt="" height="300px" style="margin:40px"/>
  </div>
  <div class="col-lg-4 col-md-12 col-xs-12">
    <h4><b>Versi: Alpha</b></h4>
    <h4><b>Dikembangkan Oleh:</b><br>
    Rachmad Yanuarianto<br>
    Moh. Ardiansyah<br>
    <!--M. Zein Adiyusuf Mr.<br>-->
    </h4>
    <h4><b>Terima Kasih Kepada:</b><br>
    Medha Baskara, S.P., M.T.<br>
    Kestrilia Rega P, M.Si.<br>
    Moch. Subianto, S.Kom., M.Cs.<br>
    Rudy Setiawan, S.Si., M.T.<br>
    </h4>
  </div>
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
