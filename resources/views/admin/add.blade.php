 @extends('layouts.header')

<body id="main-body" class="main-body" style="display:none;">
    <div class="container-fluid position-relative d-flex p-0">
    
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
                            <h6 class="mb-4">Basic Form</h6>
                             <form class="user" action="{{route('admin.add.product')}}" method="post" enctype="multipart/form-data">
                                 {{ csrf_field() }} 
                                  @if($errors->any())
                                    {!! implode('', $errors->all('<div>:message</div>')) !!}
                                  @endif 
                            <div class="row">
                                <div class="col-sm-6">

                                    <label for="exampleInputEmail1" class="form-label">Name</label>
                                    <input type="text" class="form-control" name="name"
                                        aria-describedby="emailHelp">
                                         @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                        @endif
                                   
                                </div>
                                <div class="col-sm-6">
                                    <label for="exampleInputPassword1" class="form-label">Image</label>
                                    <input type="file" class="form-control" name="image">
                                </div>
                               
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <label for="exampleInputEmail1" class="form-label">Max Price</label>
                                    <input type="number" class="form-control" name="max_price"
                                        aria-describedby="emailHelp">
                                   
                                </div>
                                <div class="col-sm-6">
                                    <label for="exampleInputPassword1" class="form-label">Sale Price</label>
                                    <input type="number" class="form-control" name="price">
                                </div>
                                
                            </div>
                             <div class="row">
                               
                                <div class="col-sm-6">
                                    <label for="exampleInputPassword1" class="form-label">Description</label>
                                     <textarea class="form-control" placeholder="Leave a comment here" name="description"></textarea>
                                </div>
                                 <div class="col-sm-6">
                                    
                                    <label for="exampleInputPassword1" class="form-label">Zone</label></br>
                                     <select class="form-select select2" name="zone_id">
                                      @foreach(App\Service::get() as $value)   
                                       <option value="{{$value->id}}">{{$value->zone}}</option> 
                                      @endforeach
                                    </select>
                                
                                </div>
                                 
                                
                            </div>

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
   
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

<script>
    $('.select2').select2();
    window.onload= function(){
    $("#spinner").css('visibility', 'hidden');

    setTimeout(function() {
    $('#main-body').css('display', 'block');
        }, 200);
    }
</script>                    