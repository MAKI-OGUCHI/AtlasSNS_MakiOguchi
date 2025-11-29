<x-login-layout>


  <div class="post_form">
    {{ Form::open(['url' => '/post/create'])}}

    {{ Form::input('text' , 'post' , null , ['required' , 'class' => 'form-control' , 'placeholder' => '投稿内容を入力してください。']) }}

    <button type="submit" class="btn"><img src="/images/post.png" alt="投稿"></button>
    {{ Form::close() }}
  </div>

  @foreach($posts as $post)
  <div class="post">
    <div class="post_a">
      <img src="{{'images/'. $post->user->icon_image}}"></img>
    </div>
    <div class="post_b">
      <div class="post_username">
        <p>{{$post->user->username}}</p>
      </div>
      <p>{{$post->post}}</p>
    </div>
    <div class="post_c">
      <p>{{$post->created_at}}</p>
      <a class="delete" href="delete/{{$post->id}}" onclick="return confirm('投稿を削除します')"><img src="/images/trash.png" alt="削除" class="delete-icon"></a>
    </div>
  </div>
  @endforeach
</x-login-layout>
