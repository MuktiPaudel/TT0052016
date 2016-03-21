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
                   <form role="form">

                      <div class="box-body">
                 <div class="row">
                   <div class="col-sm-4">
                     <div class="form-group">
                       <label>Field</label>
                       <select class="form-control select2" style="width: 100%;">
                         <option selected="selected">Oulu-1</option>
                         <option>Helsinki-1</option>
                         <option>Kokkola-1</option>
                         <option>Kokkola-2</option>
                         <option>Oulu-2</option>
                         <option>Helsinki-2</option>
                       </select>
                     </div>
                   </div>
                   <div class="col-sm-4">
                     <div class="form-group">
                       <label>Group</label>
                       <select class="form-control select2" style="width: 100%;">
                         <option selected="selected">Left</option>
                         <option>Right</option>
                         <option>Top</option>
                         <option>Bottom</option>
                         <option>Top-right</option>
                         <option>Top-left</option>
                         <option>Bottom-right</option>
                       </select>
                     </div>
                   </div>
                   <div class="col-sm-4">
                     <div class="form-group">
                       <label>Amplifier</label>
                       <select class="form-control select2" style="width: 100%;">
                         <option selected="selected">Select</option>
                         <option>01</option>
                         <option>02</option>
                         <option>03</option>
                         <option>04</option>
                         <option>05</option>
                         <option>06</option>
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

           </div>
        </div>
        </div>


      </div><!-- /.content-wrapper -->

    @endsection
