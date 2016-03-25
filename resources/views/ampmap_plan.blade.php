@extends('layouts.teleamp_layout')
@section('content')

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Dashboard
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
                     <h3 class="box-title">Please make your search.</h3>
                   </div>
                   <!-- /.box-header -->
                   <!-- form start -->
                   <form role="form" method="GET">

                      <div class="box-body">
                 <div class="row">
                   <div class="col-sm-4">
                     <div class="form-group">
                       <label>Field</label>
                       <select name="field_id" class="form-control select2" style="width: 100%;">
                         @foreach ($fields as $row)
                     <option value="{{$row->field_id}}">{{$row->field_name}}</option><br>
                        @endforeach
                       </select>
                     </div>
                   </div>
                 </div>
                      </div>

                     <div class="box-footer">
                         <button type="submit" class="btn btn-success btn-md pull-right">Search</button>
                         <button type="submit" class="btn btn-danger btn-md pull-left">Reset</button>
                     </div>
                   </form>
                 </div>
            <!-- /.box -->
           <!-- /.box-header -->
           @if(!empty($field_coordinates))
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
                  <div class="col-md-8 col-sm-6">
                    <script>
                      var coordinates = {!! isset($amp_coordinates) ? $amp_coordinates : '[]' !!};
                      var center = {!! $field_coordinates !!};
                    </script>
                        <div class="pad">
                          <!-- Map will be created here -->
                          <div id="devicemap_plan" style="height: 600px;"></div>
                        </div>

                  </div>
                  <div class="col-md-4 col-sm-6">
                  <!-- /.box-header -->
                  <div class="box-body">
                    <div class="table-responsive">
                      <table class="table no-margin">
                        <thead>
                        <tr>
                          <th>AmpID</th>
                          <th>Group</th>
                          <th>Action</th>
                          <th>PS</th>
                          <th>AM</th>
                          <th>Volume</th>
                        </tr>
                        </thead>
                        <tbody>

                          @foreach (json_decode($amp_coordinates, true) as $amp)
                          <tr>
                            <td><a href="#">{{ $amp['amp_id'] }}</a></td>
                            <td>{{ $amp['name'] }}</td>
                            <td><img src="assets/plugins/maps/js/img/marker-{{ $amp['color'] }}.png"></td>
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

          </div>
  @endif
           </div>
        </div>
        </div>


      </div><!-- /.content-wrapper -->

    @endsection
