<?php echo form_open('pohon/insert'); ?>
<table class="table">
  <tr>
    <td>
      Nama Jalan
    </td>
    <td>
      <select class="" name="data[id_nama_jalan]" required="true">
        <?php foreach ($nama_jalan as $key => $value): ?>
          <option value='<?php echo $value->id_nama_jalan ?>'><?php echo $value->nama_jalan ?></option>
        <?php endforeach; ?>
      </select>
    </td>
    <td>
      Nama Lokal
    </td>
    <td>
      <select id="jenis_pohon" name="data[id_jenis_pohon]" required="true" onchange="namaLokal()">
        <?php foreach ($jenis_pohon as $key => $value): ?>
          <option value='<?php echo $value->id_jenis_pohon ?>'><?php echo $value->nama_lokal ?></option>
        <?php endforeach; ?>
      </select>
    </td>
    <td>
      Nama Ilmiah
    </td>
    <td>
      <input type="text" id="nama_ilmiah" readonly="true" value="" style="font-style:italic">
    </td>
  </tr>
  <tr>
    <td>
      Tinggi
    </td>
    <td>
      <input type="number" min=0 name="data[tinggi]" required="true" value=""> Meter
    </td>
    <td>
      Lebar Tajuk
    </td>
    <td>
      <input type="number" min=0 name="data[lebar_tajuk]" required="true" value=""> Meter
    </td>
    <td>
      Diameter Pohon
    </td>
    <td>
      <input type="number" min=0 name="data[diameter_batang]" required="true" value=""> Meter
    </td>
  </tr>
  <tr>
  </tr>
  <tr>
    <td>
      Bentuk Tajuk
    </td>
    <td>
      <input type="input" name="data[bentuk_tajuk]" required="true" value="">
    </td>
    <td>
      Longitude
    </td>
    <td>
      <input type="text" name="data[longitude]" required="true" value="">
    </td>
    <td>
      Latitude
    </td>
    <td>
      <input type="text" name="data[latitude]" required="true" value="">
    </td>
  </tr>
</table>
<table class="table">
  <tr>
    <td>
      Kerusakan akar dan batang
    </td>
  </tr>
  <tr>
    <td>
      <input type="checkbox" name="data[ab][]" value="ab_1">
      Kerusakan akar dan batang 0
    </td>
    <td>
      <input type="checkbox" name="data[ab][]" value="ab_2">
      Kerusakan akar dan batang 1
    </td>
    <td>
      <input type="checkbox" name="data[ab][]" value="ab_3">
      Kerusakan akar dan batang 2
    </td>
  </tr>
  <tr>
    <td>
      <input type="checkbox" name="data[ab][]" value="ab_4">
      Kerusakan akar dan batang 3
    </td>
    <td>
      <input type="checkbox" name="data[ab][]" value="ab_5">
      Kerusakan akar dan batang 4
    </td>
    <td>
      <input type="checkbox" name="data[ab][]" value="ab_6">
      Kerusakan akar dan batang 5
    </td>
  </tr>
  <tr>
    <td>
      Kerusakan cabang dan daun
    </td>
  </tr>
  <tr>
    <td>
      <input type="checkbox" name="data[cd][]" value="cd_1">
      Kerusakan cabang dan daun 0
    </td>
    <td>
      <input type="checkbox" name="data[cd][]" value="cd_2">
      Kerusakan cabang dan daun 1
    </td>
    <td>
      <input type="checkbox" name="data[cd][]" value="cd_3">
      Kerusakan cabang dan daun 2
    </td>
  </tr>
  <tr>
    <td>
      <input type="checkbox" name="data[cd][]" value="cd_4">
      Kerusakan cabang dan daun 3
    </td>
    <td>
      <input type="checkbox" name="data[cd][]" value="cd_5">
      Kerusakan cabang dan daun 4
    </td>
    <td>
      <input type="checkbox" name="data[cd][]" value="cd_6">
      Kerusakan cabang dan daun 5
    </td>
  </tr>
  <tr>
    <td>
      Kerusakan mekanik
    </td>
  </tr>
  <tr>
    <td>
      <input type="checkbox" name="data[m][]" value="m_1">
      Kerusakan mekanik 0
    </td>
    <td>
      <input type="checkbox" name="data[m][]" value="m_2">
      Kerusakan mekanik 1
    </td>
    <td>
      <input type="checkbox" name="data[m][]" value="m_3">
      Kerusakan mekanik 2
    </td>
  </tr>
  <tr>
    <td>
      <input type="checkbox" name="data[m][]" value="m_4">
      Kerusakan mekanik 3
    </td>
    <td>
      <input type="checkbox" name="data[m][]" value="m_5">
      Kerusakan mekanik 4
    </td>
    <td>
      <input type="checkbox" name="data[m][]" value="m_6">
      Kerusakan mekanik 5
    </td>
  </tr>
</table>
<tr>
  <td>
    <button type="submit" name="button">Tambah</button>
  </td>
</tr>
<?php echo form_close(); ?>
<script>
  function namaLokal() {
    var id = document.getElementById('jenis_pohon').options[document.getElementById('jenis_pohon').selectedIndex].value;
    var jenisPohon;
    $.ajax({
      'type':'POST',
      'url':'<?php echo base_url() ?>jenis_pohon/retrieve/'+id,
      'success':function(data){
        jenisPohon = JSON.parse(data);
        $("#nama_ilmiah").val(jenisPohon[0].nama_ilmiah);
      }
    });
  }
</script>
