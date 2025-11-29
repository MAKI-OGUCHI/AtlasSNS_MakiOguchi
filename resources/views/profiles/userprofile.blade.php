<x-login-layout>
  プロフィール
  <img src="{{asset('images/'.$user->icon_image)}}" alt="">
  <p>{{$user->username}}</p>
  <p>{{$user->bio}}</p>
  @foreach($post as $p)
  <p>{{$p->post}}</p>
  <p>{{$p->updated_at}}</p>
  @endforeach
</x-login-layout>
