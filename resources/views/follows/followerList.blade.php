<x-login-layout>


  <h2>フォロワーリスト</h2>
  <div>
    @foreach($follower_users as $follower_user)
    <img src="{{'images/'. $follower_user->icon_image}}"></img>
    @endforeach
  </div>
  <div>
    @foreach($follower_posts as $follower_post)
    <img src="{{'images/'. $follower_post->user->icon_image}}"></img>
    <p>{{$follower_post->user->username}}</p>
    <p>{{$follower_post->post}}</p>
    @endforeach
  </div>

</x-login-layout>
