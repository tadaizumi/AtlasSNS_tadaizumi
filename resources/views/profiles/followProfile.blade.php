<x-login-layout>
  <div class="">
    <div class="follow_profile">
      <img src="{{ asset('images/' . $user->icon_image) }}" alt="プロフィール画像">
      <p class="follow_profile_title">ユーザー名</p>
      <p class="follow_profile_name">{{ $user->username }}</p>
      <p class="follow_profileTitle">自己紹介</p>
      <p class="follow_profile_content">自己紹介文</p>
    </div>

    @foreach ($posts as $post)
    <div class="follow_profile_post">
      <img src="{{ asset('images/' . $post->user->icon_image) }}" alt="プロフィール画像">
      <p class="follow_profile_postName">{{ $post->user->username }}</p>
      <p class="follow_profile_postDate">{{ $post->created_at }}</p>
      <p class="follow_profile_postContent">{{ $post->post }}</p>
    </div>
    @endforeach

  </div>


</x-login-layout>
