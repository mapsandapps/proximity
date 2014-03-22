<!DOCTYPE html>
<meta charset="utf-8">
<html>
<head profile="http://www.w3.org/2005/10/profile">
  <title>Proximity</title>
  <link rel="icon" 
    type="image/png" 
    href="http://gtg339g.com/favicon.png">
    <link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.6.4/leaflet.css" />
    <link href="stylesheet.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Exo+2' rel='stylesheet' type='text/css'>
  <script src="http://cdn.leafletjs.com/leaflet-0.6.4/leaflet.js"></script>
  <script type="text/javascript" src="http://maps.stamen.com/js/tile.stamen.js?v1.1.3"></script>
  <script src="photos.js"></script> <!-- remove this later -->
  <style type="text/css">
  img#big-photo {
    max-width: 500px;
    border: 10px solid #f07300;
    padding: 10px;
    margin: 10px;
  }

  #map {
    float: left;
    height: 500px;
    width: 300px;
  }
  </style>
</head>
<body>
  <div id="nav">
    <?php include ("navigation.php"); ?>
  </div>
  <div class="content">
    <img src="photos/2014-02-13-brownwood.jpg" id="big-photo">
  <div id="map">

  </div>

  
  </div>
<script type="text/javascript">

  var photoIcon = L.icon({
    iconUrl: 'prox-mollie-marker.png',
    iconSize: [32, 46],
    shadowSize: [0, 0],
    iconAnchor: [16, 46],
    shadowAnchor: [0, 40],
    popupAnchor: [4, -46]
  });

  var photos = L.geoJson(photoList, {
    pointToLayer: function(feature, latlng) {
      return L.marker(latlng, {icon: photoIcon});
    }
  });
  

  // map:
  var map = L.map('map', {
    center: [33.7530, -84.3984],
    zoom: 11,
    maxZoom: 18,
    layers: [photos]
  });

  new L.StamenTileLayer("toner-lite").addTo(map);

</script>
</body>
</html>