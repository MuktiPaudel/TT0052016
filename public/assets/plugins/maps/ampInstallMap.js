
// Creates the viwer by creating map.
// OpenLayers.Map constructor's argument "deviceinstall" as an id of html element.
 installmap = new OpenLayers.Map("deviceinstall", {
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


    installmap.addLayer(new OpenLayers.Layer.OSM());  // Process of creating a viewer : add a OSM layer to the Map.

    epsg4326 =  new OpenLayers.Projection("EPSG:4326"); //WGS 1984 projection
    projectTo = installmap.getProjectionObject(); //The map projection (Spherical Mercator)

   // defining center of the map where it zooms the map during loading
    var lonLat = new OpenLayers.LonLat(center['center_latitude'], center['center_longitude']).transform(epsg4326, projectTo);


    var zoom=15;
    installmap.setCenter (lonLat, zoom);

    var vectorLayer = new OpenLayers.Layer.Vector("Overlay");

      for (var i = 0; i < coordinates.length; i++) {
    	  var html =
            "<div class='box-body'><form action='update_amp_group' method='POST'>"+
            "<input type='hidden' name='_token' value='" + csrf_token + "'>"+
            "<input type='hidden' name='field_id' value='" + field_id + "'>"+
            "<input type='hidden' name='amp_id' value='" + coordinates[i]['amp_id']+ "'>"+
             "<div class='row'>"+
              "<div class='col-md-9 col-sm-6'>"+
               "<form-group id='group_form'>" +
          " <h4>Amp Id: " + coordinates[i]['mac_id'] + "</h4>"+
    			" <label>Group Name</label>" +
    						    "<input id='group_name' type='text' name='group_name' class='form-control' value='" + (coordinates[i]['group']['name'] !== undefined ? coordinates[i]['group']['name'] : '') + "' 'whatever'style='width: 100%;'></input>"+

         " <label> Group Color</label>" +
    				"<br><select id='group_color' name='group_color' class='form-control select2' style='width: 100%;'>"+
    							  "<option >Color</option>"+
    							  "<option "+(coordinates[i]['group']['color'] == 'Red' ? "selected='selected'" : '' )+" value='Red'>Red</option>"+
    							  "<option "+(coordinates[i]['group']['color'] == 'Green' ? "selected='selected'" : '' )+" value='Green'>Green</option>"+
    							  "<option "+(coordinates[i]['group']['color'] == 'Blue' ? "selected='selected'" : '' )+" value='Blue'>Blue</option>"+
    							  "<option "+(coordinates[i]['group']['color'] == 'Yellow' ? "selected='selected'" : '' )+" value='Yellow'>Yellow</option>"+
    							  "<option "+(coordinates[i]['group']['color'] == 'Black' ? "selected='selected'" : '' )+" value='Black'>Black</option>"+
    							  "<option "+(coordinates[i]['group']['color'] == 'Indigo' ? "selected='selected'" : '' )+" value='Indigo'>Indigo</option>"+
                    "<option "+(coordinates[i]['group']['color'] == 'Purple' ? "selected='selected'" : '' )+" value='Purple'>Purple</option>"+
    							  "<option "+(coordinates[i]['group']['color'] == 'Brown' ? "selected='selected'" : '' )+" value='Brown'>Brown</option>"+
    						"</select>"+

      						"<br><button id='markers_btn' type='submit' class='btn btn-block btn-success'>Save</button>" +

    					"</form-group>"+
              "</div>"+
              "</div>"+
        "</form></div>";

        // Define markers as "features" of the vector layer, Adding a Vector Marker to the Map
        var feature = new OpenLayers.Feature.Vector(
                new OpenLayers.Geometry.Point( coordinates[i]['amp_latitude'], coordinates[i]['amp_longitude'] ).transform(epsg4326, projectTo),
                {description: html} ,
                {externalGraphic: 'assets/plugins/maps/js/img/marker-' + (coordinates[i]['group']['color'] ? coordinates[i]['group']['color'] : 'red') + '.png', graphicHeight: 25, graphicWidth: 21, graphicXOffset:-12, graphicYOffset:-25  }
            );
        vectorLayer.addFeatures(feature);
        installmap.addLayer(vectorLayer);
      }

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
      installmap.addPopup(feature.popup);
    }

    function destroyPopup(feature) {
      feature.popup.destroy();
      feature.popup = null;
    }

   // Adding controls to an already created map
    installmap.addControl(controls['selector']);
    controls['selector'].activate();
