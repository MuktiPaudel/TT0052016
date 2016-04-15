<div class="box-body">
     <div class="row">
        <div class="col-md-9 col-sm-6">
            <script>
              var coordinates = {!! isset($amp_coordinates) ? $amp_coordinates : '[]' !!};
              var center = {!! isset($field_coordinates) ? $field_coordinates : '[]' !!};
              var field_id = {!! isset($field) ? $field->field_id : '' !!};
            </script>
              <div class="pad">
                <!-- Map will be created here -->
                <div id="deviceinstall" style="height: 500px;"></div>
              </div>

        </div>
        <div class="col-md-3 col-sm-6">
        <!-- /.box-header -->
        <div class="box-body">
          <div class="table-responsive">
            <table class="table no-margin">
              <thead>
              <tr>
                <th>Mac_ID</th>
                <th>Group</th>
                <th>Marker</th>

              </tr>
              </thead>
              <tbody>
                <!--  In map javascript file we have encoded these parameters so we need to decode them  -->
                @foreach (json_decode($amp_coordinates, true) as $amp)
                <tr>
                  <td>{{ $amp['mac_id'] }}</a></td>
                  <td>{{ $amp['group']['name'] }}</td>
                  <td><img src="assets/plugins/maps/js/img/marker-{{ $amp['group']['color'] }}.png"></td>
                </tr>
              @endforeach
        </tbody>
            </table>
          </div>
          <!-- /.table-responsive -->
        </div>

      </div>
    </div>  <!-- /.row -->
  </div>
