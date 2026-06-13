<x-logout-layout>
  <div id="clear">
    <div class="add1">
      <p class="add-content">{{ Session::get('username') }} さん</p>
      <p class="add-content">ようこそ！AtlasSNSへ！</p>
    </div>
    <div class="add2">
      <p class="add-content">ユーザー登録が完了しました。</p>
      <p class="add-content">早速ログインをしてみましょう。</p>
    </div>


    <p class="btn"><a href="login">ログイン画面へ</a></p>
  </div>
</x-logout-layout>
