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
<script type="text/javascript" src="{{ asset('assets/plugins/maps/ampInstallMap.js') }}" ></script>
<script type="text/javascript" src="{{ asset('assets/plugins/maps/ampcenter.js') }}" ></script>

<!-- jQuery 2.1.4 -->
<script type="text/javascript" src="{{ asset('assets/plugins/jQuery/jQuery-2.1.4.min.js') }}" ></script>
<!-- Bootstrap 3.3.5 -->
<script type="text/javascript" src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}" ></script>
<!-- AdminLTE App -->
<script type="text/javascript" src="{{ asset('assets/dist/js/app.min.js') }}" ></script>
<!-- ChartJS 1.0.1 -->
<!--
<script type="text/javascript" src="{{ asset('assets/plugins/chartjs/Chart.min.js') }}" ></script>
<script type="text/javascript" src="{{ asset('assets/plugins/chartjs/Chart.js') }}" ></script>
<script type="text/javascript" src="{{ asset('assets/plugins/chartjs/chartjs.js') }}" ></script>
-->
<script>
$(document).ready(function() {
  console.log("loaded");
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

   }
 );
});
});
</script>
</body>
</html>
