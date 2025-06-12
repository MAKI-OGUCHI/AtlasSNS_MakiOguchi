<!-- extends('layouts.logout') -->

<!-- section('content') -->

@if($errors->any())
<div class="register_error">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div><!-- /.register_error -->
@endif

<x-logout-layout>
    <!-- 適切なURLを入力してください -->
     <div class="form">
    {!! Form::open(['url' => '/register']) !!}

    <p>新規ユーザー登録</p>

    <div class="register">
    {{ Form::label('ユーザー名') }}
    {{ Form::text('UserName',null,['class' => 'input']) }}

    {{ Form::label('メールアドレス') }}
    {{ Form::email('MailAdress',null,['class' => 'input']) }}

    {{ Form::label('パスワード') }}
    {{ Form::text('Password',null,['class' => 'input']) }}

    {{ Form::label('パスワード確認') }}
    {{ Form::text('PasswordConfirm',null,['class' => 'input']) }}

    {{ Form::submit('登録'),['class' => 'success'] }}
    </div>

    <p><a href="login">ログイン画面へ戻る</a></p>

    {!! Form::close() !!}
    </div>

    <!-- endsection -->
</x-logout-layout>
