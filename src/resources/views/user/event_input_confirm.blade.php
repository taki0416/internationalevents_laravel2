<!DOCTYPE html>
<html lang="en">
@include('user_top_includes.header')

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
          {{ Auth::user()->name }}様 <span class="caret"></span>
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
      </div>
      </nav>



        <h3>イベント追加フォーム</h3>
        <form action="{{ route('event.input.confirm')}}" method="post" class="form-horizontal">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
  
        <div class="form-group @if($errors->has('event_name')) has-error @endif">
          <label class="col-sm-2 control-label" for="event_name">イベント名：</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="event_name" name="event_name" placeholder="イベント名を入力してください" value="{{ old('event_name') }}">
            @if($errors->has('event_name'))<span class="text-danger">{{ $errors->first('event_name') }}</span> @endif
          </div>
        </div>

        <div class="form-group @if($errors->has('event_date')) has-error @endif">
          <label class="col-sm-2 control-label" for="event_date">イベント開催時間：</label>
          <div class="col-sm-10">
            <input type="date" class="form-control" id="event_date" name="event_date" value="{{ old('event_date') }}">
            @if($errors->has('event_date'))<span class="text-danger">{{ $errors->first('event_date') }}</span> @endif
          </div>
        </div>


        <div class="form-group @if($errors->has('event_start_time')) has-error @endif">
          <label class="col-sm-2 control-label" for="event_start_time">イベント開催日：</label>
          <div class="col-sm-10">
            <input type="time" class="form-control" id="event_start_time" name="event_start_time" value="{{ old('event_start_time') }}">
            @if($errors->has('event_start_time'))<span class="text-danger">{{ $errors->first('event_start_time') }}</span> @endif
          </div>
        </div>

        


        <div class="form-group @if($errors->has('capacity')) has-error @endif">
          <label class="col-sm-2 control-label" for="capacity">応募人数：</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="capacity" name="capacity" value="{{ old('capacity') }}">
            @if($errors->has('capacity'))<span class="text-danger">{{ $errors->first('capacity') }}</span> @endif
          </div>
        </div>

        <div class="form-group @if($errors->has('venue')) has-error @endif">
          <label class="col-sm-2 control-label" for="venue">イベント会場：</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="venue"" name="venue" value="{{ old('venue') }}">
            @if($errors->has('venue'))<span class="text-danger">{{ $errors->first('venue') }}</span> @endif
          </div>
        </div>

        <div class="form-group @if($errors->has('event_details')) has-error @endif">
          <label class="col-sm-2 control-label" for="event_details">イベント詳細：</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="event_details" name="event_details"  value="{{ old('event_details') }}">
            @if($errors->has('event_details'))<span class="text-danger">{{ $errors->first('event_details') }}</span> @endif
          </div>
        </div>


        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10 text-center">
            <input type="submit" name="button1" value="送信" class="btn btn-primary btn-wide" />
          </div>
        </div>
      </form>
      </div>


    </ul>





</div>
<!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>

</body>

</html>
