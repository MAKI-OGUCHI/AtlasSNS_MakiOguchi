<x-login-layout>
  <div class="profile_card">
    <div class="profile_left">
      <img class="avatar" src="{{ asset('images/'.$user->icon_image) }}" alt="">
    </div>
    <div class="profile_body">
      <div class="profile_name">{{ $user->username }}</div>
      <div class="profile_bio">{{ $user->bio }}</div>
    </div>
    <div class="profile_action">
      @if(!auth()->user()->isFollowing($user->id))
        <form action="{{ route('follow',['id' => $user->id]) }}" method="post">
          @csrf
          <button type="submit" class="btn_follow">フォローする</button>
        </form>
      @else
        <form action="{{ route('unfollow', ['id' => $user->id]) }}" method="POST">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn_unfollow">フォロー解除</button>
        </form>
      @endif
    </div>
  </div>

  <div class="post_list">
    @foreach($post as $p)
      <div class="post_item">
        <div class="post_left">
          <img class="avatar" src="{{ asset('images/'.$p->user->icon_image) }}" alt="">
        </div>
        <div class="post_body">
          <div class="post_name">{{ $p->user->username }}</div>
          <div class="post_text">{{ $p->post }}</div>
        </div>
        <div class="post_meta">{{ $p->updated_at }}</div>
      </div>
    @endforeach
  </div>
</x-login-layout>
