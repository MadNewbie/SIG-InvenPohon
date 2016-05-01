<!-- load openlayers -->
<script type="text/javascript">
  $('document').ready(function() {
    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 19,
      center: {lat: -7.973768, lng: 112.621281}
    });

    var marker1 = new google.maps.Marker({
      position: {lat:-7.973933, lng:112.621217},
      map: map,
      label: 'Hello World!',
    });

    var marker2 = new google.maps.Marker({
      position: {lat:-7.974827, lng:112.620951},
      map: map,
      label: 'Lalala',
    });
  });
</script>
<div class="col-lg-8 col-md-12 col-xs-12" id="map" style="height: 500px;">
</div>
<div class="col-lg-4 col-md-12 col-xs-12" style="height: 250px; background-color: red;">
</div>
<div class="col-lg-4 col-md-12 col-xs-1" style="height: 250px; background-color: yellow;">
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
