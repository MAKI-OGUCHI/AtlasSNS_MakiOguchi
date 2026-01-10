<x-login-layout>
  <div class="post_form">
    <div class="post_form_icon">
    <img src="{{ asset('images/' . Auth::user()->icon_image) }}" alt="user icon">
    </div>
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
      <a class="edit" href="#" post="{{ $post->post }}" data-post-id="{{ $post->id }}">
      <img src="/images/edit.png" alt="編集" class="edit-icon">
      </a>
      <a class="delete" href="delete/{{$post->id}}" onclick="return confirm('投稿を削除します')"><img src="/images/trash.png" alt="削除" class="delete-icon"></a>
    </div>
  </div>
@endforeach
  <div class="modal">
     @if($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
    @endif
    <div class="modal_close"></div>
    <div class="modal_content">
      <form action="post/edit" method="post">
        @csrf
        <textarea name="edit_post" class="modal_post"></textarea>
        <input type="hidden" name="id" class="post_ID" value="">
      <button type="submit" class="btn">
        <img src="/images/edit.png" alt="更新">
      </button>
      </form>
    </div>

</div>

</x-login-layout>
