<?php echo form_open('Auth/login'); ?>
<table>
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
      Password
    </td>
    <td>
      <input type="password" name="data[password]" value="">
    </td>
  </tr>
  <tr>
    <td>
      <button type="submit">Login</button>
    </td>
  </tr>
</table>
<?php echo form_close(); ?>
