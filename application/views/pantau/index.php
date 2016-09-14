<?php ob_start(); ?>
<tr>
  <td>
    {TANGGAL}
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
<form action="<?php echo base_url();?>download/generate_data_by_surveyor" method="post">
  <select id="idUser" name="data[id_user]">
    <?php foreach ($user as $key => $value): ?>
      <option value="<?php echo $value->id_user?>"><?php echo $value->nama_lengkap ?></option>
    <?php endforeach; ?>
  </select>
  <input class="btn btn-primary" type="submit" value="Download rekap data" />
</form>
<table class="table">
  <tr>
    <th>
      Tanggal
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
<script type="text/javascript">
  var template = '<?= preg_replace('/[\r\n]/', '', $template) ?>';
  $( "#idUser").change(function(){
    call_pagination(0);
  });

  function call_pagination(start){
    $('#tbody-data').html('');
    var idUser = $('#idUser').val();
    $.ajax({
      'type':'POST',
      'data':{'idUser':idUser},
      'url':'<?php echo base_url(); ?>pantau_surveyor/getByIdUser/'+start,
      'success':function(data){
        var result=JSON.parse(data);
        for ( var i in result.data) {
          var datum = result.data[i];
          var row = template;
          row = row.replace(/\{TANGGAL}/, datum.tanggal);
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
