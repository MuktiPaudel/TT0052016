@extends('layouts.teleamp_layout')
@section('content')
   <!-- Main content -->
   <section class="content">
	<div class="row">
	  <div class="col-sm-12">
      <!-- Info boxes -->

      <div class="row">
           <div class="col-md-4">
          <div class="info-box bg-yellow">
            <span class="info-box-icon"><a href=""><i class=" fa fa-globe" style="color:white"></i></a></span>



            <div class="info-box-content">
              <span class="info-box-text">Fields</span>
              <span class="info-box-number">410</span>

              <div class="progress">
                <div class="progress-bar" style="width: 60%"></div>
              </div>
                  <span class="progress-description">
                    60% active fields.
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-4">
          <div class="info-box bg-aqua">
            <span class="info-box-icon"><i class="fa fa-crosshairs"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Group</span>
              <span class="info-box-number">1,410</span>

              <div class="progress">
                <div class="progress-bar" style="width: 60%"></div>
              </div>
                  <span class="progress-description">
                    60% active groups.
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->


        <div class="col-md-4">
          <div class="info-box bg-red">
            <span class="info-box-icon"><i class="fa fa-volume-up"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Amplifier</span>
              <span class="info-box-number">41,410</span>

              <div class="progress">
                <div class="progress-bar" style="width: 30%"></div>
              </div>
                  <span class="progress-description">
                    30% active amplifiers.
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

      </div>
      <!-- /.row -->
  <div class="box-body">
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
          <!-- MAP & BOX PANE -->
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Teleamp Locations</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <div class="row">
                <div class="col-md-9 col-sm-8">
                  <div class="pad">
                    <!-- Map will be created here -->
                    <div id="fieldmap" style="height: 650px;"></div>
                  </div>

                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-4">
                  <div class="pad box-pane-right bg-green" style="min-height: 670px">
                    <div class="description-block margin-bottom">
                      <div class="sparkbar pad" data-color="#fff">90,70,90,70,75,80,70</div>
                      <h5 class="description-header">8390</h5>
                      <span class="description-text">Some Data</span>
                    </div>
                    <!-- /.description-block -->
                    <div class="description-block margin-bottom">
                      <div class="sparkbar pad" data-color="#fff">90,50,90,70,61,83,63</div>
                      <h5 class="description-header">30%</h5>
                      <span class="description-text">Some Data</span>
                    </div>
                    <!-- /.description-block -->
                    <div class="description-block">
                      <div class="sparkbar pad" data-color="#fff">90,50,90,70,61,83,63</div>
                      <h5 class="description-header">70%</h5>
                      <span class="description-text">Some Data</span>
                    </div>
                    <!-- /.description-block -->
                   <div class="description-block">
                      <div class="sparkbar pad" data-color="#fff">90,50,90,70,61,83,63</div>
                      <h5 class="description-header">70%</h5>
                      <span class="description-text">Some Data</span>
                    </div>
					</div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
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
          <!-- /.row -->


          <!-- /.box -->
        </div>
      <!-- /.row -->
	   </div>
	  </div>
	</div>
    </section>
    <!-- /.content -->

     @endsection
  <!-- /.content-wrapper -->
