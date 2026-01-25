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

<div class="user-list">

  @foreach ($users as $posts => $value)
  <tr>
    <img src="{{ asset('images/' . $value['icon_image']) }}" alt="プロフィール画像"> <!-- 結合演算子「'文字列' . 変数」 -->
    <td><p class="">{{ $value->username }}</p></td>

    <!-- <form action="{{ route('follow', ['id' => $value->id]) }}" method="GET">
    <button type="submit" class="" name="">フォロー</button>
    </form>

    <form action="{{ route('unfollow', ['id' => $value->id]) }}" method="GET">
    <button type="submit" class="" name="">フォロー解除</button>
    </form> -->

    <div class="">
      @if (auth()->user()->following($value->id))
          <form action="{{ route('unfollow', ['id' => $value->id]) }}" method="GET">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <button type="submit" class="">フォロー解除</button>
          </form>
      @else
          <form action="{{ route('follow', ['id' => $value->id]) }}" method="GET">
            {{ csrf_field() }}
            <button type="submit" class="">フォローする</button>
          </form>
      @endif
    </div>

  </tr>
  @endforeach


</div>

</x-login-layout>
