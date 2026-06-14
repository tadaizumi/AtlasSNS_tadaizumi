<x-login-layout>
  <div class="profile_edit">
    @if (Auth::user()->icon_image === 'icon1.png')
        <img src="{{ asset('images/icon1.png') }}" alt="プロフィール画像">
    @else
        <img src="{{ Storage::url(Auth::user()->icon_image) }}" alt="プロフィール画像">
    @endif

    <form action="{{ route('profile_edit') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <!-- {!! Form::open(['route' => ['profile_edit'], 'method' => 'PUT']) !!}
    {!! Form::hidden('id',$user->id) !!} の時'files' => true -->
    <div class="profile_update">
      <div class="profile_upContent">
        {{Form::label('username','ユーザー名')}}
        {{Form::text('username', $user->username, ['class' => 'form-control', 'id' =>'username'])}}
        <span class="text-danger">{{$errors->first('username')}}</span>
      </div>
      <div class="profile_upContent">
        {{Form::label('email','メールアドレス')}}
        {{Form::email('email', $user->email, ['class' => 'form-control', 'id' =>'email'])}}
        <span class="text-danger">{{$errors->first('email')}}</span>
      </div>

      <div class="profile_upContent">
        {{Form::label('password','新しいパスワード')}}
        {{Form::password('password', ['class' => 'form-control', 'id' =>'password'])}}
        <span class="text-danger">{{$errors->first('password')}}</span>
      </div>
      <div class="profile_upContent">
        {{Form::label('password_confirmation','新しいパスワード（確認）')}}
        {{Form::password('password_confirmation', ['class' => 'form-control', 'id' =>'password_confirmation'])}}
        <span class="text-danger">{{$errors->first('password_confirmation')}}</span>
      </div>

      <div class="profile_upContent">
        {{ Form::label('bio','自己紹介') }}
        {{ Form::text('bio',$user->bio, ['class' => 'form-control', 'id' =>'bio']) }}
        <span class="text-danger">{{$errors->first('bio')}}</span>
      </div>

      <div class="profile_upContent">
        {{ Form::label('icon_image','アイコン画像') }}
        {{ Form::file('icon_image', ['class' => 'form-control', 'id' =>'icon_image', 'accept' =>'image/png, image/jpeg'] ) }}
        <span class="text-danger">{{$errors->first('icon_image')}}</span>
      </div>


      <div class="">
        {{Form::submit(' 更新する ', ['class'=>'btn profile_btn rounded-pill'])}}
      </div>

    </div>
    {!! Form::close() !!}
  </div>




</x-login-layout>
