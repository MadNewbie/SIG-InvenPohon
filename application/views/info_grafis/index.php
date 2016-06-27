<div class="col-lg-8 col-xs-12" id="gis">
  <div class="col-lg-12 col-md-12 col-xs-12">
    Tampilkan data pohon berdasarkan
    <select id="category1" name="data[category1]" onchange="inflateDataParameter()">
      <option value=1>Jalan</option>
      <option value=2>Jenis Pohon</option>
    </select>
    <select id="category2" name="data[category2]" disabled="true" onchange="selectedCategory1()">
      <option value="">-</option>
    </select>
    <select id="category3" name="data[category3]" disabled="true" onchange="selectedCategory2()">
      <option value="">-</option>
    </select>
    <input id="tanggalMulai" type="date" name="data[category2]" style="display:none; visibility:hidden">
    <input id="tanggalAkhir" type="date" name="data[category3]" style="display:none; visibility:hidden">
  </div>
  <div class="col-lg-12 col-md-12 col-xs-12" id="maps" style="height: 500px;">
  </div>
</div>
<div class="col-lg-4 col-xs-12">
  <div class="col-md-12 col-xs-12" id="diagram">
  </div>
  <div class="col-md-12 col-xs-12">
    <a id="download" href="" class="btn btn-primary center">Download Data Rekap</a>
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
<script type="text/javascript">
  function selectedCategory1(){
    if(document.getElementById('category3').disabled == false){
      document.getElementById('category3').selectedIndex = document.getElementById('category2').selectedIndex;
    }
    renderMap();
  }

  function selectedCategory2() {
    document.getElementById('category2').selectedIndex = document.getElementById('category3').selectedIndex;
    renderMap();
  }

  function inflateDataParameter() {
    console.log(document.getElementById('category1').selectedIndex);
    if(document.getElementById('category1').options[document.getElementById('category1').selectedIndex].value==1){
      $.ajax({
        'type':'POST',
        'url':'<?php echo base_url(); ?>jalan/getAll',
        'success':function(data){
          $('#category2').html('');
          $('#category3').html('');
          dataJalan = JSON.parse(data);
          $('#category2').append($('<option>').html('-'));
          $('#category3').append($('<option>').html('-'));
          for(var i in dataJalan){
              $('#category2').append($('<option>').attr('value', dataJalan[i].id_nama_jalan).html(dataJalan[i].nama_jalan));
          };
          document.getElementById('category2').disabled = false;
          document.getElementById('category3').disabled = true;
          document.getElementById('tanggalMulai').style.display = "none";
          document.getElementById('tanggalAkhir').style.display = "none";
        }
      });
    }else if(document.getElementById('category1').options[document.getElementById('category1').selectedIndex].value==2){
      $.ajax({
        'type':'POST',
        'url':'<?php echo base_url(); ?>jenis_pohon/getAll',
        'success':function(data){
          $('#category2').html('');
          $('#category3').html('');
          dataJenis = JSON.parse(data);
          $('#category2').append($('<option>').html('-'));
          $('#category3').append($('<option>').html('-'));
            for(var i in dataJenis){
                $('#category3').append($('<option>').attr('value', dataJenis[i].id_jenis_pohon).html(dataJenis[i].nama_ilmiah));
                $('#category2').append($('<option>').attr('value', dataJenis[i].id_jenis_pohon).html(dataJenis[i].nama_lokal));
            };
          document.getElementById('category2').disabled = false;
          document.getElementById('category3').disabled = false;
          document.getElementById('tanggalMulai').style.display = "none";
          document.getElementById('tanggalAkhir').style.display = "none";
        }
      });
    }else{
      document.getElementById('category2').style.display = "none";
      document.getElementById('category3').style.display = "none";
      document.getElementById('tanggalMulai').style.display = "inline";
      document.getElementById('tanggalAkhir').style.display = "inline";
      document.getElementById('tanggalMulai').style.visibility = "visible";
      document.getElementById('tanggalAkhir').style.visibility = "visible";
    }
  }

  function renderMap() {
    $('#diagram').html('');
    var id = document.getElementById('category2').value,iconPohon, marker, markers=[], s_baik=0, baik=0, buruk=0, s_buruk=0, total=0, center, latitude, longitude;
    var map = new google.maps.Map(document.getElementById('maps'), {
      zoom: 15,
      center: {lat: -7.977184, lng: 112.634094}
    });
    var tinggir =0;
    var infoWindows = new google.maps.InfoWindow();
    if(document.getElementById('category1').value == 1){
      var alamat = '<?php echo base_url();?>download/generate_gis_location/'+String(id);
      $.ajax({
        'type':'POST',
        'url':'<?php echo base_url();?>pohon/generate_gis_location/'+id,
        'success':function(data){
          document.getElementById('download').setAttribute("href",alamat);
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
                  '<br>Tinggi:'+pohon[i].tinggi+' meter'
                );
                infoWindows.open(map, marker);
            }
            })(marker, i));
            marker.addListener('mouseout',function(){
              infoWindows.close(map,this);
            });
            tinggir+=parseFloat(pohon[i].tinggi);
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
          myChart.setSize(350,450);
          myChart.setLegendColor('#000000');
          myChart.setLegend('#73a883',"Sangat Baik: "+String(s_baik));
          myChart.setLegend('#8fd953',"Baik: "+String(baik));
          myChart.setLegend('#d9cb53',"Buruk: "+String(buruk));
          myChart.setLegend('#d95353',"Sangat Buruk: "+String(s_buruk));
          myChart.setLegend('#000000',"Total Pohon: "+String(total));
          myChart.setLegend('#000000',"Tinggi Rata-Rata: "+String(tinggir/total));
          myChart.setLegendShow(true);
          myChart.setLegendPosition('right bottom');
          myChart.draw();
        }
      });
    }else{
      var alamat = '<?php echo base_url();?>download/generate_gis_jenis/'+String(id);
      $.ajax({
        'type':'POST',
        'url':'<?php echo base_url();?>pohon/generate_gis_jenis/'+id,
        'success':function(data){
          document.getElementById('download').setAttribute("href",alamat);
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
            google.maps.event.addListener(marker, 'mouseover', (function (marker, i) {
            return function () {
                infoWindows.setContent(
                  'Id Pohon: '+pohon[i].id_pohon+
                  '<br>Nama Lokal: '+pohon[i].nama_lokal+
                  '<br>Nama Ilmiah: '+pohon[i].nama_ilmiah+
                  '<br>Tingkat Kerusakan: '+pohon[i].total_kerusakan+
                  '<br>Tinggi:'+pohon[i].tinggi+' meter'
                );
                infoWindows.open(map, marker);
            }
            })(marker, i));
            google.maps.event.addListener(marker, 'click', (function (marker, i) {
            return function () {
                window.open('<?php echo base_url();?>info_grafis/detail/'+pohon[i].id_pohon);
            }
            })(marker, i));
            marker.addListener('mouseout',function(){
              infoWindows.close(map,this);
            });
            tinggir+=parseFloat(pohon[i].tinggi);
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
          myChart.setSize(350,450);
          myChart.setLegendColor('#000000');
          myChart.setLegend('#73a883',"Sangat Baik: "+String(s_baik));
          myChart.setLegend('#8fd953',"Baik: "+String(baik));
          myChart.setLegend('#d9cb53',"Buruk: "+String(buruk));
          myChart.setLegend('#d95353',"Sangat Buruk: "+String(s_buruk));
          myChart.setLegend('#000000',"Total Pohon: "+String(total));
          myChart.setLegend('#000000',"Tinggi Rata-Rata: "+String(tinggir/total));
          myChart.setLegendShow(true);
          myChart.setLegendPosition('right bottom');
          myChart.draw();
        }
      });
    }
  }

  $('document').ready(function(){
    inflateDataParameter();
    renderMap();
  });
</script>
