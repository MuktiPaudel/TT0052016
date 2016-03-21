    fildmap = new OpenLayers.Map("fieldmap", {
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
    fildmap.addLayer(new OpenLayers.Layer.OSM());



    epsg4326 =  new OpenLayers.Projection("EPSG:4326"); //WGS 1984 projection
    projectTo = fildmap.getProjectionObject(); //The map projection (Spherical Mercator)

    var lonLat = new OpenLayers.LonLat( 25.994252,64.807538 ).transform(epsg4326, projectTo);


    var zoom=5;
    fildmap.setCenter (lonLat, zoom);

    var vectorLayer = new OpenLayers.Layer.Vector("Overlay");



    // Define markers as "features" of the vector layer:
    var feature = new OpenLayers.Feature.Vector(
            new OpenLayers.Geometry.Point( 28.569944882811914, 65.14943304213554  ).transform(epsg4326, projectTo),
           {description:'html'} ,
            {externalGraphic:'https://maps.gstatic.com/mapfiles/ms2/micons/red-pushpin.png' , graphicHeight: 25, graphicWidth: 21, graphicXOffset:-12, graphicYOffset:-25  }
        );

    vectorLayer.addFeatures(feature);


/**
    var img_url = {
       base: "<?php echo base_url('assets/admin/dist/img/marker-icon.png'); ?>"
   };
   **/
    var feature = new OpenLayers.Feature.Vector(
            new OpenLayers.Geometry.Point( 24.938379, 60.169856 ).transform(epsg4326, projectTo),
            {description:'html'} ,
            {externalGraphic: 'https://maps.gstatic.com/mapfiles/ms2/micons/red-dot.png', graphicHeight: 25, graphicWidth: 21, graphicXOffset:-12, graphicYOffset:-25  }
        );

    vectorLayer.addFeatures(feature);

	 var feature = new OpenLayers.Feature.Vector(
            new OpenLayers.Geometry.Point( 24.938379, 61.169856 ).transform(epsg4326, projectTo),
            {description:'html'} ,
            {externalGraphic: 'https://maps.gstatic.com/mapfiles/ms2/micons/green-dot.png', graphicHeight: 25, graphicWidth: 21, graphicXOffset:-12, graphicYOffset:-25  }
        );
    vectorLayer.addFeatures(feature);

    var feature = new OpenLayers.Feature.Vector(
            new OpenLayers.Geometry.Point(  24.130481, 63.838491).transform(epsg4326, projectTo),
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

    fildmap.addLayer(vectorLayer);

    var feature = new OpenLayers.Feature.Vector(
            new OpenLayers.Geometry.Point( 24.930481, 63.838491).transform(epsg4326, projectTo),
            {description:'London Eye'} ,
            {externalGraphic: 'https://maps.gstatic.com/mapfiles/ms2/micons/red-dot.png', graphicHeight: 25, graphicWidth: 21, graphicXOffset:-12, graphicYOffset:-25  }
        );
    vectorLayer.addFeatures(feature);

    fildmap.addLayer(vectorLayer);

    //Add a popselector control to the vectorLayer with popup functions
    var toolcontrols = {
      popselector: new OpenLayers.Control.SelectFeature(vectorLayer, { onSelect: createPopup, onUnselect: destroyPopup })
    };

    function createPopup(feature) {
      feature.popup = new OpenLayers.Popup.FramedCloud("pop",
          feature.geometry.getBounds().getCenterLonLat(),
          null,
          '<div class="markerContent">'+feature.attributes.description+'</div>',
          null,
          true,
          function() { toolcontrols['popselector'].unselectAll(); }
      );
      //feature.popup.closeOnMove = true;
      fildmap.addPopup(feature.popup);
    }

    function destroyPopup(feature) {
      feature.popup.destroy();
      feature.popup = null;
    }

    fildmap.addControl(toolcontrols['popselector']);
    toolcontrols['popselector'].activate();
