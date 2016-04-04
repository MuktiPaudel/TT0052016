<div class="box box-success">

         <!-- /.box-header -->
    <div class="box-body">
      <div class="row">
         <div class="col-sm-12">


         <div class="box-header with-border">
     <div class="row">
          <div class="col-sm-5">
    @if(isset($selection))
    <button type="submit" class="btn btn-success btn-sm pull-left">{{ $selection['field']->field_name }}</button>
    <button type="submit" class="btn btn-success btn-sm pull-left">{{ $selection['group']->name }}</button>
    <button type="submit" class="btn btn-success btn-sm pull-left">{{ $selection['amplifier']->mac_id }}</button>
    @endif
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
