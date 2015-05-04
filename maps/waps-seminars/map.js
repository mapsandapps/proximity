function stylize() {
  this.setStyle({
    color: '#f07300',
    opacity: 0.8
  });
};

var cascadeLayer = omnivore.gpx('cascadesprings-group.gpx')
.on('ready', function() {
  stylize.call(this);
  this.bindPopup('Cascade Springs Nature Preserve');
}).addTo(map);

var hamptonLayer = omnivore.gpx('hamptonbeecher.gpx')
.on('ready', function() {
  stylize.call(this);
  this.bindPopup('Hampton-Beecher Nature Preserve');
}).addTo(map);

var oacLayer = omnivore.gpx('oac.gpx')
.on('ready', function() {
  stylize.call(this);
  this.bindPopup('Outdoor Activity Center');
}).addTo(map);

streetMap = L.tileLayer('http://otile4.mqcdn.com/tiles/1.0.0/osm/{z}/{x}/{y}.png', {
  attribution: '<a href="http://proximityviz.com/">Proximity Viz</a> | Tiles &copy; <a href="http://www.mapquest.com/" target="_blank">MapQuest</a> <img src="http://developer.mapquest.com/content/osm/mq_logo.png" />',
  maxZoom: 18
}).addTo(map);

satelliteMap = L.tileLayer('http://otile1.mqcdn.com/tiles/1.0.0/sat/{z}/{x}/{y}.png', {
  attribution: '<a href="http://proximityviz.com/">Proximity Viz</a> | Tiles &copy; <a href="http://www.mapquest.com/" target="_blank">MapQuest</a> <img src="http://developer.mapquest.com/content/osm/mq_logo.png">'
});

var baseMaps = {
  "Street": streetMap,
  "Aerial": satelliteMap
};

var maps = {
  "Cascade Springs": cascadeLayer,
  "Hampton-Beecher": hamptonLayer,
  "Outdoor Activity Center": oacLayer
};

L.control.layers(baseMaps, maps, {
  collapsed: false
}).addTo(map);