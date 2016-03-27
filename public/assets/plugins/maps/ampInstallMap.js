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
    installmap.addLayer(new OpenLayers.Layer.OSM());

    epsg4326 =  new OpenLayers.Projection("EPSG:4326"); //WGS 1984 projection
    projectTo = installmap.getProjectionObject(); //The map projection (Spherical Mercator)

    var lonLat = new OpenLayers.LonLat(center['center_latitude'], center['center_longitude']).transform(epsg4326, projectTo);


    var zoom=15;
    installmap.setCenter (lonLat, zoom);

    var vectorLayer = new OpenLayers.Layer.Vector("Overlay");

	  var html =
        "<div class='box-body'>"+
         "<div class='row'>"+
          "<div class='col-md-9 col-sm-6'>"+
           "<form-group id='group_form'>" +

				" <label>Amp-ID : 10</label>" +
						    "<input id='group_id' type='text' name='field_group' class='form-control' value 'whatever'style='width: 100%;'></input>"+

				"<br><select id='group_color' name='color' class='form-control select2' style='width: 100%;'>"+
							  "<option selected='selected'>Color</option>"+
							  "<option value='Red'>Red</option>"+
							  "<option value='Green'>Green</option>"+
							  "<option value='Blue'>Blue</option>"+
							  "<option value='Yellow'>Yellow</option>"+
							  "<option value='Black'>Black</option>"+
							  "<option value='Indigo'>Indigo</option>"+
                "<option value='Purple'>Purple</option>"+
							  "<option value='Brown'>Brown</option>"+
						"</select>"+

  						"<br><button id='markers_btn' type='button' class='btn btn-block btn-success'>Save</button>";

					"</form-group>"+
          "</div>"+
          "</div>"+
    "</div>";

      for (var i = 0; i < coordinates.length; i++) {
        // Define markers as "features" of the vector layer:
        var feature = new OpenLayers.Feature.Vector(
                new OpenLayers.Geometry.Point( coordinates[i]['amp_latitude'], coordinates[i]['amp_longitude'] ).transform(epsg4326, projectTo),
                {description: html} ,
                {externalGraphic: 'https://maps.gstatic.com/mapfiles/ms2/micons/red-dot.png', graphicHeight: 25, graphicWidth: 21, graphicXOffset:-12, graphicYOffset:-25  }
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

    installmap.addControl(controls['selector']);
    controls['selector'].activate();
