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
<div id="collapsible-tables">
<table class="col-sm-12 table-bordered table-striped table-hover table-condensed cf">
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
</tbody>
</table>
</div>
</div>
<div class="col-sm-12" style="min-height:450px"></div>
</div>
<!-- /.row -->
</div>
