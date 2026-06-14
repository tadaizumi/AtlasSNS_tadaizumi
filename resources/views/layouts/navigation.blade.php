<div id="head">
    <h1 id="title"><a href="{{ route('top') }}"><img src="{{ asset('images/atlas.png') }}"></a></h1>
    <div class="head-content">
        <p class="head-name">{{ Auth::user()->username }}　さん</p>
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
        @if (Auth::user()->icon_image === 'icon1.png')
            <img class="head-icon" src="{{ asset('images/icon1.png') }}" alt="プロフィール画像">
        @else
            <img class="head-icon" src="{{ Storage::url(Auth::user()->icon_image) }}" alt="プロフィール画像">
        @endif
    </div>
</div>
