<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <!--IEブラウザ対策-->
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="description" content="ページの内容を表す文章" />
  <title></title>
  <link rel="stylesheet" href="{{ asset('css/reset.css') }} ">
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <link rel="stylesheet" href="{{ asset('css/style.css') }} ">
  <!--スマホ,タブレット対応-->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Scripts -->
  <!--サイトのアイコン指定-->
  <link rel="icon" href="画像URL" sizes="16x16" type="image/png" />
  <link rel="icon" href="画像URL" sizes="32x32" type="image/png" />
  <link rel="icon" href="画像URL" sizes="48x48" type="image/png" />
  <link rel="icon" href="画像URL" sizes="62x62" type="image/png" />
  <!--iphoneのアプリアイコン指定-->
  <link rel="apple-touch-icon-precomposed" href="画像のURL" />
  <!--OGPタグ/twitterカード-->
</head>

<body>
  <header>
    @include('layouts.navigation')
  </header>
  <!-- Page Content -->
  <div id="row">
    <div id="container">
      {{$slot}}
    </div>
    <div id="sideBar">
      <div id="confirm">
        <p class="username">{{ Auth::user() -> username }}さんの</p>
        <div class="list-number">
          <p>フォロー数</p>
          <p>{{ Auth::user() -> following_user() -> get() -> count() }} 名
        </p>
        </div>
        <p class="btn_primary list-btn"><a href="/follow-list">フォローリスト</a></p>
        <div class="list-number">
          <p>フォロワー数</p>
          <p>{{ Auth::user() -> followed_user()  -> get() ->count() }} 名</p>
        </div>
        <p class="btn_primary list-btn"><a href="/follower-list">フォロワーリスト</a></p>
      </div>
      <p class="btn_primary search-btn"><a href="/search">ユーザー検索</a></p>
    </div>
  </div>
  <footer>
  </footer>
  <script src="{{ asset('js/app.js') }}"></script>
  <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
  <script src="{{asset('js/script.js')}}"></script>
</body>

</html>
