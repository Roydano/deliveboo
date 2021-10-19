@extends('layouts.app')

@section('content')

<!-- creazione pagina login -->



<form method="POST" action="{{ route('login') }}">
@csrf

<h2 class="tito">Login</h2>

<!-- email -->

  <label for="email"  >
    <p class="label-txt ">{{ __('Indirizzo email') }}</p>
    <input type="text" class="input mt-2  @error('email') is-invalid @enderror" name="email" id="name" value="{{ old('email') }}" required autocomplete="email" autofocus>
    @error('email')
        <span class="invalid-feedback" role="alert">
             <strong>{{ $message }}</strong>
       </span>
    @enderror
    <div class="line-box mt-2">
      <div class="line"></div>
    </div>
  </label>


  <!-- password -->

  <label for="password"  >
    <p class="label-txt">{{ __('Password') }}</p>
    <input  class="input mt-2" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" >
    @error('password')
       <span class="alert alert-danger" role="alert">
         <strong>{{ $message }}</strong>
       </span>
    @enderror
    <div class="line-box mt-2">
      <div class="line " ></div>
    </div>
  </label>
  
 
  <!-- conferma password -->

  <label for="password-confirm"  >
    <p class="label-txt">{{ __('Conferma password') }}</p>
    <input  class="input mt-2 " id="password-confirm" type="password" class="form-control " name="password_confirmation" required autocomplete="new-password" >
  
    <div class="line-box">
      <div class="line "></div>
    </div>
  </label>

  
  <div>
      <button type="submit">Login</button>
  </div>
</form>



<style lang="scss" scoped>
  

body {
  background: url('../img/lo-sfondo.jpg');
  background-size:cover;
}
p{
  margin-bottom:20px;
}

.tito{
  font-size:3vw;
}


form {
  width: 60%;
  margin: 60px auto;
  background: #efefef;
  padding: 60px 120px 80px 120px;
  text-align: center;
  -webkit-box-shadow: 2px 2px 3px rgba(0,0,0,0.1);
  box-shadow: 2px 2px 3px rgba(0,0,0,0.1);
}
label {
  display: block;
  position: relative;
  margin: 40px 0px;
}
.label-txt {
  position: absolute;
  top: -1.6em;
  padding: 10px;
  font-family: sans-serif;
  font-size: .8em;
  letter-spacing: 1px;
  color: rgb(120,120,120);
  transition: ease .3s;
}
.input {
  width: 100%;
  padding: 10px;
  background: transparent;
  border: none;
  outline: none;
}
.input-cus{
    width: 3%;
  padding: 10px;
  background: transparent;
  border: none;
  outline: none;
  margin-top:70px;
}

.line-box {
  position: relative;
  width: 100%;
  height: 2px;
  background: #BCBCBC;
}

.line {
  position: absolute;
  width: 0%;
  height: 2px;
  top: 0px;
  left: 50%;
  transform: translateX(-50%);
  background: #8BC34A;
  transition: ease .6s;
}

.input:focus + .line-box .line {
  width: 100%;
}

.label-active {
  top: -3em;
}

button {
  display: inline-block;
  padding: 12px 24px;
  background: rgb(220,220,220);
  font-weight: bold;
  color: rgb(120,120,120);
  border: none;
  outline: none;
  border-radius: 3px;
  cursor: pointer;
  transition: ease .3s;
}

button:hover {
  background: #8BC34A;
  color: #ffffff;
}

.cucine{
    background: #8BC34A;
    opacity:0.8;
}

h2{
    color:#bcbcbc;
    margin-right:50px;
}


</style>


@endsection




<!-- pagina login con bootstrap -->
<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> -->







