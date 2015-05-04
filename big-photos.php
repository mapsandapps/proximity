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
    float: left;
    max-width: 500px;
    border: 10px solid #f07300;
    padding: 10px;
    margin: 10px;
  }

  img#urban-photo {
    float: left;
    max-width: 200px;
    border: 10px solid #00c0f0;
    padding: 10px;
    margin: 10px;
  }

  .maps {
    float: left;
    width: 260px;
  }

  #map {
    border: 2px solid #000;
    width: 250px;
    height: 280px;
    margin-top, margin-bottom: 10px;
  }

  #insetMap {
    border: 2px solid #000;
    border-top: 0px;
    width: 250px;
    height: 220px;
  }

  a:visited,a:hover,a:active {
    color: #0083a3;
  }

  .urban-icon {
    background-image: url('prox-mollie-marker.png');
    width: auto;
    height: auto;
    line-height: 46px;
    position: relative;
    top: -23px;
    -webkit-filter: hue-rotate(180deg);
  }
  </style>
</head>
<body>
  <?php include_once("analytics.php") ?>
  <div id="nav">
    <?php include ("navigation.php"); ?>
  </div>
  <div class="content">
    <img src="photos/2014-02-13-brownwood.jpg" id="big-photo">
    <div class="maps">
      <div id="map"></div>
      <div id="insetMap"></div>
    </div>
    <img src="photos/capitol.jpg" id="urban-photo">
  </div>
<script type="text/javascript">

  var coords = [33.7, -84.42];

  var photoIcon = L.icon({
    iconUrl: 'prox-mollie-marker.png',
    iconSize: [32, 46],
    shadowSize: [0, 0],
    iconAnchor: [16, 46],
    shadowAnchor: [0, 40],
    popupAnchor: [4, -46]
  });
  
  // map:
  var map = L.map('map', {
    center: [33.77, -84.37],
    zoom: 10,
    maxZoom: 18,
    attributionControl: false,
    zoomControl: false
  });

  new L.StamenTileLayer("toner-lite").addTo(map);


  L.marker(coords, {
    icon: photoIcon
  }).addTo(map);

  L.marker([33.77, -84.37], {
    icon: L.divIcon({
      className: 'urban-icon',
      iconSize: [32, 46]
    })
  }).addTo(map);


  // inset map:
  var insetMap = L.map('insetMap', {
    center: coords,
    zoom: 13,
    maxZoom: 18,
    zoomControl: false
  });

  new L.StamenTileLayer("toner-lite").addTo(insetMap);

  L.marker(coords, {
    icon: photoIcon
  }).addTo(insetMap);

</script>
</body>
</html>