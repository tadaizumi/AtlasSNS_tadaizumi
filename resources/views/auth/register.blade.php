<x-logout-layout>
    <!-- 適切なURLを入力してください -->
{!! Form::open(['url' => 'register']) !!}

<p>新規ユーザー登録</p>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
    </div>
@endif

{{ Form::label('ユーザー名') }}
{{ Form::text('username',null) }}

{{ Form::label('メールアドレス') }}
{{ Form::email('email',null) }}

{{ Form::label('パスワード') }}
{{ Form::password('password',null) }}

{{ Form::label('パスワード確認') }}
{{ Form::password('password_confirmation',null) }}

{{ Form::submit('登録') }}

<p><a href="login">ログイン画面へ戻る</a></p>

{!! Form::close() !!}


</x-logout-layout>
