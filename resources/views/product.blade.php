
    @extends('layouts.app')
    @section('content')
   
    <div class="container mt-5">
      <div class="row">
        <div class="col-md-3">
          <div class="card">
            <div class="image-container">
              <div class="first">
                <div class="d-flex justify-content-between align-items-center">
                  <span class="discount">-25%</span>
                  <span class="wishlist">
                    <i class="fa fa-heart-o"></i>
                  </span>
                </div>
              </div>
              <img src="{{ asset('images/product2.jpg') }}" class="img-fluid rounded thumbnail-image">
            </div>
            <div class="product-detail-container p-2">
              <div class="d-flex justify-content-between align-items-center">
                <h5 class="dress-name">White traditional long dress</h5>
                <div class="d-flex flex-column mb-2">
                  <span class="new-price">{{$data->symbol}} {{number_format(3.99 * $data->exchange_rate, 2)}}</span>
                  <small class="old-price text-right">{{$data->symbol}} {{number_format(5.99 * $data->exchange_rate, 2)}}</small>
                </div>
              </div>
              <div class="d-flex justify-content-between align-items-center pt-1">
                <div class="color-select d-flex ">
                  <input type="hidden" id="lat" value="{{$data->lat}}">
                  <input type="hidden" id="long" value="{{$data->longitude}}">
                  <input type="button" name="grey" class="btn creme">
                  <input type="button" name="red" class="btn red ml-2">
                  <input type="button" name="blue" class="btn blue ml-2">
                </div>
                <div class="d-flex ">
                  <span class="item-size mr-2 btn" type="button">S</span>
                  <span class="item-size mr-2 btn" type="button">M</span>
                  <span class="item-size btn" type="button">L</span>
                </div>
              </div>
              <div class="d-flex justify-content-between align-items-center pt-1">
                <div>
                  <i class="fa fa-star-o rating-star"></i>
                  <span class="rating-number">4.8</span>
                </div>
                <span class="buy">BUY +</span>
              </div>
            </div>
          </div>
          <div class="mt-3">
            <div class="card voutchers">
              <div class="voutcher-divider">
                <div class="voutcher-left text-center">
                  <span class="voutcher-name">Monday Happy</span>
                  <h5 class="voutcher-code">#MONHPY</h5>
                </div>
                <div class="voutcher-right text-center border-left">
                  <h5 class="discount-percent">20%</h5>
                  <span class="off">Off</span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card">
            <div class="image-container">
              <div class="first">
                <div class="d-flex justify-content-between align-items-center">
                  <span class="discount">-25%</span>
                  <span class="wishlist">
                    <i class="fa fa-heart-o"></i>
                  </span>
                </div>
              </div>
              <img src="{{ asset('images/product2.jpg') }}" class="img-fluid rounded thumbnail-image">
            </div>
            <div class="product-detail-container p-2">
              <div class="d-flex justify-content-between align-items-center">
                <h5 class="dress-name">Long sleeve denim jacket</h5>
                <div class="d-flex flex-column mb-2">
                 <span class="new-price">{{$data->symbol}} {{number_format(4.99 * $data->exchange_rate, 2)}}</span>
                  <small class="old-price text-right">{{$data->symbol}} {{number_format(6.99 * $data->exchange_rate, 2)}}</small>
                </div>
              </div>
              <div class="d-flex justify-content-between align-items-center pt-1">
                <div class="color-select d-flex ">
                  <input type="button" name="grey" class="btn creme">
                  <input type="button" name="darkblue" class="btn darkblue ml-2">
                </div>
                <div class="d-flex ">
                  <span class="item-size mr-2 btn" type="button">S</span>
                  <span class="item-size mr-2 btn" type="button">M</span>
                  <span class="item-size btn" type="button">L</span>
                </div>
              </div>
              <div class="d-flex justify-content-between align-items-center pt-1">
                <div>
                  <i class="fa fa-star-o rating-star"></i>
                  <span class="rating-number">4.8</span>
                </div>
                <span class="buy">BUY +</span>
              </div>
            </div>
          </div>
          <div class="mt-3">
            <div class="card voutchers">
              <div class="voutcher-divider">
                <div class="voutcher-left text-center">
                  <span class="voutcher-name">Payday Surprise</span>
                  <h5 class="voutcher-code">#SRPSPYDY</h5>
                </div>
                <div class="voutcher-right text-center border-left">
                  <h5 class="discount-percent">20%</h5>
                  <span class="off">Off</span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card">
            <div class="image-container">
              <div class="first">
                <div class="d-flex justify-content-between align-items-center">
                  <span class="discount">-25%</span>
                  <span class="wishlist">
                    <i class="fa fa-heart-o"></i>
                  </span>
                </div>
              </div>
              <img src="{{ asset('images/product3.jpg') }}" class="img-fluid rounded thumbnail-image">
            </div>
            <div class="product-detail-container p-2">
              <div class="d-flex justify-content-between ">
                <h5 class="dress-name">Hush Puppies</h5>
                <div class="d-flex flex-column mb-2">
                 <span class="new-price">{{$data->symbol}} {{number_format(2.99 * $data->exchange_rate, 2)}}</span>
                  <small class="old-price text-right">{{$data->symbol}} {{number_format(4.99 * $data->exchange_rate, 2)}}</small>
                </div>
              </div>
              <div class="d-flex justify-content-between align-items-center pt-1">
                <div class="color-select d-flex ">
                  <input type="button" name="grey" class="btn creme">
                  <input type="button" name="yellow" class="btn yellow ml-2">
                  <input type="button" name="blue" class="btn blue ml-2">
                </div>
                <div class="d-flex ">
                  <span class="item-size mr-2 btn" type="button">S</span>
                  <span class="item-size mr-2 btn" type="button">M</span>
                  <span class="item-size btn" type="button">L</span>
                </div>
              </div>
              <div class="d-flex justify-content-between align-items-center pt-1">
                <div>
                  <i class="fa fa-star-o rating-star"></i>
                  <span class="rating-number">4.2</span>
                </div>
                <span class="buy">BUY +</span>
              </div>
            </div>
          </div>
          <div class="mt-3">
            <div class="card voutchers">
              <div class="voutcher-divider">
                <div class="voutcher-left text-center">
                  <span class="voutcher-name">First order</span>
                  <h5 class="voutcher-code">#HPYFRST</h5>
                </div>
                <div class="voutcher-right text-center border-left">
                  <h5 class="discount-percent">20%</h5>
                  <span class="off">Off</span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card">
            <div class="image-container">
              <div class="first">
                <div class="d-flex justify-content-between align-items-center">
                  <span class="discount">-25%</span>
                  <span class="wishlist">
                    <i class="fa fa-heart-o"></i>
                  </span>
                </div>
              </div>
              <img src="{{ asset('images/product2.jpg') }}" class="img-fluid rounded thumbnail-image">
            </div>
            <div class="product-detail-container p-2">
              <div class="d-flex justify-content-between ">
                <h5 class="dress-name">Athens skirt </h5>
                <div class="d-flex flex-column mb-2">
                 <span class="new-price">{{$data->symbol}} {{number_format(6.99 * $data->exchange_rate, 2)}}</span>
                  <small class="old-price text-right">{{$data->symbol}} {{number_format(9.99 * $data->exchange_rate, 2)}}</small>
                </div>
              </div>
              <div class="d-flex justify-content-between align-items-center pt-1">
                <div class="color-select d-flex ">
                  <input type="button" name="grey" class="btn creme">
                  <input type="button" name="red" class="btn red ml-2">
                  <input type="button" name="blue" class="btn blue ml-2">
                </div>
                <div class="d-flex ">
                  <span class="item-size mr-2 btn" type="button">S</span>
                  <span class="item-size mr-2 btn" type="button">M</span>
                  <span class="item-size btn" type="button">L</span>
                </div>
              </div>
              <div class="d-flex justify-content-between align-items-center pt-1">
                <div>
                  <i class="fa fa-star-o rating-star"></i>
                  <span class="rating-number">3.8</span>
                </div>
                <span class="buy">BUY +</span>
              </div>
            </div>
          </div>
          <div class="mt-3">
            <div class="card voutchers">
              <div class="voutcher-divider">
                <div class="voutcher-left text-center">
                  <span class="voutcher-name">Vegetarian Food</span>
                  <h5 class="voutcher-code">#VEGANLOVE</h5>
                </div>
                <div class="voutcher-right text-center border-left">
                  <h5 class="discount-percent">20%</h5>
                  <span class="off">Off</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="container">
  <div class="card-header">
    Quote
  </div>
  <div class="card-body border border-primary">
    <blockquote class="blockquote mb-0">
      <div id="map" style="height: 500px;"></div>
      <footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer>
    </blockquote>
  </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script async
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBYat2dy-0qFA_RiAyyFyY1XuYbCEMwfZQ&region=IN&language=en&callback=initMap">
</script>
<script type="text/javascript">
   
  // $(function () {
   function initMap() {
  const latitude = $("#lat").val();
  const longitude = $("#long").val();
 
  const cairo = { lat: +latitude, lng: +longitude };
  const map = new google.maps.Map(document.getElementById("map"), {
    scaleControl: true,
    center: cairo,
    zoom: 10,
  });
  const infowindow = new google.maps.InfoWindow();

  infowindow.setContent("<b>القاهرة</b>");

  const marker = new google.maps.Marker({ map, position: cairo });

  marker.addListener("click", () => {
    infowindow.open(map, marker);
  });
}

window.initMap = initMap;
  // });
</script>

    @endsection
  <!-- </body>
</html> -->