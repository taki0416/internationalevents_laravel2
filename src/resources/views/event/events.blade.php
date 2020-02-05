<!DOCTYPE html>
<html lang="ja">





@include('top_includes.header')

<body>

  <!-- Navigation -->
  @include('top_includes.nav1')
  <div class="breadcrumbs">
      <ul>
        <li><a href="/">トップ</a></li>
        <li>イベント一覧</li>
      </ul>
  </div>

  <!-- Page Content -->
  <div class="container">
    <header class="jumbotron my-1">
      <h1 class="display-5">開催中のイベント</h1>
    </header>

    <div class="searchBox_eventpg">
      
        <form class="form-inline" action="{{ route('event.search') }}" method="post" >
          {{ csrf_field() }}
          <dl class="search_eventpg">
          <label for="number" class="control-label col-xs-2">開催地域で検索する　　</label>
          
            <dt><select name="city_name" class="form-control select select-primary mbl" data-toggle="select" id="number"></dt>
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
            
          </dl>
        </form>
      
    </div>

</div>

    <div class="container">
    


    @section('content')

    <div class="table1">

    <table class="table" >
    <thead>
        <tr>
          <th>イベント名</th>
          <th>開催日</th>
          <th>開催場所</th>          
          <th>イベント詳細</th>
        </tr>
    </thead>
    @foreach($items1 as $item)
    <tbody>
        <tr>
          <td>{{$item->event_name}}</td>
          <td>{{$item->event_date}}</td>
          <td>{{$item->venue}}</td>
          <td><a href="{{ route('event.show',[$item->id])}}">詳細を確認する</a></td>
        </tr>

    </tbody>
    @endforeach
    </table>
    </div>
    </div>
    </div>
    


   


    
   


    <!-- /.container -->
 @include('top_includes.footer')

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
