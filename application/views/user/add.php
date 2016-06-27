<?php echo form_open('user/add'); ?>
  <table>
    <tr>
      <td>
        Nama Lengkap
      </td>
      <td>
        <input type="text" name="data[nama_lengkap]" value="">
      </td>
    </tr>
    <tr>
      <td>
        Tanggal Lahir
      </td>
      <td>
        <input type="text" name="data[tanggal_lahir]" value="">
      </td>
    </tr>
    <tr>
      <td>
        Username
      </td>
      <td>
        <input type="text" name="data[username]" value="">
      </td>
    </tr>
    <tr>
      <td>
        Tinggi
      </td>
      <td>
        <input type="text" name="data[tinggi]" value="">
      </td>
    </tr>
    <tr>
      <td>
        <button type="submit">Daftarkan</button>
      </td>
    </tr>
  </table>
<?php echo form_close(); ?>
