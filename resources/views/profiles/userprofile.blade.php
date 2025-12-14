<x-login-layout>
  <div class="profile-card">
    <div class="profile-left">
      <img class="avatar" src="{{ asset('images/'.$user->icon_image) }}" alt="">
    </div>
    <div class="profile-body">
      <div class="profile-name">{{ $user->username }}</div>
      <div class="profile-bio">{{ $user->bio }}</div>
    </div>
    <div class="profile-action">
      @if(!auth()->user()->isFollowing($user->id))
        <form action="{{ route('follow',['id' => $user->id]) }}" method="post">
          @csrf
          <button type="submit" class="btn-follow">フォローする</button>
        </form>
      @else
        <form action="{{ route('unfollow', ['id' => $user->id]) }}" method="POST">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn-unfollow">フォロー解除</button>
        </form>
      @endif
    </div>
  </div>

  <div class="post-list">
    @foreach($post as $p)
      <div class="post-item">
        <div class="post-left">
          <img class="avatar" src="{{ asset('images/'.$p->user->icon_image) }}" alt="">
        </div>
        <div class="post-body">
          <div class="post-name">{{ $p->user->username }}</div>
          <div class="post-text">{{ $p->post }}</div>
        </div>
        <div class="post-meta">{{ $p->updated_at }}</div>
      </div>
    @endforeach
  </div>
</x-login-layout>
