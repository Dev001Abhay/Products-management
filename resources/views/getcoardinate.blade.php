
    @extends('layouts.app')
    @section('content')
   
 <input id="searchInput" class="controls" type="text" placeholder="Enter a location" style="height:50px;width:200px;">  
<body>
     
    <h3>Drag or re-shape for coordinates to display below</h3>
    <div id="map-canvas" style="width: auto;
    height: 350px;">
    </div>
   
</body>
<!-- Google map -->
<!-- <div id="map" style="height:500px;width: 800px;"></div> -->

<!-- Display geolocation data -->
<ul class="geo-data">
    <li>Full Address: <span id="location"></span></li>
    <li>Postal Code: <span id="postal_code"></span></li>
    <li>Country: <span id="country"></span></li>
    <li>Latitude: <span id="lat"></span></li>
    <li>Longitude: <span id="lon"></span></li>
    <!-- <li>Coordinates: <span id="coordinates"></span></li> -->
    <div id="info" style="position: absolute;
    font-family: arial, sans-serif;
    font-size: 18px;
    font-weight: bold;">
    </div>
    <textarea id="coordinates" rows="5"></textarea>
</ul>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script> 
<script src="https://maps.googleapis.com/maps/api/js?libraries=places,drawing&key=AIzaSyBYat2dy-0qFA_RiAyyFyY1XuYbCEMwfZQ&callback=initMap&v=weekly" async defer></script> 
<!-- <script async
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBYat2dy-0qFA_RiAyyFyY1XuYbCEMwfZQ&region=IN&language=en&callback=initMap">
</script> -->
<script type="text/javascript">
  
//  function initMap() {
//     var map = new google.maps.Map(document.getElementById('map-canvas'), {
//       center: {lat: -33.8688, lng: 151.2195},
//       zoom: 10
//     });
//     var input = document.getElementById('searchInput');
//     map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

//     var autocomplete = new google.maps.places.Autocomplete(input);
//     autocomplete.bindTo('bounds', map);

//     var infowindow = new google.maps.InfoWindow();
//     var marker = new google.maps.Marker({
//         map: map,
//         anchorPoint: new google.maps.Point(0, -29)
//     });

//     autocomplete.addListener('place_changed', function() {
//         infowindow.close();
//         marker.setVisible(false);
//         var place = autocomplete.getPlace();
//         if (!place.geometry) {
//             window.alert("Autocomplete's returned place contains no geometry");
//             return;
//         }
  
//         // If the place has a geometry, then present it on a map.
//         if (place.geometry.viewport) {
//             map.fitBounds(place.geometry.viewport);
//         } else {
//             map.setCenter(place.geometry.location);
//             map.setZoom(17);
//         }
//         marker.setIcon(({
//             url: place.icon,
//             size: new google.maps.Size(71, 71),
//             origin: new google.maps.Point(0, 0),
//             anchor: new google.maps.Point(17, 34),
//             scaledSize: new google.maps.Size(35, 35)
//         }));
//         marker.setPosition(place.geometry.location);
//         marker.setVisible(true);
    
//         var address = '';
//         if (place.address_components) {
//             address = [
//               (place.address_components[0] && place.address_components[0].short_name || ''),
//               (place.address_components[1] && place.address_components[1].short_name || ''),
//               (place.address_components[2] && place.address_components[2].short_name || '')
//             ].join(' ');
//         }
    
//         infowindow.setContent('<div><strong>' + place.name + '</strong><br>' + address);
//         infowindow.open(map, marker);
      
//         // Location details
//         for (var i = 0; i < place.address_components.length; i++) {
//             if(place.address_components[i].types[0] == 'postal_code'){
//                 document.getElementById('postal_code').innerHTML = place.address_components[i].long_name;
//             }
//             if(place.address_components[i].types[0] == 'country'){
//                 document.getElementById('country').innerHTML = place.address_components[i].long_name;
//             }
//         }
//         document.getElementById('location').innerHTML = place.formatted_address;
//         document.getElementById('lat').innerHTML = place.geometry.location.lat();
//         document.getElementById('lon').innerHTML = place.geometry.location.lng();
//         // initialize();
//     });

// }

// var bermudaTriangle;
// function initialize() {
//     var myLatLng = new google.maps.LatLng(33.5190755, -111.9253654);
//     var mapOptions = {
//         zoom: 12,
//         center: myLatLng,
//         mapTypeId: google.maps.MapTypeId.RoadMap
//     };

//     var map = new google.maps.Map(document.getElementById('map-canvas'),
//                                   mapOptions);
//     var triangleCoords = [
//         new google.maps.LatLng(33.5362475, -111.9267386),
//         new google.maps.LatLng(33.5104882, -111.9627875),
//         new google.maps.LatLng(33.5004686, -111.9027061)

//     ];

