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
      <a class="edit" href="" post="{{$post -> post}}" postID="{{$post -> id}}"><img src="/images/edit.png" alt="編集" class="edit-icon"></a>
      <a class="delete" href="delete/{{$post->id}}" onclick="return confirm('投稿を削除します')"><img src="/images/trash.png" alt="削除" class="delete-icon"></a>
    </div>
  </div>
  @endforeach
  <div class="Modal">
     @if($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
    @endif
    <div class="modalClose"></div>
    <div class="modal-content">
      <form action="post/{{$post -> id}}/edit" method="post">
        @csrf
        <textarea name="edit_post" class="modal-post" value=""></textarea>
        <input type="hidden" name="id" class="postID" value="">
      <button type="submit" class="btn" dataID="{{$post -> id}}" data-post="{{$post -> post}}">
        <img src="/images/edit.png" alt="更新">
      </button>
      {{csrf_field()}}
      </form>
    </div>
</div>
</x-login-layout>
