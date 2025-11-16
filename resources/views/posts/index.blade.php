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

                <!-- <div class="container">
                    <td><button type="" class="edit_btn js-modal-open"><img src="{{ asset('images/edit.png') }}" alt="編集" /></button></td>
                </div> -->

                <div class="content">
                    <!-- 投稿の編集ボタン -->
                     <td><a class="edit_btn js-modal-open" href="/post/{{ $post->id }}/update" post="{{ $post->post }}" post_id="{{ $post->id }}"><img src="{{ asset('images/edit.png') }}" alt="編集" /></a></td>
                </div>

                <!-- <td><a type="submit" class="delete_btn" href="" post="{{ $post->post }}" post_id="{{ $post->id }}" onclick="return confirm('この投稿を削除します。よろしいでしょうか？')"><img src="{{ asset('images/trash.png') }}" alt="削除" /></a></td> -->
                <td><a class="delete_btn" href="/post/{{ $post->id }}/delete" onclick="return confirm('この投稿を削除します。よろしいでしょうか？')"><img src="{{ asset('images/trash.png') }}" alt="削除" /></a></td>
            </tr>
            @endforeach

            <!-- モーダルの中身 -->
            <div class="modal js-modal">
                <div class="modal__bg js-modal-close"></div>
                <div class="modal__content">
                    <form action="/post/update" method="post"> <!-- ←裏の処理を書く -->
                        <textarea name="postUpdate" rows="4" cols="50" class="modal_post"></textarea>
                        <input type="hidden" name="update_id" class="modal_id" value="">
                        <!-- <input type="submit" value="更新" class="js-modal-edit"><img src="{{ asset('images/edit.png') }}" alt="編集" /> -->
                        <button type="submit" class="js-modal-edit"><img src="{{ asset('images/edit.png') }}" alt="編集" /></button>
                        {{ csrf_field() }}
                    </form>
                    <!-- <a class="js-modal-close" href="">閉じる</a> -->
                </div>
            </div>

        </div>
    </div>




</x-login-layout>
