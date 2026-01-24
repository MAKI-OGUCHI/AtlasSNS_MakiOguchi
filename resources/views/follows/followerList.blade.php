<x-login-layout>
  <div class="list_page">
    <div class="list_header">
      <h2>フォロワーリスト</h2>
      <div class="icons">
        @foreach($follower_users as $follower_user)
        <a href="{{route('userprofile',['id' => $follower_user->id])}}">
        @if($follower_user->icon_image !== 'icon1.png')
        <img src="{{asset('/storage/images/'. $follower_user->icon_image)}}"></img>
        @else
        <img src="{{asset('images/icon1.png')}}" alt=""></img>
        @endif
        </a>
        @endforeach
      </div>
    </div>
    <div class="lists">
      @foreach($follower_posts as $follower_post)
      <div class="post_live">
        @if($follower_post->user->icon_image !== 'icon1.png')
        <img src="{{asset('/storage/images/'. $follower_post->user->icon_image)}}"></img>
        @else
        <img src="{{asset('images/icon1.png')}}" alt=""></img>
        @endif
        <div class="post_main">
          <p>{{$follower_post->user->username}}</p>
          <p>{{$follower_post->post}}</p>
        </div>
        <div class="post_time">
          <p>{{$follower_post->created_at}}</p>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</x-login-layout>
