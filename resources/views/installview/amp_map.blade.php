<div class="box-body">
     <div class="row">
        <div class="col-md-9 col-sm-6">
            <script>
              var coordinates = {!! isset($amp_coordinates) ? $amp_coordinates : '[]' !!};
              var center = {!! isset($field_coordinates) ? $field_coordinates : '[]' !!};
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
                <th>AmpID</th>
                <th>Group</th>
                <th>Action</th>

              </tr>
              </thead>
              <tbody>
              <tr>
                <td><a href="#">01</a></td>
                <td>Left</td>
                <td> <a href="www.google.com" class="label label-success" role="button">Edit</a></td>
              </tr>
              <tr>
                <td><a href="#">02</a></td>
                <td>Left</td>
                <td><span class="label label-success">Edit</span></td>

              </tr>
              <tr>
                <td><a href="#">03</a></td>
                <td>Left</td>
                <td><span class="label label-success">Edit</span></td>
              </tr>
              <tr>
                <td><a href="#">04</a></td>
                <td>Right</td>
                <td><span class="label label-danger">Edit</span></td>

              </tr>

        </tbody>
            </table>
          </div>
          <!-- /.table-responsive -->
        </div>

      </div>
    </div>  <!-- /.row -->
  </div>
