<x-login-layout>
  <div class="list_page">
    <div class="list_header">
      <h2>フォローリスト</h2>
      <div class="icons">
        @foreach($follow_users as $follow_user)
        <a href="{{route('userprofile',['id' => $follow_user->id])}}">
        <img src="{{'images/'. $follow_user->icon_image}}">
        </a>
       @endforeach
      </div>
    </div>
    <div class="lists">
      @foreach($follow_posts as $follow_post)
      <div class="post_live">
        <img src="{{'images/'. $follow_post->user->icon_image}}">
        <div class="post_main">
          <p>{{$follow_post->user->username}}</p>
          <p>{{$follow_post->post}}</p>
        </div>
        <div class="post_time">
          <p>{{$follow_post->created_at}}</p>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</x-login-layout>
