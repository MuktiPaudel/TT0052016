<html>
<head>
</head>
<body>

       <table>
       <thead>

         <tr>
           <th class="numeric"> Amp Field</th>
           <th class="numeric">Something</th>

        </tr>
       </thead>
       <tbody>
         <div
         <tr>
             @foreach($data as $taxi)
           <td data-title="amp_field" class="numeric">{{$taxi}} <br></td>
             @endforeach
        </tr>
        <tr>
           @foreach($add as $mexy)
           <td data-title="address" class="numeric">{{$mexy}}</td>
             @endforeach
         </tr>



       </tbody>
     </table>

</body>



</html>
