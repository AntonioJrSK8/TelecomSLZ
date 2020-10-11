@extends('layouts.appLogin')

@section('content')
<div class="wrapper fadeInDown">
    <div id="formContent">
        <!-- Tabs Titles -->

        <!-- Icon -->
        <div class="fadeIn first">
            <img src="/imagem/login.svg" width="50px" height="50px" id="icon" alt="User Icon" />
        </div>

        <!-- Login Form -->
        <form class="form-horizontal" method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}
            
            <input type="text" id="email"  class="fadeIn second" name="email" value="{{ old('email') }}" placeholder="login" required autofocus>
            @if ($errors->has('email'))
                </br>
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif

            <input type="password" id="password" class="fadeIn third" name="password" placeholder="password" required>
            @if ($errors->has('password'))
            </br>
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif

            <input type="submit" class="fadeIn fourth" value="Entra">
        </form>

        <!-- Remind Passowrd -->
        <div id="formFooter">
            <a class="underlineHover" href="{{ route('password.request') }}">Esqueceu a senha?</a>
        </div>

    </div>
</div>
@endsection
