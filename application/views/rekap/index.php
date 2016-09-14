<?php ob_start(); ?>
<tr>
  <td>
    {IDPOHON}
  </td>
  <td>
    {NAMALOKAL}
  </td>
  <td>
    {NAMAILMIAH}
  </td>
  <td>
    {NAMAJALAN}
  </td>
  <td>
    {TINGGI}
  </td>
  <td>
    {LEBARTAJUK}
  </td>
  <td>
    {DIAMETERBATANG}
  </td>
  <td>
    {TOTALKERUSAKAN}
  </td>
</tr>
<?php $template = ob_get_clean(); ?>
<form action="<?php echo base_url();?>download/generate_data_by_periode" method="post">
  Tanggal Awal <input type="text" name="data[tanggal_awal]" id="dateAwal" />
  Tanggal Akhir <input type="text" name="data[tanggal_akhir]" id="dateAkhir" />
  <input class="btn btn-primary" type="submit" value="Download rekap data" />
</form>
<table class="table">
  <tr>
    <th>
      Id Pohon
    </th>
    <th>
      Nama Lokal
    </th>
    <th>
      Nama Ilmiah
    </th>
    <th>
      Nama Jalan
    </th>
    <th>
      Tinggi
    </th>
    <th>
      Lebar Tajuk
    </th>
    <th>
      Diameter Pohon
    </th>
    <th>
      Total Kerusakan
    </th>
  </tr>
  <tbody id="tbody-data">
  </tbody>
</table>
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
  var template = '<?= preg_replace('/[\r\n]/', '', $template) ?>';
  $(function() {
    $( "#dateAwal,#dateAkhir" ).datepicker({
      dateFormat:"dd-mm-yy"
    });
    call_pagination(0);
  });

  $( "#dateAwal,#dateAkhir" ).change(function(){
    call_pagination(0);
  });

  function call_pagination(start){
    $('#tbody-data').html('');
    var awal = $('#dateAwal').val();
    var akhir = $('#dateAkhir').val();
    $.ajax({
      'type':'POST',
      'data':{'awal':awal,'akhir':akhir},
      'url':'<?php echo base_url(); ?>rekap/getByDate/'+start,
      'success':function(data){
        var result=JSON.parse(data);
        for ( var i in result.data) {
          var datum = result.data[i];
          var row = template;
          row = row.replace(/\{IDPOHON}/, datum.id_pohon);
          row = row.replace(/\{NAMALOKAL}/, datum.nama_lokal);
          row = row.replace(/\{NAMAILMIAH}/, datum.nama_ilmiah);
          row = row.replace(/\{NAMAJALAN}/, datum.nama_jalan);
          row = row.replace(/\{TINGGI}/, datum.tinggi);
          row = row.replace(/\{LEBARTAJUK}/, datum.lebar_tajuk);
          row = row.replace(/\{DIAMETERBATANG}/, datum.diameter_batang);
          row = row.replace(/\{TOTALKERUSAKAN}/, datum.total_kerusakan);
          $('#tbody-data').append(row);
        }
        var trfoot = $('<tr>').append('<td colspan="100">').append(result.link);
        $(trfoot).find('a').click(function(){
          var href= $(this).attr('href').replace(/[^\d]/,'');
          call_pagination(href);
          return false;
        });
        $('#tbody-data').append(trfoot);
      }
    });
  }
</script>
