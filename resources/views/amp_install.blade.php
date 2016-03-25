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

        <form action="{{action('Teleamp_Controller@save')}}" id="save_form" method="post">
              <div class="box-body">
                <div class="row">
                <div class="col-sm-4">

                 <input type="hidden" name="_token" value="<?= csrf_token(); ?>" >

                 @if(isset($field))
                  <input type="hidden" name="field_id" value="{{ $field->field_id }}" >
                 @endif

                 <label>Field Name</label>
                  <input type="text" name="field_name" value="{{ isset($field) ? $field->field_name : "" }}" class="form-control" >
                  <p style="color:red">{{ $errors->first('field_name') }}</p>

                </div>
                <div class="col-sm-4">
                  <label>Costumer Name</label>
                  <input type="text" name="customer_name" value="{{ isset($field) ? $field->customer_name : "" }}" class="form-control" >
                  <p style="color:red">{{ $errors->first('customer_name') }}</p>
                </div>

                <div class="col-sm-4">
                 <label>Address</label>
                 <input type="text" name="address" value="{{ isset($field) ? $field->address : "" }}" class="form-control">
                 <p style="color:red">{{ $errors->first('address') }}</p>

                </div>
                <div class="col-sm-4">
                 <label>Temperature</label>

                 <input type="text" name="temperature" value="{{ isset($field) ? $field->temperature : "" }}" class="form-control">
                 <p style="color:red">{{ $errors->first('temperature') }}</p>
                </div>

                <div class="col-sm-4">
                  <label>Latitude</label>
                    <tr>
                      <td><input type="text" name="center_latitude" value="{{ isset($field) ? $field->center_latitude : "" }}" class="form-control"  id="frmLon"></td>
                    </tr>
                    <p style="color:green"><?php echo Session::get('message'); ?></p>

                </div>

                <div class="col-sm-4">
                  <label>Longitude</label>
                    <tr>
                     <td><input type="text" name="center_longitude" value="{{ isset($field) ? $field->center_longitude : "" }}" class="form-control"  id="frmLat"></td>
                    </tr>
                </div>

                </div>
              </div>
      <!--
            <div class="box-footer">
                      <button type="submit" value="Save Record" class="btn btn-primary pull-right">Save</button>
            </div>
      -->
        </form>
                </div>
            <!-- /.box -->
           <!-- /.box-header -->
         <div class="box box-success">
          <div class="box-header with-border">
                    <h3 class="box-title">Please locate the center point</h3>

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

                  <div class="box-body">
                   <button class= "btn btn-lg btn-success" id="locate"><span class="glyphicon glyphicon-globe"></span>  Locate me with GPS !</button><br />
                  </div>
                </div><br>

                  <div class="col-md-3 col-sm-6">
                  <div class="box-header with-border">
                              <h3 class="box-title">All data are correct :) </h3>

                  </div>

                  <div class="box-body">
                   <button type="submit" form="save_form" value="Save Record" class="btn btn-md btn-primary pull-right">Save</button>
                  </div>
                  </div>
                 </div>

               </div>

          </div>

          <!-- /.box-header -->
        <div class="box box-success">
         <div class="box-header with-border">
                   <h3 class="box-title">TeleAmp Center : {{ isset($field) ? $field->field_name : "" }}</h3>

                   <div class="box-tools pull-right">
                     <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                     </button>
                     <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                   </div>
          <script>
            var center = {!! isset($field_coordinates) ? $field_coordinates : '[]' !!};
          </script>
          </div>
                 <!-- /.box-header -->

                 @include('installview.amp_map')

         </section>
          <!-- /.content -->
           </div>
        </div>
        </div>


      </div><!-- /.content-wrapper -->

    @endsection
