<?php echo form_open('jalan/insert'); ?>
  <table>
    <tr>
      <td>
        Nama Jalan
      </td>
      <td>
        <input type="text" name="data[nama_jalan]" value="">
      </td>
    </tr>
    <!-- <tr>
      <td>
        Posisi Awal
        <tr>
          <td>
            Titik Awal 1
            <tr>
              <td>
                Longitude
              </td>
              <td>
                <input type="text" name="data['long_posisi_awal1']" value="">
              </td>
            </tr>
            <tr>
              <td>
                Latitude
              </td>
              <td>
                <input type="text" name="data['lat_posisi_awal1']" value="">
              </td>
            </tr>
          </td>
          <td>
            Titik Awal 2
            <tr>
              <td>
                Longitude
              </td>
              <td>
                <input type="text" name="data['long_posisi_awal2']" value="">
              </td>
            </tr>
            <tr>
              <td>
                Latitude
              </td>
              <td>
                <input type="text" name="data['lat_posisi_awal2']" value="">
              </td>
            </tr>
          </td>
        </tr>
      </td>
    </tr>
    <tr>
      <td>
        Posisi Akhir
        <tr>
          <td>
            Titik Akhir 1
            <tr>
              <td>
                Longitude
              </td>
              <td>
                <input type="text" name="data['long_posisi_akhir1']" value="">
              </td>
            </tr>
            <tr>
              <td>
                Latitude
              </td>
              <td>
                <input type="text" name="data['lat_posisi_akhir1']" value="">
              </td>
            </tr>
          </td>
          <td>
            Titik Akhir 2
            <tr>
              <td>
                Longitude
              </td>
              <td>
                <input type="text" name="data['long_posisi_akhir2']" value="">
              </td>
            </tr>
            <tr>
              <td>
                Latitude
              </td>
              <td>
                <input type="text" name="data['lat_posisi_akhir2']" value="">
              </td>
            </tr>
          </td>
        </tr>
      </td>
    </tr> -->
    <tr>
      <td>
        <button type="submit" name="button">Tambah</button>
      </td>
    </tr>
  </table>
<?php echo form_close(); ?>
