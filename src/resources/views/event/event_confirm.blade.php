<!DOCTYPE html>
<html lang="ja">





@include('top_includes.header')


<body>

  <!-- Navigation -->
  @include('top_includes.nav1')

  <!-- Page Content -->
  <div class="container">



    <!-- Jumbotron Header -->
    <header class="jumbotron my-4">
      <h1 class="display-5">「{{$item->event_name}}」の参加フォーム</h1>
    </header>



    <div class="container">
      <ul class="list-group">
        <li class="list-group-item">開催日：{{$item->event_date}}</li>
        <li class="list-group-item">開催場所：{{$item->venue}}</li>
        <li class="list-group-item">イベント詳細：{{$item->event_details}}</li>
      </ul>
    </div>

    

    <div class="container">
      
      
    
      <h3>参加者情報確認画面</h3>
      <form action="{{ route('event.finish') }}" method="post" class="form-horizontal">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="event_id" value="{{ $item -> id }}">
        <input type="hidden" name="last_name" value="{{ $request -> last_name}}">
        <input type="hidden" name="first_name" value=" {{ $request -> first_name}} ">
        <input type="hidden" name="name_reading" value= "{{ $request -> name_reading}}">
        <input type="hidden" name="sex" value= "{{ $request -> sex}}">
        <input type="hidden" name="participant_phone" value="{{ $request -> participant_phone}} ">
        <input type="hidden" name="participant_mail" value="{{ $request -> participant_mail}} ">
        
        <div class="row">
          <label class="col-sm-2 control-label" for="last_name">姓：</label>
          <div class="col-sm-10">
            {{ $request -> last_name}}
          </div>
        </div>

        <div class="row">
          <label class="col-sm-2 control-label" for="first_name">名：</label>
          <div class="col-sm-10">
          {{ $request -> first_name}}
          </div>
        </div>

        <div class="row">
          <label class="col-sm-2 control-label" for="name_reading">フリガナ：</label>
          <div class="col-sm-10">
          {{ $request -> name_reading}}
          </div>
        </div>

        <div class="row">
          <label class="col-sm-2 control-label" for="sex">性別：</label>
          <div class="col-sm-10">
          {{ $request -> sex}}
          </div>
        </div>

        <div class="row">
          <label class="col-sm-2 control-label" for="participan
          
          t_phone">電話番号：</label>
          <div class="col-sm-10">
          {{ $request -> participant_phone}}
          </div>
        </div>

        <div class="row">
          <label class="col-sm-2 control-label" for="participant_mail">メールアドレス：</label>
          <div class="col-sm-10">
          {{ $request -> participant_mail}}
          </div>
        </div>
 
        <div class="row">
          <div class="col-sm-offset-2 col-sm-10">
            <input type="submit" name="button1" value="登録" class="btn btn-primary btn-wide" />
          </div>
        </div>
      </form>
      </div>
      

    
   



    

      <div class="p-3" >
        <a href="/events">イベント一覧に戻る</a>
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
