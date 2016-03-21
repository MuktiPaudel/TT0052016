@extends('layouts.teleamp_layout')
@section('content')

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Installation
            <small>Version 1.0.0</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol>
        </section>
        <!-- Content Wrapper. Contains page content -->

        <div class="content">
        <div class="row">
          <div class="col-sm-12">

         <!-- Main content -->
          <section class="content">
            <!-- SELECT2 EXAMPLE -->
             <div class="box box-success">
                  <div class="box-header with-border">
                    <h3 class="box-title">Please fill the form.</h3>
                  </div>
                    <!-- /.box-header -->
                  <!-- form start -->

        <form action="{{action('Teleamp_Controller@save')}}"  method="post">
              <div class="box-body">
                <div class="row">
                <div class="col-sm-4">

                 <input type="hidden" name="_token" value="<?= csrf_token(); ?>" >

                 <label>Field Name</label>
                  <input type="text" name="field_name" class="form-control" >
                  <p style="color:red">{{ $errors->first('field_name') }}</p>

                </div>
                <div class="col-sm-4">
                  <label>Costumer Name</label>
                  <input type="text" name="customer_name" class="form-control" >
                  <p style="color:red">{{ $errors->first('customer_name') }}</p>
                  <p style="color:green"><?php echo Session::get('message'); ?></p>

                </div>
                <div class="col-sm-4">
                 <label>Address</label>
                 <input type="text" name="address" class="form-control">
                 <p style="color:red">{{ $errors->first('address') }}</p>

                </div>
                </div>
              </div>

            <div class="box-footer">
                      <button type="submit" value="Save Record" class="btn btn-primary pull-right">Save</button>
            </div>
        </form>
                </div>
            <!-- /.box -->
           <!-- /.box-header -->
         <div class="box box-success">
          <div class="box-header with-border">
                    <h3 class="box-title">TeleAmp Field : Raatin Uimahalli</h3>

                    <div class="box-tools pull-right">
                      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                      </button>
                      <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
          </div>
                  <!-- /.box-header -->
          <div class="box-body">
               <div class="row">
                  <div class="col-md-9 col-sm-6">

                        <div class="pad">
                          <!-- Map will be created here -->
                          <div id="deviceinstall" style="height: 600px;"></div>
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
                        <tr>
                          <td><a href="#">05</a></td>
                          <td>Right</td>
                          <td><span class="label label-danger">Edit</span></td>

                        </tr>
                        <tr>
                          <td><a href="#">06</a></td>
                          <td>Right</td>
                          <td><span class="label label-danger">Edit</span></td>

                        </tr>
                        <tr>
                          <td><a href="#">07</a></td>
                          <td>Top</td>
                          <td><span class="label label-warning">Edit</span></td>

                        </tr>
                 <tr>
                          <td><a href="#">08</a></td>
                          <td>Top</td>
                          <td><span class="label label-warning">Edit</span></td>

                        </tr>
                 <tr>
                          <td><a href="#">09</a></td>
                          <td>Bottom</td>
                          <td><span class="label label-info">Edit</span></td>

                        </tr>
                 <tr>
                          <td><a href="#">10</a></td>
                          <td>Bottom</td>
                          <td><span class="label label-info">Edit</span></td>

                        </tr>
                 <tr>
                          <td><a href="#">11</a></td>
                          <td>Bottom</td>
                          <td><span class="label label-info">Edit</span></td>

                        </tr>
                 <tr>
                          <td><a href="#">12</a></td>
                          <td>Top</td>
                          <td><span class="label label-warning">Edit</span></td>

                        </tr>
                 <tr>
                          <td><a href="#">13</a></td>
                          <td>Front-right</td>
                          <td><span class="label label-primary">Edit</span></td>

                        </tr>
               </tr>
                 <tr>
                          <td><a href="#">14</a></td>
                          <td>Front-Left</td>
                          <td><span class="label label-primary">Edit</span></td>

                        </tr>
                 <tr>
                          <td><a href="#">15</a></td>
                          <td>Bottom</td>
                          <td><span class="label label-info">Edit</span></td>

                        </tr>
                        </tbody>
                      </table>
                    </div>
                    <!-- /.table-responsive -->
                  </div>
                </div>
              </div>  <!-- /.row -->
            </div>

          </div>

          <!-- /.box-header -->
        <div class="box box-success">
         <div class="box-header with-border">
                   <h3 class="box-title">TeleAmp Center : Raatin Uimahalli</h3>

                   <div class="box-tools pull-right">
                     <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                     </button>
                     <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                   </div>
                 </div>
                 <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                 <div class="col-md-9 col-sm-6">

                   <script type="text/javascript" language="javascript">
                       window.onload = function()
                        {
                            init();
                        };
                   </script>
                       <div class="pad">
                         <!-- Map will be created here -->

                        <div id="map" style="height: 400px"></div>
                        <div id="geo" style="width: 300px;position: absolute;left: 620px;top: 200px;" class="tekst">
                       </div>

                 </div>

             </div>  <!-- /.row -->
            <div class="col-md-3 col-sm-6">
              <div class="box-header with-border">
                        <h3 class="box-title">Please chose one option ! </h3>

              </div>

                <!-- /.box-header -->
                <div class="box-body">
               <label>Longitude</label>
                  <tr>
                  <td><input type="text" class="form-control"  id="frmLat"></td>
                  </tr><br>

                <label>Latitude</label>
                  <tr>
                    <td><input type="text" class="form-control"  id="frmLon"></td>
                  </tr>

                </div>
            </div>


            <div class="col-md-3 col-sm-6">
                <div class="box-body">

                <input type="submit" class= "btn btn-sm btn-primary pull-right" id="setLatLon"  value="Set the LonLat"><br />

                </div><hr>
            </div>

            <div class="col-md-3 col-sm-6">
              <div class="box-body">
               <button class= "btn btn-lg btn-success" id="locate"><span class="glyphicon glyphicon-globe"></span>  Locate me with GPS !</button><br />
              </div>
            </div>
           </div>

         </div>
        </section>
          <!-- /.content -->
           </div>
        </div>
        </div>


      </div><!-- /.content-wrapper -->

    @endsection
