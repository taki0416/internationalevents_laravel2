<!DOCTYPE html>
<html lang="en">

@include('top_includes.header')

<body>

  <!-- Navigation -->
  @include('top_includes.nav2')

  <!-- Page Content -->
  
<div class="container">
  
  <div class="jumbotron my-4">
  	<h1 class="display-5">お問い合わせ</h1>
  </div>

  <div class="sample-box-3">
    <form action="{{ route('contact.confirm')}}" method="post">
      <div class="form-group">
		    <label for="InputName">お名前</label><span style="color:red"> ※必須</span>
		    <input type="text"" name="username" class="form-control" id="Name" required placeholder="お名前を入力してください。">
	    </div>
	    <div class="form-group">
		    <label for="InputEmail">メールアドレス</label></label><span style="color:red"> ※必須</span>
		    <input type="email" name="email" class="form-control" id="InputEmail" required placeholder="メール・アドレスを入力して下さい。">
	    </div>
      <div class="form-group">
		    <label for="InputSelect">質問内容</label></label>
		    <select class="form-control" name="type" id="InputSelect">
			    <option>イベント開催について</option>
			    <option>イベント参加について</option>
			    <option>その他</option>

		    </select>
	    </div>
	    <div class="form-group">
		    <label for="InputTextarea">お問い合わせ内容</label></label><span style="color:red"> ※必須</span>
		    <textarea class="form-control" name="opinion" id="InputTextarea" placeholder="お問い合わせ内容を入力して下さい。"></textarea>
	    </div>


      <div class="center-block" style= "text-align: center">
        <div class="p-3" >
          <div><input type="submit" name="button1" value="送信" class="btn btn-info"></div>
          <input type="hidden" name="_token" value="{{ csrf_token()}}">
        </div>
      </div>
  
    </form>
  </div>
  </div>
</div>
  <!-- /.container -->


    <!-- /.container -->
 @include('top_includes.footer')

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
