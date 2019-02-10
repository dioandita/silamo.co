@extends('layouts.home')
@push('css')
<style>
.login-page {
  width: 400px;
  margin-top: 50px;
  margin-left: -50px;
}
.form {
  position: relative;
  z-index: 1;
  background: #FFFFFF;
  max-width: 360px;
  margin: 0 auto 100px;
  padding: 45px;
  text-align: center;
  box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
}
.form input {
  font-family: "Roboto", sans-serif;
  outline: 0;
  background: #f2f2f2;
  width: 100%;
  border: 0;
  margin: 0 0 15px;
  padding: 15px;
  box-sizing: border-box;
  font-size: 14px;
}
.form button {
  font-family: "Roboto", sans-serif;
  text-transform: uppercase;
  outline: 0;
  background: black;
  width: 100%;
  border: 0;
  padding: 15px;
  color: #FFFFFF;
  font-size: 14px;
  -webkit-transition: all 0.3 ease;
  transition: all 0.3 ease;
  cursor: pointer;
}
.form button:hover,.form button:active,.form button:focus {
  background: grey;
}
.form .message {
  margin: 15px 0 0;
  color: #b3b3b3;
  font-size: 12px;
}
.form .message a {
  color: black;
  text-decoration: none;
}
.form .register-form {
  display: none;
}
.login-page img{
    margin-top:-40px;
}
</style>
    
@endpush
@section('content')
<section>
        <div class="container">
                <div class="row justify-content-md-center" style="margin:auto;">
                        <div class="login-page">
                                <div class="form">
                                  <a class="navbar-brand" href="#"><img id="logoHeader" src="{{asset('templatehome/Mark1.png')}}" alt=""></a>
                                  <form class="login-form" method="POST" action="{{ route('register') }}">
                                          {{ csrf_field() }}
                                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                        <input type="text" name="name" placeholder="Name" value="{{ old('name') }}" required>
                                        @if ($errors->has('name'))
                                        <span class="help-block">
                                            <small>!{{ $errors->first('name') }}</small>
                                        </span>
                                    @endif
                                    </div>
                                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
                                    @if ($errors->has('email'))
                                    <span class="help-block">
                                        <small>!{{ $errors->first('email') }}</small>
                                    </span>
                                @endif
                              </div>
                              <div class="form-group{{ $errors->has('nohp') ? ' has-error' : '' }}">
                                  <input type="text" name="nohp" placeholder="No Handphone" value="{{ old('nohp') }}" required>
                                  @if ($errors->has('nohp'))
                                  <span class="help-block">
                                      <small>!{{ $errors->first('nohp') }}</small>
                                  </span>
                              @endif
                            </div>
                              
                              <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <input id="password" type="password" placeholder="password" name="password" required>
                                    @if ($errors->has('password'))
                                    <span class="help-block">
                                        <small>!{{ $errors->first('password') }}</small>
                                    </span>
                                @endif
                              </div>
                              <input id="password-confirm" type="password" name="password_confirmation" placeholder="password confirmation" required>
                                    <button type="submit">Daftar</button>
                                    <p class="message">Already registered?<a href="{{ route('login') }}">Sign In</a></p>
                                  </form>
                                </div>
                </div>
                </div>
</section>

@endsection


