<footer class="main-footer">
  <div class="pull-right hidden-xs">
    <b>Version</b> 1.0.0
  </div>
  <strong>Copyright &copy; 2016<a href="">Qlu Oy</a>.</strong> All rights reserved.
</footer>

<div class="control-sidebar-bg"></div>

</div><!-- ./wrapper -->

<!-- jQuery 2.1.4 -->
<script type="text/javascript" src="{{ asset('assets/plugins/maps/js/OpenLayers.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/plugins/maps/js/OpenStreetMap.js') }}" ></script>
<script type="text/javascript" src="{{ asset('assets/plugins/maps/fieldMap.js') }}" ></script>

@if(isset($field_coordinates) && !empty($field_coordinates))
<script type="text/javascript" src="{{ asset('assets/plugins/maps/ampInstallMap.js') }}" ></script>
<script type="text/javascript" src="{{ asset('assets/plugins/maps/ampmap_plan.js') }}" ></script>
@endif
<script type="text/javascript" src="{{ asset('assets/plugins/maps/ampcenter.js') }}" ></script>
<!-- jQuery 2.1.4 -->
<script type="text/javascript" src="{{ asset('assets/plugins/jQuery/jQuery-2.1.4.min.js') }}" ></script>
<!-- Bootstrap 3.3.5 -->
<script type="text/javascript" src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}" ></script>
<!-- AdminLTE App -->
<script type="text/javascript" src="{{ asset('assets/dist/js/app.min.js') }}" ></script>
<!-- ChartJS 1.0.1 -->
<!-- iCheck -->
<!--<script type="text/javascript" src="{{ asset('assets/plugins/iCheck/icheck.min.js') }}" ></script>-->

<script type="text/javascript" src="{{ asset('assets/bootstrap/js/filter.js') }}" ></script>

<!--selectable dropdown inpupt  -->
<!-- <script type="text/javascript" src="{{ asset('assets/plugins/selectable/jquery.js') }}" ></script>
     <script type="text/javascript" src="{{ asset('assets/plugins/selectable/selectize.js') }}" ></script>
     <script type="text/javascript" src="{{ asset('assets/plugins/selectable/index.js') }}" ></script>
-->
<script>
$(document).ready(function() {

/*
  $('input').iCheck({
    checkboxClass: 'icheckbox_square-blue',
    radioClass: 'iradio_square-green',
    increaseArea: '50%' // optional
  });
  */

  $('body').on('click', '#markers_btn', function () {
    //alert($('#group_id').value());
    console.log('clicked');
  });

  function saveData() {

  }


$('#groups').on('change', function() {
  console.log("value changed");
  if ($(this).val())
    $.ajax({
    method: 'POST',
     type: 'POST',
     //dataType: 'application/json',
     data: {'field' : $('#groups').val()},
     cache: false,
     url: "get_amplifiers",
     success: function(ret) {
       console.log(ret);
       //console.log(JSON.parse(ret.responseText));
//JSON.parse(ret.responseText)
       var selectbox = $('#amplifiers');
       selectbox.find('option').remove();
       $.each(ret, function(key, value) {
         selectbox.append($('<option></option>').attr('value', key).text(value));
       });
     },
     error: function(err) {
       console.log("error");
       console.log(err);
     }
   });
});


$('#fields').on('change', function() {
  console.log("value changed");
  if ($(this).val())
    $.ajax({
    method: 'POST',
     type: 'POST',
     //dataType: 'application/json',
     data: {'field' : $('#fields').val()},
     cache: false,
     url: "get_amp_groups",
     success: function(rets) {
       console.log(rets);
       //console.log(JSON.parse(ret.responseText));
//JSON.parse(ret.responseText)
       var groupselectbox = $('#groups');
       groupselectbox.find('option').remove();
       $.each(rets, function(key, value) {
         groupselectbox.append($('<option></option>').attr('value', key).text(value));
       });
     },
     error: function(err) {
       console.log("error");
       console.log(err);
     }
   });
});

});
</script>
@if(isset($logs))
<script type="text/javascript" src="{{ asset('assets/plugins/chartjs/Chart.min.js') }}" ></script>
<script type="text/javascript" src="{{ asset('assets/plugins/chartjs/Chart.js') }}" ></script>
<script>
$(function () {
    /* ChartJS
     */
    // Get context with jQuery - using jQuery's .get() method.
    var areaChartCanvas = $("#areaChart").get(0).getContext("2d");
    // This will get the first returned node in the jQuery collection.
    var areaChart = new Chart(areaChartCanvas);

    var areaChartData = {
      labels: [{!! "'" . implode("','", collect($logs)->sortBy('time')->pluck('time')->take(24)->all()) . "'" !!}],
      datasets: [
        {
          label: "Temperature",
          fillColor: "rgba(210, 214, 222, 1)",
          strokeColor: "rgba(210, 214, 222, 1)",
          pointColor: "rgba(210, 214, 222, 1)",
          pointStrokeColor: "#c1c7d1",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "rgba(220,220,220,1)",
          data: [{!! implode(",", collect($logs)->sortBy('time')->pluck('temperature')->take(24)->all()) !!}]
          //$logs->pluck('temperature')->all(); }}
          //[-50, -34, -33, -22, -25, -35, -40, -11, 59, 80, 81, 56, 55, 40, 65, 59, 80, 81, 56, 55, 40]
        },
        {
          label: "Voltage",
          fillColor: "rgba(60,141,188,0.9)",
          strokeColor: "rgba(60,141,188,0.8)",
          pointColor: "#3b8bba",
          pointStrokeColor: "rgba(60,141,188,1)",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "rgba(60,141,188,1)",
          data: [{!! implode(",", collect($logs)->sortBy('time')->pluck('amp_battery')->take(24)->all()) !!}]
        }
      ]

    };

    var areaChartOptions = {
      //Boolean - If we should show the scale at all
      showScale: true,
      //Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines: true,
      //String - Colour of the grid lines
      scaleGridLineColor: "rgba(0,0,0,.05)",
      //Number - Width of the grid lines
      scaleGridLineWidth: 1,
      //Boolean - Whether to show horizontal lines (except X axis)
      scaleShowHorizontalLines: true,
      //Boolean - Whether to show vertical lines (except Y axis)
      scaleShowVerticalLines: true,
      //Boolean - Whether the line is curved between points
      bezierCurve: true,
      //Number - Tension of the bezier curve between points
      bezierCurveTension: 0.3,
      //Boolean - Whether to show a dot for each point
      pointDot: true,
      //Number - Radius of each point dot in pixels
      pointDotRadius: 3,
      //Number - Pixel width of point dot stroke
      pointDotStrokeWidth: 1,
      //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
      pointHitDetectionRadius: 20,
      //Boolean - Whether to show a stroke for datasets
      datasetStroke: true,
      //Number - Pixel width of dataset stroke
      datasetStrokeWidth: 2,
      //Boolean - Whether to fill the dataset with a color
      datasetFill: false,
      //String - A legend template
      legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].lineColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
      //Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
      maintainAspectRatio: true,
      //Boolean - whether to make the chart responsive to window resizing
      responsive: true
    };
    //Create the line chart
    areaChart.Line(areaChartData, areaChartOptions);
  });
</script>
@endif
@yield('js')
</body>
</html>
