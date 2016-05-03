<!-- load googlemapapi -->
<script type="text/javascript">
  $('document').ready(function() {
    var map = new google.maps.Map(document.getElementById('maps'), {
      zoom: 15,
      center: {lat: -7.957045, lng: 112.617147}
    });
    var marker, s_baik=0, baik=0, buruk=0, s_buruk=0, total=0 ;
    $.ajax({
            'type':'POST',
            'url':'<?php echo base_url();?>pohon/generate_gis',
            'success':function(data){
              pohon = JSON.parse(data);
              total = Object.keys(pohon).length;
              // iterasi pembuat maker dan pengelompokan kriteria
              for(var i in pohon){
                marker = new google.maps.Marker({
                  position: new google.maps.LatLng(pohon[i].latitude,pohon[i].longitude),
                  map:map,
                  title:pohon[i].total_kerusakan
                });
                if(pohon[i].total_kerusakan<15){
                  s_baik++;
                };
                if(pohon[i].total_kerusakan<30 && pohon[i].total_kerusakan>=15){
                  baik++;
                };
                if(pohon[i].total_kerusakan<50 && pohon[i].total_kerusakan>=30){
                  buruk++;
                };
                if(pohon[i].total_kerusakan>=50){
                  s_buruk++;
                };
              };
              var myData = new Array(['Sangat Baik',s_baik],['Baik',baik],['Buruk',buruk],['Sangat Buruk',s_buruk]);
              var colors = ['#0ad20a','#91e006','#e0d806','#ed1e03'];
              var myChart = new JSChart('diagram','pie');
              myChart.setDataArray(myData);
              myChart.colorizePie(colors);
              myChart.setTitle('Diagram Kondisi Fisik Pohon Kota Malang');
              myChart.setTitleColor('#857D7D');
              myChart.setPieUnitsColor('#9B9B9B');
              myChart.setPieValuesColor('#6A0000');
              myChart.setTextPaddingTop(50);
              myChart.setTextPaddingLeft(0);
              myChart.setSize(350,400);
              myChart.draw();
            }
          });
  });
</script>
<div class="col-lg-8 col-md-12 col-xs-12" id="maps" style="height: 500px;">
</div>
<div class="col-lg-4">
  <div class="col-md-12 col-xs-12" id="diagram" style="height: 400px;">
  </div>
  <div class="col-md-12 col-xs-12" style="height: 100px; background-color: yellow;">
  </div>
</div>
<!-- modal login -->
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