//     // Construct the polygon
//     bermudaTriangle = new google.maps.Polygon({
//         paths: triangleCoords,
//         draggable: true,
//         editable: true,
//         strokeColor: '#FF0000',
//         strokeOpacity: 0.8,
//         strokeWeight: 2,
//         fillColor: '#FF0000',
//         fillOpacity: 0.35
//     });

//     bermudaTriangle.setMap(map);
//     google.maps.event.addListener(bermudaTriangle, "dragend", getPolygonCoords);
//     google.maps.event.addListener(bermudaTriangle.getPath(), "insert_at", getPolygonCoords);
//     google.maps.event.addListener(bermudaTriangle.getPath(), "remove_at", getPolygonCoords);
//     google.maps.event.addListener(bermudaTriangle.getPath(), "set_at", getPolygonCoords);
// }

// function getPolygonCoords() {
//     var len = bermudaTriangle.getPath().getLength();
//     var htmlStr = "";
//     for (var i = 0; i < len; i++) {
//         htmlStr += bermudaTriangle.getPath().getAt(i).toUrlValue(5) + "<br>";
//     }
//     document.getElementById('info').innerHTML = htmlStr;
// }
// This example requires the Drawing library. Include the libraries=drawing
// parameter when you first load the API. For example:
// <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=drawing">
function initMap() {
  const map = new google.maps.Map(document.getElementById("map-canvas"), {
    center: { lat: -34.397, lng: 150.644 },
    zoom: 8,
  });
   var input = document.getElementById('searchInput');
    map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

    var autocomplete = new google.maps.places.Autocomplete(input);
    autocomplete.bindTo('bounds', map);

    var infowindow = new google.maps.InfoWindow();
    var marker = new google.maps.Marker({
        map: map,
        anchorPoint: new google.maps.Point(0, -29)
    });

    autocomplete.addListener('place_changed', function() {
        infowindow.close();
        marker.setVisible(false);
        var place = autocomplete.getPlace();
        if (!place.geometry) {
            window.alert("Autocomplete's returned place contains no geometry");
            return;
        }
  
        // If the place has a geometry, then present it on a map.
        if (place.geometry.viewport) {
            map.fitBounds(place.geometry.viewport);
        } else {
            map.setCenter(place.geometry.location);
            map.setZoom(17);
        }
        marker.setIcon(({
            url: place.icon,
            size: new google.maps.Size(71, 71),
            origin: new google.maps.Point(0, 0),
            anchor: new google.maps.Point(17, 34),
            scaledSize: new google.maps.Size(35, 35)
        }));
        marker.setPosition(place.geometry.location);
        marker.setVisible(true);
    
        var address = '';
        if (place.address_components) {
            address = [
              (place.address_components[0] && place.address_components[0].short_name || ''),
              (place.address_components[1] && place.address_components[1].short_name || ''),
              (place.address_components[2] && place.address_components[2].short_name || '')
            ].join(' ');
        }
    
        infowindow.setContent('<div><strong>' + place.name + '</strong><br>' + address);
        infowindow.open(map, marker);
      
        // Location details
        for (var i = 0; i < place.address_components.length; i++) {
            if(place.address_components[i].types[0] == 'postal_code'){
                document.getElementById('postal_code').innerHTML = place.address_components[i].long_name;
            }
            if(place.address_components[i].types[0] == 'country'){
                document.getElementById('country').innerHTML = place.address_components[i].long_name;
            }
        }
        document.getElementById('location').innerHTML = place.formatted_address;
        document.getElementById('lat').innerHTML = place.geometry.location.lat();
        document.getElementById('lon').innerHTML = place.geometry.location.lng();
        // initialize();
    });
  const drawingManager = new google.maps.drawing.DrawingManager({
    drawingMode: google.maps.drawing.OverlayType.MARKER,
    drawingControl: true,
    drawingControlOptions: {
      position: google.maps.ControlPosition.TOP_CENTER,
      drawingModes: [
        google.maps.drawing.OverlayType.MARKER,
        google.maps.drawing.OverlayType.CIRCLE,
        google.maps.drawing.OverlayType.POLYGON,
        google.maps.drawing.OverlayType.POLYLINE,
        google.maps.drawing.OverlayType.RECTANGLE,
      ],
    },
    markerOptions: {
      icon: "https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png",
    },
    circleOptions: {
      fillColor: "#ffff00",
      fillOpacity: 1,
      strokeWeight: 5,
      clickable: false,
      editable: true,
      zIndex: 1,
    },
  });

  drawingManager.setMap(map);
 
  google.maps.event.addListener(drawingManager, 'polygoncomplete', function (polygon) {
    var coordinates = (polygon.getPath());
   
let getall = [];
for (let i = 0; i < coordinates.getLength(); i++) 
 {
   const xy = coordinates.getAt(i);
   var contentString = console.log(JSON.stringify({point: xy +[i+1]}));
    getall.push(xy);
    
 }
 $('#coordinates').text(getall); 
});
}

window.initMap = initMap;


</script>
</script>

    @endsection
  <!-- </body>
</html> -->