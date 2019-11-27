

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>主催者管理画面</title>



  <!-- フォント-->
  <script src="https://kit.fontawesome.com/ca241ac837.js" crossorigin="anonymous"></script>

  <!-- Bootstrap core JavaScript -->
  <script src="https://cdn.jsdelivr.net/npm/clipboard@2/dist/clipboard.min.js"></script>

  <!--<script src="/js/clipboard.min.js"></script>-->
  


  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
 



  <!-- Bootstrap core CSS -->
  <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="/css/simple-sidebar.css" rel="stylesheet">
  <link href="/css/user_page.css" rel="stylesheet">

</head>



<body>

  <div class="d-flex" id="wrapper">
    @include('user_top_includes.sidebar')
  
    <!-- Page Content -->
    <div id="page-content-wrapper">

    <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
        <ul class="navbar-nav ml-auto">
        <!-- Authentication Links -->
        @guest
          <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">{{ __('ログイン') }}</a>
          </li>
        @if (Route::has('register'))
          <li class="nav-item">
            <a class="nav-link" href="{{ route('register') }}">{{ __('登録はこちら') }}</a>
          </li>
        @endif
        @else
          <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
              {{ Auth::user()->name }} 様<span class="caret"></span>
            </a>
            
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="{{ route('logout') }}"
                 onclick="event.preventDefault();
                 document.getElementById('logout-form').submit();">
                 {{ __('ログアウト') }}
              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
              </form>
            </div>
          </li>
            @endguest
        </ul>
        </ul>
      </div>
    </nav>

    <div class="container">
    
    <!-- Jumbotron Header -->
    <header class="jumbotron my-4">
      <h1 class="display-5">{{$events->event_name}}</h1>
    </header>

    <div class="eventShow">
      <div class="eventShowtitle">
        <h2>イベント詳細</h2>
      </div>
      
      <!--イベントページへのリンク-->
      <div class="eventdetail">
        <a type= "button" href="http://localhost:8000/events_show{{$events->id}}" target="_blank">イベントページで確認する</a>
      </div>
      
    

      <!--各SNSへのシェアボタン-->
      <a href="https://twitter.com/intent/tweet?url=http://localhost:8000/events_show{{$events->id}}" target="blank_"><i class="fab fa-twitter fa-2x"></i>Twiiterでシェアする</a>
      <a href="https://www.facebook.com/sharer/.php?u=http://localhost:8000/events_show{{$events->id}}"><i class="fab fa-facebook fa-2x"></i>Facebookでシェアする</a>



        <!-- シェアリンクのコピーボタンのスクリプト-->

        <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/1.5.5/clipboard.min.js"></script>
        <script>
        $(function () {
          var clipboard = new Clipboard('.clip_copy_btn');
        });
        </script>

        <!--リンクをコピーしてシェア-->
        <!-- Target -->

        <input type="text" id="clip_copy_1" value="http://localhost:8000/events_show{{$events->id}}">

        <!-- Trigger -->
        <button class="clip_copy_btn" data-clipboard-target="#clip_copy_1" >イベントページのリンクをコピーする</button>




        <table class="table">
          <tbody>
            <tr>
              <th scope="row">イベント開催日：</th>
              <td>{{$events->event_date}}</td>
            </tr>

            <tr>
              <th scope="row">イベント開催時間：</th>
              <td>{{$events->event_start_time}}～</td>
            </tr>

            <tr>
              <th scope="row">イベント詳細：</th>
              <td>{{$events->event_details}}</td>
            </tr>

            <tr>
              <th scope="row">応募人数：</th>
              <td>{{$events->capacity}}</td>
            </tr>

            <tr>
              <th scope="row">イベント会場：</th>
              <td>{{$events->venue}}</td>
            </tr>
          </tbody>
        </table>
        
        <!-- 編集と削除ボタンを配置-->
        <div class="edit_deleteBox">
          <a href="{{ route('user.event.edit',[$events->id]) }}" class="btn btn-outline-secondary">編集する</a>
          <a href="{{ route('user.event.copy',[$events->id]) }}" class="btn btn-outline-secondary">イベントを複製する
          </a>
          
          <a class="btn btn-outline-secondary" data-toggle='modal' data-target="#modal_delete" data-title="{{ $events->id }}">イベントを削除する</a>
        </div>
      </div>
      </div>


      <!--ボタン・リンククリック後に表示される画面の内容-->


      <div class="modal fade" id="modal_delete" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4><h4 class="modal-title" id="myModalLabel">削除確認画面</h4></h4>
                </div>
                <div class="modal-body">
                    <label>データを削除しますか？</label>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal" >閉じる</button>
                    <button type="button" class="btn btn-danger"><a href="{{ route('user.event.delete',[$events->id])}}"> 削除 </a></button>
                </div>
            </div>
        </div>
    </div>




      <div class="modal" tabindex="-1" role="dialog" id="modal_delete">
        <form role="form" class="form-inline" method="POST" action="">
        {{ csrf_field() }}
        <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-body">
            <p></p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">キャンセル</button>
            <button type="submit" class="btn btn-danger">削除</button>
          </div>
        </div>
        </div>
        </form>
      </div>


      


    

    <hr color=#666666 >



<!--申込人数の表示と、リストの表示-->
    <div class="container">
    <div class="number_applicants">

      <h2>申し込み状況</h2>

      <table class="table">
        <tr>
          <th scope="row">現在のイベント申込人数：</th>
          <td>{{$count}}人　　(残り{{$events->capacity - $count}}人)</td>
        </tr>
      </table>
    </div>
    </div>
    
    <hr color=#666666 >


    <div class="container">
      <div class="applicant">
        <h2>申込者一覧</h2>
      </div>

      <table class="table">
        <thead>
        <tr>
          <th scope="col">姓</th>
          <th scope="col">名</th>
          <th scope="col">フリガナ</th>
          <th scope="col">性別</th>
          <th scope="col">メールアドレス</th>
          <th scope="col">電話番号</th>
        </tr>
        </thead>

        <tbody>
        <tr>
          @foreach($participants as $p)
          <td>{{ $p -> last_name }}</td>
          <td>{{ $p -> first_name }}</td>
          <td>{{ $p -> name_reading }}</td>
          <td>{{ $p -> sex }}</td>
          <td>{{ $p -> participant_phone }}</td>
          <td>{{ $p -> participant_mail }}</td>
          @endforeach
        </tr>
        </tbody>
      </table>

      <div class="csvExport">
        <a href="{{ route('user.event.export', [$events->id]) }}" class="btn btn-primary font-weight-bold"><i class="fas fa-download"></i> CSVでダウンロード</a>
      </div>
    </div>


    <div class="topbtn" >
      <a href="/user_top">戻る</a>
    </div>
  </div>

  </div>
  </div>


 
  <!-- /#wrapper -->

 
  
  
  

  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>



</body>

</html>
