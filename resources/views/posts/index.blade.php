<x-login-layout>


  <h2>機能を実装していきましょう。</h2>
  <div class="container">
    {{ Form::open(['url' => '/post/create'])}}

    {{ Form::input('text' , 'post' , null , ['required' , 'class' => 'form-control' , 'placeholder' => '投稿内容を入力してください。']) }}

    <button type="submit" class="btn"><img src="/images/post.png" alt="投稿"></button>
    {{ Form::close() }}
  </div>

</x-login-layout>
