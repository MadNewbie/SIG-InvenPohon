<?php echo form_open('jenis_pohon/insert'); ?>
  <table>
    <tr>
      <td>
        Nama Lokal
      </td>
      <td>
        <input type="text" name="data[nama_lokal]" value="">
      </td>
    </tr>
    <tr>
      <td>
        Nama Ilmiah
      </td>
      <td>
        <input type="text" name="data[nama_ilmiah]" value="">
      </td>
    </tr>
    <tr>
      <td>
        <button type="submit" name="button">Tambah</button>
      </td>
    </tr>
  </table>
<?php echo form_close(); ?>
