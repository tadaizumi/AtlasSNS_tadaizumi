<x-login-layout>
  <div class="">
    <!-- <div class="follow_profile">
      <img src="{{ Storage::url($user->icon_image) }}" alt="プロフィール画像">
      <p class="follow_profile_title">ユーザー名</p>
      <p class="follow_profile_name">{{ $user->username }}</p>
      <p class="follow_profileTitle">自己紹介</p>
      <p class="follow_profile_content">{{ $user->bio }}</p>
      <div class="follow_profile-btn">
        @if (auth()->user()->following($user->id))
          <form action="{{ route('unfollow', ['id' => $user->id]) }}" method="GET">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <button type="submit" class="unfollow-btn">フォロー解除</button>
          </form>
        @else
          <form action="{{ route('follow', ['id' => $user->id]) }}" method="GET">
            {{ csrf_field() }}
            <button type="submit" class="unfollow-btn follow-btn">フォローする</button>
          </form>
        @endif
      </div>
    </div> -->

    <div class="follow_profile">
      <div class="post-list1">
        <img src="{{ Storage::url($user->icon_image) }}" alt="プロフィール画像">
        <p class="post_name follow_profile_title">ユーザー名</p>
        <p class="follow_profile_name">{{ $user->username }}</p>
      </div>

      <div class="post-list2">
        <p class="follow_profileTitle">自己紹介</p>
        <p class="follow_profile_content">{{ $user->bio }}</p>
        <div class="follow_profile-btn">
        @if (auth()->user()->following($user->id))
          <form action="{{ route('unfollow', ['id' => $user->id]) }}" method="GET">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <button type="submit" class="unfollow-btn">フォロー解除</button>
          </form>
        @else
          <form action="{{ route('follow', ['id' => $user->id]) }}" method="GET">
            {{ csrf_field() }}
            <button type="submit" class="unfollow-btn follow-btn">フォローする</button>
          </form>
        @endif
      </div>
      </div>
    </div>

    @foreach ($posts as $post)
    <!-- <div class="follow_profile_post">
      <img src="{{ Storage::url($post->user->icon_image) }}" alt="プロフィール画像">
      <p class="follow_profile_postName">{{ $post->user->username }}</p>
      <p class="follow_profile_postDate">{{ $post->created_at }}</p>
      <p class="follow_profile_postContent">{{ $post->post }}</p>
    </div> -->

    <div class="follow_profile_post">
      <div class="post-list1">
        <img src="{{ Storage::url($post->user->icon_image) }}" alt="プロフィール画像">
        <p class="post_name">{{ $post->user->username }}</p>
        <p class="post_date">{{ $post->created_at }}</p>
      </div>

      <div class="post-list2">
        <p class="post_post">{{ $post->post }}</p>
      </div>
    </div>
    @endforeach

  </div>


</x-login-layout>
