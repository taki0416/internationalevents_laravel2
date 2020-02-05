<!DOCTYPE html>
<html lang="ja">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>国際交流イベント情報 - イベント詳細</title>

  <!-- Bootstrap core CSS -->
  <link href="/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="/css/heroic-features.css" rel="stylesheet">

  <!-- フォント関係 -->
  <script src="https://kit.fontawesome.com/ca241ac837.js" crossorigin="anonymous"></script>

  <!--Java-->
  <script type="text/javascript" src="bower_components/jquery/dist/jquery.min.js"></script>
  
  <!-- googlemap関係 -->
  <script type="text/javascript" src="//maps.google.com/maps/api/js?sensor=true"></script>
  <script type="text/javascript" src="bower_components/gmaps/gmaps.min.js"></script>
  
  <script type="text/javascript">
      // コントローラから渡された住所を取得

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

  <!-- Navigation -->
  @include('top_includes.nav1')

  <!-- パンくずリスト -->

  <div class="breadcrumbs">
    <ul>
      <li><a href="/">トップ</a></li>
      <li><a href="/events">イベント一覧</a></li>
      <li>イベント詳細</li>
    </ul>
  </div>

  <!-- コンテンツ-->
  <div class="container">

    <header class="jumbotron my-1">
      <h1 class="display-5">{{ $item->event_name }}</h1>
    </header>


    <!--イベント詳細-->

    <div class="container">
      <ul class="list-group">
        <li class="list-group-item">主催者名：<a href="{{ route('user_profile', [$item->user_id])}}">{{$user->name}}</a></li>
        <li class="list-group-item">イベント開催日：{{$item->event_date}}</li>
        <li class="list-group-item">応募人数：{{$item->capacity}}</li>
        <li class="list-group-item">イベント詳細：{{$item->event_details}}</li>
        <li class="list-group-item">イベント会場：{{$item->venue}}</li>
        <!--googlemap-->
        <li class="list-group-item">
          <iframe id='map' src='https://www.google.com/maps/embed/v1/place?key=AIzaSyAiCqEBHcELxXTD_F2y9I4j76efWN7bRK0&amp;q={{ $item -> venue }}'
            width='100%'
            height='320'
            frameborder='0'>
          </iframe>
        </li>
      </ul>
    </div>

        
    <div class="center-block" style= "text-align: center">

      <div class="p-3" >
        <a href="{{ route('event.form',[$item->id])}}">
          <button type="button" class="btn btn-primary btn-lg">イベントに参加する</button>
        </a>
      </div>
    

      <div class="p-3" >
        <a href="/events">イベント一覧に戻る</a>
      </div>

    </div>
  </div>
  <!--コンテンツ終了-->



  <!--フッタ-->
  @include('top_includes.footer')

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
