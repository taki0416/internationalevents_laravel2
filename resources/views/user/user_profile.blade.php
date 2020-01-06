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

      <div class="p-3" >
        <h2>「{{$item -> name}} 」さんの登録情報</h2>

        <form action="{{route('user.image')}}" method="post" enctype="multipart/form-data">

        {{csrf_field()}}


        @if($item->image_url == null)
          <img src="/storage/noimage.png">
        @else
        <p>画像：<img class="profile_image" src="{{ asset('/post_images/'.$item->image_url)}}"></p>
        @endif


        
        

        <input type="file" name="image_url">
        <input type="submit" name="submit" value="画像登録">
        </form>


        <form action="{{ route('user.profile.update') }}" method="post" class="form-horizontal">
        @csrf
          <input type="hidden" name="id" value="{{ $item->id }}">

          <div class="form-group @if($errors->has('name')) has-error @endif">
              <label class="col-sm-2 control-label" for="name">名前：</label>
             <div class="col-sm-10">
               <input type="text" class="form-control" id="name" name="name" value="{{ old('name') ?? $item->name }}">
               @if($errors->has('name'))<span class="text-danger">{{ $errors->first('name') }}</span> @endif
             </div>
          </div>

          <div class="form-group @if($errors->has('email')) has-error @endif">
              <label class="col-sm-2 control-label" for="email">メールアドレス：</label>
             <div class="col-sm-10">
               <input type="text" class="form-control" id="email" name="email" value="{{ old('email') ?? $item->email }}">
               @if($errors->has('email'))<span class="text-danger">{{ $errors->first('email') }}</span> @endif
             </div>
          </div>

          <div class="form-group @if($errors->has('sponsor_phone')) has-error @endif">
              <label class="col-sm-2 control-label" for="sponsor_phone">電話番号：</label>
             <div class="col-sm-10">
               <input type="text" class="form-control" id="sponsor_phone" name="sponsor_phone" value="{{ old('sponsor_phone') ?? $item->sponsor_phone }}">
               @if($errors->has('sponsor_phone'))<span class="text-danger">{{ $errors->first('sponsor_phone') }}</span> @endif
             </div>
          </div>

          <div class="form-group @if($errors->has('hp')) has-error @endif">
              <label class="col-sm-2 control-label" for="hp">ホームページ：</label>
             <div class="col-sm-10">
               <input type="text" class="form-control" id="hp" name="hp" value="{{ old('hp') ?? $item->hp }}">
               @if($errors->has('hp'))<span class="text-danger">{{ $errors->first('hp') }}</span> @endif
             </div>
          </div>

          <div class="form-group @if($errors->has('facebook')) has-error @endif">
              <label class="col-sm-2 control-label" for="facebook">Facebook：</label>
             <div class="col-sm-10">
               <input type="text" class="form-control" id="facebook" name="facebook" value="{{ old('facebook') ?? $item->facebook }}">
               @if($errors->has('facebook'))<span class="text-danger">{{ $errors->first('facebook') }}</span> @endif
             </div>
          </div>

          <div class="form-group @if($errors->has('twitter')) has-error @endif">
              <label class="col-sm-2 control-label" for="twitter">Twitter：</label>
             <div class="col-sm-10">
               <input type="text" class="form-control" id="twitter" name="twitter" value="{{ old('twitter') ?? $item->twitter }}">
               @if($errors->has('titter'))<span class="text-danger">{{ $errors->first('twitter') }}</span> @endif
             </div>
          </div>

          <div class="form-group @if($errors->has('instagram')) has-error @endif">
              <label class="col-sm-2 control-label" for="instagram">instagram：</label>
             <div class="col-sm-10">
               <input type="text" class="form-control" id="instagram" name="instagram" value="{{ old('instagram') ?? $item->instagram }}">
               @if($errors->has('instagram'))<span class="text-danger">{{ $errors->first('instagram') }}</span> @endif
             </div>
          </div>

          <div class="form-group @if($errors->has('youtube')) has-error @endif">
              <label class="col-sm-2 control-label" for="youtube">youtube：</label>
             <div class="col-sm-10">
               <input type="text" class="form-control" id="youtube" name="youtube" value="{{ old('youtube') ?? $item->youtube }}">
               @if($errors->has('youtube'))<span class="text-danger">{{ $errors->first('youtube') }}</span> @endif
             </div>
          </div>

          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10 text-center">
              <input type="submit" name="button1" value="送信" class="btn btn-primary btn-wide" />
            </div>
          </div>
        </form>


      </div>


    </div>
    

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
