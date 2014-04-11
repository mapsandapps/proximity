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
  <link type="text/css" rel="stylesheet" href="waps-submission.css" />
</head>
<body>
  <div class="content">
  <h1>
    1.  A brief statement of why you’re interested in the WAPS.
  </h1>
  <p class="about-par">Off-and-on for years, I've been working on a project documenting all the parks with trails that are inside Atlanta's perimeter. The theme of this project is "the undiscovered country of the nearby." <sup><a href="#fn1" id="r1">[1]</a></sup> I think this project is closely aligned with the purpose of the Wilderness Act Performance Series.</p>

      <div class="about-par"><p id="fn1"><a href="#r1">[1]</a> Robert MacFarlane</div>

  <h1 class="list">
    2. An online link to samples of your art work or music.</h1>

    <p class="about-par">Depending on how much space I'll have, I can either create an image like this, with the circle centered on the venue and with all the included photos having been taken inside the circle:</p>

    <img src="proximity-doo.jpg">

    <p class="about-par">Or I can show many individually-framed photos, each with a small map showing its location:</p>

    <img src="photos/2014-01-05_1388953005.jpg" id="big-photo">
    <div class="maps">
      <div id="map"></div>
      <div id="insetMap"></div>
    </div>

  <h1 class="list">
    3. A bio and resume w/ contact info.
  </h1>

  <h2>Bio</h2>
  <p class="about-par"><?php include ("bio.php"); ?></p>

  <h2>Shows</h2>
  <p class="about-par">Participant in 10 photography shows</p>

  <h2>Publications</h2>
  <p class="about-par">15 published photos (3 student literary magazines, 11 newspaper, 1 miscellaneous)</p>

  <h2>Press Mentions</h2>
    <p class="about-par"><a href="http://nique.net/entertainment/2014/03/06/art-crawl-demonstrates-creative-side-of-tech/" target="_blank">"Art Crawl demonstrates creative side of Tech"</a><br>
    Jamie Rule, <i>Technique</i>, March 6, 2014<br><br>

    <a href="https://smartech.gatech.edu/bitstream/handle/1853/14396/2007-04-20_focus-2007-04-20.pdf?sequence=3">"Moments 2007 provides art break"</a><br>
    Siwan Liu, <i>Technique</i>, April 20, 2007</p>

  <h2>Contact Info</h2>
    <p class="about-par">Mollie Taylor<br><a href="mailto:mollie.taylor@gmail.com">mollie.taylor@gmail.com</a><br>404-202-2830</p>

  </div>
<script type="text/javascript">

  var coords = [33.756295,-84.356892];

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

  L.tileLayer('http://{s}.tiles.mapbox.com/v3/mollie.homn0pjf/{z}/{x}/{y}.png', {
    attribution: '<a href="http://thigpendesigns.com">Icon by Thigpen Designs</a> | Base map <a href="https://www.mapbox.com/about/maps/">© Mapbox © OpenStreetMap</a>',
    maxZoom: 18
  }).addTo(map);

  // new L.StamenTileLayer("toner-lite").addTo(map);

  L.marker(coords, {
    icon: photoIcon
  }).addTo(map);


  // inset map:
  var insetMap = L.map('insetMap', {
    center: coords,
    zoom: 13,
    maxZoom: 18,
    attributionControl: false,
    zoomControl: false
  });

  L.tileLayer('http://{s}.tiles.mapbox.com/v3/mollie.homn0pjf/{z}/{x}/{y}.png', {
    attribution: '<a href="http://thigpendesigns.com">Icon by Thigpen Designs</a> | Base map <a href="https://www.mapbox.com/about/maps/">© Mapbox © OpenStreetMap</a>',
    maxZoom: 18
  }).addTo(insetMap);

  L.marker(coords, {
    icon: photoIcon
  }).addTo(insetMap);

</script>
</body>
</html>