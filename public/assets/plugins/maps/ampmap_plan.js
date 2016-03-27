ampmap_plan = new OpenLayers.Map("devicemap_plan", {
                   controls: [
                       new OpenLayers.Control.Navigation(),
                       new OpenLayers.Control.PanZoomBar(),
                       new OpenLayers.Control.LayerSwitcher({'ascending':true}),
                       new OpenLayers.Control.Permalink(),
                       new OpenLayers.Control.ScaleLine(),
                       new OpenLayers.Control.Permalink('permalink'),
                       new OpenLayers.Control.MousePosition(),
                       new OpenLayers.Control.OverviewMap(),
                       new OpenLayers.Control.KeyboardDefaults()
                   ]


               });
   ampmap_plan.addLayer(new OpenLayers.Layer.OSM());

   epsg4326 =  new OpenLayers.Projection("EPSG:4326"); //WGS 1984 projection
   projectTo = ampmap_plan.getProjectionObject(); //The map projection (Spherical Mercator)

   var lonLat = new OpenLayers.LonLat(center['center_latitude'], center['center_longitude']).transform(epsg4326, projectTo);


   var zoom=16;
   ampmap_plan.setCenter (lonLat, zoom);

   var vectorLayer = new OpenLayers.Layer.Vector("Overlay");


   for (var i = 0; i < coordinates.length; i++) {
     // Define markers as "features" of the vector layer:
     var feature = new OpenLayers.Feature.Vector(
             new OpenLayers.Geometry.Point( coordinates[i]['amp_latitude'], coordinates[i]['amp_longitude'] ).transform(epsg4326, projectTo),
             {description:( coordinates[i]['amp_id'])} ,
             {externalGraphic: 'assets/plugins/maps/js/img/marker-red.png', graphicHeight: 25, graphicWidth: 21, graphicXOffset:-12, graphicYOffset:-25  }
         );
     vectorLayer.addFeatures(feature);
     ampmap_plan.addLayer(vectorLayer);
   }



  var html = "<form-group>" +

       " <label>Amp-ID : 10</label>" +
               "<select class='form-control select2' style='width: 100%;'>"+
               "<option selected='selected'>Group</option>"+
               "<option>Left</option>"+
               "<option>Right</option>"+
               "<option>Front</option>"+
               "<option>Bottom</option>"+
               "<option>Front-Right</option>"+
               "<option>Front-Left</option>"+
             "</select>"+

             "<br><select class='form-control select2' style='width: 100%;'>"+
               "<option selected='selected'>Color</option>"+
               "<option>Red</option>"+
               "<option>Green</option>"+
               "<option>Blue</option>"+
               "<option>Yellow</option>"+
               "<option>Pink</option>"+
               "<option>Black</option>"+
             "</select>"+

             "<br><button type='button' onclick='' class='btn btn-block btn-success'>Save</button>";

         "</form-group>";

   //Add a selector control to the vectorLayer with popup functions
   var controls = {
     selector: new OpenLayers.Control.SelectFeature(vectorLayer, { onSelect: createPopup, onUnselect: destroyPopup })
   };

   function createPopup(feature) {
     feature.popup = new OpenLayers.Popup.FramedCloud("pop",
         feature.geometry.getBounds().getCenterLonLat(),
         null,
         '<div class="markerContent">'+feature.attributes.description+'</div>',
         null,
         true,
         function() { controls['selector'].unselectAll(); }
     );
     //feature.popup.closeOnMove = true;
     ampmap_plan.addPopup(feature.popup);
   }

   function destroyPopup(feature) {
     feature.popup.destroy();
     feature.popup = null;
   }

   ampmap_plan.addControl(controls['selector']);
   controls['selector'].activate();
