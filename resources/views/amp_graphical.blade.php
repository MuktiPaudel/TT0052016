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
                        <option selected="selected">01</option>
                        <option>02</option>
                        <option>03</option>
                        <option>04</option>
                        <option>05</option>
                        <option>06</option>
                        <option>07</option>
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

                     <!-- /.box-header -->
                <div class="box-body">
                  <div class="row">
                     <div class="col-sm-12">


                     <div class="box-header with-border">
         			   <div class="row">
                      <div class="col-sm-5">
         			  <button type="submit" class="btn btn-success btn-sm pull-left">Oulu -1</button>
         			  <button type="submit" class="btn btn-success btn-sm pull-left">Left</button>
         			  <button type="submit" class="btn btn-success btn-sm pull-left">01</button>

         		    </div>
         			<div class="col-sm-5">
         			  <button type="submit" class="btn btn-primary btn-sm pull-left">Battery(%)</button>
         			  <button type="submit" class="btn  btn-sm pull-left">Temperature(C)</button>
         		    </div>
                       <div class="box-tools pull-right">
                         <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                         </button>
                         <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                       </div>
                     </div>
         			 </div>
                     <div class="box-body">
                       <div class="chart">
                         <canvas id="areaChart" style="height:400px"></canvas>
                       </div>
                     </div>

         			  <div class="box-footer">
                         <button  class="btn btn-sm pull-right ">Time</button>

                       </div>
         			<div class="box-body">
                       <div>
                         <canvas style="height:100px"></canvas>
                       </div>
               </div>

                     <!-- /.box-body -->



                     </div>

                 </div>  <!-- /.row -->
               </div>

             </div>

        </div>
      </div>
    </div>
</section>

      </div><!-- /.content-wrapper -->

    @endsection
