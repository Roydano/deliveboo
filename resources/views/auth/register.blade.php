@extends('layouts.app')

@section('content')
<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nome e Cognome') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    

                        
                        <div class="form-group row">
                            <label for="restName" class="col-md-4 col-form-label text-md-right">{{ __('Nome ristorante') }}</label>

                            <div class="col-md-6">
                                <input id="restName" type="text" class="form-control @error('restName') is-invalid @enderror" name="restName" value="{{ old('restName') }}" required autocomplete="restName" autofocus>

                                @error('restName')
                                    <span class="alert alert-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="cuisine" class="col-md-4 col-form-label text-md-right">{{ __('Tipi di Cucina') }}</label>

                            <div class="col-md-6">
                                @foreach($cuisines as $cuisine)

                                <input class="btn-check type="checkbox"  @error('cuisine') is-invalid @enderror" value="{{ $cuisine->id }}" name="cuisine[]" id="{{ $cuisine->id }}" autocomplete="off" @if(in_array($cuisine->id, old('cuisine', []))) checked @endif>
                                <label class="btn btn-outline-primary">{{$cuisine->name}}</label>
                                
                                @endforeach

                                @error('cuisine')
                                    <span class="alert alert-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>






                        

                        
                       
                       
                       
                       
                       
                       
                       
                       
                       
                       
                       
                       
                       
                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Indirizzo') }}</label>

                            <div class="col-md-6">
                                <input  type="text" id="address" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address" autofocus>

                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>








                    
                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Numero di telefono') }}</label>

                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>




                    
                        <div class="form-group row">
                            <label for="p_iva" class="col-md-4 col-form-label text-md-right">{{ __('Partita IVA') }}</label>

                            <div class="col-md-6">
                                <input id="p_iva" type="text" class="form-control @error('p_iva') is-invalid @enderror" name="p_iva" value="{{ old('p_iva') }}" required autocomplete="p_iva" autofocus>

                                @error('p_iva')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>











                     
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

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
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                       
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                       
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                        

                     </form>
                </div>
            </div>
        </div>
    </div>
</div>  -->


<!-- registrazione -->


<form method="POST" action="{{ route('register') }}">
@csrf

<h2>Registrazione</h2>

<!-- nome e cognome -->

  <label for="name"  >
    <p class="label-txt ">{{ __('Nome e Cognome') }}</p>
    <input type="text" class="input mt-2  @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
    @error('name')
        <span class="invalid-feedback" role="alert">
             <strong>{{ $message }}</strong>
       </span>
    @enderror
    <div class="line-box mt-2">
      <div class="line"></div>
    </div>
  </label>


  <!-- ristorante -->

  <label for="restName"  >
    <p class="label-txt">{{ __('Nome ristorante') }}</p>
    <input  class="input mt-2" id="restName" type="text" class="form-control @error('restName') is-invalid @enderror" name="restName" value="{{ old('restName') }}" required autocomplete="restName" autofocus>
    @error('restName')
       <span class="alert alert-danger" role="alert">
         <strong>{{ $message }}</strong>
       </span>
    @enderror
    <div class="line-box mt-2">
      <div class="line"></div>
    </div>
  </label>


  <!-- tipi di cucina -->


  <label for="cuisine"  >
    <p class="label-txt">{{ __('Tipi di Cucina') }}</p>
    @foreach($cuisines as $cuisine)

       
      <div class="form-check form-check-inline mt-4 mb-4 ">
         <input  class="form-check-input mt-2 @error('cuisine') is-invalid @enderror" type="checkbox"   value="{{ $cuisine->id }}" name="cuisine[]" id=" cuisine-{{ $cuisine->id }}" autocomplete="off" @if(in_array($cuisine->id, old('cuisine', []))) checked @endif>

        
         <div class="btn cucine form-check-label " for="cuisine-{{$cuisine->id}}">{{$cuisine->name}}</div>

      </div>
       
   
    @endforeach

    @error('cuisine')
    <span class="alert alert-danger" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror



    <div class="line-box mt-2">
      <div class="line"></div>
    </div>
  </label>

  <!-- indirizzo -->


  <label for="address"  >
    <p class="label-txt">{{ __('Indirizzo') }}</p>
    <input  class="input mt-2" id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address" autofocus>
    @error('address')
       <span class="alert alert-danger" role="alert">
         <strong>{{ $message }}</strong>
       </span>
    @enderror
    <div class="line-box mt-2">
      <div class="line"></div>
    </div>
  </label>

  <!-- telefono -->

  <label for="phone"  >
    <p class="label-txt">{{ __('Numero di telefono') }}</p>
    <input  class="input mt-2" id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>
    @error('phone')
       <span class="alert alert-danger" role="alert">
         <strong>{{ $message }}</strong>
       </span>
    @enderror
    <div class="line-box mt-2">
      <div class="line"></div>
    </div>
  </label>


<!-- Partita iva -->
  
  <label for="p_iva"  >
    <p class="label-txt">{{ __('Partita Iva') }}</p>
    <input  class="input mt-2" id="p_iva" type="text" class="form-control @error('p_iva') is-invalid @enderror" name="p_iva" value="{{ old('p_iva') }}" required autocomplete="p_iva" autofocus>
    @error('p_iva')
       <span class="alert alert-danger" role="alert">
         <strong>{{ $message }}</strong>
       </span>
    @enderror
    <div class="line-box mt-2">
      <div class="line"></div>
    </div>
  </label>


  <!-- indirizzo email -->

  <label for="email"  >
    <p class="label-txt">{{ __('Indirizzo email') }}</p>
    <input  class="input mt-2" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" >
    @error('email')
       <span class="alert alert-danger" role="alert">
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
      <button type="submit">Registrati</button>
  </div>
</form>


<style lang="scss" scoped>

body {
  background: url('../img/food-sfondo.jpg');
  background-size:cover;
}
p{
  margin-bottom:20px;
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
