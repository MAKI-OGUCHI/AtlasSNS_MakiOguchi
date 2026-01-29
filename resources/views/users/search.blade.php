<x-login-layout>

  <div class="search_form">
    <form action="{{ url('search') }}" method="get">
      <input
        type="text"
        name="user"
        class="form-control"
        placeholder="ユーザー名"
        value="{{ request('user') }}"
      >

      <button type="submit" class="btn">
        <img src="/images/search.png" alt="検索">
      </button>
    </form>

    <h3>検索ワード： {{ $keyword }}</h3>
  </div>

  <div>
    @foreach($users as $user)
      <div class="users">

        @if($user->icon_image !== 'icon1.png')
          <img src="{{ asset('/storage/images/' . $user->icon_image) }}">
        @else
          <img src="{{ asset('images/icon1.png') }}" alt="">
        @endif

        <p>{{ $user->username }}</p>

        @if(!auth()->user()->isFollowing($user->id))
          <form action="{{ route('follow', ['id' => $user->id]) }}" method="post">
            @csrf
            <button type="submit" class="btn btn-primary">フォローする</button>
          </form>
        @else
          <form action="{{ route('unfollow', ['id' => $user->id]) }}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">フォロー解除</button>
          </form>
        @endif
      </div>
    @endforeach
  </div>
</x-login-layout>
