<!DOCTYPE html>
<meta charset="utf-8">
<html>
<head profile="http://www.w3.org/2005/10/profile">
  <title>Proximity</title>
  <link rel="icon" 
    type="image/png" 
    href="http://mollietaylor.com/favicon.png">
  <link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.6.4/leaflet.css" />
  <link rel="stylesheet" href="http://mollietaylor.com/files/MarkerCluster.css" />
  <link rel="stylesheet" href="http://mollietaylor.com/files/MarkerCluster.Default.css" />
  <link href="stylesheet.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Exo+2' rel='stylesheet' type='text/css'>
  <!--[if lte IE 8]>
      <link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.6.4/leaflet.ie.css" />
  <![endif]-->
  <script src="http://cdn.leafletjs.com/leaflet-0.6.4/leaflet.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.js"></script>
  <script src="http://mollietaylor.com/files/leaflet.markercluster-src.js"></script>
  <script src="photos-dc.js"></script>

  <style type="text/css">
  body {
    background-color: #eee;
  }

  #map {
    float: left;
    height: 500px;
    width: 100%;
  }

  #photo {
    text-align: left;
  }

  img {
    max-width: 150px;
    padding-left:5px;
  }
  </style>
</head>
<body>
  <div id="nav">
    <?php include ("navigation.php"); ?>
  </div>


  <div class="content">

<h1></h1>
<div id="map"></div><div id="text">The circle represents the area within a 2-mile radius of the White House.</div>

  </div>

<script type="text/javascript">

  var ring = {
    color: '#00c0f0',
    fillOpacity: 0,
    opacity: 0.8
  };

  var radius = 1609 * 2;

  var photoIcon = L.icon({
    iconUrl: 'prox-mollie-marker.png',
    iconSize: [32, 46],
    shadowSize: [0, 0],
    iconAnchor: [16, 46],
    shadowAnchor: [0, 40],
    popupAnchor: [4, -46]
  });

  function onPhoto(feature, layer) {
    layer.bindPopup("<a href='photos/" + feature.properties.url + "'><img src='photos/" + feature.properties.url + "' width='100px'></a>", {
        minWidth: 100
    });
  };

  // map:
  var map = L.map('map', {
    center: [38.8977, -77.0365],
    zoom: 13,
    maxZoom: 18
  });

  var photos = L.geoJson(photoList, {
    onEachFeature: onPhoto,
    pointToLayer: function(feature, latlng) {
      return L.marker(latlng, {icon: photoIcon});
    }
  });

  var markers = L.markerClusterGroup({
    polygonOptions: {opacity: 0,
      fillOpacity: 0}
  });

  markers.addLayer(photos);      // add it to the map
  map.addLayer(markers);

  L.tileLayer('http://tile.cloudmade.com/d2268fb4d6a84b33b508fa5640063baf/29889/256/{z}/{x}/{y}.png', {
    attribution: '<a href="http://thigpendesigns.com">Icon by Thigpen Designs</a> | Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="http://cloudmade.com">CloudMade</a>',
    maxZoom: 18
  }).addTo(map);

  L.circle([38.8977, -77.0365],
    radius).setStyle(ring).addTo(map);

</script>

</body>
</html>