<!DOCTYPE html>
<html lang="en">


<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title class=  >国際交流イベント情報 - Topページ</title>

  <!-- Bootstrap core CSS -->
  <link href="/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="/css/heroic-features.css" rel="stylesheet">
  

  <!-- font -->
  <script src="https://kit.fontawesome.com/ca241ac837.js" crossorigin="anonymous"></script>
  <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
 
</head>





<body>

  <!-- Navigation -->
  @include('top_includes.nav')


  <!-- Topページの上部画像部分-->
  <div class="container">

    <div class="topBox">
      <h1 class="topTitle1">国際交流イベント情報</h1>
    </div>
  
  </div>


  
  <!-- コンテンツ -->
  <div class="container" >

    <!-- コンテンツ全体 -->
    <div class="topContentsBox clearfix">

      <!-- 左のコンテンツ（検索窓）-->
      <div class="leftcolumn">
        
        <div class="searchEvent">
          <p class="searchTitle1">イベント検索</p>
        </div>
      
        <div class="searchVenue">
          <form class="form-inline" action="{{ route('event.search') }}" method="post" >
              {{ csrf_field() }}
            <dl class="search">
              <label for="number" class="serchVenuelavel">開催地域で検索する　　</label>
          
              
                <select name="city_name" class="form-control select select-primary mbl" data-toggle="select" id="number">
              
    
                <option value="">指定なし</option>
                <option value="大分市" >大分市</option>
                <option value="別府市" >別府市</option>
                <option value="中津市" >中津市</option>
                <option value="日田市" >日田市</option>
                <option value="佐伯市" >佐伯市</option>
                <option value="臼杵市" >臼杵市</option>
                <option value="津久見市" >津久見市</option>
                <option value="竹田市" >竹田市</option>
                <option value="豊後高田市" >豊後高田市</option>
                <option value="杵築市" >杵築市</option>
                <option value="宇佐市" >宇佐市</option>
                <option value="豊後大野市" >豊後大野市</option>
                <option value="由布市" >由布市</option>
                <option value="国東市" >国東市</option>
                <option value="姫島村" >姫島村</option>
                <option value="日出町" >日出町</option>
                <option value="九重町" >九重町</option>
                <option value="玖珠町" >玖珠町</option>
                </select>

              <button type="submit" class="btn btn-info">検索</button>
            
            <dl>
          </form>
        </div>
      </div> <!-- leftcolumn終了 -->


      <!-- rightcolumn -->

      <div class="rightcolumn">
        <div class="sessionEvent">
          <p class="subTitle">開催中のイベント<p>
        </div>

        @if($items1 -> count() ==0)
          <p>※開催中のイベントはありません</p>
      
        @else

        @foreach($items1 as $item1)
        <div class="eventBox" >
          <p class="event_title">{{$item1->event_name}}</p>
          <p>開催日時 : {{ $item1->event_date }}</p>
          <p>開催場所 ：{{ $item1->venue }}</p>
          <p>募集人数 ： {{ $item1->capacity }}人</p>

          <!--eventBox全体をリンクに-->
          <a href="{{ route('event.show',[$item1->id])}}"></a>

          <!--button（リンク先なし）-->
          <button onclick="">詳細を確認する</button>
        </div>
        @endforeach
        @endif


        <div class="finishedEvent">
          <div class="subTitle">
            募集が終了したイベント
          </div>
        </div>
        
        @foreach($items2 as $item2)
      
        <div class="finishedEventBox" >
          <p class="event_title">
            {{$item2->event_name}}
          </p>

          <p>
            {{ $item2->event_date }}
          </p>

          <p>
            {{ $item2->venue }}
          </p>
        </div>
        @endforeach
      </div>
    </div>
  </div>
</body>


   <!-- Footer -->
<footer class="py-5 bg-dark">
     
     <p class="m-0 text-center text-white">Copyright &copy; Your Website 2019</p>
   
</footer>

 <!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="http://maps.google.com/maps/api/js?v=3&sensor=false" type="text/javascript" charset="UTF-8"></script>
<script src="googlemap.js" type="text/javascript" charset="UTF-8"></script>


</html>


