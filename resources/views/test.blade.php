<!DOCTYPE html>
<html>
  <head>
    <title>Gmaps.js テスト</title>
    <script type="text/javascript" src="bower_components/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript" src="//maps.google.com/maps/api/js?sensor=true"></script>
    <script type="text/javascript" src="bower_components/gmaps/gmaps.min.js"></script>
    <script type="text/javascript">
      // コントローラから渡された住所を取得
      var addressStr = "{!! $address !!}";
 
      $(document).ready(function(){
          // Gmapsを利用してマップを生成
          var map = new GMaps({
              div: '#map',
              lat: -12.043333,
              lng: -77.028333
          });
 
          // 住所からマップを表示
          GMaps.geocode({
              address: addressStr.trim(),
              callback: function(results, status) {
                  if (status == 'OK') {
                      var latlng = results[0].geometry.location;
                      map.setCenter(latlng.lat(), latlng.lng());
                      map.addMarker({
                          lat: latlng.lat(),
                          lng: latlng.lng()
                      });
                  }
              }
          });
      });
    </script>
    <style>
      @charset "utf-8";
      #map {
        height: 400px;
      }
    </style>
  </head>
  <body>
    <h1>Gmaps.js テスト</h1>
    <p>住所：{{ $address }}</p>

    <iframe id='map' src='https://www.google.com/maps/embed/v1/place?key=AIzaSyAiCqEBHcELxXTD_F2y9I4j76efWN7bRK0&amp;q={{ $address }}'
    width='100%'
    height='320'
    frameborder='0'>
    </iframe>

    <div id="map"></div>
  </body>
</html>
