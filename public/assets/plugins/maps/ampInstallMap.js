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

    var lonLat = new OpenLayers.LonLat( 25.465831,65.019906 ).transform(epsg4326, projectTo);


    var zoom=17;
    installmap.setCenter (lonLat, zoom);

    var vectorLayer = new OpenLayers.Layer.Vector("Overlay");

    // Define markers as "features" of the vector layer:
    var feature = new OpenLayers.Feature.Vector(
            new OpenLayers.Geometry.Point( 25.465466, 65.020550  ).transform(epsg4326, projectTo),
            {description:'html'} ,
            {externalGraphic: 'https://maps.gstatic.com/mapfiles/ms2/micons/red-dot.png', graphicHeight: 25, graphicWidth: 21, graphicXOffset:-12, graphicYOffset:-25  }
        );
    vectorLayer.addFeatures(feature);

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

							"<br><button type='button' onclick='saveData()' class='btn btn-block btn-success'>Save</button>";

					"</form-group>";


    var feature = new OpenLayers.Feature.Vector(
            new OpenLayers.Geometry.Point( 25.465552, 65.019104 ).transform(epsg4326, projectTo),
            {description:html} ,
            {externalGraphic: 'https://maps.gstatic.com/mapfiles/ms2/micons/red-dot.png', graphicHeight: 25, graphicWidth: 21, graphicXOffset:-12, graphicYOffset:-25  }
        );
    vectorLayer.addFeatures(feature);


	 var feature = new OpenLayers.Feature.Vector(
            new OpenLayers.Geometry.Point( 25.465102, 65.020201 ).transform(epsg4326, projectTo),
            {description:'html'} ,
            {externalGraphic: 'https://maps.gstatic.com/mapfiles/ms2/micons/red-dot.png', graphicHeight: 25, graphicWidth: 21, graphicXOffset:-12, graphicYOffset:-25  }
        );
    vectorLayer.addFeatures(feature);

    var feature = new OpenLayers.Feature.Vector(
            new OpenLayers.Geometry.Point( 25.464984, 65.019480).transform(epsg4326, projectTo),
            {description:'London Eye'} ,
            {externalGraphic: 'https://maps.gstatic.com/mapfiles/ms2/micons/red-dot.png', graphicHeight: 25, graphicWidth: 21, graphicXOffset:-12, graphicYOffset:-25  }
        );
    vectorLayer.addFeatures(feature);

    var feature = new OpenLayers.Feature.Vector(
            new OpenLayers.Geometry.Point( 25.466689, 65.020260).transform(epsg4326, projectTo),
            {description:'London Eye'} ,
            {externalGraphic: 'https://maps.gstatic.com/mapfiles/ms2/micons/red-dot.png', graphicHeight: 25, graphicWidth: 21, graphicXOffset:-12, graphicYOffset:-25  }
        );
    vectorLayer.addFeatures(feature);

    installmap.addLayer(vectorLayer);

    var feature = new OpenLayers.Feature.Vector(
            new OpenLayers.Geometry.Point( 25.466636, 65.019458).transform(epsg4326, projectTo),
            {description:'London Eye'} ,
            {externalGraphic: 'https://maps.gstatic.com/mapfiles/ms2/micons/red-dot.png', graphicHeight: 25, graphicWidth: 21, graphicXOffset:-12, graphicYOffset:-25  }
        );
    vectorLayer.addFeatures(feature);

    installmap.addLayer(vectorLayer);

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
