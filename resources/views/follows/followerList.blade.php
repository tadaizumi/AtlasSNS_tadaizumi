<x-login-layout>

  <div class="follower-list">
    <p class="follow-list-p">フォロワーリスト</p>
    @foreach ($followers as $follower)
      <!-- {{-- アイコンをクリックするとプロフィールページに遷移 --}} -->
      <a href="{{ route('user.show', ['id' => $follower->id]) }}">
        <img src="{{ Storage::url($follower->icon_image) }}" alt="プロフィール画像">
      </a>
    @endforeach
  </div>

  @foreach ($posts as $post)

    <!-- <div class="follower-list-post">
      <div class="post-list1">
        <img src="{{ Storage::url($post->user->icon_image) }}" alt="プロフィール画像">
        <p class="post_name">{{ $post->user->username }}</p>
        <p class="post_date">{{ $post->created_at }}</p>
      </div>

      <div class="post-list2">
        <p class="post_post">{{ $post->post }}</p>
      </div>
    </div> -->

    <div class="follow_profile_post">
      <div class="post-list1">
        <a href="{{ route('user.show', ['id' => $post->user->id]) }}"><img src="{{ Storage::url($post->user->icon_image) }}" alt="プロフィール画像"></a>
        <!-- <img src="{{ Storage::url($post->user->icon_image) }}" alt="プロフィール画像"> -->
        <p class="post_name">{{ $post->user->username }}</p>
        <p class="post_date follow_profile_date">{{ $post->created_at }}</p>
      </div>

      <div class="post-list2">
        <p class="post_post">{{ $post->post }}</p>
      </div>
    </div>
  @endforeach

</x-login-layout>
