@extends('layouts.teleamp_layout')
@section('content')

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Teleamp Map-plan
            <small>Version 1.0.0</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Map-plan</li>
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
                          <th>color</th>
                          <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>

                          @foreach (json_decode($amp_coordinates, true) as $amp)
                          <tr>
                            <td><a href="#">{{ $amp['amp_id'] }}</a></td>
                            <td>{{ $amp['name'] }}</td>
                            <td><img src="assets/plugins/maps/js/img/marker-{{ $amp['color'] }}.png"></td>
                            <td><button type="submit" class="btn btn-success" data-toggle="modal" data-target="#myModal">
                              <i class="fa fa-md fa-gears (alias)"></i>

                            </button>
                            </td>
                          </tr>
                          @endforeach

                          <div id='myModal' class="modal">
                                     <div class="modal-dialog">
                                       <div class="modal-content">
                                         <div class="modal-header">
                                           <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                           <h4 class="modal-title">Settings</h4>
                                         </div>
                                         <div class="modal-body">
                                        <div class="row">
                                           <div class="col-sm-4">
                                             <label>  Power Saving   </label>
                                             <div class="checkbox icheck">
                                                  <input type="checkbox"></input>
                                             </div>
                                            </div><!-- /.col -->
                                            <div class="col-sm-4">
                                               <label> Amplifier Mute  </label>
                                               <div class="checkbox icheck ">
                                                  <input type="checkbox">
                                               </div>
                                             </div><!-- /.col -->
                                             <div class="col-sm-4">
                                               <label style="margin-bottom:15px;">Volume Level</label>
                                               <div>
                                                <select class="form-control">
                                                  <option>1</option>
                                                  <option>2</option>
                                                  <option>3</option>
                                                  <option>400</option>
                                                </select>
                                              </div>
                                              </div><!-- /.col -->
                                         </div>

                                       </div>
                                         <div class="modal-footer">
                                           <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                           <button type="button" class="btn btn-primary" data-dismiss="modal">Save changes</button>
                                         </div>
                                       </div><!-- /.modal-content -->
                                     </div><!-- /.modal-dialog -->
                                   </div><!-- /.modal -->



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
