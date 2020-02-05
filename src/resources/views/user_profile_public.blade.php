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

  <script src="https://kit.fontawesome.com/ca241ac837.js" crossorigin="anonymous"></script>

  <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
  

</head>

<body>

  <!-- Navigation -->
  @include('top_includes.nav1')

  <div class="breadcrumbs">
      <ul>
        <li><a href="/">トップ</a></li>
        <li><a href="/events">イベント一覧</a></li>
        <li>主催者情報</li>
      </ul>
  </div>



  <!-- Page Content -->
  <div class="container">

      <!-- Jumbotron Header -->
    <header class="jumbotron my-4">
      <h1 class="display-5">主催者情報</h1>
    </header>



    <div class="profile">
      <ul class="list-group">
        <li class="list-group-item">主催者名：{{$profile->name}}</li>
        <li class="list-group-item">自己紹介：{{$profile->pr}}</li>
      </ul>
    </div>

    <a href = "{{$profile->twitter}} " target="_blank"><i class="fab fa-twitter fa-4x"></i></a>
    <a href = "{{$profile->facebook}} " target="_blank"><i class="fab fa-facebook fa-4x"></i></a>
    <a href = "{{$profile->instagram}} " target="_blank"><i class="fab fa-instagram fa-4x"></i></a>
    <a href = "{{$profile->youtube}} " target="_blank"><i class="fab fa-youtube fa-4x"></i></a>


    



    

      <div class="p-3" >
        <a href="'. $_SERVER['HTTP_REFERER'].'">イベント一覧に戻る</a>
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
