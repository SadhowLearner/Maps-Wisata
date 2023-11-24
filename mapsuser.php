<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Maps Wisata</title>

    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
      crossorigin="anonymous"
    ></script>

    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

    <script src="https://unpkg.com/leaflet-tilelayer-colorfilter"></script>

    <style>
      #map {
        height: 100vh;
      }
      .sidebar {
        width: 10vh;
      }
      .menu-icon {
        height: 46px;
        width: 35px;
      }
      .offcanvasbr {
        border-radius: 0 30px 30px 0;
      }

      .btn-set:hover{
        background: #2FA4FF;
        color: white;
        border-radius: 30px 30px;

      }

      .icon:hover {
        fill: white;
      }
      .lato {
            font-family: 'Lato', sans-serif;
        }

      .lateef {

            font-family: 'Lateef', serif;
        }
    </style>
  </head>
  <body>
    <div class="d-flex">
      <div class="sidebar d-flex bg-light">
        <nav class="navbar  navbar-light vh-100 bg-light flex-column">
          <button
            class="mx-auto menu-icon navbar-toggler-icon border-0"
            href="#"
            type="button"
            data-bs-toggle="offcanvas"
            data-bs-target="#offcanvasScrolling"
            aria-controls="offcanvasScrolling"
          >
          </button>
          <ul class="navbar-nav align-items-center mx-auto">
            <li class="nav-item">
              <a class="nav-link" href="#">
                <img
                  src="img/search.svg"
                  alt="search"
                  height="25px"
                  width="35px"
                />
              </a>
            </li>
            <li class="nav-item my-3">
              <a class="nav-link" href="#">
                <img src="img/maps.svg" alt="" width="35px" height="24px" />
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link">
                <img src="img/setting.svg" height="25px" width="36px" alt="" />
              </a>
            </li>
          </ul>
          <a class="navbar-brand" href="akunset.html">
            <img class="" src="img/icon_akun.png" >
          </a>
        </nav>
    </div>
    <div class="offcanvas offcanvas-start offcanvasbr " data-bs-scroll="true"
      data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling"
      aria-labelledby="offcanvasScrollingLabel">
      <div class="offcanvas-header">
        <img src="img/logo.svg" height="120px" width="80px" alt="" class="border-end border-black border-1">
        <div class="h1 me-auto ps-2"> Maps <br>Wisata</div>
        
      </div>
      <div class="offcanvas-body">
        <div>
          <button class="btn">
         <img src="img/search.svg" height="26px" width="36px" alt="" class="border-end border-black border-1 pe-3">
         <span class="ms-3 fs-5 "> Telusuri</span>
         </button>
    </div>
        <button class="mt-3 btn">
         <img src="img/maps.svg" height="26px" width="36px" alt="" class="border-end border-black border-1 pe-3">
        <span class="ms-3 fs-5 "> Rekomendasi</span>
      </button>
      <div><iframe src="iframe.html" frameborder="0" class="container-fluid" height="200vh"></iframe></div>
       <div class="position-absolute container-fluid bottom-0">
        <button type="button" class="ms-4 mb-3 btn btn-set bottom-0 start-0 position-absolute">
         <img src="img/setting.svg" height="26px" width="36px" alt="" class="pe-3">
         <span class="ms-3 fs-5 "> Setting</span>
      </button>
      
      <button
          type="button"
          class="position-absolute end-0 bottom-0 m-4 border-0"
          data-bs-dismiss="offcanvas"
          aria-label="Close"
        ><img src="img/arrow.svg" alt="back" height="30px"></button>
</div> 
      </div> 
    </div>
    <div
      id="map"
      class="container-fluid"
      style="height: 100vh; background-repeat: no-repeat"
    >
      <script>
        // Logging the context of 'this' value
        console.log(this);

        // Immediately invoked function to run geolocation check and handling
        (() => {
          // Check if the browser supports geolocation
          if (navigator.geolocation) {
            // Get the current position of the user
            navigator.geolocation.getCurrentPosition(success, error, {
              // Enable high accuracy options
              enableHighAccuracy: true,
              // Maximum age of cached position
              maximumAge: 0,
              // Time allowed for the operation
              timeout: 10000,
            });
          } else {
            // Alert if geolocation is not supported
            alert("Maps Wisata is not supported by this browser");
          }
        })();

        // Callback for successful acquisition of position
        function success(position) {
          // Get the accuracy of the position
          const accuracy = position.coords.accuracy;
          // Get the latitude of the position
          const latitude = position.coords.latitude;
          // Get the longitude of the position
          let longitude = position.coords.longitude;
          // Get map for these coordinates
          getMap(latitude, longitude);
        }

        // Callback for failed geolocation
        function error() {
          // Alert if unable to retrieve location
          alert("Unable to retrieve location");
        }

        // Function to get a map view for the given latitude and longitude
        function getMap(latitude, longitude) {
          // Initialize the map with required settings
          const map = L.map("map").setView([latitude, longitude], 10);
          // Define the tile Aayer to use for the map
          L.tileLayer(
            "https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png",{
          
            }).addTo(map);

          map.setZoom(20)

          var popup = ''

          var myPopup = L.popup().setContent('<img src="img/candi.svg" width="100%" alt="candi"><h1 class="card-title text-center lateef" style="color: #053B50;">Candi Singasari<h1><a href="rating.html"><img src="img/star.svg" height="20em" alt="review"></a><a href="deskripsi.html" class="position-absolute end-0 me-5"><img src="img/deskripsi.svg" height="30em"></a>');
          // Add marker at user's current location
          L.marker([latitude, longitude])
            .addTo(map)
            .bindPopup(myPopup)
            .openPopup();
        }
       
      </script>
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
      <!-- <script>
        console.log(this);
            (() => {
                if (navigator.geolocation) {
                  navigator.geolocation.getCurrentPosition(success, error, {
                        enableHighAccuracy: true,
                        maximumAge: 0,
                        timeout: 10000
                    });
                  } else {
                    alert("Geolocation is not supported by this browser");
                }
            })();

            function success(position) {
              const accuracy = position.coords.accuracy;
              const latitude = position.coords.latitude;
              const longitude = position.coords.longitude;
              getMap(latitude, longitude);
            }

            function error() {
                alert("Unable to retrieve location");
            }

            function getMap(latitude, longitude) {
                const map = L.map("map").setView([latitude, longitude], 20);
                L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png").addTo(map);
                L.marker([latitude, longitude]).addTo(map);
            }
        </script> -->
    </div>
    <script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
      integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
      integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
      crossorigin="anonymous"
    ></script>
    <script src="Js/mapuser.js"></script>

  </body>
</html>
