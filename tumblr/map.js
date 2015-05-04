var none = L.circle([90,0], 0).setStyle({
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

function onPhoto(feature, layer) {
  layer.bindPopup("<a href='http://proximity2nature.tumblr.com/tagged/" + feature.properties.tag + "' target='_blank'><h2>" + feature.properties.name + "</h2>Click to view photos and other content on tumblr.</a>", {
      minWidth: 100
  });
};

var photos = L.geoJson(parksList, {
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
  "Atlanta": L.circle([90,0], 0),
  "Portland, OR<br>Coming Soon:": L.circle([90,0], 0),
  "Auburn, AL": L.circle([90,0], 0),
  "Birmingham, AL": L.circle([90,0], 0),
  "Copenhagen": L.circle([90,0], 0),
  "San Francisco": L.circle([90,0], 0),
  "Washington, DC": L.circle([90,0], 0)
};

L.mapbox.accessToken = 'pk.eyJ1IjoibW9sbGllIiwiYSI6ImpleDRPUEkifQ.xL4U9y6A_pVsL_22ggpIkQ';
var mapboxTiles = L.tileLayer('https://{s}.tiles.mapbox.com/v4/mollie.lpb871p4/{z}/{x}/{y}.png?access_token=' + L.mapbox.accessToken, {
    attribution: '<a href="http://www.mapbox.com/about/maps/" target="_blank">Terms &amp; Feedback</a>'
}).addTo(map);

L.control.layers(galleryMaps, null, {
  collapsed: false
}).addTo(map);

// recenter map on gallery layer change:
map.on('baselayerchange', function(e) {
  if (e.name == "Atlanta") {
    map.setView(new L.LatLng(33.753, -84.390), 11);
  } else if (e.name == "Portland, OR<br>Coming Soon:") {
    map.setView(new L.LatLng(45.5149853,-122.6794443), 11);
  } else if (e.name == "Auburn, AL") {
    map.setView(new L.LatLng(32.604694,-85.4828), 11);
  } else if (e.name == "Birmingham, AL") {
    map.setView(new L.LatLng(33.52066, -86.80251), 11);
  } else if (e.name == "Copenhagen") {
    map.setView(new L.LatLng(55.6829853,12.579727), 11);
  } else if (e.name == "San Francisco") {
    map.setView(new L.LatLng(37.7798524,-122.41677), 11);
  } else if (e.name == "Washington, DC") {
    map.setView(new L.LatLng(38.8977, -77.0365), 11);
  };
});
