<x-logout-layout>
  <!-- extends('layouts.logout') -->

  @section('content')
  <!-- 適切なURLを入力してください -->
   <div class="form">
  {!! Form::open(['url' => '/login']) !!}

  <p class="greet">AtlasSNSへようこそ</p>

  <div class="register">
  {{ Form::label('メールアドレス') }}
  {{ Form::text('email',null,['class' => 'input']) }}
  {{ Form::label('パスワード') }}
  {{ Form::password('password',['class' => 'input']) }}
  </div>

  {{ Form::submit('ログイン',['class'=>'button']) }}

  <p class="new_user"><a href="register">新規ユーザーの方はこちら</a></p>

  {!! Form::close() !!}
  </div>
</x-logout-layout>

<!-- endsection -->
