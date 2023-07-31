 @extends('layouts.header')

<body>
    <div class="container-fluid position-relative d-flex p-0" id="main-body" style="display:none;">
    
        <!-- Sidebar Start -->
        @extends('layouts.sidebare')
        <!-- Sidebar End -->


        <!-- Content Start -->
 <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-secondary navbar-dark sticky-top px-4 py-0">
                <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-user-edit"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                <form class="d-none d-md-flex ms-4">
                    <input class="form-control bg-dark border-0" type="search" placeholder="Search">
                </form>
                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fa fa-envelope me-lg-2"></i>
                            <span class="d-none d-lg-inline-flex">Message</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item text-center">See all message</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">

                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fa fa-bell me-lg-2"></i>
                              @if(Auth::guard('admin')->check())
                                @php 
                                $admin = Auth::guard('admin')->user();
                                @endphp
                         <notifications :userid="{{ $admin->id }}" :unreads="{{ $admin->unreadNotifications }}"></notifications>       

                        @endif
                            <span class="d-none d-lg-inline-flex">Notificatin</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">Profile updated</h6>
                                <small>15 minutes ago</small>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">New user added</h6>
                                <small>15 minutes ago</small>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">Password changed</h6>
                                <small>15 minutes ago</small>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item text-center">See all notifications</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img class="rounded-circle me-lg-2" src="{{asset('images/user.jpg')}}" alt="" style="width: 40px; height: 40px;">
                            <span class="d-none d-lg-inline-flex"> @if(Auth::guard('admin')->check()) {{ Auth::guard('admin')->user()->name }} @else {{ Auth::guard('web')->user()->name }} @endif</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">My Profile</a>
                            <a href="#" class="dropdown-item">Settings</a>
                             @if(Auth::guard('admin')->check())
                                        <a href="{{ route('admin.logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form-admin').submit();" class="dropdown-item">
                                            Admin Logout
                                        </a>

                                        <form id="logout-form-admin" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    @endif
                            <!-- <a href="#" class="dropdown-item">Log Out</a> -->
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->

                 <div class="row g-4 p-5">
                    <div class="col-sm-12 col-xl-12">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">Add Services</h6>
                             <form class="user" action="{{route('admin.store.service')}}" method="post">
                                 {{ csrf_field() }} 
                                  @if($errors->any())
                    {!! implode('', $errors->all('<div>:message</div>')) !!}
                @endif 
                            <div class="row">
                                <div class="col-sm-4">

                                    <label for="exampleInputEmail1" class="form-label">Name</label>
                                    <input type="text" class="form-control" name="search"placeholder="Enter Location" id="searchInput">
                                    <input type="hidden" class="form-control" name="latitude" id="lat">
                                    <input type="hidden" class="form-control" name="zone" id="zone">
                                    <input type="hidden" class="form-control" name="longitude"id="lon">
                                    <label for="exampleInputPassword1" class="form-label">Description</label>
                                     <textarea class="form-control" placeholder="Leave a comment here" name="services" style="height: 150px;" id="coordinates"></textarea>
                                </div>
                                <div class="col-sm-8">
                                    <label for="exampleInputPassword1" class="form-label">Map</label>
                                     <div id="map-canvas" style="width: Auto;height: 400px;">
                                     </div>
                                </div>
                               
                            </div>
                           <ul class="geo-data">
                            <li>Full Address: <span id="location"></span></li>
                            <li>Postal Code: <span id="postal_code"></span></li>
                            <li>Country: <span id="country"></span></li>
                           <li>city: <span id="city"></span></li>
                            <li>Latitude: <span id="lat"></span></li>
                            <li>Longitude: <span id="lon"></span></li>
                            </ul>

                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div> 

                </div>   
    </div>
 </div>
  <!-- @extends('layouts.footer') -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?libraries=places,drawing&key=AIzaSyBYat2dy-0qFA_RiAyyFyY1XuYbCEMwfZQ&callback=initMap&v=weekly" async defer></script> 
    <script type="text/javascript">
    window.onload= function(){    
    $("#spinner").css('visibility', 'hidden');

    setTimeout(function() {
    $('#main-body').css('display', 'block');
        }, 200);
    
    }
function initMap() {
  const map = new google.maps.Map(document.getElementById("map-canvas"), {
    center: { lat: -34.397, lng: 150.644 },
    zoom: 8,
  });
   var input = document.getElementById('searchInput');
    // map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

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
        document.getElementById('zone').value = place.name;
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
        document.getElementById('lat').value = place.geometry.location.lat();
        document.getElementById('lon').value = place.geometry.location.lng();
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