<!DOCTYPE html>
<html lang="ja">



<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>国際交流イベント情報 - Topページ</title>

  <!-- Bootstrap core CSS -->
  <link href="/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="/css/heroic-features.css" rel="stylesheet">

</head>



<body>

  <!-- Navigation -->
  @include('top_includes.nav1')

  

  <!-- コンテンツ -->
  <div class="container">

  <header class="jumbotron my-1">
      <h1 class="display-5">「{{$item->event_name}}」の参加フォーム</h1>
  </header>

  <div class="p-3">
    <h3>参加者情報入力フォーム</h3>

    <form action="{{ route('event.confirm',[$item->id])}}" method="post" class="form-horizontal">
    
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    
    <div class="form-group @if($errors->has('last_name')) has-error @endif">
      <label class="col-sm-2 control-label" for="last_name">姓：</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="last_name" name="last_name" placeholder="山田" value="{{ old('last_name') }}">
        @if($errors->has('last_name'))
          <span class="text-danger">{{ $errors->first('last_name') }}</span>
        @endif
      </div>
    </div>

    <div class="form-group @if($errors->has('first_name')) has-error @endif">
      <label class="col-sm-2 control-label" for="first_name">名：</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="first_name" name="first_name" placeholder="太郎" value="{{ old('first_name') }}">
          @if($errors->has('first_name'))<span class="text-danger">{{ $errors->first('first_name') }}</span> @endif
      </div>
    </div>

    <div class="form-group @if($errors->has('name_reading')) has-error @endif">
      <label class="col-sm-2 control-label" for="name_reading">フリガナ：</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="name_reading" name="name_reading" placeholder="ヤマダタロウ" value="{{ old('name_reading') }}">
          @if($errors->has('name_reading'))<span class="text-danger">{{ $errors->first('name_reading') }}</span> @endif
      </div>
    </div>

    <div class="form-group @if($errors->has('sex')) has-error @endif">
      <label class="col-sm-2 control-label" for="sex">性別：</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="sex" name="sex" placeholder="男性 or 女性" value="{{ old('sex') }}">
        @if($errors->has('sex'))<span class="text-danger">{{ $errors->first('sex') }}</span> @endif
      </div>
    </div>

    <div class="form-group @if($errors->has('participant_phone')) has-error @endif">
      <label class="col-sm-2 control-label" for="participant_phone">電話番号：</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="participant_phone" name="participant_phone" placeholder="000-0000-0000" value="{{ old('participant_phone') }}">
        @if($errors->has('participant_phone'))<span class="text-danger">{{ $errors->first('participant_phone') }}</span> @endif
      </div>
    </div>


    <div class="form-group @if($errors->has('participant_mail')) has-error @endif">
      <label class="col-sm-2 control-label" for="participant_mail">メールアドレス：</label>
      <div class="col-sm-10">
        <input type="email" class="form-control" id="participant_mail" name="participant_mail" placeholder="メールアドレス" value="{{ old('participant_mail') }}">
         @if($errors->has('participant_mail'))<span class="text-danger">{{ $errors->first('participant_mail') }}</span> @endif
      </div>
    </div>

    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10 text-center">
        <input type="submit" name="button1" value="送信" class="btn btn-primary btn-wide" />
      </div>
    </div>
    </form>
  </div>


  <div class="p-3" >
    <a href="/events">イベント一覧に戻る</a>
  </div>
</div>



 <!-- /.container -->

<!-- フッター-->
 

@include('top_includes.footer')
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
