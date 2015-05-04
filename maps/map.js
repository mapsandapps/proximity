var map = L.map('map', {
  center: [33.7530, -84.3984],
  zoom: 11,
  maxZoom: 18
});

var fultonLayer = new L.Shapefile("data/tl_2013_13121_linearwater.zip").addTo(map);

var deKalbLayer = new L.Shapefile("data/tl_2013_13089_linearwater.zip").addTo(map);

var cobbLayer = new L.Shapefile("data/tl_2013_13067_linearwater.zip").addTo(map);

var claytonLayer = new L.Shapefile("data/tl_2013_13063_linearwater.zip").addTo(map);

// var wikiLayer = L.geoJson(wiki).addTo(map);

// L.tileLayer("http://{s}.tiles.mapbox.com/v3/mollie.homn0pjf/{z}/{x}/{y}.png", {
//   attribution: "<a href=\"http://thigpendesigns.com\">Icon by Thigpen Designs</a> | Base map <a href=\"https://www.mapbox.com/about/maps/\">© Mapbox © OpenStreetMap</a>",
//   maxZoom: 18
// }).addTo(map);
