<x-login-layout>

  <div class="follower-list">
    <p class="follow-list-p">フォロワーリスト</p>
    @foreach ($followers as $follower)
      <!-- {{-- アイコンをクリックするとプロフィールページに遷移 --}} -->
      <a href="{{ route('user.show', ['id' => $follower->id]) }}">
        <img src="{{ asset('images/' . $follower->icon_image) }}" alt="プロフィール画像">
      </a>
    @endforeach
  </div>

  @foreach ($posts as $post)
    <div class="follower-list-post">
      <img src="{{ asset('images/' . $post->user->icon_image) }}" alt="プロフィール画像">
      <p class="follow_post_name">{{ $post->user->username }}</p>
      <p class="follow_post_date">{{ $post->created_at }}</p>
      <p class="follow_post_post">{{ $post->post }}</p>
    </div>
  @endforeach

</x-login-layout>
