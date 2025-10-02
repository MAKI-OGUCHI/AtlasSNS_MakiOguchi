<x-login-layout>


  <h2>機能を実装していきましょう。</h2>
  <div class="container">
    {{ Form::open(['url' => '/post/create'])}}

    {{ Form::input('text' , 'post' , null , ['required' , 'class' => 'form-control' , 'placeholder' => '投稿内容を入力してください。']) }}

    <button type="submit" class="btn"><img src="/images/post.png" alt="投稿"></button>
    {{ Form::close() }}
  </div>
<div class="post">
  @foreach($posts as $post)
  <img src="{{'images/'. $post->user->icon_image}}"></img>
  <p>{{$post->user->username}}</p>
  <p>{{$post->post}}</p>
  <a class="delete" href="delete/{{$post->id}}" onclick="return confirm('投稿を削除します')"><img src="/images/trash.png" alt="削除" class="delete-icon"></a>
@endforeach</div>
</x-login-layout>
