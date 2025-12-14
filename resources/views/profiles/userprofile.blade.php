<x-login-layout>
  <div class="follower-pro">
    <div class="user-icon">
  <img src="{{asset('images/'.$user->icon_image)}}" alt="">
  </div>
  <p>{{$user->username}}</p>
  <p>{{$user->bio}}</p>
  @if(!auth()-> user() -> isFollowing($user -> id))
  <form action="{{route('follow',['id' => $user -> id])}}" method="post">
    @csrf
  <button type="submit" class="btn btn-primary">フォローする</button></form>
  @else <form action="{{ route('unfollow', ['id' => $user->id]) }}" method="POST">
    @csrf
@method('DELETE')
  <button type="submit" class="btn btn-danger">フォロー解除</button></form>
  @endif
  </div>
  <div class="follower-post">
  @foreach($post as $p)
  <img src="{{asset('images/'.$user->icon_image)}}" alt="">
  <p>{{$p->user->username}}</p>
  <p>{{$p->post}}</p>
  <p>{{$p->updated_at}}</p>
  @endforeach
  </div>
</x-login-layout>
