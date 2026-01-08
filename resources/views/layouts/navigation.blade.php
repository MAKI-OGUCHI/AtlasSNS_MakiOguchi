<div id="head">
  <div class="logo"><a href="/top"><img src="/images/atlas.png"></a></div>

  <div class="header_right">
    <div id="userMenu" class="user_menu">
      <button type="button" id="userToggle" class="user_toggle" aria-expanded="false">
        {{ Auth::user()->username }}　さん
        <span class="arrow"></span>
        <img class="header_user_icon"
       src="{{ asset('images/' . Auth::user()->icon_image) }}"
       alt="user icon">
      </button>

      <ul id="userDropdown" class="user_dropdown">
        <li><a href="/top">ホーム</a></li>
        <li><a href="/profile">プロフィール編集</a></li>
        <li><a href="/logout">ログアウト</a></li>
      </ul>
    </div>
  </div>
</div>
