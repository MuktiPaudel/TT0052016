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

        <!-- Main content -->
        <section class="content">
          <!-- Info boxes -->
          <div class="row">
            <div class="col-md-4 col-sm-6 col-xs-12">
              <div class="info-box bg-yellow">
                <span class="info-box-icon"><a href=""><i class=" fa fa-globe" style="color:white"></i></a></span>
                 <div class="info-box-content">
                  <span class="info-box-text">Fields</span>
                  <span class="info-box-number">100</span>
                  <div class="progress">
                    <div class="progress-bar" style="width: 50%"></div>
                  </div>
                  <span class="progress-description">
                    50% Active fields.
                  </span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
            <div class="col-md-4 col-sm-6 col-xs-12">
              <div class="info-box bg-green">
                <span class="info-box-icon"><i class="fa fa-crosshairs"></i></span>
                  <div class="info-box-content">
                  <span class="info-box-text">Group</span>
                  <span class="info-box-number">500</span>
                  <div class="progress">
                    <div class="progress-bar" style="width: 70%"></div>
                  </div>
                  <span class="progress-description">
                    70% Active Fields.
                  </span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->

            <!-- fix for small devices only -->
            <div class="clearfix visible-sm-block"></div>

            <div class="col-md-4 col-sm-6 col-xs-12">
              <div class="info-box bg-aqua">
                <span class="info-box-icon"><i class="fa fa-volume-up"></i></span>
                  <div class="info-box-content">
                  <span class="info-box-text">Amplifiers</span>
                  <span class="info-box-number">2.000</span>
                  <div class="progress">
                    <div class="progress-bar" style="width: 60%"></div>
                  </div>
                  <span class="progress-description">
                    60% Active amplifiers.
                  </span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
          <!-- Main row -->
          <div class="row">
            <!-- Left col -->
            <div class="col-md-12">
              <!-- MAP & BOX PANE -->
              <div class="box box-success">
                <div class="box-header with-border">
                  <h3 class="box-title">Visitors Report</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body no-padding">
                  <div class="row">
                    <div class="col-md-9 col-sm-8">
                      <div class="pad">
                      <!-- Map will be created here -->
                         <div id="fieldmap" style="height: 650px;"></div>
                       </div>
                    </div><!-- /.col -->
                    <div class="col-md-3 col-sm-4">
                      <div class="pad box-pane-right bg-green" style="min-height: 670px">
                        <div class="description-block margin-bottom">
                          <div class="sparkbar pad" data-color="#fff">90,70,90,70,75,80,70</div>
                          <h5 class="description-header">8390</h5>
                          <span class="description-text">Visits</span>
                        </div><!-- /.description-block -->
                        <div class="description-block margin-bottom">
                          <div class="sparkbar pad" data-color="#fff">90,50,90,70,61,83,63</div>
                          <h5 class="description-header">30%</h5>
                          <span class="description-text">Referrals</span>
                        </div><!-- /.description-block -->
                        <div class="description-block">
                          <div class="sparkbar pad" data-color="#fff">90,50,90,70,61,83,63</div>
                          <h5 class="description-header">70%</h5>
                          <span class="description-text">Organic</span>
                        </div><!-- /.description-block -->
                      </div>
                    </div><!-- /.col -->
                  </div><!-- /.row -->
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        <div class="row">
            <div class="col-md-6">
               <div class="box-header with-border">
                 <a class="btn btn-block btn-social btn-google">
                 <i class="fa fa-database"></i> Work on existing system.
                 </a>
                </div><!-- /.box-header -->
            </div>

            <div class="col-md-6">
               <div class="box-header with-border">
                <a class="btn btn-block btn-social btn-tumblr">
                 <i class="fa fa-search"></i> Scan the new system.
                </a>
              </div><!-- /.box-header -->
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12" style="min-height:50px"></div>
        </div>
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

    @endsection
