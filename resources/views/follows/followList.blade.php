<x-login-layout>


  <h2>フォローリスト</h2>

  <div>
    @foreach($follow_users as $follow_user)
    <img src="{{'images/'. $follow_user->icon_image}}"></img>
    @endforeach
  </div>
  <div>
    @foreach($follow_posts as $follow_post)
    <img src="{{'images/'. $follow_post->user->icon_image}}"></img>
    <p>{{$follow_post->user->username}}</p>
    <p>{{$follow_post->post}}</p>
    @endforeach
  </div>

</x-login-layout>
