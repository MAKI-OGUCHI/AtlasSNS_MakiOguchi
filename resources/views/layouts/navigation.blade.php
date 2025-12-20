<div id="head">
  <h1><a href="/top"><img src="images/atlas.png"></a></h1>
  <div class="header-right">
    <div id="user-menu" class="user-menu">
      <button type="button" id="user-toggle" class="user-toggle">
        {{ Auth::user()->username }}さん
        <span class="arrow"></span>
      </button>

      <ul id="user-dropdown" class="user-dropdown">
        <li><a href="/top">ホーム</a></li>
        <li><a href="/profile">プロフィール</a></li>
        <li><a href="/logout">ログアウト</a></li>
      </ul>
    </div>
  </div>
</div>
