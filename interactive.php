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
  <script src="http://mollietaylor.com/files/leaflet.markercluster-src.js"></script>
  <script src="photos.js"></script>

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
<div id="map"></div><div id="photo"></div>

  </div>

<script type="text/javascript">

  var ring = {
    color: '#00c0f0',
    fillOpacity: 0,
    opacity: 0.8
  };

  var radius = 1609 * 3;

  var clough = L.circle([33.774646,-84.396401], 
    radius).setStyle(ring);

  // var goatFarm = L.circle([33.784819,-84.416006],
  //   radius).setStyle(ring);

  var elliottSt = L.circle([33.7530,-84.3984],
    radius).setStyle(ring);

  var doo = L.circle([33.7488,-84.3573],
    radius).setStyle(ring);

  var none = L.circle([33.7488, -84.357], 0).setStyle({
    fillOpacity: 0,
    opacity: 0
  });

  var photoIcon = L.icon({
    iconUrl: 'prox-mollie-marker.png',
    iconSize: [32, 46],
    shadowSize: [0, 0],
    iconAnchor: [16, 46],
    shadowAnchor: [0, 40],
    popupAnchor: [4, -46]
  });

  function showPhotos(pix){
    $('#photo').html("");
    // for (var i = 0; i < 8; i++) { // show 8 photos
    for (var i = 0; i < pix.length; i++) { // show all photos
      $('#photo').append("<img src='photos/" + pix[i].feature.properties.url + "'>");
    };
  }

  function onPhoto(feature, layer) {
    layer.bindPopup("<img src='photos/" + feature.properties.url + "' width='100px'>", {
        minWidth: 100
    });
  };

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

  // map:
  var map = L.map('map', {
    center: [33.7530, -84.3984],
    zoom: 11,
    maxZoom: 18,
    layers: [markers]
  });

  markers.addLayer(photos);      // add it to the map
  map.addLayer(markers);

  var galleryMaps = {
    "Elliott Street": elliottSt,
    "Clough": clough,
    "dooGallery": doo,
    "[none]": none
  };

  L.tileLayer('http://{s}.tiles.mapbox.com/v3/mollie.homn0pjf/{z}/{x}/{y}.png', {
    attribution: '<a href="http://thigpendesigns.com">Icon by Thigpen Designs</a> | Base map <a href="https://www.mapbox.com/about/maps/">© Mapbox © OpenStreetMap</a>',
    maxZoom: 18
  }).addTo(map);

  L.control.layers(galleryMaps, null, {
    collapsed: false
  }).addTo(map);

  function photoDist(centerPoint, obj) {
    var proxList = [];
    for (var i in obj) {
      var photoCoords = new L.LatLng(obj[i].feature.geometry.coordinates[1], obj[i].feature.geometry.coordinates[0]);
      if (centerPoint.distanceTo(photoCoords) < radius) {
        proxList.push(obj[i]);
      }
    }
    return proxList;
  }

  function shuffle(o) {
    for (var j, x, i = o.length; i; j = Math.floor(Math.random() * i), x = o[--i], o[i] = o[j], o[j] = x); 
      return o;
  };

  function reCenter(place, lat, lng) {
    // re-center and zoom:
    $("#map").width(400);
    map.invalidateSize();
    map.fitBounds(place);
    // calculate distance b/w center point and photos:
    showPhotos(shuffle(photoDist(new L.latLng(lat,lng), photos._layers)));
  }

  // recenter map on gallery layer change:
  map.on('baselayerchange', function(e) {
    if (e.name == "Clough") {
      reCenter(clough, 33.774646, -84.396401);
    } else if (e.name == "Elliott Street") {
      reCenter(elliottSt, 33.7530, -84.3984);
    } else if (e.name == "Piedmont Park") {
      reCenter(piedmont, 33.784, -84.378664);
    } else if (e.name == "dooGallery") {
      reCenter(doo, 33.7488, -84.3573);
    } else {
      $('#photo').html("");
      $("#map").width("100%");
      map.invalidateSize();
    };
  });

</script>

</body>
</html>