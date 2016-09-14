<?php echo form_open('user/password'); ?>
<table>
  <tr>
    <td>
      Password baru
    </td>
    <td>
      <input type="password" name="data[password_baru]" value="">
    </td>
  </tr>
  <tr>
    <td>
      Verifikasi password baru
    </td>
    <td>
      <input type="password" name="data[verifikasi_password]" value="">
    </td>
  </tr>
  <tr>
    <td>
      <button type="submit" name="button">Ubah</button>
    </td>
  </tr>
</table>
<?php echo form_close(); ?>
