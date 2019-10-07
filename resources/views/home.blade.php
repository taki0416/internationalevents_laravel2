@extends('layouts.app2')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">主催者の仮登録完了のお知らせ</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    仮登録ありがとうございます!
                    ご登録のメールアドレスに届いたメールから本登録に進んでください。
                </div>
            </div>
            <br>
            <input type="button" value="TOPに戻る" onclick="location.href='/'">
        </div>
    </div>
</div>
@endsection
