<x-login-layout>
  <div class="list-page">
    <h2>フォロワーリスト</h2>
    <div class="icons">
      @foreach($follower_users as $follower_user)
      <a href="{{route('userprofile',['id' => $follower_user->id])}}">
        <img src="{{'images/'. $follower_user->icon_image}}">
      </a>
      @endforeach
    </div>
    <div class="lists">
      @foreach($follower_posts as $follower_post)
      <div class="post-live">
        <img src="{{'images/'. $follower_post->user->icon_image}}">
        <div class="post-main">
          <p>{{$follower_post->user->username}}</p>
          <p>{{$follower_post->post}}</p>
        </div>
        <div class="post-time">
          <p>{{$follower_post->created_at}}</p>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</x-login-layout>
