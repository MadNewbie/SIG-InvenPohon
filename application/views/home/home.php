<!-- load googlemapapi -->
<script type="text/javascript">
  $('document').ready(function() {
    var map = new google.maps.Map(document.getElementById('maps'), {
      zoom: 15,
      center: {lat: -7.977184, lng: 112.634094}
    });
    var infoWindows = new google.maps.InfoWindow();
    var iconPohon, markers=[], s_baik=0, baik=0, buruk=0, s_buruk=0, total=0 ;
    $.ajax({
            'type':'POST',
            'url':'<?php echo base_url();?>pohon/generate_gis',
            'success':function(data){
              pohon = JSON.parse(data);
              total = Object.keys(pohon).length;
              longitude = pohon[0]["longitude"];
              latitude = pohon[0]["latitude"];
              center = new google.maps.LatLng(latitude,longitude);
              map.panTo(center);
              // iterasi pembuat maker dan pengelompokan kriteria
              for(var i in pohon){
                if(pohon[i].total_kerusakan<15){
                  s_baik++;
                  iconPohon='<?php echo base_url();?>assets/icon-gis/icon-tree-green.png';
                };
                if(pohon[i].total_kerusakan<30 && pohon[i].total_kerusakan>=15){
                  baik++;
                  iconPohon='<?php echo base_url();?>assets/icon-gis/icon-tree-green-yellow.png';
                };
                if(pohon[i].total_kerusakan<50 && pohon[i].total_kerusakan>=30){
                  buruk++;
                  iconPohon='<?php echo base_url();?>assets/icon-gis/icon-tree-yellow.png';
                };
                if(pohon[i].total_kerusakan>=50){
                  s_buruk++;
                  iconPohon='<?php echo base_url();?>assets/icon-gis/icon-tree-red.png';
                };
                marker = new google.maps.Marker({
                  position: new google.maps.LatLng(pohon[i].latitude,pohon[i].longitude),
                  map:map,
                  icon:iconPohon
                });
                markers.push(marker);
                google.maps.event.addListener(marker, 'click', (function (marker, i) {
                return function () {
                    window.open('<?php echo base_url();?>info_grafis/detail/'+pohon[i].id_pohon);
                }})(marker, i));
                google.maps.event.addListener(marker, 'mouseover', (function (marker, i) {
                return function () {
                    infoWindows.setContent(
                      'Id Pohon: '+pohon[i].id_pohon+
                      '<br>Nama Lokal: '+pohon[i].nama_lokal+
                      '<br>Nama Ilmiah: '+pohon[i].nama_ilmiah+
                      '<br>Tingkat Kerusakan: '+pohon[i].total_kerusakan+
                      '<br>Tinggi: '+pohon[i].tinggi+' meter'
                    );
                    infoWindows.open(map, marker);
                }
                })(marker, i));
                marker.addListener('mouseout',function(){
                  infoWindows.close(map,this);
                });
              };
              // var markerCluster = new MarkerClusterer(map,markers);
              var myData = new Array(['Sangat Baik',(s_baik/total)*100],['Baik',(baik/total)*100],['Buruk',(buruk/total)*100],['Sangat Buruk',(s_buruk/total)*100]);
              var colors = ['#73a883','#8fd953','#d9cb53','#d95353'];
              var myChart = new JSChart('diagram','pie');
              myChart.setDataArray(myData);
              myChart.colorizePie(colors);
              myChart.setTitle('Diagram Kondisi Fisik Pohon Kota Malang');
              myChart.setTitleColor('#857D7D');
              myChart.setPieUnitsColor('#000000');
              myChart.setPieValuesColor('#000000');
              myChart.setTextPaddingTop(50);
              myChart.setTextPaddingLeft(0);
              myChart.setSize(350,400);
              myChart.setLegendColor('#000000');
              myChart.setLegend('#73a883',"Sangat Baik: "+String(s_baik));
              myChart.setLegend('#8fd953',"Baik: "+String(baik));
              myChart.setLegend('#d9cb53',"Buruk: "+String(buruk));
              myChart.setLegend('#d95353',"Sangat Buruk: "+String(s_buruk));
              myChart.setLegend('#000000',"Total Pohon: "+String(total));
              myChart.setLegendShow(true);
              myChart.setLegendPosition('right bottom');
              myChart.draw();
            }
          });
  });
</script>
<div class="col-lg-12 col-md-12 col-xs-12 text-center" id="intro" style="height: 600px; padding-bottom:50px">
  <h1 id="title">Sistem Informasi Geografis Ruang Terbuka Hijau</h1>
  <img src="<?php echo base_url();?>assets/css/images/logotrans.png" alt="" height="300px" style="margin:40px"/>
  <h4>Sistem informasi geograis tentang kondisi fisik pohon pada ruang terbuka hijau di area Kota Malang.</h4>
</div>
<div class="col-lg-8 col-md-12 col-xs-12" id="maps" style="height: 500px;">
</div>
<div class="col-lg-4 col-md-12 col-xs-12">
  <div class="col-md-12 col-xs-12" id="diagram" style="height: 400px;">
  </div>
  <div class="col-md-12 col-xs-12" style="height: 100px;">
    Developed by: Rachmad (311210035)
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
