<div class="col-lg-4 col-md-4 col-xs-12" style="min-height:500px">
  <img style="min-height:500px"src="<?php echo base_url();?>assets/uploads/pohon/<?php echo $result[0]->foto_fisik?>" alt="">
</div>
<div class="col-lg-8 col-md-8 col-xs-12">
  <div class="">
    <a clas="btn btn-success" href="<?php echo base_url();?>rekap/detail/<?php echo $result[0]->id_pohon-1?>"><</a>
    <td>
      <?php echo $result[0]->id_pohon ?>
    </td>
    <a clas="btn btn-success"href="<?php echo base_url();?>rekap/detail/<?php echo $result[0]->id_pohon+1?>">></a>
  </div>
  <table class="table">
    <tr>
      <td>
        Id Pohon
      </td>
      <td>
        <?php echo $result[0]->id_pohon ?>
      </td>
    </tr>
    <tr>
      <td>
        Nama Lokal
      </td>
      <td>
        <?php echo $result[0]->nama_lokal ?>
      </td>
    </tr>
    <tr>
      <td>
        Nama Ilmiah
      </td>
      <td>
        <i><?php echo $result[0]->nama_ilmiah ?></i>
      </td>
    </tr>
    <tr>
      <td>
        Tinggi
      </td>
      <td>
        <?php echo $result[0]->tinggi ?> Meter
      </td>
    </tr>
    <tr>
      <td>
        Lebar Tajuk
      </td>
      <td>
        <?php echo $result[0]->lebar_tajuk ?> Meter
      </td>
    </tr>
    <tr>
      <td>
        Diameter Batang
      </td>
      <td>
        <?php echo $result[0]->diameter_batang/pi() ?> Sentimeter
      </td>
    </tr>
    <tr>
      <td>
        Bentuk Tajuk
      </td>
      <td>
        <?php echo $result[0]->bentuk_tajuk ?>
      </td>
    </tr>
      <td>
        Rincian Kerusakan
      </td>
      <td>
        <?php
          $kerusakan = "";
          if($result[0]->ab_2==1){
            $kerusakan.="Adanya kerusakan hama dan penyakit pada akar atau batang</br>";
          }
          if($result[0]->ab_3==1){
            $kerusakan.="Adanya tumbuhan parasit(jamur, benalu) pada akar atau batang</br>";
          }
          if($result[0]->ab_4==1){
            $kerusakan.="Batang atau Akar kering; Batang atau Akar lapuk</br>";
          }
          if($result[0]->ab_5==1){
            $kerusakan.="Batang atau akar busuk</br>";
          }
          if($result[0]->ab_6==1){
            $kerusakan.="Gerowong / keropos yang tampak</br>";
          }
          if($result[0]->cd_2==1){
            $kerusakan.="Adanya kerusakan hama dan penyakit pada cabang atau daun</br>";
          }
          if($result[0]->cd_3==1){
            $kerusakan.="Adanya kerusakan tumbuhan parasit(jamur, benalu) pada cabang atau daun</br>";
          }
          if($result[0]->cd_4==1){
            $kerusakan.="Klorosis</br>";
          }
          if($result[0]->cd_5==1){
            $kerusakan.="Nekrosis</br>";
          }
          if($result[0]->cd_6==1){
            $kerusakan.="Percabangan lapuk</br>";
          }
          if($result[0]->m_2==1){
            $kerusakan.="Vandalisme</br>";
          }
          if($result[0]->m_3==1){
            $kerusakan.="Goresan</br>";
          }
          if($result[0]->m_4==1){
            $kerusakan.="Sayatan</br>";
          }
          if($result[0]->m_5==1){
            $kerusakan.="Patah cabang</br>";
          }
          if($result[0]->m_6==1){
            $kerusakan.="Tersambar petir</br>";
          }
          if($kerusakan == ""){
            echo "Tidak ada kerusakan";
          }else{
            echo $kerusakan;
          }
        ?>
      </td>
    </tr>
  </table>
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
