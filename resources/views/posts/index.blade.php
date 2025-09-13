<x-login-layout>


  <!-- <h2>機能を実装していきましょう。</h2> -->

  <div class="container">
        <!-- <h2 class="page-header">著者を登録する</h2> -->
        <form action="/post/create" method="post">
        @csrf
        <div class="form-group">
            <!-- <input type="text" name="posts" value="" class="form-control" placeholder="著者名" required> -->
            <textarea name="postContent" rows="4" cols="50" placeholder="投稿内容を入力してください。" class="textarea"></textarea>
            <button type="submit" class="post_btn"><img src="{{ asset('images/post.png') }}" alt="送信" /></button>
        </div>
        <!-- <button type="submit" class="btn btn-success pull-right" href="/public/images/post.png">画像</button> -->
        </form>


        <div class="post-list">
            @foreach ($posts as $post)
            <tr>
                <!-- アイコンを表示させる <td>{{ $post->user_id }}</td> -->

                <td><p class="post_date">{{ $post->created_at }}</p></td>
                <td><p>{{ $post->post }}</p></td>
                <td><button type="submit" class="edit_btn"><img src="{{ asset('images/edit.png') }}" alt="編集" /></button></td>
                <td><button type="submit" class="delete_btn"><img src="{{ asset('images/trash.png') }}" alt="削除" /></button></td>
            </tr>
            @endforeach
        </div>
</div>




</x-login-layout>
