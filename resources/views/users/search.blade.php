<x-login-layout>

<div>
  <form action="{{ route('search') }}" method="GET">
    <div class="search_form_group">
      <input type="text" name="keyword" placeholder="ユーザー名" class="search_form">
      <!-- <input type="submit" class="" value="" name="search_user"><img src="{{ asset('images/search.png') }}" alt="検索" /> -->
      <button type="submit" class="search_btn" name="search_user"><img src="{{ asset('images/search.png') }}" alt="検索" /></button>

      <!-- 検索結果を表示する -->
      <div id="search-term-display"></div>
    </div>
  </form>

</div>



  @foreach ($users as $posts => $value)
  <div class="user-list">
      <div class="user-list-content"><img src="{{ asset('images/' . $value['icon_image']) }}" alt="プロフィール画像"></div> <!-- 結合演算子「'文字列' . 変数」 -->
      <div class="user-list-content"><p class="user-list-name">{{ $value->username }}</p></div>
      <div class="user-list-btn">
        @if (auth()->user()->following($value->id))
          <form action="{{ route('unfollow', ['id' => $value->id]) }}" method="GET">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <button type="submit" class="unfollow-btn">フォロー解除</button>
          </form>
        @else
          <form action="{{ route('follow', ['id' => $value->id]) }}" method="GET">
            {{ csrf_field() }}
            <button type="submit" class="unfollow-btn follow-btn">フォローする</button>
          </form>
        @endif
      </div>
  </div>
  @endforeach

</x-login-layout>
