@extends('layouts.teleamp_layout')
@section('content')

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Teleamp Database
            <small>Version 1.0.0</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Data</li>
          </ol>
        </section>
        <!-- Content Wrapper. Contains page content -->
        <div class="content">
        <div class="row">
          <div class="col-sm-12">

         <!-- Main content -->
          <section class="content">
            @include('dataview.upper_filter')
            <!-- /.box -->
            @include('dataview.lower_tables')

        </div>
      </div>
    </div>
</section>

      </div><!-- /.content-wrapper -->

    @endsection
