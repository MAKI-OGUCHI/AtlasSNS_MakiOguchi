<x-login-layout>

  @section('content')

  <div class="form">
    <ul>
      @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
    {!! Form::open(['url' => '/edit' , 'enctype' => 'multipart/form-data' ]) !!}

      {{ Form::label('UserName', 'ユーザー名') }}
       {{ Form::text('UserName', $user->username, ['class' => 'input', 'placeholder' => 'ユーザー名を入力']) }}

      {{ Form::label('MailAddress', 'メールアドレス') }}
      {{ Form::email('MailAddress', $user->mail_address ?? null, ['class' => 'input', 'placeholder' => 'example@mail.com']) }}

      {{ Form::label('NewPassword', '新しいパスワード') }}
      {{ Form::password('NewPassword', ['class' => 'input', 'placeholder' => '8文字以上で入力']) }}

      {{ Form::label('NewPassword_confirmation', 'パスワード確認') }}
      {{ Form::password('NewPassword_confirmation', ['class' => 'input', 'placeholder' => 'もう一度入力']) }}

      {{ Form::label('Bio', '自己紹介') }}
      {{ Form::textarea('Bio', $user->bio ?? null, ['class' => 'textarea', 'rows' => 4, 'placeholder' => '自己紹介を入力してください']) }}

      {{ Form::label('IconImage', 'アイコン画像') }}
      {{ Form::file('IconImage', ['class' => 'input-file']) }}

      <button class="btn" type="submit">更新</button>

    {!! Form::close() !!}
</div>


</x-login-layout>
