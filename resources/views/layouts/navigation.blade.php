<div id="head">
    <h1 id="title"><a href="{{ route('top') }}"><img src="{{ asset('images/atlas.png') }}"></a></h1>
    <div id="">
        <div id="">
            <p class="head-name">{{ Auth::user()->username }}　さん</p>
        </div>
        <div class="menu-btn">
            <span class="inn"></span>
        </div>
        <nav class="menu">
            <ul>
                <li><a href="{{ route('top') }}">HOME</a></li>
                <li><a href="{{ route('profile') }}">プロフィール編集</a></li>
                <li><a href="{{ route('logout') }}">ログアウト</a></li>
            </ul>
        </nav>
    </div>
</div>
