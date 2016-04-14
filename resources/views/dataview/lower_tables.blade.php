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
<!-- /.col -->
<div>
<table class="col-sm-12 table-bordered table-striped table-hover table-condensed cf">

@if (isset($logs))
  <thead class="cf">
   <th>Data ID</th>
   <th>Amp ID</th>
   <th>Time</th>
   <th>Volume</th>
   <th>Battery</th>
   <th>Temprature</th>
   <th>Delay</th>
  </thead>
  <tbody style="margin-left:100px;">

    @foreach ($logs as $row)
      <tr style="margin-left:20px;">
        <td>{{$row->data_id}}</td>
         <td>{{$row->amp_id}} </td>
           <td>{{$row->time}} </td>
            <td> {{$row->amp_volume}}</td>
            <td>{{$row->amp_battery}} </td>
              <td>{{$row->temperature}} </td>
               <td> {{$row->amp_delay}}</td>


            </tr>
    @endforeach
@else
    <thead class="cf">
     <th>Field ID</th>
     <th>Amp Field</th>
     <th>Customer Name</th>
     <th>Address</th>
    </thead>
    <tbody style="margin-left:100px;">
     @foreach ($data as  $row)

      <tr style="margin-left:20px;">
         <td>{{$row->field_id}}</td>
          <td>{{$row->field_name}} </td>
            <td>{{$row->customer_name}} </td>
             <td> {{$row->address}}</td>
      </tr>
     @endforeach
 @endif
</tbody>
</table>
</div>
</div>
<div class="col-sm-12" style="min-height:450px"></div>
</div>
<!-- /.row -->
</div>
