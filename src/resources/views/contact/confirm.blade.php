<!DOCTYPE html>
<html lang="en">

@include('top_includes.header')

<body>

  <!-- Navigation -->
  @include('top_includes.nav')

  <!-- Page Content -->

<div class="jumbotron my-4">
<h2>お問い合わせ内容の確認</h2><br>

<p>お問い合わせ内容はこちらで宜しいでしょうか？</P>
<p>よろしければ「送信する」ボタンを押して下さい。</p>


<div class="card-body">
<ul class="list-group">
	<li class="list-group-item">お名前：{{ $request->username }}</li>
  <li class="list-group-item">メールアドレス：{{ $request->email }}</li>
  <li class="list-group-item">質問内容：{{ $request->type }}</li>
	<li class="list-group-item">お問い合わせ内容：{{ $request-> opinion}}</li>
</ul>

<div class="card-body">
<input type="button"  value="入力内容を修正する" onclick="history.back(-1)">


<input type="button" value="送信" onclick="location.href='finish'">
<div>
</div>
</div>
</form>
</div>


    <!-- /.container -->
 @include('top_includes.footer')

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
