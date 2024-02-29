
<html>
<head>
    <title></title>
</head>
<body>
    <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
    <script type="text/javascript">
        window.onload = function () {
            var mapOptions = {
                center: new google.maps.LatLng(18.9300, 72.8200),
                zoom: 14,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            var infoWindow = new google.maps.InfoWindow();
            var latlngbounds = new google.maps.LatLngBounds();
            var map = new google.maps.Map(document.getElementById("dvMap"), mapOptions);
            google.maps.event.addListener(map, 'click', function (e) {
               // alert("Latitude: " + e.latLng.lat() + "\r\nLongitude: " + e.latLng.lng());
                 $('#latInput').text("123");
                // $('#lngInput').val(e.latlng.lng());
                //document.getElementById("latInput").innerHTML   = "123";
                document.getElementById('lngInput').innerHTML   = "123";
            });
        }
    </script>
    <div id="dvMap" style="width: 500px; height: 500px">
    </div>
    <div class="col-md-6 col-sm-6 col-xs-6">
                                                         <input class="form-control reset" id="latInput" name="lat"  placeholder="Latitude"  type="text" required />
                                                      </div>

                                                      <div class="col-md-6 col-sm-6 col-xs-6">
                                                         <input class="form-control reset" id="lngInput" name="lng"  placeholder="Longitude"  type="text" required />
                                                      </div>
</body>
</html>
