<x-login-layout>

<div class="container">
    {{ Form::open(['url' => 'userSearch'])}}

    {{ Form::input('text' , 'user' , null , ['class' => 'form-control' , 'placeholder' => 'ユーザー名']) }}

    <button type="submit" class="btn"><img src="/images/search.png" alt="検索"></button>
    {{ Form::close() }}
    <h3>{{$keyword}}</h3>
  </div>

  <div class="users">
    @foreach($users as $user)
    <img src="{{'images/'. $user->icon_image}}"></img>
  <p>{{$user->username}}</p>
  @if(!auth()-> user() -> isFollowing($user -> id))
  <form action="{{route('follow',['id' => $user -> id])}}" method="post">
    @csrf
  <button type="submit" class="btn btn-primary">フォローする</button></form>
  @else <form action="{{ route('unfollow', ['id' => $user->id]) }}" method="POST">
    @csrf
@method('DELETE')
  <button type="submit" class="btn btn-danger">フォロー解除</button></form>
  @endif
@endforeach
  </div>
</x-login-layout>
